<?php
session_start();
include "config/koneksi.php";

$nama=trim($_POST[nama_komentar]);
$komentar=trim($_POST[isi_komentar]);

if (empty($nama)){
  echo "Anda belum mengisikan NAMA<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (empty($komentar)){
  echo "Anda belum mengisikan KOMENTAR<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
elseif (strlen($_POST[isi_komentar]) > 1000) {
  echo "Komentar anda lebih dari 1000 karakter. Ulangi dan persingkat komentar Anda.<br />
  	      <a href=javascript:history.go(-1)><b>Ulangi Lagi</b>";
}
else{
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$nama_komentar = antiinjection($_POST[nama_komentar]);
$isi_komentar = antiinjection($_POST[isi_komentar]);

// Mengatasi input komentar tanpa spasi
$split_text = explode(" ",$isi_komentar);
$split_count = count($split_text);
$max = 57;

for($i = 0; $i <= $split_count; $i++){
if(strlen($split_text[$i]) >= $max){
for($j = 0; $j <= strlen($split_text[$i]); $j++){
$char[$j] = substr($split_text[$i],$j,1);
if(($j % $max == 0) && ($j != 0)){
  $v_text .= $char[$j] . ' ';
}else{
  $v_text .= $char[$j];
}
}
}else{
  $v_text .= " " . $split_text[$i] . " ";
}
}
$tgl_sekarang = date("Ymd");
$jam_sekarang = date("H:i:s");
$modul=$_POST[modul];
$idnya=$_POST[id];
$sql = mysql_query("INSERT INTO komentar(nama_komentar,isi_komentar,id_news,tgl,jam_komentar) 
                    VALUES('$nama_komentar','$v_text','$_POST[id]','$tgl_sekarang','$jam_sekarang')");
header('location:media.php?opt='.$modul.'&id='.$idnya);
}
?>
