<?php
require ('../connect.php');
                extract($_GET);
                if($stats == "approved"){
                        $query = "UPDATE appointments SET status_a = '$stats' where appointmentID = '".$id."'";
                }else{
                        $query = "UPDATE appointments SET status_a = '$stats', reason_rej = '$reason' where appointmentID = '".$id."'";
                }
                if(mysqli_query($conn, $query)){
                        if($stats == "approved"){
                                addSystemLogs($id, "approveappointment");
                        }else{
                                $sql = "UPDATE schedules SET slots = slots + 1 WHERE id = $schedID";
                                mysqli_query($conn , $sql);
                                addSystemLogs($id, "rejectappointment");
                        }
                }else{
                        echo "Error On Query";
                }
?>