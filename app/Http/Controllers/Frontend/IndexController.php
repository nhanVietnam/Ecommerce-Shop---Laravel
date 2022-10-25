<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $blogpost = BlogPost::latest()->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();

        $products = Product::where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $categories = Category::orderBy('category_name_vn','ASC')->get();

        $featureds = Product::where('featured',1)->orderBy('id','DESC')->limit(6)->get();
        $hot_deals = Product::whereNotNull('discount_price')->orWhere('hot_deals','==',1)->orderBy('id','DESC')->limit(3)->get();
        // dd($hot_deals);
        $special_offers = Product::where('special_offer',1)->orderBy('id','DESC')->limit(3)->get();
        $special_deals = Product::where('special_deal',1)->orderBy('id','DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        $skip_category_1 = Category::skip(1)->first();
        $skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

        $skip_brand_0= Brand::skip(0)->first();
        $skip_brand_product_0 = Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();
        
        return view('frontend.index',compact('categories','brands','sliders','products','featureds','hot_deals','special_offers','special_deals','skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_0','skip_brand_product_0','blogpost'));
    }
    
    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile',compact('user'));
    }

    public function UserProfileStore(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi').strtolower($file->getClientOriginalName());
            $file->move(public_path('upload/user_images'),$filename);

            $data['profile_photo_path'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Succesfully',
            'alert-type' => 'success',
        );

        return redirect()->route('dashboard')->with($notification);
    }
    
    public function UserChangePassword(){
        $user = User::find(Auth::id());
        return view('frontend.profile.change_password',compact('user'));
    }

    public function UserPasswordUpdate(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $hashedPassword = Auth::user()->password;
        
        if(Hash::check($request->oldpassword,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            
            return redirect()->route('user.logout');
        }
        
        return redirect()->back();
    }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function ProductDetails($id,$slug){
        $product = Product::findOrFail($id);

        $color_vn = $product->product_color_vn;
        $product_color_vn = explode(',',$color_vn);
        
        $color_en = $product->product_color_en;
        $product_color_en = explode(',',$color_en);

        $size_vn = $product->product_size_vn;
        $product_size_vn = explode(',',$size_vn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',',$size_en);
        
        $images = MultiImg::where('product_id',$id)->get();

        $relatedProduct = Product::where('category_id',$id)->orWhere('id','!=',$id)->orderBy('id','DESC')->get();
        return view('frontend.product.product_details',compact('product','images','product_color_vn','product_color_en','product_size_vn','product_size_en','relatedProduct'));
    }

    public function TagWiseProduct($tag){
        $productTag = $tag;
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        $products = Product::where('status',1)->where('product_tag_vn',$tag)->orWhere('product_tag_en',$tag)->orderBy('id','DESC')->paginate(3);
        return view('frontend.tags.tags_view',compact('products','categories','brands','productTag'));
    }

    public function SubCatWiseProduct($subcategory_id,$slug){
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        $products = Product::where('status',1)->where('subcategory_id',$subcategory_id)->orderBy('id','DESC')->paginate(6);
        $breadsubcat = SubCategory::with(['category'])->where('id',$subcategory_id)->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('frontend.product.subcategory_view',compact('products','categories','breadsubcat','brands'));
    }

    public function SubSubCatWiseProduct($subsubcategory_id,$slug){
        $categories = Category::orderBy('category_name_vn','ASC')->get();
        $products = Product::where('status',1)->where('subsubcategory_id',$subsubcategory_id)->orderBy('id','DESC')->paginate(6);
        // dd($products);
        $breadsubsubcat = SubSubCategory::with(['category','subcategory'])->where('id',$subsubcategory_id)->get();
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('frontend.product.sub_subcategory_view',compact('products','categories','breadsubsubcat','brands'));
    }

    public function ProductViewAjax($id){
        $product = Product::with('category','brand')->findOrFail($id);
        // dd($product);
            $product->selling_price = str_replace(',','.',number_format($product->selling_price));
            $product->discount_price = str_replace(',','.',number_format($product->discount_price));
        $color = $product->product_color_vn;
        $product_color = explode(',',$color);

        $size = $product->product_size_vn;
        $product_size = explode(',',$size);

        return response()->json(array(
            'product'=> $product,
            'color'=> $product_color,
            'size'=> $product_size,
        ));
    }

    public function ProductSearch(Request $request){
        $request->validate([
            'search' => 'required',
        ]);

        $keywork = $request->search;
        $categories = Category::orderBy('category_name_vn','ASC')->get();

        $products = Product::where('product_name_vn','LIKE',"%$keywork%")->get();
        return view('frontend.product.search',compact('products','categories'));
    }

    public function ProductSearchAjax(Request $request){
        $request->validate([
            'search' => 'required',
        ]);

        $keywork = $request->search;

        $products = Product::where('product_name_vn','LIKE',"%$keywork%")->select('id','product_name_vn','product_thumbnail','selling_price','product_slug_vn')->limit(5)->get();
        return view('frontend.product.search_ajax',compact('products'));
    }
}