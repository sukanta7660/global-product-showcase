@extends('layouts.user')
@section('title', 'Recent Views Product')
@section('content')
    <h4 class="page-title">Recent View Products</h4>
    <table class="table table-bordered table-responsive mt-3">
        <thead>
            <tr>
            <th>Shop</th>
            <th>Product</th>
            <th>Price</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody id="recentViewProducts">

        </tbody>
    </table>

    <div class="mt-3">
        <div id="map"></div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('/assets/js/recentView.js') }}"></script>
@endpush
