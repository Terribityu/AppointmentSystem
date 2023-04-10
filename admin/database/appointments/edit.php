<?php
require ('../connect.php');
                extract($_POST);
                $query = "UPDATE appointments SET scheduleID = '$schedules', usersID = '$studentDataList' where appointmentID = '".$appointmentID."'";
                if(mysqli_query($conn, $query)){
                        addSystemLogs($appointmentID, "editappointment");
                }else{
                        echo "Error On Query";
                }
?>