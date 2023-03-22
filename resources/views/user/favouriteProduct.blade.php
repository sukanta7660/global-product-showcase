@extends('layouts.user')
@section('title', 'Favourite Product')
@section('content')
    <h4 class="page-title">Favourite Products</h4>
    <table class="table table-bordered table-responsive mt-3">
        <tr>
            <th>Shop</th>
            <th>Product</th>
            <th>Price</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        @forelse($favourites as $favourite)
            <tr>
                <td>{{ $favourite->product->shop->name }}</td>
                <td>{{ $favourite->product->name }}</td>
                <td>{{ getCurrencyFormat($favourite->product->price) }}</td>
                <td>{{ $favourite->product->shop->location->name }}</td>
                <td>{{ $favourite->product->quantity }}</td>
                <td>
                    <form method="POST" action="{{ route('user.remove-from.my-favourite', $favourite->id) }}"
                          id="confirmForm{{ $favourite->id }}">
                        @csrf
                        @method('DELETE')
                        <a
                            href=""
                            data-id="{{ $favourite->id }}"
                           data-text="You are going to delete from favourites!"
                            class="btn btn-danger confirmBtn">
                            Remove
                        </a>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center"> No Favourite Product Added </td>
            </tr>
        @endforelse
    </table>
    {{ $favourites->links() }}
@endsection
