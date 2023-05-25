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
        or age like '%$search%'
        or gender like '%$search%'
        or civilstatus like '%$search%'
        or number like '%$search%'
        or email like '%$search%') and userType = 'student' and userArchive = 0";
        
    }else {
        $query = "SELECT * FROM user_details JOIN users ON user_details.username = users.username where userType = 'student' and userArchive = 0";
    }

    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            extract($row);
            echo "
                <tr> 
                    <td>$firstname $middlename $lastname</td>
                    <td>$suffix</td>
                    <td>$address</td>
                    <td>$dateofbirth</td> 
                    <td>$gender</td>
                    <td>$civilstatus</td>
                    <td>$number</td>
                    <td>$email</td>
                    <td><button id='editStud' title='Edit Student' value='$userID' data-value='$firstname $lastname' class='btn btn-success'><i class='fa-solid fas fa-user-pen'></i></button>&nbsp
                    <button id='deleteStud' title='Archive Student' value='$userID' data-value='$firstname $lastname' class='btn btn-danger'><i class='fa-solid fa-box-archive'></i></button></td>
                </tr>
            ";
        }
    }else{
        echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
    }

?>