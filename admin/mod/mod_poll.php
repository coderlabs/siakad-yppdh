<?php
switch($_GET[cmd]){
default:
echo "<h2>Tulis Judul Polling</h2>
<form method=post action=./action.php?opt=judulpoll&cmd=update><table>
<tr><td>Tulis pertanyaan untuk polling :</td></tr>
<tr><td><input type=text name=judul size=50><input type=submit value=Simpan></td></tr></table></form>";
echo "<h2>Tuliskan Jawaban Polling</h2>
<form method=post action=./action.php?opt=poll&cmd=input><table>
<tr><td>Tulis jawaban untuk polling :</td></tr>
<tr><td><input type=text name=poll size=50><input type=submit value=Simpan></td></tr></table></form>";

$hh=mysql_query("SELECT * FROM judulpoll");
$m=mysql_fetch_array($hh);
echo "<h2>Data Polling</h2>
<table><tr><td>Judul Polling : $m[judul]</td></tr></table>";
echo "<table><th>No.</th><th>Jawaban</th><th>Suara</th><th>Aksi</th>";
$no=1;
$jj=mysql_query("SELECT * FROM poll");
while($mo=mysql_fetch_array($jj)){
echo "<tr><td>$no</td><td>$mo[jawaban]</td><td>$mo[counter]</td>
<td><a href=?opt=poll&cmd=update&id=$mo[id_poll]>Edit</a> | 
	<a href=./action.php?opt=poll&cmd=del&id=$mo[id_poll]>Hapus</a></tr>";
$no++;
}
echo "</table>";
break;

case "update":

echo "<h2>Data Polling</h2>";
$fl=mysql_query("SELECT * FROM poll WHERE id_poll='$_GET[id]'");
$rb=mysql_fetch_array($fl);
echo "<form method=post action=./action.php?opt=poll&cmd=update>
<input type='hidden' name='id' value='$rb[id_poll]'><table>
<tr><td>Ganti jawaban untuk polling :</td></tr>
<tr><td><input type=text name=poll value='$rb[jawaban]'><input type=text name=count value='$rb[counter]'>
<input type=submit value=Simpan></td></tr></table></form><input type=button value=Batal onclick=self.history.back()>";
break;
}
?>