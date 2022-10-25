<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Product;
use App\Models\Brand;
use Carbon\Carbon;
use App\Models\MultiImg;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function AddProduct(){
        $categories = Category::latest()->get();
        $brands = Brand::latest()->get(); 
        return view('backend.product.product_add',compact('categories','brands'));
    }

    public function StoreProduct(Request $request){
        
        $image = $request->file('product_thumbnail');
        $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(910,1000)->save('upload/products/thumbnail/'.$name_generate);
        $save_url = 'upload/products/thumbnail/'.$name_generate;
        
        $product_id = Product::insertGetId([
             'brand_id'=>$request->brand_id, 
             'category_id'=>$request->category_id, 
             'subcategory_id'=>$request->subcategory_id, 
             'subsubcategory_id'=>$request->subsubcategory_id, 
             'product_name_en'=>$request->product_name_en, 
             'product_name_vn'=>$request->product_name_vn, 
             'product_slug_en'=>Str::slug($request->product_name_en, '-'), 
             'product_slug_vn'=>Str::slug($request->product_name_vn, '-'), 
             'product_code'=>$request->product_code, 
             'product_quantity'=>$request->product_quantity, 
             'product_tag_en'=>$request->product_tag_en, 
             'product_tag_vn'=>$request->product_tag_vn,
             'product_size_en'=>$request->product_size_en, 
             'product_size_vn'=>$request->product_size_vn, 
             'product_color_en'=>$request->product_color_en, 
             'product_color_vn'=>$request->product_color_vn, 
             'selling_price'=>$request->selling_price, 
             'discount_price'=>$request->discount_price, 
             'short_description_en'=>$request->short_description_en, 
             'short_description_vn'=>$request->short_description_vn, 
             'long_description_en'=>$request->long_description_en, 
             'long_description_vn'=>$request->long_description_vn, 
             'hot_deals'=>$request->hot_deal, 
             'featured'=>$request->featured, 
             'special_offer'=>$request->special_offer, 
             'special_deal'=>$request->special_deal, 
             'product_thumbnail'=>$save_url, 
             'status'=> 1, 
             'created_at'=> Carbon::now(), 
            
        ]);
        
        //Mutilple Images Handle
        $images = $request->file('multi_image');
        foreach($images as $image){
            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(910,1000)->save('upload/products/multiple-image/'.$make_name);
            $upload_path = 'upload/products/multiple-image/'.$make_name;

            MultiImg::insert([
                'product_id'=>$product_id,
                'photo_name'=>$upload_path,
                'created_at'=>Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Insert Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function ManageProduct(){
        $products = Product::latest()->get();
        return view('backend.product.product_view',compact('products'));
    }

    public function EditProduct($id){
        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $subsubcategories = SubSubCategory::latest()->get();
        $brands = Brand::latest()->get();
        $products = Product::findOrFail($id);

        return view('backend.product.product_edit',compact('categories','subcategories','subsubcategories','brands','products','multiImgs'));
    }

    public function ProductDataUpdate(Request $request){
        $product_id = $request->id;
        Product::findOrFail($product_id)->update([
            'brand_id'=>$request->brand_id, 
            'category_id'=>$request->category_id, 
            'subcategory_id'=>$request->subcategory_id, 
            'subsubcategory_id'=>$request->subsubcategory_id, 
            'product_name_en'=>$request->product_name_en, 
            'product_name_vn'=>$request->product_name_vn, 
            'product_slug_en'=>Str::slug($request->product_name_en, '-'), 
            'product_slug_vn'=>Str::slug($request->product_name_vn, '-'), 
            'product_code'=>$request->product_code, 
            'product_quantity'=>$request->product_quantity, 
            'product_tag_en'=>$request->product_tag_en, 
            'product_tag_vn'=>$request->product_tag_vn,
            'product_size_en'=>$request->product_size_en, 
            'product_size_vn'=>$request->product_size_vn, 
            'product_color_en'=>$request->product_color_en, 
            'product_color_vn'=>$request->product_color_vn, 
            'selling_price'=>$request->selling_price, 
            'discount_price'=>$request->discount_price, 
            'short_description_en'=>$request->short_description_en, 
            'short_description_vn'=>$request->short_description_vn, 
            'long_description_en'=>$request->long_description_en, 
            'long_description_vn'=>$request->long_description_vn, 
            'hot_deals'=>$request->hot_deals, 
            'featured'=>$request->featured, 
            'special_offer'=>$request->special_offer, 
            'special_deal'=>$request->special_deal,
            'status'=> 1, 
            'created_at'=> Carbon::now(),
       ]);

       $notification = array(
        'message' => 'Product Updated Wihout Image Successfully',
        'alert-type' => 'success', 
        );
        return redirect()->route('manage-product')->with($notification);
    }

    public function MultiImageUpdate(Request $request){
        $images = $request->multi_img;
        foreach ($images as $id => $image){
            $imageDelete = MultiImg::findOrFail($id);
            unlink($imageDelete->photo_name);
            $make_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(910,1000)->save('upload/products/multi-image/'.$make_name);
            $uploadNewPath = 'upload/products/multi-image/'.$make_name;

            MultiImg::where('id',$id)->update([
                 'photo_name' => $uploadNewPath,
                 'updated_at' => Carbon::now(),
                  
            ]);
        }
        $notification = array(
            'message' => 'Product Image Updated Successfully',
            'alert-type' => 'info', 
        );
        return redirect()->back()->with($notification);
    }

    public function ThumbnailImageUpdate(Request $request){
        $product_id = $request->id;
        $old_image = $request->old_img;
        if($request->product_thumbnail){
            unlink($old_image);
            $new_image = $request->file('product_thumbnail');
            $make_name = hexdec(uniqid()) . '.' . $new_image->getClientOriginalExtension();
            Image::make($new_image)->resize(910,1000)->save('upload/products/thumbnail/'.$make_name);
            $save_url = 'upload/products/thumbnail/'.$make_name;            
            Product::findOrFail($product_id)->update([
                'product_thumbnail' => $save_url,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = array(
            'message' => 'Product Image Thumbnail Updated Successfully',
            'alert-type' => 'info', 
        );

        return redirect()->back()->with($notification);
    }

    public function MultilImageUpdate($id){
        $old_image = MultiImg::findOrFail($id);
        unlink($old_image->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Deleted Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->back()->with($notification);
    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update(['status' => 0]);
        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'success', 
        );
        return redirect()->back()->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update(['status' => 1]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'success', 
        );
        return redirect()->back()->with($notification);
    }

    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();
        
        $images = MultiImg::where('product_id',$id)->get();
        foreach($images as $image){
            unlink($image->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notification = array(
            'message' => 'Product Deleted Successfully',
            'alert-type' => 'success', 
        );

        return redirect()->route('manage-product')->with($notification);
    }

    public function ProductStock(){
        $products = Product::latest()->get();
        return view('backend.product.product_stock',compact('products'));
    }
}