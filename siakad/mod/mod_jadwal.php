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
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tags" ).autocomplete({
			source: "cari_matpel_tk.php",
			minLength: 3			
			});
		$( "#tags2" ).autocomplete({
			source: "cari_matpel_tk.php",
			minLength: 3			
			});
		$("#tabs").tabs();
	});
	</script>	
	</head>
	<body>
	<div id="demo">
	
	<div id="tabs">
	<ul>
		<li><a href="#tabs-1">0 Kecil</a></li>
		<li><a href="#tabs-2">0 Besar</a></li>
	</ul>
	<div id="tabs-1">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="tk">
	<input type="hidden" name="sub" value="Kecil">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam </td><td><input type="text" name="jam" size="1"> *) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_tk ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT j.id_jadwal, h.id_hari, h.hari, j.jam, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_tk m, hari h, jadwal_tk j, guru_tk g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND subkelas='Kecil'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=tk&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=tk&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_tk WHERE subkelas='Kecil'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-2">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="tk">
	<input type="hidden" name="sub" value="Besar">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam </td><td><input type="text" name="jam" size="1"> *) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags2" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_tk ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT j.id_jadwal, h.id_hari, h.hari, j.jam, j.pukul, j.subkelas, m.nama_matpel, g.nama_guru 
									FROM matpel_tk m, hari h, jadwal_tk j, guru_tk g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND subkelas='Besar'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=tk&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=tk&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_tk WHERE subkelas='Besar'"));
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
/*=============================================jadwal mi==========================================*/
case "mi":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		var i=1;
		for(i=1;i<=6;i++){
			$( "#tags"+i ).autocomplete({
			source: "cari_matpel_mi.php",
			minLength: 3			
			});	
		}
		$("#tabs").tabs();
	});
	</script>	
	</head>
	<body>
	<div id="demo">
	
	<div id="tabs">
	<ul><?php
	$dj=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mi' ORDER BY id_kelas");
						while($rj=mysql_fetch_array($dj)){
		echo "<li><a href=#tabs-$rj[kelas]>Kelas $rj[kelas]</a></li>";
		}?>
	</ul>
	<div id="tabs-1">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mi">
	<input type="hidden" name="sub" value="1">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags1" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT j.id_jadwal, h.id_hari, h.hari, j.jam, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mi m, hari h, jadwal_mi j, guru_mi g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='1'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mi&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mi&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mi WHERE kelas='1'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-2">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mi">
	<input type="hidden" name="sub" value="2">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags2" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT j.id_jadwal, h.id_hari, h.hari, j.jam, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mi m, hari h, jadwal_mi j, guru_mi g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='2'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mi&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mi&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mi WHERE kelas='2'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-3">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mi">
	<input type="hidden" name="sub" value="3">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags3" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, j.jam, h.id_hari, j.pukul, j.id_jadwal, m.nama_matpel, g.nama_guru 
									FROM matpel_mi m, hari h, jadwal_mi j, guru_mi g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='3'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mi&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mi&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mi WHERE kelas='3'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-4">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mi">
	<input type="hidden" name="sub" value="4">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags4" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mi m, hari h, jadwal_mi j, guru_mi g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='4'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mi&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mi&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mi WHERE kelas='4'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-5">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mi">
	<input type="hidden" name="sub" value="5">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags5" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mi m, hari h, jadwal_mi j, guru_mi g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='5'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mi&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mi&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mi WHERE kelas='5'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-6">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mi">
	<input type="hidden" name="sub" value="6">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags6" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.pukul, j.id_jadwal, m.nama_matpel, g.nama_guru 
									FROM matpel_mi m, hari h, jadwal_mi j, guru_mi g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='6'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mi&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mi&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mi WHERE kelas='6'"));
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
/*=============================================jadwal mts==========================================*/
case "mts":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		var i=1;
		for(i=1;i<=3;i++){
			$( "#tags"+i ).autocomplete({
			source: "cari_matpel_mts.php",
			minLength: 3			
			});	
		}
		$("#tabs").tabs();
	});
	</script>	
	</head>
	<body>
	<div id="demo">
	
	<div id="tabs">
	<ul>
		<?php
			$d=mysql_query("SELECT kelas FROM kelas WHERE tingkat='mts' ORDER BY id_kelas");
			while($r=mysql_fetch_array($d)){
				echo "<li><a href=#tabs-$r[kelas]>Kelas $r[kelas]</a></li>";
			}
		?>
	</ul>
	<div id="tabs-7">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mts">
	<input type="hidden" name="sub" value="7">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags1" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mts ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.id_jadwal, j.jam, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mts m, hari h, jadwal_mts j, guru_mts g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='7'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mts&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mts&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mts WHERE kelas='7'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-8">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mts">
	<input type="hidden" name="sub" value="8">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags2" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mts ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mts m, hari h, jadwal_mts j, guru_mts g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='8'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mts&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mts&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mts WHERE kelas='8'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-9">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="mts">
	<input type="hidden" name="sub" value="9">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1">*) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags3" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_mts ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_mts m, hari h, jadwal_mts j, guru_mts g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='9'
									ORDER BY id_hari, jam ASC LIMIT $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=mts&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=mts&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_mts WHERE kelas='9'"));
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
/*=============================================jadwal ma==========================================*/
case "ma":
?>

