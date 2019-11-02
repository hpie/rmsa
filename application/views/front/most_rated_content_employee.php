<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Top Employee with most rated content</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">Employee Name</th>
                <th scope="col">File Title</th>
                <th scope="col">Rating</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key=> $employee){ ?>
                <tr>
                    <th scope="row"><?= $employee['employee_name'] ?></th>
                    <td><?= $employee['uploaded_file_title'] ?></td>
                    <td><?= $employee['overall_rating'] ?></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
</div>
