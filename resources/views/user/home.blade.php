@extends('layouts.user')
@section('title', 'Home')
@section('content')

    <!-- Home Page Content -->
    <form id="productSearchForm" method="post">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="productName" placeholder="eggs..." required>
            <label for="productName">Please type product name</label>
        </div>
        <button type="button"
                data-action="{{ route('user.findShops') }}"
                id="productSearchBtn"
                class="btn btn-primary">
            Search
        </button>
    </form>
    <table class="table table-bordered table-responsive mt-3">
        <thead>
            <tr>
                <th>Shop Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Address</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="productSearchResults">

        </tbody>
    </table>
    <!-- Home Page Content -->

    <div class="mt-5">
        <div id="map"></div>
    </div>
@endsection
{{--@push('css')--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />--}}
{{--    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />--}}
{{--@endpush--}}
{{--@push('js')--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>--}}
{{--    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>--}}
{{--    <script src="{{ asset('assets/js/map.js') }}"></script>--}}
{{--@endpush--}}
