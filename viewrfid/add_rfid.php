<?php include '../header.php'; ?>

<title>Formulir Pendaftaran</title>
</head>

<div class="container " style=" justify-content: center"><br>

    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header" style="background-color:#007bff;">
                <h3 class="card-title" style="color:white;">Tambah Pendaftaran RFID & Token Bot Telegram</h3>
            </div>
            <input id="rfid_id" type="hidden" class="form-control" name="idcard" placeholder="Id card">
            <div class="card-body">
            <div class="form-group">
                <div class="box-header with-border">
                    <h3 class="box-title">Tempelkan Kartu</h3>
                </div>
                <p class="bg-primary" id="rfid_id2"></p>
                <div class="form-group"><label style="color:red;" id="label1"></div>

            </div><br>
            <div class="form-group">

                <select class="select2" id="nis" name="nis">
                    <option value="0">Pilih Nis Siswa</option>

                </select>
            </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">TelegramBotToken</label>
                    <input type="text" name="token" class="form-control" id="token" placeholder="Input Token ...." required>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputPassword1">chatID </label>
                    <input type="text" class="form-control" id="chatid" name="chatid" placeholder="Input chatID " required>
                </div>
              
            </div>

            <div class="card-footer">
            <div id="message"></div>
            <button id="submitBtn" type="Save" class="btn btn-primary">Submit</button>
            <button id="resetbuton" type="submit" class="btn btn-danger ">Reset</button>
            </div>

        
        </div>
    </div>

</div>
</body>
</html>

<script>
    $(document).ready(function () {

        fetchData(); // Mulai ambil data saat dokumen siap
        // Mengambil daftar NIS Siswa saat halaman dimuat

        $.ajax({
            type: "GET",
            url: "../viewrfid/get_nis.php", // Ganti dengan URL yang sesuai
            success: function (response) {

                $("#nis").append(response);
                $('select').select2({
                    width: '300px' // Atur lebar yang sesuai
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }

        });


        function fetchData() {

            $.ajax({
                url: "../viewrfid/getrfid.php", // Ubah sesuai dengan path ke file PHP
                type: "GET",
                dataType: "json",
                success: function (data) {
                    //    alert(data.no_card);
                    $("#rfid_id").val(data.id); // Set nilai RFID ID pada input hidden
                    $("#rfid_id2").html(data.id); // Set nilai RFID ID pada input hidden
                    $("#label1").html(data.message);
                    $("#label1").html(data.message);
                    // $("#nilai").val(data.cek);
                    var nilai = data.cek;
                    var tombol = $('#submitBtn');

                    if (nilai == "1") {

                        tombol.prop('disabled', true);


                    } else if (nilai == "2") {
                        tombol.prop('disabled', false);

                    }
                    setTimeout(fetchData, 5000); // Panggil kembali setelah 5 detik
                },
                error: function (xhr, status, error) {
                    console.log("Terjadi kesalahan: " + error);
                    setTimeout(fetchData, 5000); // Panggil kembali setelah 5 detik saat terjadi kesalahan
                }
            });


        }

        $("#submitBtn").click(function () {
            var nis = $("#nis").val();
            var idcard = $("#rfid_id").val();
            var token = $("#token").val();
            var chatid = $("#chatid").val();

            if (nis == 0 || idcard === "") {
                $("#message").html('<div style="color: red;">Pilih Nis Terlebih dahulu.</div>');
            } else {
                $.ajax({
                    type: "POST",
                    url: "../viewrfid/save_data.php",
                    data: { nis: nis, idcard: idcard,token: token,chatid: chatid },
                    success: function (response) {
                        $("#message").html(response);
                        window.location.replace("./viewdatarfid.php");
                    }
                });
            }
        });

        $("#resetbuton").click(function () {
            
            if (nis == 0 || idcard === "") {
                $("#message").html('<div style="color: red;">Pilih Nis Terlebih dahulu.</div>');
            } else {
                $.ajax({
                    type: "POST",
                    url: "../viewrfid/reset.php",
                    data: { nis: nis, idcard: idcard,token: token,chatid: chatid },
                    success: function (response) {
                        $("#message").html(response);
                        window.location.replace("./add_rfid.php");
                    }
                });
            }
        });

    });

</script>