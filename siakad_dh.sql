-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2011 at 10:49 AM
-- Server version: 5.1.54
-- PHP Version: 5.3.5-1ubuntu7.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad_dh`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_ma`
--

CREATE TABLE IF NOT EXISTS `absensi_ma` (
  `id_absensi` int(100) NOT NULL AUTO_INCREMENT,
  `kelas` tinyint(2) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  PRIMARY KEY (`id_absensi`),
  UNIQUE KEY `id_siswa` (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `absensi_ma`
--

INSERT INTO `absensi_ma` (`id_absensi`, `kelas`, `jurusan`, `id_siswa`) VALUES
(16, 10, 'A', 1303),
(15, 10, 'A', 1302),
(14, 10, 'A', 1301),
(13, 10, 'A', 2334);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_mi`
--

CREATE TABLE IF NOT EXISTS `absensi_mi` (
  `id_absensi` int(100) NOT NULL AUTO_INCREMENT,
  `kelas` tinyint(1) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  PRIMARY KEY (`id_absensi`),
  UNIQUE KEY `id_siswa` (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `absensi_mi`
--

INSERT INTO `absensi_mi` (`id_absensi`, `kelas`, `id_siswa`) VALUES
(15, 1, 1103),
(14, 1, 1102),
(13, 1, 1101),
(16, 2, 1104);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_mts`
--

CREATE TABLE IF NOT EXISTS `absensi_mts` (
  `id_absensi` int(100) NOT NULL AUTO_INCREMENT,
  `kelas` tinyint(1) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  PRIMARY KEY (`id_absensi`),
  UNIQUE KEY `id_siswa` (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `absensi_mts`
--

INSERT INTO `absensi_mts` (`id_absensi`, `kelas`, `id_siswa`) VALUES
(10, 7, 1203),
(9, 7, 1202),
(8, 7, 1201);

-- --------------------------------------------------------

--
-- Table structure for table `absensi_tk`
--

CREATE TABLE IF NOT EXISTS `absensi_tk` (
  `id_absensi` int(100) NOT NULL AUTO_INCREMENT,
  `subkelas` varchar(10) NOT NULL,
  `id_siswa` int(8) NOT NULL,
  PRIMARY KEY (`id_absensi`),
  UNIQUE KEY `id_siswa` (`id_siswa`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `absensi_tk`
--

INSERT INTO `absensi_tk` (`id_absensi`, `subkelas`, `id_siswa`) VALUES
(26, 'Besar', 1005),
(25, 'Besar', 1004),
(24, 'Kecil', 1003),
(23, 'Kecil', 1002),
(22, 'Kecil', 1001),
(27, 'Besar', 1006);

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
  `id_angkatan` int(4) NOT NULL AUTO_INCREMENT,
  `th_ajar` varchar(10) NOT NULL,
  PRIMARY KEY (`id_angkatan`),
  UNIQUE KEY `th_ajar` (`th_ajar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `th_ajar`) VALUES
(2, '2009/2010'),
(3, '2010/2011'),
(4, '2011/2012');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra`
--

CREATE TABLE IF NOT EXISTS `ekstra` (
  `id_ekstra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_ekstra` varchar(40) NOT NULL,
  `tingkat` char(3) NOT NULL,
  `nama_guru` varchar(40) NOT NULL,
  PRIMARY KEY (`id_ekstra`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ekstra`
--

INSERT INTO `ekstra` (`id_ekstra`, `nama_ekstra`, `tingkat`, `nama_guru`) VALUES
(7, 'Pramuka', 'mi', 'Ahmad Anggoro'),
(10, 'Drumband', 'tk', 'Yulianto'),
(8, 'Majelis Taklim', 'mts', 'Joni Prasetyo'),
(9, 'PMR', 'ma', 'Nuris Rozi');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_ma`
--

CREATE TABLE IF NOT EXISTS `ekstra_ma` (
  `id_siswa` int(20) NOT NULL,
  `nama_ekstra` varchar(40) NOT NULL,
  `nilai` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`,`nama_ekstra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_ma`
--

INSERT INTO `ekstra_ma` (`id_siswa`, `nama_ekstra`, `nilai`) VALUES
(1301, 'PMR', 'A'),
(1302, 'PMR', 'A'),
(1303, 'PMR', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_mi`
--

CREATE TABLE IF NOT EXISTS `ekstra_mi` (
  `id_siswa` int(20) NOT NULL,
  `nama_ekstra` varchar(40) NOT NULL,
  `nilai` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`,`nama_ekstra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_mi`
--

INSERT INTO `ekstra_mi` (`id_siswa`, `nama_ekstra`, `nilai`) VALUES
(1101, 'Pramuka', 'A'),
(1102, 'Pramuka', 'A'),
(1103, 'Pramuka', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_mts`
--

CREATE TABLE IF NOT EXISTS `ekstra_mts` (
  `id_siswa` int(20) NOT NULL,
  `nama_ekstra` varchar(40) NOT NULL,
  `nilai` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`,`nama_ekstra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_mts`
--

INSERT INTO `ekstra_mts` (`id_siswa`, `nama_ekstra`, `nilai`) VALUES
(1201, 'Majelis', 'A'),
(1202, 'Majelis', 'A'),
(1203, 'Majelis', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ekstra_tk`
--

CREATE TABLE IF NOT EXISTS `ekstra_tk` (
  `id_siswa` int(20) NOT NULL,
  `nama_ekstra` varchar(40) NOT NULL,
  `nilai` char(1) DEFAULT NULL,
  UNIQUE KEY `id_siswa` (`id_siswa`,`nama_ekstra`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstra_tk`
--

INSERT INTO `ekstra_tk` (`id_siswa`, `nama_ekstra`, `nilai`) VALUES
(1001, 'Drumband', 'A'),
(1002, 'Drumband', 'B'),
(1003, 'Drumband', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `guru_ma`
--

CREATE TABLE IF NOT EXISTS `guru_ma` (
  `status` varchar(3) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `tmp_lahir` varchar(40) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru_ma`
--

INSERT INTO `guru_ma` (`status`, `nip`, `nama_guru`, `alamat`, `telp`, `tmp_lahir`, `tgl_lahir`, `jns_kelamin`, `gambar`) VALUES
('GTT', '2104', 'Nuris Rozi', 'Nganjuk', '', 'Nganjuk', '09/20/2011', 'Laki-laki', 'Photo-3009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mi`
--

CREATE TABLE IF NOT EXISTS `guru_mi` (
  `status` varchar(3) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `tmp_lahir` varchar(40) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru_mi`
--

INSERT INTO `guru_mi` (`status`, `nip`, `nama_guru`, `alamat`, `telp`, `tmp_lahir`, `tgl_lahir`, `jns_kelamin`, `gambar`) VALUES
('GTT', '2102', 'Ahmad Anggoro', 'Nganjuk', '', 'Nganjuk', '09/27/2011', 'Laki-laki', 'Photo-3009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guru_mts`
--

CREATE TABLE IF NOT EXISTS `guru_mts` (
  `status` varchar(3) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `tmp_lahir` varchar(40) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru_mts`
--

INSERT INTO `guru_mts` (`status`, `nip`, `nama_guru`, `alamat`, `telp`, `tmp_lahir`, `tgl_lahir`, `jns_kelamin`, `gambar`) VALUES
('GTT', '2103', 'Joni Prasetyo', 'Nganjuk', '', 'Nganjuk', '09/06/2011', 'Laki-laki', 'Photo-3009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `guru_tk`
--

CREATE TABLE IF NOT EXISTS `guru_tk` (
  `status` varchar(3) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `tmp_lahir` varchar(40) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru_tk`
--

INSERT INTO `guru_tk` (`status`, `nip`, `nama_guru`, `alamat`, `telp`, `tmp_lahir`, `tgl_lahir`, `jns_kelamin`, `gambar`) VALUES
('GTT', '2101', 'Yulianto', 'Nganjuk', '', 'Nganjuk', '09/07/2011', 'Laki-laki', 'Photo-3009.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE IF NOT EXISTS `hari` (
  `id_hari` int(1) NOT NULL AUTO_INCREMENT,
  `hari` varchar(10) NOT NULL,
  PRIMARY KEY (`id_hari`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ma`
--

CREATE TABLE IF NOT EXISTS `jadwal_ma` (
  `id_jadwal` int(30) NOT NULL AUTO_INCREMENT,
  `id_hari` int(1) NOT NULL,
  `jam` varchar(3) NOT NULL,
  `pukul` varchar(20) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `subkelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `jadwal_ma`
--

INSERT INTO `jadwal_ma` (`id_jadwal`, `id_hari`, `jam`, `pukul`, `nama_matpel`, `nama_guru`, `kelas`, `subkelas`) VALUES
(28, 2, 'I', '09.00', 'kimia', 'Nuris Rozi', '10', 'A'),
(27, 1, 'I', '09.00', 'sosiologi', 'Nuris Rozi', '10', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mi`
--

CREATE TABLE IF NOT EXISTS `jadwal_mi` (
  `id_jadwal` int(30) NOT NULL AUTO_INCREMENT,
  `id_hari` int(1) NOT NULL,
  `jam` varchar(3) NOT NULL,
  `pukul` varchar(20) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `jadwal_mi`
--

INSERT INTO `jadwal_mi` (`id_jadwal`, `id_hari`, `jam`, `pukul`, `nama_matpel`, `nama_guru`, `kelas`) VALUES
(29, 2, 'I', '09.00', 'Menari', 'Ahmad Anggoro', '1'),
(28, 1, 'I', '09.00', 'Matematika', 'Ahmad Anggoro', '1'),
(30, 1, 'I', '09.00', 'Matematika 2', 'Ahmad Anggoro', '2'),
(31, 2, 'I', '09.00', 'Menari 2', 'Ahmad Anggoro', '2'),
(32, 1, 'I', '09.00', 'Matetmatika 3', 'Ahmad Anggoro', '3');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_mts`
--

CREATE TABLE IF NOT EXISTS `jadwal_mts` (
  `id_jadwal` int(30) NOT NULL AUTO_INCREMENT,
  `id_hari` int(1) NOT NULL,
  `jam` varchar(3) NOT NULL,
  `pukul` varchar(20) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `jadwal_mts`
--

INSERT INTO `jadwal_mts` (`id_jadwal`, `id_hari`, `jam`, `pukul`, `nama_matpel`, `nama_guru`, `kelas`) VALUES
(21, 1, 'I', '09.00', 'Fisika', 'Joni Prasetyo', '7'),
(22, 2, 'I', '09.00', 'Biologi', 'Joni Prasetyo', '7');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_tk`
--

CREATE TABLE IF NOT EXISTS `jadwal_tk` (
  `id_jadwal` int(30) NOT NULL AUTO_INCREMENT,
  `id_hari` int(1) NOT NULL,
  `jam` varchar(3) NOT NULL,
  `pukul` varchar(20) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `nama_guru` varchar(60) NOT NULL,
  `subkelas` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `jadwal_tk`
--

INSERT INTO `jadwal_tk` (`id_jadwal`, `id_hari`, `jam`, `pukul`, `nama_matpel`, `nama_guru`, `subkelas`) VALUES
(29, 2, 'I', '09.00', 'Menyanyi', 'Yulianto', 'Besar'),
(27, 1, 'I', '09.00', 'Kerajinan Tangan', 'Yulianto', 'Besar'),
(26, 2, 'I', '09.00', 'Menghitung', 'Yulianto', 'Kecil'),
(25, 1, 'I', '09.00', 'Menggambar', 'Yulianto', 'Kecil');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` tinyint(2) NOT NULL AUTO_INCREMENT,
  `jabatan` varchar(100) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tmp_lahir` varchar(100) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `jabatan`, `nama`, `alamat`, `telp`, `jns_kelamin`, `tmp_lahir`, `tgl_lahir`, `gambar`) VALUES
(3, 'Penjaga Sekolah', 'Jumali', 'Kota Nganjuk', '', 'Laki-laki', 'Nganjuk', '09/07/2011', 'Photo-3009.jpg'),
(4, 'waka kurikulum', 'AHMAD KHOTIB', 'GAMBAR', '085730XXXX', 'Laki-laki', 'BLITAR', '09/06/2011', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(2) NOT NULL AUTO_INCREMENT,
  `kelas` int(2) NOT NULL,
  `subkelas` varchar(10) DEFAULT NULL,
  `tingkat` varchar(5) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kelas`, `subkelas`, `tingkat`) VALUES
(23, 0, 'Kecil', 'tk'),
(24, 0, 'Besar', 'tk'),
(25, 1, '', 'mi'),
(26, 2, '', 'mi'),
(27, 3, '', 'mi'),
(28, 4, '', 'mi'),
(29, 5, '', 'mi'),
(30, 6, '', 'mi'),
(31, 7, '', 'mts'),
(32, 8, '', 'mts'),
(33, 9, '', 'mts'),
(34, 10, 'A', 'ma'),
(42, 12, 'IPA', 'ma'),
(41, 11, 'IPS', 'ma'),
(40, 11, 'IPA', 'ma'),
(39, 10, 'B', 'ma'),
(43, 12, 'IPS', 'ma');

-- --------------------------------------------------------

--
-- Table structure for table `matpel_ma`
--

CREATE TABLE IF NOT EXISTS `matpel_ma` (
  `smt` enum('ganjil','genap') NOT NULL,
  `kelas` tinyint(2) NOT NULL,
  `jurusan` varchar(10) NOT NULL,
  `kode_matpel` varchar(20) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `kkm` tinyint(2) DEFAULT NULL,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_matpel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel_ma`
--

INSERT INTO `matpel_ma` (`smt`, `kelas`, `jurusan`, `kode_matpel`, `nama_matpel`, `kkm`, `kategori`) VALUES
('ganjil', 11, 'IPS', '1405', 'ekonomi', 50, 'umum'),
('ganjil', 10, 'A', '1404', 'agama', 50, 'mulok'),
('genap', 10, 'A', '1403', 'geografi', 50, 'umum'),
('ganjil', 10, 'A', '1402', 'kimia', 50, 'mulok'),
('ganjil', 10, 'A', '1401', 'sosiologi', 50, 'umum'),
('ganjil', 11, 'IPS', '1406', 'manajemen', 50, 'mulok'),
('genap', 11, 'IPS', '1407', 'perbankan', 50, 'umum'),
('genap', 11, 'IPS', '1408', 'syariah', 50, 'mulok'),
('ganjil', 11, 'IPA', '1409', 'fisika', 50, 'umum'),
('ganjil', 11, 'IPA', '1410', 'praktikum', 50, 'mulok'),
('genap', 11, 'IPA', '1411', 'biologi', 50, 'umum'),
('genap', 11, 'IPA', '1412', 'lingkungan', 50, 'mulok'),
('ganjil', 12, 'IPS', '1413', 'bisnis', 50, 'umum'),
('ganjil', 12, 'IPS', '1414', 'ritel', 50, 'mulok'),
('genap', 12, 'IPS', '1415', 'fiqih', 50, 'umum'),
('genap', 12, 'IPS', '1416', 'qur an', 50, 'mulok'),
('ganjil', 12, 'IPA', '1417', 'matematika', 50, 'umum'),
('ganjil', 12, 'IPA', '1418', 'komputer', 50, 'mulok'),
('genap', 12, 'IPA', '1419', 'komunikasi', 50, 'umum'),
('genap', 12, 'IPA', '1420', 'digital', 50, 'mulok');

-- --------------------------------------------------------

--
-- Table structure for table `matpel_mi`
--

CREATE TABLE IF NOT EXISTS `matpel_mi` (
  `smt` enum('ganjil','genap') NOT NULL,
  `kelas` tinyint(1) NOT NULL,
  `kode_matpel` varchar(20) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `kkm` tinyint(2) DEFAULT NULL,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_matpel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel_mi`
--

INSERT INTO `matpel_mi` (`smt`, `kelas`, `kode_matpel`, `nama_matpel`, `kkm`, `kategori`) VALUES
('genap', 1, '1204', 'B Indonesia', 50, 'umum'),
('genap', 1, '1203', 'Menyulam', 50, 'mulok'),
('ganjil', 1, '1202', 'Menari', 50, 'mulok'),
('ganjil', 1, '1201', 'Matematika', 50, 'umum'),
('ganjil', 2, '1205', 'Matematika 2', 50, 'umum'),
('ganjil', 2, '1206', 'Menari 2', 50, 'mulok'),
('genap', 2, '1207', 'B Indonesia 2', 50, 'umum'),
('genap', 2, '1208', 'Menyulam 2', 50, 'mulok'),
('ganjil', 3, '1209', 'Matetmatika 3', 50, 'umum'),
('ganjil', 3, '1210', 'menari 3', 50, 'mulok'),
('genap', 3, '1211', 'B Indonesia 3', 50, 'umum'),
('genap', 3, '1212', 'menyulam 3', 50, 'mulok'),
('ganjil', 4, '1213', 'Matematika 4', 50, 'umum'),
('ganjil', 4, '1214', 'Menari 4', 50, 'mulok'),
('genap', 4, '1215', 'B Indonesia 4', 50, 'umum'),
('genap', 4, '1216', 'menyulam 4', 50, 'mulok'),
('ganjil', 5, '1217', 'matematika 5', 50, 'umum'),
('ganjil', 5, '1218', 'menari 5', 50, 'mulok'),
('genap', 5, '1219', 'B Indonesia 5', 50, 'umum'),
('genap', 5, '1220', 'menyulam 5', 50, 'mulok'),
('ganjil', 6, '1221', 'matematika 6', 50, 'umum'),
('ganjil', 6, '1222', 'menari 6', 50, 'mulok'),
('genap', 6, '1223', 'b indonesia 6', 50, 'umum'),
('genap', 6, '1224', 'menyulam 6', 50, 'mulok');

-- --------------------------------------------------------

--
-- Table structure for table `matpel_mts`
--

CREATE TABLE IF NOT EXISTS `matpel_mts` (
  `kode_matpel` varchar(30) NOT NULL,
  `smt` enum('ganjil','genap') NOT NULL,
  `kelas` tinyint(1) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `kkm` tinyint(2) DEFAULT NULL,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_matpel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel_mts`
--

INSERT INTO `matpel_mts` (`kode_matpel`, `smt`, `kelas`, `nama_matpel`, `kkm`, `kategori`) VALUES
('1303', 'genap', 7, 'Ekonomi', 50, 'umum'),
('1302', 'ganjil', 7, 'Biologi', 50, 'mulok'),
('1301', 'ganjil', 7, 'Fisika', 50, 'umum'),
('1304', 'genap', 7, 'Pembukuan', 50, 'mulok'),
('1305', 'ganjil', 8, 'Fisika 2', 50, 'umum'),
('1306', 'ganjil', 8, 'Biologi 2', 50, 'mulok'),
('1307', 'genap', 8, 'Ekonomi 2', 50, 'umum'),
('1308', 'genap', 8, 'pembukuan 2', 50, 'mulok'),
('1309', 'ganjil', 9, 'Fisika 3', 50, 'umum'),
('1310', 'ganjil', 9, 'Biologi 3', 50, 'mulok'),
('1311', 'genap', 9, 'ekonomi 3', 50, 'umum'),
('1312', 'genap', 9, 'pembukuan 3', 50, 'mulok');

-- --------------------------------------------------------

--
-- Table structure for table `matpel_tk`
--

CREATE TABLE IF NOT EXISTS `matpel_tk` (
  `kode_matpel` varchar(30) NOT NULL,
  `smt` enum('ganjil','genap') NOT NULL,
  `tgk` varchar(10) NOT NULL,
  `nama_matpel` varchar(40) NOT NULL,
  `kkm` tinyint(2) DEFAULT NULL,
  `kategori` varchar(20) NOT NULL,
  PRIMARY KEY (`kode_matpel`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matpel_tk`
--

INSERT INTO `matpel_tk` (`kode_matpel`, `smt`, `tgk`, `nama_matpel`, `kkm`, `kategori`) VALUES
('1103', 'genap', 'Kecil', 'Menulis', 50, 'umum'),
('1102', 'ganjil', 'Kecil', 'Menggambar', 50, 'mulok'),
('1101', 'ganjil', 'Kecil', 'Menghitung', 50, 'umum'),
('1104', 'genap', 'Kecil', 'Membaca', 50, 'umum'),
('1105', 'ganjil', 'Besar', 'Kerajinan Tangan', 50, 'umum'),
('1106', 'ganjil', 'Besar', 'Menyanyi', 50, 'mulok'),
('1107', 'genap', 'Besar', 'Menggunting', 50, 'umum'),
('1108', 'genap', 'Besar', 'Mewarnai', 50, 'mulok'),
('1109', 'ganjil', 'Kecil', 'Menggunting', 50, 'umum');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_ma`
--

CREATE TABLE IF NOT EXISTS `nilai_ma` (
  `id_siswa` int(10) NOT NULL,
  `kode_matpel` varchar(20) NOT NULL,
  `nilai` int(3) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_matpel`,`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_ma`
--

INSERT INTO `nilai_ma` (`id_siswa`, `kode_matpel`, `nilai`, `tahun`) VALUES
(1302, '1401', 78, '2011/2012'),
(1302, '1402', 78, '2011/2012'),
(1301, '1402', 78, '2011/2012'),
(1301, '1404', NULL, '2011/2012'),
(1303, '1402', 78, '2011/2012'),
(1303, '1401', 78, '2011/2012'),
(1301, '1401', 90, '2011/2012');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mi`
--

CREATE TABLE IF NOT EXISTS `nilai_mi` (
  `id_siswa` int(10) NOT NULL,
  `kode_matpel` varchar(20) NOT NULL,
  `nilai` tinyint(3) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_matpel`,`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_mi`
--

INSERT INTO `nilai_mi` (`id_siswa`, `kode_matpel`, `nilai`, `tahun`) VALUES
(1102, '1202', 67, '2011/2012'),
(1101, '1201', 67, '2011/2012'),
(1101, '1202', 67, '2011/2012'),
(1102, '1201', 67, '2011/2012'),
(1103, '1202', 67, '2011/2012'),
(1103, '1201', 67, '2011/2012'),
(1105, '1202', NULL, '2011/2012'),
(1105, '1201', NULL, '2011/2012');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_mts`
--

CREATE TABLE IF NOT EXISTS `nilai_mts` (
  `id_siswa` int(10) NOT NULL,
  `kode_matpel` varchar(20) NOT NULL,
  `nilai` tinyint(3) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`kode_matpel`,`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_mts`
--

INSERT INTO `nilai_mts` (`id_siswa`, `kode_matpel`, `nilai`, `tahun`) VALUES
(1202, '1302', 78, '2011/2012'),
(1201, '1301', 89, '2011/2012'),
(1201, '1302', 78, '2011/2012'),
(1202, '1301', 78, '2011/2012'),
(1203, '1302', 78, '2011/2012'),
(1203, '1301', 78, '2011/2012');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_tk`
--

CREATE TABLE IF NOT EXISTS `nilai_tk` (
  `id_siswa` int(10) NOT NULL,
  `kode_matpel` varchar(20) NOT NULL,
  `nilai` tinyint(3) DEFAULT NULL,
  `tahun` varchar(10) NOT NULL,
  PRIMARY KEY (`id_siswa`,`kode_matpel`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_tk`
--

INSERT INTO `nilai_tk` (`id_siswa`, `kode_matpel`, `nilai`, `tahun`) VALUES
(1002, '1101', 89, '2011/2012'),
(1002, '1102', 78, '2011/2012'),
(1001, '1101', 89, '2011/2012'),
(1001, '1102', 78, '2011/2012'),
(1003, '1102', 78, '2011/2012'),
(1003, '1101', 89, '2011/2012');

-- --------------------------------------------------------

--
-- Table structure for table `siakad_admin`
--

CREATE TABLE IF NOT EXISTS `siakad_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siakad_admin`
--

INSERT INTO `siakad_admin` (`username`, `password`) VALUES
('admin', 'nimda');

-- --------------------------------------------------------

--
-- Table structure for table `siakad_guru`
--

CREATE TABLE IF NOT EXISTS `siakad_guru` (
  `id_user` int(9) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` char(3) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `siakad_guru`
--

INSERT INTO `siakad_guru` (`id_user`, `nama_guru`, `username`, `password`, `level`) VALUES
(10, 'Joni Prasetyo', 'joni', 'joni', 'mts'),
(9, 'Ahmad Anggoro', 'ahmad', 'ahmad', 'mi'),
(8, 'Yulianto', 'yuli', 'yuli', 'tk'),
(11, 'Nuris Rozi', 'nuris', 'nuris', 'ma');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_ma`
--

CREATE TABLE IF NOT EXISTS `siswa_ma` (
  `angkatan` varchar(10) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `denah` text,
  `telp` int(15) DEFAULT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `tmp_lahir` varchar(60) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `status_anak` varchar(20) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `kerja_ayah` varchar(100) NOT NULL,
  `almt_ayah` varchar(100) NOT NULL,
  `telp_ayah` int(15) DEFAULT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `almt_ibu` varchar(100) NOT NULL,
  `telp_ibu` int(15) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `kerja_wali` varchar(100) DEFAULT NULL,
  `almt_wali` varchar(100) DEFAULT NULL,
  `telp_wali` int(15) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nisn` (`nisn`),
  UNIQUE KEY `no_ijazah` (`no_ijazah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_ma`
--

INSERT INTO `siswa_ma` (`angkatan`, `id_siswa`, `nisn`, `nama_siswa`, `alamat`, `asal_sekolah`, `denah`, `telp`, `tgl_lahir`, `tmp_lahir`, `jns_kelamin`, `anak_ke`, `status_anak`, `no_ijazah`, `nama_ayah`, `kerja_ayah`, `almt_ayah`, `telp_ayah`, `nama_ibu`, `kerja_ibu`, `almt_ibu`, `telp_ibu`, `nama_wali`, `kerja_wali`, `almt_wali`, `telp_wali`, `gambar`, `password`) VALUES
('2011/2012', 1305, 1305, 'Andang laksono', 'Nganjuk', 'MTS', '', 0, '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1305', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1305'),
('2011/2012', 1304, 1304, 'Pujian Tomi', 'Nganjuk', 'MTS', '', 0, '09/30/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1304', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1304'),
('2011/2012', 1303, 1303, 'Linggar Eka', 'Nganjuk', 'MTS', '', 0, '09/23/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1303', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1303'),
('2011/2012', 1302, 1302, 'Eko Wahyu', 'Nganjuk', 'MTS', '', 0, '09/13/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1302', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1302'),
('2011/2012', 1301, 1301, 'Akhas Yulianto', 'Nganjuk', 'MTS', '', 0, '09/29/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1301', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1301'),
('2011/2012', 1306, 1306, 'Perdana Hari', 'Nganjuk', 'MTS', '', 0, '09/08/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1306', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1306'),
('2011/2012', 1307, 1307, 'Hadi Purwanto', 'Nganjuk', 'MTS', '', 0, '09/13/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1307', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1307'),
('2011/2012', 1308, 1308, 'Andi Nugroho', 'Nganjuk', 'MTS', '', 0, '09/23/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1308', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1308'),
('2011/2012', 1309, 1309, 'Syaiful Arif', 'nganjuk', 'MTS', '', 0, '09/15/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1309', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1309'),
('2011/2012', 1310, 1310, 'Nurfan Dzihan', 'Nganjuk', 'MTS', '', 0, '09/07/2011', 'nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1310', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1310'),
('2011/2012', 1311, 1311, 'Achmad Mustofa', 'Nganjuk', 'MTS', '', 0, '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1311', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1311'),
('2011/2012', 1312, 1312, 'Sudi Mulyono', 'Nganjuk', 'MTS', '', 0, '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1312', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1312'),
('2011/2012', 1313, 1313, 'Ahmad Afifudin', 'Nganjuk', 'MTS', '', 0, '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1313', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1313'),
('2011/2012', 1314, 1314, 'Gandi Pratama', 'Nganjuk', 'MTS', '', 0, '09/06/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1314', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1314'),
('2011/2012', 1315, 1315, 'Mulyadi', 'Nganjuk', 'MTS', '', 0, '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1315', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1315'),
('2011/2012', 1316, 1316, 'Ahmad Anim', 'Nganjuk', 'MTS', '', 0, '09/15/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1316', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1316'),
('2011/2012', 1317, 1317, 'Ismail abbas', 'Nganjuk', 'MTS', '', 0, '09/16/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1317', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1317'),
('2011/2012', 1318, 1318, 'Ahmad Dodik', 'Nganjuk', 'MTS', '', 0, '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1318', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1318');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_mi`
--

CREATE TABLE IF NOT EXISTS `siswa_mi` (
  `angkatan` varchar(10) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `denah` text,
  `tgl_lahir` varchar(20) NOT NULL,
  `tmp_lahir` varchar(60) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `status_anak` varchar(20) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `kerja_ayah` varchar(100) NOT NULL,
  `almt_ayah` varchar(100) NOT NULL,
  `telp_ayah` int(15) DEFAULT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `almt_ibu` varchar(100) NOT NULL,
  `telp_ibu` int(15) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `kerja_wali` varchar(100) DEFAULT NULL,
  `almt_wali` varchar(100) DEFAULT NULL,
  `telp_wali` int(15) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nisn` (`nisn`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_mi`
--

INSERT INTO `siswa_mi` (`angkatan`, `id_siswa`, `nisn`, `nama_siswa`, `alamat`, `asal_sekolah`, `denah`, `tgl_lahir`, `tmp_lahir`, `jns_kelamin`, `anak_ke`, `status_anak`, `no_ijazah`, `nama_ayah`, `kerja_ayah`, `almt_ayah`, `telp_ayah`, `nama_ibu`, `kerja_ibu`, `almt_ibu`, `telp_ibu`, `nama_wali`, `kerja_wali`, `almt_wali`, `telp_wali`, `gambar`, `password`) VALUES
('2011/2012', 1104, 1104, 'Fuad Fauzi', 'Nganjuk', 'TK Pembina', '', '09/09/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1104', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1104'),
('2011/2012', 1103, 1103, 'Fachry Sultoni', 'Nganjuk', 'TK Pembina', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1103', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1103'),
('2011/2012', 1102, 1102, 'Fachrul Kurniawan', 'Nganjuk', 'TK Pembina', '', '09/28/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1102', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1102'),
('2011/2012', 1101, 1101, 'Feri Nuryanto', 'Nganjuk', 'TK Pembina', '', '09/15/2011', 'nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1101', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1101'),
('2011/2012', 1105, 1105, 'Abdul Wahab', 'nganjuk', 'TK Pembina', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1105', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1105'),
('2011/2012', 1106, 1106, 'Agung Kridanto', 'Nganjuk', 'TK Pembina', '', '09/15/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1106', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1106'),
('2011/2012', 1107, 1107, 'Ahmad Ero', 'Nganjuk', 'TK Pembina', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1107', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1107'),
('2011/2012', 1108, 1108, 'Angki Wahyu', 'Nganjuk', 'TK Pembina', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1108', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1108'),
('2011/2012', 1109, 1109, 'Widi Sasmito', 'Nganjuk', 'TK Pembina', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1109', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1109'),
('2011/2012', 1110, 1110, 'Nizar Fahmi', 'Nganjuk', 'TK Pembina', '', '09/22/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1110', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1110'),
('2011/2012', 1111, 1111, 'Fachrurrozi', 'Nganjuk', 'TK Pembina', '', '09/28/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1111', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1111'),
('2011/2012', 1112, 1112, 'Ahmad Zaini', 'Nganjuk', 'TK Pembina', '', '09/12/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1112', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1112'),
('2011/2012', 1113, 1113, 'Guntur Purbo', 'Nganjuk', 'TK Pembina', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1113', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1113'),
('2011/2012', 1114, 1114, 'Eka Sandi', 'Nganjuk', 'TK Pembina', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1114', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1114'),
('2011/2012', 1115, 1115, 'Ramjid Rizai', 'Nganjuk', 'TK Pembina', '', '09/13/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1115', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', ''),
('2011/2012', 1116, 1116, 'Ilham Zuhri', 'Nganjuk', 'TK Pembina', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1116', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'sad', 0, '', '', '', 0, 'Photo-3009.jpg', '1116'),
('2011/2012', 1117, 1117, 'David Eka', 'Nganjuk', 'TK Pembina', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1117', 'asdf', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1117'),
('2011/2012', 1118, 1118, 'Chandra Mahendra', 'Nganjuk', 'TK pembina', '', '09/08/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1118', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1118');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_mts`
--

CREATE TABLE IF NOT EXISTS `siswa_mts` (
  `angkatan` varchar(10) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `nisn` int(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `denah` text,
  `tgl_lahir` varchar(20) NOT NULL,
  `tmp_lahir` varchar(60) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `status_anak` varchar(20) NOT NULL,
  `no_ijazah` varchar(50) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `kerja_ayah` varchar(100) NOT NULL,
  `almt_ayah` varchar(100) NOT NULL,
  `telp_ayah` int(15) DEFAULT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `almt_ibu` varchar(100) NOT NULL,
  `telp_ibu` int(15) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `kerja_wali` varchar(100) DEFAULT NULL,
  `almt_wali` varchar(100) DEFAULT NULL,
  `telp_wali` int(15) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nisn` (`nisn`),
  UNIQUE KEY `no_ijazah` (`no_ijazah`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_mts`
--

INSERT INTO `siswa_mts` (`angkatan`, `id_siswa`, `nisn`, `nama_siswa`, `alamat`, `asal_sekolah`, `denah`, `tgl_lahir`, `tmp_lahir`, `jns_kelamin`, `anak_ke`, `status_anak`, `no_ijazah`, `nama_ayah`, `kerja_ayah`, `almt_ayah`, `telp_ayah`, `nama_ibu`, `kerja_ibu`, `almt_ibu`, `telp_ibu`, `nama_wali`, `kerja_wali`, `almt_wali`, `telp_wali`, `gambar`, `password`) VALUES
('2011/2012', 1203, 1203, 'Setya Yudha', 'Nganjuk', 'MI', '', '09/15/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1203', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1203'),
('2011/2012', 1202, 1202, 'Yudha Satya', 'Nganjuk', 'MI', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1202', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1202'),
('2011/2012', 1201, 1201, 'Rengga Yudha', 'Nganjuk', 'MI', '', '09/06/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1201', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1201'),
('2011/2012', 1204, 1204, 'Bramantya Andi', 'Nganjuk', 'MI', '', '09/07/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1204', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1204'),
('2011/2012', 1205, 1205, 'Dimas permana', 'Nganjuk', 'MI', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1205', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1205'),
('2011/2012', 1206, 1206, 'Wildan Gunardi', 'Nganjuk', 'MI', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1206', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1206'),
('2011/2012', 1207, 1207, 'Mawaddah', 'Blitar', 'MI', '', '09/07/2011', 'Nganjuk', 'Perempuan', 1, 'Anak Kandung', '1207', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', ''),
('2011/2012', 1208, 1208, 'Yusuf Mansur', 'Nganjuk', 'MI', '', '09/14/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1208', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1208'),
('2011/2012', 1209, 1209, 'Syaiful Jamil', 'Nganjuk', 'MI', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', '1209', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1209'),
('2011/2012', 1210, 1210, 'Ahmad Zuhri', 'Blitar', 'MI', '', '09/14/1997', 'Blitar', 'Laki-laki', 1, 'Anak Kandung', '1210', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1210');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_tk`
--

CREATE TABLE IF NOT EXISTS `siswa_tk` (
  `angkatan` varchar(10) NOT NULL,
  `id_siswa` int(100) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `denah` text,
  `tgl_lahir` varchar(20) NOT NULL,
  `tmp_lahir` varchar(60) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `status_anak` varchar(20) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `kerja_ayah` varchar(100) NOT NULL,
  `almt_ayah` varchar(100) NOT NULL,
  `telp_ayah` int(15) DEFAULT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `kerja_ibu` varchar(100) NOT NULL,
  `almt_ibu` varchar(100) NOT NULL,
  `telp_ibu` int(15) DEFAULT NULL,
  `nama_wali` varchar(50) DEFAULT NULL,
  `kerja_wali` varchar(100) DEFAULT NULL,
  `almt_wali` varchar(100) DEFAULT NULL,
  `telp_wali` int(15) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_tk`
--

INSERT INTO `siswa_tk` (`angkatan`, `id_siswa`, `nama_siswa`, `alamat`, `denah`, `tgl_lahir`, `tmp_lahir`, `jns_kelamin`, `anak_ke`, `status_anak`, `nama_ayah`, `kerja_ayah`, `almt_ayah`, `telp_ayah`, `nama_ibu`, `kerja_ibu`, `almt_ibu`, `telp_ibu`, `nama_wali`, `kerja_wali`, `almt_wali`, `telp_wali`, `gambar`, `password`) VALUES
('2011/2012', 1001, 'Angga Zaaldian', 'Nganjuk', '', '09/21/1990', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', 'asdf', 'asdf', 'asdf', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1001'),
('2011/2012', 1002, 'Andik Nurcholis', 'Nganjuk', '', '09/13/1990', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1002'),
('2011/2012', 1003, 'Feril Irawan', 'Nganjuk', '', '09/22/1990', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1003'),
('2011/2012', 1004, 'Lutvi Ardicha', 'Nganjuk', '', '09/12/1990', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1004'),
('2011/2012', 1005, 'Rudi Setiawan', 'Nganjuk', '', '09/21/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1005'),
('2011/2012', 1006, 'Khoirul Mustain', 'Nganjuk', '', '09/22/2011', 'Nganjuk', 'Laki-laki', 1, 'Anak Kandung', 'asd', 'asd', 'asd', 0, 'asd', 'asd', 'asd', 0, '', '', '', 0, 'Photo-3009.jpg', '1006');
