<?php
require ('../connect.php');

	if (session_status() === PHP_SESSION_ACTIVE) {
		$id = $_GET['schedID'];
		$query = "SELECT * FROM `schedules` JOIN users ON schedules.instructorID = users.userID JOIN user_details ON users.username = user_details.username WHERE id = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		$start = $row['start'];

		$time = $row['time'];
		$check = "SELECT * FROM appointments JOIN schedules ON schedules.id = appointments.scheduleID WHERE schedules.start = '$start' and schedules.title = 'PDC'";
		$res = mysqli_query($conn, $check);
		$veh = '';
		if(mysqli_num_rows($res) > 0){
			while($row1 = mysqli_fetch_array($res)){
	
				$vehicle = json_decode($row1['sched_details'], true);
				if(isset($vehicle['inlineCheckbox2'])){
					$veh= 'lightat';
					break;
				}elseif(isset($vehicle['inlineCheckbox3'])){
					$veh = 'lightmt';
					break;
				}
			}
		}
		

		$data = array(
			"info" => $row,
			"vehicle" => $veh
		);

		echo json_encode($data);
	}
?>