<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $value){
            $username = $faker->userName;
            $email = $faker->email;
            $password = bcrypt("asd");
            DB::table('users')->insert([
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'money' => rand(0,1000000),
                'role_id'=> 2
            ]);
        }
        DB::table('users')->insert([
            'username' => 'yopaw',
            'email' => 'yopaw@gmail.com',
            'password' => bcrypt('asd'),
            'money' => rand(0,1000000),
            'role_id'=> 2
        ]);
        DB::table('users')->insert([
            'username' => 'yopawz',
            'email' => 'yopawz@gmail.com',
            'password' => bcrypt('asd'),
            'money' => rand(0,1000000),
            'role_id'=> 1
        ]);
    }
}
