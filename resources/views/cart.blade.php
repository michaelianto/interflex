@extends('layout.app')

@section('title', 'Store')

@section('content')
<div class="container-fluid p-2">
  @if (Session::has('success_payment'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('success_payment')  }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
  <h2 class="text-white">Your Cart</h2>
  @if ($cart_items->isEmpty())
    <p class="text-white">There is no games in your cart</p>
  @else
    <div class="row">
      <div class="col-8">
        <table class="table text-white">
          <tbody>
            @for ($i = 0; $i < count($cart_items); $i++)
            <tr>
              <th scope="col">{{ $i+1 }}</th>
              <th scope="col">
                <img src="{{ Storage::url($cart_items[$i]->image) }}" alt="" width="100px">
              </th>
              <th scope="col">{{ $cart_items[$i]->name }}</th>
              @if ($cart_items[$i]->price == 0)
                <th>Free</th>
              @else
                <th scope="col">Rp{{ number_format(round($cart_items[$i]->price - $cart_items[$i]->discount/100*$cart_items[$i]->price), 0, ",", ".")}}</th>
              @endif
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
      <div class="col-4">
        <p class="text-white"><b>Total Price : Rp{{ number_format($total_price, 0, ",", ".") }}</b></p>
        <form action="/checkout" method="post">
          @csrf
          <input type="submit" value="Pay Now" class="btn btn-primary btn-block mt-2">
        </form>
      </div>
    </div>
  @endif
  
</div>
@endsection