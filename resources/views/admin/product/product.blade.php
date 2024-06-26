@extends('layouts.admin')
@extends('admin.product.action')
@section('title', 'Products')
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
                        <span class="card-title">Products</span>
                        <button
                            id="addLocationButton"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#createUpdateModal"
                            class="btn btn-sm btn-outline-primary float-end">
                            <i class="bi bi-plus-circle-dotted"></i>
                            Add Product
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Shop</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key => $product)
                                <tr>
                                    <th scope="col">{{ dateformat($product->created_at, 'd M, Y') }}</th>
                                    <td class="wp-15">{{ $product->name }}</td>
                                    <td class="wp-15">{{ $product->shop->name }}</td>
                                    <td>{{ getCurrencyFormat($product->price) }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ getCurrencyFormat($product->discount_price) }}</td>
                                    <td>
                                        <span class="badge badge-{{ $product->status ? 'success' : 'danger' }}">
                                            {{ $product->status ? 'Enabled' : 'Disabled' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form
                                            id="delete-form{{ $product->id }}"
                                            action="{{ route('admin.products.destroy', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                data-action="{{ route('admin.products.update', $product->id) }}"
                                                data-name="{{ $product->name }}"
                                                data-slug="{{ $product->slug }}"
                                                data-description="{{ $product->description }}"
                                                data-price="{{ $product->price }}"
                                                data-quantity="{{ $product->quantity }}"
                                                data-shop="{{ $product->shop_id }}"
                                                data-discountenabled="{{ $product->discount_enabled }}"
                                                data-discountprice="{{ $product->discount_price }}"
                                                data-status="{{ $product->status }}"
                                                type="button"
                                                data-bs-toggle="modal"
                                                data-bs-target="#createUpdateModal"
                                                class="btn btn-sm btn-outline-primary editBtn">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button
                                                data-id="{{ $product->id }}"
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
                        {{ $products->links() }}
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
                let formTitle = 'Add Product';
                let formBtnText = 'Save Product';
                let formAction = '{{ route('admin.products.store') }}';
                let formMethod = 'POST';
                $('#modalTitle').html(formTitle);
                $('#btnSubmit').html(formBtnText);
                $('#createUpdateForm').attr('method', formMethod).attr('action', formAction);
                $('#method').attr('disabled', true);
            });
            $('.editBtn').click(function (e) {
                e.preventDefault();
                let formTitle = 'Update Product';
                let formBtnText = 'Update Product';
                let name = $(this).data('name');
                let slug = $(this).data('slug');
                let price = $(this).data('price');
                let quantity = $(this).data('quantity');
                let shop = $(this).data('shop');
                let discountEnabled = $(this).data('discountenabled');
                let discountPrice = $(this).data('discountprice');
                let sort = $(this).data('sort');
                let status = $(this).data('status');
                let description = $(this).data('description');
                let formAction = $(this).data('action');


                if(discountEnabled) {
                    $('#createUpdateForm [name=discount_enabled]').attr('checked', true);
                    $('#createUpdateForm [name=discount_price]').val(discountPrice);
                    $('#discount_price').attr('required', true);
                    $('#discount_price').prop('disabled', false);
                }else {
                    $('#createUpdateForm [name=discount_enabled]').attr('checked', false);
                    $('#discount_price').val(0);
                    $('#discount_price').removeAttr('required');
                    $('#discount_price').prop('disabled', true);
                }

                if(status) {
                    $('#createUpdateForm [name=status]').attr('checked', true);
                }else {
                    $('#createUpdateForm [name=status]').attr('checked', false);
                }

                $('#createUpdateModal #modalTitle').html(formTitle);
                $('#createUpdateModal #btnSubmit').html(formBtnText);
                $('#createUpdateForm [name=name]').val(name);
                $('#createUpdateForm [name=slug]').val(slug);
                $('#createUpdateForm [name=price]').val(price);
                $('#createUpdateForm [name=quantity]').val(quantity);
                $('#createUpdateForm [name=shop_id]').val(shop);
                $('#createUpdateForm [name=sort]').val(sort);

                $('#createUpdateForm [name=description]').html(description);
                $('#createUpdateForm').attr('method', 'POST').attr('action', formAction);
                $('#method').removeAttr('disabled');
            });
            enableDisableDiscountPrice();
            resetForm();
            addSlug();
        });
        function resetForm() {
            document.getElementById("createUpdateForm").reset();
            document.getElementById("description").innerHTML = '';
        }

        function enableDisableDiscountPrice () {
            let checkBox = document.getElementById('discount_enabled');
            if(checkBox.checked) {
                $('#discount_price').attr('required', true);
                $('#discount_price').prop('disabled', false);
            } else {
                $('#discount_price').val(0);
                $('#discount_price').removeAttr('required');
                $('#discount_price').prop('disabled', true);
            }
        }

        function addSlug () {
            let inputText = $('#createUpdateForm #name').val();
            let slug = slugify(inputText);
            $('#createUpdateForm #slug').val(slug);
        }

    </script>
@endpush
