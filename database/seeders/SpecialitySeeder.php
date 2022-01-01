<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
            'title' => 'Gynocology',
            'code' => '001',
        ]);
    }
}
