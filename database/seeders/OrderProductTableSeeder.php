<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('order_product')->insert([[
            'order_id' => 1,
            'product_id' => 1,
            'quantity' => 8,
        ], [
            'order_id' => 1,
            'product_id' => 2,
            'quantity' => 2,
        ], [
            'order_id' => 1,
            'product_id' => 3,
            'quantity' => 1,
        ], [
            'order_id' => 1,
            'product_id' => 4,
            'quantity' => 2,
        ]]);
    }
}