<html>
	<head>
	<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
	<script src="config/js/jquery-1.5.1.js"></script>
	<script src="config/js/ui/jquery.ui.core.js"></script>
	<script src="config/js/ui/jquery.ui.widget.js"></script>
	<script src="config/js/ui/jquery.ui.autocomplete.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		var i=1;
		for(i=1;i<=6;i++){
			$( "#tags"+i ).autocomplete({
			source: "cari_matpel_ma.php",
			minLength: 3			
			});	
		}
		$("#tabs").tabs();
	});
	</script>	
	</head>
	<body>
	<div id="demo">
	
	<div id="tabs">
	<ul>
		<?php
			$d=mysql_query("SELECT kelas,subkelas FROM kelas WHERE tingkat='ma' ORDER BY kelas");
			$no=1;
			while($r=mysql_fetch_array($d)){
				echo "<li><a href=#tabs-$no>$r[kelas] $r[subkelas]</a></li>";
				$no++;
			}
		?>
	</ul>
	<div id="tabs-1">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="ma">
	<input type="hidden" name="kls" value="10"><input type="hidden" name="sub" value="A">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1"></td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags1" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_ma m, hari h, jadwal_ma j, guru_ma g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='10' AND j.subkelas='A'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=ma&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=ma&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_ma WHERE kelas='10' AND subkelas='A'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-2">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="ma">
	<input type="hidden" name="kls" value="10"><input type="hidden" name="sub" value="B">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1"></td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags2" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_ma m, hari h, jadwal_ma j, guru_ma g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='10' AND j.subkelas='B'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=ma&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=ma&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_ma WHERE kelas='10' AND subkelas='B'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-3">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="ma">
	<input type="hidden" name="kls" value="11"><input type="hidden" name="sub" value="IPS">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1"></td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags3" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_ma m, hari h, jadwal_ma j, guru_ma g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='11' AND j.subkelas='IPS'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=ma&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=ma&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_ma WHERE kelas='11' AND subkelas='IPS'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-4">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="ma">
	<input type="hidden" name="kls" value="11"><input type="hidden" name="sub" value="IPA">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1"></td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags4" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_ma m, hari h, jadwal_ma j, guru_ma g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='11' AND j.subkelas='IPA'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=ma&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=ma&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_ma WHERE kelas='11' AND subkelas='IPA'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-5">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="ma">
	<input type="hidden" name="kls" value="12"><input type="hidden" name="sub" value="IPA">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1"></td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags5" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari, h.id_hari, j.jam, j.id_jadwal, j.pukul, m.nama_matpel, g.nama_guru 
									FROM matpel_ma m, hari h, jadwal_ma j, guru_ma g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='12' AND j.subkelas='IPA'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=ma&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=ma&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_ma WHERE kelas='12' AND subkelas='IPA'"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
		?>
	</div>
	<div id="tabs-6">
	<form method="POST" action="./action.php?opt=jadwal&cmd=input"><input type="hidden" name="tingkat" value="ma">
	<input type="hidden" name="kls" value="12"><input type="hidden" name="sub" value="IPS">
			<table>
				<td>Hari</td><td><select name="hari">
					<option value="1">Senin</option>
					<option value="2">Selasa</option>
					<option value="3">Rabu</option>
					<option value="4">Kamis</option>
					<option value="5">Jumat</option>
					<option value="6">Sabtu</option>				
				</select></td></tr>
				<tr><td>Jam</td><td><input type="text" name="jam" size="1"></td></tr>
				<tr><td>Pukul</td><td><input type="text" name="pukul" size="10">*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type="text" id="tags6" name="matpel" size="30"></td></tr>
				<tr><td>Guru</td><td><select size="5" name="guru">
				<?php
					$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
					while($t=mysql_fetch_array($gr)){
						echo "<option value='$t[nama_guru]'>$t[nama_guru]</option>";
						}				
				?>				
				</select></td></tr>
				<td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>			
			</table>
		</form>
		<table>
			<th>No</th><th>Hari</th><th>Jam</th><th>Pukul</th><th>Mata Pelajaran</th><th>Guru</th><th>Aksi</th>
			<?php
			$p      = new Paging2;
			$batas  = 15;
			$posisi = $p->cariPosisi($batas);
			$no=$posisi+1;
			$tmp=mysql_query("SELECT h.hari,h.id_hari, j.jam, j.pukul, j.id_jadwal, m.nama_matpel, g.nama_guru 
									FROM matpel_ma m, hari h, jadwal_ma j, guru_ma g 
									WHERE j.nama_matpel=m.nama_matpel AND h.id_hari=j.id_hari AND j.nama_guru=g.nama_guru AND j.kelas='12' AND j.subkelas='IPS'
									ORDER BY id_hari, jam ASC limit $posisi,$batas");
			while($t=mysql_fetch_array($tmp)){
				echo "<tr><td>$no</td><td>$t[hari]</td><td>$t[jam]</td><td>$t[pukul]</td><td>$t[nama_matpel]</td><td>$t[nama_guru]</td>
				<td><a href=?opt=jadwal&cmd=update&lv=ma&id=$t[id_jadwal]>Edit</a> | 
				<a href=./action.php?opt=jadwal&cmd=del&lv=ma&id=$t[id_jadwal]>Hapus</a></td></tr>";
				$no++;			
			}
			?>
		</table>
		<?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM jadwal_ma WHERE kelas='12' AND subkelas='IPS'"));
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
/*=============================================update tk==========================================*/
case "update":
$l=$_GET[lv];
if($l=='tk'){
	$ty=mysql_query("SELECT * FROM jadwal_tk WHERE id_jadwal='$_GET[id]'");
	$jh=mysql_fetch_array($ty);
	echo "<form method=POST action=./action.php?opt=jadwal&cmd=update><input type=hidden name=tingkat value=tk>
	<input type=hidden name=id value=$jh[id_jadwal]>
			<table>
				<td>Hari</td><td><select name=hari>";
				$hn=mysql_query("SELECT * FROM hari ORDER BY id_hari ASC");
				while($tg=mysql_fetch_array($hn)){
					echo "<option value=$tg[id_hari] "; if($jh[id_hari]==$tg[id_hari]) {echo "selected";} echo ">$tg[hari]</option>";
				}				
				echo "</select></td></tr>
				<tr><td>Jam </td><td><input type=text name=jam size=1 value=$jh[jam]> *) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type=text name=pukul size=10 value='$jh[pukul]'>*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type=text name=matpel size=30 value='$jh[nama_matpel]'></td></tr>
				<tr><td>Guru</td><td><select size=5 name=guru>";
				$gr=mysql_query("SELECT nama_guru FROM guru_tk ORDER BY nip ASC");
				while($t=mysql_fetch_array($gr)){
					echo "<option value='$t[nama_guru]' "; if($jh[nama_guru]==$t[nama_guru]){echo "selected";} echo ">$t[nama_guru]</option>";
				}				
					
				echo "</select></td></tr><td colspan=2 align=right>
				<input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>			
			</table>
		</form>";
	}
