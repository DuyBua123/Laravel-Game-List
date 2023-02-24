<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel">
    <div class="modal-dialog">
        <div class=" modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Add new game</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="game_name" class="form-label">Game name</label>
                        <input type="text" class="form-control" id="game_name">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="add" class="btn btn-primary">Add</button>
            </div>
        </div>
    </div>
</div>