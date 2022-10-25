<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use App\Models\Coupon;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function AddToCart(Request $request,$id){
        $product = Product::findOrFail($id);

        if($product->discount_price == NULL ){
            Cart::add([
               'id' => $id,
               'name' => $request->product_name,
               'qty' => $request->quantity,
               'price' => $product->selling_price,
               'weight' => 1,
               'options' => [
                   'images'=>$product->product_thumbnail,
                   'color'=> $request->color,
                   'size' => $request->size,
               ]
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);
        } else {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'images'=>$product->product_thumbnail,
                    'color'=> $request->color,
                    'size' => $request->size,
                ]
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);   
        }
    }

    public function AddMiniCart(){
        $carts = Cart::content();
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => $cartTotal,
        ));
    }

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Remove From Cart']);
    }

    public function AddToWishlist(Request $request ,$product_id){
        if(Auth::check()){
            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first(); 

            if(!$exists){
                Wishlist::insert([
                    'user_id'=>Auth::id(),
                    'product_id'=>$product_id,
                    'created_at'=>Carbon::now(),
                ]);
                
                return response()->json([
                    'success'=> 'Successfully Added On Your Wishlist', 
                ]);
            } else {
                return response()->json([
                    'error'=> 'This Product Has Already On Your Wishlist', 
                ]);
            }
            
        } else {
            return response()->json([
                'error'=> 'At First Login Your Account', 
            ]);
        }
    }

    public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
        // dd(intval(str_replace('.','',Cart::total())));
        if($coupon){
            Session::put('coupon',[
                'coupon_name'=>$coupon->coupon_name,
                'coupon_discount'=>$coupon->coupon_discount,
                'discount_amount'=>intval(str_replace('.','',Cart::total()))*$coupon->coupon_discount/100,
                'total_amount'=>intval(str_replace('.','',Cart::total())) - intval(str_replace('.','',Cart::total())) * $coupon->coupon_discount/100,
            ]);
            return response()->json(array(
                'success' => 'Coupon Applied Successfully',
            ));     
        } else {
            return response()->json(['error' => 'Invalid Coupon']);  
        }
    }

    public function CouponCalculation(){
        if(Session::has('coupon')){
            // dd('Im hrea');
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount'=> session()->get('coupon')['coupon_discount'],
                'discount_amount'=> intval(str_replace('.','',Cart::total())) * session()->get('coupon')['coupon_discount']/100,
                'total_amount'=> intval(str_replace('.','',Cart::total())) - intval(str_replace('.','',Cart::total())) * session()->get('coupon')['coupon_discount']/100,
            ));
        } else {
            return response()->json(array('total' => Cart::total()));  
        }
    }

    public function CouponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Removed Successfully']);  

    }

    public function CheckoutCreate(){
        if(Auth::check()){
            if(Cart::total() > 0){
                $carts = Cart::content();
                // dd($carts);
                $cartQuantity = Cart::count();
                $cartTotal = Cart::total();

                $divisions = ShipDivision::orderBy('division_name','ASC')->get();
                $districts = ShipDistrict::orderBy('district_name','ASC')->get();
                return view('frontend.checkout.checkout_view',compact('carts','cartQuantity','cartTotal','divisions','districts'));
            } else {
                $notification = array(
                    'message' => 'Shopping At Least One Product',
                    'alert-type' => 'error'  
                );
                return redirect('/')->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'You Need To Login First',
                'alert-type' => 'error'  
            );
        }
        return redirect()->route('login')->with($notification);
    }
}