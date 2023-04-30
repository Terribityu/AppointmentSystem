<?php
session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "destiny";
		$conn = mysqli_connect($servername , $username , $password, $database);
		$mainDir = $_SERVER['DOCUMENT_ROOT'];
	
		function addSystemLogs($transactID, $reportType){
			global $conn;
			$date = date('m-d-Y');
			$time = date('H:i:s');
			$query = "INSERT INTO system_reports VALUES(NULL, 'student', $transactID, '$reportType', '$date', '$time')";
			mysqli_query($conn,$query);
		}
?>