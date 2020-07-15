

<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Update Employee Profile</h1>

        <form method="post" id="frm_general_info" class="form-horizontal border p-2" action="<?php echo RMSA_EMPLOYEE_UPDATE_PROFILE_LINK.$student_data['rmsa_user_id']; ?>">
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
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_employee_code">Employee Code: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$student_data['rmsa_user_employee_code']?>" name="rmsa_user_employee_code" id="rmsa_user_employee_code" placeholder="Enter Employee Code">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_email_id">Email: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="<?=$student_data['rmsa_user_email_id']?>" name="rmsa_user_email_id" id="rmsa_user_email_id" placeholder="Enter Employee Email">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_DOB">DOB: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="date" class="form-control" name="rmsa_user_DOB" id="rmsa_user_DOB" value="<?=$student_data['rmsa_user_DOB']?>">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_district_id">Distt:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" id="rmsa_district" name="rmsa_district_id" required="">
                            <option class="" value="" disabled selected>------ Select ------</option>
                            <?php
                            if(!empty($distResult)){
                                foreach ($distResult as $row){

                                    $selected = '';
                                    if($student_data['rmsa_district_id'] == $row['rmsa_district_id'] ){
                                        $selected = 'selected';
                                    }
                                    ?>

                                    <option value="<?php echo $row['rmsa_district_id']; ?>" <?=$selected ?>><?php echo $row['rmsa_district_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_block_id">Block:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" id="rmsa_blocks" name="rmsa_block_id" required="">
                            <option value="0">---Select---</option>
                            <?php
                            if(!empty($blocksResult)){
                                foreach ($blocksResult as $row){

                                    $selected = '';
                                    if($student_data['rmsa_block_id'] == $row['rmsa_block_id'] ){
                                        $selected = 'selected';
                                    }
                                    ?>

                                    <option value="<?php echo $row['rmsa_block_id']; ?>" <?=$selected ?>><?php echo $row['rmsa_block_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_district_id">Tehsil:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" id="sub_district" name="rmsa_sub_district_id">
                            <option value="0">---Select---</option>
                            <?php
                            if(!empty($tehsilResult)){
                                foreach ($tehsilResult as $row){

                                    $selected = '';
                                    if($student_data['rmsa_sub_district_id'] == $row['rmsa_sub_district_id'] ){
                                        $selected = 'selected';
                                    }
                                    ?>

                                    <option value="<?php echo $row['rmsa_sub_district_id']; ?>" <?=$selected ?>><?php echo $row['rmsa_sub_district_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_school_id">School:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" id="rmsa_school" name="rmsa_school_id" required="">
                            <option value="0">---Select---</option>
                            <?php
                            if(!empty($schoolResult)){
                                foreach ($schoolResult as $row){

                                    $selected = '';
                                    if($student_data['rmsa_school_id'] == $row['rmsa_school_id'] ){
                                        $selected = 'selected';
                                    }
                                    ?>

                                    <option value="<?php echo $row['rmsa_school_id']; ?>" <?=$selected ?>><?php echo $row['rmsa_school_title']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div


            <div class="form-group">
                <div class="m-auto text-center">
                    <button type="submit" class="btn primary_btn">Update</button>
                </div>
            </div>
        </form>


        <form method="post" id="frm_change_password" class="form-horizontal border p-2" action="<?php echo RMSA_EMPLOYEE_UPDATE_PROFILE_LINK.$student_data['rmsa_user_id']; ?>">
            <h2 class="second-heading">Change password</h2>
<!--            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_first_name">Current Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_current_password" id="rmsa_user_current_password" placeholder="Enter Current Password">
                    </div>
                </div>
            </div>-->
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