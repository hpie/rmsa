<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report.php');
        ?>
        <h1 class="heading">Top Employee with most viewed content</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
                <tr>
                    <th scope="col">Employee Code</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Employee Email</th>
                    <th scope="col">Employee State</th>
                    <th scope="col">Employee District</th>
                    <th scope="col">Employee School</th>
                    <th scope="col">File Title</th>
                    <th scope="col">Total View</th>

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
                        <td><?= $employee['uploaded_file_title'] ?></td>
                        <td><?= $employee['uploaded_file_viewcount'] ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <canvas id="most_content_view_employee" width="200" height="200"></canvas>
    </div>
</div>
<script>
    window.most_content_view_employee = <?php echo json_encode($data) ?>
</script>
