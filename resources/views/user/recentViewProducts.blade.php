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
            <th class="w-25">Address</th>
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
