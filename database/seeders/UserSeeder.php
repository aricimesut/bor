<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            "id" => 1, "email" => "admin@test.com", "password" => app('hash')->make('password'), "name" => "Admin"
        ]);
    }
}
