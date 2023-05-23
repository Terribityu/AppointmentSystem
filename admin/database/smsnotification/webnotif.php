<?php
    require("../connect.php");
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md
    $query = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = schedules.instructorID JOIN user_details ON users.username = user_details.username
    WHERE start = DATE_ADD(CURDATE(), INTERVAL 3 DAY) and users.username = '".$_SESSION['username']."' and status_a = 'approved'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        $totalCount = mysqli_num_rows($result);
        if(isset($_SESSION['notifcounter'])){
            $_SESSION['notifcounter'] = 1;
        }else{
            $_SESSION['notifcounter'] = 0;
        }
        $data = array(
            'data' => $row,
            'total' => $totalCount,
            'notifcounter' => $_SESSION['notifcounter']
        );

        echo json_encode($data);
    }
?>