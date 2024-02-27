<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pembayaran SPP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    input.form-control {
        padding-left: 2.5em;
    }

    textarea.form-control {
        padding-left: 2.5em;
        padding-top: 5%;
    }

    .input-field {
        position: relative;
    }

    .input-field .material-icons {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 10px;
    }

    .input-icon {
        position: absolute;
        left: 0.5em;
        top: 50%;
        transform: translateY(-50%);
    }
</style>

<body>
    <nav class="navbar navbar-light bg-light" style="height:100px; border-bottom: 2px solid lightskyblue">
        <div class="container-fluid justify-content-center">
            <h1><a class="navbar-brand" style="font-weight:900; font-style:normal" href="#">Aplikasi Pembayaran SPP</a></h1>
        </div>
    </nav>

    <div class="container-fluid" style="padding-right:30%; padding-left:30%;">
        <?php
        // Include file koneksi.php
        include 'koneksi.php';
        // Deklarasi variabel untuk pesan kesalahan dan berhasil
        $errors = "";
        $berhasil = "";

        // Cek apakah tombol 'kirim' telah ditekan
        if (isset($_POST['kirim'])) {
            // Ambil nilai dari form
            $id_pembayaran = $_POST['id_pembayaran'];
            $id_petugas = $_POST['id_petugas'];
            $NIS = $_POST['NIS'];
            $tgl_bayar = $_POST['tgl_bayar'];
            $jumlah_bayar = $_POST['jumlah_bayar'];

            // Lakukan validasi jika diperlukan

            // Buat pesan berhasil
            $berhasil .= "<div class='alert alert-success'>Berhasil mengirim bayar</div>";

            // Jika tidak ada pesan kesalahan
            if (empty($errors)) {
                // Lakukan query untuk memasukkan data ke dalam database
                $input = mysqli_query($connection, "INSERT INTO pembayaran (id_pembayaran,id_petugas,NIS,tgl_bayar,jumlah_bayar) VALUES ('$id_pembayaran', '$id_petugas', '$NIS', '$tgl_bayar', '$jumlah_bayar')");


            }
        }
        ?>
        <br>
        <br>
        <?php echo $errors ?>

        <!-- Form untuk mengirim data pembayaran -->
        <form action="bayar_siswa.php" method="POST">
            <div class="d-flex justify-content-center">
                <h4 style="color:purple;">FORM BAYAR</h4>
            </div>
            <div class="row">
                <div class="col s12">
                    <!-- Input untuk id_pembayaran -->
                    <div class="mb-3 mt-4 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="id_pembayaran" type="text" placeholder="Id Pembayaran" required>
                    </div>
                    <!-- Input untuk id_petugas -->
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="id_petugas" type="text" placeholder="Id Petugas" required>
                    </div>
                    <!-- Input untuk NIS -->
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <label for="subjects">NIS</label>
                                    <select name="NIS" style="width:160px;">
                                        <?php
                                        include "koneksi.php";
                                        //query menampilkan nama unit kerja ke dalam combobox
                                        $query    =mysqli_query($connection, "SELECT * FROM siswa GROUP BY NIS ORDER BY NIS");
                                        while ($data = mysqli_fetch_array($query)) {
                                        ?>
                                        <option value="<?=$data['NIS'];?>"><?php echo $data['NIS'];?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                    </div>
                    <!-- Input untuk tgl_bayar -->
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="tgl_bayar" type="date" placeholder="Tgl Bayar" required>
                    </div>
                    <!-- Input untuk jumlah_bayar -->
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="jumlah_bayar" type="text" placeholder="Jumlah Bayar" required>
                    </div>
                    <!-- Tombol untuk mengirim -->
                    <div class="d-flex" style="justify-content:space-between;">
                        <button type="submit" name="kirim" style="width: 250px;" class="btn btn-primary">KIRIM</button>
                        <button type="reset" style="width: 250px;" class="btn btn-danger">RESET</button>
                    </div>
                    <!-- Link untuk melihat pembayaran lainnya -->
                    <div class="d-flex justify-content-center mt-3">
                        <a href="tabel_bayar.php" class="bt-3" style="color:blue;">Lihat bayar lainnya</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>

</html>
