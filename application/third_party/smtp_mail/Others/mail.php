<?php
/*
Credits: Bit Repository
URL: http://www.bitrepository.com/
*/
require 'smtp.php';
// array for JSON response
	$response = array();

//////////////////////////////////////////////////////

	function ValidateEmail($email)
	{
		$regex = '/([a-z0-9_.-]+)'. # name
		'@'. # at
		'([a-z0-9.-]+){2,255}'. # domain & possibly subdomains
		'.'. # period
		'([a-z]+){2,10}/i'; # domain extension 
		
		if($email == '') 
			return false;
		else
			$eregi = preg_replace($regex, '', $email);
		return empty($eregi) ? true : false;
	}

//////////////////////////////////////////////////////

	$get = (isset($_GET)) ? true : false;

	if($get)
	{

		
		$name 	 = stripslashes("Stock Assistant");
		$email 	 = trim($_GET['email']);
		$subject = stripslashes($_GET['subject']);
		$message = stripslashes($_GET['message']);
	
		$error = '';
	
		
		// Check email
		if(!$email || $email == "Email*")
			$error .= 'Please enter an e-mail address.';
	
		if($email && !ValidateEmail($email))
			$error .= 'Please enter a valid e-mail address.';
	
		// Check message
		if(!$message)
			$error .= 'Please enter your message.';
	
		if(!$error)
		{
			$smtp = new SMTP_mail();
			$mail = $smtp->send_email($email,$subject,$message);
			
			if($mail)
			{
				// failed to insert row
                $response["success"] = 1;
                $response["message"] = "Email has been sent successfully";
                // echoing JSON response
                echo json_encode($response);
			}
			else
			{
				// failed to insert row
				$response["success"] = 0;
				$response["message"] = "Email not sent";
				// echoing JSON response
				echo json_encode($response);	
			}
		}
		else
		{
			// failed to insert row
			$response["success"] = 0;
			$response["message"] = $error;
			// echoing JSON response
			echo json_encode($response);	
		}
	}
	else
	{
		// failed to insert row
		$response["success"] = 0;
		$response["message"] = "Required method is invalid";
		// echoing JSON response
		echo json_encode($response);	
	}
				
	

?>