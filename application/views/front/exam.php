<div class="col-md-9 col-sm-12">
        <div class="middle-area">
        <h1 class="heading">Exam required for access this file</h1>
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
                    </tbody>
                </table>                                                 
            </div>
        </div>
        
                <div class="row">
                    <?php if(!empty($result)){ ?>
                    <div class="col-sm-2">                        
                        <a class="btn btn-sm btn-warning" href="<?php echo BASE_URL.'/student-exam/'.$result['rmsa_uploaded_file_id'].'/'.$result['quiz_id'].'/'.$result['question_id']; ?>">Attempt Exam</a>
                    </div>
                    <?php } ?>
                    <div class="col-sm-2">                       
                        <a class="btn btn-sm btn-danger" href="<?php echo BASE_URL; ?>/student-resources/NONE">Cancel</a>
                    </div>                                                           
                </div>
            </div>               
        
</div>
