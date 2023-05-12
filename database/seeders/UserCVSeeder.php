<?php

namespace Database\Seeders;

use App\Models\UserCV;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserCVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $technology = ['Dot Net', 'React JS', 'DevOps', 'QA', 'laravel' ];
//        $level = ['junior', 'senior', 'mid'];


        DB::table('user_c_v_s')->insert([
            'name' => Str::random(10),
            'age'  => mt_rand(18,30),
             'phone' => '987'.  mt_rand(1000000, 9999999),
            'email' => Str::random(10).'@gmail.com',
            'technology' => $technology[mt_rand(0,4)],
            'experience' => Str::random(10),

            'address' => Str::random(10),
        ]);

    }
}
