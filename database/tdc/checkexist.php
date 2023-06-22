<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
	$id = $_GET['schedID'];
	$sqlite = "SELECT * FROM appointments JOIN schedules ON appointments.scheduleID = schedules.id JOIN users ON users.userID = appointments.studentID WHERE schedules.id = $id AND schedules.title = 'TDC' AND appointments.studentID =".$_SESSION['userID'];
	$query1 = mysqli_query($conn, $sqlite);
	$hehe = mysqli_num_rows($query1);

	if($hehe > 0 ){
		echo "true";
	}else{
		echo "false";
	}
}
?>