<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
		$id = $_GET['id'];
		$query = "SELECT * FROM `appointments` JOIN users ON appointments.studentID = users.userID JOIN schedules ON appointments.scheduleID = schedules.id 
		WHERE appointmentID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
}
?>