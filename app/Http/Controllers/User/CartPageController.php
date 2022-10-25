<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPageController extends Controller
{
    public function MyCart(){
        return view('frontend.wishlist.view_mycart');
    }

    public function GetCardProduct(){
        $carts = Cart::content();
        // foreach($carts as $cart){
        //     dd($cart->price);
        //     $cart->price = str_replace(',','.',number_format($cart->price));
        // }
        $cartQuantity = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQuantity,
            'cartTotal' => $cartTotal,
        ));
    }

    public function RemoveCardProduct($id){
        Cart::remove($id);
        return response()->json(['success' => 'Product Remove From Cart']);
    }

    public function CartIncrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty + 1);
        return response()->json('Increase');
    }

    public function CartDecrement($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId,$row->qty - 1);
        return response()->json('Decrease');
    }
}