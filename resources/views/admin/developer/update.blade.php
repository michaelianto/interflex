@extends('layout.admin')

@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Update : {{ $developer->name }}</h1>
		</div>

		@if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    @if (Session::has('update_success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('update_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    <div class="card shadow">
      <div class="card-body">
        <form action="/admin/developers/edit/{{ $developer->id }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $developer->name }}">
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" value="{{ $developer->location }}">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
      </div>
    </div>
	</div>
	<!-- /.container-fluid -->
		
@endsection