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
                        <a href="" class="btn btn-success">Add Favourites</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
