<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $password = Hash::make('secret');

        DB::table('users')->insert([[
            'id' => 1,
            'name' => 'user1',
            'email' => 'user1@mail.com',
            'password' => $password,
        ], [
            'id' => 2,
            'name' => 'user2',
            'email' => 'user2@mail.com',
            'password' => $password,
        ], [
            'id' => 3,
            'name' => 'user3',
            'email' => 'user3@mail.com',
            'password' => $password,
        ], [
            'id' => 4,
            'name' => 'user4',
            'email' => 'user4@mail.com',
            'password' => $password,
        ], [
            'id' => 5,
            'name' => 'user5',
            'email' => 'user5@mail.com',
            'password' => $password,
        ]]);
    }
}
