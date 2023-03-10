@section('box')
    <!-- Create Update Modal-->
    <div class="modal fade" id="createUpdateModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="modalTitle" class="modal-title">Add Location</h5>
                    <button
                        onclick="resetForm();"
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form id="createUpdateForm" action="{{ route('admin.locations.store') }}" method="POST">
                    @csrf
                    <input id="method" type="hidden" name="_method" value="PATCH" disabled>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label
                                    for="location"
                                    class="form-label">
                                    Location
                                </label>
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    required
                                    id="location">
                                <ul id="search-results"></ul>
                            </div>
                            <div class="col-6">
                                <label
                                    for="latitude"
                                    class="form-label">
                                    Latitude
                                </label>
                                <input
                                    readonly
                                    type="text"
                                    name="latitude"
                                    placeholder="Latitude"
                                    class="form-control"
                                    id="latitude">
                            </div>
                            <div class="col-6">
                                <label
                                    for="longitude"
                                    class="form-label">
                                    Longitude
                                </label>
                                <input
                                    type="text"
                                    readonly
                                    name="longitude"
                                    class="form-control"
                                    placeholder="Longitude"
                                    id="longitude">
                            </div>
                            <div class="col-12 mt-3">
                                <div id="map"></div>
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
                        <button id="btnSubmit" type="submit" class="btn btn-sm btn-primary">Save Location</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Create Update Modal-->
