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
                    <th scope="col">Employee Name</th>
                    <th scope="col">Total Content</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data AS $key => $employee) { ?>
                    <tr>
                        <th scope="row"><?= $employee['employee_name'] ?></th>
                        <td><?= $employee['uploaded_count'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <canvas id="most_content_upload_employee" width="200" height="200"></canvas>
</div>
<script>
    window.most_upload = <?php echo json_encode($data) ?>
</script>
