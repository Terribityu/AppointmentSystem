<?php
    require_once '..\..\admin\vendor\autoload.php';

    session_start();
    extract($_GET);
if(isset($_GET['number'])){
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $_SESSION['number'] = $number;

        $ch = curl_init();
    $parameters = array(
        'apikey' => '', //Your API KEY
        'number' => $number,
        'message' => 'Dear user, Your OTP verification code is '.$otp,
        'sendername' => 'SEMAPHORE'
    );
    curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
    curl_setopt( $ch, CURLOPT_POST, 1 );

    //Send the parameters set above with the request
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

    // Receive response from server
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close ($ch);

    //Show the server response
    echo $output;
    echo $otp;
}else{
    header('location:../../index.php');
}
    ?>