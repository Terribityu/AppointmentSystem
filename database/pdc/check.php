<?php
require ('../connect.php');
		$id = $_GET['schedID'];
		$query = "SELECT * FROM `schedules` JOIN users ON schedules.instructorID = users.userID JOIN user_details ON users.username = user_details.username WHERE id = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
?>