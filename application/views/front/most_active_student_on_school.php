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
                <th scope="col">School District</th>
                <th scope="col">School State</th>
                <th scope="col">Total Active Students</th>


            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key => $school) { ?>
                <tr>
                    <td><?= $school['rmsa_school_title'] ?></td>
                    <td><?= $school['rmsa_district_name'] ?></td>
                    <td><?= $school['rmsa_state_name'] ?></td>
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
