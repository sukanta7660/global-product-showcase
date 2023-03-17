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
                                    name="about"
                                    id="description"
                                    cols="10"
                                    rows="5"
                                    class="form-control"
                                    placeholder="Description"></textarea>
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="email"
                                    class="form-label">
                                    Email
                                </label>
                                <input
                                    type="email"
                                    name="email"
                                    placeholder="Email"
                                    class="form-control"
                                    id="email">
                            </div>
                            <div class="col-6 mb-3">
                                <label
                                    for="cell"
                                    class="form-label">
                                    Cell
                                </label>
                                <input
                                    type="text"
                                    name="cell"
                                    class="form-control"
                                    placeholder="Cell No"
                                    id="cell">
                            </div>
                            <div class="col-4">
                                <label
                                    for="location_id"
                                    class="form-label">
                                    Location
                                </label>
                                <select
                                    class="form-control"
                                    name="location_id"
                                    id="location_id">
                                    <option value="">Select a Location</option>
                                    @foreach($locations as $location)
                                        <option value="{{ $location->id }}">
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4">
                                <label
                                    for="sort"
                                    class="form-label">
                                    Sort
                                </label>
                                <input
                                    type="number"
                                    name="sort"
                                    class="form-control"
                                    placeholder="Sort"
                                    min="0"
                                    id="sort">
                            </div>
                            <div class="col-4">
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
