<?php
switch($_GET[cmd]){
default:
?>

<html>
	<head>
		<link rel="stylesheet" href="../js/jquery-ui-1.8.11.custom.css">
		<script src="../js/jquery-1.5.1.js"></script>
		<script src="../js/jquery.ui.core.js"></script>
		<script src="../js/jquery.ui.widget.js"></script>
		<script src="../js/jquery.ui.tabs.js"></script>
		<link rel="stylesheet" href="../js/demos.css">
		<script>
			$(function() {
				$( "#tabs" ).tabs();
			});
	</script>
	</head>
	<body>
		<div id="demo"><div id="tabs">
			<ul>
				<li><a href="#tabs-1">Tulis Info</a></li>
				<li><a href="#tabs-2">Pengaturan Info</a></li>
			</ul>
			<div id="tabs-1">
				<form method="POST" action="./action.php?opt=sekilasinfo&cmd=input" enctype="multipart/form-data"><table>
					<tr><td>Info</td>		<td><textarea name="info" cols="65" rows="5"></textarea></td></tr>
					<tr><td>Gambar</td>  <td><input type="file" name="fupload" size="60"> *) Ukuran gambar maks. 320x320</td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>
				</table></form>
			</div>
			<div id="tabs-2">
				<table>
					<tr><th>no</th><th>info</th><th>aksi</th></tr>
					<?php
						$p      = new Paging;
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);

						$tampil = mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilasinfo DESC limit $posisi,$batas");
  
						$no = $posisi+1;
						while($r=mysql_fetch_array($tampil)){
							echo "<tr><td>$no</td><td>$r[info]</td>
									<td><a href=?opt=sekilasinfo&cmd=update&id=$r[id_sekilasinfo]>Edit</a> | 
									<a href=./action.php?opt=sekilasinfo&cmd=del&id=$r[id_sekilasinfo]>Hapus</a></td></tr>";
						$no++;
						}
					?>
				</table>
				<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM sekilasinfo"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
				?>
			</div>
		</div></div>
	</body>
</html>
<?php
break;

case "update":
$edit = mysql_query("SELECT * FROM sekilasinfo WHERE id_sekilasinfo='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
<html>
	<head>
	</head>
	<body>
		<form method="POST" action="./action.php?opt=sekilasinfo&cmd=update" enctype="multipart/form-data">
		<input type="hidden" name="id" value='<?=$r[id_sekilasinfo]?>'><table>
					<tr><td>Info</td><td><textarea name="info" cols="65" rows="5"><?=$r[info]?></textarea></td></tr>
					<tr><td>Gambar</td>    <td><img width="30%" height="30%" src="../foto_info/<?=$r[gambar]?>"></td></tr>
					<tr><td>Ganti gambar</td>    <td><input type="file" name="fupload" size="60"></td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Update">
									<input type="button" value="Batal" onclick="self.history.back()"></td></tr>
				</table></form>
	</body>
</html>
    
<?php
break;
}
?>