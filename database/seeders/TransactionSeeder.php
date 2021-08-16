<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Seller;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
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
        $vouchers = null;
        $randomUser = 0;
        $randomSeller = 0;
        $randomVoucher = 0;

        foreach (range(1,20) as $value){
            $randomUser = rand(0,count($users)-1);
            do{
                $randomSeller = rand(0, count($sellers)-1);
            }while($users[$randomUser]->id == $sellers[$randomSeller]->id ||
                count($sellers[$randomSeller]->vouchers()->get()) == 0);
            $vouchers = $sellers[$randomSeller]->vouchers()->get();
            $randomVoucher = rand(0, count($vouchers)-1);
            $userID = $users[$randomUser]->id;
            $sellerID = $sellers[$randomSeller]->id;
            $voucherID = $vouchers[$randomVoucher]->id;
            $date = Carbon::now()->format('Y-m-d H:i:s');
            DB::table('transactions')->insert([
                'user_id' => $userID,
                'seller_id' => $sellerID,
                'voucher_id' => $voucherID,
                'date' => $date
            ]);
        }

        $transactions = Transaction::all();
        $products = Product::all();
        foreach (range(1,count($transactions)) as $i){
            $random = rand(1,5);
            foreach(range(1, $random) as $j){
                DB::table('product_transaction')->insert([
                    'product_id' => $products[$j-1]->id,
                    'transaction_id' => $transactions[$i-1]->id,
                    'quantity' => rand(1,10)
                ]);
            }
        }
    }
}
