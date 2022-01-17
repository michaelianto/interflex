<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction_details = [
            [
                'transaction_id' => 1,
                'game_id' => 1,
                'price' => 0
            ],
            [
                'transaction_id' => 1,
                'game_id' => 2,
                'price' => 150375
            ],
            [
                'transaction_id' => 1,
                'game_id' => 3,
                'price' => 434940
            ],
            [
                'transaction_id' => 1,
                'game_id' => 4,
                'price' => 20250
            ],
            [
                'transaction_id' => 1,
                'game_id' => 9,
                'price' => 33750
            ],
            [
                'transaction_id' => 1,
                'game_id' => 10,
                'price' => 320000
            ],
            [
                'transaction_id' => 1,
                'game_id' => 11,
                'price' => 134999
            ],
            [
                'transaction_id' => 1,
                'game_id' => 12,
                'price' => 0
            ],
            [
                'transaction_id' => 2,
                'game_id' => 1,
                'price' => 0
            ],
            [
                'transaction_id' => 2,
                'game_id' => 2,
                'price' => 150375
            ],
            [
                'transaction_id' => 2,
                'game_id' => 3,
                'price' => 434940
            ],
            [
                'transaction_id' => 2,
                'game_id' => 4,
                'price' => 20250
            ],
            [
                'transaction_id' => 2,
                'game_id' => 5,
                'price' => 138750
            ],
            [
                'transaction_id' => 2,
                'game_id' => 6,
                'price' => 402350
            ],
            [
                'transaction_id' => 2,
                'game_id' => 7,
                'price' => 132400
            ],
            [
                'transaction_id' => 2,
                'game_id' => 8,
                'price' => 115000
            ]
        ];

        DB::table('transaction_details')->insert($transaction_details);
    }
}
