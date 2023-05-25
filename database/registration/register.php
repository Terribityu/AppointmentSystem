<?php
    require ('../connect.php');

    extract($_POST);
	
	require_once('../../vendor/autoload.php');

	use Cloudinary\Cloudinary;
	use Cloudinary\Transformation\Resize;

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
	} else {
		// Handle the case when no image was uploaded or an error occurred
		// ...
		$imageUrl = "https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg";
	}
	
	// $uploadDir = $mainDir.'/assets/img/'; 
	// $uploadedFile = ''; 
	// $fileName = basename($_FILES["image"]["name"]); 
    // $targetFilePath = $uploadDir . $fileName; 
    // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
	// move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
	// $uploadedFile = $fileName; 
	$hashpass = password_hash($password, PASSWORD_DEFAULT);
	
	// Prepare the statement for the users query
	$query = "INSERT INTO users VALUES (null, ?, ?, ?, ?, ?, 'student', '0')";
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'sssss', $username, $email, $mobilenumber, $hashpass, $imageUrl);

	// Prepare the statement for the user_details query
	$query1 = "INSERT INTO user_details VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt1 = mysqli_prepare($conn, $query1);
	mysqli_stmt_bind_param($stmt1, 'sssssissss', $firstname, $middlename, $lastname, $suffix, $address, $zipcode, $dateofbirth, $gender, $civilstatus, $username);
	if(mysqli_stmt_execute($stmt)){
		$last_id = mysqli_insert_id($conn);
		if(mysqli_stmt_execute($stmt1)){
			addSystemLogs($last_id, "registerstudent");
		}
	}else{
		echo mysqli_error($conn);
	}

?>