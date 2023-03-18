@extends('layouts.admin')
@extends('admin.coupon.action')
@section('title', 'Coupons')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
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
                <div class="card">
                    <div class="card-header">
                        <span class="card-title">Coupons</span>
                        <button
                            id="addLocationButton"
                            type="button"
                            data-bs-toggle="modal"
                            data-bs-target="#createUpdateModal"
                            class="btn btn-sm btn-outline-primary float-end">
                            <i class="bi bi-plus-circle-dotted"></i>
                            Add Coupon
                        </button>
                    </div>
                    <div class="card-body">
                        <!-- Table with stripped rows -->
                        <table class="table table-striped" id="">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th scope="col">Code</th>
                                <th class="wp-20" scope="col">Shop</th>
                                <th scope="col">Coupon Price</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($coupons as $key => $coupon)
                                <tr>
                                    <th scope="col">{{ dateformat($coupon->created_at, 'd M, Y') }}</th>
                                    <td class="wp-20 text-uppercase">{{ $coupon->coupon_code }}</td>
                                    <td class="wp-20 text-capitalize">{{ $coupon->shop->name }}</td>
                                    <td>{{ getCurrencyFormat($coupon->coupon_price) }}</td>
                                    <td>{{ dateformat($coupon->from, 'd M, Y') }}</td>
                                    <td>{{ dateformat($coupon->to, 'd M, Y') }}</td>
                                    <td>
                                        <span class="badge badge-{{ $coupon->status ? 'success' : 'danger' }}">
                                            {{ $coupon->status ? 'Enabled' : 'Disabled' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('admin.shops.destroy', $coupon->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                data-action="{{ route('admin.coupons.update', $coupon->id) }}"
                                                data-code="{{ $coupon->coupon_code }}"
                                                data-price="{{ $coupon->coupon_price }}"
                                                data-shop="{{ $coupon->shop_id }}"
                                                data-from="{{ $coupon->from }}"
                                                data-to="{{ $coupon->to }}"
                                                data-status="{{ $coupon->status }}"
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
                        {{ $coupons->links() }}
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
                let formTitle = 'Add Coupon';
                let formBtnText = 'Save Coupon';
                let formAction = '{{ route('admin.coupons.store') }}';
                let formMethod = 'POST';
                $('#modalTitle').html(formTitle);
                $('#btnSubmit').html(formBtnText);
                $('#createUpdateForm').attr('method', formMethod).attr('action', formAction);
                $('#method').attr('disabled', true);
            });
            $('.editBtn').click(function (e) {
                e.preventDefault();
                let formTitle = 'Update Coupon';
                let formBtnText = 'Update Coupon';
                let code = $(this).data('code');
                let price = $(this).data('price');
                let from = $(this).data('from');
                let to = $(this).data('to');
                let shop = $(this).data('shop');
                let status = $(this).data('status');
                let formAction = $(this).data('action');

                if(status) {
                    $('#createUpdateForm [name=status]').attr('checked', true);
                }else {
                    $('#createUpdateForm [name=status]').attr('checked', false);
                }

                $('#createUpdateModal #modalTitle').html(formTitle);
                $('#createUpdateModal #btnSubmit').html(formBtnText);
                $('#createUpdateForm [name=coupon_code]').val(code);
                $('#createUpdateForm [name=coupon_price]').val(price);
                $('#createUpdateForm [name=from]').val(from);
                $('#createUpdateForm [name=to]').val(to);
                $('#createUpdateForm [name=shop_id]').val(shop);

                $('#createUpdateForm').attr('method', 'POST').attr('action', formAction);
                $('#method').removeAttr('disabled');
            });
            resetForm();
            formatCouponCode();
        });
        function resetForm() {
            document.getElementById("createUpdateForm").reset();
        }

        function formatCouponCode () {
            let inputField = $('#createUpdateForm #coupon_code');
            let toUpper = inputField.val().trim().toUpperCase();
            inputField.val(toUpper);
        }

    </script>
@endpush
