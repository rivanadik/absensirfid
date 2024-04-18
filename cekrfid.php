<?php



    if (isset($_GET["rfid"])) {
        $rfidData = $_GET["rfid"];
        
        // Lakukan operasi atau aksi yang diperlukan dengan data RFID di sini
        // Misalnya, simpan data ke database atau lakukan verifikasi
        
        // Contoh: Menyimpan data RFID ke file log
        $logFile = "rfid_log.txt";
        $currentTime = date("Y-m-d H:i:s");
        $logEntry = "RFID Data: $rfidData | Timestamp: $currentTime\n";
        
        file_put_contents($logFile, $logEntry, FILE_APPEND);
        
        // Kirim respons ke JavaScript
        $response = array("status" =>  $rfidData , "message" => "RFID data berhasil diterima dan diproses.");
    } else {
        $response = array("status" => "error", "message" => "Tempelkan kartu RFID untuk memulai.");
    }

    header("Content-Type: application/json");
echo json_encode($response);
?>
