<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
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
        $users = User::all();
        foreach (range(1, count($users)) as $value){
            $random = rand(0,1);
            $userID = $users[$value-1]->id;
            $name = $users[$value-1]->username. ' shop';
            $date = Carbon::now()->format('Y-m-d H:i:s');
            $statusID = rand(1,2);
            echo $statusID;
            DB::table('requests')->insert([
                'user_id' => $userID,
                'seller_name' => $name,
                'status_id' => $statusID,
                'reason' => 'not a real seller',
                'description' => 'I want to be a Sailor',
                'date' => $date
            ]);
            if($random == 1){
                $statusID = 3;
                $money = $users[$value-1]->money;
                DB::table('sellers')->insert([
                    'user_id' => $userID,
                    'money' => $money,
                    'name' => $name
                ]);
                DB::table('requests')->insert([
                    'user_id' => $userID,
                    'seller_name' => $name,
                    'status_id' => $statusID,
                    'reason' => 'a real seller',
                    'description' => 'I want to be a Seller',
                    'date' => $date
                ]);
            }
        }
    }
}
