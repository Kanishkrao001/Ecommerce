<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;
use App\Cart;
use App\Product;
use App\User;
use App\Order;
use App\Order_History;


class ProductController extends Controller
{
    public function index()
    {
        return view('home');
    }
 
    public function viewall()
    {
        $pro = Product::viewall();
        return view('allproducts', compact('pro'));
    }

    public function bulk()
    {
        for($i=0 ; $i< 1000 ; $i++)
        {
            for($j=1;$j<22;$j++)
            {
                Product::addProducts($j);
            }
        }
    }

    public function search(Request $req)
    {
        $res = Product::SearchProducts($req);
        return view('search', compact('res'));
    }


    public function AddToCart(Request $request)
    {
        $data = Cart::AddToCart($request);

        return redirect("/$data->category");
    }

    public function details($product_id)
    {
        $data = Product::detailsofProduct($product_id);
        return view('details', compact('data'));
    }

    public function cart($customer_id)
    {
        $data = Cart::ViewCart($customer_id);
        return view('cart', compact('data'));
    }

    public function remove(Request $req, $id)
    {
        $data = Cart::RemoveFromCart($req, $id);
       
        return view('cart', compact('data'));
    }

    public function view($id)
    {
        return view('cart');
    }

    public function buy(Request $req, $id)
    {
        $data = User::userWithUserinfo($id);
        $pro = Cart::CartWithProducts($id);
       
        return view('checkout', compact('data','pro'));
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
        $total = Cart::GetTotalOfCart();
        
        $order_id = Order::SaveOrder($req, $total);

        $id = Cart::join('products','products.product_id', '=', 'cart.product_id')
        ->where('customer_id', Auth::user()->id)->pluck('products.product_id');
        // return $id;

     
           foreach($id as $i)
           {
            $save = new Order_History;
            $save->order_id = $order_id;
            $save->user_id = Auth::user()->id;
            $save->product_id = $i;
            $save->save();
           }
         
           $customer_id = Auth::user()->id;

           Cart::where('customer_id', Auth::user()->id)->delete();

        return view('buy');
    }

    public function history()
    {
       $order = Order::where('customer_id', Auth::id())->get();
       return $order[0]; 
    //    $details = Order_History::join('orders', 'order_histories.cart_id', '=', 'orders.id')->pluck('')
    }
}
