<div class="section_gap">
    </div>
<div class="contact" id="contact_link">


    <?php getHeading("CONTACT US")?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3  col-xs-10 col-xs-offset-1   contact_form">

            <form method="post" action="#contact_link" data-parsley-validate>
                <div class="col-md-12">
                    <div class="row">
                        <?php $form=="contact"?require 'partial_form_alert.php':""?>
                        <div class="col-md-12 form-group">
                            <label>Full Name</label>
                            <input type="text" placeholder="Enter Name Here.." class="form-control" minlength="3" name="contact_name" maxlength="15" required>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Mobile Number</label>
                        <input type="tel" placeholder="Enter Phone Number Here.." class="form-control" required minlength="11" name="contact_mobile" maxlength="11">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Enter Message Here.." class="form-control" name="contact_email"required>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea placeholder="Enter Message Here.." rows="3" class="form-control" name="contact_message" required></textarea>
                    </div>



                    <button type="submit"  value="%" class="btn btn-success btn-block" name="contact_submit">Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>