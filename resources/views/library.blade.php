@extends('layout.app')

@section('title', 'Library')

@section('content')
<div class="container-popular-games p-3">
    <h3 class="title text-white mb-3">Owned Games</h3>
    <div class="row">
      @foreach ($games as $game)
        <div class="col-lg-3">
          <div class="card">
            <a href="/game/{{ $game->game_id }}" class="text-white text-decoration-none">
              <img class="card-img-top" src="{{ Storage::url($game->image) }}" alt="Game Image">
              <div class="card-body">
                <p class="card-text game-title">{{ $game->name }}</p>
              </div>
            </a> 
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection