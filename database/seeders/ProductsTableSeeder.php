<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([[
            'id' => 1,
            'name' => 'Product 1',
            'logo_url' => 'https://image.freepik.com/free-vector/burger-logo_1366-144.jpg',
            'description' => 'some text',
            'price_id' => 1,
        ], [
            'id' => 2,
            'name' => 'Product 2',
            'logo_url' => null,
            'description' => 'some text',
            'price_id' => 2,
        ], [
            'id' => 3,
            'name' => 'Product 3',
            'logo_url' => null,
            'description' => 'some text',
            'price_id' => 3,
        ], [
            'id' => 4,
            'name' => 'Product 4',
            'logo_url' => null,
            'description' => 'some text',
            'price_id' => 4,
        ], [
            'id' => 5,
            'name' => 'Product 5',
            'logo_url' => null,
            'description' => 'some text',
            'price_id' => 5,
        ], [
            'id' => 6,
            'name' => 'Product 6',
            'logo_url' => null,
            'description' => 'some text',
            'price_id' => 6,
        ]]);
    }
}
