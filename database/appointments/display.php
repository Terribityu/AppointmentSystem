<?php
require ('../connect.php');
    extract($_POST);
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
        or email like '%$search%') and users.username = '".$_SESSION['username']."' ORDER BY start ASC, status_a ASC";
        
    }else {
        $query = "SELECT * FROM `appointments` JOIN users ON appointments.studentID = users.userID JOIN user_details ON user_details.username = users.username JOIN schedules ON appointments.scheduleID = schedules.id where users.username = '".$_SESSION['username']."' ORDER BY start ASC, status_a ASC";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $query1 = "SELECT * FROM users JOIN user_details ON users.username = user_details.username JOIN schedules ON schedules.instructorID = users.userID WHERE schedules.instructorID = ".$row['instructorID'];
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_array($result1); 
            $start = date("F d, Y", strtotime($row['start']));
    	    // $time = date("g:i A", strtotime($row['time']));
            echo "
                <tr class='clickable-row' data-value='".$row['appointmentID']."'>
                    <th scope='row'>".$row1['firstname']." ".$row1['lastname']."</th>
                    <td>".$row['title']."</td>
                    <td>".$start."</td>
                    <td>".$row['time']."</td>
                    <td>".$row['remarks']."</td>";
                if($row['status_a']=="rejected"){
                    echo "<td>".$row['status_a'].": ".$row['reason_rej']."</td>";
                }else{
                    echo "<td>".$row['status_a']."</td>";
                }
                  echo "<td>".$row['payment_s']."</td>
                </tr>";
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>