<?php
switch($_GET[cmd]){
default:
?>

<html>
	<head></head>
	<body>
		<h2>Tambah File</h2>
		<form method="POST" action="./action.php?opt=download&cmd=input" enctype="multipart/form-data"><table>
			<tr><td>Judul File</td>   <td> : <input type="text" name="judul" size="50"></td></tr>
			<tr><td>File</td><td><input type="file" name="fupload" size="40"></td></tr>
			<tr><td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>
		</table></form>
		<h2>Pengaturan File</h2>
			<table>
				<tr><th>no</th><th>Judul File</th><th>Nama File</th><th>aksi</th></tr>
					<?php
						$p      = new Paging;
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);
						$tampil = mysql_query("SELECT * FROM download ORDER BY id_download ASC LIMIT $posisi,$batas");
  
						$no =$posisi+1;
						while($r=mysql_fetch_array($tampil)){
							echo "<tr><td>$no</td><td>$r[judul]</td><td>$r[nama_file]</td>
									<td><a href=?opt=download&cmd=update&id=$r[id_download]>Edit</a> | 
									<a href=./action.php?opt=download&cmd=del&id=$r[id_download]>Hapus</a></td></tr>";
						$no++;
						}
					?>
			</table>
			<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM download"));
					$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
					$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

					echo "<div id=paging>$linkHalaman</div>";
				?>
	</body>
</html>
<?php
break;

case "update":
$edit = mysql_query("SELECT * FROM download WHERE id_download='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
<html>
	<head></head>
	<body>
		<h2>Edit Kategori</h2>
		<form method="POST" action="./action.php?opt=download&cmd=update" enctype="multipart/form-data">
		<input type="hidden" name="id" value='<?=$r[id_download]?>'><table>
			<tr><td>Nama File</td>   <td> : <input type="text" name="judul" size="50" value="<?=$r[judul]?>"></td></tr>
			<tr><td>File</td><td><input type="file" name="fupload" size="40"></td></tr>		
			<tr><td colspan="2" align="right"><input type="submit" value="Perbarui">
								<input type="button" value="Batal" onclick="self.history.back()"></td></tr>
		</table></form>
	</body>
</html>

<?php
break;
}
?>