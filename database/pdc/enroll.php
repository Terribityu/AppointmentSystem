<?php
    require ('../connect.php');
    extract($_POST);

    $sql = "UPDATE schedules SET slots = slots - 1 WHERE id = $schedID";
    $query = "INSERT INTO appointments VALUES(NULL, $schedID, $userID, 'TBA', 'pending', 'unpaid')";
    if($result = mysqli_query($conn , $query)){
        $last_id = mysqli_insert_id($conn);
        addSystemLogs($last_id, "enrollstudent");
        mysqli_query($conn , $sql);
    }else{
        echo mysqli_error($conn);
    }

?>