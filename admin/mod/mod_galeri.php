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
				<li><a href="#tabs-1">Tambah Foto</a></li>
				<li><a href="#tabs-2">Pengaturan Galeri</a></li>
			</ul>
			<div id="tabs-1">
				<form method="POST" action="./action.php?opt=galeri&cmd=input" enctype="multipart/form-data"><table>
					<tr><td>Album</td>        <td> : <select name="album">
						<?php
							$alb=mysql_query("SELECT * FROM album ORDER BY id_album ASC");
							while($re=mysql_fetch_array($alb)){
								echo "<option value=$re[id_album]>$re[jdl_album]</option>";
							}
						?>
					</select></td></tr>
					<tr><td>Judul Foto</td> <td> : <input type="text" name="judul" size="65"></td></tr>
					<tr><td>Keterangan</td> <td> : <input type="text" name="ket" size="65"></td></tr>
					<tr><td>Gambar</td>     <td> : <input type="file" name="fupload" size="55"><br> *) Ukuran gambar maks. 640x480</td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>
				</table></form>
			</div>
			<div id="tabs-2">
				<table>
					<tr><th>no</th><th>Judul Foto</th><th>aksi</th></tr>
					<?php
						$p      = new Paging;
						$batas  = 5;
						$posisi = $p->cariPosisi($batas);

						$tampil = mysql_query("SELECT * FROM galeri ORDER BY id_galeri DESC limit $posisi,$batas");
  
						$no = $posisi+1;
						while($r=mysql_fetch_array($tampil)){
							echo "<tr><td>$no</td><td>$r[jdl_galeri]</td>
									<td><a href=?opt=galeri&cmd=update&id=$r[id_galeri]>Edit</a> | 
									<a href=./action.php?opt=galeri&cmd=del&id=$r[id_galeri]>Hapus</a></td></tr>";
						$no++;
						}
					?>
				</table>
				<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM galeri"));
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
$edit = mysql_query("SELECT * FROM galeri WHERE id_galeri='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
<html>
	<head>
	</head>
	<body>
		<form method="POST" action="./action.php?opt=galeri&cmd=update" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$r[id_galeri]?>"><table>
			<tr><td>Album</td>        <td> : <select name="album">
				<?php
					$alb=mysql_query("SELECT * FROM album ORDER BY id_album ASC");
					while($re=mysql_fetch_array($alb)){
						echo "<option value=$re[id_album]>$re[jdl_album]</option>";
					}
				?>
			</select></td></tr>
			<tr><td>Judul Foto</td> 	<td> : <input type="text" name="judul" size="65" value="<?=$r[jdl_galeri]?>"></td></tr>
			<tr><td>Keterangan</td> 	<td> : <input type="text" name="ket" size="65" value="<?=$r[keterangan]?>"></td></tr>
			<tr><td>Gambar</td>     	<td><img width="30%" height="30%" src="../img_galeri/<?=$r[gbr_galeri]?>"></td></tr>
			<tr><td>Ganti Gambar</td>   <td> : <input type="file" name="fupload" size="65"></td></tr>
			<tr><td colspan="2" align="right"><input type="submit" value="Perbarui">
				<input type="button" value="Batal" onclick="self.history.back()"></td></tr>
		</table></form>
	</body>
</html>
    
<?php
break;
}
?>