<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
		$id = $_POST['userID'];
		$query = "SELECT * FROM `users` JOIN user_details ON users.username = user_details.username WHERE userID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
}
?>