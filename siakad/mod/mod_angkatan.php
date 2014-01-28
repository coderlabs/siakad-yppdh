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
	<script src="config/js/ui/jquery.ui.tabs.js"></script>
	<script src="config/js/ui/jquery.ui.position.js"></script>
	<link rel="stylesheet" href="config/js/demos.css">
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
	</head>
	<body>
		<div id="demo">
		
		<div id="tabs">
		<ul>
		<li><a href="#tabs-1">Daftar Tahun Ajaran YPP Darul Huda</a></li>
		</ul>
		<div id="tabs-1">
		<div id="formulir">
			<form method="POST" action="./action.php?opt=angkatan&cmd=input">
			<label>Tahun Ajaran</label> <input type="text" name="th_ajar"><input type="submit" value="Tambah">
			<br></form>
		</div><br>
		
		<table>
			<tr><th>no</th><th>angkatan</th><th>aksi</th></tr>
			<?php
				$p      = new Paging;
				$batas  = 3;
				$posisi = $p->cariPosisi($batas);

				$ang = mysql_query("SELECT * FROM angkatan ORDER BY id_angkatan DESC limit $posisi,$batas");
				$no=1;
				while($ss=mysql_fetch_array($ang)){
					echo "<tr><td>$no</td><td>$ss[th_ajar]</td>
					<td><a href=./action.php?opt=angkatan&cmd=del&id=$ss[id_angkatan]>Hapus</a></td></tr>";
						$no++;
				}
			?>
		</table>
		<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM angkatan"));
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

case "update":
$th=mysql_query("SELECT * FROM angkatan WHERE id_angkatan='$_POST[id]'");
$r=mysql_fetch_array($th);
echo "<h2>Ubah Tahun Ajaran</h2>
		<form method='POST' action='./action.php?opt=angkatan&cmd=update'><table>
			<tr><td>Tahun Ajaran</td><td>: <input type='text' name='th_ajar' value='$r[th_ajar]'></td></tr>
			<tr><td colspan='2' align='right'><input type='submit' value='Simpan'></td></tr>
		</table></form>";
break;
}
?>