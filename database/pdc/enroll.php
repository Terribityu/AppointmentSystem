<?php
    require ('../connect.php');
    extract($_POST);
    $userID = $_SESSION['userID'];
    $price = $data['price'];
    $schedID = $data['schedID'];
    $checkbox = json_encode($data['checkboxes']);
    if (session_status() === PHP_SESSION_ACTIVE) {
        $sql = "UPDATE schedules SET price = $price, slots = slots - 1, sched_details = '$checkbox' WHERE id = $schedID";
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