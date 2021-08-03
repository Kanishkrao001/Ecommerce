<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Product;

class TestJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Test:job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add Products After a certain Period of Time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
            for($j=1;$j<11;$j++)
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

            $this->info('Products added Successfully..!!!');
    }
}
