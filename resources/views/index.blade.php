@extends('layout.app')

@section('title', 'Home')

@section('content')
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('assets/banner-fortnite.jpg') }}" class="d-block w-100" alt="Banner Image">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/banner-gta-5.jpg') }}" class="d-block w-100" alt="Banner Image">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('assets/banner-battlefield-2042.jpg') }}" class="d-block w-100" alt="Banner Image">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>

  <div class="container-popular-games p-3">
    <h3 class="title text-white mb-3">Popular Games</h3>
    <div class="row">
      @foreach ($popular_games as $game)
        <div class="col-lg-3">
          <div class="card">
            <a href="/game/{{ $game->id }}" style="text-decoration: none; color:white">
              <img class="card-img-top" src="{{ Storage::url($game->image) }}" alt="Game Image">
              <div class="card-body">
                <p class="card-text game-title">{{ $game->name }}</p>
                @if ($game->price == 0)
                  <p class="card-text game-price">Free</p>
                @else
                  @if ($game->discount == 0)
                    <p class="card-text game-price"><b>Rp{{ $game->price }}</b></p>
                  @else
                    <p class="card-text game-price"><strike>Rp{{ $game->price }}</strike>   <b>Rp{{ round($game->price-($game->price*$game->discount*0.01)) }}</b></p>
                  @endif
                @endif
              </div>
            </a> 
          </div>
        </div>
      @endforeach
    </div>
  </div>

  <div class="container-free-games p-3">
    <div class="row pb-2">
      <div class="col-lg-6">
        <h3 class="title text-white">Free Games</h3>
      </div>
      <div class="col-lg-6 text-right arrow-button">
        <a class="btn btn-outline-secondary" href="#carouselExampleIndicators2" role="button" data-slide="prev">
          <i class="fa fa-arrow-left"></i>
        </a>
        <a class="btn btn-outline-secondary" href="#carouselExampleIndicators2" role="button" data-slide="next">
            <i class="fa fa-arrow-right"></i>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            @for ($i = 0; $i < count($free_games); $i++)
              @if ($i == 0)
                <div class="carousel-item active"> 
                  <div class="row"> 
                    <div class="col"> 
                      <div class="card"> 
                        <a href="/game/{{ $free_games[$i]->id }}" style="text-decoration: none; color:white">
                          <img class="card-img-top" src="{{ Storage::url($free_games[$i]->galleries()->first()->image) }}" alt="Game Image">
                          <div class="card-body">
                            <p class="card-text game-title">{{ $free_games[$i]->name }}</p>
                          </div>
                        </a>
                      </div>
                    </div>
              @elseif($i%3 == 0)
                    <div class="col"> 
                      <div class="card"> 
                        <a href="/game/{{ $free_games[$i]->id }}" style="text-decoration: none; color:white">
                          <img class="card-img-top" src="{{ Storage::url($free_games[$i]->galleries()->first()->image) }}" alt="Game Image">
                          <div class="card-body">
                            <p class="card-text game-title">{{ $free_games[$i]->name }}</p>
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              @elseif($i%4 == 0 && $i != 0)
                <div class="carousel-item"> 
                  <div class="row"> 
                    <div class="col"> 
                      <div class="card"> 
                        <a href="/game/{{ $free_games[$i]->id }}" style="text-decoration: none; color:white">
                          <img class="card-img-top" src="{{ Storage::url($free_games[$i]->galleries()->first()->image) }}" alt="Game Image">
                          <div class="card-body">
                            <p class="card-text game-title">{{ $free_games[$i]->name }}</p>
                          </div>
                        </a>
                      </div>
                    </div>
              @else
                    <div class="col">
                      <div class="card"> 
                        <a href="/game/{{ $free_games[$i]->id }}" style="text-decoration: none; color:white">
                          <img class="card-img-top" src="{{ Storage::url($free_games[$i]->galleries()->first()->image) }}" alt="Game Image">
                          <div class="card-body">
                            <p class="card-text game-title">{{ $free_games[$i]->name }}</p>
                          </div>
                        </a>
                      </div>
                    </div>
              @endif
            @endfor
            @if (count($free_games)%4 != 0)
                    </div>
                  </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection