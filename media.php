<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
include "config/koneksi.php";
include "config/class_paging.php";
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>.:: YPP Darul Huda - Blitar ::.</title>
<link href="config/style.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="js/jquery-ui-1.8.11.custom.css">
<link rel="shortcut icon" href="favicon.ico">
<script src="js/jquery-1.5.1.js" type="text/javascript"></script>
<script src="js/jquery.bgiframe-2.1.2.js"></script>
<script src="js/jquery.ui.core.js"></script>
<script src="js/jquery.ui.widget.js"></script>
<script src="js/jquery.ui.mouse.js"></script>
<script src="js/jquery.ui.draggable.js"></script>
<script src="js/jquery.ui.position.js"></script>
<script src="js/jquery.ui.resizable.js"></script>
<script src="js/jquery.tablescroll.js"></script>
<script src="js/jquery.ui.dialog.js"></script>
<script src="js/jquery.effects.core.js"></script>
<script src="js/jquery.effects.blind.js"></script>
<script src="js/jquery.effects.explode.js"></script>
<script src="js/tabs.js" type="text/javascript"></script>
<script src="js/newsticker.js" type="text/javascript"></script>
<script src="js/headline.js" type="text/javascript"></script>
<script src="js/jquery.fancybox.js" type="text/javascript"></script>
<script type="text/javascript">
		$.fx.speeds._default = 1000;
		$(document).ready(function(){
	  		openContent($('#firstSlide'),'div1');
				$("a#galeri").fancybox({
				'titlePosition'	: 'inside'
			});
	    });
		$(function() {
		$( "#dialog" ).dialog({
			autoOpen: false,
			show: "blind",
			hide: "explode"
		});

		$( "#opener" ).click(function() {
			$( "#dialog" ).dialog( "open" );
			return false;
		});
	});
	
	jQuery(document).ready(function($)
{
	$('#tamu').tableScroll({height:150});

});
	</script>
