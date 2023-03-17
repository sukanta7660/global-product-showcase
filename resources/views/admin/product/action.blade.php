@section('box')
    <!-- Create Update Modal-->
    <div class="modal fade" id="createUpdateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle" class="modal-title">Add Shop</h5>
                    <button
                        onclick="resetForm();"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="createUpdateForm" action="{{ route('admin.shops.store') }}" method="POST">
                    @csrf
                    <input id="method" type="hidden" name="_method" value="PATCH" disabled>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label
                                    for="name"
                                    class="form-label">
                                    Name
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    onkeyup="addSlug()"
                                    class="form-control"
                                    required
                                    id="name">
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="slug"
                                    class="form-label">
                                    Slug
                                </label>
                                <input
                                    type="text"
                                    name="slug"
                                    class="form-control"
                                    required
                                    readonly
                                    id="slug">
                            </div>
                            <div class="col-12 mb-3">
                                <label
                                    for="description"
                                    class="form-label">
                                    Description
                                </label>
                                <textarea
                                    name="description"
                                    id="description"
                                    cols="10"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="price"
                                    class="form-label">
                                    Price
                                </label>
                                <input
                                    type="number"
                                    name="price"
                                    min="0"
                                    required
                                    placeholder="Price"
                                    class="form-control"
                                    id="price">
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="quantity"
                                    class="form-label">
                                    Quantity
                                </label>
                                <input
                                    type="text"
                                    name="quantity"
                                    required
                                    class="form-control"
                                    placeholder="Quantity"
                                    id="quantity">
                            </div>
                            <div class="col-6">
                                <label
                                    class="form-label">
                                    Discount Enable?
                                </label><br>
                                <label class="switch">
                                    <input
                                        id="discount_enabled"
                                        type="checkbox"
                                        name="discount_enabled"
                                        onclick="enableDisableDiscountPrice()"
                                        value="0"
                                    >
                                    <span class="slider round"></span>
                                </label>
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="discount_price"
                                    class="form-label">
                                    Discount Price
                                </label>
                                <input
                                    type="number"
                                    name="discount_price"
                                    min="0"
                                    required
                                    placeholder="Discount Price"
                                    class="form-control"
                                    id="discount_price">
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
                        <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary">Save Shop</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Create Update Modal-->
@endsection
