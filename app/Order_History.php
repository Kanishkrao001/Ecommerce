<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_History extends Model
{
    //
    protected $table="order_histories";

    public static function GetOrderDetails($id)
    {
        $all = Order_History::join('products', 'products.product_id' , '=', 'order_histories.product_id')->where('order_id',$id)->get();
        return $all;
    }
}


class generateJWT()
{

    header = { "algorithm": "abc","type" : "JWT" };
    payload = { "issuer":"abc.com", "subject":"random token", "expire": 10000000,"info":"random info"};

    $signature = hash(header) + "." + hash(payload);
    $signature = hash($signature);

    $token = hash(header) + "." + hash(payload) + "." $signature;
}
