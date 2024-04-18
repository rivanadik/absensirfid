<?php
require '../db_connect.php';

// Fetch data from database
$sql = "SELECT t_absensi.*, t_siswa.*
FROM t_absensi
INNER JOIN t_siswa ON t_absensi.nis = t_siswa.nis  
ORDER BY `t_absensi`.`date_time` DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1; // Variable to keep track of the row number
    while ($row = $result->fetch_assoc()) {

        $tgl = date('d-M-Y', strtotime($row["date_time"])); 
        $jam = date('H.i', strtotime($row["date_time"])); 
        echo "<tr>
                <td>$counter</td>
                <td>{$row['nis']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['kelas']}</td>
                <td>$tgl</td>
                <td>$jam</td>
                <td>{$row['keterangan']}</td>
               
            </tr>";
        $counter++;
    }
}

$conn->close();
?>