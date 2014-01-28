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
		<form method="POST" action="./action.php?opt=siswa&cmd=input" enctype="multipart/form-data">
		<fieldset><legend>.: Biodata Siswa :.</legend>
		<label>Tingkat</label>				<select name="tingkat">
			<option value="tk" selected="selected">TK</option>
			<option value="mi">MI</option>
			<option value="mts">MTs</option>
			<option value="ma">MA</option></select><br>
		<label>Angkatan</label>				<select name="angkatan">
			<?php
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($r=mysql_fetch_array($agk)){
					echo "<option value='$r[th_ajar]'>$r[th_ajar]</option>";
				}
			?></select><br>
		<label>NISN</label>					<input type="text" name="nisn"><br>
		<label>No. Ijazah</label>			<input type="text" name="ijazah" size="40"><br>
		<label>Sekolah Asal</label>		<input type="text" name="asal_sekolah" size="40"><br>
		<label>NIS</label>					<input type="text" name="nis" size="10"><br>
		<label>Nama Lengkap</label>		<input type="text" name="nama" size="40"><br>
		<label>Alamat</label>				<input type="text" name="alamat" size="50"><br>
		<label>Rute Rumah</label>			<textarea name="denah" rows="5" cols="50"></textarea><br>
		<label>No. Telp</label>				<input type="text" name="telp" size="15"><br>
		<label>Tempat, Tgl Lahir</label>	<input size="15" type="text" name="tmp_lahir"><input size="10" type="text" id="datepicker" name="tgl_lahir" title="bulan/tgl/tahun"><br>
		<label>Jenis Kelamin</label>		<select name="jk">
			<option value="Laki-laki" selected="selected">Laki-laki</option>
			<option value="Perempuan">Perempuan</option></select><br>
		<label>Anak Ke-</label>				<input type="text" name="anak" size="5" title="Isi Dengan Angka"><br>
		<label>Status keluarga</label>	<select name="sk">
			<option value="Anak Kandung" selected="selected">Anak Kandung</option>
			<option value="Anak Angkat">Anak Angkat</option></select><br>
		<label>Foto Siswa</label>			<input type="file" name="fupload" size="40" title="Ukuran foto 176 x 220 pixel"> <br>
		<label>Password</label>				<input type="text" name="password" title="Maksimal 20 karakter"><br>
	</fieldset>
	<fieldset><legend>.: Biodata Orang Tua (Wajib Diisi) :.</legend>
		<label>Nama Ayah</label>	<input type="text" name="nama_ayah" size="40"><br>
		<label>Pekerjaan</label>	<input type="text" name="kerja_ayah" size="40"><br>
		<label>Alamat</label>		<input type="text" name="alamat_ayah" size="40"><br>
		<label>Telp.</label>			<input type="text" name="telp_ayah" size="15" title="Bisa dikosongkan"><br>
		<label>Nama Ibu</label>		<input type="text" name="nama_ibu" size="40"><br>
		<label>Pekerjaan</label>	<input type="text" name="kerja_ibu" size="40"><br>
		<label>Alamat</label>		<input type="text" name="alamat_ibu" size="40"><br>
		<label>Telp.</label>			<input type="text" name="telp_ibu" size="15" title="Bisa dikosongkan"><br>
	</fieldset>
	<fieldset><legend>.: Biodata Wali (Bisa Dikosongkan) :.</legend>
		<label>Nama Wali</label>	<input type="text" name="nama_wali" size="40"><br>
		<label>Pekerjaan</label>	<input type="text" name="kerja_wali" size="40"><br>
		<label>Alamat</label>		<input type="text" name="alamat_wali" size="40"><br>
		<label>Telp.</label>			<input type="text" name="telp_wali" size="15" title="Bisa dikosongkan"><br>
		<label>&nbsp;</label>		<input type="submit" value="Simpan"><br>
	</fieldset>
	</form>
	</div>
	
	</div>
	</body>
</html>

<?php
break;

/*=======================================Siswa TK==============================================*/
case "tk":
?>
<html lang="en">
<head>
<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_tk.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Siswa TK YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<form method="post" action="?opt=siswa&lv=tk&cmd=cek">
		<label>NIS</label> <input type="text" id="tags" name="nis"><input type="submit" value="Cari"></form><br>
		<table><tr><th>no</th><th>angkatan</th><th>nis</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT angkatan,id_siswa,nama_siswa FROM siswa_tk ORDER BY angkatan, id_siswa LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[angkatan]</td><td>$r[id_siswa]</td><td>$r[nama_siswa]</td>
				<td><a href=?opt=siswa&cmd=update&lv=tk&id=$r[id_siswa]>Edit</a> | 
				<a href=./action.php?opt=siswa&lv=tk&cmd=del&id=$r[id_siswa]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siswa_tk"));
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

