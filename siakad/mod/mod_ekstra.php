<?php
switch($_GET[cmd]){
default:
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
			<h3><a href="#">Ekstra TK</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=ekstra&cmd=input">
			<input type="hidden" name="tingkat" value="tk">
				<label>Pembina</label>			<input type="text" name="guru" id="tags1" size="30"><br>
				<label>Nama Kegiatan </label>	<input type="text" name="kegiatan" size="40"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br><br>
			
			<table>
				<tr><th>no</th><th>Nama Kegiatan</th><th>Pembina</th><th>Aksi</th></tr>
				<?php
					
					$guru = mysql_query("SELECT * FROM ekstra WHERE tingkat='tk' ORDER BY id_ekstra ASC");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_ekstra]</td><td>$r[nama_guru]</td>
						<td><a href=?opt=ekstra&cmd=update&id=$r[id_ekstra]>Edit</a> | 
						<a href=./action.php?opt=ekstra&cmd=del&id=$r[id_ekstra]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			
			</div>
			<!-- ========================================= Ekstra MI ================================================ -->
			<h3><a href="#">Ekstra MI</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=ekstra&cmd=input">
			<input type="hidden" name="tingkat" value="mi">
				<label>Pembina</label>			<input type="text" name="guru" id="tags2" size="30"><br>
				<label>Nama Kegiatan </label>	<input type="text" name="kegiatan" size="40"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br><br>
			
			<table>
				<tr><th>no</th><th>Nama Kegiatan</th><th>Pembina</th><th>Aksi</th></tr>
				<?php
					
					$guru = mysql_query("SELECT * FROM ekstra WHERE tingkat='mi' ORDER BY id_ekstra ASC");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_ekstra]</td><td>$r[nama_guru]</td>
						<td><a href=?opt=ekstra&cmd=update&id=$r[id_ekstra]>Edit</a> | 
						<a href=./action.php?opt=ekstra&cmd=del&id=$r[id_ekstra]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			
			</div>
			<!-- ========================================= Ekstra MTs ================================================ -->
			<h3><a href="#">Ekstra MTs</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=ekstra&cmd=input">
			<input type="hidden" name="tingkat" value="mts">
				<label>Pembina</label>			<input type="text" name="guru" id="tags3" size="30"><br>
				<label>Nama Kegiatan </label>	<input type="text" name="kegiatan" size="40"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br><br>
			
			<table>
				<tr><th>no</th><th>Nama Kegiatan</th><th>Pembina</th><th>Aksi</th></tr>
				<?php
					
					$guru = mysql_query("SELECT * FROM ekstra WHERE tingkat='mts' ORDER BY id_ekstra ASC");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_ekstra]</td><td>$r[nama_guru]</td>
						<td><a href=?opt=ekstra&cmd=update&id=$r[id_ekstra]>Edit</a> | 
						<a href=./action.php?opt=ekstra&cmd=del&id=$r[id_ekstra]>Hapus</a></td></tr>";
					$no++;
				}
				?>
			</table>
			
			</div>
			<!-- ========================================= Ekstra MA ================================================ -->
			<h3><a href="#">Ekstra MA</a></h3>
			<div>
			<div id="formulir">
			<form method="POST" action="./action.php?opt=ekstra&cmd=input">
			<input type="hidden" name="tingkat" value="ma">
				<label>Pembina</label>			<input type="text" name="guru" id="tags4" size="30"><br>
				<label>Nama Kegiatan </label>	<input type="text" name="kegiatan" size="40"><br>
				<label>&nbsp;</label>	<input type="submit" value="Simpan"><br>
			</form>
			</div><br><br>
			
			<table>
				<tr><th>no</th><th>Nama Kegiatan</th><th>Pembina</th><th>Aksi</th></tr>
				<?php
					
					$guru = mysql_query("SELECT * FROM ekstra WHERE tingkat='ma' ORDER BY id_ekstra ASC");
  
					$no = $posisi+1;
					while($r=mysql_fetch_array($guru)){
					echo "<tr><td>$no</td><td>$r[nama_ekstra]</td><td>$r[nama_guru]</td>
						<td><a href=?opt=ekstra&cmd=update&id=$r[id_ekstra]>Edit</a> | 
						<a href=./action.php?opt=ekstra&cmd=del&id=$r[id_ekstra]>Hapus</a></td></tr>";
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
$upd=mysql_query("SELECT * FROM ekstra WHERE id_ekstra='$_GET[id]'");
$nn=mysql_fetch_array($upd);
echo "<div class=formulir>
<form method=POST action=./action.php?opt=ekstra&cmd=update><input type=hidden name=id value='$nn[id_ekstra]'>
<fieldset>
<label>Pembina</label> <input type=text name=guru value='$nn[nama_guru]'><br>
<label>Nama Kegiatan</label> <input type=text name=kegiatan value='$nn[nama_ekstra]'><br>
<label>&nbsp;</label>	<input type=submit value=Perbarui><br>
</fieldset>
</form></div>";
break;
/*================================================= ekstra tk ============================================*/
case "tk":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_tk.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Anggota Ekstra TK YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=anggota&cmd=input"><input type="hidden" name="tingkat" value="tk">
				<label>Kegiatan</label>	<select name="ekstra">
					<?php
						$d=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='tk' ORDER BY id_ekstra");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[nama_ekstra]>$r[nama_ekstra]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form><br>
		</div>
		<table>
			<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>
			<?php
						$p      = new Paging2;
						$batas  = 15;
						$posisi = $p->cariPosisi($batas);
				$no=$posisi+1;
				$tmp=mysql_query("SELECT s.nama_siswa, e.id_siswa FROM ekstra_tk e, siswa_tk s WHERE e.id_siswa=s.id_siswa ORDER BY id_siswa ASC limit $posisi,$batas");
				while($t=mysql_fetch_array($tmp)){
					echo "<tr><td>$no</td><td>$t[id_siswa]</td><td>$t[nama_siswa]</td>
					<td><a href=./action.php?opt=anggota&lv=tk&cmd=del&id=$t[id_siswa]>Hapus</a></td></tr>";
					$no++;
					}			
			?>		
		</table>
		</div>
		</div>
		
		</div>
		</div>
		
		</div>
				
	</body>
</html>

<?php
break;
/*================================== ekstra mi ==========================================*/
case "mi":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_mi.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Anggota Ekstra MI YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=anggota&cmd=input"><input type="hidden" name="tingkat" value="mi">
				<label>Kegiatan</label>	<select name="ekstra">
					<?php
						$d=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='mi' ORDER BY id_ekstra");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[nama_ekstra]>$r[nama_ekstra]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form><br>
		</div>
		<table>
			<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>
			<?php
						$p      = new Paging2;
						$batas  = 15;
						$posisi = $p->cariPosisi($batas);
				$no=$posisi+1;
				$tmp=mysql_query("SELECT s.nama_siswa, e.id_siswa FROM ekstra_mi e, siswa_mi s WHERE e.id_siswa=s.id_siswa ORDER BY id_siswa ASC limit $posisi,$batas");
				while($t=mysql_fetch_array($tmp)){
					echo "<tr><td>$no</td><td>$t[id_siswa]</td><td>$t[nama_siswa]</td>
					<td><a href=./action.php?opt=anggota&lv=mts&cmd=del&id=$t[id_siswa]>Hapus</a></td></tr>";
					$no++;
					}			
			?>		
		</table>
		</div>
		</div>
		
		</div>
		</div>
		
		</div>
				
	</body>
</html>

<?php
break;
/*================================== ekstra mts ==========================================*/
case "mts":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_mts.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Anggota Ekstra MTs YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=anggota&cmd=input"><input type="hidden" name="tingkat" value="mts">
				<label>Kegiatan</label>	<select name="ekstra">
					<?php
						$d=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='mts' ORDER BY id_ekstra");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[nama_ekstra]>$r[nama_ekstra]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form><br>
		</div>
		<table>
			<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>
			<?php
						$p      = new Paging2;
						$batas  = 15;
						$posisi = $p->cariPosisi($batas);
				$no=$posisi+1;
				$tmp=mysql_query("SELECT s.nama_siswa, e.id_siswa FROM ekstra_mts e, siswa_mts s WHERE e.id_siswa=s.id_siswa ORDER BY id_siswa ASC limit $posisi,$batas");
				while($t=mysql_fetch_array($tmp)){
					echo "<tr><td>$no</td><td>$t[id_siswa]</td><td>$t[nama_siswa]</td>
					<td><a href=./action.php?opt=anggota&lv=mts&cmd=del&id=$t[id_siswa]>Hapus</a></td></tr>";
					$no++;
					}			
			?>		
		</table>
		</div>
		</div>
		
		</div>
		</div>
		
		</div>
				
	</body>
</html>

<?php
break;
/*================================== ekstra ma ==========================================*/
case "ma":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_siswa_ma.php",
			minLength: 2			
			});
		$( "#tabs" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Anggota Ekstra MA YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=anggota&cmd=input"><input type="hidden" name="tingkat" value="ma">
				<label>Kegiatan</label>	<select name="ekstra">
					<?php
						$d=mysql_query("SELECT nama_ekstra FROM ekstra WHERE tingkat='ma' ORDER BY id_ekstra");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[nama_ekstra]>$r[nama_ekstra]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form><br>
		</div>
		<table>
			<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>
			<?php
						$p      = new Paging2;
						$batas  = 15;
						$posisi = $p->cariPosisi($batas);
				$no=$posisi+1;
				$tmp=mysql_query("SELECT s.nama_siswa, e.id_siswa FROM ekstra_ma e, siswa_ma s WHERE e.id_siswa=s.id_siswa ORDER BY id_siswa ASC limit $posisi,$batas");
				while($t=mysql_fetch_array($tmp)){
					echo "<tr><td>$no</td><td>$t[id_siswa]</td><td>$t[nama_siswa]</td>
					<td><a href=./action.php?opt=anggota&lv=ma&cmd=del&id=$t[id_siswa]>Hapus</a></td></tr>";
					$no++;
					}			
			?>		
		</table>
		</div>
		</div>
		
		</div>
		</div>
		
		</div>
				
	</body>
</html>	
<?php		
break;
}
?>