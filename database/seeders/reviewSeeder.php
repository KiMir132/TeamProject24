<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class reviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'ProductID' => 1,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Great product, very sustainable!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 2,
                'UID' => 1,
                'Rating' => 5,
                'Description' => 'Great preformance for price.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 3,
                'UID' => 1,
                'Rating' => 3.5,
                'Description' => 'Great preformance, cheaper alternatives avaliable.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 1,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Great product, very sustainable!',
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
