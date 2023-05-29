<?php
    require ('../connect.php');
    extract($_POST);
if (session_status() === PHP_SESSION_ACTIVE) {
    $sql = "UPDATE schedules SET slots = slots - 1 WHERE id = $schedID";
    $query = "INSERT INTO appointments VALUES(NULL, $schedID, $userID, 'TBA', 'pending', 'unpaid', '', '', 0)";
    if($result = mysqli_query($conn , $query)){
        $last_id = mysqli_insert_id($conn);
        mysqli_query($conn , $sql);
        addSystemLogs($last_id, "enrollstudent");
    }else{
        echo mysqli_error($conn);
    }
}
?>