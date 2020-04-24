<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report.php');
        ?>
        <h1 class="heading">Top Employee with most uploaded content</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
                <tr>
                    <th scope="col">Employee Code</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Employee Email</th>
                    <th scope="col">Employee State</th>
                    <th scope="col">Employee District</th>
                    <th scope="col">Employee School</th>
                    <th scope="col">Total Content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data AS $key => $employee) { ?>
                    <tr>
                        <td><?= $employee['rmsa_user_employee_code'] ?></td>
                        <td><?= $employee['employee_name'] ?></td>
                        <td><?= $employee['rmsa_user_email_id'] ?></td>
                        <td><?= $employee['rmsa_state_name'] ?></td>
                        <td><?= $employee['rmsa_district_name'] ?></td>
                        <td><?= $employee['rmsa_school_title'] ?></td>
                        <td><?= $employee['uploaded_count'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <canvas id="most_content_upload_employee" width="200" height="200"></canvas>
</div>
<script nonce='S51U26wMQz' type="text/javascript">
    window.most_upload = <?php echo json_encode($data) ?>
</script>
