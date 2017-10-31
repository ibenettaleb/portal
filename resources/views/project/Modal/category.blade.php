<div id="createCategory">
    <!-- Model Create Category -->
    <!-- Button trigger modal -->
    <button id="btn__create__category" type="button" class="btn btn-primary" data-toggle="modal"
            data-target="#myModalCategory">
        <i class="fa fa-plus" aria-hidden="true"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade bd-example-modal-sm" id="myModalCategory" tabindex="-1" role="dialog"
         aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create New Category</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="department">Category Name</label><br/>
                        <input type="text" name="category__input" id="category__input" value="" placeholder="Example: Project" class="form-control" required>
                        <span class="text-danger" id="category__error">Please enter a Category.</span>
                    </div>
                    <div id="output"></div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-simple btn-danger btn-block button-cancel"
                            data-dismiss="modal">Cancel
                    </button>
                    <button type="button" class="btn btn-primary btn-simple btn-block button-create" id="create__category">Ok</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model Create Category -->
</div>