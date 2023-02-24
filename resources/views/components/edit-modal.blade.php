<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Add new game</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-1">
                        <label for="disabledTextInput" class="form-label">ID</label>
                        <input type="text" id="disabledID" class="form-control" value="" disabled>
                      </div>
                    <div class="mb-3">
                        <label for="editGame_name" class="form-label">Game name</label>
                        <input type="text" class="form-control" id="editGame_name">
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editDescription" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="update" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>