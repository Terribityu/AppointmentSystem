
<?php
    extract($row);
    require_once '../../../vendor/autoload.php';
    use Twilio\Rest\Client;

    $date_text = date("F d, Y", strtotime($start));
    $time_std = date("g:i A", strtotime($time));
    $sid    = "ACc9007507d88a2a45a6ccfcde4b59eec0";
    $token  = "a07d120c37559f1f5125d24b81a4b6d8";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+63".$number, // to
        array(
                'from' => '+13194564154',
                "body" => "Hi, $firstname $lastname you have an $title appointment on $date_text $time_std for Destiny Driving School"
        )
      );

print($message->sid);
?>