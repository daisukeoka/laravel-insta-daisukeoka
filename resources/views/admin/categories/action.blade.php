<div class="modal fade" id="delete-category{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h4 class="h5 modal-title">
                    <i class="fa-solid fa-trash"></i> Delete Category
                </h4>
            </div>
            <div class="modal-body text-start">
                Are you sure you want to delete <span class="fw-bold">{{ $category->name }}</span> category?
                <p class="text-muted fw-light">
                    This actionaffect all the posts under this category. Posts without a category will fall under Uncategorized.
                </p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.categories.destroy', $category->id)}}" method="post">
                    @csrf 
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-category{{ $category->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-warning">
            <div class="modal-header border-warning">
                <h4 class="h5 modal-title">
                    <i class="fa-solid fa-pen-to-square"></i> Edit Category
                </h4>
            </div>
            <form action="{{ route('admin.categories.update', $category->id)}}" method="post">
                @csrf 
                @method('PATCH')
                <div class="modal-body">
                    <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                </div>
                <div class="modal-footer">
                        <button type="button" data-bs-dismiss="modal" class="btn btn-sm btn-outline-danger">Cancel</button>
                        <button type="submit" class="btn btn-sm btn-warning">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>