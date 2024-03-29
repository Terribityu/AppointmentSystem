<?php
    require("C:\laragon\www\admin\database\connect.php");
    // Update the path below to your autoload.php,
    // see https://getcomposer.org/doc/01-basic-usage.md

    $query7 = "SELECT *
    FROM schedules WHERE start = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND status = 'ongoing'";
    $result7 = mysqli_query($conn, $query7);
    if (mysqli_num_rows($result7) > 0) {
        while ($row = mysqli_fetch_array($result7)) {
            // Process the fetched data
            $sql = "UPDATE schedules SET status = 'completed' WHERE id = ".$row['id'];
            $result = mysqli_query($conn, $sql);
        }
    }

    $query8 = "SELECT *
    FROM schedules WHERE start = CURDATE() AND status = 'upcoming'";
    $result8 = mysqli_query($conn, $query8);
    if (mysqli_num_row($result8) > 0) {
        while ($row = mysqli_fetch_array($result8)) {
            // Process the fetched data
            $sql = "UPDATE schedules SET status = 'ongoing' WHERE id = ".$row['id'];
            $result = mysqli_query($conn, $sql);
        }
    }

    $query = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = schedules.instructorID JOIN user_details ON users.username = user_details.username
    WHERE start = DATE_ADD(CURDATE(), INTERVAL 3 DAY) and status_a = 'approved'";

    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            $date_text = date("F d, Y", strtotime($start));
            $time_std = date("g:i A", strtotime($time));
            $message_n = "Hi, $firstname $lastname you have an $title appointment on $date_text $time_std for Destiny Driving School";
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
            extract($row);
            $date_text = date("F d, Y", strtotime($start));
            $time_std = date("g:i A", strtotime($time));
            $message_n = "Hi, $firstname $lastname you have an $title appointment on $date_text $time_std for Destiny Driving School";
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
            extract($row);
            $date_text = date("F d, Y", strtotime($start));
            $time_std = date("g:i A", strtotime($time));
            $message_n = "Hi, $firstname $lastname you have an $title appointment on $date_text $time_std for Destiny Driving School";
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
            extract($row);
            $date_text = date("F d, Y", strtotime($start));
            $time_std = date("g:i A", strtotime($time));
            $message_n = "Hi, $firstname $lastname you have an $title appointment on $date_text $time_std for Destiny Driving School";
            require("sendnotif.php");
        }
    }

    $query4 = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = appointments.studentID
    JOIN user_details ON users.username = user_details.username
    WHERE start = CURDATE() AND status_a = 'approved'";

    $result4 = mysqli_query($conn, $query4);
    if(mysqli_num_rows($result4)>0){
        while($row = mysqli_fetch_array($result4)){
            extract($row);
            $date_text = date("F d, Y", strtotime($start));
            $time_std = date("g:i A", strtotime($time));
            $message_n = "Hi, $firstname $lastname you have an $title appointment today at $time_std for Destiny Driving School";
            require("sendnotif.php");
        }
    }

    $query5 = "SELECT *
    FROM schedules
    JOIN appointments ON schedules.id = appointments.scheduleID
    JOIN users ON users.userID = schedules.instructorID
    JOIN user_details ON users.username = user_details.username
    WHERE start = CURDATE() AND status_a = 'approved'";

    $result5 = mysqli_query($conn, $query5);
    if(mysqli_num_rows($result5)>0){
        while($row = mysqli_fetch_array($result5)){
            extract($row);
            $date_text = date("F d, Y", strtotime($start));
            $time_std = date("g:i A", strtotime($time));
            $message_n = "Hi, $firstname $lastname you have a $title appointment today at $time_std for Destiny Driving School";
            require("sendnotif.php");
        }
    }

?>