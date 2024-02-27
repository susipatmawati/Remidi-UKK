

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Aplikasi Pembayaran SPP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<style>
	body{
		background-color: white;
	}
	.data-table-list{
		border: 2px solid  lightskyblue;
		border-radius:5px;
	}
  tr{
    border-color: lightskyblue;
  }
  .table.dataTable.no-footer{
    border-bottom: 1px solid lightskyblue;
  }
  .bg-light{
    background-color: #f5faff!important;
  }
  .table-striped>tbody>tr:nth-of-type(odd){
    background-color: #f5faff!important;
  }
</style>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

	<nav class="navbar navbar-light bg-light " style="height:100px; border-bottom: 2px solid lightskyblue">
        <div class="container-fluid justify-content-center" style="position:absolute;">
            <h1> <a class="navbar-brand" style="font-weight:900; font-style:normal" href="#">TABEL KELAS</a> </h1>
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
			$result = mysqli_query($connection, "SELECT * FROM kelas");
			?>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2></h2>
                           
<form action="" align="left" method="post">
    cari berdasarkan :
    <select name="pilih">
        <option value="id_kelas">Id Kelas</option>
        <option value="nama_kelas">Nama Kelas</option>
        <option value="kompetensi_keahlian">Kompetensi Keahlian</option>
    </select>
    <input type="text" name="textcari" size="24" />
    <input type="submit" name="cari" value="cari" />
    <input type="submit" name="semua" value="tampilkan semua" />
    <input type="hidden" name="selected_column" value="<?php echo isset($_POST['pilih']) ? $_POST['pilih'] : 'id_kelas'; ?>">
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
                                        <th>Id Kelas</th>
                                        <th>Nama Kelas</th>
                                        <th>Kompetensi Keahlian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php
                                include 'koneksi.php';
      $input="";
        if (isset($_POST["cari"])){
          $opsi=$_POST["pilih"];
          $id_kelas=$_POST["textcari"];
          $input=mysqli_query($connection, "SELECT * from kelas WHERE $opsi like '%$id_kelas%'");
        }else{
          $input = mysqli_query($connection, "SELECT * from kelas");
}


                                 $no = 1;
                                foreach ($input as $row) {
                                
                                   echo "<tr>";
                                   echo "<td align='center'>$no</td>";
                                       echo "<td>" . $row['id_kelas'] . "</td>";
                                       echo "<td>" . $row['nama_kelas'] . "</td>";
                                       echo "<td>" . $row['kompetensi_keahlian'] . "</td>";
                                       echo "<td>"; 
                                                  echo "<a href='update_kelas.php?id_kelas=$row[id_kelas]'><button type='button' class='btn btn-outline-primary my-1'>Update</button></a>"; 

                                                  echo "<a href='delete_kelas.php?id_kelas=$row[id_kelas]'><button type='button' class='btn btn-outline-primary my-1'>Delete</button></a>";

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
    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>