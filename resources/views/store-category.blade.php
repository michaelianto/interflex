@extends('layout.app')

@section('title', 'Store - '.$category)

@section('content')
<div class="container-popular-games p-3">
    <h3 class="title text-white mb-3">{{ $category }} Games</h3>
    <div class="row">
      @foreach ($games as $game)
        <div class="col-lg-3">
          <div class="card">
            <a href="/game/{{ $game->id }}" class="text-white text-decoration-none">
              <img class="card-img-top" src="{{ Storage::url($game->image) }}" alt="Game Image">
              <div class="card-body">
                <div class="mb-2">
                  <p class="card-text game-title d-inline">{{ $game->name }}</p>
                  @if ($game->price != 0)
                    <p class="card-text btn btn-primary btn-sm ml-2">-{{ $game->discount }}%</p>
                  @endif
                </div>
                @if ($game->price == 0)
                  <p class="card-text game-price">Free</p>
                @else
                  @if ($game->discount == 0)
                    <p class="card-text game-price"><b>Rp{{ number_format($game->price, 0, ",", ".") }}</b></p>
                  @else
                    <p class="card-text game-price"><strike>Rp{{ number_format($game->price, 0, ",", ".") }}</strike>   <b>Rp{{ number_format(round($game->price-($game->price*$game->discount*0.01)), 0, ",", ".") }}</b></p>
                  @endif
                @endif
              </div>
            </a> 
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection