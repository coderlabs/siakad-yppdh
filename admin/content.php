<?php
include "../config/koneksi.php";
include "../config/class_paging.php";

switch($_GET[opt]){
default:
echo "<h2>Selamat Datang Di Halaman Admin YPP. Darul Huda</h2>
      <p>Anda sedang mengakses halaman admin web YPP. Darul Huda. 
	  Jangan lupa untuk melakukan <b>Logout</b> sebelum meninggalkan halaman admin untuk menghindari
	  hal-hal yang tidak diinginkan dan penyalahgunaan hak akses.</p>
	  <img id='lgoin' src='../images/logo.jpg'>";
break;
// berita
case "news":
include "mod/mod_news.php";
break;
// profil
case "profil":
$sql  = mysql_query("SELECT * FROM modul WHERE id_modul='4'");
  $r    = mysql_fetch_array($sql);

  echo "<h2>Profil Lembaga</h2>
        <form method=POST enctype='multipart/form-data' action=./action.php?opt=profil&cmd=update>
        <input type=hidden name=id value=$r[id_modul]>
        <table>
        <tr><td><img src='../foto_berita/$r[gambar]'></td></tr>
        <tr><td>Ganti Foto : <input type=file size=90 name=fupload></td></tr>
        <tr><td><textarea name=isi cols=115 rows=20>$r[static_content]</textarea></td></tr>
        <tr><td align=right><input type=submit value=Update></td></tr>
        </form></table>";
break;
// kategori
case "cat":
include "mod/mod_cat.php";
break;
// agenda
case "agenda":
include "mod/mod_agenda.php";
break;
// sekilas info
case "sekilasinfo":
include "mod/mod_sekilasinfo.php";
break;
// album foto
case "album":
include "mod/mod_album.php";
break;
// galeri foto
case "galeri":
include "mod/mod_galeri.php";
break;
// download
case "download":
include "mod/mod_download.php";
break;
//polling
case "poll":
include "mod/mod_poll.php";
break;
//komentar
case "komentar":
include "mod/mod_komentar.php";
break;
}
?>