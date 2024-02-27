<?php
include 'koneksi.php';
if (isset($_POST["ok"])) {
    $NIS = $_POST["NIS"];
    $nama = $_POST["nama"];
    $id_kelas = $_POST["id_kelas"];

    // Perbaiki kueri UPDATE, hapus tanda koma setelah '$id_kelas'
    $input = mysqli_query($connection, "UPDATE siswa SET nama='$nama', id_kelas='$id_kelas' WHERE NIS='$NIS'");
    if ($input) {
        header("location:tabel_siswa.php");
    } else {
        // Tambahkan pesan kesalahan jika kueri gagal dieksekusi
        echo "Error: " . mysqli_error($connection);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    <title></title>
</head>
<style>
    * {
        font-family: Roboto, sans-serif;
    }

    body {
        background: white;
        /* background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(kantor.jpg); */
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
    }
    label {
        color: black;
    }
    input.form-control {
        padding-left: 2.5em;
        /* Ruang untuk ikon di sebelah kiri input */
    }
    textarea.form-control {
        padding-left: 2.5em;
        padding-top: 5%;
        /* Ruang untuk ikon di sebelah kiri input */
    }
    .input-field {
      position: relative;
    }

    .input-field .material-icons {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      left: 10px; /* Sesuaikan posisi ikon */
    }

    .input-icon {
        position: absolute;
        left: 0.5em;
        /* Posisi ikon di sebelah kiri input */
        top: 50%;
        transform: translateY(-50%);
    }
    .tanggal::-webkit-input-placeholder {
    color: red; /* Ganti warna placeholder sesuai keinginan Anda */
    font-style: italic; /* Ganti gaya teks placeholder sesuai keinginan Anda */
    /* Tambahkan properti CSS lainnya sesuai kebutuhan Anda */
    }
</style>

<body class="text-black">
       <!-- As a link -->
       <nav class="navbar navbar-light bg-light" style="height:100px; border-bottom: 2px solid lightskyblue">
        <div class="container-fluid justify-content-center">
            <h1> <a class="navbar-brand" style="font-weight:900; font-style:normal" href="#">APLIKASI PEMBAYARAN SPP</a> </h1>
        </div>
    </nav>

    <h3 class="text-center mt-5" style="color: #8acaff">Update Tabel Siswa</h3>
    <div class="container">
        <?php
    if(isset($_GET['NIS'])){
        $NIS =$_GET['NIS'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
    include 'koneksi.php';
    $no = 1;
    $update    =mysqli_query($connection, "SELECT * FROM siswa WHERE NIS='$NIS'");
    foreach ($update as $row) {
?>
        <div class="row justify-content-center">
            <div class="col-5">

                   <form action="" method="POST" class="mt-4">
                    <div class="mb-3 mt-4 input-field">
                    <input type="text" name="NIS" class="form-control" placeholder="NIS" readonly value="<?php echo $row['NIS'];?>">
                    </div>         
                     <div class="mb-3 mt-4 input-field">
                     <input type="text" name="nama" class="form-control" placeholder="nama" value="<?php echo $row['nama'];?>">
                    </div>                     
                    <div class="mb-3 mt-4 input-field">
                    <input type="text" class="form-control" name="id_kelas" value="<?php echo $row['id_kelas']; ?>" >
                    </div>
                    <div class="mb-3 mt-4 d-flex" style="justify-content:space-between; padding-left:20px; padding-right:20px;">
                        <input type="submit" name="ok" class="btn btn-primary btn-pill" value="simpan">
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>