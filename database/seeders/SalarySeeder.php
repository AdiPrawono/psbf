<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('salaries')->insert([
            'employee_id' => 2,
            'salary' => 10000000,
            'status' => 'sudah dibayarkan',
            'start_date' => '2021-01-01',
            'end_date' => '2021-12-31',
        ]);
    }
}
