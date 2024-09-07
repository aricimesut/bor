<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            ['id' => 1, 'name' => 'Ahmet A.'],
            ['id' => 2, 'name' => 'Ayşe B.'],
            ['id' => 3, 'name' => 'Mehmet C.'],
            ['id' => 4, 'name' => 'Fatma D.'],
        ]);
    }
}
