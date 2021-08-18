<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $products = Product::all();
        $sellers = Seller::all();
        $vouchers = Voucher::all();
        $randomSeller = 0;
        foreach($users as $user){
            $random = rand(0,1);
            if($random == 1){
                do{
                    $randomSeller = rand(0, count($sellers)-1);
                }while($sellers[$randomSeller]->id == $user->id);
                $randomVoucher = rand(0, count($vouchers)-1);
                DB::table('carts')->insert([
                    'seller_id' => $sellers[$randomSeller]->id,
                    'user_id' => $user->id,
                    'voucher_id' => $vouchers[$randomVoucher]->id,
                ]);
                $cart = Cart::all()->last();
                $randomProduct = rand(1, count($products));
                foreach (range(1,$randomProduct) as $value){
                    DB::table('cart_product')->insert([
                        'cart_id' => $cart->id,
                        'product_id' => $products[$value-1]->id,
                        'quantity' => rand(1, 10)
                    ]);
                }
            }
        }
    }
}
