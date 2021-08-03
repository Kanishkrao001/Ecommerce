<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $all = Product::all();

        foreach($all as $item)
        {
            DB::table('products')->insert([
                "category_id" =>$item->category_id,
                "Product_Name" => $item->Product_Name,
                "Product_Description" => $item->Product_Description,
                "image" => $item->image,
                "price" => $item->price,
                "Pieces_available" => $item->Pieces_available
            ]);
        }
    }
}
