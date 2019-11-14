<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report.php');
        ?>
        <h1 class="heading">Top School Most Active Students</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">School Name</th>
                <th scope="col">Total Active Students</th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key => $school) { ?>
                <tr>
                    <th scope="row"><?= $school['rmsa_school_title'] ?></th>
                    <td><?= $school['school_has_most_active'] ?></td>
                </tr>
            <?php } ?>

            </tbody>
        </table>
        <canvas id="school_most_active_students" width="200" height="200"></canvas>
    </div>
</div>
<script>
    window.school_most_active_students = <?php echo json_encode($data) ?>
</script>
