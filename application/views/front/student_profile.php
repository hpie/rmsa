
<!-- content -->
<div class="col-md-6 col-sm-8  col-12">
    <div class="middle-area">
        <h1 class="heading">Update Profile of Students in the RMSA Portal</h1>

        <form method="post" id="frm_general_info" class="form-horizontal border p-2" action="<?php echo STUDENT_UPDATE_PROFILE_LINK ?>">
            <h2 class="second-heading">General Information</h2>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_first_name">First Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$student_data['rmsa_user_first_name']?>" name="rmsa_user_first_name" id="rmsa_user_first_name" placeholder="Enter First Name ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_middle_name">Middle Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$student_data['rmsa_user_middle_name']?>" name="rmsa_user_middle_name" id="rmsa_user_middle_name" placeholder="Enter Middle Name ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_last_name">Last Name: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$student_data['rmsa_user_last_name']?>" name="rmsa_user_last_name" id="rmsa_user_last_name" placeholder="Enter Last Name ">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_nick_name">Nick Name: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$student_data['rmsa_user_nick_name']?>" name="rmsa_user_nick_name" id="rmsa_user_nick_name" placeholder="Enter Nick Name ">
                    </div>
                </div>
            </div>


            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn">Update</button>
                </div>
            </div>
        </form>


        <form method="post" id="frm_change_password" class="form-horizontal border p-2" action="<?php echo STUDENT_UPDATE_PROFILE_LINK ?>">
            <h2 class="second-heading">Change password</h2>
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
