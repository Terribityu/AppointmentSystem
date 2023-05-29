<?php
require("../connect.php");
if (session_status() === PHP_SESSION_ACTIVE) {
    extract($_POST);

    $query = "UPDATE appointments JOIN schedules on appointments.scheduleID = schedules.id SET appointments.status_a = ?, schedules.slots = schedules.slots + 1 WHERE appointmentID = ?";
    $stmt = mysqli_prepare($conn, $query);
    $status = "request";
    if($stmt){
        mysqli_stmt_bind_param($stmt, "si", $status, $id);
        mysqli_stmt_execute($stmt);
        addSystemLogs($id, "requestcancellation");
    }
}
?>