<?php
require ('../connect.php');
		extract($_GET);
	if (session_status() === PHP_SESSION_ACTIVE) {
		$sql = "UPDATE schedules SET slots = slots + 1 WHERE id = $schedID";
		$query = "UPDATE appointments SET appointmentArchive = 1 WHERE appointmentID = $id";
		if(mysqli_query($conn , $query)){
            mysqli_query($conn , $sql);
			addSystemLogs($id, "archiveappointment");
		}
	}
?>