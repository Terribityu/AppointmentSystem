<?php
require('../connect.php');
    if (session_status() === PHP_SESSION_ACTIVE) {
    extract($_POST);

    $firstname = mysqli_real_escape_string($conn, $firstname);
    $middlename = mysqli_real_escape_string($conn, $middlename);
    $lastname = mysqli_real_escape_string($conn, $lastname);
    $suffix = mysqli_real_escape_string($conn, $suffix);
    $address = mysqli_real_escape_string($conn, $address);
    $dateofbirth = mysqli_real_escape_string($conn, $dateofbirth);
    $age = mysqli_real_escape_string($conn, $age);

    $query2 = "UPDATE user_details JOIN users ON user_details.username = users.username SET firstname = ?, middlename = ?, lastname = ?, suffix = ?, address = ?, dateofbirth = ?,
                    gender = ?, civilstatus = ? WHERE userID = ?";

    $stmt2 = mysqli_prepare($conn, $query2);

    if ($stmt2) {
        mysqli_stmt_bind_param($stmt2, "sssssssssi", $firstname, $middlename, $lastname, $suffix, $address, $dateofbirth,
            $gender, $civilstatus, $userID);

        if (mysqli_stmt_execute($stmt2)) {
            addSystemLogs($userID, "updateProfile");
        } else {
            echo "Error executing query.";
        }
    } else {
        echo "Error preparing statement.";
    }
}
?>