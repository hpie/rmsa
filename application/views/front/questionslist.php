<div class="col-md-9 col-sm-12">
        <div class="middle-area">
        <h1 class="heading">Question list for <?php echo $quizDetails['quiz_title']; ?></h1>
        <div class="form-group">                
                <div class="row">
                    <div class="col-sm-2 col-xs-2">                        
                        <a class="btn btn-sm btn-warning" href="<?php echo BASE_URL.'/employee-add-quistions/'.$quizDetails['quiz_id']; ?>">Add New Question</a>
                    </div>                    
                    <div class="col-sm-2 col-xs-2">                       
                        <a class="btn btn-sm btn-danger" href="<?php echo BASE_URL.'/employee-quiz-list/'.$quizDetails['rmsa_uploaded_file_id']; ?>">Back to Quiz</a>
                    </div>                    
                    
                   
                </div>
            </div>        
        
<hr>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Index</th>
                <th>Question</th>                  
                <th>Status</th>                
                <th>Action</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Index</th>
                <th>Question</th>                  
                <th>Status</th> 
                <th>Action</th>                
            </tr>
        </tfoot>
    </table> 
        </div>
</div>

<div class="modal" id="view-reviews" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File Reviews</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="add_rating">
                    <div class="show_comments">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

