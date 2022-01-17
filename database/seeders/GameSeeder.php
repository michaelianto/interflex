<?php 

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Riot
        //Rockstar
        //Ubisoft
        //EA
        //fps, open,action, casual, shooting, mmorpg, strategy
        $games = [
            [
                'name' => 'VALORANT',
                'developer_id' => 1,
                'category_id' => 1,
                'release_date' => new \DateTime,
                'description' => 'VALORANT is a character-based 5v5 tactical shooter set on the global stage. Outwit, outplay, and outshine your competition with tactical abilities, precise gunplay, and adaptive teamwork.',
                'price' => 0,
                'discount' => 0,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'GTA 5',
                'developer_id' => 2,
                'category_id' => 2,
                'release_date' => new \DateTime,
                'description' => 'When a young street hustler, a retired bank robber and a terrifying psychopath land themselves in trouble, they must pull off a series of dangerous heists to survive in a city in which they can trust nobody, least of all each other.',
                'price' => 300750,
                'discount' => 50,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Battlefield 2042',
                'developer_id' => 4,
                'category_id' => 1,
                'release_date' => new \DateTime,
                'description' => 'Battlefield™ 2042 marks the return to the iconic all-out warfare of the franchise. Squad up and bring a cutting-edge arsenal into massive-scale battlegrounds, set in a near-future world transformed by disorder',
                'price' => 659000,
                'discount' => 34,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Among Us',
                'developer_id' => 5,
                'category_id' => 4,
                'release_date' => new \DateTime,
                'description' => 'Play with 4-15 players online or via local WiFi as you attempt to prepare your spaceship for departure, but beware as one or more random players among the Crew are Impostors bent on killing everyone!',
                'price' => 26999,
                'discount' => 25,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Borderlands 3',
                'developer_id' => 6,
                'category_id' => 1,
                'release_date' => new \DateTime,
                'description' => 'The original shooter-looter returns, packing bazillions of guns and a mayhem-fueled adventure! Blast through new worlds & enemies and save your home from the most ruthless cult leaders in the galaxy.',
                'price' => 555000,
                'discount' => 75,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'FarCry 6',
                'developer_id' => 1,
                'category_id' => 1,
                'release_date' => new \DateTime,
                'description' => 'VALORANT is a character-based 5v5 tactical shooter set on the global stage. Outwit, outplay, and outshine your competition with tactical abilities, precise gunplay, and adaptive teamwork.',
                'price' => 619000,
                'discount' => 35,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Hitman 3',
                'developer_id' => 1,
                'category_id' => 1,
                'release_date' => new \DateTime,
                'description' => 'Death Awaits. Agent 47 returns in HITMAN 3, the dramatic conclusion to the World of Assassination trilogy.',
                'price' => 331000,
                'discount' => 60,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Neon Abyss',
                'developer_id' => 2,
                'category_id' => 4,
                'release_date' => new \DateTime,
                'description' => 'Neon Abyss is a frantic, roguelike where you run ‘n’ gun your way into the Abyss as part of the ‘Grim Squad’. Featuring unlimited item synergies and a unique dungeon evolution system, each run diversifies the experience and every choice alters the ruleset.',
                'price' => 115000,
                'discount' => 0,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Overcooked! 2',
                'developer_id' => 3,
                'category_id' => 4,
                'release_date' => new \DateTime,
                'description' => 'Overcooked returns with a brand-new helping of chaotic cooking action! Journey back to the Onion Kingdom and assemble your team of chefs in classic couch co-op or online play for up to four players. Hold onto your aprons … it\'s time to save the world (again!)',
                'price' => 134999,
                'discount' => 75,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Read Dead Redemption 2',
                'developer_id' => 2,
                'category_id' => 2,
                'release_date' => new \DateTime,
                'description' => 'Winner of over 175 Game of the Year Awards and recipient of over 250 perfect scores, Red Dead Redemption 2 is an epic tale of honor and loyalty at the dawn of the modern age. Includes Red Dead Redemption 2: Story Mode and Red Dead Online.',
                'price' => 640000,
                'discount' => 50,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'World War Z',
                'developer_id' => 3,
                'category_id' => 1,
                'release_date' => new \DateTime,
                'description' => 'World War Z is a heart-pounding coop third-person shooter for up to 4 players featuring swarms of hundreds of zombies. Based on the Paramount Pictures film, World War Z focuses on fast-paced gameplay while exploring new storylines from around the world.',
                'price' => 134999,
                'discount' => 0,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Fortnite',
                'developer_id' => 3,
                'category_id' => 5,
                'release_date' => new \DateTime,
                'description' => 'The Island you once knew has been turned upside down...literally. Step foot onto the new Island and explore every corner of an undiscovered world in Fortnite Chapter 3 Season 1: Flipped.',
                'price' => 0,
                'discount' => 0,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Eve Online',
                'developer_id' => 4,
                'category_id' => 6,
                'release_date' => new \DateTime,
                'description' => 'EVE Online is a free-to-play community driven space MMO where players can choose their own path from countless options. Experience space exploration, immense PvP and PvE battles, mining, industry and a thriving player economy in an ever-expanding sandbox!',
                'price' => 0,
                'discount' => 0,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Neverwinter',
                'developer_id' => 3,
                'category_id' => 4,
                'release_date' => new \DateTime,
                'description' => 'Neverwinter is a free, action MMORPG based on the acclaimed Dungeons & Dragons fantasy roleplaying game. Epic stories, action combat and classic roleplaying await those heroes courageous enough to enter the fantastic world of Neverwinter!',
                'price' => 0,
                'discount' => 0,
                'created_at' => new \DateTime,
            ],
            [
                'name' => 'Rogue Company',
                'developer_id' => 1,
                'category_id' => 7,
                'release_date' => new \DateTime,
                'description' => 'Join 20+ million players in Rogue Company, the ultimate third-person tactical action shooter! Become an agent of Rogue Company and wield powerful weapons, high-tech gadgets, and game-changing abilities. Accept the mission and jump into a variety of 4v4 and 6v6 game modes. Play FREE today!',
                'price' => 0,
                'discount' => 0,
                'created_at' => new \DateTime,
            ]
        ];

        DB::table('games')->insert($games);

    }
} 
