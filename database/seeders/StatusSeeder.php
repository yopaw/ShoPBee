<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = ['Pending', 'Rejected', 'Accepted'];

        foreach($statuses as $status){
            DB::table('status')
                ->insert([
                   'name' => $status
                ]);
        }
    }
}
