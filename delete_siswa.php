<?php
include 'koneksi.php';
$NIS = $_GET["NIS"];
$query = "delete from siswa where NIS='$NIS'";
mysqli_query($connection, $query);
header("location:tabel_siswa.php"); 