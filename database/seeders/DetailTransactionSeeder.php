<?php

namespace Database\Seeders;

use App\Models\HeaderTransaction;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = HeaderTransaction::all();
        $products = Product::all();
        foreach (range(1,count($transactions)) as $i){
            $random = rand(1,5);
            foreach(range(1, $random) as $j){
                DB::table('detail_transactions')->insert([
                    'product_id' => $products[$j-1]->id,
                    'header_transaction_id' => $transactions[$i-1]->id,
                    'quantity' => rand(1,10)
                ]);
            }
        }
    }
}
