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
        <h1 class="heading">Create Quiz  For <?php echo $fileDetails[0]['uploaded_file_title']; ?></h1>
        <form method="post" id="create_quiz" class="form-horizontal border p-2" action="<?php echo EMPLOYEE_EDIT_QUIZ_LINK.$rmsa_uploaded_file_id; ?>">
           
            <h2 class="second-heading"><a href="<?php echo 'https://docs.google.com/viewer?url='.BASE_URL.FILE_URL.'/'.$fileDetails[0]['uploaded_file_path'].'&embedded=true'; ?>">View file </a></h2>            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="quiz_title">Quiz Title:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="quiz_title" id="quiz_title" placeholder="Quiz Title" required="" value="<?php echo $quizDetails['quiz_title']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="quiz_min_questions">Total Question:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="quiz_min_questions" id="quiz_min_questions" placeholder="Total Question" required="" value="<?php echo $quizDetails['quiz_min_questions']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="quiz_pass_score">Quiz Pass Score: </label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="quiz_pass_score" id="quiz_pass_score" placeholder="Quiz Pass Score" value="<?php echo $quizDetails['quiz_pass_score']; ?>">
                    </div>
                </div>
            </div>            
            <div class="form-group">
                <div class="row">
                    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <script>function enableRegister() {
                        $("#btnRegister").removeClass('btn_disabled');
                        document.getElementById("btnRegister").disabled = false;
                    }</script>
                    <label class="control-label col-sm-4 col-xs-12" for="ptsp"></label>
                    <div class="col-sm-8 col-xs-12">
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableRegister"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">    
                    <button type="submit" name="submit" class="btn primary_btn btn_disabled"  disabled="true" id="btnRegister">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>