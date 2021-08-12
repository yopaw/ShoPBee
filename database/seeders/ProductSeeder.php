<?php

namespace Database\Seeders;

use App\Models\ProductType;
use App\Models\Seller;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productTypes = ProductType::all();
        $sellers = Seller::all();
        foreach(range(1,10) as $value){
            $name = "product ".$value;
            $random = rand(0, count($productTypes)-1);
            $price = rand(10000,1000000);
            $description = $name."with price: ".$price;
            $stock = rand(10,100);
            $randomSeller = rand(0, count($sellers)-1);
            $sellerID = $sellers[$randomSeller]->id;
            $productTypeID = $productTypes[$random]->id;
            DB::table('products')->insert([
                'product_type_id' => $productTypeID,
                'seller_id' => $sellerID,
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'stock' => $stock
            ]);
        }
    }
}
