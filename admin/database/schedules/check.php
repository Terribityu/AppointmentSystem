<?php
require ('../connect.php');
		$id = $_GET['id'];
		$query = "SELECT * FROM `users` JOIN user_details ON users.username = user_details.username WHERE users.userID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
?>