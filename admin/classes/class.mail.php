<?php
class Mail {
    var $to;
    var $subject;
    var $content;
    var $fullmail;
    var $from;
    var $name;
    var $headers;
    
    function __construct() 
    {
        //algemeen
        $this->to = "bart.clarebout@gmail.com";
        $this->subject = "Bericht via website";
        $this->content = isset($_POST['message']) ? $_POST['message'] : '';
        $this->from = isset($_POST['email']) ? $_POST['email'] : '';
        $this->name = isset($_POST['name']) ? $_POST['name'] : '';
    }
    
    public static function clean_string($string)
    {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    public static function sendMail()
    {
        $mail = new Mail();

        //Inhoud van de mail opmaken
        $mail->fullmail = "Formuliergegevens:\n\n";
        $mail->fullmail .= "Naam: ".Mail::clean_string($mail->name)."\n";
        $mail->fullmail .= "Email: ".Mail::clean_string($mail->from)."\n";
        $mail->fullmail .= "Bericht: \n\n".Mail::clean_string($mail->content)."\n";

        //Email headers
        $mail->headers = 'From: '.$mail->from."\r\n".
        'Reply-To: '.$mail->from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        //Mail versturen
        @mail($mail->to, $mail->subject, $mail->fullmail, $mail->headers);
        
        echo 'true';
    }
       public static function sendMailForPassword($mailto, $subject, $content)
    {
        $mail = new Mail();
        
        $mail->from = 'info@corselino.be';
        $mail->to = $mailto;
        $mail->subject = $subject;
        $mail->fullmail = $content;

        //Email headers
        $mail->headers = 'From: '.$mail->from."\r\n".
        'Reply-To: '.$mail->from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        
        //Mail versturen
        @mail($mail->to, $mail->subject, $mail->fullmail, $mail->headers);
    }

}
?>
