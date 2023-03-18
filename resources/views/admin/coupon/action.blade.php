@section('box')
    <!-- Create Update Modal-->
    <div class="modal fade" id="createUpdateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle" class="modal-title">Add Coupon</h5>
                    <button
                        onclick="resetForm();"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="createUpdateForm" action="{{ route('admin.coupons.store') }}" method="POST">
                    @csrf
                    <input id="method" type="hidden" name="_method" value="PATCH" disabled>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label
                                    for="coupon_code"
                                    class="form-label">
                                    Coupon Code
                                </label>
                                <input
                                    type="text"
                                    name="coupon_code"
                                    class="form-control"
                                    onkeyup="formatCouponCode()"
                                    required
                                    id="coupon_code">
                            </div>
                            <div class="col-12 mb-3">
                                <label
                                    for="coupon_price"
                                    class="form-label">
                                    Coupon Price
                                </label>
                                <input
                                    type="number"
                                    name="coupon_price"
                                    class="form-control"
                                    min="0"
                                    value="0"
                                    id="coupon_price">
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="from"
                                    class="form-label">
                                    From
                                </label>
                                <input
                                    type="date"
                                    name="from"
                                    required
                                    class="form-control"
                                    id="from">
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="to"
                                    class="form-label">
                                    To
                                </label>
                                <input
                                    type="date"
                                    name="to"
                                    required
                                    class="form-control"
                                    id="to">
                            </div>
                            <div class="col-6">
                                <label
                                    for="shop_id"
                                    class="form-label">
                                    Shop
                                </label>
                                <select
                                    class="form-control"
                                    name="shop_id"
                                    id="shop_id">
                                    <option value="">Select a Shop</option>
                                    @foreach($shops as $shop)
                                        <option value="{{ $shop->id }}">
                                            {{ $shop->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label
                                    for="status"
                                    class="form-label">
                                    Status
                                </label><br>
                                <label class="switch">
                                    <input type="checkbox" name="status" value="1" checked>
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            onclick="resetForm();"
                            class="btn btn-sm btn-secondary"
                            data-bs-dismiss="modal">
                            Close
                        </button>
                        <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary">Save Coupon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Create Update Modal-->
@endsection
