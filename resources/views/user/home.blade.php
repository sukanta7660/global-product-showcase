@extends('layouts.user')
@section('title', 'Home')
@section('content')
    <form>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="eggs...">
            <label for="floatingInput">Please type product name</label>
        </div>
        <button type="button" onclick="addMarker({ lat: 51.5, lng: -0.09, title: 'Sukanta' })" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-bordered table-responsive mt-3">
        <tr>
            <th>Shop Name</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Baba G Wholesalers</td>
            <td>Eggs</td>
            <td>$20</td>
            <td>Norfolky, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Coles World Square</td>
            <td>Eggs</td>
            <td>$25</td>
            <td>Jersey, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Romeo's IGA Food Hall</td>
            <td>Eggs</td>
            <td>$23</td>
            <td>Norfolky, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Coles Wynyard Express</td>
            <td>Eggs</td>
            <td>$27</td>
            <td>Jersey, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Woolworths Town Hall</td>
            <td>Eggs</td>
            <td>$18</td>
            <td>Norfolky, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
    </table>
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
