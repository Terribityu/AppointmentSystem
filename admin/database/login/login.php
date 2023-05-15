<?php
include("../connect.php");
if (isset($_POST['btn_login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        if($row['userType'] == "student"){
            echo "You do not have access to login here.";
        }else if(password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['userType'] = $row['userType'];
            $_SESSION['userID'] = $row['userID'];
            $_SESSION['avatar'] = $row['avatar'];
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