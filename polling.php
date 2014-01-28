<?php
include "config/koneksi.php";
$s=$_SERVER["REMOTE_ADDR"];
$cekip=mysql_query("SELECT * FROM ip_user WHERE ip='$s'");
$ss=mysql_num_rows($cekip);
if($ss > 0){
	echo "<center>Anda sudah memberi suara pada polling ini.<br>";
	$total=0;
	$ans=mysql_query("SELECT * FROM poll");
	while($ans3=mysql_fetch_array($ans)){
		$total=$total+$ans3[counter];
	}
	//hasilnya
	$hasil=mysq_query("SELECT * FROM poll");
	while($ans6=mysql_fetch_array($hasil)){
		if($total>0){
			$imagewidth=(100*$ans6[counter])/$total;
			$imagewidth = number_format($imagewidth, 1, '.', '');
			echo "<img src='pollpic.gif' height='5' width='$imagewidth' border='0'>$ans6[answer]($imagewidth %)<br>";
		} 
		else{ echo "No votes have been cast yet";}
	}
	echo "Total votes: $total";
	echo "<a href=index.php>Kembali</a></center>";
}
else{
mysql_query("INSERT INTO user_ip(ip) VALUES ('$s')");
mysql_query("UPDATE poll SET counter=counter+1 WHERE jawaban='$_POST[pilihan]'");
header('location:index.php');
}
?>