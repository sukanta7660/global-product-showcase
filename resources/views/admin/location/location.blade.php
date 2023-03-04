@extends('layouts.admin')
@extends('admin.location.action')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Locations</span>
                        <button
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#createModal"
                            class="btn btn-sm btn-outline-primary float-end">
                            <i class="bi bi-plus-circle-dotted"></i>
                            Add Location
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Location</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($locations as $key => $location)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $location->name }}</td>
                                        <td>{{ $location->latitude }}</td>
                                        <td>{{ $location->longitude }}</td>
                                        <td>
                                            <button
                                                class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
@endpush
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="{{ asset('admin-assets/plugins/js/activeLeaflet.js') }}"></script>
@endpush
