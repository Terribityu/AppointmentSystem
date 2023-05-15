<?php
require('../connect.php');
extract($_POST);

$mobilenumber = mysqli_real_escape_string($conn, $mobilenumber);
$email = mysqli_real_escape_string($conn, $email);
$firstname = mysqli_real_escape_string($conn, $firstname);
$middlename = mysqli_real_escape_string($conn, $middlename);
$lastname = mysqli_real_escape_string($conn, $lastname);
$suffix = mysqli_real_escape_string($conn, $suffix);
$address = mysqli_real_escape_string($conn, $address);
$dateofbirth = mysqli_real_escape_string($conn, $dateofbirth);
$age = mysqli_real_escape_string($conn, $age);

$query2 = "UPDATE user_details JOIN users ON user_details.username = users.username SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, address = ?, dateofbirth = ?,
                age = ?, gender = ?, civilstatus = ?, number = ?, email = ? WHERE userID = ?";

$stmt2 = mysqli_prepare($conn, $query2);

if ($stmt2) {
    mysqli_stmt_bind_param($stmt2, "sssssssssssi", $firstname, $middlename, $lastname, $suffix, $address, $dateofbirth,
        $age, $gender, $civilstatus, $mobilenumber, $email, $userID);

    if (mysqli_stmt_execute($stmt2)) {
        addSystemLogs($userID, "editstudent");
    } else {
        echo "Error executing query.";
    }
} else {
    echo "Error preparing statement.";
}
?>