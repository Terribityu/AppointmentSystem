<?php
require("../connect.php");
if (session_status() === PHP_SESSION_ACTIVE) {
    extract($_POST);

    $query = "UPDATE appointments JOIN schedules on appointments.scheduleID = schedules.id SET appointments.status_a = ?, schedules.slots = schedules.slots + 1, appointments.reason_rej = ? WHERE appointmentID = ?";
    $stmt = mysqli_prepare($conn, $query);
    $status = "request: ";
    $reason = $data['reason'];
    if($stmt){
        mysqli_stmt_bind_param($stmt, "ssi", $status, $reason, $id);
        mysqli_stmt_execute($stmt);
        addSystemLogs($id, "requestreschedule");
        mysqli_query($conn, "UPDATE appointments SET scheduleID = ".$data['schedID']);
    }
}
?>