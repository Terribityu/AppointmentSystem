<?php
require('../connect.php');
extract($_POST);

$password = "";
$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^_+:?-=.';
$username = explode("@", $email)[0];
for ($i = 0; $i < 8; $i++) {
    $password .= $chars[rand(0, strlen($chars) - 1)];
}

$hashpass = password_hash($password, PASSWORD_DEFAULT);
// Prepare the statements
$query = "INSERT INTO users VALUES(NULL, ?, ?, ?, ?, 'https://res.cloudinary.com/ddf34uiqq/image/upload/v1682772503/m5voiqwbccmzooxvi8wa.jpg', 'instructor', 0)";
$query1 = "INSERT INTO user_details VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt1 = mysqli_prepare($conn, $query);
$stmt2 = mysqli_prepare($conn, $query1);

if ($stmt1 && $stmt2) {
    // Bind parameters for the first statement
    mysqli_stmt_bind_param($stmt1, "ssss", $username, $email, $mobilenumber, $hashpass);
    // Execute the first statement
    mysqli_stmt_execute($stmt1);

    // Get the last inserted ID
    $last_id = mysqli_insert_id($conn);

    // Bind parameters for the second statement
    mysqli_stmt_bind_param($stmt2, "sssssissss", $firstname, $middlename, $lastname, $suffix, $address, $zipcode, $dateofbirth, $gender, $civilstatus, $username);
    // Execute the second statement
    mysqli_stmt_execute($stmt2);

    addSystemLogs($last_id, "addinstructor");

    echo json_encode(array("username" => $username, "password" => $password, "email" => $email));
} else {
    echo mysqli_error($conn);
}
?>