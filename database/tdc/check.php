<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
		$id = $_GET['schedID'];
		$query = "SELECT * FROM `schedules` JOIN users ON schedules.instructorID = users.userID JOIN user_details ON users.username = user_details.username WHERE id = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		

		$sqdirt = "SELECT * FROM appointments JOIN schedules ON appointments.scheduleID = schedules.id WHERE appointments.status_a = 'approved' AND schedules.title = 'TDC' AND appointments.studentID =".$_SESSION['userID'];
		$quert = mysqli_query($conn, $sqdirt);
		$row['condi'] = "none";
		if (mysqli_num_rows($quert) > 0) {
			while($ro = mysqli_fetch_array($quert)){
				if($ro['sched_details'] == "first"){
					$row['condi'] = "first";
				}elseif($ro['sched_details'] == "second"){
					$row['condi'] = "second";
				}else{
					$row['condi'] = "none";
				}
			}
		}


		echo json_encode($row);
}
?>