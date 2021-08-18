<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        foreach ($users as $user) {
            $transactions = $user->transactions()->get();
            foreach ($transactions as $transaction) {
                $randomRating = rand(1, 5);
                DB::table('reviews')->insert([
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'content' => 'real content',
                    'rating' => $randomRating
                ]);
            }
        }
    }
}
