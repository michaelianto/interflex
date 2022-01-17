<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $popular_games = DB::table('transactions')
                            ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                            ->join('games', 'transaction_details.game_id', '=', 'games.id')
                            ->join('galleries', 'galleries.game_id', '=', 'games.id')
                            ->selectRaw('games.id, games.name, games.price, games.discount, count(transaction_details.game_id) as total, galleries.image')
                            ->groupByRaw('games.id, games.name, games.price, games.discount, galleries.image')
                            ->orderByRaw('total DESC')
                            ->take(8)
                            ->get();
        // dd($popular_games);
        $free_games = Game::where('price', 0)->get();
        // dd($free_games);
        return view('index', [
            'popular_games' => $popular_games,
            'free_games' => $free_games
        ]);
    }

    public function aboutUs(){
        return view('about-us');
    }
}
