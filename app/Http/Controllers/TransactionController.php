<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //
    public function index(){
        $transaction = DB::table('transactions')
                        ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                        ->join('users', 'users.id', '=', 'transactions.user_id')
                        ->select('users.email', DB::raw('sum(transaction_details.price) as total_price'))
                        ->groupBy('transactions.id', 'users.email')
                        ->get();
        $number_items = 5;
        $transaction_header = Transaction::paginate($number_items);
        
        for($i = 0; $i < count($transaction); $i++){
            
            $transaction_header[$i]['price'] = $transaction[$i]->total_price;
            $transaction_header[$i]['user_email'] = $transaction[$i]->email;
        }
        return view('admin.transaction.index',[
            'transactions' => $transaction_header
        ]);
    }
}
