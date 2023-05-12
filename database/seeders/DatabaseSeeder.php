<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserCV;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


            $technology = ['Dot Net', 'React JS', 'DevOps', 'QA', 'laravel' ];
        $level = ['junior', 'senior', 'mid'];

        \App\Models\UserCV::factory(10)->create([
            'name' => Str::random(10),
            'age'  => mt_rand(18,30),
            'phone' => '987'.  mt_rand(1000000, 9999999),
            'email' => Str::random(10).'@gmail.com',
            'technology' => $technology[mt_rand(0,4)],
            'level' => $level[mt_rand(0,2)],
            'salary' => mt_rand(5000,100000),
            'experience' => Str::random(10),
            'document' => Str::random(10),
            'address' => Str::random(10),
            'references' => Str::random(10),
        ]);

        $this->call([

                UserCVSeeder::class,
//                HRSeeder::class,
        ]);
    }
}
