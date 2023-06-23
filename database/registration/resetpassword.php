<?php
require '../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../connect.php';
extract($_POST);

$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$row = mysqli_num_rows($result);

if($row > 0){
//Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 2;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'destinydrivingschool5@gmail.com';                     //SMTP username
        $mail->Password   = 'ienqkipignhsxqqt';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
        $mail->setFrom('destinydrivingschool5@gmail.com', 'Destiny Driving School');
        // $mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
        $mail->addAddress($email);               //Name is optional
        $mail->addReplyTo('destinydrivingschool5@gmail.com', 'Destiny Driving School');
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Destiny Driving School (Registration)';
        $mail->Body    = "<style>
        .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
        </style>
        Dear User
        <h3>We received a request to reset your password.</h3>
        <p>Kindly click the below link to reset your password</p>
        
        <a href='http://www.destinydrivingschool.xyz/forgotpassword.php?email=$email' style='background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;' class='button'>Reset Password</a>
        <br><br>
        <p>With regrads,</p>
        
        <b>Destiny Driving School</b>";
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}else{
    echo "error";
}
?>