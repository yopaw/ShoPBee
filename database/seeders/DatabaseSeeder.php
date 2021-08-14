<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            VoucherSeeder::class,
            StatusSeeder::class,
            SellerSeeder::class,
            ProductTypeSeeder::class,
            ProductSeeder::class,
            SellerVoucherSeeder::class,
            TransactionSeeder::class,
            CartSeeder::class
        ]);
    }
}
