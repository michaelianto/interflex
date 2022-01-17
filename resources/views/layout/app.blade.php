<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>InterFlex - @yield('title')</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="/css/index.css">
</head>
<body class="d-flex flex-column min-vh-100">

  <nav class="navbar navbar-expand-lg navbar-dark bg-grey">
    <a class="navbar-brand" href="/">
      <img src="{{ asset('assets/logo-clean.png') }}" height="50" width="200">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false " aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse  justify-content-center" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/store">Store <span class="sr-only">(current)</span></a>
        </li>
        @if (Auth::user()->role == 'member')
          <li class="nav-item">
            <a class="nav-link" href="/library">Library</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/cart">Cart</a>
          </li>
        @elseif(Auth::user()->role == 'admin')
          <li class="nav-item">
            <a class="nav-link" href="/admin">Dashboard</a>
          </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/about-us">About Us</a>
        </li>
      </ul>
    </div>
    @guest
      <a href="/login" class="btn btn-primary btn-sign-in">Sign In</a>
    @endguest
    @auth
    <ul class="navbar-nav mr-5">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/profile">Profile</a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item">
              Log Out
            </button>
          </form>
        </div>
      </li>
    </ul>
    
    @endauth
    
  </nav>

  @yield('content')

  <footer class="mt-auto bg-light text-center text-lg-start">
    <div class="text-center p-3 bg-grey text-white">
      Copyright &copy; 2021
      <a class="text-white" href="/">Interflex</a>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>