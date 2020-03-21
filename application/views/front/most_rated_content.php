<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <?php
        include('employee_report.php');
        ?>
        <h1 class="heading">Most Rated Content</h1>
        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">File Title</th>
                <th scope="col">Rating</th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($data AS $key=> $file){ ?>
                <tr>
                    <td><?= $file['uploaded_file_title'] ?></td>
                    <td><?= $file['overall_rating'] ?></td>
                </tr>
            <?php }?>

            </tbody>
        </table>
    </div>
    <canvas id="most_rated_content" width="400" height="400"></canvas>
</div>

<script nonce='S51U26wMQz'>
    window.most_rated_content = <?php echo json_encode($data)?>
</script>
