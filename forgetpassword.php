<?php
include 'includes/connect.inc.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


   require('Phpmailer/PHPMailer.php');
   require('Phpmailer/Exception.php');
   require('Phpmailer/SMTP.php');

   $mail = new PHPMailer(true); 

   try {
     
      //Server settings
                        //Enable verbose debug output
      $mail->isSMTP();                                            //Send using SMTP
      $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
      $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
      $mail->Username   = 'vora1jay@gmail.com';                     //SMTP username
      $mail->Password   = 'qtzn dywk bxox sffg';                               //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
      $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
  
      //Recipients   
      $mail->setFrom('vora1jay@gmail.com', 'AOTFAMS');
      $mail->addAddress('jayvora1499@gmail.com');     //Add a recipient
     
  
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Password reset link from AOTFAMS';
      $mail->Body    = "We got a request from you to reset your password!</b>
      Click the link below: <br>
      Reset Password 
   ";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      echo "true";
  } catch (Exception $e) {
      echo "false";
  }
   








?>