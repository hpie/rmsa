
<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Change password</h1>
        <form method="post" id="frm_change_password" class="form-horizontal border p-2" action="<?php echo EMPLOYEE_UPDATE_PROFILE_LINK ?>">            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_first_name">Current Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_current_password" id="rmsa_user_current_password" placeholder="Enter Current Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_new_password">New Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="password" class="form-control" name="rmsa_user_new_password" id="rmsa_user_new_password" placeholder="Enter New Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_confirm_password">Confirm Password: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="password" class="form-control" name="rmsa_user_confirm_password" id="rmsa_user_confirm_password" placeholder="Enter Confirm Password">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn">Update</button>
                </div>
            </div>
        </form>

    </div>
</div>
