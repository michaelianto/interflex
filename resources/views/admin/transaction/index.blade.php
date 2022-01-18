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
				<h1 class="h3 mb-0 text-gray-800">Transactions</h1>
		</div>

		<div class="row">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Date</th>
                <th>User Email</th>
                <th>Total Transaction</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($transactions as $transaction)
                <tr>
                  <td>{{ $transaction->id }}</td>
                  <td>{{ $transaction->created_at }}</td>
                  <td>{{ $transaction->user_email }}</td>
                  <td>Rp{{ number_format($transaction->price, 0, ",", ".") }}</td>
                </tr>
              @empty
                  <tr>
                    <td colspan="4" class="text-center">
                      No Data
                    </td>
                  </tr>
              @endforelse
            </tbody>
          </table>
          <div class="d-flex justify-content-end">
            {{ $transactions->links() }}
          </div>
        </div>
      </div>
    </div>
	</div>
	<!-- /.container-fluid -->
		
@endsection