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

$result = mysqli_query($conn, "SELECT * FROM user_details WHERE detail_ID = $userID");
$row = mysqli_fetch_array($result);

$query = "UPDATE users SET number = ?, email = ? WHERE username = ?";
$query2 = "UPDATE user_details SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, address = ?, dateofbirth = ?,
                age = ?, gender = ?, civilstatus = ? WHERE detail_ID = ?";

$stmt1 = mysqli_prepare($conn, $query);
$stmt2 = mysqli_prepare($conn, $query2);

if ($stmt1 && $stmt2) {
    mysqli_stmt_bind_param($stmt1, "sss", $mobilenumber, $email, $row['username']);
    mysqli_stmt_bind_param($stmt2, "sssssssssi", $firstname, $middlename, $lastname, $suffix, $address, $dateofbirth,
        $age, $gender, $civilstatus, $userID);

    if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2)) {
        addSystemLogs($userID, "editinstructor");
    } else {
        echo "Error executing query.";
    }
} else {
    echo "Error preparing statement.";
}
?>