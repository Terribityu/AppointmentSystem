<?php
require ('../connect.php');
	extract($_POST);
        $password = "";
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^_+:?-=.';
        $username = explode("@", $email)[0];
        for ($i = 0; $i < 8; $i++) {
            $password .= $chars[rand(0, strlen($chars) - 1)];
        }

        $query = "INSERT INTO users VALUES(NULL, '$username', '$email', '$mobilenumber', '$password', 'avatar.jpg', 'student')";
        $query1 = "INSERT INTO user_details VALUES(NULL,'$firstname','$middlename','$lastname','$suffix','$address','$zipcode','$dateofbirth'
        ,'$age','$gender','$civilstatus','$username')";
        if($result = mysqli_query($conn , $query)){
            echo mysqli_query($conn, $query1);
            $last_id = mysqli_insert_id($conn);
            addSystemLogs($last_id, "addstudent");
        }else{
            echo mysqli_error($conn);
        }
?>