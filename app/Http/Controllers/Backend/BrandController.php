<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    public function BrandView(){
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view',compact('brands'));
    }

    public function BrandStore(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_vn' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required'=>'Vui lòng nhập Tên bằng tiếng Anh',
            'brand_name_vn.required'=>'Vui lòng nhập Tên bằng tiếng Việt',
            'brand_image.required'=>'Vui lòng thêm ảnh Đại diện',
        ]);
        
        $image = $request->file('brand_image');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_generate);
        $save_url = 'upload/brand/'.$name_generate;
        
        Brand::insert([
            'brand_name_en' => $request->input('brand_name_en'),
            'brand_name_vn' => $request->input('brand_name_vn'),
            'brand_slug_en' => Str::slug($request->input('brand_name_en', '-')),
            'brand_slug_vn' => Str::slug($request->input('brand_name_vn', '-')),
            'brand_image' => $save_url,
            
        ]);

        $notification = array(
            'message' => 'Brand Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function BrandEdit($id){
        $brand = Brand::findOrFail($id);
         return view('backend.brand.brand_edit',compact('brand'));
    }

    public function BrandUpdate(Request $request){
        $brand_id = $request->id;
        $old_img = $request->old_image;

        if($request->file('brand-image')){
            unlink($old_img);
            $image = $request->file('brand_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_generate);
            $save_url = 'upload/brand/'.$name_generate;

        Brand::findOrFail($brand_id)->update([
            'brand_name_en' => $request->input('brand_name_en'),
            'brand_name_vn' => $request->input('brand_name_vn'),
            'brand_slug_en' => Str::slug($request->input('brand_name_en', '-')),
            'brand_slug_vn' => Str::slug($request->input('brand_name_vn', '-')),
            'brand_image' => $save_url,
        ]);
        $notification = array(
            'message' => 'Brand Edit Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('all.brand')->with($notification);
        } else {
            Brand::findOrFail($brand_id)->update([
                'brand_name_en' => $request->input('brand_name_en'),
                'brand_name_vn' => $request->input('brand_name_vn'),
                'brand_slug_en' => Str::slug($request->input('brand_name_en', '-')),
                'brand_slug_vn' => Str::slug($request->input('brand_name_vn', '-')),
            ]);
            $notification = array(
                'message' => 'Brand Edit Successfully',
                'alert-type' => 'info'  
            );
    
            return redirect()->route('all.brand')->with($notification);
        }
    }

    public function BrandDelete($id){
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);
        
        Brand::findOrFail($id)->delete(); 

        $notification = array(
            'message' => 'Brand Delete Successfully',
            'alert-type' => 'info'  
        );
        
        return redirect()->route('all.brand')->with($notification);
    }
}