<?php
require ('../connect.php');
                extract($_POST);
                $result = mysqli_query($conn, "SELECT * FROM user_details where detail_ID = $userID");

                $row = mysqli_fetch_array($result);

                $query = "UPDATE users SET number = '$mobilenumber', email = '$email' where username = '".$row['username']."'";
                $query2 = "UPDATE user_details SET firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', suffix = '$suffix', address = '$address', dateofbirth = '$dateofbirth',
                age = $age, gender = '$gender', civilstatus = '$civilstatus' where detail_ID = ".$userID;
                if(mysqli_query($conn, $query)){
                        echo mysqli_query($conn , $query2);
                        addSystemLogs($userID, "editinstructor");
                }else{
                        echo "Error On Query";
                }
?>