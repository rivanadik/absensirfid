<?php
require '../db_connect.php';

// Fetch data from database
$sql = "SELECT t_siswa.*, t_rfid.*
FROM t_siswa
INNER JOIN t_rfid ON t_siswa.nis = t_rfid.nis  
ORDER BY `t_rfid`.`id` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1; // Variable to keep track of the row number
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>$counter</td>
                <td>{$row['nis']}</td>
                <td>{$row['no_rfid']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['token']}</td>
                <td>{$row['chatid']}</td>
                <td>
                <button class='edit-button onclick= editItem(" . $row["id"] . ")'>Edit</button>
                <button class='delete-butto onclick= deleteItem(" . $row["id"] . ")'>Delete</button>
                  
                  </td>
               
            </tr>";
        $counter++;
    }
}

$conn->close();
?>