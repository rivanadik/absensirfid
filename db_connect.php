<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username MySQL Anda
$password = ""; // Ganti dengan password MySQL Anda
$database = "db_siswa"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "Koneksi berhasil";

// // Sekarang Anda dapat menjalankan kueri SQL Anda di sini menggunakan mysqli_query() dan fungsi-fungsi lainnya

// // Misalnya:
// $sql = "SELECT * FROM t_siswa";
// $result = mysqli_query($conn, $sql);

// // Periksa hasil kueri
// if (mysqli_num_rows($result) > 0) {
//     // Output data dari setiap baris
//     while ($row = mysqli_fetch_assoc($result)) {
//         echo "ID: " . $row["id"] . " - Nama: " . $row["nama"] . "<br>";
//     }
// } else {
//     echo "Tidak ada hasil";
// }

// // Tutup koneksi
// mysqli_close($conn);
?>