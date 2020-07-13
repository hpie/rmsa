<!-- content -->
<style>
    .btn_disabled{
        pointer-events: none;
        background-color: #c3bdbd;
        opacity: 15.9;
    }
</style>
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Student Registration</h1>
        <form method="post" id="student_register" class="form-horizontal border p-2" action="<?php echo STUDENT_REGISTER_LINK; ?>">
            <h2 class="second-heading">General Information</h2>
           
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_first_name">First Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_first_name" id="rmsa_user_first_name" placeholder="Enter First Name ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_middle_name">Middle Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_middle_name" id="rmsa_user_middle_name" placeholder="Enter Middle Name ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_last_name">Last Name: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_last_name" id="rmsa_user_last_name" placeholder="Enter Last Name ">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_nick_name">Nick Name: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_nick_name" id="rmsa_user_nick_name" placeholder="Enter Nick Name ">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_roll_number">Roll Number: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_roll_number" id="rmsa_user_roll_number" placeholder="Enter Roll Number">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_email_id">Email: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_email_id" id="rmsa_user_email_id" placeholder="Enter Email ">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_email_password">New Password:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="password" class="form-control" name="rmsa_user_email_password" id="rmsa_user_email_password" placeholder="Enter New Password">
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
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_DOB">Date of Birth:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="date" class="form-control" name="rmsa_user_DOB" id="rmsa_user_DOB">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="Gender">Gender:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="radio" checked name="rmsa_user_gender" value="M">&nbsp;<span>Male</span>
                        <input type="radio" name="rmsa_user_gender" value="F">&nbsp;<span>Female</span>
                        <input type="radio" name="rmsa_user_gender" value="O">&nbsp;<span>Other</span>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_father_name">Father's
                        Name:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="rmsa_user_father_name" id="rmsa_user_father_name" placeholder="Enter Father Name">
                    </div>
                </div>
            </div>

            <?php
            if(!isset($_SESSION['emp_rmsa_user_id']) && !isset($_SESSION['tech_rmsa_user_id'])){?>
                 <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_district_id">Distt:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" id="rmsa_district" name="rmsa_district_id" required>
                            <option class="" value="" disabled selected>------ Select ------</option>
                            <?php
                            if(!empty($distResult)){
                                foreach ($distResult as $row){
                                    ?>
            <option value="<?php echo $row['rmsa_district_id']; ?>"><?php echo $row['rmsa_district_name']; ?></option>
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
                <option class="" value="" disabled selected>------ Select ------</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <label class="control-label col-sm-4 col-xs-12" for="rmsa_sub_district_id">Tehsil:</label>
        <div class="col-sm-8 col-xs-12">
            <select class="form-control" id="sub_district" name="rmsa_sub_district_id">
                <option class="" value="" disabled selected>------ Select ------</option>
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <label class="control-label col-sm-4 col-xs-12" for="rmsa_school_id">School:</label>
        <div class="col-sm-8 col-xs-12">
            <select class="form-control" id="rmsa_school" name="rmsa_school_id" required="">
                <option class="" value="" disabled selected>------ Select ------</option>
            </select>
        </div>
    </div>
</div>
           <?php }
            ?>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_user_class">Class:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" name="rmsa_user_class" required>
                           <option class="" value="" disabled selected>------ Select ------</option>
                            <option value="ix">Class IX</option>
                            <option value="x">Class X</option>
                            <option value="xi">Class XI</option>
                            <option value="xii">Class XII</option>
                        </select>
                    </div>
                </div>
            </div>
            
            
             <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="rmsa_stream_code">Stream:</label>
                    <div class="col-sm-8 col-xs-12">
                        <select class="form-control" name="rmsa_stream_code" required=""> 
                            <option class="" value="" disabled selected>------ Select ------</option>
                            <?php
                            if(!empty($stream)){
                                foreach ($stream as $row){
                                    ?>
                                <option value="<?php echo $row['category_code']; ?>"><?php echo $row['category_title']; ?></option>
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
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp">Permission to Submit
                        Post:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="checkbox" class="from-control">
                        &nbsp;
                        <span>Check if Required </span>
                    </div>
                </div>
            </div>
            <!--<div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp">Verification:</label>
                    <div class="col-sm-8 col-xs-12">
                        Enter the code:
                    </div>
                </div>
            </div>-->
            <div class="form-group">
                <div class="row">
                    <script nonce='S51U26wMQz' type="text/javascript" src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script nonce='S51U26wMQz' type="text/javascript">function enableRegister() {
                        $("#btnRegister").removeClass('btn_disabled');
                        document.getElementById("btnRegister").disabled = false;
                    }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableRegister"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">    
                    <button type="submit" class="btn primary_btn btn_disabled"  disabled="true" id="btnRegister">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>
