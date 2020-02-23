
<?php 
if (isset($_POST['submit'])){
   //Get Post variables
   $question_text = $_POST['question_text'];
   $question_status = $_POST['question_status'];
   
   $correct_choice = $_POST['correct_choice'];
   $choices = array();
   $choices[1] = $_POST['choice1'];
   $choices[2] = $_POST['choice2'];
   $choices[3] = $_POST['choice3'];
   $choices[4] = $_POST['choice4'];
   $choices[5] = $_POST['choice5'];

   //Question query
   $query="insert into questions (question, question_status,quiz_id) 
   	 values('$question_text','$question_status', '$quiz_id')";
   $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);

   //VALIDATE INSERT
   if($insert_row){
      foreach($choices as $choice => $value){
        if($value != ''){
	       if($correct_choice == $choice){
	          $is_correct = 1;
	       } else {
	         $is_correct = 0;
	       }
              $query="insert into choices (question_number,is_correct,choice) 
   	          values('$question_number','$is_correct','$value')";
              $insert_row=$mysqli->query($query) or die ($mysqli->error.__LINE__);
	          if($insert_row){
	            continue;
	          }else {
	      		die("Error: (".$mysqli->errno.") ".$mysqli->eerror);
	    	}
        }
    }
   $msg="Question has been added";
	}
}
$numberofquestions = $_SESSION['quiz_min_questions'];
$quiz_id = $_SESSION['quiz_id'];

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Rmsa Quiz Questions</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
  </head>
  <body>
    <div id="container">
      <header>
        <div class="container">
          <h1></h1>
	</div>
      </header>


      <main>
	<div class="container">
	     <h2>Add A question</h2>
	     <?php 
	     	   if(isset($msg)) {
	     	      echo "<p>".$msg."</p>";
	     }
	     ?>
	     <form method="post" action="add.php">
	     	   <p>
			<label>Question Number</label>
			<input type="number" value="<?php echo $next; ?>" name="question_number" />
		   </p>
	     	   <p>
			<label>Question</label>
			<input type="text" name="question_text" />
		   </p>
	     	   <p>
			<label>Choice #1: </label>
			<input type="text" name="choice1" />
		   </p>
	     	   <p>
			<label>Choice #2: </label>
			<input type="text" name="choice2" />
		   </p>
	     	   <p>
			<label>Choice #3: </label>
			<input type="text" name="choice3" />
		   </p>
	     	   <p>
			<label>Choice #4: </label>
			<input type="text" name="choice4" />
		   </p>
	     	   <p>
			<label>Choice #5: </label>
			<input type="text" name="choice5" value="None of the Above"/>
		   </p>
	     	   <p>
			<label>Correct choice number </label>
			<input type="number" name="correct_choice" />
		   </p>
		   <p>
		   <input type="hidden" name="quiz_min_questions" value="<?php echo $numberofquestions; ?>" />
		   <input type="hidden" name="quiz_id" value="<?php echo $quiz_id; ?>" />
			<input type="submit" name="submit" value="Submit" />
		   </p>
	     </form>
	</div>
      </main>


  </body>
</html>