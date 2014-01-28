<?php
session_start();
include "../config/koneksi.php";
include "../config/fungsi_thumb.php";

$modul=$_GET[opt];
$aksi=$_GET[cmd];

if(isset($modul) AND $aksi=='del'){
mysql_query("DELETE FROM ".$modul." WHERE id_".$modul."='$_GET[id]'");
header('location:media.php?opt='.$modul);
}

//input agenda
elseif($modul=='agenda' AND $aksi=='input'){
mysql_query("INSERT INTO agenda(judul, dari, sampai, ket) VALUES ('$_POST[judul]', '$_POST[from]', '$_POST[to]', '$_POST[ket]')");
header('location:media.php?opt='.$modul);
}
//update agenda
elseif($modul=='agenda' AND $aksi=='update'){
mysql_query("UPDATE agenda SET judul='$_POST[judul]',
								dari='$_POST[from]',
								sampai='$_POST[to]',
								ket='$_POST[ket]'
							WHERE id_agenda='$_POST[id]'");
header('location:media.php?opt='.$modul);
}
//update profil lembaga
elseif ($modul=='profil' AND $aksi=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE modul SET static_content = '$_POST[isi]'
                            WHERE id_modul       = '$_POST[id]'");
  }
  else{
    move_uploaded_file($lokasi_file,"../foto_berita/$nama_file");
    mysql_query("UPDATE modul SET static_content = '$_POST[isi]',
                                  gambar         = '$nama_file'    
                            WHERE id_modul       = '$_POST[id]'");
  }
  header('location:media.php?opt='.$modul);
}
//input berita
elseif($modul=='news' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

if(empty($lokasi_file)){
mysql_query("INSERT INTO news (tgl, judul, isi, headline)
						VALUES ('$_POST[tgl]', '$_POST[judul]', '$_POST[isi_berita]', '$_POST[headline]')");
}
else{
UploadImage($nama_file);
mysql_query("INSERT INTO news (tgl, judul, isi, gambar, headline)
						VALUES ('$_POST[tgl]', '$_POST[judul]', '$_POST[isi_berita]', '$nama_file', '$_POST[headline]')");
}
header('location:media.php?opt='.$modul);
}
//update berita
elseif($modul=='news' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

if(empty($lokasi_file)){
mysql_query("UPDATE news SET tgl='$_POST[tgl]', judul='$_POST[judul]', headline='$_POST[headline]',
							isi='$_POST[isi_berita]'
							WHERE id_news='$_POST[id]'");
}
else{
UploadImage($nama_file);
mysql_query("UPDATE news SET tgl='$_POST[tgl]', judul='$_POST[judul]', headline='$_POST[headline]',
							isi='$_POST[isi_berita]', gambar='$nama_file'
							WHERE id_news='$_POST[id]'");
}header('location:media.php?opt='.$modul);
}

// input sekilasinfo
elseif($modul=='sekilasinfo' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

UploadInfo($nama_file);
mysql_query("INSERT INTO sekilasinfo (info, gambar) VALUES('$_POST[info]', '$nama_file')");
header('location:media.php?opt='.$modul);
}
//update sekilas info
elseif($modul=='sekilasinfo' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

UploadInfo($nama_file);
mysql_query("UPDATE sekilasinfo SET info='$_POST[info]', gambar='$nama_file' WHERE id_sekilasinfo='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

// input album
elseif($modul=='album' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

UploadAlbum($nama_file);
mysql_query("INSERT INTO album (jdl_album, gbr_album) VALUES('$_POST[judul]', '$nama_file')");
header('location:media.php?opt='.$modul);
}
//update album
elseif($modul=='sekilasinfo' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

UploadAlbum($nama_file);
mysql_query("UPDATE album SET jdl_album='$_POST[judul]', gambar='$nama_file' WHERE id_album='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

// input galeri
elseif($modul=='galeri' AND $aksi=='input'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

UploadGallery($nama_file);
mysql_query("INSERT INTO galeri (id_album, jdl_galeri, keterangan, gbr_galeri) VALUES('$_POST[album]', '$_POST[judul]', '$_POST[ket]', '$nama_file')");
header('location:media.php?opt='.$modul);
}
//update galeri
elseif($modul=='galeri' AND $aksi=='update'){
$lokasi_file=$_FILES['fupload']['tmp_name'];
$nama_file=$_FILES['fupload']['name'];

UploadGallery($nama_file);
mysql_query("UPDATE galeri SET id_album='$_POST[album]', jdl_galeri='$_POST[judul]', keterangan='$_POST[ket]', gbr_galeri='$nama_file' WHERE id_galeri='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

// Input download
elseif ($modul=='download' AND $aksi=='input'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila ada file yang diupload
  if (!empty($lokasi_file)){
    UploadFile($nama_file);
    mysql_query("INSERT INTO download(judul,
                                    nama_file) 
                            VALUES('$_POST[judul]',
                                   '$nama_file')");
  }
  else{
    mysql_query("INSERT INTO download(judul) 
                            VALUES('$_POST[judul]')");
  }
  header('location:media.php?opt='.$modul);
}

// Update donwload
elseif ($modul=='download' AND $aksi=='update'){
  $lokasi_file = $_FILES['fupload']['tmp_name'];
  $nama_file   = $_FILES['fupload']['name'];

  // Apabila file tidak diganti
  if (empty($lokasi_file)){
    mysql_query("UPDATE download SET judul     = '$_POST[judul]'
                             WHERE id_download = '$_POST[id]'");
  }
  else{
    UploadFile($nama_file);
    mysql_query("UPDATE download SET judul     = '$_POST[judul]',
                                   nama_file    = '$nama_file'   
                             WHERE id_download = '$_POST[id]'");
  }
  header('location:media.php?opt='.$modul);
}

//polling
elseif($modul=='judulpoll' AND $aksi=='update'){
mysql_query("UPDATE judulpoll SET judul='$_POST[judul]'");
header('location:media.php?opt=poll');
}
//jawaban polling
elseif($modul=='poll' AND $aksi=='input'){
mysql_query("INSERT INTO poll (jawaban) VALUES('$_POST[poll]')");
header('location:media.php?opt='.$modul);
}
//update jawaban polling
elseif($modul=='poll' AND $aksi=='update'){
mysql_query("UPDATE poll SET jawaban='$_POST[poll]', counter='$_POST[count]' WHERE id_poll='$_POST[id]'");
header('location:media.php?opt='.$modul);
}

?>