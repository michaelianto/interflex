<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = [
            [
                'user_id' => 1,
                'created_at' => new \DateTime
            ],
            [
                'user_id' => 2,
                'created_at' => new \DateTime
            ]
        ];
        DB::table('transactions')->insert($transactions);
    }
}
