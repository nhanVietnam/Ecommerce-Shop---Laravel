<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function SubCategoryView(){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('categories','subcategories')); 
    }

    public function SubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_name_en' => 'required',
            'subcategory_name_vn' => 'required',
        ],[
            'category_id'=>'Vui lòng chọn Danh mục Cha',
            'subcategory_name_en.required'=>'Vui lòng không đề trống',
            'subcategory_name_vn.required'=>'Vui lòng không đề trống',
            
        ]);
        
        SubCategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_vn' => $request->subcategory_name_vn,
            'subcategory_slug_en' => Str::slug($request->input('subcategory_name_en', '-')),
            'subcategory_slug_vn' => Str::slug($request->input('subcategory_name_vn', '-')),
        ]);

        $notification = array(
            'message' => 'SubCategory Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }
    
    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit',compact('categories','subcategory'));
    }

    public function SubCategoryUpdate(Request $request){
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_vn' => $request->subcategory_name_vn,
            'subcategory_slug_en' => Str::slug($request->input('subcategory_name_en', '-')),
            'subcategory_slug_vn' => Str::slug($request->input('subcategory_name_vn', '-')),
        ]);
        $notification = array(
            'message' => 'SubCategory Edit Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subcategory')->with($notification);
    }

    public function SubCategoryDelete($id){
        
        SubSubCategory::where('subcategory_id',$id)->delete();
        SubCategory::findOrFail($id)->delete(); 

        $notification = array(
            'message' => 'SubCategory Delete Successfully',
            'alert-type' => 'info'  
        );
        
        return redirect()->back()->with($notification);
    }


    public function SubSubCategoryView(){
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        $subsubcategories = SubSubCategory::latest()->get();
        return view('backend.category.subsubcategory_view',compact('categories','subsubcategories')); 
    }

    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_vn','ASC')->get();
        return json_encode($subcat);
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_vn' => 'required',
        ],[
            'category_id'=>'Vui lòng chọn Danh mục Cha',
            'subcategory_id'=>'Vui lòng chọn đầy đủ thông tin',
            'subsubcategory_name_en.required'=>'Vui lòng không để trống',
            'subsubcategory_name_vn.required'=>'Vui lòng không để trống',
            
        ]);
        
        SubSubCategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_id'=> $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_vn' => $request->subsubcategory_name_vn,
            'subsubcategory_slug_en' => Str::slug($request->input('subsubcategory_name_en', '-')),
            'subsubcategory_slug_vn' => Str::slug($request->input('subsubcategory_name_vn', '-')),
        ]);

        $notification = array(
            'message' => 'SubSubCategory Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_vn','ASC')->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.subsubcategory_edit',compact('categories','subcategories','subsubcategory'));
    }

    public function SubSubCategoryUpdate(Request $request){
        $subsubcategory_id = $request->id;

        SubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubategory_name_vn' => $request->subsubcategory_name_vn,
            'subsubcategory_slug_en' => Str::slug($request->input('subsubcategory_name_en', '-')),
            'subsubcategory_slug_vn' => Str::slug($request->input('subsubcategory_name_vn', '-')),
        ]);
        $notification = array(
            'message' => 'Sub-SubCategory Edit Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete(); 

        $notification = array(
            'message' => 'Sub-SubCategory Delete Successfully',
            'alert-type' => 'info'  
        );
        
        return redirect()->back()->with($notification);
    }

    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_vn','ASC')->get();
        return json_encode($subsubcat);
    }
}