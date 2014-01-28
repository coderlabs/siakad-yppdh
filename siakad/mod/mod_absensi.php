<?php
switch($_GET[cmd]){
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
		$( "#tabs2" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Kelas TK YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=absensi&cmd=input"><input type="hidden" name="tingkat" value="tk">
				<label>Kelas 0</label>	<select name="subkelas">
					<?php
						$d=mysql_query("SELECT subkelas FROM kelas WHERE tingkat='tk' ORDER BY id_kelas");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[subkelas]>$r[subkelas]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form>
		</div>
		</div>
		</div>
		
		<div id="tabs2">
		<ul>
		<li><a href="#tabs-2">Kelas 0 Kecil TK YPP Darul Huda</a></li>
		<li><a href="#tabs-3">Kelas 0 Besar TK YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-2">
		<table>
			<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>
			<?php
						$p      = new Paging2;
						$batas  = 15;
						$posisi = $p->cariPosisi($batas);
				$no=$posisi+1;
				$tmp=mysql_query("SELECT a.id_absensi, s.nama_siswa, a.id_siswa FROM absensi_tk a, siswa_tk s WHERE a.id_siswa=s.id_siswa AND subkelas='Kecil' ORDER BY id_absensi ASC limit $posisi,$batas");
				while($t=mysql_fetch_array($tmp)){
					echo "<tr><td>$no</td><td>$t[id_siswa]</td><td>$t[nama_siswa]</td>
					<td><a href=./action.php?opt=absensi&cmd=del&lv=tk&id=$t[id_absensi]>Hapus</a></td></tr>";
					$no++;
					}			
			?>		
		</table>
		<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM absensi_tk"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
				?>
		</div>
		<div id="tabs-3">
		<table>
			<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>
			<?php
						$p      = new Paging2;
						$batas  = 15;
						$posisi = $p->cariPosisi($batas);
				$no=$posisi+1;
				$tmp=mysql_query("SELECT a.id_absensi, s.nama_siswa, a.id_siswa FROM absensi_tk a, siswa_tk s WHERE a.id_siswa=s.id_siswa AND subkelas='Besar' ORDER BY id_absensi ASC limit $posisi,$batas");
				while($t=mysql_fetch_array($tmp)){
					echo "<tr><td>$no</td><td>$t[id_siswa]</td><td>$t[nama_siswa]</td>
					<td><a href=./action.php?opt=absensi&cmd=del&lv=tk&id=$t[id_absensi]>Hapus</a></td></tr>";
					$no++;
					}			
			?>		
		</table>
		<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM absensi_tk"));
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
/*================================== absensi mi ==========================================*/
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
		$( "#tabs2" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Kelas MI YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=absensi&cmd=input"><input type="hidden" name="tingkat" value="mi">
				<label>Kelas 0</label>	<select name="kelas">
					<?php
						$d=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mi' ORDER BY id_kelas");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[kelas]>$r[kelas]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form>
		</div>
		</div>
		</div>
		
		<div id="tabs2">
		<ul>
		<?php
					$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mi' ORDER BY kelas");
					$mj=1;
					while($op=mysql_fetch_array($sql)){
					echo "<li><a href='#tabs-$mj'>Kelas $op[kelas]</a></li>";
					$mj++;
					}
			?>
		</ul>
		<?php
			$nk=mysql_num_rows($sql);
			for($i=1;$i<=$nk;$i++){
				echo "<div id='tabs-$i'>
					<table>
					<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>";
			
					$p1      = new Paging2;
					$batas1  = 20;
					$posisi1 = $p1->cariPosisi($batas1);
				$no1=$posisi1+1;
				$tmp1=mysql_query("SELECT a.id_absensi, a.id_siswa, s.nama_siswa FROM absensi_mi a, siswa_mi s 
				WHERE a.id_siswa=s.id_siswa AND kelas='$i' ORDER BY id_absensi ASC limit $posisi1,$batas1");
				while($t1=mysql_fetch_array($tmp1)){
					echo "<tr><td>$no1</td><td>$t1[id_siswa]</td><td>$t1[nama_siswa]</td>
					<td><a href=./action.php?opt=absensi&cmd=del&lv=mi&id=$t1[id_absensi]>Hapus</a></td></tr>";
					$no1++;
					}			
				
					echo "</table>";
			
				$jmldata1 = mysql_num_rows(mysql_query("SELECT * FROM absensi_mi WHERE kelas='$i'"));
				$jmlhalaman1  = $p1->jumlahHalaman($jmldata1, $batas1);
				$linkHalaman1 = $p1->navHalaman($_GET[halaman], $jmlhalaman1);

				echo "<div id=paging>$linkHalaman1</div>";
			
			echo "</div>";
			}
		?>
		</div>
		
		</div>
				
	</body>
</html>

<?php
break;
/*================================== absensi mts ==========================================*/
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
		$( "#tabs2" ).tabs();
	});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Pembagian Kelas MTs YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=absensi&cmd=input"><input type="hidden" name="tingkat" value="mts">
				<label>Kelas 0</label>	<select name="kelas">
					<?php
						$d=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mts' ORDER BY id_kelas");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[kelas]>$r[kelas]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br>
			</form>
		</div>
		</div>
		</div>
		
		<div id="tabs2">
		<ul>
		<?php
			$sql=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mts' ORDER BY kelas");
			$mj=7;
			while($op=mysql_fetch_array($sql)){
				echo "<li><a href='#tabs-$mj'>Kelas $op[kelas]</a></li>";
				$mj++;
			}
		?>
		</ul>
		<?php
			$nk=mysql_num_rows($sql);
			for($i=7;$i<$nk+7;$i++){
				echo "<div id='tabs-$i'>
				<table>
				<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>";
			
				$p1      = new Paging2;
				$batas1  = 20;
				$posisi1 = $p1->cariPosisi($batas1);
				$no1=$posisi1+1;
				$tmp1=mysql_query("SELECT a.id_absensi, a.id_siswa, s.nama_siswa FROM absensi_mts a, siswa_mts s 
				WHERE a.id_siswa=s.id_siswa AND kelas='$i' ORDER BY id_absensi ASC limit $posisi1,$batas1");
				while($t1=mysql_fetch_array($tmp1)){
					echo "<tr><td>$no1</td><td>$t1[id_siswa]</td><td>$t1[nama_siswa]</td>
					<td><a href=./action.php?opt=absensi&cmd=del&lv=mts&id=$t1[id_absensi]>Hapus</a></td></tr>";
					$no1++;
					}			
				echo "</table>";
	
				$jmldata1 = mysql_num_rows(mysql_query("SELECT * FROM absensi_mts WHERE kelas='$i'"));
				$jmlhalaman1  = $p1->jumlahHalaman($jmldata1, $batas1);
				$linkHalaman1 = $p1->navHalaman($_GET[halaman], $jmlhalaman1);

				echo "<div id=paging>$linkHalaman1</div>";
			echo "</div>";
			}
		?>
		
		</div>
				
	</body>
</html>

<?php
break;
/*================================== absensi ma ==========================================*/
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
			$( "#tabs1" ).tabs();
			$( "#tabs2" ).tabs();
		});
	</script>
	</head>
	<body>
	
		<div id="demo">
		
		<div id="tabs1">
		<ul>
		<li><a href="#tabs-1">Pembagian Kelas MA YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=absensi&cmd=input"><input type="hidden" name="tingkat" value="ma">
				<label>Kelas</label>	<select name="kelas">
					<?php
						$d=mysql_query("SELECT DISTINCT kelas FROM kelas WHERE tingkat='ma' ORDER BY id_kelas");
						while($r=mysql_fetch_array($d)){
							echo "<option value='$r[kelas]'>$r[kelas]</option>";
							}
					?>				
				</select><br>
				<label>Jurusan</label><select name="jurusan">
					<?php
						$d=mysql_query("SELECT DISTINCT subkelas FROM kelas WHERE tingkat='ma' ORDER BY id_kelas");
						while($r=mysql_fetch_array($d)){
							echo "<option value=$r[subkelas]>$r[subkelas]</option>";
							}
					?>				
				</select><br>
				<label>NIS </label>	<input id="tags" type="text" name="nis"><input type="submit" value="Simpan"><br><br>
			</form>
		</div>
		
		</div>
		</div>
		
		<div id="tabs2">
				<ul>
				<?php
					$sql=mysql_query("SELECT kelas,subkelas FROM kelas WHERE tingkat='ma' ORDER BY kelas");
					$mj=1;
					while($op=mysql_fetch_array($sql)){
					echo "<li><a href='#tabs-$mj'>$op[kelas] $op[subkelas]</a></li>";
					$mj++;
					}
				?>
				</ul>
			<?php
					$nk=mysql_num_rows($sql);
					for($i=1;$i<=$nk;$i++){
					$r=$i-1;
					$y=$nk-1;
					$nnyu=mysql_query("SELECT kelas,subkelas FROM kelas WHERE tingkat='ma' ORDER BY kelas LIMIT $r,$y");
					$op1=mysql_fetch_array($nnyu);
					echo "<div id='tabs-$i'>
					<table>
							<th>No</th><th>NIS</th><th>Nama Siswa</th><th>Aksi</th>";
							$no1=1;
							$tmp1=mysql_query("SELECT a.id_absensi, a.id_siswa, s.nama_siswa FROM absensi_ma a, siswa_ma s 
							WHERE a.id_siswa=s.id_siswa AND kelas='$op1[kelas]' AND jurusan='$op1[subkelas]' ORDER BY id_absensi");
							while($t1=mysql_fetch_array($tmp1)){
								echo "<tr><td>$no1</td><td>$t1[id_siswa]</td><td>$t1[nama_siswa]</td>
								<td><a href=./action.php?opt=absensi&cmd=del&lv=ma&id=$t1[id_absensi]>Hapus</a></td></tr>";
							$no1++;
							}
					echo "</table></div>";
					}
				?>
			</div>
		
		</div>
		
<?php		
break;

}
?>