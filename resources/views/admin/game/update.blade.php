@extends('layout.admin')

@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Update : {{ $game->name }}</h1>
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
        <form action="/admin/games/edit/{{ $game->id }}" method="post" enctype="multipart/form-data">
          @csrf
          <img src="{{ Storage::url($image) }}" alt="" width="200px" class="mb-2">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $game->name }}">
          </div>
          <div class="form-group">
            <label for="developer">Developer</label>
            <select class="custom-select my-1 mr-sm-2" id="developer" name="developer">
              @foreach ($developers as $developer)
                @if ($developer->id == $game->developer_id)
                  <option value="{{ $developer->id }}" selected>{{ $developer->name }}</option>  
                @else
                  <option value="{{ $developer->id }}">{{ $developer->name }}</option>  
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="custom-select my-1 mr-sm-2" id="category" name="category">
              @foreach ($categories as $category)
                @if ($category->id == $game->category_id)
                  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
                @else
                  <option value="{{ $category->id }}">{{ $category->name }}</option>  
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="release_date">Release Date</label> <br>
            <input type="date" name="release_date" value="{{ $game->release_date }}">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" rows="10" class="d-block w-100 form-control">{{ $game->description }}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" value="{{ $game->price }}">
          </div>
          <div class="form-group">
            <label for="discount">Discount</label>
            <input type="number" class="form-control" name="discount" value="{{ $game->discount }}">
          </div>
          <div class="form-group">
            <label for="image">Image</label><br>
            <input type="file" name="image">
            <span>* Leave it empty if you wont change game image</span>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Save</button>
        </form>
      </div>
    </div>
	</div>
	<!-- /.container-fluid -->
		
@endsection