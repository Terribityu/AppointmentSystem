<?php
require ('../connect.php');
		$id = $_GET['id'];
		$query = "SELECT * FROM `user_details` JOIN users ON user_details.username = users.username WHERE detail_ID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		echo json_encode($row);
?>