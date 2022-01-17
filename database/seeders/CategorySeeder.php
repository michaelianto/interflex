<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'First Person Shooter',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Open World',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Action',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Casual',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Shooting',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'MMORPG',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Strategy',
                'created_at' => new \DateTime
            ]
        ];

        DB::table('categories')->insert($categories);
    }
}
