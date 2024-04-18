<?php
require '../db_connect.php';
// Mengambil daftar NIS Siswa dari tabel siswa

$sql = "SELECT * FROM `t_siswa` WHERE status='0'";
// print($sql);
$result = $conn->query($sql);

$options = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row['nis'] . "'>" . $row['nis'] . "</option>";
    }
}

$conn->close();

echo $options;
?>
