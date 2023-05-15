<?php
    require("../connect.php");
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    $query = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = schedules.instructorID JOIN user_details ON users.username = user_details.username
    WHERE start = DATE_ADD(CURDATE(), INTERVAL 3 DAY) and status_a = 'approved'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            require("sendnotif.php");
        }
    }

    $query1 = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = appointments.studentID JOIN user_details ON users.username = user_details.username
    WHERE start = DATE_ADD(CURDATE(), INTERVAL 3 DAY) and status_a = 'approved'";

    $result1 = mysqli_query($conn, $query1);
    if(mysqli_num_rows($result1)>0){
        while($row = mysqli_fetch_array($result1)){
            require("sendnotif.php");
        }
    }

    $query2 = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = appointments.studentID JOIN user_details ON users.username = user_details.username
    WHERE start = DATE_ADD(CURDATE(), INTERVAL 1 DAY) and status_a = 'approved'";

    $result2 = mysqli_query($conn, $query2);
    if(mysqli_num_rows($result2)>0){
        while($row = mysqli_fetch_array($result2)){
            require("sendnotif.php");
        }
    }

    $query3 = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = schedules.instructorID JOIN user_details ON users.username = user_details.username
    WHERE start = DATE_ADD(CURDATE(), INTERVAL 1 DAY) and status_a = 'approved'";

    $result3 = mysqli_query($conn, $query3);
    if(mysqli_num_rows($result3)>0){
        while($row = mysqli_fetch_array($result3)){
            require("sendnotif.php");
        }
    }
    
?>