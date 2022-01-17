<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $developers = [
            [
                'name' => 'Riot Games',
                'location' => 'Los Angeles, California, USA',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Rockstar',
                'location' => 'New York, USA',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Ubisoft',
                'location' => 'Rennes, France',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'EA',
                'location' => 'Redwood City, California, USA',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Innersloth',
                'location' => 'Washington, USA',
                'created_at' => new \DateTime
            ],
            [
                'name' => 'Gearbox Software',
                'location' => 'Frisco, Texas, USA',
                'created_at' => new \DateTime
            ],
        ];

        DB::table('developers')->insert($developers);
    }
}
