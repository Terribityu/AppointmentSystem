<?php
// Include DB Config
require_once 'dbConfig.php';

// Retrieve JSON from post BODY
$jsonstr = file_get_contents('php://input');
$jsonObj = json_decode($jsonstr);
    if (session_status() === PHP_SESSION_ACTIVE) {

    if ($jsonObj->request_type == 'addEvent'){
        $start = $jsonObj->start;
        $end = $jsonObj->end;

        $event_data = $jsonObj->event_data;
        $eventTitle = !empty($event_data[0])?$event_data[0]:'';
        $eventTime = !empty($event_data[1])?$event_data[1]:'';
        $eventPrice = !empty($event_data[2])?$event_data[2]:'';
        $eventInstructor = !empty($event_data[3])?$event_data[3]:'';
        $eventSlots = 1;
        if($eventTitle == "TDC"){
            $eventSlots = 30;
        }

        if(!empty($eventTitle)){
            // Insert event data into database
            $sqlQ = "INSERT INTO schedules (title, start, end, time, price, slots, instructorID) VALUES(?,?,?,?,?,?,?)";
            $stmt = $db->prepare($sqlQ);
            $stmt->bind_param("ssssiii", $eventTitle, $start, $end, $eventTime, $eventPrice, $eventSlots, $eventInstructor);
            $insert = $stmt->execute();

            if($insert){
                $last_id = $db->insert_id;
                addSystemLogs($last_id, "addSchedule");
                
                $output = [
                    'status' => 1
                ];
                echo json_encode($output);
                
            }else{
                $output = [
                    'error' => 'Event Add request failed!'
                ];
                echo json_encode($output);
            }
        }
    } elseif($jsonObj->request_type == 'deleteEvent'){
        $id = $jsonObj->event_id;

        // Delete event from the database
        $sql = "DELETE FROM schedules WHERE id = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("i", $id);
        $delete = $stmt->execute();
            
        if($delete){
            addSystemLogs($id, "deleteSchedule");

            $output = [
                'status' => 1
            ];
            echo json_encode($output);
        }else{
            $output = [
                'error' => 'Event Delete request failed!'
            ];
            echo json_encode($output);
        }
    }
}
?>
