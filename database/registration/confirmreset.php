<?php
require('../connect.php');
extract($_POST);

$hashpass = password_hash($password, PASSWORD_DEFAULT);

$query = "UPDATE users SET password = ? WHERE email = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, 'ss', $hashpass, $email);
if(mysqli_stmt_execute($stmt)){
    echo "success";
    $last_id = mysqli_insert_id($conn);
    addSystemLogs($last_id, "resetpassword");
}else{
    echo "error";
}
?>