else if($l=='mi'){
	$ty=mysql_query("SELECT * FROM jadwal_mi WHERE id_jadwal='$_GET[id]'");
	$jh=mysql_fetch_array($ty);
	echo "<form method=POST action=./action.php?opt=jadwal&cmd=update><input type=hidden name=tingkat value=mi>
	<input type=hidden name=id value=$jh[id_jadwal]>
			<table>
				<td>Hari</td><td><select name=hari>";
				$hn=mysql_query("SELECT * FROM hari ORDER BY id_hari ASC");
				while($tg=mysql_fetch_array($hn)){
					echo "<option value=$tg[id_hari] "; if($jh[id_hari]==$tg[id_hari]) {echo "selected";} echo ">$tg[hari]</option>";
				}				
				echo "</select></td></tr>
				<tr><td>Jam </td><td><input type=text name=jam size=1 value=$jh[jam]> *) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type=text name=pukul size=10 value='$jh[pukul]'>*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type=text name=matpel size=30 value='$jh[nama_matpel]'></td></tr>
				<tr><td>Guru</td><td><select size=5 name=guru>";
				$gr=mysql_query("SELECT nama_guru FROM guru_mi ORDER BY nip ASC");
				while($t=mysql_fetch_array($gr)){
					echo "<option value='$t[nama_guru]' "; if($jh[nama_guru]==$t[nama_guru]){echo "selected";} echo ">$t[nama_guru]</option>";
				}				
					
				echo "</select></td></tr><td colspan=2 align=right>
				<input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>			
			</table>
		</form>";
	}
