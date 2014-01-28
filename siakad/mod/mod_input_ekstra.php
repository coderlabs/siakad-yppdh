<?php
switch($_GET[cmd]){
default:
?>

<html>
<head>
	
</head>
<body>
	<div class="formulir">
		<form method="POST" action="?opt=input_ekstra&cmd=cek">
			<fieldset><label>Kegiatan</label> <select name="ekstra"><?php
			if($_SESSION[tingkat]=='tk'){
				$kls=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='tk' AND nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_ekstra]>$x[nama_ekstra]</option>";
				}
			}
			if($_SESSION[tingkat]=='mi'){
				$kls=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='mi' AND nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_ekstra]>$x[nama_ekstra]</option>";
				}
			}
			if($_SESSION[tingkat]=='mts'){
				$kls=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='mts' AND nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_ekstra]>$x[nama_ekstra]</option>";
				}
			}
			if($_SESSION[tingkat]=='ma'){
				$kls=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='ma' AND nama_guru='".$_SESSION[nama_user]."'");
				while($x=mysql_fetch_array($kls)){
					echo "<option value=$x[nama_ekstra]>$x[nama_ekstra]</option>";
				}
			}
		?></select><input type="submit" value="Mulai"><br>
		</fieldset></form>
	</div><br>
</body>
</html>

<?php
break;

case "cek":
$mp=$_POST[ekstra];
if($_SESSION[tingkat]=='tk'){
	$ft=mysql_query("SELECT nama_ekstra FROM ekstra_tk WHERE nama_ekstra='$mp'");

	$bn=mysql_fetch_array($ft);

	echo "<h3>.:: Nilai Ekstra $mp ::.</h3><hr><form method=POST action=./action.php?opt=input_ekstra&cmd=input>
	<input type=hidden name=tingkat value=tk><input type=hidden name=ekstra value=$bn[nama_ekstra]>
	<table><th>no</th><th>nama</th><th>nilai (Isi dengan huruf)</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM ekstra_tk n, siswa_tk s 
					WHERE n.nama_ekstra='$bn[nama_ekstra]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
/*================================================ mi =======================================*/
if($_SESSION[tingkat]=='mi'){
	$ft=mysql_query("SELECT nama_ekstra FROM ekstra_mi WHERE nama_ekstra='$mp'");

	$bn=mysql_fetch_array($ft);

	echo "<h3>.:: Nilai Ekstra $mp ::.</h3><hr><form method=POST action=./action.php?opt=input_ekstra&cmd=input>
	<input type=hidden name=tingkat value=mi><input type=hidden name=ekstra value=$bn[nama_ekstra]>
	<table><th>no</th><th>nama</th><th>nilai (Isi dengan huruf)</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM ekstra_mi n, siswa_mi s 
					WHERE n.nama_ekstra='$bn[nama_ekstra]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
/*================================================ mts =======================================*/
if($_SESSION[tingkat]=='mts'){
	$ft=mysql_query("SELECT nama_ekstra FROM ekstra_mts WHERE nama_ekstra='$mp'");

	$bn=mysql_fetch_array($ft);

	echo "<h3>.:: Nilai Ekstra $mp ::.</h3><hr><form method=POST action=./action.php?opt=input_ekstra&cmd=input>
	<input type=hidden name=tingkat value=mts><input type=hidden name=ekstra value=$bn[nama_ekstra]>
	<table><th>no</th><th>nama</th><th>nilai (Isi dengan huruf)</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM ekstra_mts n, siswa_mts s 
					WHERE n.nama_ekstra='$bn[nama_ekstra]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
/*================================================ ma =======================================*/
if($_SESSION[tingkat]=='ma'){
	$ft=mysql_query("SELECT nama_ekstra FROM ekstra_ma WHERE nama_ekstra='$mp'");

	$bn=mysql_fetch_array($ft);

	echo "<h3>.:: Nilai Ekstra $mp ::.</h3><hr><form method=POST action=./action.php?opt=input_ekstra&cmd=input>
	<input type=hidden name=tingkat value=ma><input type=hidden name=ekstra value=$bn[nama_ekstra]>
	<table><th>no</th><th>nama</th><th>nilai (Isi dengan huruf)</th>";
	$no=1;
	$sql=mysql_query("SELECT s.nama_siswa,n.id_siswa, n.nilai 
					FROM ekstra_ma n, siswa_ma s 
					WHERE n.nama_ekstra='$bn[nama_ekstra]' AND s.id_siswa=n.id_siswa");
	while($gf=mysql_fetch_array($sql)){
		echo "<tr><td>$no</td><td><input type=hidden name=sw$no value='$gf[id_siswa]'>$gf[nama_siswa]</td>
		<td><input type=text name=nilai$no value='$gf[nilai]' size=2></td></tr>";
		$no++;
	}
	$jmlSw=$no-1;
	echo "</table><br><input type=hidden name=n value=$jmlSw><input type=submit value=Simpan></form>";
}
break;
}
?>