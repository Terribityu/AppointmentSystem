<?php
// Include database
    require_once 'dbConfig.php';
    if (session_status() === PHP_SESSION_ACTIVE) {
        // Filter events by calendar date.
        $where_sql = '';
        if(!empty($_GET['start']) && !empty($_GET['end'])){
            $where_sql .= "WHERE start BETWEEN '".$_GET['start']."' AND '".$_GET['end']."' ";
        }

        $sql = "SELECT * FROM schedules $where_sql";
        $result = $db->query($sql);

        $eventsArr = array();
        if($result->num_rows >0){
            while($row = $result->fetch_assoc()){
                array_push($eventsArr, $row);
            }
        }

        // Render events data in JSON format

        echo json_encode($eventsArr);
    }
?>