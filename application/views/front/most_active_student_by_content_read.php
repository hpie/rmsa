
<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report.php');
        ?>
        <h1 class="heading">Most Active Student By Content Read</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">Student Roll Number</th>
                <th scope="col">Student Name</th>
                <th scope="col">Student Email</th>
                <th scope="col">Student School</th>
                <th scope="col">Student District</th>
                <th scope="col">Student State</th>
                <th scope="col">Total Read File</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key=> $file){ ?>
                <tr>
                    <td><?= $file['rmsa_user_roll_number'] ?></td>
                    <td><?= $file['student_name'] ?></td>
                    <td><?= $file['rmsa_user_email_id'] ?></td>
                    <td><?= $file['rmsa_school_title'] ?></td>
                    <td><?= $file['rmsa_district_name'] ?></td>
                    <td><?= $file['rmsa_state_name'] ?></td>
                    <td><?= $file['most_active'] ?></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
    <canvas id="most_active_student" width="400" height="400"></canvas>
</div>
<script nonce='S51U26wMQz' type="text/javascript">
    window.most_active_student = <?php echo json_encode($data)?>
</script>
