<!-- Model Create Department -->
<!-- Button trigger modal -->
<button id="btn__create__department" type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalDepartment">
    <i class="fa fa-plus" aria-hidden="true"></i>
</button>
<!-- Modal -->
<div class="modal fade bd-example-modal-sm" id="myModalDepartment" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create New Department</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="department">Department Name</label><br/>
                    <input type="text" value="" placeholder="Example: Project" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-simple btn-danger btn-block button-cancel" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-simple btn-block button-create">Ok</button>
            </div>
        </div>
    </div>
</div>
<!-- End Model Create Department -->