<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';


class SMTP_mail {
public $mail;
public $receiver_email;
public $username;
public $password;
public $sender_name;
public $host;
public $port;

	public function __construct()
    {//Create a new PHPMailer instance
        $this->mail = new PHPMailer;
		
		$this->host = "gator4261.hostgator.com";
		$this->port = 465;
		//$this->host = "mail.hypertechonline.com";
		$this->receiver_email = "support@s2stockassistant.com";
		$this->username = "support@s2stockassistant.com";
		$this->password = "US.support.123!@#";
		$this->sender_name = "S2 Stock Assistant";
    }
	
	//Authentication
	public function send_email($email,$subject,$message)
	{
			//Tell PHPMailer to use SMTP
			$this->mail->isSMTP();
			//Enable SMTP debugging
			// 0 = off (for production use)
			// 1 = client messages
			// 2 = client and server messages
			$this->mail->SMTPDebug = 0;
			//Ask for HTML-friendly debug output
			$this->mail->Debugoutput = 'html';
			//Set the hostname of the mail server
			$this->mail->Host = $this->host;
			//Set the SMTP port number - likely to be 25, 465 or 587
			//$this->mail->Port = 25;
			$this->mail->Port = $this->port;
			//Whether to use SMTP authentication
			$this->mail->SMTPAuth = true;
			$this->mail->SMTPSecure = true;
			//Username to use for SMTP authentication
			$this->mail->Username = $this->username;
			//Password to use for SMTP authentication
			$this->mail->Password = $this->password;
			//Set who the message is to be sent from
			$this->mail->setFrom($email, $this->sender_name);
			//Set an alternative reply-to address
			$this->mail->addReplyTo($email, $this->sender_name);
			//Set who the message is to be sent to
			$this->mail->addAddress($this->receiver_email, 'Not Specify');
			//Set the subject line
			$this->mail->Subject = $subject;
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			//$this->mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
			$this->mail->msgHTML('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
									<html xmlns="http://www.w3.org/1999/xhtml">
									<head>
									<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
									<title>S2StockAssistant</title>
									</head>
									
									<body>'.$message.'
									</body>
									</html>
									', 
									dirname(__FILE__));

			//Replace the plain text body with one created manually
			$this->mail->AltBody = $message;
			//Attach an image file
			//$this->mail->addAttachment('images/phpmailer_mini.png');
			
			//send the message, check for errors
			if (!$this->mail->send()) {
				//echo "Mailer Error: " . $this->mail->ErrorInfo;
				return false;
			} else {
				//echo "Message sent!";
				return true;
			}
	}
}



?>