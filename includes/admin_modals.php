

<div class="modal fade bs-example-admin-modal-sm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm</h4>
            </div>
            <form action="index.php" method="post" class="form_action">
                <div class="modal-body bg-warning">
                    Are you Sure?
                    <input type="hidden" id="order_token" name="order_token">
                </div>
                <div class="modal-footer bg-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="view_order_submit"  value="%"  class="btn btn-success">Yes</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade edit_item" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <form action="index.php" method="post" class="form_action" data-parsley-validate>
                <div class="modal-body bg-warning">
                    <div class="form-group">
                        <label for="item_name">Name</label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="item_update_name" name="item_name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="item_stock">Available</label>
                        <input type="text" class="form-control" placeholder="Enter Amount here" id="item_update_stock" name="item_stock">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" placeholder="Enter Price here" id="item_update_price" name="item_price">
                    </div>

                    <input type="hidden" id="item_update_id" name="item_id">

                </div>
                <div class="modal-footer bg-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="item_update_submit" name="item_update_submit"  value="%"  class="btn btn-success">Update</button></a>
                </div>
            </form>
        </div>
    </div>
</div>


