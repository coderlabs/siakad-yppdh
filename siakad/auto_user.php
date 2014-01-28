<?php
include "config/koneksi.php";

$return_arr=array();

$tmp=mysql_query("SELECT s.id_siswa, g.id_guru FROM siswa s, guru g WHERE id_siswa LIKE '".$_GET[term]."%' OR id_guru LIKE '".$_GET[term]."%' LIMIT 7");
while($r=mysql_fetch_array($tmp, MYSQL_ASSOC)){
$row_arr[value]=$r[id_siswa];
$row_arr[value]=$r[id_guru];
array_push($return_arr, $row_arr);
}
echo json_encode($return_arr);
?>