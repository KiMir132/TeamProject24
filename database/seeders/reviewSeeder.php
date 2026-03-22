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
                'ProductID' => 4,
                'UID' => 1,
                'Rating' => 1.5,
                'Description' => 'Lasted 3 months before it broke down.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 5,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Great product, very sustainable!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 6,
                'UID' => 1,
                'Rating' => 3,
                'Description' => 'Great product, very sustainable!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 7,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Great product, very sustainable!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 8,
                'UID' => 1,
                'Rating' => 4.0,
                'Description' => 'Efficient power supply and easy to install.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 9,
                'UID' => 1,
                'Rating' => 3.5,
                'Description' => 'Nice-looking case, but cable management could be better.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 10,
                'UID' => 1,
                'Rating' => 5.0,
                'Description' => 'Excellent cooling performance and very quiet.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 11,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Comfortable mouse with accurate tracking.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 12,
                'UID' => 1,
                'Rating' => 4.0,
                'Description' => 'Solid keyboard with satisfying switches and RGB lighting.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 13,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Smooth refresh rate and very good colour quality.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 14,
                'UID' => 1,
                'Rating' => 4.0,
                'Description' => 'Comfortable headset with clear audio.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 15,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Strong WiFi coverage and stable connection.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 16,
                'UID' => 1,
                'Rating' => 3.5,
                'Description' => 'Works well for streaming, but a bit pricey.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 17,
                'UID' => 1,
                'Rating' => 4.0,
                'Description' => 'Affordable monitor with decent image quality.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 18,
                'UID' => 1,
                'Rating' => 4.0,
                'Description' => 'Great RAM kit for multitasking and gaming.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 19,
                'UID' => 1,
                'Rating' => 3.5,
                'Description' => 'Good budget SSD and noticeably improves boot times.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 20,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Excellent phone with a premium feel and strong camera quality.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 21,
                'UID' => 1,
                'Rating' => 5.0,
                'Description' => 'Fantastic display, camera, and battery life.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 22,
                'UID' => 1,
                'Rating' => 4.5,
                'Description' => 'Very smooth performance and impressive camera features.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 23,
                'UID' => 1,
                'Rating' => 4.0,
                'Description' => 'Fast phone with good value for the specs.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ProductID' => 24,
                'UID' => 1,
                'Rating' => 3.5,
                'Description' => 'Decent features, but the price feels a little high.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
