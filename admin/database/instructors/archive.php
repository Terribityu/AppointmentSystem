<?php
require ('../connect.php');
		$id = $_GET['id'];
		$query = "UPDATE users SET userArchive = 1 WHERE userID = $id";
		addSystemLogs($id, "archiveinstructor");
		mysqli_query($conn , $query);
?>