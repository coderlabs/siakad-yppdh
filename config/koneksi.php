<?php
$server="localhost";
$user="root";
$pass="keong"; 
$db="mawad";

mysql_connect($server,$user,$pass) or die("Koneksi gagal");
mysql_select_db($db) or die ("Database tidak bisa dibuka / tidak ada");
?>
