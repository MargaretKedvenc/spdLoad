<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['id' => 1, 'name' => 'new'],
            ['id' => 2, 'name' => 'wait to pay'],
            ['id' => 3, 'name' => 'paid'],
        ]);
    }
}
