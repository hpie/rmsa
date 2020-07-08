<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Your Profile</h1>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Teacher Code</th>
                            <td><?php echo $result['rmsa_user_teacher_code']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $result['rmsa_user_first_name']." ".$result['rmsa_user_middle_name']." ".$result['rmsa_user_last_name']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $result['rmsa_user_gender']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Father Name</th>
                            <td><?php echo $result['rmsa_user_father_name']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Mobile Number</th>
                            <td><?php echo $result['rmsa_user_mobile_no']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $result['rmsa_user_email_id']; ?></td>                            
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td><?php echo $result['rmsa_user_DOB']; ?></td>                            
                        </tr>
                        <tr>
                            <th>School Name</th>
                            <td><?php echo $result['rmsa_school_title']; ?></td>                            
                        </tr>
                        <tr>
                            <th>District</th>
                            <td><?php echo $result['rmsa_district_name']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Tehshil</th>
                            <td><?php echo $result['rmsa_sub_district_name']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Class</th>
                            <td><?php echo $result['rmsa_user_class']; ?></td>                            
                        </tr>
                    </tbody>
                </table>                                            
            </div>
        </div>
    </div>
    </div>
</div>