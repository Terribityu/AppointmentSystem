<?php
require ('../connect.php');
		$id = $_POST['id'];
		$query = "SELECT * FROM `appointments` JOIN users ON appointments.studentID = users.userID JOIN schedules ON appointments.scheduleID = schedules.id JOIN user_details ON user_details.username = users.username
		WHERE appointmentID = $id";
		$result = mysqli_query($conn , $query);
		$row = mysqli_fetch_array($result);
		
		$row['start'] = date("F d, Y", strtotime($row['start']));
    	$row['time'] = date("g:i A", strtotime($row['time']));
		
		echo json_encode($row);
		// echo '<h3 class="text-center mb-4">Appointment Details</h3>
		// <p>Appointment Type: <span id="title__text">'.$title.'</span></p>
		// <p>Instructor: <span id="instructor__text">'.$firstname.' '.$lastname.'</span></p>
		// <p>Date: <span id="date__text">'.$date_text.'</span></p>
		// <p>Time: <span id="time__text">'.$time_std.'</span></p>
		// <p>Status: <span id="status__text">'.$status.'</span></p>
		// <p>Price: <span id="price__text">'.$price.'</span></p>';
?>