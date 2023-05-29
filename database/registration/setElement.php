<?php
require("../connect.php");
if (session_status() === PHP_SESSION_ACTIVE) {
    if (isset($_GET['verifyotp'])) {
        $verifyotp = $_GET['verifyotp'];
        $storedOtp = $_SESSION['otp'];

        // Log the received OTP and its comparison result
        error_log("Received OTP: " . $verifyotp);
        error_log("Stored OTP: " . $storedOtp);

        if ($verifyotp == $storedOtp) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    if (isset($_GET['checkuser'])) {
        $checkuser = $_GET['checkuser'];

        // Log the received OTP and its comparison result
        error_log("Checkuser OTP: " . $checkuser);
        $sql = "SELECT * FROM `users` where username = '$checkuser'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    if (isset($_GET['checkedituser'])) {
        $checkuser = $_GET['checkedituser'];

        // Log the received OTP and its comparison result
        error_log("Checkuser OTP: " . $checkuser);
        $sql = "SELECT * FROM `users` where username = '$checkuser'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    if (isset($_GET['verifyoldpass'])) {
        $oldpass = $_GET['verifyoldpass'];
        $userID = $_SESSION['userID'];
        // Log the received old password
        error_log("Verify Old Password: " . $oldpass);
        $sql = "SELECT * FROM `users` WHERE userID = '$userID'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            if (password_verify($oldpass, $row['password'])) {
                echo "true";
            } else {
                echo "false";
            }
        } else {
            echo "false";
        }
    }
}
?>