<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->insert([
            ['id' => 1, 'plate' => '35ABC123'],
            ['id' => 2, 'plate' => '35DEF456'],
            ['id' => 3, 'plate' => '35GHI789'],
        ]);
    }
}