else if($l=='mts'){
	$ty=mysql_query("SELECT * FROM jadwal_mts WHERE id_jadwal='$_GET[id]'");
	$jh=mysql_fetch_array($ty);
	echo "<form method=POST action=./action.php?opt=jadwal&cmd=update><input type=hidden name=tingkat value=mts>
	<input type=hidden name=id value=$jh[id_jadwal]>
			<table>
				<td>Hari</td><td><select name=hari>";
				$hn=mysql_query("SELECT * FROM hari ORDER BY id_hari ASC");
				while($tg=mysql_fetch_array($hn)){
					echo "<option value=$tg[id_hari] "; if($jh[id_hari]==$tg[id_hari]) {echo "selected";} echo ">$tg[hari]</option>";
				}				
				echo "</select></td></tr>
				<tr><td>Jam </td><td><input type=text name=jam size=1 value=$jh[jam]> *) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type=text name=pukul size=10 value='$jh[pukul]>'*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type=text name=matpel size=30 value='$jh[nama_matpel]'></td></tr>
				<tr><td>Guru</td><td><select size=5 name=guru>";
				$gr=mysql_query("SELECT nama_guru FROM guru_mts ORDER BY nip ASC");
				while($t=mysql_fetch_array($gr)){
					echo "<option value='$t[nama_guru]' "; if($jh[nama_guru]==$t[nama_guru]){echo "selected";} echo ">$t[nama_guru]</option>";
				}				
					
				echo "</select></td></tr><td colspan=2 align=right>
				<input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>			
			</table>
		</form>";
	}
else if($l=='ma'){
	$ty=mysql_query("SELECT * FROM jadwal_ma WHERE id_jadwal='$_GET[id]'");
	$jh=mysql_fetch_array($ty);
	echo "<form method=POST action=./action.php?opt=jadwal&cmd=update><input type=hidden name=tingkat value=ma>
	<input type=hidden name=id value=$jh[id_jadwal]>
			<table>
				<td>Hari</td><td><select name=hari>";
				$hn=mysql_query("SELECT * FROM hari ORDER BY id_hari ASC");
				while($tg=mysql_fetch_array($hn)){
					echo "<option value=$tg[id_hari] "; if($jh[id_hari]==$tg[id_hari]) {echo "selected";} echo ">$tg[hari]</option>";
				}				
				echo "</select></td></tr>
				<tr><td>Jam </td><td><input type=text name=jam size=1 value=$jh[jam]> *) Isi dengan angka Romawi</td></tr>
				<tr><td>Pukul</td><td><input type=text name=pukul size=10 value='$jh[pukul]'>*) Format 00.00 - 00.00</td></tr>
				<tr><td>Mata Pelajaran</td><td><input type=text name=matpel size=30 value='$jh[nama_matpel]'></td></tr>
				<tr><td>Guru</td><td><select size=5 name=guru>";
				$gr=mysql_query("SELECT nama_guru FROM guru_ma ORDER BY nip ASC");
				while($t=mysql_fetch_array($gr)){
					echo "<option value='$t[nama_guru]' "; if($jh[nama_guru]==$t[nama_guru]){echo "selected";} echo ">$t[nama_guru]</option>";
				}				
					
				echo "</select></td></tr><td colspan=2 align=right>
				<input type=submit value=Perbarui><input type=button value=Batal onclick=self.history.back()></td></tr>			
			</table>
		</form>";
	}
break;
}
?>