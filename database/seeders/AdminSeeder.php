<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $username = $faker->userName;
        $email = $faker->email;
        $password = bcrypt("admin");
        DB::table('users')->insert([
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'money' => rand(0, 1000000),
            'role_id' => 1
        ]);
    }
}
