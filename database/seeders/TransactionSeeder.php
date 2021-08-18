<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Transaction;
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
        $carts = Cart::all();
        foreach ($carts as $cart){
            $seller = $cart->seller;
            $date = Carbon::now()->format('Y-m-d H:i:s');
            $vouchers = $seller->vouchers;
            $randomVoucher = rand(0, count($vouchers)-1);

            DB::table('transactions')->insert([
                'user_id' => $cart->user->id,
                'seller_id' => $cart->seller->id,
                'voucher_id' => $vouchers[$randomVoucher]->id,
                'date' => $date
            ]);

            $transaction = Transaction::all()->last();

            $products = $cart->products;
            $randomProduct = rand(1,count($products));
            foreach(range(1, $randomProduct) as $j){
                DB::table('product_transaction')->insert([
                    'product_id' => $products[$j-1]->id,
                    'transaction_id' => $transaction->id,
                    'quantity' => rand(1,10)
                ]);
            }
        }
    }
}
