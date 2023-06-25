<?php
    require_once '..\..\admin\vendor\autoload.php';

    $checkthis = "SELECT * FROM appointments JOIN schedules ON appointments.scheduleID = schedules.id JOIN users ON appointments.studentID = users.userID WHERE appointmentID = $id";
    $result = mysqli_query($conn, $checkthis);
    $row = mysqli_fetch_array($result);
    $number = $row['number'];
    $start = date("F d, Y", strtotime($row['start']));
    $appoint = $start .' '.$row['time']; 

        $ch = curl_init();
    $parameters = array(
        'apikey' => '', //Your API KEY
        'number' => $number,
        'message' => 'Dear user, Your Appointment Has been Approve at'.$appoint,
        'sendername' => 'Destiny'
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
    ?>