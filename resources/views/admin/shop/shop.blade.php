@extends('layouts.admin')
@extends('admin.shop.action')
@section('title', 'Shops')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!--Error Message-->
                @if ($errors->any())
                    <div class="card">
                        <div class="card-header">
                            Please fill the form correctly
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- Error Message-->

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
                        <table class="table table-striped" id="">
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
                                    <td class="wp-20">{{ $shop->location_name }}</td>
                                    <td>{{ $shop->cell }}</td>
                                    <td>{{ $shop->sort }}</td>
                                    <td>
                                        <span class="badge badge-{{ $shop->status ? 'success' : 'danger' }}">
                                            {{ $shop->status ? 'Enabled' : 'Disabled' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form
                                            id="delete-form{{ $shop->id }}"
                                            action="{{ route('admin.shops.destroy', $shop->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                data-action="{{ route('admin.shops.update', $shop->id) }}"
                                                data-name="{{ $shop->name }}"
                                                data-slug="{{ $shop->slug }}"
                                                data-description="{{ $shop->about }}"
                                                data-cell="{{ $shop->cell }}"
                                                data-email="{{ $shop->email }}"
                                                data-location="{{ $shop->location_id }}"
                                                data-sort="{{ $shop->sort }}"
                                                data-status="{{ $shop->status }}"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#createUpdateModal"
                                                class="btn btn-sm btn-outline-primary editBtn">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button
                                                data-id="{{ $shop->id }}"
                                                type="submit"
                                                class="btn btn-sm btn-outline-danger delete-btn">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->
                        {{ $shops->links() }}
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
                let formAction = '{{ route('admin.shops.store') }}';
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
                let slug = $(this).data('slug');
                let cell = $(this).data('cell');
                let email = $(this).data('email');
                let location = $(this).data('location');
                let sort = $(this).data('sort');
                let status = $(this).data('status');
                let description = $(this).data('description');
                let formAction = $(this).data('action');

                if(status) {
                    $('#createUpdateForm [name=status]').attr('checked', true);
                }else {
                    $('#createUpdateForm [name=status]').attr('checked', false);
                }

                $('#createUpdateModal #modalTitle').html(formTitle);
                $('#createUpdateModal #btnSubmit').html(formBtnText);
                $('#createUpdateForm [name=name]').val(name);
                $('#createUpdateForm [name=slug]').val(slug);
                $('#createUpdateForm [name=cell]').val(cell);
                $('#createUpdateForm [name=email]').val(email);
                $('#createUpdateForm [name=location_id]').val(location);
                $('#createUpdateForm [name=sort]').val(sort);

                $('#createUpdateForm [name=about]').html(description);
                $('#createUpdateForm').attr('method', 'POST').attr('action', formAction);
                $('#method').removeAttr('disabled');
            });
            resetForm();
            addSlug();
        });
        function resetForm() {
            document.getElementById("createUpdateForm").reset();
        }

        function addSlug () {
            let inputText = $('#createUpdateForm #name').val();
            let slug = slugify(inputText);
            $('#createUpdateForm #slug').val(slug);
        }

    </script>
@endpush
