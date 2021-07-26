<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;
use App\Cart;
use App\Product;
use App\User;
use App\Order;

class ProductController extends Controller
{
 
    public function viewall()
    {
        $pro = Product::paginate(3);
        return view('allproducts', compact('pro'));
    }
    public function index()
    {
        return view('home');
    }

    public function bulk()
    {
        for($i=0 ; $i< 1000 ; $i++)
        {
            for($j=1;$j<22;$j++)
            {
                $data = Product::find($j);
                // print_r($data['category_id']);
                $add = new Product;
                $add->category_id=$data['category_id'];
                $add->Product_Name=$data['Product_Name'];
                $add->Product_Description = $data['Product_Description'];
                $add->image=$data['image'];
                $add->price=$data['price'];
                $add->Pieces_available=$data['Pieces_available'];

                $add->save();
            }
        }
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
            return view('cart', compact('data'));
        }
        else{
            return redirect('/login');
        }
    }

    public function remove(Request $req, $id)
    {
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

    public function buy(Request $req, $id)
    {
        $pro= $req->input("data");

        if(!Auth::guest()){
            $dataa = User::join('userinfo','userinfo.id', '=', 'users.id')->where('users.id', $id)->get();
            // print_r($dataa);
            return view('checkout', compact('dataa','pro'));
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

    public function checkout(Request $req)
    {
        $data = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', Auth::user()->id)
        ->sum('price');
    
        // return $data;
        
        $order= new Order;
        $order->customer_id = Auth::user()->id;
        $order->mode_of_payment = $req->payment;
        $order->address = $req->address;
        $order->paid = 0;
        $order->total = $data;
        
        $order->save();

        return redirect('/home');
    }
}
