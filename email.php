<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    $mail->addAddress('santoskarlbrent062700@gmail.com');               //Name is optional
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
    $mail->Body    = '<h3>Dear user, </h3> <p>Here is your autogenerated username and password. It is suggested that you changed your password after logging in. <br></p>
    <br>
    <table>
        <tbody>
            <tr>
                <th>Username: </th>
                <td>'.'Hotdog'.'</td>
            </tr>
            <tr>
                <th>Password: </th>
                <td>'.'Pakshet'.'</td>
            </tr>
        </tbody>
    </table>

    <br><br>
    www.destinydrivingschool.xyz';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>