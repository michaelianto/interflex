@extends('layout.admin')

@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Add Game</h1>
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
        <form action="/admin/games/create" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name')}}">
          </div>
          <div class="form-group">
            <label for="developer">Developer</label>
            <select class="custom-select my-1 mr-sm-2" id="developer" name="developer">
              <option selected>Choose...</option>
              @foreach ($developers as $developer)
                  <option value="{{ $developer->id }}">{{ $developer->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select my-1 mr-sm-2" id="category" name="category">
              <option selected>Choose...</option>
              @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="release_date">Release Date</label> <br>
            <input type="date" name="release_date" value="{{ old('release_date') }}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="10" class="d-block w-100 form-control">{{ old('description') }}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" value="{{ old('price')}}">
          </div>
          <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" class="form-control" name="discount" value="{{ old('discount')}}">
          </div>
          <div class="form-group">
            <label for="image">Image</label><br>
            <input type="file" name="image">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
      </div>
    </div>
	</div>
	<!-- /.container-fluid -->
		
@endsection