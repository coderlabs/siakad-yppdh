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
	<script src="config/js/ui/jquery.ui.datepicker.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#datepicker" ).datepicker();
		$( "#tabs" ).tabs();
	});
	</script>
</head>
<body>
	<div class="demo">
	<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Input Data Karyawan</a></li>
		<li><a href="#tabs-2">Daftar Karyawan YPP. Darul Huda</a></li>
	</ul>
	<div id="tabs-1">
	<div class="formulir">
		<form method="POST" action="./action.php?opt=karyawan&cmd=input" enctype="multipart/form-data">
			<fieldset>
				<label>Jabatan</label>					<input type="text" name="jabatan" size="40"><br>
				<label>Nama Lengkap</label>			<input type="text" name="nama" size="40"><br>
				<label>Alamat</label>					<input type="text" name="alamat" size="45"><br>
				<label>Telp.</label>						<input type="text" name="telp" title="Bisa Dikosongkan"><br>
				<label>Tempat, Tgl Lahir</label>		<input type="text" name="tmp_lahir" size="15"><input type="text" id="datepicker" size="10" name="tgl_lahir" title="bulan/tgl/tahun"><br>
				<label>Jenis Kelamin</label>			<select name="jk">
					<option value="Laki-laki">Laki-laki</option>
					<option value="Perempuan">Perempuan</option></select><br>
				<label>Foto Karyawan</label>			<input type="file" name="fupload" size="35"><br>
				<label>&nbsp;</label>					<input type="submit" value="Simpan"><br>
			</fieldset>		
		</form>
	</div>
		
	</div>
	<div id="tabs-2">
		<table>
			<tr><th>no</th><th>nama</th><th>jabatan</th><th>aksi</th></tr>
				<?php
				$p      = new Paging;
				$batas  = 10;
				$posisi = $p->cariPosisi($batas);

				$guru = mysql_query("SELECT * FROM karyawan ORDER BY id_karyawan ASC LIMIT $posisi, $batas");
  
				$no = $posisi+1;
				while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama]</td><td>$r[jabatan]</td>
						<td><a href=?opt=karyawan&cmd=update&id=$r[id_karyawan]>Edit</a> | 
						<a href=./action.php?opt=karyawan&cmd=del&id=$r[id_karyawan]>Hapus</a></td></tr>";
					$no++;
				}
				?>
		</table>
		<?php
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM karyawan"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

			echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	</div>
	</div>
	</body>
</html>

<?php
break;

case "update":
$kry=mysql_query("SELECT * FROM karyawan WHERE id_karyawan='$_GET[id]'");
$t=mysql_fetch_array($kry);

echo "<form method=POST action=./action.php?opt=karyawan&cmd=update enctype=multipart/form-data>
				<input type=hidden name=id value=$t[id_karyawan]><table>
					<tr><td>Foto Karyawan</td>		<td><img src='foto_guru/$t[gambar]' width='176' height='220'></td></tr>
					<tr><td>Jabatan</td>			<td><input type=text name=jabatan value='$t[jabatan]'></td></tr>
					<tr><td>Nama</td>			<td><input type=text name=nama size=40 value='$t[nama]'></td></tr>
					<tr><td>Alamat</td>			<td><input type=text name=alamat size=40 value='$t[alamat]'></td></tr>
					<tr><td>Tempat Lahir</td>	<td><input type=text name=tmp_lahir value='$t[tmp_lahir]'></td></tr>
					<tr><td>Tanggal Lahir</td>	<td><input type=text id=datepicker name=tgl_lahir value=$t[tgl_lahir]> *) format bulan/tgl/tahun</td></tr>
					<tr><td>Jenis Kelamin</td>  <td><input type=radio name=jk value=Laki-laki "; if($t[jns_kelamin]=='Laki-laki'){echo "checked";}echo ">Laki-laki<br>
													<input type=radio name=jk value=Perempuan "; if($t[jns_kelamin]=='Perempuan'){echo "checked";}echo ">Perempuan<br></td></tr>
					<tr><td>Ganti Foto</td>		<td><input type=file name=fupload size=50><br></td></tr>
					<tr><td align=right colspan=2><input type=submit value=Perbarui>
						<input type=button value=Batal onclick=self.history.back()></td></tr>
				</table></form>";
break;
}
?>