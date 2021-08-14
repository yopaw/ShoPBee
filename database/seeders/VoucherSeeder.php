<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $voucher_names = array("GFAwalBulan", "GKHEMAT", "GFBERSATU");
        foreach (range(1,10) as $value){
            $random = rand(0,count($voucher_names)-1);
            $name = $voucher_names[$random] .$value;
            $discount = rand(35,50);
            $minimum_price = rand(30000,50000);
            $maximum_price = rand($minimum_price+20000, $minimum_price+50000);
            $description = 'a Voucher with '. $discount.' discount with '. $minimum_price.
                ' as the minimum price and '.$maximum_price.' as the maximum price';
            $stock = rand(10,1000);
            DB::table('vouchers')->insert([
                'name' => $name,
                'discount' => $discount,
                'description' => $description,
                'minimum_price' => $minimum_price,
                'maximum_price' => $maximum_price,
                'stock' => $stock
            ]);
        }
    }
}