/*=======================================Siswa MI==============================================*/
case "mi":
?>
<html lang="en">
<head>
<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_mi.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Siswa MI YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<form method="post" action="?opt=siswa&lv=mi&cmd=cek">
		<label>NIS</label><input type="text" id="tags" name="nis"><input type="submit" value="Cari"></form>
		<br><table><tr><th>no</th><th>angkatan</th><th>nis</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT angkatan,id_siswa,nama_siswa FROM siswa_mi ORDER BY angkatan, id_siswa LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[angkatan]</td><td>$r[id_siswa]</td><td>$r[nama_siswa]</td>
				<td><a href=?opt=siswa&cmd=update&lv=mi&id=$r[id_siswa]>Edit</a> | 
				<a href=./action.php?opt=siswa&lv=mi&cmd=del&id=$r[id_siswa]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siswa_mi"));
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

/*=======================================Siswa MTs==============================================*/
case "mts":
?>
<html lang="en">
<head>
<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_mts.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Siswa MTs YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<form method="post" action="?opt=siswa&lv=mts&cmd=cek">
		<label>NIS</label><input type="text" id="tags" name="nis"><input type="submit" value="Cari"></form>
		<br><table><tr><th>no</th><th>angkatan</th><th>nis</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT angkatan,id_siswa,nama_siswa FROM siswa_mts ORDER BY angkatan, id_siswa LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[angkatan]</td><td>$r[id_siswa]</td><td>$r[nama_siswa]</td>
				<td><a href=?opt=siswa&cmd=update&lv=mts&id=$r[id_siswa]>Edit</a> | 
				<a href=./action.php?opt=siswa&lv=mts&cmd=del&id=$r[id_siswa]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siswa_mts"));
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

/*=======================================Siswa MA==============================================*/
case "ma":
?>
<html lang="en">
<head>
<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_ma.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script></head>
<body>
	<div id="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Siswa MA YPP Darul Huda</a></li>
		</ul>
	<div id="tabs-1">
		<form method="post" action="?opt=siswa&lv=ma&cmd=cek">
		<label>NIS</label> <input type="text" id="tags" name="nis"><input type="submit" value="Cari"></form>
		<br><table><tr><th>no</th><th>angkatan</th><th>nis</th><th>nama</th><th>aksi</th></tr>
	<?php
	$p      = new Paging2;
	$batas  = 20;
	$posisi = $p->cariPosisi($batas);
	$siswa = mysql_query("SELECT angkatan,id_siswa,nama_siswa FROM siswa_ma ORDER BY angkatan, id_siswa LIMIT $posisi,$batas");  
	$no = $posisi+1;
	while($r=mysql_fetch_array($siswa)){
		echo "<tr><td>$no</td><td>$r[angkatan]</td><td>$r[id_siswa]</td><td>$r[nama_siswa]</td>
				<td><a href=?opt=siswa&cmd=update&lv=ma&id=$r[id_siswa]>Edit</a> | 
				<a href=./action.php?opt=siswa&lv=ma&cmd=del&id=$r[id_siswa]>Hapus</a></td></tr>";
			$no++;
		}
	?>
	</table>
	<?php
	$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siswa_ma"));
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

/*=======================================Update Siswa TK==============================================*/
case "update":

$tingkat=$_GET[lv];

