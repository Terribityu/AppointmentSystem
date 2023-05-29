<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
		$query = "SELECT * FROM `users` JOIN user_details ON users.username = user_details.username WHERE users.userType = 'student'";
		$result = mysqli_query($conn , $query);
		if(mysqli_num_rows($result) > 0){
			while($row = mysqli_fetch_array($result)){
				extract($row);
				echo "<option value=$userID>$firstname $lastname</option>";
			}
		}
	}
?>