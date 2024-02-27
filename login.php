<?php
session_start();

// Aktifkan error reporting untuk membantu debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($connection, $_POST["username"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);

    $sql = "SELECT id_petugas, username, password FROM petugas WHERE username = '$username'";
    $result = $connection->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verifikasi password, Anda mungkin perlu menyesuaikan ini sesuai dengan cara penyimpanan password di database
            if ($password == $row["password"]) {
                $_SESSION["username"] = $username;
                $_SESSION["user_id"] = $row["id_petugas"];
                header("location: halaman_admin.php");
                exit;
            } else {
                $error = "Kata sandi salah";
            }
        } else {
            $error = "Pengguna tidak ditemukan";
        }
    } else {
        $error = "Error dalam eksekusi query: " . $connection->error;
    }
}

$connection->close();
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

    <h3 class="text-center mt-5" style="color: #8acaff">Login Petugas</h3>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-5">
            <?php
// Tampilkan pesan kesalahan jika ada
if (!empty($error)) {
    echo "<div class='alert alert-danger'>$error</div>";
}
?>
                <form action="" method="POST" class="mt-4" autocomplete="off">
                    <div class="mb-3 mt-4 input-field">
                        
                        <input type="text" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="mb-3 mt-4 input-field">
                       
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="mb-3 mt-4 d-flex" style="justify-content:space-between; padding-left:20px; padding-right:20px;">
                        <button style="width: 200px;" class="btn btn-primary">Masuk</button>
                        <button type="cancel" style="width: 200px;" class="btn btn-danger">Batal</button>
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