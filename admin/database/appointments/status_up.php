<?php
require ('../connect.php');
                extract($_GET);
                $query = "UPDATE appointments SET status_a = '$stats' where appointmentID = '".$id."'";
                if(mysqli_query($conn, $query)){
                        if($stats == "approved"){
                                addSystemLogs($id, "approveappointment");
                        }else{
                                addSystemLogs($id, "rejectappointment");
                        }
                }else{
                        echo "Error On Query";
                }
?>