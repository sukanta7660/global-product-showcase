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
                            id="addLocationButton"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#createUpdateModal"
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
                                <th>#</th>
                                <th class="wp-40" scope="col">Location</th>
                                <th scope="col">Latitude</th>
                                <th scope="col">Longitude</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locations as $key => $location)
                                <tr>
                                    <th scope="col">{{ dateformat($location->created_at, 'd M, Y @ h:i a') }}</th>
                                    <td class="wp-40">{{ $location->name }}</td>
                                    <td>{{ $location->latitude }}</td>
                                    <td>{{ $location->longitude }}</td>
                                    <td>
                                        <form
                                            action="{{ route('admin.locations.destroy', $location->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                data-action="{{ route('admin.locations.update', $location->id) }}"
                                                data-name="{{ $location->name }}"
                                                data-latitude="{{ $location->latitude }}"
                                                data-longitude="{{ $location->longitude }}"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#createUpdateModal"
                                                class="btn btn-sm btn-outline-primary editBtn">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
    <script>
        {{--let locations = '{!! $locations !!}';--}}
        {{--let markers = locations.map(location => {--}}
        {{--    return {--}}
        {{--        lat: location.latitude,--}}
        {{--        lng: location.longitude,--}}
        {{--        title: location.name--}}
        {{--    }--}}
        {{--})--}}
        $(() => {
            $('#addLocationButton').click(function (e) {
                resetForm();
                e.preventDefault();
                let formTitle = 'Add Location';
                let formBtnText = 'Save Location';
                let formAction = '{{ route('admin.locations.store') }}';
                let formMethod = 'POST';
                $('#actionForm #modalTitle').html(formTitle);
                $('#actionForm #btnSubmit').html(formBtnText);
                $('#createUpdateForm').attr('method', formMethod).attr('action', formAction);
                $('#method').attr('disabled', true);
            });
            $('.editBtn').click(function (e) {
                e.preventDefault();
                let formTitle = 'Update Location';
                let formBtnText = 'Update Location';
                let name = $(this).data('name');
                let latitude = $(this).data('latitude');
                let longitude = $(this).data('longitude');
                let formAction = $(this).data('action');

                // populate lat and long
                long = longitude;
                lat = latitude;
                place = name;

                $('#createUpdateModal #modalTitle').html(formTitle);
                $('#createUpdateModal #btnSubmit').html(formBtnText);
                $('#createUpdateForm [name=name]').val(name);
                $('#createUpdateForm [name=latitude]').val(latitude);
                $('#createUpdateForm [name=longitude]').val(longitude);
                $('#createUpdateForm').attr('method', 'POST').attr('action', formAction);
                $('#method').removeAttr('disabled');
            });
            resetForm();
        });
        function resetForm() {
            document.getElementById("createUpdateForm").reset();
        }
    </script>
    <script src="{{ asset('admin-assets/plugins/js/activeLeaflet.js') }}"></script>
@endpush
