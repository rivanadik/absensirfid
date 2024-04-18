<?php
date_default_timezone_set('Asia/Jakarta');
$tgl = date("Y-m-d H:i:s");
require '../db_connect.php';

if(isset($_POST["rfid"])) {


    $rfid = $_POST["rfid"];
   
   
    

    $sql = "INSERT INTO history_rfid (no_rfid, date_time) VALUES ('$rfid', '$tgl')";
//    print($sql);
//    die();
    if ($conn->query($sql) === TRUE) {
        $response = array("status" => "success", "message" => "Data inserted successfully");
    } else {
        $response = array("status" => "error", "message" => "Error: " );
    }
} else {
    $response = array("status" => "error", "message" => "RFID data not found in POST request");
}

echo json_encode($response);
$conn->close();

?>
