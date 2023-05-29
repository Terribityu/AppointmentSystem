<?php
include("../connect.php");
if (session_status() === PHP_SESSION_ACTIVE) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users JOIN user_details ON users.username = user_details.username WHERE users.username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        if($row['userType'] == "admin"){
            echo "Incorrect Username or password";
        }else if(password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['userType'] = $row['userType'];
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['avatar'] = $row['avatar'];
            $_SESSION['firstname'] = $row['firstname'];
            // echo "<script type='text/javascript'>myAlertAdmin()</script>";
            // header("Location: ../index.php");
        }
        else {
            echo "Incorrect Username or Password";
            // header("Location: ../login.php?error");
        }
    } else {
        echo "User doesn't exist.";
    }
}
?>