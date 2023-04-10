<?php
require ('../connect.php');
		$id = $_GET['id'];
		$query = "DELETE FROM users WHERE userID = $id";
		addSystemLogs($id, "deletestudent");
		mysqli_query($conn , $query);
?>