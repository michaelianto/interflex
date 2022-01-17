<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Cart;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart_items = DB::table('carts')
                    ->join('games', 'carts.game_id', '=', 'games.id')
                    ->join('galleries', 'games.id', '=', 'galleries.game_id')
                    ->where('carts.user_id', Auth::user()->id)
                    ->select('carts.*', 'galleries.image', 'games.*')
                    ->get();

        $transaction = Transaction::create([
            'user_id' => Auth::user()->id
        ]);

        foreach($cart_items as $item){
            $transaction_details = TransactionDetail::create([
                'transaction_id' => $transaction->id,
                'game_id' => $item->game_id,
                'price' => round($item->price - ($item->discount/100*$item->price))
            ]);
        }

        $delete_cart = Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->back()->with('success_payment', 'Payment has been completed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
