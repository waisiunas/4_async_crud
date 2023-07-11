<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addModalLabel">Add Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-form">
                    <div class="mb-3">
                        <div class="text-danger" id="error-add"></div>
                        <div class="text-success" id="success-add"></div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="name-add" placeholder="Enter course name!">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="duration-add" placeholder="Enter course duration!">
                    </div>

                    <div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-dark">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form">
                    <div class="mb-3">
                        <div class="text-danger" id="error-edit"></div>
                        <div class="text-success" id="success-edit"></div>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="name-edit" placeholder="Enter course name!">
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" id="duration-edit" placeholder="Enter course duration!">
                    </div>

                    <div>
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <input type="reset" value="Reset" class="btn btn-dark">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="text-danger" id="error-delete"></div>
                    <div class="text-success" id="success-delete"></div>
                </div>
                <form id="delete-form">
                    <div class="mb-3">
                        Are you sure, you want to delete?
                    </div>
                    <input type="submit" class="btn btn-danger" id="btn-delete">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>