<!-- Modal -->
<div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="" method="get" id="locationForm">
                <input type="hidden" id="latitude" value="55.05" required>
                <input type="hidden" id="longitude" value="-52.50" required>
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="locationName" placeholder="New York" required>
                        <label for="locationName">Please type your place name</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
