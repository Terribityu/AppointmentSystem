<?php
require ('../connect.php');
		$type = $_POST['type'];
        if($type == 'thismonth'){
            $type = 'WHERE MONTH(date_column) = MONTH(CURRENT_DATE())';
        }elseif($type == '6months'){
            $type = 'WHERE date_column BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 MONTH) AND CURDATE()';
        }elseif($type == 'year'){
            $type = 'WHERE date_column BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()';
        }else{
            $type = ' ';
        }
		$query = "SELECT *
        FROM sales ". $type;
		if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                extract($row);
                $textDate = date('F j, Y g:i A', strtotime($date));
                $start = date("F d, Y", strtotime($row['start']));
                echo "
                    <tr> 
                        <td>$title</td>
                        <td>$price_s</td>
                        <td>$start</td> 
                        <td>$textDate</td>
                    </tr>
                ";
            }
        }else{
            echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
        } 
?>