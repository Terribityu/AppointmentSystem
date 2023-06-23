<?php
session_start();
date_default_timezone_set('Asia/Manila');
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
			$user_name = "destinyadmin";
			if(isset($_SESSION['username'])){
				$user_name = $_SESSION['username'];
			}
			$query = "INSERT INTO system_reports VALUES(NULL, '$user_name', $transactID, '$reportType', '$date', '$time')";
			mysqli_query($conn,$query);
		}
?>