<?php
switch($_GET[cmd]){
case "guru":
?>
<html>
	<head>
		<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
		<script src="config/js/jquery-1.5.1.js"></script>
		<script src="config/js/ui/jquery.ui.core.js"></script>
		<script src="config/js/ui/jquery.ui.widget.js"></script>
		<script src="config/js/ui/jquery.ui.accordion.js"></script>
		<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
		<script src="config/js/ui/jquery.ui.position.js"></script>
		<link rel="stylesheet" href="config/js/demos.css">
		<script>
	$(function() {
		$( "#tags1" ).autocomplete({
			source: "cari_guru_tk.php",
			minLength: 2			
			});
		$( "#tags2" ).autocomplete({
			source: "cari_guru_mi.php",
			minLength: 2			
			});
		$( "#tags3" ).autocomplete({
			source: "cari_guru_mts.php",
			minLength: 2			
			});
		$( "#tags4" ).autocomplete({
			source: "cari_guru_ma.php",
			minLength: 2			
			});
		$( "#accordion" ).accordion();
	});
	</script>
	</head>
	<body>
		<div id="demo">
		
		<div id="accordion">
			<h3><a href="#">Guru TK</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=user&cmd=input">
			<input type="hidden" name="tingkat" value="tk">
				<label>Nama</label>			<input type="text" name="nama" id="tags1" size="30"><br>
				<label>Username </label>	<input type="text" name="username" title="maksimal 20 karakter"><br>
				<label>Password </label>	<input type="text" name="pass" title="maksimal 20 karakter"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br>
			
			<table>
				<tr><th>no</th><th>Nama</th><th>Aksi</th></tr>
				<?php
					$p      = new Paging2;
					$batas  = 10;
					$posisi = $p->cariPosisi($batas);

					$guru = mysql_query("SELECT * FROM siakad_guru WHERE level='tk' ORDER BY id_user ASC LIMIT $posisi, $batas");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_guru]</td>
						<td><a href=?opt=user&cmd=update&lv=guru&id=$r[id_user]>Edit</a> | 
						<a href=./action.php?opt=user&lv=guru&cmd=del&id=$r[id_user]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			<?php
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siakad_guru WHERE level='tk'"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

			echo "<div id=paging>$linkHalaman</div>";
			?>
			</div>
			<!-- ========================================= Guru MI ================================================ -->
			<h3><a href="#">Guru MI</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=user&cmd=input">
			<input type="hidden" name="tingkat" value="mi">
				<label>Nama</label>			<input type="text" name="nama" id="tags2" size="30"><br>
				<label>Username </label>	<input type="text" name="username" title="maksimal 20 karakter"><br>
				<label>Password </label>	<input type="text" name="pass" title="maksimal 20 karakter"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br>
			<table>
				<tr><th>no</th><th>Nama</th><th>Aksi</th></tr>
				<?php
					$p      = new Paging2;
					$batas  = 10;
					$posisi = $p->cariPosisi($batas);

					$guru = mysql_query("SELECT * FROM siakad_guru WHERE level='mi' ORDER BY id_user ASC LIMIT $posisi, $batas");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_guru]</td>
						<td><a href=?opt=user&cmd=update&lv=guru&id=$r[id_user]>Edit</a> | 
						<a href=./action.php?opt=user&lv=guru&cmd=del&id=$r[id_user]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			<?php
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siakad_guru WHERE level='mi'"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

			echo "<div id=paging>$linkHalaman</div>";
			?>
			</div>
			<!-- ========================================= Guru MTs ================================================ -->
			<h3><a href="#">Guru MTs</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=user&cmd=input">
			<input type="hidden" name="tingkat" value="mts">
				<label>Nama</label>			<input type="text" name="nama" id="tags3" size="30"><br>
				<label>Username </label>	<input type="text" name="username" title="maksimal 20 karakter"><br>
				<label>Password </label>	<input type="text" name="pass" title="maksimal 20 karakter"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br>
			<table>
				<tr><th>no</th><th>Nama</th><th>Aksi</th></tr>
				<?php
					$p      = new Paging2;
					$batas  = 10;
					$posisi = $p->cariPosisi($batas);

					$guru = mysql_query("SELECT * FROM siakad_guru WHERE level='mts' ORDER BY id_user ASC LIMIT $posisi, $batas");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_guru]</td>
						<td><a href=?opt=user&cmd=update&lv=guru&id=$r[id_user]>Edit</a> | 
						<a href=./action.php?opt=user&lv=guru&cmd=del&id=$r[id_user]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			<?php
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siakad_guru WHERE level='mts'"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

			echo "<div id=paging>$linkHalaman</div>";
			?>
			</div>
			<!-- ========================================= Guru MA ================================================ -->
			<h3><a href="#">Guru MA</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=user&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
				<label>Nama</label>			<input type="text" name="nama" id="tags4" size="30"><br>
				<label>Username </label>	<input type="text" name="username" title="maksimal 20 karakter"><br>
				<label>Password </label>	<input type="text" name="pass" title="maksimal 20 karakter"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br>
			<table>
				<tr><th>no</th><th>Nama</th><th>Aksi</th></tr>
				<?php
					$p      = new Paging2;
					$batas  = 10;
					$posisi = $p->cariPosisi($batas);

					$guru = mysql_query("SELECT * FROM siakad_guru WHERE level='ma' ORDER BY id_user ASC LIMIT $posisi, $batas");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_guru]</td>
						<td><a href=?opt=user&cmd=update&lv=guru&id=$r[id_user]>Edit</a> | 
						<a href=./action.php?opt=user&lv=guru&cmd=del&id=$r[id_user]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			<?php
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM siakad_guru WHERE level='ma'"));
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
/*================================================== admin user ============================================*/
case "admin":
$mk=mysql_query("SELECT * FROM siakad_admin");
	$gb=mysql_fetch_array($mk);
	
	echo "<form method=POST action=./action.php?opt=user&cmd=update><input type=hidden name=tingkat value=admin>
	<table><tr><td>username</td><td><input type=text name=user value=$gb[username]></td></tr>
	<tr><td>password</td><td><input type=text name=pass value=$gb[password]></td></tr>
	<tr><td colspan=2 align=right><input type=submit value=Perbarui></td></tr></table></form>";

break;
/*================================================== update user ============================================*/
case "update":
	$mk=mysql_query("SELECT * FROM siakad_guru WHERE id_user=$_GET[id]");
	$gb=mysql_fetch_array($mk);
	
	echo "<form method=POST action=./action.php?opt=user&cmd=update>
	<input type=hidden name=id value=$gb[id_user]>
	<table><tr><td>Nama Guru</td><td>$gb[nama_guru]</td></tr>
	<tr><td>username</td><td><input type=text name=user value=$gb[username]></td></tr>
	<tr><td>password</td><td><input type=text name=pass value=$gb[password]></td></tr>
	<tr><td colspan=2 align=right><input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr></table></form>";

break;
}
?>