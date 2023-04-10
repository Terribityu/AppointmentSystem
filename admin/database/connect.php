<?php
session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$database = "destiny";
		$conn = mysqli_connect($servername , $username , $password, $database);


		function addSystemLogs($transactID, $reportType){
			global $conn;
			$date = date('m-d-Y');
			$time = date('H:i:s');
			$query = "INSERT INTO system_reports VALUES(NULL, '".$_SESSION['username']."', $transactID, '$reportType', '$date', '$time')";
			mysqli_query($conn,$query);
		}
?>