<?php
require("../connect.php");
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

?>