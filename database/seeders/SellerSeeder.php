<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $users = User::all();
        foreach (range(1, count($users)) as $value){
            $random = rand(0,2);
            if($random == 1){
                $user_id = $users[$value-1]->id;
                $money = $users[$value-1]->money;
                $name = $faker->name. ' shop';
                DB::table('sellers')->insert([
                    'user_id' => $user_id,
                    'money' => $money,
                    'name' => $name
                ]);
            }
        }
    }
}
