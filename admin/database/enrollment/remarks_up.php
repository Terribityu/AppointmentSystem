<?php
require ('../connect.php');
if (session_status() === PHP_SESSION_ACTIVE) {
                extract($_GET);
                $query = "UPDATE appointments SET remarks = '$stats' where appointmentID = '".$id."'";
                if(mysqli_query($conn, $query)){
                        if($stats == "passed"){
                                addSystemLogs($id, "passedstudent");
                        }else{
                                addSystemLogs($id, "failedstudent");
                        }
                }else{
                        echo "Error On Query";
                }
        }
?>