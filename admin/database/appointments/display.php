<?php
require ('../connect.php');
    extract($_POST);
    $inst_id = $_SESSION['userID'];
    if(isset($search))
    {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $query = "SELECT * FROM `appointments` JOIN users ON appointments.studentID = users.userID JOIN user_details ON user_details.username = users.username JOIN schedules ON appointments.scheduleID = schedules.id
        where (appointmentID like '%$search%'
        or firstname like '%$search%'
        or middlename like '%$search%'
        or lastname like '%$search%'
        or suffix like '%$search%'
        or address like '%$search%'
        or number like '%$search%'
        or email like '%$search%') and appointmentArchive = 0 and status_a = '$stats'";
        
    }else {
        if($_SESSION['userType'] == "admin"){
            $query = "SELECT * FROM `appointments` JOIN users ON appointments.studentID = users.userID JOIN user_details ON user_details.username = users.username JOIN schedules ON appointments.scheduleID = schedules.id where appointmentArchive = 0 and status_a = '$stats'";
        }else {
            $query = "SELECT * FROM `appointments` JOIN users ON appointments.studentID = users.userID JOIN user_details ON user_details.username = users.username JOIN schedules ON appointments.scheduleID = schedules.id where appointmentArchive = 0 and status_a = '$stats' and schedules.instructorID = '$inst_id'";
        }
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            $start = date("F d, Y", strtotime($row['start']));
    	    // $time = date("g:i A", strtotime($row['time']));
            $getins = "SELECT * FROM users JOIN user_details ON users.username = user_details.username WHERE userID = $instructorID";
            $row1 = mysqli_query($conn, $query);
            $instname = $row['firstname']." ".$row['lastname'];
            echo "
                <tr>
                    <td>$firstname $middlename $lastname $suffix</td>
                    <td>$title</td>
                    <td>$start $time</td>
                    <td>$instname</td>
                    <td>$number</td>
                    <td>$email</td>";

                if($status_a == "pending"){
                    echo "
                    <td><button id='approveAppointment' title='Approve Appointment' value='$appointmentID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-check'></i></button>&nbsp
                    <button id='rejectAppointment' title='Reject Appointment' value='$appointmentID' old-value='$scheduleID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-xmark'></i></button></td>";
                    echo "
                    <td><button id='editAppointment' title='Edit Appointment' value='$appointmentID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-user-pen'></i></button>&nbsp
                    <button id='deleteAppointment' title='Archive Appointment' value='$appointmentID' old-value='$scheduleID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-box-archive'></i></button></td>
                </tr>";
                }else{
                    if($status == "completed"){
                        echo "<td>$status</td>";
                        echo "
                        <td>
                        <button id='deleteAppointment' title='Archive Appointment' value='$appointmentID' old-value='$scheduleID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-box-archive'></i></button>";
                        if($payment_s == "unpaid"){
                            echo "&nbsp;<button id='paymentStatus' title='Mark as Paid' value='$appointmentID' old-value='$price' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fa-peso-sign'></i></i></button></td>";
                        }
                    echo "</tr>";
                    }else{
                        echo "<td>$status_a: $reason_rej</td>";
                        echo "
                        <td>
                        <button id='deleteAppointment' title='Archive Appointment' value='$appointmentID' old-value='$scheduleID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-box-archive'></i></button>";
                        if($payment_s == "unpaid"){
                            echo "&nbsp;<button id='paymentStatus' title='Mark as Paid' value='$appointmentID' old-value='$price' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fa-peso-sign'></i></i></button></td>";
                        }
                    echo "</tr>";
                    }
                }
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>