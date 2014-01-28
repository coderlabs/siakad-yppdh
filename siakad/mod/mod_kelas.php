<?php
switch($_GET[cmd]){
default:
?>
<html lang="en">
<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
</head>
<body>
	<div class="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Kelas</a></li>
	</ul>
	<div id="tabs-1">
		<form method="POST" action="./action.php?opt=kelas&cmd=input"><table>
				<tr><td>Kelas</td><td><input type="text" name="kelas"> *) Isi dengan angka</td></tr>
				<tr><td>Subkelas/Jurusan</td><td><input type="text" name="subkelas"></td></tr>
				<tr><td>Tingkat</td>		<td><select name="tingkat">
					<option value="tk">TK</option>
					<option value="mi">MI</option>
					<option value="mts">MTs</option>
					<option value="ma">MA</option>
				</select></td></tr>
				<tr><td align="right" colspan="2"><input type="submit" value="Tambah"></td></tr>
			</table></form>
			
			<table>
				<tr><th>no</th><th>Kelas</th><th>Subkelas/Jurusan</th><th>Tingkat</th><th>aksi</th></tr>
					<?php
						$ang = mysql_query("SELECT * FROM kelas ORDER BY kelas,subkelas");
						$no=1;
						while($ss=mysql_fetch_array($ang)){
							echo "<tr><td>$no</td><td>$ss[kelas]</td><td>$ss[subkelas]</td><td>$ss[tingkat]</td>
							<td><a href=?opt=kelas&cmd=update&id=$ss[id_kelas]>Edit</a> | 
							<a href=./action.php?opt=kelas&cmd=del&id=$ss[id_kelas]>Hapus</a></td></tr>";
							$no++;
						}
					?>
				</table>
	</div>
	
	</div>
	</div>
	</body>
</html>

<?php
break;

case "update":

$kry=mysql_query("SELECT * FROM kelas WHERE id_kelas='$_GET[id]'");
$t=mysql_fetch_array($kry);
echo "<form method=POST action=./action.php?opt=kelas&cmd=update>
				<input type=hidden name=id value=$t[id_kelas]><table>
					<tr><td>Kelas</td><td><input type=text name=kelas value='$t[kelas]'> *) Isi dengan angka</td></tr>
					<tr><td>Subkelas/Jurusan</td><td><input type=text name=subkelas value='$t[subkelas]'></td></tr>
					<tr><td align=right colspan=2><input type=submit value=Perbarui>
						<input type=button value=Batal onclick=self.history.back()></td></tr>
				</table></form>";
				
break;
}
?>	