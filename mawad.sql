-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jul 19, 2011 at 11:57 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `mawad`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `agenda`
-- 

CREATE TABLE `agenda` (
  `id_agenda` int(9) NOT NULL auto_increment,
  `judul` varchar(100) NOT NULL,
  `dari` varchar(10) NOT NULL,
  `sampai` varchar(10) NOT NULL,
  `ket` text,
  PRIMARY KEY  (`id_agenda`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `agenda`
-- 

INSERT INTO `agenda` VALUES (1, 'Makan Bersama', '06/16/2011', '06/17/2011', 'acara ultahnya adek Jo +');
INSERT INTO `agenda` VALUES (2, 'dssg', '07/20/2011', '07/29/2011', 'sdgfsgsg');
INSERT INTO `agenda` VALUES (3, 'sdhsdh', '07/27/2011', '07/30/2011', 'sfgsdfh');

-- --------------------------------------------------------

-- 
-- Table structure for table `album`
-- 

CREATE TABLE `album` (
  `id_album` int(5) NOT NULL auto_increment,
  `jdl_album` varchar(100) NOT NULL,
  `gbr_album` varchar(100) default NULL,
  PRIMARY KEY  (`id_album`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `album`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `download`
-- 

CREATE TABLE `download` (
  `id_download` int(6) NOT NULL auto_increment,
  `judul` varchar(100) NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `hits` int(4) NOT NULL,
  PRIMARY KEY  (`id_download`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `download`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `galeri`
-- 

CREATE TABLE `galeri` (
  `id_galeri` int(5) NOT NULL auto_increment,
  `id_album` int(5) NOT NULL,
  `jdl_galeri` varchar(100) NOT NULL,
  `keterangan` text,
  `gbr_galeri` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_galeri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `galeri`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `judulpoll`
-- 

CREATE TABLE `judulpoll` (
  `judul` varchar(100) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `judulpoll`
-- 

INSERT INTO `judulpoll` VALUES ('Apa makanan favorit Anda?');

-- --------------------------------------------------------

-- 
-- Table structure for table `komentar`
-- 

CREATE TABLE `komentar` (
  `id_komentar` int(5) NOT NULL auto_increment,
  `id_news` int(5) NOT NULL,
  `nama_komentar` varchar(100) NOT NULL,
  `isi_komentar` text NOT NULL,
  `tgl` date NOT NULL,
  `jam_komentar` time NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  PRIMARY KEY  (`id_komentar`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `komentar`
-- 

INSERT INTO `komentar` VALUES (1, 1, 'angga', ' sip..  yo  blajar..+   ', '2011-06-17', '17:30:36', 'Y');

-- --------------------------------------------------------

-- 
-- Table structure for table `modul`
-- 

CREATE TABLE `modul` (
  `id_modul` tinyint(2) NOT NULL auto_increment,
  `nama_modul` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL,
  `static_content` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- Dumping data for table `modul`
-- 

INSERT INTO `modul` VALUES (1, 'Berita', '?opt=news', '', '');
INSERT INTO `modul` VALUES (9, 'Polling', '?opt=poll', '', '');
INSERT INTO `modul` VALUES (3, 'Agenda', '?opt=agenda', '', '');
INSERT INTO `modul` VALUES (4, 'Profil Lembaga', '?opt=profil', '<div style="text-align: center;"><h1><span style="font-weight: bold;">Yayasan Pondok Pesantren Darul Huda</span></h1><h4><span style="font-weight: bold;"></span></h4><span style="font-weight: bold;"></span>Jl. Soekarno Hatta No.29 Wonodadi, Kec. Wonodadi, Blitar<br><br></div><h2><font size="4">Profil Yayasan :</font></h2><br>YPP. Darul Huda berdiri dan juga mulai beroperasi pada tahun 1956 / 1372 H. Dan sekarang dipimpin oleh <span style="font-weight: bold;">Kyai Drs. Ibnu Sholeh</span>. Yayasan ini memiliki tanah seluas 11.116 m2, yang di atasnya didirikan bangunan dengan total luas bangunan mencapai 4.246 m2. Status tanah dan bangunan merupakan milik YPP. Darul Huda dalam bentuk Sertifikat dengan Akte Notaris Yayasan adalah Budi Dharma Kusuma, SH <span style="font-weight: bold;">No. 17/12/1992</span>.<br><br>Pendidikan dan Pelatihan yang pernah diikuti oleh Ketua Yayasan adalah sebagai berikut :<br><ol><li>Pelatihan Manajemen Pesantren tingkat nasional di PP. Baitul Hamidi, Banten pada tahun 2004.</li><li>TOT Industri dan Ponpes Se-Jawa Timur di PP. Al Mawadah, Ponorogo pada tahun 2004.<br></li><li>Pelatihan Pakem yang bertempat di Blitar pada tahun 2005.</li><li>Penataran Manajemen Madrasah di Malang pada tahun 2006.</li><li>Penataran Penerima Bantuan Koperasi dan Usaha Kecil di Surabaya pada tahun 2006.</li></ol>Prestasi yang pernah diraih YPP. Darul Huda adalah sebagai berikut :<br><ol><li>Juara I Lomba Sholawat se-Karesidenan Kediri di STAIN Tulungagung.</li><li>Juara II Lomba Puisi se-Kabupaten Blitar di Tlogo, Blitar.</li><li>Juara I Sepak Takraw tingkat Nasional di Palembang.</li><li>Juara Sepak Takraw tingkat ASEAN di Vietnam.</li><li>Peserta Perkemahan Santri Nusantara di Cibubur.<br></li></ol>Perkembangan Jumlah Peserta Didik dalam 3 tahun terakhir adalah sebagai berikut :<br><ol><li>2008/2009 : Jumlah santri pria 275 orang, santri wanita 341 orang. Total santri 616 orang.</li><li>2009/2010 : Jumlah santri pria 252 orang, santri wanita 262 orang. Total santri 514 orang.</li><li>2010/2011 : Jumlah santri pria 241 orang, santri wanita 313 orang. Total santri 554 orang.</li></ol>Jumlah tenaga pendidik sebanyak 54 orang, terdiri dari 21 orang guru pria dan 33 orang guru wanita. Dengan rincian :<br><ol><li>Guru TK berjumlah 2 orang wanita dengan status GTT.</li><li>Guru MI berjumlah 11 orang, 4 orang guru pria dan 7 orang guru wanita. 10 orang berstatus GTT dan 1 orang berstatus PNS.</li><li>Guru Mts/MA berjumlah 41 orang, 17 orang guru pria dan 24 guru wanita. 39 orang berstatus GTT dan 2 orang berstatus PNS.</li><li>Bidang keahlian yang ada : komputer, perpustakaan, laboratorium, keterampilan.<br></li></ol>Jumlah staf Tata Usaha berjumlah 7 orang.<br><br>Rincian Sumber Dana Operasional dan Perawatan adalah sebagai berikut :<br><ol><li>50% dana berasal dari BOS.</li><li>25% dana berasal dari SPP.</li><li>10% dana berasal dari donatur.</li><li>10% dana berasal dari Pemerintah.</li><li>5%&nbsp;&nbsp; dana berasal dari Swadaya / usaha sendiri.</li></ol>Jenis usaha yang dimiliki adalah sebagai berikut :<br><ol><li>Koperasi Simpan Pinjam.</li><li>Pertokoan alat tulis.</li><li>Kantin.</li></ol><h2><font size="3">Profil MA Darul Huda Wonodadi Blitar :</font><br></h2><br>Beralamat di Jl. Soekarno Hatta No.29 Wonodadi, Kec. Wonodadi, Blitar Telp. (0342) 551648. MA Darul Huda yang didirikan pada tahun 1961 dan mulai beroperasi sejak tahun 1972 kini telah <span style="font-weight: bold;">Terkareditasi A</span>. MA Darul Huda memiliki luas bangunan 525 m2 dengan<span style="font-weight: bold;"> NPSN : 20514819</span> dan <span style="font-weight: bold;">NSS/NSM : 131235050009</span>.<br><br><h2><font size="3">Profil MTs Darul Huda Wonodadi Blitar :</font></h2><br>Beralamat di Jl. Soekarno Hatta No.29 Wonodadi, Kec. Wonodadi, Blitar. MTs Darul Huda yang didirikan pada tahun 1959 dan mulai beroperasi sejak tahun 1972 kini telah <span style="font-weight: bold;">Terakreditasi B</span>. MTs Darul Huda memiliki luas bangunan 9.866 m2 dengan <span style="font-weight: bold;">NSS/NSM/NDS : 12123505050019</span>.<br>', '');
INSERT INTO `modul` VALUES (5, 'Sekilas Info', '?opt=sekilasinfo', '', '');
INSERT INTO `modul` VALUES (6, 'Album Foto', '?opt=album', '', '');
INSERT INTO `modul` VALUES (7, 'Galeri Foto', '?opt=galeri', '', '');
INSERT INTO `modul` VALUES (8, 'Download', '?opt=download', '', '');
INSERT INTO `modul` VALUES (2, 'Komentar', '?opt=komentar', '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `news`
-- 

CREATE TABLE `news` (
  `id_news` int(9) NOT NULL auto_increment,
  `tgl` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(100) default NULL,
  `headline` enum('Y','N') NOT NULL,
  `dibaca` int(6) NOT NULL,
  PRIMARY KEY  (`id_news`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `news`
-- 

INSERT INTO `news` VALUES (1, '06/16/2011', 'Siap-siap, Ujian Masuk Bersama PT 9 Juli', 'Ujian masuk bersama perguruan tinggi negeri (UMB-PT) 2011 akan digelar pada 9 Juli 2011 mendatang. Ketua Perhimpunan Seleksi Penerimaan Mahasiswa Baru Nusantara (P-SPMBN), Asman Boedisantoso mengatakan, UMB-PT akan mengutamakan kualitas, layanan profesional (cepat akurat) dan mempertimbangkan kesempatan sama yang lebih luas bagi calon mahasiswa untuk memilih perguruan tinggi. Dengan ujian melalui UMB-PT, calon peserta dapat memilih lima sampai tujuh program studi di universitas yang menjadi pilihannya.\r\n\r\n"Ini upaya kami untuk melengkapi. Karena mereka yang tidak lolos seleksi nasional masuk perguruan tinggi negeri (SNMPTN) mempunyai kesempatan untuk mengikuti UMB-PT ini," kata Asman, kepada wartawan, Kamis (16/6/2011), di Universitas Indonesia, Salemba, Jakarta Pusat.\r\n\r\nPada tahun 2011 ini, UMB-PT diikuti oleh 12 perguruan tinggi negeri (PTN) yaitu Universitas Syiah Kuala Malikussaleh, Universitas Sumatera Utara, Universitas Riau, Universitas Jambi, Universitas Negeri Jakarta, UIN Syarif Hidayatullah Jakarta, Universitas Jenderal Soedirman, Universitas Negeri Semarang, Universitas Diponegoro, Universitas Palangka Raya dan UIN Alaudin Makassar. Selain itu, juga diikuti oleh delapan perguruan tinggi swasta (PTS) seperti Universitas Islam Sumatera Utara, Universitas Yarsi, Universitas Bakrie, Universitas Nasional, Universitas Pancasila, Universitas Trisakti, Universitas Widyatama, Universitas Islam Sultan Agung Semarang dan International Development Program.\r\n\r\n"Tahun ini SPMB tampil beda. Tadinya lokal, sekarang go internasional. Ditambah PTS dan IDP, ini adalah kesempatan emas," kata Asman\r\n\r\nAdapun untuk pelaksanaanya, UMB-PT akan digelar secara serentak di sebelas panitia penyelenggara lokal (PPL), yaitu Banda Aceh, Medan, Pekanbaru, Jambi, Jakarta, Lhokseumawe, Purwokerto, Semarang-Unnes, Semarang-Undip, Palangka Raya, Makassar dan 12 outlet di Padang, Palembang, Bengkulu, Lampung, Bogor, Bandung, Cirebon, Tangerang, Yogyakarta, Pontianak, Samarinda dan Surabaya. \r\n\r\nkompas.com', '0952278620X310.JPG', 'Y', 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `poll`
-- 

CREATE TABLE `poll` (
  `id_poll` int(6) NOT NULL auto_increment,
  `jawaban` varchar(100) NOT NULL,
  `counter` int(6) NOT NULL,
  PRIMARY KEY  (`id_poll`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `poll`
-- 

INSERT INTO `poll` VALUES (1, 'Pecel Lele', 0);

-- --------------------------------------------------------

-- 
-- Table structure for table `sekilasinfo`
-- 

CREATE TABLE `sekilasinfo` (
  `id_sekilasinfo` int(6) NOT NULL auto_increment,
  `info` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY  (`id_sekilasinfo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `sekilasinfo`
-- 

INSERT INTO `sekilasinfo` VALUES (1, 'Ujian PMB tgl 9 Juli 2011', '');
INSERT INTO `sekilasinfo` VALUES (2, 'tes ah..', 'Photo-3009.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `stats`
-- 

CREATE TABLE `stats` (
  `ip` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `hit` int(9) NOT NULL,
  `online` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `stats`
-- 

INSERT INTO `stats` VALUES ('127.0.0.1', '2011-06-17', 12, '1308308897');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-06', 2, '1309926505');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-07', 1, '1309995692');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-12', 1, '1310474823');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-13', 22, '1310563614');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-14', 1, '1310614224');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-15', 1, '1310724874');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-17', 1, '1310895146');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-18', 16, '1310966482');
INSERT INTO `stats` VALUES ('127.0.0.1', '2011-07-19', 2, '1311038717');

-- --------------------------------------------------------

-- 
-- Table structure for table `tamu`
-- 

CREATE TABLE `tamu` (
  `id_tamu` int(10) NOT NULL auto_increment,
  `nama` varchar(20) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  PRIMARY KEY  (`id_tamu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tamu`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `web_admin`
-- 

CREATE TABLE `web_admin` (
  `id_user` int(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Dumping data for table `web_admin`
-- 

INSERT INTO `web_admin` VALUES (1, 'admin', 'nimda');