</head>
<body>
<div id="wrapper">
	<div id="menu">
		<ul>
			<li class="current_page_item"><a href="index.php">Beranda</a></li>
			<li><a href="siakad/index.php">SIAKAD-YPPDH</a></li>
			<li><a href="?opt=profil">Profil</a></li>
			<li><a href="?opt=agenda">Agenda</a></li>
			<li><a href="?opt=galeri">Galeri</a></li>
			<li><a href="?opt=download">Download</a></li>
		</ul>
	</div>
	<!-- end #menu -->
	<div id="header">
		<div id="logo">
			<h1><a href="#">YPP Darul Huda</a></h1>
			<p>TK - MI - MTs - MA - TPA - MD - THORIQOH</p>
		</div>
	</div>
	<!-- end #header -->
	<div id="page">
		<div id="content">
			<?php include "content.php";?>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
		<div id="sidebar">
		
			<div id="search" >
				<form method="POST" action="?opt=hasil_cari">
					<div>
						<input type="text" name="kata" id="search-text" value="" />
						<input type="submit" id="search-submit" value="CARI" />
					</div>
				</form>
			</div>
		<div style="clear: both;">&nbsp;</div>
		
		<h2>Sekilas Info</h2>
		<ul id="sekilasinfo">
			<?php
              $sekilas=mysql_query("SELECT * FROM sekilasinfo ORDER BY id_sekilasinfo DESC LIMIT 5");
              while($s=mysql_fetch_array($sekilas)){
                echo "<li><img src='foto_info/kecil_$s[gambar]' width='54' height='54' />
                      <span class='news-text'>$s[info]</span></li>";
              }
            ?>
		</ul>
		<div style="clear: both;">&nbsp;</div>
		
		<h2>Buku Tamu</h2>
		<ul id="widget">
		<div id="kotakisi">
				<div class="tablescroll">
            <table id="tamu" width="100%">
            <tbody >
                <?php
                    $komen=mysql_query("SELECT * FROM tamu ORDER BY id_tamu DESC LIMIT 20");
                    while($a=mysql_fetch_array($komen)){
                    	$k=$a['komentar'];
	                    echo "<tr><td class='tanggal'>&bull; $a[tanggal] WIB:</td></tr>
                             <tr><td class='garisbawah'>dari $a[nama] : $k</td></tr>";
                    }
                ?>
            </tbody>
            </table></div>
        </div>
		<form method="POST" action="komentar.php"><table>
		<tr><td>Nama</td>		<td><input type="text" name="nama" size="19"></td></tr>
		<tr><td>Komentar</td><td><textarea name="komentar" cols="22" rows="3"></textarea></td></tr>
		<tr><td></td><td><input type="submit" value="Kirim"></td></tr>
		</table></form>
		</ul>
		<div style="clear: both;">&nbsp;</div>
		
		<h2>Polling</h2>
		<ul id="widget">
			<?php
				$judul=mysql_query("SELECT * FROM judulpoll");
				$df=mysql_fetch_array($judul);
				echo "<span class='news-title'> $df[judul]</b> </span><br />";
                echo "<form method=POST action='polling.php'>";

                $poling=mysql_query("SELECT * FROM poll");
                while ($p=mysql_fetch_array($poling)){
                  echo "<span class='news-text'><input type=radio name=pilihan value='$p[jawaban]' />$p[jawaban]</span><br />";
                }
                echo "<p><input type=submit value='Beri Suara' /></p></form>";
				echo "<center><button id='opener'>Lihat Hasil Polling</button></center>";
				echo "<div id='dialog' title='Hasil Polling :'>";
				include "hasil-polling.php";
				echo "</div> &nbsp;";
			?>
		</ul>
		<div style="clear: both;">&nbsp;</div>
		
		<h2>Statistik User</h2>
		<ul id="widget">
			<?php
              $ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
              $tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
              $waktu   = time();

              // Mencek berdasarkan IPnya, apakah user sudah pernah mengakses hari ini 
              $s = mysql_query("SELECT * FROM stats WHERE ip='$ip' AND tgl='$tanggal'");
              // Kalau belum ada, simpan data user tersebut ke database
              if(mysql_num_rows($s) == 0){
                mysql_query("INSERT INTO stats(ip, tgl, hit, online) VALUES('$ip','$tanggal','1','$waktu')");
              } 
              else{
                mysql_query("UPDATE stats SET hit=hit+1, online='$waktu' WHERE ip='$ip' AND tgl='$tanggal'");
              }

              $pengunjung       = mysql_num_rows(mysql_query("SELECT * FROM stats WHERE tgl='$tanggal' GROUP BY ip"));
              $totalpengunjung  = mysql_result(mysql_query("SELECT COUNT(hit) FROM stats"), 0); 
              $hits             = mysql_fetch_assoc(mysql_query("SELECT SUM(hit) as hitstoday FROM stats WHERE tgl='$tanggal' GROUP BY tgl")); 
              $totalhits        = mysql_result(mysql_query("SELECT SUM(hit) FROM stats"), 0); 
              $tothitsgbr       = mysql_result(mysql_query("SELECT SUM(hit) FROM stats"), 0); 
              $bataswaktu       = time() - 300;
              $pengunjungonline = mysql_num_rows(mysql_query("SELECT * FROM stats WHERE online > '$bataswaktu'"));

              $path = "counter/";
              $ext = ".png";

              $tothitsgbr = sprintf("%06d", $tothitsgbr);
              for ( $i = 0; $i <= 9; $i++ ){
	               $tothitsgbr = str_replace($i, "<img src='$path$i$ext' alt='$i'>", $tothitsgbr);
              }

              echo "<br /><p id='counter'>$tothitsgbr </p>
                    <table align=center>
                    <tr><td class='news-title'><img src=counter/hariini.png> Pengunjung hari ini </td><td class='news-title'> : $pengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total pengunjung </td><td class='news-title'> : $totalpengunjung </td></tr>
                    <tr><td class='news-title'><img src=counter/hariini.png> Hits hari ini </td><td class='news-title'> : $hits[hitstoday] </td></tr>
                    <tr><td class='news-title'><img src=counter/total.png> Total Hits </td><td class='news-title'> : $totalhits </td></tr>
                    <tr><td class='news-title'><img src=counter/online.png> Pengunjung Online </td><td class='news-title'> : $pengunjungonline </td></tr>
                    </table>";
            ?>
		</ul><div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>YPP. Darul Huda Wonodadi Blitar 2011</p>
	</div>
	<!-- end #footer -->
	<div style="text-align: center; font-size: 0.75em;">Designed by : <a href="http://www.facebook.com/liffanza">liffanza</a>.
		Theme by : <a href="http://www.freewebtemplates.com/">free website templates</a>.</div>
</body>
</html>
