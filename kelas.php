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
        include 'koneksi.php';
        // $NISError = "";
        $errors = "";
        $berhasil = "";
        

        if (isset($_POST['kirim'])) {
            $id_kelas = $_POST['id_kelas'];
            $nama_kelas = $_POST['nama_kelas'];
            $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

         
                $berhasil .= "<div class='alert alert-success'> Berhasil mengirim kelas </div>";

                // if(empyt($))
                if(empty($errors)) {
                $input = mysqli_query($connection, "INSERT INTO kelas (id_kelas,nama_kelas,kompetensi_keahlian) VALUES ('$id_kelas', '$nama_kelas', '$kompetensi_keahlian')");
                $inputkelas = mysqli_query($connection, "INSERT INTO kelas(id_kelas,nama_kelas,kompetensi_keahlian) VALUES('$id_kelas', '$nama_kelas', '$kompetensi_keahlian')");

                if ($input && $inputkelas) {
                    echo $berhasil;
                } else {
                    echo $errors;
                }
            }
                //     echo "Gagal mengirim kelas";
            }
        //     }
        // }
        ?>
        <br>
        <br>
        <?php echo $errors ?>
        <br>
        <br>
        <?php echo $errors ?>

        <form action="kelas.php" method="POST" autocomplete="off">
            <div class="d-flex justify-content-center">
                <h4 style="color:purple;">FORM KELAS</h4>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="mb-3 mt-4 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="id_kelas" type="text" placeholder="Id kelas" required>
                    </div>
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="nama_kelas" type="text" placeholder="Nama Kelas" required>
                    </div>
                    <div class="mb-3 mt-2 input-field">
                        <i class="material-icons prefix"></i>
                        <input class="form-control" name="kompetensi_keahlian" type="text" placeholder="Kompetensi Keahlian" required>
                    </div>
                    <div class="d-flex" style="justify-content:space-between;">
                        <button type="submit" name="kirim" style="width: 250px;" class="btn btn-primary">KIRIM</button>
                        <button type="reset" style="width: 250px;" class="btn btn-danger">RESET</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <a href="tabel_kelas.php" class="bt-3" style="color:blue;">Lihat kelas lainnya</a>
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
