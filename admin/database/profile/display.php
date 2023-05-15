<?php
require ('../connect.php');
    extract($_POST);
   
    $query = "SELECT * FROM users JOIN user_details ON users.username = user_details.username WHERE users.userID = $userID";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    echo json_encode($row);

?>