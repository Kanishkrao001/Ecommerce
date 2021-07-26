<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='products';
    protected $primaryKey = 'product_id';

    protected $fillable= ['category_id','Product_Name', 'Product_Description', 'price', 'image', 'Pieces_available'];
}
