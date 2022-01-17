@extends('layout.app')

@section('title', 'Library')

@section('content')
<div class="container-popular-games p-3 text-white">
  @if (Session::has('success_update'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('success_update')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  <form>
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext text-white" id="name" value="{{ Auth::user()->name }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label">Email</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext text-white" id="email" value="{{ Auth::user()->email }}">
      </div>
    </div>
    <div class="form-group row">
      <label for="phone" class="col-sm-2 col-form-label">Phone</label>
      <div class="col-sm-10">
        <input type="text" readonly class="form-control-plaintext text-white" id="staticEmail" value="{{ Auth::user()->phone }}">
      </div>
    </div>
  </form>
  <a href="/update-profile" class="btn btn-primary btn-block">Update Profile</a>
</div>
@endsection