<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
		$id = $_GET['id'];
		$query = "UPDATE users SET userArchive = 0 WHERE userID = $id";
		addSystemLogs($id, "archivestudent");
		mysqli_query($conn , $query);
}
?>