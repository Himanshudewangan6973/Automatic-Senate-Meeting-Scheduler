<?php
include 'includes/connect.inc.php';
$email=$_GET['email'];
$sql="SELECT * FROM members WHERE email='$email'";
$res=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($res);
$pass=$row['password'];
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
      $mail->setFrom('vora1jay@gmail.com', 'Senate of NITC');
      $mail->addAddress($email);     //Add a recipient
     
  
  
      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'Invitation to Senate meeting';
      $mail->Body    = "Hello, You are invited for the next senate meeting which is organised at NIT Calicut<br>
      Your username is $email , and password is $pass <br>
      Click the link below: <br>
      <a href='http://localhost/senate/senate/index.php>
      Click here </a>
   ";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
      $mail->send();
      header("Location: memberlist.php");
exit();
  } catch (Exception $e) {
      echo "error";
  }
   








?>