<?php
$modul=$_GET[cmd];

switch($modul){
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
	</script>
</head>
<body>
	<div class="demo">
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Kurikulum Siswa TK</a></li>
		</ul>
	<div id="tabs-1">
		<form method="POST" action="./action.php?opt=matpel&cmd=input">
	<input type="hidden" name="tingkat" value="tk"><table>
		<tr><td>Semester</td>		<td><select name="smt">
			<option value="ganjil">Ganjil</option>
			<option value="genap">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name="subkelas">
			<?php
			$sql2=mysql_query("SELECT subkelas FROM kelas WHERE tingkat ='tk'");
			while($ff2=mysql_fetch_array($sql2)) {
			echo "<option value='$ff2[subkelas]'>$ff2[subkelas]</option>";
			}
			?>></select></td></tr>
		<tr><td>Kategori</td>		<td><select name="kategori">
			<option value="umum">Umum</option>
			<option value="mulok">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type="text" name="kode_matpel"></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type="text" name="nama_matpel" size="40"></td></tr>
		<tr><td>KKM</td>	<td><input type="text" name="kkm" size="1"> *) Kriteria Kelulusan Minimal</td></tr>
		<tr><td align="right" colspan="2"><input type="submit" value="Simpan"></td></tr>
	</table></form>
	<table>
		<tr><th>no</th><th>kode matpel</th><th>nama matpel</th><th>Kelas</th><th>tingkat</th><th>Semester</th><th>aksi</th></tr>
			<?php
			$p      = new Paging2;
			$batas  = 10;
			$posisi = $p->cariPosisi($batas);

			$matpel = mysql_query("SELECT * FROM matpel_tk ORDER BY smt,tgk ASC limit $posisi,$batas");
  
			$no = $posisi+1;
			while($r=mysql_fetch_array($matpel)){
				echo "<tr><td>$no</td><td>$r[kode_matpel]</td><td>$r[nama_matpel]</td><td>0</td><td>$r[tgk]</td><td>$r[smt]</td>
						<td><a href=?opt=matpel&lv=tk&cmd=update&id=$r[kode_matpel]>Edit</a> | 
						<a href=./action.php?opt=matpel&lv=tk&cmd=del&id=$r[kode_matpel]>Hapus</a></td></tr>";
				$no++;
			}
			?>
	</table>
	<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM matpel_tk"));
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

		echo "<div id=paging>$linkHalaman<br></div>";
	?>
	</div>	
	</div>
	
	</div>
</body>
</html>

<?php
break;
/*=======================================Kurikulum MI=================================================*/
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
	</script>
</head>
<body>
	<div class="demo">
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Kurikulum Siswa MI</a></li>
		</ul>
	<div id="tabs-1">
		<form method="POST" action="./action.php?opt=matpel&cmd=input">
	<input type="hidden" name="tingkat" value="<?=$modul?>"><table>
		<tr><td>Semester</td>		<td><select name="smt">
			<option value="ganjil">Ganjil</option>
			<option value="genap">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name="kelas">
			<?php
			$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat ='mi'");
			while($ff=mysql_fetch_array($sql)) {
			echo "<option value='$ff[kelas]'>$ff[kelas]</option>";
			}
			?>></select></td></tr>
		<tr><td>Kategori</td>		<td><select name="kategori">
			<option value="umum">Umum</option>
			<option value="mulok">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type="text" name="kode_matpel"></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type="text" name="nama_matpel" size="40"></td></tr>
		<tr><td>KKM</td>	<td><input type="text" name="kkm" size="1"> *) Isi dengan angka.</td></tr>
		<tr><td align="right" colspan="2"><input type="submit" value="Simpan"></td></tr>
	</table></form>
	<table>
		<tr><th>no</th><th>kode matpel</th><th>nama matpel</th><th>Kelas</th><th>Semester</th><th>aksi</th></tr>
			<?php
			$p      = new Paging2;
			$batas  = 10;
			$posisi = $p->cariPosisi($batas);

			$matpel = mysql_query("SELECT * FROM matpel_mi ORDER BY smt,kelas ASC limit $posisi,$batas");
  
			$no = $posisi+1;
			while($r=mysql_fetch_array($matpel)){
				echo "<tr><td>$no</td><td>$r[kode_matpel]</td><td>$r[nama_matpel]</td><td>$r[kelas]</td><td>$r[smt]</td>
						<td><a href=?opt=matpel&lv=mi&cmd=update&id=$r[kode_matpel]>Edit</a> | 
						<a href=./action.php?opt=matpel&lv=mi&cmd=del&id=$r[kode_matpel]>Hapus</a></td></tr>";
				$no++;
			}
			?>
	</table>
	<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM matpel_mi"));
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

		echo "<div id=paging>$linkHalaman<br></div>";
	?>
	</div>	
	</div>
	
	</div>
