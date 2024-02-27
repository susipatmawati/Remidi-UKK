<?php
include 'koneksi.php';
$id_kelas = $_GET["id_kelas"];
$query = "delete from kelas where id_kelas='$id_kelas'";
mysqli_query($connection, $query);
header("location:tabel_kelas.php"); 