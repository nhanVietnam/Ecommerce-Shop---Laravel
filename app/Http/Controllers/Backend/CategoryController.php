<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function CategoryView(){
        $categories = Category::latest()->get();
        return view('backend.category.category_view',compact('categories'));
    }

    public function CategoryStore(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_vn' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required'=>'Vui lòng nhập Tên bằng tiếng Anh',
            'category_name_vn.required'=>'Vui lòng nhập Tên bằng tiếng Việt',
            'category_icon.required'=>'Vui lòng thêm ảnh Đại diện',
        ]);
        
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_vn' => $request->category_name_vn,
            'category_slug_en' => Str::slug($request->input('category_name_en', '-')),
            'category_slug_vn' => Str::slug($request->input('category_name_vn', '-')),
            'category_icon' => $request->category_icon,
            
        ]);

        $notification = array(
            'message' => 'Category Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id){
        $category = Category::findOrFail($id);
         return view('backend.category.category_edit',compact('category'));
    }

    public function CategoryUpdate(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_vn' => $request->category_name_vn,
            'category_slug_en' => Str::slug($request->input('category_name_en', '-')),
            'category_slug_vn' => Str::slug($request->input('category_name_vn', '-')),
            'category_icon' => $request->category_icon,
        ]);
        $notification = array(
            'message' => 'Category Edit Successfully',
            'alert-type' => 'success',
        );

        return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        
        SubCategory::where('category_id',$id)->delete();
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category Delete Successfully',
            'alert-type' => 'info'  
        );
        
        return redirect()->back()->with($notification);
    }
}