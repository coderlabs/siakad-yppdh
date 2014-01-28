<?php
$modul=$_GET[cmd];

switch($modul){
default:
?>

<html lang="en">
<head>
<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.datepicker.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script></head>
<body>
	<div id="demo">
	
	<div class="formulir">
		<form method="POST" action="./action.php?opt=guru&cmd=input" enctype="multipart/form-data">
		<fieldset><legend>.: Biodata Guru :.</legend>
			<label>Tingkat</label>				<select name="tingkat">
				<option value="tk">TK</option>
				<option value="mi">MI</option>
				<option value="mts">MTs</option>
				<option value="ma">MA</option></select><br>
			<label>Status</label>				<select name="status">
				<option value="GTT">GTT</option>
				<option value="GTY">GTY</option>
				<option value="PNS">PNS</option></select><br>
			<label>NIP</label>					<input type="text" name="nip"><br>
			<label>Nama Lengkap</label>		<input type="text" name="nama" size="40"><br>
			<label>Alamat</label>				<input type="text" name="alamat" size="50"><br>
			<label>Telp.</label>					<input type="text" name="telp" size="15" title="Bisa Dikosongkan"><br>
			<label>Tempat, Tgl Lahir</label>	<input size="15" type="text" name="tmp_lahir"><input size="10" type="text" id="datepicker" name="tgl_lahir" title="bulan/tgl/tahun"><br>
			<label>Jenis Kelamin</label>		<select name="jk">
				<option value="Laki-laki">Laki-laki</option>
				<option value="Perempuan">Perempuan</option></select><br>
			<label>Foto Guru</label>			<input type="file" name="fupload" size="40" title="Ukuran foto 176 x 220 pixel"><br>
			<label>&nbsp;</label>				 <input type="submit" value="Simpan">
		</fieldset>		
		</form>
	</div>
	
	</div>
	</body>
</html>

<?php
break;

/*=======================================Guru TK==============================================*/
case "tk":
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
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Guru TK YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<table><tr><th>no</th><th>nip</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT nip,nama_guru FROM guru_tk ORDER BY nip LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[nip]</td><td>$r[nama_guru]</td>
				<td><a href=?opt=guru&cmd=update&lv=tk&id=$r[nip]>Edit</a> | 
				<a href=./action.php?opt=guru&lv=tk&cmd=del&id=$r[nip]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru_tk"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id=Paging2>$linkHalaman</div>";
	?>
	</div>
	</div>
	</div>
</body>
</html>
<?php
break;

/*=======================================Guru MI==============================================*/
case "mi":
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
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Guru MI YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<table><tr><th>no</th><th>nip</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT nip,nama_guru FROM guru_mi ORDER BY nip LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[nip]</td><td>$r[nama_guru]</td>
				<td><a href=?opt=guru&cmd=update&lv=mi&id=$r[nip]>Edit</a> | 
				<a href=./action.php?opt=guru&lv=mi&cmd=del&id=$r[nip]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru_mi"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id=Paging2>$linkHalaman</div>";
	?>
	</div>
	</div>
	</div>
</body>
</html>
<?php
break;

/*=======================================Guru MTs==============================================*/
case "mts":
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
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Guru MTs YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<table><tr><th>no</th><th>nip</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT nip,nama_guru FROM guru_mts ORDER BY nip LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[nip]</td><td>$r[nama_guru]</td>
				<td><a href=?opt=guru&cmd=update&lv=mts&id=$r[nip]>Edit</a> | 
				<a href=./action.php?opt=guru&lv=mts&cmd=del&id=$r[nip]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru_mts"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id=Paging2>$linkHalaman</div>";
	?>
	</div>
	</div>
	</div>
</body>
</html>
<?php
break;

/*=======================================Guru MA==============================================*/
case "ma":
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
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Guru MA YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<table><tr><th>no</th><th>nip</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT nip,nama_guru FROM guru_ma ORDER BY nip LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[nip]</td><td>$r[nama_guru]</td>
				<td><a href=?opt=guru&cmd=update&lv=ma&id=$r[nip]>Edit</a> | 
				<a href=./action.php?opt=guru&lv=ma&cmd=del&id=$r[nip]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM guru_ma"));
	$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
	$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

	echo "<div id=Paging2>$linkHalaman</div>";
	?>
	</div>
	</div>
	</div>
</body>
</html>
<?php
break;

/*=======================================Update Guru ==============================================*/
case "update":

$tingkat=$_GET[lv];

$edit=mysql_query("SELECT * FROM guru_".$tingkat." WHERE nip='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<form method=POST action=./action.php?opt=guru&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$r[nip]><input type=hidden name=tingkat value=$tingkat>
	<table>
		<tr><td>Foto Guru</td>		<td><img src='foto_guru/$r[gambar]' width='176' height='220'></td></tr>
		<tr><td>Status</td>		<td><select name=status>
			<option value=GTT "; if($r[status]=='GTT'){echo "selected";} echo">GTT</option>
			<option value=GTY "; if($r[status]=='GTY'){echo "selected";} echo">GTY</option>
			<option value=PNS "; if($r[status]=='PNS'){echo "selected";} echo">PNS</option></select></td></tr>
		<tr><td>NIP</td>			<td><input type=text name=nip size=40 value='$r[nip]'></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$r[nama_guru]'></td></tr>
		<tr><td>Alamat</td>			<td><input type=text name=alamat size=70 value='$r[alamat]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp size=15 value='$r[telp]'></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$r[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$r[tgl_lahir]'></td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($r[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($r[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
break;
}
?>