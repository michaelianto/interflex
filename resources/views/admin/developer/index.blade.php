@extends('layout.admin')

@section('content')
	<!-- Begin Page Content -->
	<div class="container-fluid">

    @if (Session::has('delete_success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('delete_success')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif

    @if (Session::has('add_success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('add_success')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    

		<!-- Page Heading -->
		<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Developer</h1>
        <a href="/admin/developers/create" class="btn btn-sm btn-primary shadow-sm">
          <i class="fas fa-plus fa-sm text-white-50"></i>   Add Developer
        </a>
		</div>

		<div class="row">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($developers as $developer)
                <tr>
                  <td>{{ $developer->id }}</td>
                  <td>{{ $developer->name }}</td>
                  <td>{{ $developer->location }}</td>
                  <td>
                    <a href="/admin/developers/edit/{{ $developer->id }}" class="btn btn-info">
                      <i class="fa fa-pencil-alt"></i>
                    </a>
                    <form action="/admin/developers/delete/{{ $developer->id }}" method="post" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
              @empty
                  <tr>
                    <td colspan="7" class="text-center">
                      No Data
                    </td>
                  </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-end">
      {{ $developers->links() }}
    </div>
	</div>
	<!-- /.container-fluid -->
		
@endsection