</body>
</html>

<?php
break;
/*=======================================Kurikulum MTs=================================================*/
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
	</script>
</head>
<body>
	<div class="demo">
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Kurikulum Siswa MTs</a></li>
		</ul>
	<div id="tabs-1">
		<form method="POST" action="./action.php?opt=matpel&cmd=input">
	<input type="hidden" name="tingkat" value="<?=$modul?>"><table>
		<tr><td>Semester</td>		<td><select name="smt">
			<option value="ganjil">Ganjil</option>
			<option value="genap">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name="kelas">
			<?php
			$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat ='mts'");
			while($ff=mysql_fetch_array($sql)) {
			echo "<option value='$ff[kelas]'>$ff[kelas]</option>";
			}
			?></td></tr>
		<tr><td>Kategori</td>		<td><select name="kategori">
			<option value="umum">Umum</option>
			<option value="mulok">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type="text" name="kode_matpel"></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type="text" name="nama_matpel" size="40"></td></tr>
		<tr><td>KKM</td>	<td><input type="text" name="kkm" size="1"> *) Isi dengan angka. </td></tr>
		<tr><td align="right" colspan="2"><input type="submit" value="Simpan"></td></tr>
	</table></form>
	<table>
		<tr><th>no</th><th>kode matpel</th><th>nama matpel</th><th>Kelas</th><th>Semester</th><th>aksi</th></tr>
			<?php
			$p      = new Paging2;
			$batas  = 10;
			$posisi = $p->cariPosisi($batas);

			$matpel = mysql_query("SELECT * FROM matpel_mts ORDER BY smt,kelas ASC limit $posisi,$batas");
  
			$no = $posisi+1;
			while($r=mysql_fetch_array($matpel)){
				echo "<tr><td>$no</td><td>$r[kode_matpel]</td><td>$r[nama_matpel]</td><td>$r[kelas]</td><td>$r[smt]</td>
						<td><a href=?opt=matpel&lv=mts&cmd=update&id=$r[kode_matpel]>Edit</a> | 
						<a href=./action.php?opt=matpel&lv=mts&cmd=del&id=$r[kode_matpel]>Hapus</a></td></tr>";
				$no++;
			}
			?>
	</table>
	<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM matpel_mts"));
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

		echo "<div id=paging>$linkHalaman<br></div>";
	?>
	</div>	
	</div>
	
	</div>
</body>
</html>

<?php
break;
/*=======================================Kurikulum MA=================================================*/
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
	</script>
