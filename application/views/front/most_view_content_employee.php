<!-- content -->
<?php
include('employee_report.php');
?>
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Top Employee with most viewed content</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">File Title</th>
                <th scope="col">Total View</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key=> $employee){ ?>
                <tr>
                    <th scope="row"><?= $employee['employee_name'] ?></th>
                    <td><?= $employee['uploaded_file_title'] ?></td>
                    <td><?= $employee['uploaded_file_viewcount'] ?></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
        <canvas id="most_content_view_employee" width="400" height="400"></canvas>
    </div>
</div>
<script>
    window.most_content_view_employee = <?php echo json_encode($data)?>
</script>
