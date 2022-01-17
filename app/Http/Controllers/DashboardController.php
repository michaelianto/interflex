<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index(){
        $total_games = count(Game::get());
        $total_developers = count(Developer::get());
        $transactions = Transaction::get();
        $total_transactions = count($transactions);

        $total_revenue = 0;

        $transaction_detail = DB::table('transactions')
                                ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                                ->select('transactions.*', 'transaction_details.*')
                                ->get();
        
        foreach($transaction_detail as $transaction){
            $total_revenue += $transaction->price;
        }
        
        return view('admin.index', [
            'total_games' => $total_games,
            'total_developers' => $total_developers,
            'total_transactions' => $total_transactions,
            'total_revenue' => $total_revenue
        ]);
    }
}
