

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aplikasi Pembayaran SPP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- main CSS -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        background-color: white;
    }

    .data-table-list {
        border: 2px solid lightskyblue;
        border-radius: 5px;
    }

    tr {
        border-color: lightskyblue;
    }

    .table.dataTable.no-footer {
        border-bottom: 1px solid lightskyblue;
    }

    .bg-light {
        background-color: #f5faff !important;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f5faff !important;
    }
</style>

<body>
    <nav class="navbar navbar-light bg-light " style="height:100px; border-bottom: 2px solid lightskyblue">
        <div class="container-fluid justify-content-center" style="position:absolute;">
            <h1> <a class="navbar-brand" style="font-weight:900; font-style:normal" href="#">TABEL PEMBAYARAN</a> </h1>
        </div>
          <div class="container-fluid" style="justify-content:right; margin-top:auto;">
            <form action="halaman_admin.php" method="post">
              <button type="submit" class="btn btn-primary">Home</button>
            </form>
          </div>
    </nav>
    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <?php
            include 'koneksi.php';
            $result = mysqli_query($connection, "SELECT * FROM pembayaran");
            ?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2></h2>

                            <form action="" align="left" method="post">
                                cari berdasarkan :
                                <select name="pilih">
                                    <option value="id_pembayaran">Id Pembayaran</option>
                                    <option value="id_petugas">Id Petugas</option>
                                    <option value="NIS">NIS</option>
                                    <option value="tgl_bayar">Tgl Bayar</option>
                                    <option value="jumlah_bayar">Jumlah Bayar</option>
                                </select>
                                <input type="text" name="textcari" size="24" />
                                <input type="submit" name="cari" value="cari" />
                                <input type="submit" name="semua" value="tampilkan semua" />
                              
                            </form>
                            <br>
                            <table class="table table-bordered table-striped table-striped">
                                <p></p>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Pembayaran</th>
                                        <th>Id Petugas</th>
                                        <th>NIS</th>
                                        <th>Tgl Bayar</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody> 

                                    <?php
                                    include 'koneksi.php';
                                    $input = "";
                                    if (isset($_POST["cari"])) {
                                        $opsi = $_POST["pilih"];
                                        $id_pembayaran = $_POST["textcari"];
                                        $input = mysqli_query($connection, "SELECT * from pembayaran WHERE $opsi like '%$id_pembayaran%'");
                                    } else {
                                        $input = mysqli_query($connection, "SELECT * from pembayaran");
                                    }

                                    $no = 1;
                                    foreach ($input as $row) {

                                        echo "<tr>";
                                        echo "<td align='center'>$no</td>";
                                        echo "<td>" . $row['id_pembayaran'] . "</td>";
                                        echo "<td>" . $row['id_petugas'] . "</td>";
                                        echo "<td>" . $row['NIS'] . "</td>";
                                        echo "<td>" . $row['tgl_bayar'] . "</td>";
                                        echo "<td>" . $row['jumlah_bayar'] . "</td>";

                                        echo "<td>";
                                        echo "<a href='update_bayar.php?id_pembayaran=$row[id_pembayaran]'><button type='button' class='btn btn-outline-primary my-1'>Update</button></a>";

                                        echo "<a href='delete_bayar.php?id_pembayaran=$row[id_pembayaran]'><button type='button' class='btn btn-outline-primary my-1'>Delete</button></a>";


                                        "</td>";
                                        echo "</tr>";
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Data Table area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer area-->
    <!-- jquery -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS -->
    <script src="js/bootstrap.min.js"></script>
    <!-- main JS -->
    <script src="js/main.js"></script>
</body>

</html>
