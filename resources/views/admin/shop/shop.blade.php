@extends('layouts.admin')
@extends('admin.shop.action')
@section('title', 'Shops')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Shops</span>
                        <button
                            id="addLocationButton"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#createUpdateModal"
                            class="btn btn-sm btn-outline-primary float-end">
                            <i class="bi bi-plus-circle-dotted"></i>
                            Add Shop
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="dataTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">Name</th>
                                <th class="wp-20" scope="col">Address</th>
                                <th scope="col">Cell</th>
                                <th scope="col">Sort</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shops as $key => $shop)
                                <tr>
                                    <th scope="col">{{ dateformat($shop->created_at, 'd M, Y') }}</th>
                                    <td class="wp-20">{{ $shop->name }}</td>
                                    <td class="wp-20">{{ $shop->location->name }}</td>
                                    <td>{{ $shop->cell }}</td>
                                    <td>{{ $shop->sort }}</td>
                                    <td>
                                        <span class="badge badge-{{ $shop->status ? 'success' : 'danger' }}">
                                            {{ $shop->status ? 'Enabled' : 'Disabled' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('admin.shops.destroy', $shop->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                data-action="{{ route('admin.locations.update', $shop->id) }}"
                                                data-name="{{ $shop->name }}"
                                                data-latitude="{{ $shop->latitude }}"
                                                data-longitude="{{ $shop->longitude }}"
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

@endpush
@push('js')
    <script>
        $(() => {
            $('#addLocationButton').click(function (e) {
                resetForm();
                e.preventDefault();
                let formTitle = 'Add Shop';
                let formBtnText = 'Save Shop';
                let formAction = '{{ route('admin.locations.store') }}';
                let formMethod = 'POST';
                $('#modalTitle').html(formTitle);
                $('#btnSubmit').html(formBtnText);
                $('#createUpdateForm').attr('method', formMethod).attr('action', formAction);
                $('#method').attr('disabled', true);
            });
            $('.editBtn').click(function (e) {
                e.preventDefault();
                let formTitle = 'Update Shop';
                let formBtnText = 'Update Shop';
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
