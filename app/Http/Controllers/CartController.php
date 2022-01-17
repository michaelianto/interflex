<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\Game;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart_items = DB::table('carts')
                    ->join('games', 'carts.game_id', '=', 'games.id')
                    ->join('galleries', 'games.id', '=', 'galleries.game_id')
                    ->where('carts.user_id', Auth::user()->id)
                    ->select('carts.*', 'galleries.image', 'games.*')
                    ->get();
        // dd($cart_items);
        $total_price = 0;
        foreach($cart_items as $item){
            $total_price += $item->price - ($item->discount/100*$item->price);
        }
        return view('cart', [
            'cart_items' => $cart_items,
            'total_price' => $total_price
        ]);

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
        $item = Cart::where('game_id', $request->game_id)
                    ->where('user_id', Auth::user()->id)
                    ->get();
        
        $game_name = Game::findOrFail($request->game_id)->name;

        if(!$item->isEmpty()){
            return redirect()->back()->with('game_already_in_cart', $game_name.' already in cart');
        }else{
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'game_id' => $request->game_id,
                'created_at' => new \DateTime
            ]);
            return redirect()->back()->with('add_to_cart_success', $game_name.' has been added to cart');
        }
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
