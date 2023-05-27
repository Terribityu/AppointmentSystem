<?php
require ('../connect.php');

$page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number
$limit = 10; // Number of records per page
$offset = ($page - 1) * $limit; // Offset for the database query
    $type = $_GET['type'];
    $forsearch = ' ';
        if($type == 'thismonth'){
            $type = 'WHERE MONTH(date) = MONTH(CURRENT_DATE())';
            $forsearch = 'AND MONTH(date) = MONTH(CURRENT_DATE())';
        }elseif($type == '6months'){
            $type = 'WHERE date BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 MONTH) AND CURDATE()';
            $forsearch = 'AND date BETWEEN DATE_SUB(CURDATE(), INTERVAL 6 MONTH) AND CURDATE()';
        }elseif($type == 'year'){
            $type = 'WHERE date BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()';
            $forsearch = 'AND date BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()';
        }else{
            $type = ' ';
            $forsearch = ' ';
        }

$query = isset($_GET['query']) ? mysqli_real_escape_string($conn, $_GET['query']) : ""; // Search query

// pag merong query which is yung search bar nasa index.php mag run itong if statement
if (isset($_GET['query'])) {
  $sql = "SELECT * FROM sales JOIN appointments ON sales.appointmentID = appointments.appointmentID JOIN schedules ON schedules.id = appointments.scheduleID
  where title like '%$query%'
  or price_s like '%$query%'
  or start like '%$query%'
  OR MONTHNAME(`date`) LIKE '%$query%'
  OR DAY(`date`) = '$query'
  OR YEAR(`date`) = '$query' ".$forsearch." LIMIT $offset, $limit";
} else {
  // pag walang query mag run itong else statementF
  $sql = "SELECT * FROM sales JOIN appointments ON sales.appointmentID = appointments.appointmentID JOIN schedules ON schedules.id = appointments.scheduleID ".$type." LIMIT $offset, $limit";
}

$result = mysqli_query($conn, $sql);

//ilagay sa array laman ng result
$data = array();
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
}

// kunin total bilang ng mga records para sa pagination
function getTotalRecords($conn, $query, $forsearch)
{
  $sql = "SELECT COUNT(*) as total FROM sales JOIN appointments ON sales.appointmentID = appointments.appointmentID JOIN schedules ON schedules.id = appointments.scheduleID
   where title like '%$query%'
  or price_s like '%$query%'
  or start like '%$query%'
  OR MONTHNAME(`date`) LIKE '%$query%'
  OR DAY(`date`) = '$query'
  OR YEAR(`date`) = '$query' ".$forsearch;
  $result = mysqli_query($conn, $sql);
  $data = mysqli_fetch_assoc($result);
  return $data['total'];
}


$total_records = getTotalRecords($conn, $query, $forsearch); //
$total_pages = ceil($total_records / $limit);

$response = array(
  'data' => $data,
  'pagination' => array(
    'current_page' => $page,
    'total_pages' => $total_pages
  )
);

header('Content-Type: application/json');
echo json_encode($response);

mysqli_close($conn);


// if(isset($_GET["search"]))
// {
//     $search = mysqli_real_escape_string($conn, $_GET["search"]);
//     $query = "SELECT * FROM sales JOIN appointments ON sales.appointmentID = appointments.appointmentID JOIN schedules ON schedules.id = appointments.scheduleID
//     where title like '%$search%'
//     or price_s like '%$search%'
//     or start like '%$search%'
//     OR MONTHNAME(`date`) LIKE '%$search%'
//     OR DAY(`date`) = '$search'
//     OR YEAR(`date`) = '$search' ".$type;
    
// }else {
//     $query = "SELECT * FROM sales JOIN appointments ON sales.appointmentID = appointments.appointmentID JOIN schedules ON schedules.id = appointments.scheduleID ".$type;
// }

// $result = mysqli_query($conn,$query);
// if(mysqli_num_rows($result) > 0){
//     while($row = mysqli_fetch_array($result)){
//         echo "
//             <tr> 
//                 <td>$title</td>
//                 <td>$price_s</td>
//                 <td>$start</td> 
//                 <td>$textDate</td>
//             </tr>
//         ";
//     }
// }else{
//     echo "<h5 style='text-align:center'><i class='fa-regular fas fa-magnifying-glass'></i>No Results Found.</h5>";
// }    
?>