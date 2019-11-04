<!-- content -->
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <h1 class="heading">Most Rated Content</h1>
<!--        <table class="table table-borderless table-responsive contact_us">
            <thead class="bg-gray">
            <tr>
                <th scope="col">File Title</th>
                <th scope="col">Rating</th>

            </tr>
            </thead>
            <tbody>
            <?php //foreach ($data AS $key=> $file){ ?>
                <tr>
                    <td><//?= $file['uploaded_file_title'] ?></td>
                    <td><//?= $file['overall_rating'] ?></td>
                </tr>
            <?php //}?>

            </tbody>
        </table>-->
        
        
    <table class="display MyDatatable" style="width:100%">
        <thead>
        <tr>
            <th>File Title</th>
            <th>Rating</th>
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
        <tfoot>
        <tr>
           <th>File Title</th>
           <th>Rating</th>
        </tr>
        </tfoot>
    </table>
    </div>
</div>
