<?php
require ('../connect.php');
                extract($_GET);
                if($stats == "approved"){
                        $query = "UPDATE feedbacks SET status = '$stats' where feedbackID = '".$id."'";
                }else{
                        $query = "UPDATE feedbacks SET status = '$stats' where feedbackID = '".$id."'";
                }
                if(mysqli_query($conn, $query)){
                        if($stats == "approved"){
                                addSystemLogs($id, "approvefeedback");
                        }else{
                                addSystemLogs($id, "rejectfeedback");
                        }
                }else{
                        echo "Error On Query";
                }
?>