
<?php

    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    require_once '../../vendor/autoload.php';
    use Twilio\Rest\Client;

    session_start();
    extract($_POST);
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['number'] = $number;

    $sid    = "ACc9007507d88a2a45a6ccfcde4b59eec0";
    $token  = "a07d120c37559f1f5125d24b81a4b6d8";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+63".$number, // to
        array(
                'from' => '+13194564154',
                "body" => "Dear user, Your OTP verification code is $otp"
        )
      );

print($message->sid);
echo $otp;
?>