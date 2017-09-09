<div class="section_gap">
</div>
<div class="signup" id="signup_link">
    <?php getHeading("SIGN UP")?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1 well">
            <form method="post" action="#signup_link" data-parsley-validate>
                <div class="col-md-12">
                    <div class="row">

                        <?php $form=="register"?require 'partial_form_alert.php':""?>

                        <div class="col-md-6 col-sm-10 form-group">
                            <label>First Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" value="<?php echo isset($_POST['fname'])?$_POST['fname']:"";?>" name="fname" data-parsley-errors-container="#error_name"
                                       placeholder="Enter your First Name" minlength="2" maxlength="15" required/>
                            </div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Last Name</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="lname" value="<?php echo isset($_POST['lname'])?$_POST['lname']:"";?>"  data-parsley-errors-container="#error_name" minlength="3" maxlength="20" placeholder="Enter your Last Name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="error_name"></div>
                    <div class="form-group">
                        <label>Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="r_username" value="<?php echo isset($_POST['r_username'])?$_POST['r_username']:"";?>"placeholder="Enter your Username" data-parsley-errors-container="#error_username" minlength="4" maxlength="20" required/>
                        </div>
                    </div>
                    <div class="row" id="error_username"></div>

                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="r_password" id="r_password" placeholder="Enter your Password"  data-parsley-errors-container="#error_password1" minlength="8" maxlength="32" required/>
                        </div>
                    </div>
                    <div class="row" id="error_password1"></div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirm_password" data-parsley-equalto="#r_password" placeholder="Enter your Password"  data-parsley-errors-container="#error_password2" minlength="8" maxlength="32" required/>
                        </div>
                    </div>
                    <div class="row" id="error_password2"></div>

                    <div class="form-group">
                        <label>Mobile Number</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-mobile fa" aria-hidden="true"></i></span>
                            <input type="text" data-parsley-type="number" class="form-control" name="mobile" value="<?php echo isset($_POST['mobile'])?$_POST['mobile']:"";?>" placeholder="Enter your Mobile Number"  data-parsley-errors-container="#error_mobile" minlength="11" maxlength="11" required/>
                        </div>
                    </div>
                    <div class="row" id="error_mobile"></div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="email" class="form-control" name="r_email" value="<?php echo isset($_POST['r_email'])?$_POST['r_email']:"";?>" placeholder="Enter your Email"  data-parsley-errors-container="#error_email" minlength="5" maxlength="30" required/>
                        </div>
                    </div>
                    <div class="row" id="error_email"></div>
                    <button type="submit"  value="%"  class="btn btn-primary btn-block" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>