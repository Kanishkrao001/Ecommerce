<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use DB;

class Cart extends Model
{
    //
    protected $table='cart';

    // public function gettotal($customer_id)
    // {
    //     $sql = DB::
    // }

    public static function AddToCart(Request $request)
    {
        $cart = new Cart;
        $cart->customer_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->save();
        $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
        ->where(["product_id"=>"$request->product_id"])
        ->first();
        $cart->save();

        return $data;
    }

    public static function ViewCart($customer_id)
    {
        $data = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', $customer_id)->get();
        return $data;
    }

    public static function RemoveFromCart(Request $req)
    {
        Cart::destroy($req->id);

        $data = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', $req->customer_id)->get();

        return $data;
    }

    public static function CartWithProducts($id)
    {
        $pro = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', $id)->get();
        return $pro;
    }

    public static function GetTotalOfCart()
    {
        $total = Cart::join('products','products.product_id', '=', 'cart.product_id')
        ->where('customer_id', Auth::user()->id)
        ->sum('price');

        return $total;
    }
}
