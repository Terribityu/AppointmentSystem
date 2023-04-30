<?php
require ('../connect.php');
		$query = "SELECT * FROM `schedules` JOIN users ON schedules.userID = users.userID JOIN user_details ON users.username = user_details.username WHERE schedules.slots > 0 and start > CURDATE()";
		$result = mysqli_query($conn , $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				extract($row);
				echo "<option value=$id>$title | $start | $firstname | Slots: $slots</option>";
			}
		}
?>