@extends('layout.app')

@section('title', $game->name)

@section('content')
  <div class="container mt-5 mb-5 text-white">
    @if (Session::has('add_to_cart_success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('add_to_cart_success')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if (Session::has('game_already_in_cart'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ Session('game_already_in_cart')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    <div class="row">
      <div class="col-8">
        <h1>{{ $game->name }}</h1>
        <img src="{{ Storage::url($image->image) }}" alt="Game Image" width="300px" class="d-block">
        <button type="button" class="btn btn-secondary btn-lg small-text mt-2" disabled>{{ $game->category->name }}</button>
        <p class="mt-2">{{ $game->description }}</p>
      </div>
      <div class="col-4">
        @if ($game->price != 0)
          @if ($game->discount == 0)
            <h4 class="mt-2 mb-3">Price : Rp{{ number_format($game->price, 0, ",", ".") }}</h4>
          @else
            <h4 class="mt-2 mb-3">Price : Rp{{ number_format(round($game->price-($game->price*$game->discount*0.01)), 0, ",", ".") }}</h4>
          @endif
        @else
          <h4 class="mt-2 mb-3">Price : Free</h4>
        @endif
        <form action="/add-cart" method="post">
          @csrf
          <input type="hidden" name="game_id" value="{{ $game->id }}">
          <input type="submit" value="Add to Cart" class="btn btn-outline-primary btn-block mt-2">
        </form>
        <table class="container-fluid mt-3">
          <tr>
            <td scope="col">Developer</td>
            <td scope="col">: {{ $game->developer->name }}</td>
          </tr>
          <tr>
            <td scope="col">Release Date</td>
            <td scope="col">: {{ $game->release_date }}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection