<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '0123456789',
            'created_at' => new \DateTime
        ]);

        DB::table('users')->insert([
            'name' => 'member1',
            'email' => 'member1@gmail.com',
            'password' => Hash::make('member123'),
            'phone' => '0123456789',
            'created_at' => new \DateTime
        ]);

        DB::table('users')->insert([
            'name' => 'member2',
            'email' => 'member2@gmail.com',
            'password' => Hash::make('member123'),
            'phone' => '0123456789',
            'created_at' => new \DateTime
        ]);
    }
}
