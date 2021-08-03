<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use DB;
use App\Cart;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use App\Order_History;
use App\Test;


class ProductController extends Controller
{
    public function userssecond()
    {
        // $profiles = Test::where('email','=', 'kartik@gmail.com')->get();
        $profiles = Test::join('cart', 'users.id', '=', 'cart.user_id')->get();
        print_r($profiles);
    }

    public function anotherway()
    {
        $profiles = DB::connection('mysql2')->table('users')->where('email','=', 'kartik@gmail.com')->get();
        print_r($profiles);
    }

    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        $profile = User::find(Auth::id());
        return $profile;
        // $user = User::find(Auth::id());
        // $age = $user->age;
        // return $age;
    }

    public function product($id)
    {
        $category = Product::where('product_id','=', $id)->pluck('category_id');
        return $category[0];
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
        return redirect('/home');
    }

    public function search(Request $req)
    {
        $res = Product::SearchProducts($req);
        return view('search', compact('res'));
    
        // $idd = Product::join('categories', 'categories.category_id ' , '=', 'products.category_id ')->get();
    }


    public function AddToCart(Request $request)
    {
        // $data = Cart::AddToCart($request);
        Cart::AddToCart($request);

        // return redirect("/$data->category");
        return response()->json();
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

    public function delete(Request $req)
    {
        // return $req->input();
        // die();
        $temp = Cart::find($req->id)->delete();
        // print_r($temp);
        // return response()->json([
        //     'success' => 'Record deleted successfully',
        //     'error' => 'Error aa gaya'
        // ]);
        return json_encode([
                'success' => 'Record deleted successfully',
                'error' => 'Error aa gaya',
                'abc' => $temp
        ]);
        // $data = Cart::join('products','products.product_id', '=', 'cart.product_id')->where('customer_id', $req->customer_id)->get();
        // return response()->json();
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
       $orders = Order::where('customer_id', Auth::id())->orderBy('id','desc')->get();
       return view('orders', compact('orders'));
    //    return $order_id; 
    //    $orders = array();
    //    foreach($orders as $order)
    // print_r($orders);
    //   foreach($orders as $id)
    //   {
    //       print_r($id);
    //   }
    //    {
    //        $temp = $order->order_history->where('order_id', 13)->get();
    //     //    $products = Order_History::where('order_id', $id)->pluck('product_id');
    //     //    if(count($products) > 0)
    //     //    foreach($products as $pid)
    //     //    {

    //     //    }
    //        print_r($temp) ;
    //     //    $orders[] = $products;
    //    }

    //    print_r($orders);
    //   return view('orders', compact('orders'));
    }

    public function orderHistory($id)
    {
        $all = Order_History::GetOrderDetails($id);
        return view('orderpage', compact('all'));
    }
}
