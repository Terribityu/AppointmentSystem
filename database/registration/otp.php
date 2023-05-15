
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

    $sid    = "ACd946231cf8d55e207646d92629063391";
    $token  = "001f075cce9bcecd8d3c7c7b663ff27e";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+63".$number, // to
        array(
                'from' => '+14344425970',
                "body" => "Dear user, Your OTP verification code is $otp"
        )
      );

print($message->sid);
echo $otp;
?>