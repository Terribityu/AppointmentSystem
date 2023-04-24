<?php
    require ('../connect.php');

    extract($_POST);
    
	$uploadDir = $mainDir+'/assets/img/'; 
	$uploadedFile = ''; 
	$fileName = basename($_FILES["image"]["name"]); 
    $targetFilePath = $uploadDir . $fileName; 
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
	move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);
	$uploadedFile = $fileName; 
	$hashpass = password_hash($password, PASSWORD_DEFAULT);
	
	$query = "INSERT INTO users VALUES(null,'$username','$email','$number','$hashpass','$avatar','student')";
	$query1 = "INSERT INTO user_details VALUES(NULL,'$firstname','$middlename','$lastname','$suffix','$address','$zipcode','$dateofbirth'
        ,'$age','$gender','$civilstatus','$username')";
	if(mysqli_query($conn , $query)){
		echo mysqli_query($conn, $query1);
        $last_id = mysqli_insert_id($conn);
        addSystemLogs($last_id, "registerstudent");
	}else{
		echo mysqli_error($conn);
	}

?>