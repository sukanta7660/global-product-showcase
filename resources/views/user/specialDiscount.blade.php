@extends('layouts.user')
@section('title', 'Special Discount Product')
@section('content')
    <h4 class="page-title">Discount Products</h4>
    <table class="table table-bordered table-responsive mt-3">
        <tr>
            <th>Shop</th>
            <th>Product</th>
            <th>Price</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        @foreach($discountProducts as $product)
            <tr>
                <td>{{ $product->shop->name }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ getCurrencyFormat($product->price) }}</td>
                <td>{{ $product->shop->location->name }}</td>
                <td>{{ $product->quantity }}</td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-primary">Add Lists</a>
                        <button
                            type="button"
                            data-text="You are going to add to the favourite list"
                            data-id="{{ $product->id }}"
                            class="btn btn-success confirmBtn"
                        >
                            Add Favourites
                        </button>
                        <form method="POST" action="{{ route('user.add-to.my-favourite', $product->id) }}"
                              id="confirmForm{{ $product->id }}">
                            @csrf
                            @method('PATCH')
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $discountProducts->links() }}
@endsection
