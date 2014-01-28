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
		<script src="../js/jquery.ui.datepicker.js"></script>
		<link rel="stylesheet" href="../js/demos.css">
		<script>
			$(function() {
				$( "#tabs" ).tabs();
				$("#datepicker").datepicker();
			});
	</script>
	</head>
	<body>
		<div id="demo"><div id="tabs">
			<ul>
				<li><a href="#tabs-1">Tulis Berita</a></li>
				<li><a href="#tabs-2">Pengaturan Berita</a></li>
			</ul>
			<div id="tabs-1">
				<form method="POST" action="./action.php?opt=news&cmd=input" enctype="multipart/form-data"><table>
					<tr><td>Tanggal</td>   <td><input type="text" id="datepicker" name="tgl" size="20"></td></tr>
					<tr><td>Judul</td>     <td><input type="text" name="judul" size="70"></td></tr>
					<tr><td>Isi Berita</td><td><textarea name="isi_berita" cols="70" rows="20"></textarea></td></tr>
					<tr><td>Gambar</td>    <td><input type="file" name="fupload" size="60"><br>*) Gambar ukuran maks. 320x320</td></tr>
					<tr><td>Headline</td>  <td><input type="radio" name="headline" value="Y">Y  
                                         <input type="radio" name="headline" value="N"> N *) Ditampilkan pada slideshow atau tidak</td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>
				</table></form>
			</div>
			<div id="tabs-2">
				<table>
					<tr><th>no</th><th>judul</th><th>tgl. posting</th><th>aksi</th></tr>
					<?php
						$p      = new Paging;
						$batas  = 20;
						$posisi = $p->cariPosisi($batas);

						$tampil = mysql_query("SELECT * FROM news ORDER BY id_news DESC limit $posisi,$batas");
  
						$no = $posisi+1;
						while($r=mysql_fetch_array($tampil)){
							echo "<tr><td>$no</td><td>$r[judul]</td><td>$r[tgl]</td>
									<td><a href=?opt=news&cmd=update&id=$r[id_news]>Edit</a> | 
									<a href=./action.php?opt=news&cmd=del&id=$r[id_news]>Hapus</a></td></tr>";
						$no++;
						}
					?>
				</table>
				<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM news"));
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
$edit = mysql_query("SELECT * FROM news WHERE id_news='$_GET[id]'");
$r    = mysql_fetch_array($edit);
?>
<html>
	<head>
		<link rel="stylesheet" href="../js/jquery-ui-1.8.11.custom.css">
		<script src="../js/jquery-1.5.1.js"></script>
		<script src="../js/jquery.ui.core.js"></script>
		<script src="../js/jquery.ui.widget.js"></script>
		<script src="../js/jquery.ui.datepicker.js"></script>
		<link rel="stylesheet" href="../js/demos.css">
		<script>
			$(function() {
				$("#datepicker").datepicker();
			});
	</script>
	</head>
	<body><div id="demo">
		<form method="POST" action="./action.php?opt=news&cmd=update" enctype="multipart/form-data">
		<input type="hidden" name="id" value='<?=$r[id_news]?>'><table>
					<tr><td>Tanggal</td>   <td><input type="text" id="datepicker" name="tgl" size="20" value='<?=$r[tgl]?>'></td></tr>
					<tr><td>Judul</td>     <td><input type="text" name="judul" size="70" value='<?=$r[judul]?>'></td></tr>
					<tr><td>Isi Berita</td><td><textarea name="isi_berita" cols="70" rows="20"><?=$r[isi]?></textarea></td></tr>
					<tr><td>Gambar</td>    <td><img src="../foto_berita/<?=$r[gambar]?>"></td></tr>
					<tr><td>Ganti gambar</td>    <td><input type="file" name="fupload" size="60"></td></tr>
					<tr><td>Headline</td>    <td><input type="radio" name="headline" value="Y">Y  
                                         <input type="radio" name="headline" value="N"> N</td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Update">
									<input type="button" value="Batal" onclick="self.history.back()"></td></tr>
				</table></form></div>
	</body>
</html>
    
<?php
break;
}
?>