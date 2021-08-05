<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Product;
use App\User;
use App\Order;
use App\Order_History;

class Test extends Model
{
    //
    // protected $connection = 'mysql1'
    protected $table = "orders";
    public static function getorder($order_id)
    {
        $orders = Test::where('id', $order_id)->get();
        return $orders;
    }

    public static function GetOrderByDate($date)
    {
        $orders = Test::where('customer_id', 3)->where('created_at', '>', $date)->get();
        return $orders;
    }

    public static function GetOrderByModeOfPayment($mode_of_payment)
    {
        $orders = Test::where('mode_of_payment', $mode_of_payment)->get();
        return $orders;
    }

    public static function getOrdersFromAllFilters($order_no, $date, $mode_of_payment, $limit, $page_no)
    {
        // return $order_no;
        $users = Test::select('*');

        if(!empty($order_no))
        {
            $users = $users->where('id', $order_no);
        }
        if(!empty($date))
        {
            $users = $users->where('customer_id', 3)->where('created_at', '>=', $date);
        }
        if(!empty($mode_of_payment))
        {
            $users = $users->where('mode_of_payment', $mode_of_payment);
        }
        return $users->skip($page_no*$limit)->take($limit)->get();
    }
}
