<?php
include "config/koneksi.php";

$return_arr=array();

$tmp=mysql_query("SELECT nama_matpel FROM matpel_mts WHERE nama_matpel LIKE '".$_GET[term]."%' LIMIT 4");
while($r=mysql_fetch_array($tmp, MYSQL_ASSOC)){
$row_arr[value]=$r[nama_matpel];
array_push($return_arr, $row_arr);
}
echo json_encode($return_arr);
?>