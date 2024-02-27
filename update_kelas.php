<?php
include 'koneksi.php';
if (isset($_POST["ok"])) {
    $id_kelas = $_POST["id_kelas"];
    $nama_kelas = $_POST["nama_kelas"];
    $kompetensi_keahlian = $_POST["kompetensi_keahlian"];

    $input = mysqli_query($connection, "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'");

    if ($input) {
        // Jika pembaruan berhasil, arahkan kembali ke halaman tabel_kelas.php
        header("location:tabel_kelas.php");
        exit(); // Penting: Pastikan tidak ada output lain sebelum header() dipanggil
    } else {
        // Jika terjadi kesalahan saat melakukan pembaruan
        echo "Gagal melakukan pembaruan. Error: " . mysqli_error($connection);
    }
}

// Script HTML dan PHP untuk menampilkan formulir pembaruan data
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
    <title>Update Tabel Kelas</title>
    <style>
        /* CSS Anda di sini */
    </style>
</head>

<body class="text-black">
    <!-- Navbar Anda di sini -->
    <h3 class="text-center mt-5" style="color: #8acaff">Update Tabel Kelas</h3>
    <div class="container">
        <?php
        if (isset($_GET['id_kelas'])) {
            $id_kelas = $_GET['id_kelas'];
        } else {
            die("Error. No ID Selected!");
        }
        $update = mysqli_query($connection, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'");
        if ($row = mysqli_fetch_assoc($update)) {
        ?>
            <div class="row justify-content-center">
                <div class="col-5">
                    <form action="" method="POST" class="mt-4">
                        <div class="mb-3 mt-4 input-field">
                            <input type="text" name="id_kelas" class="form-control" placeholder="id_kelas" value="<?php echo $row['id_kelas']; ?>" readonly>
                        </div>
                        <div class="mb-3 mt-4 input-field">
                            <input type="text" name="nama_kelas" class="form-control" placeholder="nama_kelas" value="<?php echo $row['nama_kelas']; ?>">
                        </div>
                        <div class="mb-3 mt-4 input-field">
                            <input type="text" class="form-control" name="kompetensi_keahlian" value="<?php echo $row['kompetensi_keahlian']; ?>">
                        </div>
                        <div class="mb-3 mt-4 d-flex" style="justify-content:space-between; padding-left:20px; padding-right:20px;">
                            <input type="submit" name="ok" class="btn btn-primary btn-pill" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        <?php
        } else {
            echo "Data tidak ditemukan!";
        }
        ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
</body>

</html>
