<?php
require ('../connect.php');
		$id = $_GET['id'];
		$query = "SELECT * FROM `appointments` JOIN users ON appointments.usersID = users.userID JOIN schedules ON appointments.scheduleID = schedules.id 
		WHERE appointmentID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
?>