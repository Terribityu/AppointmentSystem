<?php
require ('../connect.php');

	if (session_status() === PHP_SESSION_ACTIVE) {
		$id = $_POST['id'];
		$query = "SELECT * FROM `appointments` JOIN schedules ON appointments.scheduleID = schedules.id JOIN users ON schedules.instructorID = users.userID JOIN user_details ON user_details.username = users.username
		WHERE appointmentID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		
		$row['start'] = date("F d, Y", strtotime($row['start']));
    	$row['time'] = date("g:i A", strtotime($row['time']));
		
		echo json_encode($row);
	}
?>