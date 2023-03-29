@extends('layouts.user')
@section('title', 'Home')
@section('content')

    <!-- Home Page Content -->
    <form id="productSearchForm" method="post" action="{{ route('user.findShops') }}">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="productName" placeholder="eggs..." required>
            <label for="productName">Please type product name</label>
        </div>
        <button type="submit"
                id="productSearchBtn"
                class="btn btn-primary">
            Search
        </button>
    </form>
    <table class="table table-bordered table-responsive mt-3">
        <thead>
            <tr>
                <th>Shop</th>
                <th>Product</th>
                <th>Price</th>
                <th class="w-25">Address</th>
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
@push('js')
    <script>
        function addFavorite(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are going to add to the favourite list',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'rgba(11,17,57,0.9)',
                cancelButtonColor: '#9a1313',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#confirmForm"+id).submit();
                }
            })
        }
    </script>
@endpush
