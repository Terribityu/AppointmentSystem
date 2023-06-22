<?php
require("../connect.php");
$data = array();

$query = "SELECT * FROM users WHERE userType = 'instructor'";
$result = mysqli_query($conn, $query);
$instruct_total = mysqli_num_rows($result);

$query1 = "SELECT * FROM users WHERE userType = 'student'";
$result1 = mysqli_query($conn, $query1);
$student_total = mysqli_num_rows($result1);

$query2 = "SELECT SUM(price_s) AS total FROM sales";
$result2 = mysqli_query($conn, $query2);
$totalPrice = 0;
// Check if the query was successful
if ($result2) {
    // Fetch the total value from the result
    $row = mysqli_fetch_assoc($result2);
    if($row['total'] != ''){
        $totalPrice = $row['total'];
    }
}

if($_SESSION['userType'] == "admin"){
    $query3 = "SELECT * FROM appointments join schedules ON appointments.scheduleID = schedules.id WHERE MONTH(schedules.start) = MONTH(CURRENT_DATE())";
    $result3 = mysqli_query($conn, $query3);
    $all_appoint = mysqli_num_rows($result3);
}else{
    $query3 = "SELECT * FROM appointments JOIN schedules ON appointments.scheduleID = schedules.id WHERE MONTH(schedules.start) = MONTH(CURRENT_DATE()) and instructorID =".$_SESSION['userID'];
    $result3 = mysqli_query($conn, $query3);
    $all_appoint = mysqli_num_rows($result3);
}
$my_appoint = 0;
if($_SESSION['userType'] == "instructor"){
    $query4 = "SELECT * FROM appointments JOIN schedules ON appointments.scheduleID = schedules.id WHERE (appointments.status_a = 'approved' or appointments.status_a = 'request') and schedules.instructorID =".$_SESSION['userID'];
    $result4 = mysqli_query($conn, $query4);
    $my_appoint = mysqli_num_rows($result4);
}

$data = array(
    'instructor' => $instruct_total,
    'student' => $student_total,
    'income' => $totalPrice,
    'appoint' => $all_appoint,
    'myappoint' => $my_appoint
);

echo json_encode($data);
?>