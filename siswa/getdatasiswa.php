<?php
require '../db_connect.php';

// Fetch data from database
$sql = "SELECT * FROM `t_siswa` WHERE 1  
ORDER BY `t_siswa`.`id` ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $counter = 1; // Variable to keep track of the row number
    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td>$counter</td>
                <td>{$row['nis']}</td>
                <td>{$row['nama']}</td>
                <td>{$row['alamat']}</td>
                <td>{$row['kelas']}</td>
                <td>
                <button class='edit-button onclick= editItem(" . $row["id"] . ")'>Edit</button>
                <button class='delete-button onclick= deleteItem(" . $row["id"] . ")'>Delete</button>
                  
                  </td>
               
            </tr>";
        $counter++;
    }
}

$conn->close();
?>