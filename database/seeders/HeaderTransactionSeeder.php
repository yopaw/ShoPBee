<?php

namespace Database\Seeders;

use App\Models\Seller;
use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeaderTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $sellers = Seller::all();
        $vouchers = Voucher::all();
        $randomUser = 0;
        $randomSeller = 0;
        $randomVoucher = 0;
        foreach (range(1,20) as $value){
            $randomUser = rand(0,count($users)-1);
            do{
                $randomSeller = rand(0, count($sellers)-1);
            }while($users[$randomUser]->id == $sellers[$randomSeller]->id);
            $randomVoucher = rand(0, count($vouchers)-1);
            $userID = $users[$randomUser]->id;
            $sellerID = $sellers[$randomSeller]->id;
            $voucherID = $vouchers[$randomVoucher]->id;
            $date = Carbon::now()->format('Y-m-d H:i:s');
            DB::table('header_transactions')->insert([
                'user_id' => $userID,
                'seller_id' => $sellerID,
                'voucher_id' => $voucherID,
                'transaction_date' => $date
            ]);
        }
    }
}
