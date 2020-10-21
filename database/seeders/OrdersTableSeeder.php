<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('orders')->insert([[
            'id' => 1,
            'user_id' => 1,
            'status_id' => 2,
            'created_at' => $now,
        ], [
            'id' => 2,
            'user_id' => 1,
            'status_id' => 3,
            'created_at' => $now,
        ], [
            'id' => 3,
            'user_id' => 2,
            'status_id' => 2,
            'created_at' => $now,
        ], [
            'id' => 4,
            'user_id' => 3,
            'status_id' => 3,
            'created_at' => $now,
        ], [
            'id' => 5,
            'user_id' => 4,
            'status_id' => 1,
            'created_at' => $now,
        ]]);
    }
}
