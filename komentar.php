<?php
include "config/koneksi.php";

$nama=$_POST['nama'];
$komen=$_POST['komentar'];
$tgl=date("d-m-Y H:i:s");

$sql=mysql_query("INSERT INTO tamu(nama, komentar, tanggal) VALUES('$nama','$komen','$tgl')");
						
header('location:index.php');
?>