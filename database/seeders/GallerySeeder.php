<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = [
            [
                'game_id' => 1,
                'image' => 'valorant.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 2,
                'image' => 'gta-5.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 3,
                'image' => 'battlefield-2042.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 4,
                'image' => 'among-us.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 5,
                'image' => 'borderlands-3.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 6,
                'image' => 'farcry-6.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 7,
                'image' => 'hitman-3.jpg',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 8,
                'image' => 'neon-abyss.jpg',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 9,
                'image' => 'overcooked-2.jfif',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 10,
                'image' => 'read-dead-redemption-2.jpg',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 11,
                'image' => 'world-war-z.jpg',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 12,
                'image' => 'fortnite.jfif',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 13,
                'image' => 'eve-online.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 14,
                'image' => 'neverwinter.webp',
                'created_at' => new \DateTime,
            ],
            [
                'game_id' => 15,
                'image' => 'rogue-company.jfif',
                'created_at' => new \DateTime,
            ]
        ];

        DB::table('galleries')->insert($images);
    }
}
