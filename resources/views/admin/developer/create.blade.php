@extends('layout.admin')

@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Add Developer</h1>
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

    <div class="card shadow">
      <div class="card-body">
        <form action="/admin/developers/create" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
          </div>
          <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" value="{{ old('location')}}">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
      </div>
    </div>
	</div>
	<!-- /.container-fluid -->
		
@endsection