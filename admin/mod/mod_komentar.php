<?php
switch($_GET[cmd]){
default:
?>

<html>
	<head></head>
	<body>
		<h2>Daftar Komentar</h2>
		<table>
			<tr><th>no</th><th>nama</th><th>komentar</th><th>berita</th><th>aksi</th></tr>
			<?php
				$p      = new Paging;
				$batas  = 20;
				$posisi = $p->cariPosisi($batas);
				$tampil = mysql_query("SELECT k.nama_komentar,k.isi_komentar,n.judul FROM komentar k, news n WHERE k.id_news=n.id_news ORDER BY id_komentar DESC LIMIT $posisi,$batas");

				$no = $posisi+1;
				while($r=mysql_fetch_array($tampil)){
					echo "<tr><td>$no</td><td>$r[nama_komentar]</td><td>$r[isi_komentar]</td><td>$r[judul]</td>
							<td><a href=./action.php?opt=komentar&cmd=del&id=$r[id_komentar]>Hapus</a></td></tr>";
				$no++;
				}
			?>
		</table>
		<?php
			$jmldata = mysql_num_rows(mysql_query("SELECT * FROM komentar"));
			$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
			$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
			echo "<div id=paging>$linkHalaman</div>";
		?>
	</body>
</html>
<?php
break;
}
?>