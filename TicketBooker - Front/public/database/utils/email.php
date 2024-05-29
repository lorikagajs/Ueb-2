<?php

require_once("php-mailer/PHPMailer.php");
require_once("php-mailer/SMTP.php");
require_once("php-mailer/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
function sendEmail( $email, $message, $subject,$name){
$mail = new PHPMailer(true); // Enable exceptions
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        //Enable less security apps in email
        //Replace your student email and password in here
        $mail->Username = 'dion.gashi2@student.uni-pr.edu';
        $mail->Password = '1247421145';
        $mail->Port = 587;

        $mail->setFrom('dion.gashi2@student.uni-pr.edu', $name);
        $mail->addReplyTo($email);
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    }
        ?>