
<?php
    // extract($row);
    require_once 'C:\laragon\www\Destiny\vendor\autoload.php';
    use Twilio\Rest\Client;

    $date_text = date("F d, Y", strtotime($start));
    $time_std = date("g:i A", strtotime($time));
    $sid    = "cxz";
    $token  = "czx";
    $twilio = new Client($sid, $token);
    $message = $twilio->messages
      ->create("+63", // to
        array(
                'from' => '+cxz',
                "body" => $message_n
        )
      );

print($message->sid);
?>