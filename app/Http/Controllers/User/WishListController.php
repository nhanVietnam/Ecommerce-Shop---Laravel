<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;

class WishListController extends Controller
{
    public function ViewWishlist(){
        $brands = Brand::orderBy('brand_name_en','ASC')->get();
        return view('frontend.wishlist.view_wishlist',compact('brands'));
    }

    public function GetWishlistProduct(){
        $wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        foreach($wishlist as $item){
            // dd($item->product->selling_price);
            $item->product->selling_price = str_replace(',','.',number_format($item->product->selling_price));
            if($item->product->discount_price != '' || $item->product->discount_price != ''){
                $item->product->discount_price = str_replace(',','.',number_format($item->product->discount_price));
            }
        }
        return response()->json($wishlist);
    }

    public function RemoveWishlistProduct($id){
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Successfully Product Remove']);
    }
}