</head>
<body>
	<div class="demo">
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Kurikulum Siswa MA</a></li>
		</ul>
	<div id="tabs-1">
		<form method="POST" action="./action.php?opt=matpel&cmd=input">
	<input type="hidden" name="tingkat" value="<?=$modul?>"><table>
		<tr><td>Semester</td>		<td><select name="smt">
			<option value="ganjil">Ganjil</option>
			<option value="genap">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name="kelas">
			<?php
			$sql=mysql_query("SELECT DISTINCT kelas FROM kelas WHERE tingkat ='ma' ORDER BY kelas");
			while($ff=mysql_fetch_array($sql)) {
			echo "<option value='$ff[kelas]'>$ff[kelas]</option>";
			}
			?>></select></td></tr>
		<tr><td>Jurusan</td>			<td><select name="jurusan">
			<?php
			$sql1=mysql_query("SELECT DISTINCT subkelas FROM kelas WHERE tingkat ='ma' ORDER BY kelas");
			while($ff1=mysql_fetch_array($sql1)) {
			echo "<option value='$ff1[subkelas]'>$ff1[subkelas]</option>";
			}
			?></select> *) Untuk kelas 10, jurusan tidak penting</td></tr>
		<tr><td>Kategori</td>		<td><select name="kategori">
			<option value="umum">Umum</option>
			<option value="mulok">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type="text" name="kode_matpel"></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type="text" name="nama_matpel" size="40"></td></tr>
		<tr><td>KKM</td>	<td><input type="text" name="kkm" size="1"> *) Isi dengan angka.</td></tr>
		<tr><td align="right" colspan="2"><input type="submit" value="Simpan"></td></tr>
	</table></form>
	<table>
		<tr><th>no</th><th>kode matpel</th><th>nama matpel</th><th>Kelas</th><th>jurusan</th><th>Semester</th><th>aksi</th></tr>
			<?php
			$p      = new Paging2;
			$batas  = 10;
			$posisi = $p->cariPosisi($batas);

			$matpel = mysql_query("SELECT * FROM matpel_ma ORDER BY smt,kelas,jurusan ASC limit $posisi,$batas");
  
			$no = $posisi+1;
			while($r=mysql_fetch_array($matpel)){
				echo "<tr><td>$no</td><td>$r[kode_matpel]</td><td>$r[nama_matpel]</td><td>$r[kelas]</td><td>$r[jurusan]</td><td>$r[smt]</td>
						<td><a href=?opt=matpel&lv=ma&cmd=update&id=$r[kode_matpel]>Edit</a> | 
						<a href=./action.php?opt=matpel&lv=ma&cmd=del&id=$r[kode_matpel]>Hapus</a></td></tr>";
				$no++;
			}
			?>
	</table>
	<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM matpel_ma"));
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

		echo "<div id=paging>$linkHalaman<br></div>";
	?>
	</div>	
	</div>
	
	</div>
</body>
</html>

<?php
break;

case "update":
$ds=$_GET[lv];
/*===========================update tk===========================================*/
if($ds=='tk'){
$sql=mysql_query("SELECT * FROM matpel_tk WHERE kode_matpel=$_GET[id]");
$ccb=mysql_fetch_array($sql);
echo "<form method=POST action=./action.php?opt=matpel&cmd=update>
	<input type=hidden name=tingkat value=$ds><input type=hidden name=id value=$ccb[kode_matpel]><table>
		<tr><td>Semester</td>		<td><select name=smt>
			<option value=ganjil "; if($ccb[smt]=='ganjil'){echo "selected";} echo">Ganjil</option>
			<option value=genap "; if($ccb[smt]=='genap'){echo "selected";} echo">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name=subkelas>
			<option value=Kecil "; if($ccb[tgk]=='Kecil'){echo "selected";} echo">Kecil</option>
			<option value=Besar "; if($ccb[tgk]=='Besar'){echo "selected";} echo">Besar</option></select></td></tr>
		<tr><td>Kategori</td>		<td><select name=kategori>
			<option value=umum "; if($ccb[kategori]=='umum'){echo "selected";} echo">Umum</option>
			<option value=mulok "; if($ccb[kategori]=='mulok'){echo "selected";} echo">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type=text name=kode_matpel value=$ccb[kode_matpel]></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type=text name=nama_matpel size=40 value='$ccb[nama_matpel]'></td></tr>
		<tr><td>KKM</td>	<td><input type=text name=kkm size=1 value=$ccb[kkm]> *) Kriteria Kelulusan Minimal</td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
/*===========================update mi===========================================*/
if($ds=='mi'){
$sql=mysql_query("SELECT * FROM matpel_mi WHERE kode_matpel=$_GET[id]");
$ccb=mysql_fetch_array($sql);
echo "<form method=POST action=./action.php?opt=matpel&cmd=update>
	<input type=hidden name=tingkat value=$ds><input type=hidden name=id value=$ccb[kode_matpel]><table>
		<tr><td>Semester</td>		<td><select name=smt>
			<option value=ganjil "; if($ccb[smt]=='ganjil'){echo "selected";} echo">Ganjil</option>
			<option value=genap "; if($ccb[smt]=='genap'){echo "selected";} echo">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name=kelas>";
			$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat ='mi'");
			while($ff=mysql_fetch_array($sql)) {
			echo "<option value='$ff[kelas]' "; if($ccb[kelas]==$ff[kelas]){echo "selected";} echo">$ff[kelas]</option>";
			}
			echo "</select></td></tr>
		<tr><td>Kategori</td>		<td><select name=kategori>
			<option value=umum "; if($ccb[kategori]=='umum'){echo "selected";} echo">Umum</option>
			<option value=mulok "; if($ccb[kategori]=='mulok'){echo "selected";} echo">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type=text name=kode_matpel value=$ccb[kode_matpel]></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type=text name=nama_matpel size=40 value='$ccb[nama_matpel]'></td></tr>
		<tr><td>KKM</td>	<td><input type=text name=kkm size=1 value=$ccb[kkm]> *) Kriteria Kelulusan Minimal</td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
