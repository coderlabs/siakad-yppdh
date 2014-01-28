<?php
include "config/koneksi.php";

$return_arr=array();

$tmp=mysql_query("SELECT id_siswa FROM siswa_ma WHERE id_siswa LIKE '".$_GET[term]."%' LIMIT 7");
while($r=mysql_fetch_array($tmp, MYSQL_ASSOC)){
$row_arr[value]=$r[id_siswa];
array_push($return_arr, $row_arr);
}
echo json_encode($return_arr);
?>