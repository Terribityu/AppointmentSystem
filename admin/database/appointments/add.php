<?php
require ('../connect.php');
	extract($_POST);
    if (session_status() === PHP_SESSION_ACTIVE) {
        $sql = "UPDATE schedules SET slots = slots - 1 WHERE id = $schedules";
        $query = "INSERT INTO appointments VALUES(NULL, $schedules, $studentDataList, 'TBA', 'pending', 'unpaid', ' ', ' ', 0)";
        if($result = mysqli_query($conn , $query)){
            $last_id = mysqli_insert_id($conn);
            addSystemLogs($last_id, "createappointment");
            mysqli_query($conn , $sql);
        }else{
            echo mysqli_error($conn);
        }
    }
?>