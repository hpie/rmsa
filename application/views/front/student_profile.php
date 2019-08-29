<?php
echo "<pre>";
print_r($_SESSION);
exit;
?>

<!-- content -->
<div class="col-md-6 col-sm-8  col-12">
    <div class="middle-area">
        <h1 class="heading">Update Profile of Students in the RMSA Portal</h1>
        <form method="post" class="form-horizontal border p-2" action="<?php echo STUDENT_UPDATE_PROFILE_LINK ?>">
            <h2 class="second-heading">General Information</h2>
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
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_middle_name">New Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_new_password" id="rmsa_user_new_password" placeholder="Enter New Password">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_last_name">Confirm Password: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_confirm_password" id="rmsa_user_confirm_password" placeholder="Enter Confirm Password">
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
