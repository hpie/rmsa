<?php
/**

 * This example shows making an SMTP connection with authentication.

 */

//SMTP needs accurate times, and the PHP time zone MUST be set

//This should be done in your php.ini, but this is how to do it if you don't have access to that

//date_default_timezone_set('Etc/UTC');

require APPPATH.'third_party/smtp_mail/PHPMailerAutoload.php';

//require APP_INCLUDE_Library.'smtp_mail/Security.php';



class SMTP_mail {

    public $mail;

    public $sender_email;

    public $username;

    public $password;

    public $host;

    public $port;

    public $subject;   

    public $sender_name;

   // public $product_name;
    public function __construct() {
        $this->mail = new PHPMailer;
       
        $this->port = "port";
        $this->host = "host";       
        $this->username = "username";
        $this->password = "password";
       


    }

    public function sendDetails($email,$data) {                               
        
        $this->sender_email ='sdpssahp@hp.gov.in';

        $this->sender_name ='RMSA';        

        $this->subject ='User Details';

        $this->mail->isSMTP();

        $this->mail->SMTPDebug = 0;

        $this->mail->Debugoutput = 'html';

        $this->mail->Host = $this->host;

        $this->mail->Port = $this->port;

        $this->mail->SMTPAuth = true;

        $this->mail->SMTPSecure = true;

        $this->mail->Username = $this->username;

        $this->mail->Password = $this->password;

        $this->mail->setFrom($this->sender_email);

        $this->mail->addReplyTo($this->sender_email);

        $this->mail->addAddress($email);           

        $this->mail->Subject = $this->subject;

        $html = file_get_contents(APPPATH.'third_party/smtp_mail/mailtemplate.html');        
//        $this->mail->Body ='Welcome to RMSA \r\n\r\n Username: '.$data['userName'].'\r\n\r\n Password:'.$data['password']; 

        $word = array('{{username}}','{{password}}');
        $replace = array($data['userName'],$data['password']);
        
        $html = str_replace($word, $replace, $html);
        $this->mail->msgHTML($html, dirname(__FILE__));

        $this->mail->AltBody = "";  

        if (!$this->mail->send()) {
            return "Mailer Error: " . $this->mail->ErrorInfo;

        } else {
            return true;
        }
    }


    public function sendTestEmail($email,$data) {

        $this->sender_email ='sdpssahp@hp.gov.in';

        $this->sender_name ='SDP RMSA';

        $this->subject ='Test Email';

        $this->mail->isSMTP();

        $this->mail->SMTPDebug = 0;

        $this->mail->Debugoutput = 'html';

        $this->mail->Host = $this->host;

        $this->mail->Port = $this->port;

        $this->mail->SMTPAuth = true;

        $this->mail->SMTPSecure = true;

        $this->mail->Username = $this->username;

        $this->mail->Password = $this->password;

        $this->mail->setFrom($this->sender_email);

        $this->mail->addReplyTo($this->sender_email);

        $this->mail->addAddress($email);

        $this->mail->Subject = $this->subject;

        $html = file_get_contents(APPPATH.'third_party/smtp_mail/testtemplate.html');
//        $this->mail->Body ='Welcome to RMSA \r\n\r\n Username: '.$data['userName'].'\r\n\r\n Password:'.$data['password'];

        $word = array('{{Description}}');
        $replace = array($data['Description']);

        $html = str_replace($word, $replace, $html);
        $this->mail->msgHTML($html, dirname(__FILE__));

        $this->mail->AltBody = "";

        if (!$this->mail->send()) {
            return "Mailer Error: " . $this->mail->ErrorInfo;

        } else {
            return true;
        }
    }
}
?>
