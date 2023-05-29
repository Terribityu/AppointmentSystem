<?php
require("../connect.php");
    if (session_status() === PHP_SESSION_ACTIVE) {
    extract($_POST);

    $query = "UPDATE appointments SET remarks = ?, remarks_details = ? WHERE appointmentID = ?";
    $stmt = mysqli_prepare($conn, $query);
    $remarks = $data['remarks'];
    $remarks_d = array('quiz' => $data['quiz'], 'exam' => $data['exam']);
    $remarks_d = json_encode($remarks_d);

    if($stmt){
        mysqli_stmt_bind_param($stmt, "ssi", $remarks, $remarks_d, $id);
        mysqli_stmt_execute($stmt);
    }
}
?>