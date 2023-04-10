<?php
require ('../connect.php');
		extract($_GET);
		$sql = "UPDATE schedules SET slots = slots + 1 WHERE id = $schedID";
		$query = "DELETE FROM appointments WHERE appointmentID = $id";
		if(mysqli_query($conn , $query)){
            mysqli_query($conn , $sql);
			addSystemLogs($id, "deleteappointment");
		}
?>