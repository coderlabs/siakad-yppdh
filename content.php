<?php
switch($_GET[opt]){
default:
?>

<div id="content">
	<div id="bag-kiri">
		<div id="slideshow">
			<a href="javascript:;" onclick="openContent(this,'div1')" id="firstSlide">1</a>
			<a href="javascript:;" onclick="openContent(this,'div2')">2</a>
			<a href="javascript:;" onclick="openContent(this,'div3')">3</a>
			<a href="javascript:;" onclick="openContent(this,'div4')">4</a>
			<a href="javascript:;" onclick="openContent(this,'div5')">5</a>
		</div>
		<div id="slideContent">
			<?php
				$new=mysql_query("SELECT * FROM news WHERE headline='Y' ORDER BY id_news DESC LIMIT 5");
				$no=1;
				while($rt=mysql_fetch_array($new)){
					echo "<div id='div$no'><img src='foto_berita/small_$rt[gambar]' width='300' height='225'>
                          <span class='t'><a href=?opt=detailberita&id=$rt[id_news]>$rt[judul]</a></span></div>";
						  $no++;
				}
			?>
		</div>
	</div>
	<div id="bag-kanan">
		<div id="tabsview">
		    <div id="tab1" class="tab_sel" onclick="javascript: tampilPanel('1');" align="center">&nbsp; Berita Terpopuler &nbsp;</div>
 		    <div id="tab2" class="tab" style="margin-left: 1px;" onclick="javascript: tampilPanel('2');" align="center">&nbsp; Berita Terbaru &nbsp;</div>
 		    <div id="tab3" class="tab" style="margin-left: 1px;" onclick="javascript: tampilPanel('3');" align="center">&nbsp; Agenda Terbaru &nbsp;</div>
        </div>
		<div class="tab_bdr"></div>
	    <!-- tab 1: berita terpopuler -->
		<div class="panel" id="panel1" style="display: block;">
            <span><ul>            
                <?php
                  $populer=mysql_query("SELECT * FROM news ORDER BY dibaca DESC LIMIT 9");
                  while($p=mysql_fetch_array($populer)){
                    echo "<li class='garisbawah'><a href=?opt=detailberita&id=$p[id_news]>$p[judul]</a> ($p[dibaca]) views</li>";
                  }
                ?>          
            </ul></span>
        </div>
		<!-- tab 2: berita terkini/terbaru -->
        <div class="panel" id="panel2" style="display: none;">
			<span><ul>            
                <?php
					$terkini=mysql_query("SELECT * FROM news ORDER BY id_news DESC LIMIT 9");
					while($t=mysql_fetch_array($terkini)){
						echo "<li class='garisbawah'><a href=?opt=detailberita&id=$t[id_news]>$t[judul]</a></li>";
					}
                ?>                    
          </ul></span>
         </div>
         <!-- tab 3: agenda terkini/terbaru -->
        <div class="panel" id="panel3" style="display: none;">
			<span><ul>            
                <?php
					$agenda=mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 9");
					while($o=mysql_fetch_array($agenda)){
						echo "<li class='garisbawah'><a href=?opt=detailagenda&id=$o[id_agenda]>$o[judul]</a></li>";
					}
                ?>                    
          </ul></span>
         </div>
	</div>
	<table width="100%" cellspacing="5">
		<tr><td class="judul_head">&#187; Berita Terkini</td></tr>
		<?php
			$p      = new Paging;
			$batas  = 5;
			$posisi = $p->cariPosisi($batas);
			
			$terkini= mysql_query("SELECT * FROM news ORDER BY id_news DESC LIMIT $posisi, $batas");		 
			while($t=mysql_fetch_array($terkini)){
				echo "<tr><td class=judul><a href=?opt=detailberita&id=$t[id_news]>$t[judul]</a></td></tr>";
				echo "<tr><td class=tgl_post>$t[tgl]</td></tr>";
				echo "<tr><td class=isi>";
					if ($t[gambar]!=''){
						echo "<img class='kecil' src='foto_berita/$t[gambar]' hspace=10 border=0 align=left>";
					}
				$isi_berita = nl2br($t[isi]);
				$isi = substr($isi_berita,0,410); // ambil sebanyak 410 karakter
				$isi = substr($isi_berita,0,strrpos($isi," ")); // spasi antar kalimat

				echo "$isi ... <a href=?opt=detailberita&id=$t[id_news]>Selengkapnya</a><br><br><hr color=white></td></tr>";
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

<?php
break;

//detail berita
case "detailberita":
echo "<div id=detail><table width=100% id=detail cellspacing=5>";
$detail=mysql_query("SELECT * FROM news WHERE id_news='$_GET[id]'");
$dt=mysql_fetch_array($detail);
mysql_query("UPDATE news SET dibaca=$dt[dibaca]+1 WHERE id_news='$_GET[id]'");
echo "<tr><td class=tgl_post>$dt[tgl]</td></tr>";
echo "<tr><td class=judul>$dt[judul]</td></tr>";
echo "<tr><td class=isi>";
 	if ($dt[gambar]!=''){
		echo "<img align=center width=480 height=320 src='foto_berita/$dt[gambar]' hspace=10 border=0 align=left>";
	}
$isi_berita=nl2br($dt[isi]);
echo "<br /><br />$isi_berita</td></tr>";
echo "</table></div>";

echo "<h3>Isi Komentar :</h3><form action=simpankomentar.php method=POST>
	<table width=100%><input type=hidden name=id value=$_GET[id]><input type=hidden name=modul value=$_GET[opt]>
        <tr><td>Nama</td><td><input type=text name=nama_komentar size=35</td></tr>
        <tr><td valign=top>Komentar</td><td> <textarea name='isi_komentar' style='width: 300px; height: 100px;'></textarea></td></tr>
        <tr><td>&nbsp;</td><td><input type=submit name=submit value=Kirim></td></tr>
        </form></table><br />";
		
	// Hitung jumlah komentar
$komentar = mysql_query("select count(komentar.id_komentar) as jml from komentar WHERE id_news='$_GET[id]' AND aktif='Y'");
  $k = mysql_fetch_array($komentar); 
  echo "<span class=judul><b>$k[jml]</b> Komentar : </span><br /><hr color=#CCC noshade=noshade />";
	// Komentar berita
$p      = new Paging;
$batas  = 15;
$posisi = $p->cariPosisi($batas);
$sql = mysql_query("SELECT * FROM komentar WHERE id_news='$_GET[id]' AND aktif='Y' ORDER BY id_komentar ASC LIMIT $posisi,$batas");
$jml = mysql_num_rows($sql);
if($jml>0){
	while ($s = mysql_fetch_array($sql)){
		echo "<span class=komentar>$s[nama_komentar]</span><br />
		<span class=tanggal>$s[tgl] - $s[jam_komentar] WIB</span><br /><br />
		<span>$s[isi_komentar]</span><br /><br /><hr>";
	}
}else {
	echo "<span>Belum ada komentar untuk berita ini.</span>";
}
$jmldata = mysql_num_rows(mysql_query("SELECT * FROM komentar WHERE id_news='$_GET[id]'"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
echo "<div id=paging>$linkHalaman</div>";

echo "<table><tr><td class=kembali><br>[ <a href=javascript:history.go(-1)>Kembali</a> ]</td></tr></table>";
break;

//profil lembaga
case "profil":
echo "<table width=100%><tr><td class=judul_head>Profil Lembaga</td></tr>";
$profil = mysql_query("SELECT * FROM modul WHERE id_modul='4'");
	$r      = mysql_fetch_array($profil);
	echo "<tr><td class=isi>";
	if ($r[gambar]!=''){
		echo "<img src='foto_berita/$r[gambar]' hspace=10 border=0>";
	}
	$isi_profil=nl2br($r[static_content]);
  echo "<br /><br />$isi_profil</td></tr>";  

	echo "</table>";
break;

//detail agenda
case "detailagenda":
$tampil=mysql_query("SELECT * FROM agenda WHERE id_agenda='$_GET[id]'");
$gf=mysql_fetch_array($tampil);
echo "<table width=100% id=detail cellspacing=5>
<tr><td class=judul>$gf[judul]</td></tr>
<tr><td class=tgl_post>$gf[dari] - $gf[sampai]</td></tr>
<tr><td class=isi>$gf[ket]</td></tr>
<tr><td class=kembali><br>[ <a href=javascript:history.go(-1)>Kembali</a> ]</td></tr></table>";
break;

//hasil pencarian
case "hasil_cari":
	// menghilangkan spasi di kiri dan kanannya
	$kata = trim($_POST[kata]);

	// pisahkan kata per kalimat lalu hitung jumlah kata
	$pisah_kata = explode(" ",$kata);
	$jml_katakan = (integer)count($pisah_kata);
	$jml_kata = $jml_katakan-1;
			
	$cari = "SELECT * FROM news WHERE " ;
	for ($i=0; $i<=$jml_kata; $i++){
		$cari .= "isi LIKE '%$pisah_kata[$i]%'";
		if ($i < $jml_kata ){
		$cari .= " OR ";
		}
	}
			
	$cari .= " ORDER BY id_news DESC LIMIT 7";
	$hasil  = mysql_query($cari);
	$ketemu = mysql_num_rows($hasil);
			
	if ($ketemu > 0){
		echo "<p>Ditemukan <b>$ketemu</b> berita dengan kata <font style='background-color:#B1FB17'><b>$kata</b></font> : </p>"; 
		while($t=mysql_fetch_array($hasil)){
			echo "<table><tr><td><span class=judul><a href=?opt=detailberita&id=$t[id_news]>$t[judul]</a></span><br />";
			// Tampilkan hanya sebagian isi berita
			$isi_berita = htmlentities(strip_tags($t[isi_berita])); // membuat paragraf pada isi berita dan mengabaikan tag html
			$isi = substr($isi_berita,0,250); // ambil sebanyak 250 karakter
			$isi = substr($isi_berita,0,strrpos($isi," ")); // potong per spasi kalimat
			echo "$isi ... <a href=?opt=detailberita&id=$t[id_news]>Selengkapnya</a>
			<br /></td></tr>
			</table><hr color=#CCC noshade=noshade />";
		}                                                          
	}
	else{
		echo "<center>Tidak ditemukan berita dengan kata <font style='background-color:#B1FB17'><b>$kata</b></font>.<br> [ <a href=javascript:history.go(-1)>Kembali</a> ]</center>";
	}
break;

case "agenda":
echo "<table width='100%' cellspacing='5'>
	<tr><td class='judul_head'>&#187; Agenda YPP. Darul Huda</td></tr>";

	$p      = new Paging;
	$batas  = 5;
	$posisi = $p->cariPosisi($batas);
			
	$terkini= mysql_query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT $posisi, $batas");		 
	while($t=mysql_fetch_array($terkini)){
		echo "<tr><td class=judul><a href=?opt=detailagenda&id=$t[id_agenda]>$t[judul]</a></td></tr>";
		echo "<tr><td class=tgl_post>$t[dari] s/d $t[sampai]</td></tr>";
		echo "<tr><td class=isi>";
		
		$isi_berita = nl2br($t[ket]);
		$isi = substr($isi_berita,0,110); // ambil sebanyak 410 karakter
		$isi = substr($isi_berita,0,strrpos($isi," ")); // spasi antar kalimat

		echo "$isi ... <a href=?opt=detailagenda&id=$t[id_agenda]>Selengkapnya</a><br><br><hr color=white></td></tr>";
	}
	
echo "</table>";

$jmldata = mysql_num_rows(mysql_query("SELECT * FROM agenda"));
$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

echo "<div id=paging>$linkHalaman</div>";
break;

//galeri foto
case "galeri":
echo "<table width='100%' cellspacing='5'>
	<tr><td class='judul_head'>&#187; Album Foto</td></tr>";
  // Tentukan kolom
  $col = 3;

  $a = mysql_query("SELECT jdl_album, album.id_album, gbr_album,  
                  COUNT(galeri.id_galeri) as jumlah 
                  FROM album LEFT JOIN galeri 
                  ON album.id_album=galeri.id_album
                  GROUP BY jdl_album");
  echo "<table><tr>";
  $cnt = 0;
  while ($w = mysql_fetch_array($a)) {
    if ($cnt >= $col) {
      echo "</tr><tr>";
      $cnt = 0;
  }
  $cnt++;


 echo "<td align=center valign=top><br />
    <a href=?opt=detailalbum&id=$w[id_album]>
    <img class='img2' src='img_album/kecil_$w[gbr_album]' border=0 width=120 height=90><br />
    $w[jdl_album]</a><br />($w[jumlah] Foto)<br /></td>";
}
echo "</tr></table>";
echo "</table>";
break;

//detail album
case "detailalbum":
$jdl=mysql_query("SELECT jdl_album FROM album WHERE id_album='$_GET[id]'");
$fg=mysql_fetch_array($jdl);
echo "<table width='100%' cellspacing='5'>
	<tr><td class='judul_head'>&#187; <a href=?opt=galeri><b>Album</b></a> : $fg[jdl_album]</td></tr>";
  $p      = new Paging;
  $batas  = 10;
  $posisi = $p->cariPosisi($batas);

  // Tentukan kolom
  $col = 5;

  $g = mysql_query("SELECT * FROM galeri WHERE id_album='$_GET[id]' ORDER BY id_galeri DESC LIMIT $posisi,$batas");
  $ada = mysql_num_rows($g);
  
  if ($ada > 0) {
  echo "<table><tr>";
  $cnt = 0;
  while ($w = mysql_fetch_array($g)) {
    if ($cnt >= $col) {
      echo "</tr><tr>";
      $cnt = 0;
    }
    $cnt++;

    echo "<td align=center valign=top><br />
          <a id='galeri' href='img_galeri/$w[gbr_galeri]' title='$w[keterangan]'>
          <img alt='galeri' src='img_galeri/kecil_$w[gbr_galeri]' /></a><br />
          <a href=#><b>$w[jdl_galeri]</b></a></td>";
  }
  echo "</tr></table><br />";

  $jmldata     = mysql_num_rows(mysql_query("SELECT * FROM galeri WHERE id_album='$_GET[id]'"));
  $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
  $linkHalaman = $p->navHalaman($_GET[halgaleri], $jmlhalaman);

  echo "Hal: $linkHalaman <br /><br />";
  }else{
    echo "<p>Belum ada foto.</p>";
  }
  echo "</table>";
break;

case "download":
?>

<div id="kotakjudul">
<span class="judulhead">Download</span></div>
	<div id="kotakisi">
   <table cellpadding="2" width="100%" border="0" cellspacing="4">
   <tbody>
   	<?php
   		$p      = new Paging;
			$batas  = 20;
			$posisi = $p->cariPosisi($batas);
      	$download=mysql_query("SELECT * FROM download ORDER BY id_download DESC LIMIT $posisi,$batas");
         while($d=mysql_fetch_array($download)){
         echo "<tr><td>&bull; <a href='download.php?file=$d[nama_file]'>$d[judul]</a> ($d[hits])</td></tr>";
         }
      ?>
   </tbody>
   </table>
   <?php
   $jmldata = mysql_num_rows(mysql_query("SELECT * FROM download"));
		$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

		echo "<div id=paging>$linkHalaman</div>";
		?>
</div>

<?php
break;
}
?>