
<?php
    extract($row);
    require_once '../../../vendor/autoload.php';
    use Twilio\Rest\Client;

    $date_text = date("F d, Y", strtotime($start));
    $time_std = date("g:i A", strtotime($time));
    $sid    = "ACd946231cf8d55e207646d92629063391";
    $token  = "001f075cce9bcecd8d3c7c7b663ff27e";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
      ->create("+63".$number, // to
        array(
                'from' => '+14344425970',
                "body" => "Hi, $firstname $lastname you have an $title appointment on $date_text $time_std for Destiny Driving School"
        )
      );

print($message->sid);
?>