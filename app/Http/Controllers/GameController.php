<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Developer;
use App\Models\Category;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::with(['developer', 'category'])->paginate(8);
        return view('admin.game.index', [
            'games' => $games
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $developers = Developer::get();
        $categories = Category::get();
        return view('admin.game.create',[
            'developers' => $developers,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:games',
            'developer' => 'required',
            'category' => 'required',
            'release_date' => 'required',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|max:100',
            'image' => 'required|file|image'
        ]);

        $game = Game::create([
            'name' => $request->name,
            'developer_id' => $request->developer,
            'category_id' => $request->category,
            'release_date' => $request->release_date,
            'description' => $request->description,
            'price' => $request->price,
            'discount' => $request->discount,
            'created_at' => new \DateTime
        ]);

        $path = Storage::putFile(
            'public',
            $request->file('image')
        );

        $gallery = Gallery::create([
            'game_id' => $game->id,
            'image' => $path
        ]);

        return redirect('/admin/games')->with('add_success', $game->name.' has been added');
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
        $game = Game::findOrFail($id);
        $gallery = $game->galleries()->first();
        $developers = Developer::get();
        $categories = Category::get();
        return view('admin.game.update', [
            'game' => $game,
            'image' => $gallery->image,
            'developers' => $developers,
            'categories' => $categories
        ]);
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
        $request->validate([
            'name' => 'required',
            'developer' => 'required',
            'category' => 'required',
            'release_date' => 'required',
            'price' => 'required|numeric|min:0',
            'discount' => 'required|numeric|max:100',
            'image' => 'file|image'
        ]);

        $game = Game::findOrFail($id);
        $game->name = $request->name;
        $game->developer_id = $request->developer;
        $game->category_id = $request->category;
        $game->release_date = $request->release_date;
        $game->price = $request->price;
        $game->discount = $request->discount;

        $game->save();

        

        if($request->image){
            $path = Storage::putFile(
                'public',
                $request->file('image')
            );
           $gallery = $game->galleries()->first();
           $gallery->image = $path;
           $gallery->save();
        }

        return redirect()->back()->with('update_success', $game->name.' has been updated');
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
        $game = Game::findOrFail($id);
        $game->delete();
        return redirect()->back()->with('delete_success', $game->name.' has been deleted');
    }

    public function details($id){
        $game = Game::with('category')->findOrFail($id);
        $image = $game->galleries()->first();
        if(!Auth::user()){
            $status = 0;
        }else{
            $exists = DB::table('transactions')
                        ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->join('games', 'transaction_details.game_id', '=', 'games.id')
                        ->where('transactions.user_id', Auth::user()->id)
                        ->where('transaction_details.game_id', $id)
                        ->select('games.id')
                        ->get();
            if(!$exists->isEmpty()){
                $status = 1;
            }else{
                $status = 0;
            }
        }
        
        return view('game-details', [
            'game' => $game,
            'image' => $image,
            'status' => $status
        ]);
    }

    public function showGame(){
        $games = DB::table('games')
                    ->join('galleries', 'galleries.game_id', '=', 'games.id')
                    ->get();
        $categories = Category::get();
        return view('store', [
            'games' => $games,
            'categories' => $categories
        ]);
    }

    public function showLibrary(){
        $games = DB::table('transaction_details')
                    ->join('games', 'transaction_details.game_id', '=', 'games.id')
                    ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                    ->join('galleries', 'games.id', '=', 'galleries.game_id')
                    ->where('transactions.user_id', Auth::user()->id)
                    ->select('games.*', 'transaction_details.*', 'transactions.*', 'galleries.*')
                    ->get();
        return view('library', [
            'games' => $games
        ]);
    }

    public function showGameBasedOnCategory($id){
        $category = Category::findOrFail($id);
        // $games = Game::where('category_id', $category->id)->get();
        $games = DB::table('games')
                    ->join('galleries', 'galleries.game_id', '=', 'games.id')
                    ->where('games.category_id', $category->id)
                    ->get();

        return view('store-category', [
            'category' => $category->name,
            'games' => $games
        ]);
    }
}