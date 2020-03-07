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
        <h1 class="heading">Add question for <?php echo $quizDetails['quiz_title']; ?></h1>
        <form method="post" id="create_quiz" class="form-horizontal border p-2" action="<?php echo EMPLOYEE_EDIT_QUISTIONS_LINK.$question_id; ?>">
           
            <h2 class="second-heading">Quiz Title : <?php echo $quizDetails['quiz_title']; ?></h2>            
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="question">Question:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="question" id="question" placeholder="Qusetion text"  value="<?php echo $quizDetails['question']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="choice1">Choice #1:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="choice[]" id="choice1" placeholder="" required="" value="<?php echo $choiceDetails[0]['choice']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="choice2">Choice #2:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="choice[]" id="choice2" placeholder="" required="" value="<?php echo $choiceDetails[1]['choice']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="choice3">Choice #3:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="choice[]" id="choice3" placeholder="" required="" value="<?php echo $choiceDetails[2]['choice']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="choice4">Choice #4:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="choice[]" id="choice4" placeholder="" required="" value="<?php echo $choiceDetails[3]['choice']; ?>">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="choice5">Choice #5:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" value="None of the Above" name="choice[]" id="choice5" placeholder="" readonly="" required="" value="<?php echo $choiceDetails[3]['choice']; ?>">
                    </div>
                </div>
            </div>
             <div class="form-group">
                <div class="row">
                    <label class="control-label col-sm-4 col-xs-12" for="correct_choice">Correct choice number:</label>
                    <div class="col-sm-8 col-xs-12">
                        <input type="text" class="form-control" name="correct_choice" id="correct_choice" placeholder="" required="" value="<?php foreach ($choiceDetails as $row){if ($row['is_correct']==1) { echo $row['choice'];}}?>">
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
                        <div class="g-recaptcha" style="" data-sitekey="6LdnvCQUAAAAAGmHBukXVzjs5NupVLlaIHJdpFWo" data-callback="enableRegister" nonce="<?php echo $_SESSION['nonce']; ?>"></div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="m-auto text-center">    
                    <button type="submit" name="submit" class="btn primary_btn btn_disabled"  disabled="true" id="btnRegister">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
