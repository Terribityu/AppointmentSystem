<?php
    require('../connect.php');
    if (session_status() === PHP_SESSION_ACTIVE) {
        extract($_POST);

        $query = "INSERT INTO feedbacks VALUES(NULL, ?, 'pending', ?)";
        $stmt = mysqli_prepare($conn, $query);

        if($stmt){
            mysqli_stmt_bind_param($stmt, 'si', $blogbody, $_SESSION['userID']);
            mysqli_stmt_execute($stmt);

            $lastid = mysqli_insert_id($conn);

            addSystemLogs($lastid, "addfeedback");
        }
    }
?>