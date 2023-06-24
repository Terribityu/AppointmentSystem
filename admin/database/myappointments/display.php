<?php
require ('../connect.php');
    extract($_POST);
    if(isset($search))
    {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $query = "SELECT * FROM `appointments` JOIN schedules ON schedules.id = appointments.scheduleID JOIN users ON appointments.studentID = users.userID JOIN user_details ON user_details.username = users.username
        where (appointmentID like '%$search%'
        or firstname like '%$search%'
        or middlename like '%$search%'
        or lastname like '%$search%'
        or suffix like '%$search%'
        or address like '%$search%'
        or number like '%$search%'
        or email like '%$search%') and appointments.status_a = '$stats' and start > CURDATE() ORDER BY start ASC, status_a ASC";
        
    }else {
        $query = "SELECT * FROM `appointments` JOIN schedules ON schedules.id = appointments.scheduleID JOIN users ON appointments.studentID = users.userID JOIN user_details ON user_details.username = users.username where schedules.instructorID = '".$_SESSION['userID']."' and appointments.status_a = '$stats' ORDER BY start ASC, status_a ASC";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $start = date("F d, Y", strtotime($row['start']));
    	    // $time = date("g:i A", strtotime($row['time']));
            if($stats == 'approved'){
                echo "<tr class='clickable-row' data-value='".$row['appointmentID']."'>";
            }else{
                echo "<tr'>";
            }
            echo "  <th scope='row'>".$row['firstname']." ".$row['lastname']."</th>
                    <td>".$row['title']. ":". $row['sched_details']."</td>
                    <td>".$start."</td>
                    <td>".$time."</td>
                    <td>".$row['remarks']."</td>";

            if($stats == 'approved'){
                echo "<td>".$row['status']."</td>";
            }else{
                extract($row);
                echo "<td><button id='acceptRequest' title='Accept Request' value='$appointmentID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-check'></i></button>&nbsp
                <button id='denyRequest' title='Deny Request' value='$appointmentID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-close'></i></button></td>";
            }

            echo "</tr>";
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>