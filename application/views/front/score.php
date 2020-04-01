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
        <h1 class="heading">Exam Score</h1>
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
                        <tr>
                            <th>Your Score</th>
                            <td><?php echo $result['quiz_student_score']; ?></td>                            
                        </tr>
                        <tr>
                            <th><b class="pass">Pass</b> / <b class="fail">Fail</b></th>
                            <td><?php if($result['pass']==1){
                                echo '<b class="pass">Pass</b>';
                            }
                            else{
                                echo '<b class="fail">Fail</b>';
                            }
                            ?></td>                           
                        </tr>                                                
                    </tbody>
                </table>                                 
                <?php if($result['pass']==0){
                ?>
                <a class="btn btn-sm btn-warning" href="<?php echo BASE_URL.'/exam/'.$result['rmsa_uploaded_file_id']; ?>">Take Quiz Again</a>
                <?php
                } ?> 
                <a class="btn btn-sm btn-danger" href="<?php echo BASE_URL; ?>/student-resources/NONE">Back To File</a>
            </div>
        </div>
    </div>
</div>
