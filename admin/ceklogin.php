<?php
include "../config/koneksi.php";

$cari=mysql_query("SELECT * FROM web_admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
$ketemu=mysql_num_rows($cari);
$r=mysql_fetch_array($cari);

if ($ketemu > 0){
  session_start();
  session_register("namauser");
  session_register("passuser");

  $_SESSION[namauser] = $r[username];
  $_SESSION[passuser] = $r[password];
  header('location:media.php?opt=home');
}
else{
  echo "<center>Login gagal! username & password tidak benar<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>