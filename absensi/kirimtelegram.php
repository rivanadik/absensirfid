<?php
$dbHost = "192.168.80.154";
$dbUser = "root";
$dbPass = "";
$dbName = "db_siswa";

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('Asia/Jakarta'); // Set zona waktu sesuai dengan lokasi Anda
$jam = date('H.i');
$tgl = date("d-m-Y");
$tgl2 = date("Y-m-d H:i:s");


$current_time = strtotime(date('H:i')); // Waktu saat ini dalam format jam:menit

// Jam masuk lebih cepat (5:00 - 7:00)
// if ($current_time >= strtotime('04:30') && $current_time < strtotime('07:00')) {
//     $status = "Anda masuk lebih cepat.\n";
// }
// // Terlambat 15 menit (7:00 - 7:15)
// elseif ($current_time >= strtotime('07:10') && $current_time < strtotime('07:20')) {
//     $status = "Anda terlambat\n";
// }
// // Belum waktunya pulang (7:15 - 13:00)
// elseif ($current_time >= strtotime('07:20') && $current_time < strtotime('12:49')) {
//     $status = "Belum waktunya pulang.\n";
// }
// // Pulang tepat waktu (13:00 - 13:15)
// elseif ($current_time >= strtotime('13:00') && $current_time < strtotime('13:15')) {
//     $status = "Anda pulang tepat waktu.\n";
// }
// // Terlambat pulang (13:15 - 05:00 besok)
// elseif ($current_time >= strtotime('13:15') && $current_time < strtotime('14:00')) {
//     $status = "Anda pulang terlambat.\n";

// } elseif ($current_time >= strtotime('14:15') && $current_time < strtotime('17:00')) {
//     $status = "Di Luar Jam Sekolah.\n";
// }
if ($current_time >= strtotime('14:30') && $current_time < strtotime('14:49')) {
    $status = "Anda masuk lebih cepat.\n";
}
// Terlambat 15 menit (7:00 - 7:15)
elseif ($current_time >= strtotime('15:00') && $current_time < strtotime('15:30')) {
    $status = "Anda terlambat\n";
}
// Belum waktunya pulang (7:15 - 13:00)
elseif ($current_time >= strtotime('16:20') && $current_time < strtotime('17:49')) {
    $status = "Belum waktunya pulang.\n";
}
// Pulang tepat waktu (13:00 - 13:15)
elseif ($current_time >= strtotime('18:00') && $current_time < strtotime('19:15')) {
    $status = "Anda pulang tepat waktu.\n";
}
// Terlambat pulang (13:15 - 05:00 besok)
elseif ($current_time >= strtotime('13:15') && $current_time < strtotime('14:00')) {
    $status = "Anda pulang terlambat.\n";

} elseif ($current_time >= strtotime('14:15') && $current_time < strtotime('17:00')) {
    $status = "Di Luar Jam Sekolah.\n";
}


$data = json_decode(file_get_contents("php://input"), true);

if (!$data || !isset($data["rfid"])) {
    die("Data tidak valid.");
}

$rfid = $data["rfid"];

$sql_check = "SELECT t_siswa.*, t_rfid.*
FROM t_rfid
INNER JOIN t_siswa ON t_rfid.nis = t_siswa.nis
WHERE t_rfid.no_rfid = '$rfid'";
// echo $sql_check;
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {

    while ($row = $result_check->fetch_assoc()) {

        $token = $row['token'];
        $chatID = $row['chatid'];
        $message = "Data Absen Siswa :\n";
        $message .= "Nama : " . $row["nama"] . "\n";
        $message .= "NIS : " . $row["nis"] . "\n";
        $message .= "Kelas : " . $row["kelas"] . "\n";
        $message .= "Tanggal : " . $tgl . "\n";
        $message .= "Jam : " . $jam . "\n";
        $message .= "Keterangan : " . $status . "\n";

        // Kirim pesan ke Telegram
        sendTelegramMessage($token, $chatID, $message);
        // echo $token;
        $id = $row['nis'];

        // Menyimpan data ke dalam tabel
        $sql = "INSERT INTO t_absensi (nis, date_time, keterangan) VALUES ('$id', '$tgl2','$status')";
        // echo $sql;
        if ($conn->query($sql) === TRUE) {
            echo "1";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "0";
}

$conn->close();
function sendTelegramMessage($token, $chatID, $message)
{
    $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chatID&text=" . urlencode($message);
    file_get_contents($url);
}
?>