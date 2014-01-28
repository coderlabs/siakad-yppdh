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
				<li><a href="#tabs-1">Buat Album</a></li>
				<li><a href="#tabs-2">Pengaturan Album</a></li>
			</ul>
			<div id="tabs-1">
				<form method="POST" action="./action.php?opt=album&cmd=input" enctype="multipart/form-data"><table>
					<tr><td>Judul Album</td> <td><input type="text" name="judul" size="65"></td></tr>
					<tr><td>Gambar</td>      <td><input type="file" name="fupload" size="55"><br> *) Ukuran gambar maks. 640x640</td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>
				</table></form>
			</div>
			<div id="tabs-2">
				<table>
					<tr><th>no</th><th>Judul Album</th><th>aksi</th></tr>
					<?php
						$p      = new Paging;
						$batas  = 5;
						$posisi = $p->cariPosisi($batas);

						$tampil = mysql_query("SELECT * FROM album ORDER BY id_album DESC limit $posisi,$batas");
  
						$no = $posisi+1;
						while($r=mysql_fetch_array($tampil)){
							echo "<tr><td>$no</td><td>$r[jdl_album]</td>
									<td><a href=?opt=album&cmd=update&id=$r[id_album]>Edit</a> | 
									<a href=./action.php?opt=album&cmd=del&id=$r[id_album]>Hapus</a></td></tr>";
						$no++;
						}
					?>
				</table>
				<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM album"));
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
$edit = mysql_query("SELECT * FROM album WHERE id_album='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
<html>
	<head>
	</head>
	<body>
		<form method="POST" action="./action.php?opt=album&cmd=update" enctype="multipart/form-data">
		<input type="hidden" name="id" value='<?=$r[id_album]?>'><table>
					<tr><td>Judul Album</td> <td><input type="text" name="judul" size="65" value="<?=$r[jdl_album]?>"></td></tr>
					<tr><td>Gambar</td>    <td><img width="50%" height="50%" src="../img_album/<?=$r[gbr_album]?>"></td></tr>
					<tr><td>Ganti gambar</td>    <td><input type="file" name="fupload" size="55"></td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Perbarui">
									<input type="button" value="Batal" onclick="self.history.back()"></td></tr>
				</table></form>
	</body>
</html>
    
<?php
break;
}
?>