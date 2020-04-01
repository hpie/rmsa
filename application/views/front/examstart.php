<!-- content -->
<style>
    .btn_disabled{
        pointer-events: none;
        background-color: #c3bdbd;
        opacity: 15.9;
    }
</style>
<div class="col-md-9 col-sm-9">
    <div class="middle-area">
        <!--<h1 class="heading">Add question for <?php //echo $quizDetails['quiz_title'];  ?></h1>-->        
        <form method="post" id="create_quiz" class="form-horizontal border p-2" action="<?php echo BASE_URL.'/student-exam/'.$quizdetails['rmsa_uploaded_file_id'].'/'.$quizdetails['quiz_id'].'/'.$next; ?>">                               
            <input type="hidden" name="question_id" value="<?php echo $questiondetails['question_id']; ?>">            
            <div class="form-group">
                <div class="row">                    
                    <div class="col-md-11 offset-1">
                        <p><h4><b>Q1.</b> <?php echo $questiondetails['question']; ?></h4></p>
                    </div>
                </div>
            </div>
            <?php
            if (!empty($choicedetails))
                $i=0;
                foreach ($choicedetails as $ch) {
                    $i=$i+1;
                    ?>
                    <div class="form-group">
                        <div class="row"> 
                            <div class="col-md-11 offset-1">                        
                                <label>
                                    <input type="radio" name="choice" value="<?php echo $ch['choice']; ?>" required="">                                    
                                    <?php if($i==5){echo 'None of the Above';}else{echo $ch['choice'];} ?>                        
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>            
            <hr>            
            <div class="form-group">
                <div class="m-auto text-center">                    
                    <button type="submit" name="submit" class="btn primary_btn">Next</button>                    
                </div>
            </div>
        </form>
    </div>
</div>
