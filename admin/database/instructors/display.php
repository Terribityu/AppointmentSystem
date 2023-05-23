<?php
require ('../connect.php');
    if(isset($_POST["search"]))
    {
        $search = mysqli_real_escape_string($conn, $_POST["search"]);
        $query = "SELECT * FROM user_details JOIN users ON user_details.username = users.username
        where (detail_ID like '%$search%'
        or firstname like '%$search%'
        or middlename like '%$search%'
        or lastname like '%$search%'
        or suffix like '%$search%'
        or address like '%$search%'
        or dateofbirth like '%$search%'
        or gender like '%$search%'
        or civilstatus like '%$search%'
        or number like '%$search%'
        or email like '%$search%') and (userType = 'instructor')";
        
    }else {
        $query = "SELECT * FROM user_details JOIN users ON user_details.username = users.username where userType = 'instructor'";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            echo "
                <tr>
                    <td>$firstname $middlename $lastname $suffix</td>
                    <td>$address</td>
                    <td>$dateofbirth</td>
                    <td>$gender</td>
                    <td>$civilstatus</td>
                    <td>$number</td>
                    <td>$userType</td>
                    <td>$email</td>
                    <td><button id='editStud' title='Edit Instructor' value='$userID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-user-pen'></i></button>&nbsp
                    <button id='deleteStud' title='Archive Instructor' value='$userID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-box-archive'></i></button></td>
                </tr>
            ";
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>