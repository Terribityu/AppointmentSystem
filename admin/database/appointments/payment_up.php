<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
                extract($_POST);
                $date = date('m-d-Y');
                $sql = "INSERT INTO sales VALUES(NULL, now(), $price, $id)";
                $query = "UPDATE appointments SET payment_s = 'paid' where appointmentID = '".$id."'";
                if(mysqli_query($conn, $query)){
                                mysqli_query($conn, $sql);
                                addSystemLogs($id, "paidappointment");
                }else{
                        echo "Error On Query";
                }
        }
?>