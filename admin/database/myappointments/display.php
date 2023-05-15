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
        or email like '%$search%') and status_a = 'accepted' and start > CURDATE()";
        
    }else {
        $query = "SELECT * FROM `appointments` JOIN schedules ON schedules.id = appointments.scheduleID JOIN users ON schedules.instructorID = users.userID JOIN user_details ON user_details.username = users.username where users.username = '".$_SESSION['username']."' and appointments.status_a = 'approved' and start > CURDATE()";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $query1 = "SELECT * FROM users JOIN user_details ON users.username = user_details.username JOIN appointments ON appointments.studentID = users.userID WHERE appointments.studentID = ".$row['studentID'];
            $result1 = mysqli_query($conn, $query1);
            $row1 = mysqli_fetch_array($result1); 
            echo "
                <tr class='clickable-row' data-value='".$row['appointmentID']."'>
                    <th scope='row'>".$row1['firstname']." ".$row1['lastname']."</th>
                    <td>".$row['title']."</td>
                    <td>".$row['start']."</td>
                    <td>".$row['time']."</td>
                    <td>".$row['remarks']."</td>
                    <td>".$row['status']."</td>
                </tr>";
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>