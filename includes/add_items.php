<?php addItems()?>
<div class="section_gap">
</div>
<div class="add_items" id="add_items_link">
    <?php getHeading("Add Items")?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 well">
            <form method="post" action="#add_items_link" enctype="multipart/form-data" data-parsley-validate>
                <div class="col-md-12">
                    <div class="row">

                        <?php $form=="add_items"?require 'partial_form_alert.php':""?>

                        <div class="form-group">
                            <label>Item Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="item_name" value="<?php echo isset($_POST['item_name'])?$_POST['item_name']:"";?>"placeholder="Enter Item Name" data-parsley-errors-container="#error_item_name" minlength="4" maxlength="20" required/>
                            </div>
                        </div>
                        <div class="row" id="error_item_name"></div>

                        <div class="form-group">
                            <label>Image</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-image fa-lg" aria-hidden="true"></i></span>
                                <input class="form-control" type="file"  name="image" id="r_password" placeholder="Upload Image"  data-parsley-errors-container="#error_image" required/>
                            </div>
                        </div>
                        <div class="row" id="error_image"></div>

                        <div class="form-group">
                            <label>How many are Available</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-sort-amount-asc fa" aria-hidden="true"></i></span>
                                <input type="text" data-parsley-type="number" class="form-control" name="stock" value="<?php echo isset($_POST['stock'])?$_POST['stock']:"";?>" placeholder="Enter available quantity"  data-parsley-errors-container="#error_stock" minlength="0" maxlength="3" required/>
                            </div>
                        </div>
                        <div class="row" id="error_stock"></div>
                        <div class="form-group">
                            <label>Price</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar fa" aria-hidden="true"></i></span>
                                <input type="number" class="form-control" name="price" value="<?php echo isset($_POST['price'])?$_POST['price']:"";?>" placeholder="Enter amount here"  data-parsley-errors-container="#error_price" min="1" max="999" required/>
                            </div>
                        </div>
                        <div class="row" id="price"></div>
                        <button type="submit"  value="%"  class="btn btn-primary btn-block" name="submit_add_item">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>