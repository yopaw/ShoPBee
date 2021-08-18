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
        $sellers = Seller::all();
        foreach(range(1,10) as $value){
            $name = "product ".$value;
            $price = rand(10000,1000000);
            $description = $name." with price: ".$price;
            $stock = rand(10,100);
            $randomSeller = rand(0, count($sellers)-1);
            $sellerID = $sellers[$randomSeller]->id;
            DB::table('products')->insert([
                'seller_id' => $sellerID,
                'name' => $name,
                'price' => $price,
                'description' => $description,
                'stock' => $stock,
                'image' => '6adhqAE8ahLWMVvq5iDeOWCvqGxpPBfCSTbUHHhn.jpg'
            ]);
        }
    }
}
