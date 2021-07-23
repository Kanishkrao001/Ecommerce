<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;
use App\Cart;
use App\Product;
use App\User;

class ProductController extends Controller
{
    //
    public function viewall()
    {
        $pro = Product::paginate(3);
        return view('allproducts', compact('pro'));
    }
    public function index()
    {
        return view('home');
    }
    public function AddToCart(Request $request)
    {
            if(!Auth::guest()){
           
            $cart = new Cart;
            // $cart->customer_id = $request->session()->get('user')['customer_id'];
            $cart->customer_id = Auth::id();
            $cart->product_id = $request->product_id;
            $cart->save();
            $data = DB::table('products')->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->where(["product_id"=>"$request->product_id"])
            ->first();
            $cart->save();

            return redirect("/$data->category");
        }
        else{
            return redirect('/login');
        }
    }

    public function details($product_id)
    {
        $data = Product::find($product_id);
        return view('details', compact('data'));
    }

    public function cart($customer_id)
    {
        if(!Auth::guest()){
            $data = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', $customer_id)->get();
            // print_r(Auth::user()->name);
            // die();
            return view('cart', compact('data'));
        }
        else{
            return redirect('/login');
        }
    }

    public function remove(Request $req, $id)
    {
        // return "removed from cart";
        if(!Auth::guest()){

            Cart::destroy($id);

            $data = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', $req->customer_id)->get();
           
            return view('cart', compact('data'));
        }
        else{
            return redirect('/login');
        }
    }
    public function view($id)
    {
        return view('cart');
    }

    public function buy($id)
    {
        if(!Auth::guest()){
            $data = User::join('userinfo','userinfo.id', '=', 'users.id')->where('users.id', $id)->get();
            // print_r($data);
            return view('checkout', compact('data'));
        }
        else{
            redirect('/login');
        }
    }

    public function payment($id)
    {
        if(!Auth::guest()){
           return "Payment Successful";
        }
        else{
            redirect('/login');
        }
    }
}
