
<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Most Active Student By Content Read</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">Student Name</th>
                <th scope="col">Total Read File</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key=> $file){ ?>
                <tr>
                    <td><?= $file['student_name'] ?></td>
                    <td><?= $file['most_active'] ?></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
    <canvas id="most_active_student" width="400" height="400"></canvas>
</div>
<script>
    window.most_active_student = <?php echo json_encode($data)?>
</script>
