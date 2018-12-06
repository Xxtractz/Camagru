<?php
class SendMail{

    private static function link_gen($link, $id, $token) {
        return "https://".$_SERVER['HTTP_HOST'].PROOT.$link."?sub=".$id."&code=".$token;
    }

    private static function send($mail_to, $mail_subject, $mail_message) {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <noreply@camagru.co.za>'."\r\n";
        $headers .= 'Reply-To: <noreply@camagru.co.za>' ."\r\n";
        $headers .= 'X-Mailer: PHP/' .PHP_VERSION;
        mail($mail_to, $mail_subject, $mail_message, $headers);
    }

    public static function verify($email, $id, $token) {
        $link = self::link_gen('register/confirm', $id, $token);
        $subject = "Camagru registration!";
        $message = "Confirm your registration:<br><a href=".$link."> Click Here</a><br>";
        self::send($email, $subject, $message);
    }

    public static function like($email) {
        $subject = "Camagru-Like";
        $message = "You have a new Like";
        self::send($email, $subject, $message);
    }

    public static function comment($email) {
        $subject = "Camagru-Comment";
        $message = "You have a new Comment";
        self::send($email, $subject, $message);
    }
}