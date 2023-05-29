<?php
require('../connect.php');
extract($_POST);
require_once('../../../vendor/autoload.php');

	use Cloudinary\Cloudinary;
	use Cloudinary\Transformation\Resize;
if (session_status() === PHP_SESSION_ACTIVE) {
		$cloudinary = new Cloudinary(
			[
				'cloud' => [
					'cloud_name' => 'ddf34uiqq',
					'api_key'    => '458875595167279',
					'api_secret' => 'T9vj_YvIk46wxD1MGVE56Oqsnyk',
				],
			]
		);
		
		$imageUrl = "";
		if ($_FILES["image"]["error"] === UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["image"]["tmp_name"];
			$imageUploadResult = $cloudinary->uploadApi()->upload($tmp_name);
			$imageUrl = $imageUploadResult['secure_url'];
		
			// ... continue with your existing code, using $imageUrl as needed
		}else{
			$query = "SELECT * FROM users WHERE userID = $userID";
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_array($result);
			$imageUrl = $row['avatar'];
		}

	$number = mysqli_real_escape_string($conn, $mobilenumber);
	$email = mysqli_real_escape_string($conn, $email);
	$hashpass = password_hash($password, PASSWORD_DEFAULT);

	$query2 = "UPDATE user_details JOIN users ON user_details.username = users.username SET number = ?, email = ?, password = ?, avatar = ? WHERE userID = ?";

	$stmt2 = mysqli_prepare($conn, $query2);

	if ($stmt2) {
		mysqli_stmt_bind_param($stmt2, "ssssi", $number, $email, $hashpass, $imageUrl, $userID);

		if (mysqli_stmt_execute($stmt2)) {
			addSystemLogs($userID, "updateAccount");
		} else {
			echo "Error executing query.";
		}
	} else {
		echo "Error preparing statement.";
	}
}
?>