/*===========================update mts===========================================*/
if($ds=='mts'){
$sql=mysql_query("SELECT * FROM matpel_mts WHERE kode_matpel=$_GET[id]");
$ccb=mysql_fetch_array($sql);
echo "<form method=POST action=./action.php?opt=matpel&cmd=update>
	<input type=hidden name=tingkat value=$ds><input type=hidden name=id value=$ccb[kode_matpel]><table>
		<tr><td>Semester</td>		<td><select name=smt>
			<option value=ganjil "; if($ccb[smt]=='ganjil'){echo "selected";} echo">Ganjil</option>
			<option value=genap "; if($ccb[smt]=='genap'){echo "selected";} echo">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name=kelas>";
			$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat ='mts'");
			while($ff=mysql_fetch_array($sql)) {
			echo "<option value='$ff[kelas]' "; if($ccb[kelas]==$ff[kelas]){echo "selected";} echo">$ff[kelas]</option>";
			}
			echo "</select></td></tr>
		<tr><td>Kategori</td>		<td><select name=kategori>
			<option value=umum "; if($ccb[kategori]=='umum'){echo "selected";} echo">Umum</option>
			<option value=mulok "; if($ccb[kategori]=='mulok'){echo "selected";} echo">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type=text name=kode_matpel value=$ccb[kode_matpel]></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type=text name=nama_matpel size=40 value='$ccb[nama_matpel]'></td></tr>
		<tr><td>KKM</td>	<td><input type=text name=kkm size=1 value=$ccb[kkm]> *) Kriteria Kelulusan Minimal</td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
/*===========================update ma===========================================*/
if($ds=='ma'){
$sql=mysql_query("SELECT * FROM matpel_ma WHERE kode_matpel=$_GET[id]");
$ccb=mysql_fetch_array($sql);
echo "<form method=POST action=./action.php?opt=matpel&cmd=update>
	<input type=hidden name=tingkat value=$ds><input type=hidden name=id value=$ccb[kode_matpel]><table>
		<tr><td>Semester</td>		<td><select name=smt>
			<option value=ganjil "; if($ccb[smt]=='ganjil'){echo "selected";} echo">Ganjil</option>
			<option value=genap "; if($ccb[smt]=='genap'){echo "selected";} echo">Genap</option></select></td></tr>
		<tr><td>Kelas</td>			<td><select name=kelas>";
			$sql=mysql_query("SELECT DISTINCT kelas FROM kelas WHERE tingkat ='ma'");
			while($ff=mysql_fetch_array($sql)) {
			echo "<option value='$ff[kelas]' "; if($ccb[kelas]==$ff[kelas]){echo "selected";} echo">$ff[kelas]</option>";
			}
			echo "</select></td></tr>
		<tr><td>Jurusan</td>			<td><select name=jurusan>";
			$sql1=mysql_query("SELECT DISTINCT subkelas FROM kelas WHERE tingkat ='ma'");
			while($ff1=mysql_fetch_array($sql1)) {
			echo "<option value='$ff1[subkelas]' "; if($ccb[jurusan]==$ff1[subkelas]){echo "selected";} echo">$ff1[subkelas]</option>";
			}
			echo "</select></td></tr>
		<tr><td>Kategori</td>		<td><select name=kategori>
			<option value=umum "; if($ccb[kategori]=='umum'){echo "selected";} echo">Umum</option>
			<option value=mulok "; if($ccb[kategori]=='mulok'){echo "selected";} echo">Mulok</option></select></td></tr>
		<tr><td>Kode Matpel</td>	<td><input type=text name=kode_matpel value=$ccb[kode_matpel]></td></tr>
		<tr><td>Nama Matpel</td>	<td><input type=text name=nama_matpel size=40 value='$ccb[nama_matpel]'></td></tr>
		<tr><td>KKM</td>	<td><input type=text name=kkm size=1 value=$ccb[kkm]> *) Kriteria Kelulusan Minimal</td></tr>
		<tr><td align=right colspan=2><input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>
	</table></form>";
}
break;
}
?>