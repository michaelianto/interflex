@extends('layout.app')

@section('title', 'Library')

@section('content')
<div class="container-popular-games p-3 text-white">
  @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  <form action="/update-profile" method="POST">
    @csrf
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control-plaintext text-white" id="name" value="{{ Auth::user()->name }}" name="name">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext text-white" id="email" value="{{ Auth::user()->email }}" name="email">
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control-plaintext text-white" id="password" value="DUMMY PASSWORD" name="password">
      </div>
    </div>
    <div class="form-group row">
      <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control-plaintext text-white" id="password_confirmation" value="DUMMY PASSWORD" name="password_confirmation">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" class="form-control-plaintext text-white" id="staticEmail" value="{{ Auth::user()->phone }}" name="phone">
      </div>
    </div>
    <input type="submit" value="Save" class="btn btn-primary btn-block">
  </form>
</div>
@endsection