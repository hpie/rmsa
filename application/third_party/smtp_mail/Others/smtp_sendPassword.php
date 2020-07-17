<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../smtp_mail/PHPMailerAutoload.php';


class SMTP_mail {
public $mail;
public $sender_email;
public $username;
public $password;
public $sender_name;
public $host;
public $port;
public $link;
public $subject;

	public function __construct()
    {//Create a new PHPMailer instance
        $this->mail = new PHPMailer;
		
		$this->host = "md-in-58.webhostbox.net";
		$this->port = 465;
		//$this->host = "mail.hypertechonline.com";
		$this->sender_email = "developer@socialinfotech.com";
		$this->username = "developer@socialinfotech.com";
		$this->password = "developer";
		$this->sender_name = "Renthouse";
		$this->link = "";
		$this->subject = "Reset your password : Renthouse Application";
    }
	
		
	public function Encrypt($data,$password="S2StockAdamSpencer123")
	{
	
		$min = 1000000000;
		$max = 9999999999;
		
		$startrandom = mt_rand($min,$max);
		$endrandom = mt_rand($min,$max);
		$data = $startrandom.$data.$endrandom;
		
		
		$result = '';
		for ($i = 0; $i < strlen($data); $i++) {
			$char    = substr($data, $i, 1);
			$keychar = substr($password, ($i % strlen($password)) - 1, 1);
			$char    = chr(ord($char) + ord($keychar));
			$result .= $char;
		}
		return base64_encode($result);
	}

	
	//Authentication
	public function send_email($email,$password)
	{
	
			//$key_val = $this->Encrypt($id);
			$this->link .= $password;
		
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
			$this->mail->setFrom($this->sender_email, $this->sender_name);
			//Set an alternative reply-to address
			$this->mail->addReplyTo($this->sender_email, $this->sender_name);
			//Set who the message is to be sent to
			$this->mail->addAddress($email, 'Not Specify');
			//Set the subject line
			$this->mail->Subject = $this->subject;
			//Read an HTML message body from an external file, convert referenced images to embedded,
			//convert HTML into a basic plain-text alternative body
			$explode = explode("@",$email);
			$email_name = $explode[0];
			//$contents = file_get_contents('verify_email.html');
	
			$contents = file_get_contents('../smtp_mail/verify_email1.html');
			$contents .= '<div class="row">
							  <div class="col-xs-12">
								 <p style="color:#222222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0 0 10px;padding:0;text-align:left" align="left">
									Hi <strong>'.$email_name.'</strong>!
								 </p>
							  </div>
						   </div>
						   <div class="row">
							  <div class="col-xs-12">
								 <p style="color:#222222;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:normal;line-height:19px;margin:0 0 10px;padding:0;text-align:left" align="left">
									You recently requested a password reset. Here is your Renthouse application password that you forgot
									(<a href="mailto:'.$email.'" style="color:#333333;text-decoration:none" target="_blank">'.$email.'</a>).
									Using this password you can login via <span class="il">Renthouse</span> application.
								 </p>
							  </div>
						   </div>';
						   
						   
			$contents .= '<div style="color:#ffffff;padding:20px 0 33px;text-align:center" align="center">
							  <a href="#" style="background:#4183c4;border-radius:3px;color:#ffffff;display:inline-block;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:17px;font-weight:bold;letter-spacing:normal;margin:0 auto;padding:12px 24px;text-align:center;text-decoration:none;width:auto!important" target="_blank" data-saferedirecturl="#">Your Password is : '.$this->link.'</a>
						   </div>
						   <hr style="background:#d9d9d9;border:none;color:#d9d9d9;min-height:1px;margin:10px 0 20px">
						   ';
			
			$contents .= file_get_contents('../smtp_mail/verify_email2.html');
			
			
			$this->mail->msgHTML($contents, dirname(__FILE__));
			/*$this->mail->msgHTML('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
									<html xmlns="http://www.w3.org/1999/xhtml">
									<head>
									<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
									<title>Renthouse</title>
									</head>
									
									<body>'.$message.'
									</body>
									</html>
									', 
									dirname(__FILE__));*/

			//Replace the plain text body with one created manually
			$this->mail->AltBody = "Sorry, failed";
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