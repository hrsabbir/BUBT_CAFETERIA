<div class="row">
    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
        <div class="alert alert-<?php echo $type=="success"?"success":"danger"?>">
            <strong><?php echo $type=="success"?"Success: ":"Failed"?></strong> <?php echo $msg;?>
        </div>
    </div>
</div>