<?php
require('../connect.php');
    if (session_status() === PHP_SESSION_ACTIVE) {
    extract($_POST);

    $password = '';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^_+:?-=.';
    $username = explode('@', $email)[0];

    for ($i = 0; $i < 8; $i++) {
        $password .= $chars[rand(0, strlen($chars) - 1)];
    }
    for ($i = 0; $i < 3; $i++) {
        $username .= "_".$chars[rand(0, strlen($chars) - 1)];
    }

    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users VALUES(NULL, ?, ?, ?, ?, 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'student', 0)";
    $query1 = "INSERT INTO user_details VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 'ssis', $username, $email, $mobilenumber, $hashpass);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $last_id = mysqli_insert_id($conn);

        $stmt1 = mysqli_prepare($conn, $query1);
        mysqli_stmt_bind_param($stmt1, 'sssssissss', $firstname, $middlename, $lastname, $suffix, $address, $zipcode, $dateofbirth, $gender, $civilstatus, $username);
        $result1 = mysqli_stmt_execute($stmt1);

        if ($result1) {
            addSystemLogs($last_id, "addstudent");
            echo json_encode(array("username" => $username, "password" => $password, "email" => $email));
        } else {
            echo mysqli_error($conn);
        }
    } else {
        echo mysqli_error($conn);
    }
}
?>