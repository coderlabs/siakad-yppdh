<?php
include "config/koneksi.php";
$total=0;
$tampil=mysql_query("SELECT * FROM poll");
while($ans=mysql_fetch_array($tampil))
  {
   $total=$total+$ans[counter];
  }
//now display results
echo "<table border=0 cellpadding=5>";
$hasil=mysql_query("SELECT * FROM poll");
while($ans6=mysql_fetch_array($hasil)){
    if($total>0){
		$imagewidth=(100*$ans6[counter])/$total;
		echo "<tr><td>$ans6[jawaban]</td><td><img src='pollpic.gif' height='5' width='$imagewidth' border='0'> ($imagewidth %)</td></tr>";
      } 
	}
	echo "</table><br>Total votes: $total<br>";
?>