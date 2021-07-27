<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    //
    protected $table='products';
    protected $primaryKey = 'product_id';

    // protected $fillable= ['category_id','Product_Name', 'Product_Description', 'price', 'image', 'Pieces_available'];
    public static function addProducts( $id )
    {
        $data = Product::find($id);
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

    public static function viewall()
    {
        $pro = Product::paginate(3);
        return $pro;
    }

    public static function SearchProducts(Request $req)
    {
        $res = Product::where('Product_Name', 'like', '%'.$req->input('query').'%')->paginate(10);
        $res->appends(['query' => $req->input('query')]);

        return $res;
    }

    public static function detailsofProduct($product_id)
    {
        $data = Product::find($product_id);
        return $data;
    }
}
