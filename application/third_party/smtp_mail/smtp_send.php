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
        $this->port = 465;
        $this->host = "mail.codexives.com";       
        $this->username = "info@codexives.com";
        $this->password = "info@123CDX";
    }

    public function sendRegistrationDetails($email,$data) {
        $template=$data['template'];
        
        $this->sender_email ='info@codexives.com';

        $this->sender_name ='Gyanshala';

        $this->subject ='Gyanshala Support: User Registration Details';

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

        $html = file_get_contents(APPPATH."third_party/smtp_mail/$template");
//        $this->mail->Body ='Welcome to RMSA \r\n\r\n Username: '.$data['userName'].'\r\n\r\n Password:'.$data['password'];

        $word = array('{{username}}','{{password}}','{{activationlink}}');
        $replace = array($data['username'],$data['password'],$data['activationlink']);

        $html = str_replace($word, $replace, $html);
        $this->mail->msgHTML($html, dirname(__FILE__));

        $this->mail->AltBody = "";

        $resultMail=array();
        $resultMail['success']=0;
        $res=$this->mail->send();        
        if($res==1){
            $resultMail['success']=1;
            return $resultMail;
        }else {
            $resultMail['Error']="Mailer Error: " . $this->mail->ErrorInfo;
            return $resultMail;
        }
    }
    public function sendResetPasswordDetails($email,$data) {
        $template=$data['template'];
        
        $this->sender_email ='info@codexives.com';

        $this->sender_name ='Gyanshala Support';

        $this->subject ='Gyanshala Support: Password Reset Notification';

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

        $html = file_get_contents(APPPATH."third_party/smtp_mail/$template");
//        $this->mail->Body ='Welcome to RMSA \r\n\r\n Username: '.$data['userName'].'\r\n\r\n Password:'.$data['password'];

        $word = array('{{username}}','{{password}}');
        $replace = array($data['username'],$data['password']);

        $html = str_replace($word, $replace, $html);
        $this->mail->msgHTML($html, dirname(__FILE__));

        $this->mail->AltBody = "";

        $resultMail=array();
        $resultMail['success']=0;
        $res=$this->mail->send();        
        if($res==1){
            $resultMail['success']=1;
            return $resultMail;
        }else {
            $resultMail['Error']="Mailer Error: " . $this->mail->ErrorInfo;
            return $resultMail;
        }
    }
    public function sendForgetLink($email,$data) {
        $template=$data['template'];
        
        $this->sender_email ='info@codexives.com';

        $this->sender_name ='Gyanshala';

        $this->subject ='Gyanshala Support: User Change Forget Password Link';

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

        $html = file_get_contents(APPPATH."third_party/smtp_mail/$template");
//        $this->mail->Body ='Welcome to RMSA \r\n\r\n Username: '.$data['userName'].'\r\n\r\n Password:'.$data['password'];

        $word = array('{{change_password_link}}');
        $replace = array($data['change_password_link']);

        $html = str_replace($word, $replace, $html);
        $this->mail->msgHTML($html, dirname(__FILE__));

        $this->mail->AltBody = "";

        $resultMail=array();
        $resultMail['success']=0;
        $res=$this->mail->send();        
        if($res==1){
            $resultMail['success']=1;
            return $resultMail;
        }else {
            $resultMail['Error']="Mailer Error: " . $this->mail->ErrorInfo;
            return $resultMail;
        }
    }
    public function sendTestMail($email,$data) {
        $template=$data['template'];
        
        $this->sender_email ='info@codexives.com';

        $this->sender_name ='Gyanshala';

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
        $this->mail->addBCC("info@hpie.in");

        $this->mail->Subject = $this->subject;

        $html = file_get_contents(APPPATH."third_party/smtp_mail/$template");
//        $this->mail->Body ='Welcome to RMSA \r\n\r\n Username: '.$data['userName'].'\r\n\r\n Password:'.$data['password'];

        $word = array('{{username}}','{{password}}','{{activationlink}}');
        $replace = array($data['username'],$data['password'],$data['activationlink']);

        $html = str_replace($word, $replace, $html);
        $this->mail->msgHTML($html, dirname(__FILE__));

        $this->mail->AltBody = "";

        $resultMail=array();
        $resultMail['success']=0;
        $res=$this->mail->send();        
        if($res==1){
            $resultMail['success']=1;
            return $resultMail;
        }else {
            $resultMail['Error']="Mailer Error: " . $this->mail->ErrorInfo;
            return $resultMail;
        }
    }
}
?>
