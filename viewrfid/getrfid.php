<?php
require '../db_connect.php';



// Mengambil data dari tabel users
$sql = "SELECT no_rfid FROM history_rfid ORDER BY id DESC LIMIT 1; ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $rfidData = $row["no_rfid"];
    $sql = "SELECT * FROM t_rfid WHERE no_rfid = '$rfidData'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ID sudah ada di database
        
        $truncateQuery = "TRUNCATE TABLE history_rfid";
        if ($conn->query($truncateQuery) === TRUE) {
            $data = array('cek' => '1', 'id' => $row["no_rfid"], 'message' => 'ID sudah terdaftar di database !!.');
        } else {
            echo "Gagal mengosongkan tabel histori: ";
        }
    } else {
        // ID belum ada di database
        $data = array('cek' => '2', 'id' => $row["no_rfid"], 'message' => 'ID Belum terdaftar di database.');

    }
    // Mengembalikan data dalam format JSON
    header("Content-Type: application/json");
    echo json_encode($data);
}


$conn->close();
?>