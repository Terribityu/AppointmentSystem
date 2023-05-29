<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
                extract($_GET);
                $date = date('m-d-Y');
                $sql = "INSERT INTO sales VALUES(NULL, now(), $price, $id)";
                $query = "UPDATE appointments SET payment_s = '$stats' where appointmentID = '".$id."'";
                if(mysqli_query($conn, $query)){
                        if($stats == "paid"){
                                mysqli_query($conn, $sql);
                                addSystemLogs($id, "paidappointment");
                        }
                }else{
                        echo "Error On Query";
                }
        }
?>