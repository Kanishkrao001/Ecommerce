<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use DB;

class Order extends Model
{
    //
    protected $table='orders';

    public static function SaveOrder(Request $req, $total)
    {
        $order= new Order;
        $order->customer_id = Auth::user()->id;
        $order->mode_of_payment = $req->payment;
        $order->address = $req->address;
        $order->paid = 0;
        $order->total = $total;
        
        $order->save();

        return $order->id;
    }
}
