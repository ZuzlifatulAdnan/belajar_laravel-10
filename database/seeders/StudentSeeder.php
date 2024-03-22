<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        $data=[
            ['id'=>1, 'name'=>'Maryanto', 'score'=>80],
            ['id'=>2, 'name'=>'Ahmad', 'score'=>85],
            ['id'=>3, 'name'=>'Budi', 'score'=>90],
        ];

        DB::table('students')->insert($data);
    }
}