if($tingkat=='tk'){
$edit=mysql_query("SELECT * FROM siswa_tk WHERE id_siswa='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<form method=POST action=./action.php?opt=siswa&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$r[id_siswa]><input type=hidden name=tingkat value=$tingkat>
	<table>
		<tr><td>Angkatan</td>		<td><select name=angkatan>";
			
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($rp=mysql_fetch_array($agk)){
					echo "<option value='$rp[th_ajar]'>$rp[th_ajar]</option>";
				}
			echo "</select></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$r[nama_siswa]'></td></tr>
		<tr><td>Alamat</td>		<td><input type=text name=alamat size=60 value='$r[alamat]'></td></tr>
		<tr><td>Rute / Denah</td>	<td><textarea name=denah rows=5 cols=60>$r[denah]</textarea></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$r[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$r[tgl_lahir]'></td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($r[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($r[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		<tr><td>Anak Ke -</td>	<td><input type=text name=anak size=5 value=$r[anak_ke]></td></tr>
		<tr><td>Status Keluarga</td>		<td><input type=radio name=sk value='Anak Kandung' ";if($r[status_anak]=='Anak Kandung'){echo "checked";} echo">Anak Kandung<br>
														<input type=radio name=sk value='Anak Angkat'";if($r[status_anak]=='Anak Angkat'){echo "checked";} echo">Anak Angkat<br></td></tr>
		<tr><td>Nama Ayah</td>			<td><input type=text name=nama_ayah size=40 value='$r[nama_ayah]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ayah size=40 value='$r[kerja_ayah]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ayah size=40 value='$r[almt_ayah]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ayah size=15 value='$r[telp_ayah]'></td></tr>
		<tr><td>Nama Ibu</td>			<td><input type=text name=nama_ibu size=40 value='$r[nama_ibu]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ibu size=40 value='$r[kerja_ibu]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ibu size=40 value='$r[almt_ibu]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ibu size=15 value='$r[telp_ibu]'></td></tr>
		<tr><td>Nama Wali</td>			<td><input type=text name=nama_wali size=40 value='$r[nama_wali]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_wali size=40 value='$r[kerja_wali]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_wali size=40 value='$r[almt_wali]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_wali size=15 value='$r[telp_wali]'></td></tr>
		<tr><td>Foto Siswa</td>			<td><img src='foto_siswa/$r[gambar]' width='176' height='220'></td></tr>
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40></td></tr>
		<tr><td>Password</td>			<td><input type=text name=password size=40 value='$r[password]'></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
/*=======================================Update Siswa MA===========================================*/
else if($tingkat=='ma'){
$edit=mysql_query("SELECT * FROM siswa_ma WHERE id_siswa='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<form method=POST action=./action.php?opt=siswa&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$r[id_siswa]><input type=hidden name=tingkat value=$tingkat>
	<table>
		<tr><td>Angkatan</td>		<td><select name=angkatan>";
			
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($rp=mysql_fetch_array($agk)){
					echo "<option value='$rp[th_ajar]'>$rp[th_ajar]</option>";
				}
			echo "</select></td></tr>
		<tr><td>NISN</td>			<td><input type=text name=nisn size=40 value='$r[nisn]'></td></tr>
		<tr><td>No. Ijazah</td>			<td><input type=text name=ijazah size=40 value='$r[no_ijazah]'></td></tr>
		<tr><td>Asal Sekolah</td>	<td><input type=text name=asal_sekolah size=40 value='$r[asal_sekolah]'></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$r[nama_siswa]'></td></tr>
		<tr><td>Alamat</td>		<td><input type=text name=alamat size=60 value='$r[alamat]'></td></tr>
		<tr><td>Rute / Denah</td>	<td><textarea name=denah rows=5 cols=60>$r[denah]</textarea></td></tr>
		<tr><td>No. Telp</td>		<td><input type=text name=telp size=40 value='$r[telp]'></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$r[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$r[tgl_lahir]'> *) format bulan/tanggal/tahun</td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($r[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($r[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		<tr><td>Anak Ke -</td>	<td><input type=text name=anak size=5 value=$r[anak_ke]></td></tr>
		<tr><td>Status Keluarga</td>		<td><input type=radio name=sk value='Anak Kandung' ";if($r[status_anak]=='Anak Kandung'){echo "checked";} echo">Anak Kandung<br>
														<input type=radio name=sk value='Anak Angkat'";if($r[status_anak]=='Anak Angkat'){echo "checked";} echo">Anak Angkat<br></td></tr>
		<tr><td>Nama Ayah</td>			<td><input type=text name=nama_ayah size=40 value='$r[nama_ayah]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ayah size=40 value='$r[kerja_ayah]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ayah size=40 value='$r[almt_ayah]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ayah size=15 value='$r[telp_ayah]'></td></tr>
		<tr><td>Nama Ibu</td>			<td><input type=text name=nama_ibu size=40 value='$r[nama_ibu]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ibu size=40 value='$r[kerja_ibu]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ibu size=40 value='$r[almt_ibu]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ibu size=15 value='$r[telp_ibu]'></td></tr>
		<tr><td>Nama Wali</td>			<td><input type=text name=nama_wali size=40 value='$r[nama_wali]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_wali size=40 value='$r[kerja_wali]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_wali size=40 value='$r[almt_wali]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_wali size=15 value='$r[telp_wali]'></td></tr>
		<tr><td>Foto Siswa</td>		<td><img src='foto_siswa/$r[gambar]'></td></tr>
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40>  *) Ukuran foto 176 x 220 pixel</td></tr>
		<tr><td>Password</td>			<td><input type=text name=password size=40 value='$r[password]'></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
/*=======================================Update Siswa MI & MTs=======================================*/
else {
$edit=mysql_query("SELECT * FROM siswa_".$tingkat." WHERE id_siswa='$_GET[id]'");
$r=mysql_fetch_array($edit);

echo "<form method=POST action=./action.php?opt=siswa&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$r[id_siswa]><input type=hidden name=tingkat value=$tingkat>
	<table>
		<tr><td>Angkatan</td>		<td><select name=angkatan>";
			
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($rp=mysql_fetch_array($agk)){
					echo "<option value='$rp[th_ajar]'>$rp[th_ajar]</option>";
				}
			echo "</select></td></tr>
		<tr><td>NISN</td>			<td><input type=text name=nisn size=40 value='$r[nisn]'></td></tr>
		<tr><td>No. Ijazah</td>			<td><input type=text name=ijazah size=40 value='$r[no_ijazah]'></td></tr>
		<tr><td>Asal Sekolah</td>	<td><input type=text name=asal_sekolah size=40 value='$r[asal_sekolah]'></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$r[nama_siswa]'></td></tr>
		<tr><td>Alamat</td>		<td><input type=text name=alamat size=60 value='$r[alamat]'></td></tr>
		<tr><td>Rute / Denah</td>	<td><textarea name=denah rows=5 cols=60>$r[denah]</textarea></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$r[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$r[tgl_lahir]'> *) format bulan/tanggal/tahun</td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($r[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($r[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		<tr><td>Anak Ke -</td>	<td><input type=text name=anak size=5 value=$r[anak_ke]></td></tr>
		<tr><td>Status Keluarga</td>		<td><input type=radio name=sk value='Anak Kandung' ";if($r[status_anak]=='Anak Kandung'){echo "checked";} echo">Anak Kandung<br>
														<input type=radio name=sk value='Anak Angkat'";if($r[status_anak]=='Anak Angkat'){echo "checked";} echo">Anak Angkat<br></td></tr>
		<tr><td>Nama Ayah</td>			<td><input type=text name=nama_ayah size=40 value='$r[nama_ayah]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ayah size=40 value='$r[kerja_ayah]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ayah size=40 value='$r[almt_ayah]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ayah size=15 value='$r[telp_ayah]'></td></tr>
		<tr><td>Nama Ibu</td>			<td><input type=text name=nama_ibu size=40 value='$r[nama_ibu]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ibu size=40 value='$r[kerja_ibu]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ibu size=40 value='$r[almt_ibu]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ibu size=15 value='$r[telp_ibu]'></td></tr>
		<tr><td>Nama Wali</td>			<td><input type=text name=nama_wali size=40 value='$r[nama_wali]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_wali size=40 value='$r[kerja_wali]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_wali size=40 value='$r[almt_wali]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_wali size=15 value='$r[telp_wali]'></td></tr>
		<tr><td>Foto Siswa</td>		<td><img src='foto_siswa/$r[gambar]'></td></tr>
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40>  *) Ukuran foto 176 x 220 pixel</td></tr>
		<tr><td>Password</td>			<td><input type=text name=password size=40 value='$fth[password]'></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
break;
/*====================================Pencarian Siswa==============================================*/
case "cek":
$lvl=$_GET[lv];

$sql=mysql_query("SELECT * FROM siswa_".$lvl." WHERE id_siswa='$_POST[nis]'");
$fth=mysql_fetch_array($sql);

if($lvl=='tk'){
echo "<form method=POST action=./action.php?opt=siswa&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$fth[id_siswa]><input type=hidden name=tingkat value=$lvl>
	<table>
		<tr><td>Angkatan</td>		<td><select name=angkatan>";
			
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($rp=mysql_fetch_array($agk)){
					echo "<option value='$rp[th_ajar]'>$rp[th_ajar]</option>";
				}
			echo "</select></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$fth[nama_siswa]'></td></tr>
		<tr><td>Alamat</td>		<td><input type=text name=alamat size=60 value='$fth[alamat]'></td></tr>
		<tr><td>Rute / Denah</td>	<td><textarea name=denah rows=5 cols=60>$fth[denah]</textarea></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$fth[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$fth[tgl_lahir]'></td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($fth[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($fth[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		<tr><td>Anak Ke -</td>	<td><input type=text name=anak size=5 value=$fth[anak_ke]></td></tr>
		<tr><td>Status Keluarga</td>		<td><input type=radio name=sk value='Anak Kandung' ";if($fth[status_anak]=='Anak Kandung'){echo "checked";} echo">Anak Kandung<br>
														<input type=radio name=sk value='Anak Angkat'";if($fth[status_anak]=='Anak Angkat'){echo "checked";} echo">Anak Angkat<br></td></tr>
		<tr><td>Nama Ayah</td>			<td><input type=text name=nama_ayah size=40 value='$fth[nama_ayah]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ayah size=40 value='$fth[kerja_ayah]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ayah size=40 value='$fth[almt_ayah]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ayah size=15 value='$fth[telp_ayah]'></td></tr>
		<tr><td>Nama Ibu</td>			<td><input type=text name=nama_ibu size=40 value='$fth[nama_ibu]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ibu size=40 value='$fth[kerja_ibu]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ibu size=40 value='$fth[almt_ibu]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ibu size=15 value='$fth[telp_ibu]'></td></tr>
		<tr><td>Nama Wali</td>			<td><input type=text name=nama_wali size=40 value='$fth[nama_wali]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_wali size=40 value='$fth[kerja_wali]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_wali size=40 value='$fth[almt_wali]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_wali size=15 value='$fth[telp_wali]'></td></tr>
		<tr><td>Foto Siswa</td>		<td><img src='foto_siswa/$fth[gambar]' width='176' height='220'></td></tr>
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40></td></tr>
		<tr><td>Password</td>			<td><input type=text name=password size=40 value='$fth[password]'></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
else if($lvl=='ma'){
echo "<form method=POST action=./action.php?opt=siswa&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$fth[id_siswa]><input type=hidden name=tingkat value=$lvl>
	<table>
		<tr><td>Angkatan</td>		<td><select name=angkatan>";
			
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($rp=mysql_fetch_array($agk)){
					echo "<option value='$rp[th_ajar]'>$rp[th_ajar]</option>";
				}
			echo "</select></td></tr>
		<tr><td>NISN</td>			<td><input type=text name=nisn size=40 value='$fth[nisn]'></td></tr>
		<tr><td>No. Ijazah</td>			<td><input type=text name=ijazah size=40 value='$fth[no_ijazah]'></td></tr>
		<tr><td>Asal Sekolah</td>	<td><input type=text name=asal_sekolah size=40 value='$fth[asal_sekolah]'></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$fth[nama_siswa]'></td></tr>
		<tr><td>Alamat</td>		<td><input type=text name=alamat size=60 value='$fth[alamat]'></td></tr>
		<tr><td>Rute / Denah</td>	<td><textarea name=denah rows=5 cols=60>$fth[denah]</textarea></td></tr>
		<tr><td>No. Telp</td>		<td><input type=text name=telp size=40 value='$fth[telp]'></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$fth[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$fth[tgl_lahir]'> *) format bulan/tanggal/tahun</td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($fth[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($fth[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		<tr><td>Anak Ke -</td>	<td><input type=text name=anak size=5 value=$fth[anak_ke]></td></tr>
		<tr><td>Status Keluarga</td>		<td><input type=radio name=sk value='Anak Kandung' ";if($fth[status_anak]=='Anak Kandung'){echo "checked";} echo">Anak Kandung<br>
														<input type=radio name=sk value='Anak Angkat'";if($fth[status_anak]=='Anak Angkat'){echo "checked";} echo">Anak Angkat<br></td></tr>
		<tr><td>Nama Ayah</td>			<td><input type=text name=nama_ayah size=40 value='$fth[nama_ayah]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ayah size=40 value='$fth[kerja_ayah]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ayah size=40 value='$fth[almt_ayah]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ayah size=15 value='$fth[telp_ayah]'></td></tr>
		<tr><td>Nama Ibu</td>			<td><input type=text name=nama_ibu size=40 value='$fth[nama_ibu]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ibu size=40 value='$fth[kerja_ibu]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ibu size=40 value='$fth[almt_ibu]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ibu size=15 value='$fth[telp_ibu]'></td></tr>
		<tr><td>Nama Wali</td>			<td><input type=text name=nama_wali size=40 value='$fth[nama_wali]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_wali size=40 value='$fth[kerja_wali]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_wali size=40 value='$fth[almt_wali]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_wali size=15 value='$fth[telp_ayah]'></td></tr>
		<tr><td>Foto Siswa</td>		<td><img src='foto_siswa/$fth[gambar]'></td></tr>
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40>  *) Ukuran foto 176 x 220 pixel</td></tr>
		<tr><td>Password</td>			<td><input type=text name=password size=40 value='$fth[password]'></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
else{
echo "<form method=POST action=./action.php?opt=siswa&cmd=update enctype=multipart/form-data>
	<input type=hidden name=id value=$fth[id_siswa]><input type=hidden name=tingkat value=$lvl>
	<table>
		<tr><td>Angkatan</td>		<td><select name=angkatan>";
			
				$agk=mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC LIMIT 3");
				while($rp=mysql_fetch_array($agk)){
					echo "<option value='$rp[th_ajar]'>$rp[th_ajar]</option>";
				}
			echo "</select></td></tr>
		<tr><td>NISN</td>			<td><input type=text name=nisn size=40 value='$fth[nisn]'></td></tr>
		<tr><td>No. Ijazah</td>			<td><input type=text name=ijazah size=40 value='$fth[no_ijazah]'></td></tr>
		<tr><td>Asal Sekolah</td>	<td><input type=text name=asal_sekolah size=40 value='$fth[asal_sekolah]'></td></tr>
		<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$fth[nama_siswa]'></td></tr>
		<tr><td>Alamat</td>		<td><input type=text name=alamat size=60 value='$fth[alamat]'></td></tr>
		<tr><td>Rute / Denah</td>	<td><textarea name=denah rows=5 cols=60>$fth[denah]</textarea></td></tr>
		<tr><td>Tempat, Tgl Lahir</td>	<td><input size=15 type=text name=tmp_lahir value='$fth[tmp_lahir]'>
											<input size=10 type=text id=datepicker name=tgl_lahir value='$fth[tgl_lahir]'> *) format bulan/tanggal/tahun</td></tr>
		<tr><td>Jenis Kelamin</td>		<td><input type=radio name=jk value='Laki-laki'";if($fth[jns_kelamin]=='Laki-laki'){echo "checked";} echo">Laki-laki<br>
													<input type=radio name=jk value='Perempuan'"; if($fth[jns_kelamin]=='Perempuan'){echo "checked";} echo">Perempuan<br></td></tr>
		<tr><td>Anak Ke -</td>	<td><input type=text name=anak size=5 value=$fth[anak_ke]></td></tr>
		<tr><td>Status Keluarga</td>		<td><input type=radio name=sk value='Anak Kandung' ";if($fth[status_anak]=='Anak Kandung'){echo "checked";} echo">Anak Kandung<br>
														<input type=radio name=sk value='Anak Angkat'";if($fth[status_anak]=='Anak Angkat'){echo "checked";} echo">Anak Angkat<br></td></tr>
		<tr><td>Nama Ayah</td>			<td><input type=text name=nama_ayah size=40 value='$fth[nama_ayah]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ayah size=40 value='$fth[kerja_ayah]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ayah size=40 value='$fth[almt_ayah]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ayah size=15 value='$fth[telp_ayah]'></td></tr>
		<tr><td>Nama Ibu</td>			<td><input type=text name=nama_ibu size=40 value='$fth[nama_ibu]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_ibu size=40 value='$fth[kerja_ibu]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_ibu size=40 value='$fth[almt_ibu]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_ibu size=15 value='$fth[telp_ibu]'></td></tr>
		<tr><td>Nama Wali</td>			<td><input type=text name=nama_wali size=40 value='$fth[nama_wali]'></td></tr>
		<tr><td>Pekerjaan</td>			<td><input type=text name=kerja_wali size=40 value='$fth[kerja_wali]'></td></tr>
		<tr><td>Alamat</td>				<td><input type=text name=alamat_wali size=40 value='$fth[almt_wali]'></td></tr>
		<tr><td>No. Telp</td>			<td><input type=text name=telp_wali size=15 value='$fth[telp_ayah]'></td></tr>
		<tr><td>Foto Siswa</td>		<td><img src='foto_siswa/$fth[gambar]'></td></tr>
		<tr><td>Ganti Foto</td>			<td><input type=file name=fupload size=40>  *) Ukuran foto 176 x 220 pixel</td></tr>
		<tr><td>Password</td>			<td><input type=text name=password size=40 value='$fth[password]'></td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui>
			<input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
break;
}
?>