<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $data = array(
    //     "idcard" => $_POST["idcard"],
    //     "nis" => $_POST["nis"]
    // );
    $idcard = $_POST["idcard"];
    $nis = $_POST["nis"];
    $token =  str_replace(' ', '', $_POST['token']);
    $chatid =  str_replace(' ', '', $_POST['chatid']);
    // $token =array_map($_POST["token"]);
    // $chatid = $_POST["chatid"];
    require '../db_connect.php';


    $sql = "INSERT INTO t_rfid (nis, no_rfid,token,chatid) VALUES ('$nis','$idcard','$token','$chatid')";


    // print_r($sql);
    // die();

    // Update status data siswa yang sudah terdaftar jika nilai status 1 terdaftar , jika 0 belum terdaftar
    if ($conn->query($sql) === TRUE) {
        $sql2 = "UPDATE t_siswa SET status = '1' WHERE nis = '$nis'";

        // echo $sql2;AA
        if ($conn->query($sql2) === True) {
            echo "Tabel t_siswa berhasil di abdate.";
        } else {
            echo "Gagal Update "; /*  */
        }
        $truncateQuery = "TRUNCATE TABLE history_rfid";
        if ($conn->query($truncateQuery) === TRUE) {
            echo "Tabel histori berhasil dikosongkan.";
        } else {
            echo "Gagal mengosongkan tabel histori: ";
        }
        echo '<div style="color: green;">Opsi dan Nama telah dipilih dan disimpan ke database.</div>';
    } else {
        echo '<div style="color: red;">Terjadi kesalahan saat menyimpan data</div>';
    }

    $conn->close();

}
?>