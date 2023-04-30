<?php
require ('../connect.php');
    extract($_POST);
    if(isset($search))
    {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $query = "SELECT * FROM `appointments` JOIN users ON appointments.usersID = users.userID JOIN user_details ON user_details.username = users.username JOIN schedules ON appointments.scheduleID = schedules.id
        where (appointmentID like '%$search%'
        or firstname like '%$search%'
        or middlename like '%$search%'
        or lastname like '%$search%'
        or suffix like '%$search%'
        or address like '%$search%'
        or number like '%$search%'
        or email like '%$search%') and status_a = '$stats'";
        
    }else {
        $query = "SELECT * FROM `appointments` JOIN users ON appointments.usersID = users.userID JOIN user_details ON user_details.username = users.username JOIN schedules ON appointments.scheduleID = schedules.id where status_a = '$stats'";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            echo "
                <tr>
                    <th scope='row'>$appointmentID</th>
                    <td>$firstname</td>
                    <td>$middlename</td>
                    <td>$lastname</td>
                    <td>$address</td>
                    <td>$number</td>
                    <td>$email</td>";

                if($status_a == "pending"){
                    echo "
                    <td><button id='approveAppointment' title='Approve Appointment' value='$appointmentID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-check'></i></button>&nbsp
                    <button id='rejectAppointment' title='Reject Appointment' value='$appointmentID' old-value='$scheduleID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-xmark'></i></button></td>";
                }else{
                    echo "<td>$status_a</td>";
                }

                echo "
                    <td><button id='editAppointment' title='Edit Appointment' value='$appointmentID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-user-pen'></i></button>&nbsp
                    <button id='deleteAppointment' title='Delete Appointment' value='$appointmentID' old-value='$scheduleID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></td>
                </tr>";
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>