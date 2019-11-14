<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report.php');
        ?>
        <h1 class="heading">Top District With Most Content</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">District Name</th>
                <th scope="col">Total Uploaded Content</th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key => $district) { ?>
                <tr>
                    <th scope="row"><?= $district['rmsa_district_name'] ?></th>
                    <td><?= $district['uploaded_content'] ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
        <canvas id="top_district_upload_content" width="200" height="200"></canvas>
    </div>
</div>
<script>
    window.top_district_upload_content = <?php echo json_encode($data) ?>
</script>
