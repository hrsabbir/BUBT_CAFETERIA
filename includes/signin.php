<div class="section_gap">
</div>
<div class="signin" id="signin_link">
    <?php getHeading("SIGN IN")?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3  col-xs-10 col-xs-offset-1 well">

            <form method="post" action="#signin_link" data-parsley-validate>
                <div class="col-md-12">
                    <?php $form=="login"?require 'partial_form_alert.php':""?>
                    <div class="form-group">
                        <label>Email Address/Username</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Enter your Email/Usernmae" data-parsley-errors-container="#error_username1" minlength="4" maxlength="30" required/>
                        </div>
                    </div>
                    <div class="row" id="error_username1"></div>
                    <div class="form-group">
                        <label>Password</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Enter your Password" data-parsley-errors-container="#error_password_login" minlength="8" maxlength="32" required/>
                        </div>
                    </div>
                    <div class="row" id="error_password_login"></div>
                    <button type="submit" value="%" class="btn btn-primary btn-block btn-lg" name="submit_signin">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
