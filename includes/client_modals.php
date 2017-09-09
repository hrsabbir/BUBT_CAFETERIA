<div class="modal fade bs-example-modal-sm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Warning</h4>
            </div>
            <div class="modal-body">
                Please Sign in First
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="#signin_link"><button type="button" class="btn btn-primary" data-dismiss="modal">Sign in</button></a>
            </div>
        </div>
    </div>
</div>







<div class="modal fade bs-example1-modal-sm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm" role="document">

        <div class="modal-content">

            <div class="modal-header bg-success">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Order</h4>
            </div>
            <form action="index.php" method="post" class="form_action" data-parsley-validate>
                <div class="modal-body bg-warning">
                    <div class="form-group">
                        <label for="item_id"></label>
                        <input type="text" class="form-control" placeholder="Enter Name" id="order_name" name="item_name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="Available"></label>
                        <input type="text" class="form-control" placeholder="Enter Amount here" id="order_available" disabled>
                    </div>

                    <div class="form-group">
                        <label for="Amount"></label>
                        <input type="number" class="form-control" placeholder="Enter Quantity here" id="order_amount" name="item_amount" required>
                    </div>

                    <input type="hidden" id="order_id" name="item_id">

                </div>
                <div class="modal-footer bg-success">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="order_submit" name="item_submit"  value="%"  class="btn btn-success">Order</button></a>
                </div>
            </form>
        </div>
    </div>
</div>

