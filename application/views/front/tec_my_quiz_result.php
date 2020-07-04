<style>
    .pass{
        color: green;
    }
    .fail{
        color: red;
    }
</style>
<div class="col-md-9 col-sm-12">
        <div class="middle-area"> 
            <h1 class="heading">File and quiz details</h1>
            <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>File Title</th>
                            <td><?php echo $result['uploaded_file_title']; ?></td>                            
                        </tr>
                        <tr>
                            <th>File Group</th>
                            <td><?php echo $result['uploaded_file_group']; ?></td>                            
                        </tr>
                        <tr>
                            <th>File Category</th>
                            <td><?php echo $result['uploaded_file_category']; ?></td>                            
                        </tr>
                        <tr>
                            <th>File Description</th>
                            <td><?php echo $result['uploaded_file_desc']; ?></td>                            
                        </tr>
                        <tr>
                            <th>Passing Score</th>
                            <td><?php echo $result['quiz_pass_score']; ?></td>                            
                        </tr>                                                                                  
                    </tbody>
                </table>                                               
            </div>
        </div>
        <h1 class="heading">Quiz Attempt List</h1>
        <hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Index</th>
                <th>Your Score</th>
                <th>Attempt Date</th>
                <th>Result</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Index</th>
                <th>Your Score</th>
                <th>Attempt Date</th>
                <th>Result</th>
            </tr>
        </tfoot>
    </table> 
        </div>
</div>

