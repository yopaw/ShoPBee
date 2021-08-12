<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopVoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellers = Seller::all();
        $vouchers = Voucher::all();
        foreach ($vouchers as $voucher){
            foreach($sellers as $seller){
                $random = rand(0,1);
                if($random == 1){
                    DB::table('shop_vouchers')->insert([
                       'voucher_id' => $voucher->id,
                       'seller_id' => $seller->id,
                    ]);
                }
            }
        }
    }
}
