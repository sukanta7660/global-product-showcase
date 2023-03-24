<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Place your location</h5>
                <button id="locationModalCloseBtn" style="display: none" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" id="locationForm">
                <input type="hidden" id="latitude" required>
                <input type="hidden" id="longitude" required>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="locationName" placeholder="New York" required>
                        <label for="locationName">Please type your place name</label>
                        <ul id="search-results"></ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
