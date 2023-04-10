<?php
require ('../connect.php');
	extract($_POST);
        $sql = "UPDATE schedules SET slots = slots - 1 WHERE id = $schedules";
        $query = "INSERT INTO appointments VALUES(NULL, $schedules, $studentDataList, 'TBA', 'pending', 'unpaid')";
        if($result = mysqli_query($conn , $query)){
            $last_id = mysqli_insert_id($conn);
            addSystemLogs($last_id, "createappointment");
            mysqli_query($conn , $sql);
        }else{
            echo mysqli_error($conn);
        }
?>