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
		var dates = $( "#from, #to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 3,
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
	</script>
	</head>
	<body>
	<div id="demo">
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Tulis Agenda</a></li>
				<li><a href="#tabs-2">Pengaturan Agenda</a></li>
			</ul>
			<div id="tabs-1">
				<form method="POST" action="./action.php?opt=agenda&cmd=input"><table>
					<tr><td>Tanggal</td>   <td><input type="text" id="from" name="from" size="20">
												s/d	<input type="text" id="to" name="to" size="20"></td></tr>
					<tr><td>Acara</td>     <td><input type="text" name="judul" size="70"></td></tr>
					<tr><td>Keterangan</td><td><textarea name="ket" cols="60" rows="5"></textarea></td></tr>
					<tr><td colspan="2" align="right"><input type="submit" value="Simpan"></td></tr>
				</table></form>
			</div>
			<div id="tabs-2">
				<table>
					<tr><th>no</th><th>judul</th><th>tgl</th><th>s/d</th><th>aksi</th></tr>
					<?php
						$p      = new Paging;
						$batas  = 10;
						$posisi = $p->cariPosisi($batas);

						$tampil = mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC limit $posisi,$batas");
  
						$no = $posisi+1;
						while($r=mysql_fetch_array($tampil)){
							echo "<tr><td>$no</td><td>$r[judul]</td><td>$r[dari]</td><td>$r[sampai]</td>
									<td><a href=?opt=agenda&cmd=update&id=$r[id_agenda]>Edit</a> | 
									<a href=./action.php?opt=agenda&cmd=del&id=$r[id_agenda]>Hapus</a></td></tr>";
						$no++;
						}
					?>
				</table>
				<?php
					$jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
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
$edit = mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
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
				var dates = $( "#from, #to" ).datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					numberOfMonths: 3,
					onSelect: function( selectedDate ) {
					var option = this.id == "from" ? "minDate" : "maxDate",
							instance = $( this ).data( "datepicker" ),
							date = $.datepicker.parseDate(
							instance.settings.dateFormat ||
							$.datepicker._defaults.dateFormat,
							selectedDate, instance.settings );
						dates.not( this ).datepicker( "option", option, date );
					}
				});
			});
		</script>
	</head>
	<body><div id="demo">
		<form method="POST" action="./action.php?opt=agenda&cmd=update">
		<input type="hidden" name="id" value='<?=$r[id_agenda]?>'><table>
			<tr><td>Tanggal</td>   <td><input type="text" id="from" name="from" size="20" value='<?=$r[dari]?>'>
										s/d	<input type="text" id="to" name="to" size="20" value='<?=$r[sampai]?>'></td></tr>
			<tr><td>Acara</td>     <td><input type="text" name="judul" size="70" value='<?=$r[judul]?>'></td></tr>
			<tr><td>Keterangan</td><td><textarea name="ket" cols="60" rows="5"><?=$r[ket]?></textarea></td></tr>
			<tr><td colspan="2" align="right"><input type="submit" value="Update">
							<input type="button" value="Batal" onclick="self.history.back()"></td></tr>
		</table></form></div>
	</body>
</html>
    
<?php
break;
}
?>