-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2015 at 05:05 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `infodesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbair_panas`
--

CREATE TABLE IF NOT EXISTS `tbair_panas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbair_panas`
--

INSERT INTO `tbair_panas` (`id`, `nama`, `posisi`) VALUES
(1, 'Gunung Berapi', 1),
(2, 'Geiser', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbakun`
--

CREATE TABLE IF NOT EXISTS `tbakun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` text NOT NULL,
  `desa` varchar(225) NOT NULL,
  `kec` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbakun`
--

INSERT INTO `tbakun` (`id`, `username`, `password`, `desa`, `kec`) VALUES
(1, 'admin', 'f41ce6c07a62823ec45233320973f58a', 'GARUDA', 'INDONESIA'),
(2, 'indra', '4beced2d9b202869bb435ae8f1073a2b', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbalat_produksi`
--

CREATE TABLE IF NOT EXISTS `tbalat_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbalat_produksi`
--

INSERT INTO `tbalat_produksi` (`id`, `nama`, `satuan`, `posisi`) VALUES
(1, 'Keramba', 'Unit', 1),
(3, 'Tambak', 'ha', 2),
(4, 'Jermal', 'Unit', 3),
(5, 'Pancing', 'Unit', 4),
(6, 'Pukat', 'Unit', 5),
(7, 'Jala', 'Unit', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbaliran_kepercayaan`
--

CREATE TABLE IF NOT EXISTS `tbaliran_kepercayaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbaliran_kepercayaan`
--

INSERT INTO `tbaliran_kepercayaan` (`id`, `nama`, `posisi`) VALUES
(1, 'Islam', 1),
(3, 'Kristen', 2),
(4, 'Hindu', 3),
(5, 'Budha', 4),
(6, 'Katholik', 5),
(7, 'Khonghucu', 6),
(8, 'Kepercayaan pada Tuhan YME', 7),
(9, 'Aliran Kepercayaan lainnya', 8),
(10, 'Jumlah', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbcacat_mental`
--

CREATE TABLE IF NOT EXISTS `tbcacat_mental` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbcacat_mental`
--

INSERT INTO `tbcacat_mental` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Tuna Rungu', 1, 1),
(2, 'Tuna Wicara', 1, 2),
(4, 'Idiot', 2, 1),
(5, 'Gila', 2, 2),
(7, 'Tuna Netra', 1, 3),
(8, 'Lumpuh', 1, 4),
(9, 'Sumbing', 1, 5),
(10, 'Cacat kulit', 1, 6),
(11, 'Lainnya', 1, 7),
(12, 'Stres', 2, 3),
(13, 'Autis', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbdampak_pengolahan`
--

CREATE TABLE IF NOT EXISTS `tbdampak_pengolahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbdampak_pengolahan`
--

INSERT INTO `tbdampak_pengolahan` (`id`, `nama`, `posisi`) VALUES
(3, 'Pencemaran Udara', 2),
(2, 'Pencemaran Air', 3),
(4, 'Longsor/Erosi', 4),
(13, 'Terjadinya Lahan Kritis', 13),
(6, 'Bising', 6),
(7, 'Kerusakan Biota/ Plasme Nuftah Hutan', 7),
(8, 'Kemusnahan Flora, Fauna, dan Satwa Langka', 8),
(9, 'Hilangnya Sumber Mata air', 9),
(10, 'Kebakaran Hutan', 10),
(11, 'Terjadinya Kekeringan/ Sulit air', 11),
(12, 'Berubahnya Fungsi Hutan', 12),
(14, 'Hilangnya Daerah Tangkapan AIr (Catchment Area)', 14),
(15, 'Musnahnya Habitat Binatang Hutan', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbetnis`
--

CREATE TABLE IF NOT EXISTS `tbetnis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `tbetnis`
--

INSERT INTO `tbetnis` (`id`, `nama`, `posisi`) VALUES
(1, 'Aceh', 1),
(2, 'Batak', 2),
(4, 'Nias', 3),
(5, 'Mentawai', 4),
(6, 'Melayu', 5),
(7, 'Minang', 6),
(8, 'Kubu', 7),
(9, 'Anak Dalam', 8),
(10, 'Badui', 9),
(11, 'Betawi', 10),
(12, 'Sunda', 11),
(13, 'Jawa', 12),
(14, 'Madura', 13),
(15, 'Bali', 14),
(16, 'Banjar', 15),
(17, 'Dayak ', 16),
(18, 'Bugis', 17),
(19, 'Makasar', 18),
(20, 'Mandar', 19),
(21, 'Sasak', 20),
(22, 'Ambon', 21),
(23, 'Minahasa', 22),
(24, 'Flores', 23),
(25, 'Papua', 24),
(26, 'Timor', 25),
(27, 'Sabu', 26),
(28, 'Rote', 27),
(29, 'Sumba', 28),
(30, 'Ternate', 29),
(31, 'Tolaki', 30),
(32, 'Butan', 31),
(33, 'Muna', 32),
(34, 'Mikongga', 33),
(35, 'Wanci', 34),
(36, 'Alor', 35),
(37, 'Benoa', 36),
(38, 'Tunjung', 37),
(39, 'Mbojo', 38),
(40, 'Samawa', 39),
(41, 'Asia', 40),
(42, 'Afrika', 41),
(43, 'Australia', 42),
(44, 'China ', 43),
(45, 'Amerika', 44),
(46, 'Eropa', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tbhasil_hutan`
--

CREATE TABLE IF NOT EXISTS `tbhasil_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbhasil_hutan`
--

INSERT INTO `tbhasil_hutan` (`id`, `nama`, `satuan`, `posisi`) VALUES
(3, 'Kayu ', 'M3/th', 2),
(2, 'Madu Lebah', 'Liter', 3),
(4, 'Jati', 'M3/th', 4),
(5, 'Kayu Cendana', 'Ton/th', 5),
(6, 'Bambu', 'M3/th', 6),
(7, 'Kayu Gaharu', 'Ton/th', 7),
(8, 'Gambir', 'Ton/th', 8),
(9, 'Sarang Burung', 'Ton/th', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbhasil_perkebunan`
--

CREATE TABLE IF NOT EXISTS `tbhasil_perkebunan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbhasil_perkebunan`
--

INSERT INTO `tbhasil_perkebunan` (`id`, `nama`, `posisi`) VALUES
(1, 'Kelapa', 1),
(2, 'Karet', 2),
(4, 'Jambu Mete', 3),
(5, 'Tembakau', 4),
(6, 'Pala', 5),
(7, 'Vanili', 6),
(8, 'Jarak Pagar', 7),
(9, 'Jarak Kepyar', 8),
(10, 'Tebu', 9),
(11, 'Kapuk', 10),
(12, 'Kemiri', 11),
(13, 'Teh', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbhasil_ternak`
--

CREATE TABLE IF NOT EXISTS `tbhasil_ternak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbhasil_ternak`
--

INSERT INTO `tbhasil_ternak` (`id`, `nama`, `posisi`) VALUES
(1, 'Dendeng', 1),
(3, 'Abon', 2),
(4, 'Penyamakan Kulit', 3),
(5, 'Madu Lebah', 4),
(6, 'Biogas', 5),
(7, 'Telur Asin', 6),
(8, 'Krupuk Kulit', 7),
(9, 'Kerajinan Tangan (Handy Craft)', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbinput_lembaga`
--

CREATE TABLE IF NOT EXISTS `tbinput_lembaga` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbinput_lembaga`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbinput_monografi`
--

CREATE TABLE IF NOT EXISTS `tbinput_monografi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `idmain` int(11) NOT NULL,
  `idsub2` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

--
-- Dumping data for table `tbinput_monografi`
--

INSERT INTO `tbinput_monografi` (`id`, `idkat`, `idunik`, `idsub`, `idmain`, `idsub2`, `nilai`, `bulan`, `tahun`) VALUES
(1, 1, 1, 2, 0, 0, 'Sindangsari', 1, 2015),
(2, 1, 1, 3, 0, 0, '1998', 1, 2015),
(3, 1, 1, 4, 0, 0, 'gdgdg', 1, 2015),
(4, 1, 1, 5, 0, 0, '3535355', 1, 2015),
(5, 1, 1, 6, 0, 0, '44192', 1, 2015),
(6, 1, 1, 7, 0, 0, 'Leuwigoong', 1, 2015),
(7, 1, 1, 8, 0, 0, 'Garut', 1, 2015),
(8, 1, 1, 9, 0, 0, 'Jawa Barat', 1, 2015),
(9, 2, 1, 1, 0, 0, 'sad', 3, 2015),
(10, 2, 1, 2, 0, 0, 'asd', 3, 2015),
(11, 2, 1, 3, 2, 0, 'adfd', 3, 2015),
(12, 2, 1, 4, 0, 0, '', 3, 2015),
(13, 2, 1, 5, 0, 0, '', 3, 2015),
(14, 2, 1, 6, 0, 0, 'sfsg', 3, 2015),
(15, 2, 1, 8, 0, 0, '', 3, 2015),
(16, 2, 1, 9, 0, 0, '', 3, 2015),
(17, 2, 1, 10, 0, 0, '', 3, 2015),
(18, 2, 1, 11, 5, 0, 'sff', 3, 2015),
(19, 2, 1, 12, 5, 0, 'sfsdf', 3, 2015),
(20, 2, 1, 13, 5, 0, 'gfsgfs', 3, 2015),
(21, 2, 1, 14, 5, 0, 'sfsg', 3, 2015),
(22, 2, 1, 15, 6, 0, 'sgsfg', 3, 2015),
(23, 2, 1, 16, 6, 0, '', 3, 2015),
(24, 2, 1, 17, 6, 0, '', 3, 2015),
(25, 2, 1, 18, 6, 0, '', 3, 2015),
(26, 2, 1, 19, 8, 0, '', 3, 2015),
(27, 2, 1, 20, 8, 0, '', 3, 2015),
(28, 2, 1, 21, 8, 0, '', 3, 2015),
(29, 2, 1, 22, 8, 0, '', 3, 2015),
(30, 2, 1, 23, 8, 0, '', 3, 2015),
(31, 2, 1, 24, 10, 0, 'ss', 3, 2015),
(32, 2, 1, 25, 10, 0, '', 3, 2015),
(33, 2, 1, 26, 10, 24, 'sgs', 3, 2015),
(34, 2, 1, 27, 10, 24, '', 3, 2015),
(35, 2, 1, 28, 10, 24, '', 3, 2015),
(36, 2, 1, 29, 10, 24, '', 3, 2015),
(37, 2, 1, 30, 10, 24, '', 3, 2015),
(38, 2, 1, 31, 11, 24, '', 3, 2015),
(39, 2, 1, 32, 11, 24, '', 3, 2015),
(40, 2, 1, 33, 10, 25, '', 3, 2015),
(41, 2, 1, 34, 10, 25, '', 3, 2015),
(42, 2, 1, 35, 10, 25, '', 3, 2015),
(43, 2, 1, 36, 10, 25, '', 3, 2015),
(44, 2, 1, 37, 10, 0, '', 3, 2015),
(45, 2, 1, 38, 0, 0, '', 3, 2015),
(46, 2, 1, 39, 0, 0, '', 3, 2015),
(47, 2, 1, 40, 0, 0, '', 3, 2015),
(48, 2, 1, 41, 40, 0, '', 3, 2015),
(49, 2, 1, 42, 40, 0, '', 3, 2015),
(50, 2, 1, 43, 40, 0, '', 3, 2015),
(51, 2, 1, 44, 40, 0, '', 3, 2015),
(52, 2, 1, 45, 40, 0, '', 3, 2015),
(53, 2, 1, 46, 40, 42, '', 3, 2015),
(54, 2, 1, 47, 40, 42, '', 3, 2015),
(55, 2, 1, 48, 40, 42, '', 3, 2015),
(56, 2, 1, 49, 40, 43, '', 3, 2015),
(57, 2, 1, 50, 40, 43, '', 3, 2015),
(58, 2, 1, 51, 40, 43, '', 3, 2015),
(59, 2, 1, 52, 40, 43, '', 3, 2015),
(60, 2, 1, 53, 40, 43, '', 3, 2015),
(61, 2, 1, 54, 40, 43, '', 3, 2015),
(62, 2, 1, 55, 40, 43, '', 3, 2015),
(63, 2, 1, 56, 40, 44, '', 3, 2015),
(64, 2, 1, 57, 40, 44, '', 3, 2015),
(65, 2, 1, 58, 40, 44, '', 3, 2015),
(66, 2, 1, 59, 40, 44, '', 3, 2015),
(67, 2, 1, 60, 40, 44, '', 3, 2015),
(68, 2, 1, 61, 40, 44, '', 3, 2015),
(69, 2, 1, 62, 40, 45, '', 3, 2015),
(70, 2, 1, 63, 40, 45, '', 3, 2015),
(71, 2, 1, 64, 40, 45, '', 3, 2015),
(72, 2, 1, 65, 40, 45, '', 3, 2015),
(73, 2, 1, 66, 40, 45, '', 3, 2015),
(74, 2, 1, 67, 40, 45, 'sdfsfs', 3, 2015),
(75, 7, 1, 1, 0, 0, '9', 3, 2015),
(76, 7, 1, 2, 0, 0, '3', 3, 2015),
(77, 7, 1, 3, 0, 0, 'e', 3, 2015),
(78, 7, 1, 4, 0, 0, 'd', 3, 2015),
(79, 7, 1, 5, 0, 0, '', 3, 2015),
(80, 7, 1, 6, 0, 0, 'd', 3, 2015),
(81, 7, 1, 7, 0, 0, 'e', 3, 2015),
(82, 7, 1, 8, 0, 0, '', 3, 2015),
(83, 7, 1, 9, 4, 0, '', 3, 2015),
(84, 7, 1, 10, 4, 0, '', 3, 2015),
(85, 7, 1, 11, 4, 0, 'e', 3, 2015),
(86, 7, 1, 12, 4, 0, 'd', 3, 2015),
(87, 7, 1, 13, 4, 0, 'd', 3, 2015),
(88, 7, 1, 14, 4, 0, '', 3, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `tbinput_p2`
--

CREATE TABLE IF NOT EXISTS `tbinput_p2` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Dumping data for table `tbinput_p2`
--

INSERT INTO `tbinput_p2` (`id`, `idkat`, `idunik`, `idsub`, `tipe`, `nilai`, `tahun`) VALUES
(45, 4, 1, 1, 0, '4', 2015),
(46, 4, 1, 3, 0, '5', 2015),
(47, 4, 1, 4, 0, '3', 2015),
(48, 4, 1, 5, 0, '5', 2015),
(49, 4, 1, 6, 0, '5', 2015),
(50, 4, 1, 7, 0, '3', 2015),
(51, 4, 1, 8, 0, '5', 2015),
(52, 4, 1, 9, 0, '6', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `tbinput_p2k`
--

CREATE TABLE IF NOT EXISTS `tbinput_p2k` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=160 ;

--
-- Dumping data for table `tbinput_p2k`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbinput_sarpras`
--

CREATE TABLE IF NOT EXISTS `tbinput_sarpras` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbinput_sarpras`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbinput_sarpras2`
--

CREATE TABLE IF NOT EXISTS `tbinput_sarpras2` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `idmain` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbinput_sarpras2`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbinput_sda`
--

CREATE TABLE IF NOT EXISTS `tbinput_sda` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbinput_sda`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbinput_sdm`
--

CREATE TABLE IF NOT EXISTS `tbinput_sdm` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `idkat` int(11) NOT NULL,
  `idunik` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `tahun` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbinput_sdm`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_gas`
--

CREATE TABLE IF NOT EXISTS `tbjasa_gas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbjasa_gas`
--

INSERT INTO `tbjasa_gas` (`id`, `nama`, `posisi`) VALUES
(1, 'Usaha Penyewaan Tenaga Listrik', 1),
(2, 'SPBU', 2),
(3, 'Pangkalan Minyak Tanah', 3),
(5, 'Pengecer Gas dan BBM', 4),
(6, 'Usaha Air Minum Kemasan Isi Ulang', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_hiburan`
--

CREATE TABLE IF NOT EXISTS `tbjasa_hiburan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbjasa_hiburan`
--

INSERT INTO `tbjasa_hiburan` (`id`, `nama`, `posisi`) VALUES
(1, 'Bioskop', 1),
(2, 'Film Keliling', 2),
(4, 'Sandiwara/ Drama', 3),
(5, 'Group Lawak', 4),
(6, 'Sirkus Keliling/ Topeng Monyet/ dll', 5),
(7, 'Wayang Orang/ Wayang Golek', 6),
(8, 'Group Musik/ Band', 7),
(9, 'Group Paduan Suara', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_hukum`
--

CREATE TABLE IF NOT EXISTS `tbjasa_hukum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbjasa_hukum`
--

INSERT INTO `tbjasa_hukum` (`id`, `nama`, `posisi`) VALUES
(1, 'Notaris', 1),
(2, 'Pengacara/ Advocat', 2),
(3, 'Konsultan Manajemen', 3),
(5, 'Konsultan Manajemen', 4),
(6, 'Konsultan Teknis', 5),
(7, 'Pejabat Pembuat Akta Tanah', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_keterampilan`
--

CREATE TABLE IF NOT EXISTS `tbjasa_keterampilan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbjasa_keterampilan`
--

INSERT INTO `tbjasa_keterampilan` (`id`, `nama`, `posisi`) VALUES
(1, 'Tukang Kayu', 1),
(2, 'Tukang Batu', 2),
(4, 'Tukang Jahit/ Bordir', 3),
(5, 'Tukang Cukur', 4),
(6, 'Tukang Service  Elektronik', 5),
(7, 'Tukang Besi', 6),
(8, 'Tukang Gali Sumur', 7),
(9, 'Tukang Pijat/ Urut/ Pengobatan', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_pengangkutan`
--

CREATE TABLE IF NOT EXISTS `tbjasa_pengangkutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbjasa_pengangkutan`
--

INSERT INTO `tbjasa_pengangkutan` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Angkutan Desa/Perkotaan', 1, 1),
(2, 'Antar Kota/Provinsi', 1, 2),
(3, 'Perahu Motor/Klotok', 2, 1),
(4, 'Jet Boat', 2, 2),
(5, 'Jet Boat', 3, 1),
(6, 'Ferry/Kapal Penumpang', 3, 2),
(7, 'Jet Foil', 3, 3),
(8, 'Helikopter', 4, 1),
(10, 'Test', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_penginapan`
--

CREATE TABLE IF NOT EXISTS `tbjasa_penginapan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbjasa_penginapan`
--

INSERT INTO `tbjasa_penginapan` (`id`, `nama`, `posisi`) VALUES
(1, 'Losmen', 1),
(2, 'Wisma', 2),
(3, 'Asrama', 3),
(5, 'Persewaan Kamar', 4),
(6, 'Kontrakan Rumah', 5),
(7, 'Mess', 6),
(8, 'Hotel', 7),
(9, 'Home Stay', 8),
(10, 'Villa', 9),
(11, 'Town House', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbjasa_perdagangan`
--

CREATE TABLE IF NOT EXISTS `tbjasa_perdagangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbjasa_perdagangan`
--

INSERT INTO `tbjasa_perdagangan` (`id`, `nama`, `posisi`) VALUES
(1, 'Pasar Hasil Bumi/Tradisional/Harian', 1),
(2, 'Pasar Mingguan', 2),
(3, 'Pasar Bulanan', 3),
(5, 'Per Kaget/ Per Khusus ( Per Ternak, dll)', 4),
(6, 'Jumlah Usaha Toko/ Kios', 5),
(7, 'Swalayan', 6),
(8, 'Warung Serba Ada', 7),
(9, 'Toko Klontong', 8),
(10, 'Usaha Peternakan', 9),
(11, 'Usaha Perikanan', 10),
(12, 'Usaha Perkebunan', 11),
(13, 'Usaha Minuman (Kemasan, dll)', 12),
(14, 'Industri Farmasi', 13),
(15, 'Industri Caroseri/ Cat Mobil', 14),
(16, 'Industri Penyamakan Kulit', 15),
(17, 'Penitipan Kendaraan Kulit', 16),
(18, 'Penitipan Kendaraan Bermotor', 17),
(19, 'Industri Perakitan Elektronik', 18),
(20, 'Pengolahan Kayu', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbjenis_galian`
--

CREATE TABLE IF NOT EXISTS `tbjenis_galian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbjenis_galian`
--

INSERT INTO `tbjenis_galian` (`id`, `nama`, `posisi`) VALUES
(1, 'Batu Kali', 1),
(2, 'Batu Gunung', 2),
(4, 'Batu Kapur', 3),
(5, 'Pasir', 4),
(6, 'Batubara', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbjenis_ikan`
--

CREATE TABLE IF NOT EXISTS `tbjenis_ikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbjenis_ikan`
--

INSERT INTO `tbjenis_ikan` (`id`, `nama`, `posisi`) VALUES
(1, 'Tuna', 1),
(3, 'Tongkol/ Cakalang', 2),
(4, 'Kakap', 3),
(5, 'Tenggiri', 4),
(6, 'Cumi', 5),
(7, 'Gurita', 6),
(8, 'Bandeng', 7),
(9, 'Kerang', 8),
(10, 'Kepiting', 9),
(11, 'Mas', 10),
(12, 'Mujair', 11),
(13, 'Lele', 12),
(14, 'Gabus', 13),
(15, 'Patin', 14),
(16, 'Nila', 15),
(17, 'Sepat', 16),
(18, 'Gurame', 17),
(19, 'Belut', 18),
(20, 'Penyu', 19),
(21, 'Rumput laut', 20),
(22, 'Katak', 22),
(23, 'Kodok', 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbkebisingan`
--

CREATE TABLE IF NOT EXISTS `tbkebisingan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbkebisingan`
--

INSERT INTO `tbkebisingan` (`id`, `nama`, `posisi`) VALUES
(1, 'Kebisingan Tinggi', 1),
(2, 'Kebisingan Sedang', 2),
(4, 'Kebisingan Ringan', 3),
(5, 'Tidak Bising', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbkepadatan`
--

CREATE TABLE IF NOT EXISTS `tbkepadatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbkepadatan`
--

INSERT INTO `tbkepadatan` (`id`, `nama`, `posisi`) VALUES
(1, 'Jumlah Laki-laki', 1),
(2, 'Jumlah Perempuan', 3),
(4, 'Jumlah Total', 4),
(5, 'Jumlah Kepala Keluarga', 5),
(6, 'Kepadatan Penduduk', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbkepemilikan_lahan`
--

CREATE TABLE IF NOT EXISTS `tbkepemilikan_lahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbkepemilikan_lahan`
--

INSERT INTO `tbkepemilikan_lahan` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Tanaman Pangan', 1, 1),
(2, 'Tanaman Buah', 1, 3),
(3, 'Perkebunan', 1, 4),
(10, 'Memiliki Lebih dari 10 Ha', 2, 3),
(6, 'Memiliki kurang dari 5 ha', 2, 1),
(7, 'Memiliki Kurang dari 10 Ha', 2, 2),
(11, 'Luas Lahan Perkebunan Milik Negara', 3, 1),
(12, 'Luas Total Lahan Perkebunan', 3, 2),
(13, 'Luas Lahan Hutan Milik Negara', 3, 3),
(14, 'Hutan', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbkewarganegaraan`
--

CREATE TABLE IF NOT EXISTS `tbkewarganegaraan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbkewarganegaraan`
--

INSERT INTO `tbkewarganegaraan` (`id`, `nama`, `posisi`) VALUES
(1, 'Warga Negara Indonesia', 1),
(2, 'Warga Negara Asing', 2),
(4, 'Dwi Kewarganegaraan', 3),
(5, 'Jumlah', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbkondisi_hutan`
--

CREATE TABLE IF NOT EXISTS `tbkondisi_hutan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbkondisi_hutan`
--

INSERT INTO `tbkondisi_hutan` (`id`, `nama`, `posisi`) VALUES
(1, 'Hutan Produksi', 1),
(3, 'Hutan Lindung', 2),
(4, 'Hutan Suaka Margasatwa', 3),
(5, 'Hutan Suaka Alam', 4),
(9, 'Hutan Suaka Konservasi', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbkualitas_angker`
--

CREATE TABLE IF NOT EXISTS `tbkualitas_angker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbkualitas_angker`
--

INSERT INTO `tbkualitas_angker` (`id`, `nama`, `posisi`) VALUES
(1, 'Penduduk Usia 18-56 Tahun yang Buta Aksara dan Huruf/Angka Latin', 1),
(3, 'Penduduk Usia 18-56 Tahun yang Tidak Tamat SD', 2),
(4, 'Penduduk Usia 18-56 Tahun Yang Tamat SD/ Sedearajat', 3),
(5, 'Penduduk Usia 18-56 Tahun Yang Tamat SMP/ Sedearajat', 4),
(6, 'Penduduk Usia 18-56 Tahun Yang Tamat SMA/ Sedearajat', 5),
(7, 'Penduduk Usia 18-56 Tahun Yang Tamat Perguruan Tinggi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbkualitas_udara`
--

CREATE TABLE IF NOT EXISTS `tbkualitas_udara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbkualitas_udara`
--

INSERT INTO `tbkualitas_udara` (`id`, `nama`, `posisi`) VALUES
(1, 'Pabrik (Kapur, Marmer, Dll)', 1),
(3, 'Kendaraan Bermotor', 2),
(4, 'Pembakaran Hutan / Lahan Gambut', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tblembaga_ekonomi`
--

CREATE TABLE IF NOT EXISTS `tblembaga_ekonomi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tblembaga_ekonomi`
--

INSERT INTO `tblembaga_ekonomi` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Koperasi Unit Desa', 1, 1),
(2, 'Koperasi Simpan Pinjam', 1, 2),
(3, 'Kelompok Simpan Pinjam', 1, 3),
(4, 'Jasa Asuransi', 2, 1),
(5, 'Lembaga Keuangan Non Bank', 2, 2),
(6, 'Bank Perkreditan Rakyat', 2, 3),
(7, 'Industri Makanan', 3, 1),
(8, 'Industri Alat Rumah Tangga', 3, 2),
(9, 'Industri Material Bahan Bangunan', 3, 3),
(11, 'Koperasi Primer', 1, 4),
(12, 'Koperasi Sekunder', 1, 5),
(13, 'Bumdes', 1, 6),
(14, 'Pegadaian', 2, 4),
(15, 'Bank Pemerintah', 2, 5),
(16, 'Bank Swasta', 2, 6),
(17, 'Industri Alat Pertanian', 3, 4),
(18, 'Industri Kerajinan', 3, 5),
(19, 'Rumah Makan dan Restoran', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbmata_pencarian`
--

CREATE TABLE IF NOT EXISTS `tbmata_pencarian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `tbmata_pencarian`
--

INSERT INTO `tbmata_pencarian` (`id`, `nama`, `posisi`) VALUES
(1, 'Petani', 1),
(3, 'Buruh Tani', 2),
(4, 'Guru', 3),
(5, 'Wirausaha', 4),
(6, 'Buruh Migran Perempuan', 5),
(7, 'Buruh Migran Laki-Laki', 6),
(8, 'Pegawai Negeri Sipil', 7),
(9, 'Pengrajin Rumah Tangga', 8),
(10, 'Pedagang Keliling', 9),
(11, 'Peternak', 10),
(12, 'Nelayan', 11),
(13, 'Montir', 12),
(14, 'Dokter Swasta', 13),
(15, 'Bidan Swasta', 14),
(16, 'Perawat Swasta', 15),
(17, 'Pembantu Rumah Tangga', 16),
(18, 'TNI', 17),
(19, 'POLRI', 18),
(20, 'Pensiunan PNS/ TNI/ POLRI', 19),
(21, 'Pengusaha kecil dan menengah', 20),
(22, 'Pengacara', 21),
(23, 'Notaris', 22),
(24, 'Dukun Kampung Terlatih', 23),
(25, 'Jasa Pengobatan Alternatif', 24),
(26, 'Guru/ Dosen Swasta', 25),
(27, 'Pengusaha Besar', 26),
(28, 'Arsitektur/ Tukang', 27),
(29, 'Seniman/ Artis', 28),
(30, 'Karyawan Perusahaan Swasta', 29),
(31, 'Karyawan Perusahaan Pemerintah ', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbmekanisme_pemasaran`
--

CREATE TABLE IF NOT EXISTS `tbmekanisme_pemasaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbmekanisme_pemasaran`
--

INSERT INTO `tbmekanisme_pemasaran` (`id`, `nama`, `posisi`) VALUES
(1, 'Dijual Langsung Ke Konsumen', 1),
(3, 'Dijual Ke Pasar', 2),
(4, 'Dijual Melalui KUD', 3),
(5, 'Dijual Melalui Tengkulak', 4),
(6, 'Dijual Melalui Pengecer', 5),
(7, 'Dijual Ke Lumbang Desa/ Kel.', 6),
(8, 'Tidak Dijual', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbmekanisme_pemasaran2`
--

CREATE TABLE IF NOT EXISTS `tbmekanisme_pemasaran2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbmekanisme_pemasaran2`
--

INSERT INTO `tbmekanisme_pemasaran2` (`id`, `nama`, `posisi`) VALUES
(1, 'Dijual Langsung Ke Konsumen', 1),
(3, 'Dijual Ke Pasar', 2),
(4, 'Dijual Melalui KUD', 3),
(5, 'Dijual Melalui Tengkulak', 4),
(6, 'Dijual Melalui Pengecer', 5),
(7, 'Dijual Ke Lumbung Desa/ Kel.', 6),
(8, 'Tidak Jual', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_dasar`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_dasar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbmonografi_dasar`
--

INSERT INTO `tbmonografi_dasar` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(2, 0, 'main', 'Nama Desa', '1', 1),
(3, 0, 'main', 'Tahun Pembentukan', '1', 2),
(4, 0, 'main', 'Dasar Hukum Pembentukan', '1', 3),
(5, 0, 'main', 'Nomor Kode Wilayah', '1', 4),
(6, 0, 'main', 'Nomor Kode POS', '1', 5),
(7, 0, 'main', 'Kecamatan', '1', 6),
(8, 0, 'main', 'Kabupaten/ Kota', '1', 7),
(9, 0, 'main', 'Provinsi', '1', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_kelembagaan`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_kelembagaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbmonografi_kelembagaan`
--

INSERT INTO `tbmonografi_kelembagaan` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(1, 0, 'main', 'Lembaga Pemberdayaan Masyarakat (atau sebutan lain)', '-', 1),
(2, 0, 'main', 'Lembaga Adat', '1', 2),
(3, 0, 'main', 'TP PKK', '-', 3),
(4, 0, 'main', 'BUMDES', '-', 4),
(5, 0, 'main', 'Karang Taruna', 'A', 5),
(6, 0, 'main', 'RT/ RW', 'A', 6),
(7, 0, 'main', 'Lembaga Kemasyarakatan Lainnya', 'A', 7),
(8, 1, 'sub', 'Jumlah Pengurus', '1', 1),
(9, 1, 'sub', 'Jumlah Anggota', '1', 2),
(10, 1, 'sub', 'Jumlah Kegiatan Per Tahun', '1', 3),
(11, 1, 'sub', 'Jumlah Dana yang dikelola', '1', 4),
(12, 3, 'sub', 'Jumlah Pengurus', '1', 1),
(13, 3, 'sub', 'Jumlah Anggota', '1', 2),
(14, 3, 'sub', 'Jumlah Kegiatan Per Bulan', '1', 3),
(15, 3, 'sub', 'Jumlah Buku Administrasi', '1', 4),
(16, 3, 'sub', 'Jumlah Dana yang dikelola', '1', 5),
(17, 4, 'sub', 'Jumlah BUMDES', '1', 1),
(18, 4, 'sub', 'Jenis BUMDES', '1', 2),
(19, 4, 'sub', 'Jumlah Modal Dasar BUMDES', '1', 3),
(20, 4, 'sub', 'Jumlah Keuangan yang dikelola BUMDES', '1', 4),
(21, 5, 'sub', 'Jenis Kegiatan', '1', 1),
(22, 5, 'sub', 'Jumlah Pengurus', '1', 2),
(23, 5, 'sub', 'Jumlah Anggota', '1', 3),
(24, 6, 'sub', 'Jumlah RW', '1', 1),
(25, 6, 'sub', 'Jumlah RT', '1', 2),
(26, 6, 'sub', 'Bantuan yang diterima RW dalam Sebulan ', '1', 3),
(27, 6, 'sub', 'Bantuan yang diterima RT dalam Sebulan ', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_keuangan`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_keuangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbmonografi_keuangan`
--

INSERT INTO `tbmonografi_keuangan` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(1, 0, 'main', 'Pendapatan Asli Desa', '1', 1),
(2, 0, 'main', 'Besaran ADD yang dikelola per tahun', '1', 2),
(3, 0, 'main', 'Bantuan yang diterima desa', 'a', 3),
(4, 0, 'main', 'Hibah / Bantuan Luar Negeri', '1', 4),
(5, 0, 'main', 'Swadaya / Gotong Royong', '1', 5),
(6, 0, 'main', 'Sumber Keuangan lain diluar PBB', '1', 6),
(7, 0, 'main', 'Sumber / Keuangan Lain', '1', 7),
(8, 0, 'main', 'Belanja Desa', '1', 8),
(9, 0, 'main', 'SILPA / SIKPA', '1', 9),
(10, 0, 'main', 'Dana Cadangan', '1', 10),
(11, 0, 'main', 'Penghasilan dan Tunjangan', 'a', 11),
(12, 3, 'sub', 'Pemerintahan', '1', 1),
(13, 3, 'sub', 'Provinsi', '1', 2),
(14, 3, 'sub', 'Kabupaten / Kota', '1', 3),
(15, 11, 'sub', 'Kades', '-', 1),
(16, 11, 'sub', 'Sekdes', '-', 2),
(17, 11, 'sub', 'Perangkat Desa', '-', 3),
(18, 11, 'sub', 'BPD', '-', 4),
(19, 15, 'sub2', 'Penghasilan Tetap', '', 1),
(20, 15, 'sub2', 'Sumber Penghasilan Tetap', '', 2),
(21, 15, 'sub2', 'Tunjangan', '', 3),
(22, 15, 'sub2', 'Sumber Tunjangan', '', 4),
(23, 16, 'sub2', 'Penghasilan Tetap', '', 1),
(24, 16, 'sub2', 'Sumber Penghasilan Tetap', '', 2),
(25, 16, 'sub2', 'Tunjangan', '', 3),
(26, 16, 'sub2', 'Sumber Tunjangan', '', 4),
(27, 17, 'sub2', 'Penghasilan Tetap', '', 1),
(28, 17, 'sub2', 'Sumber Penghasilan Tetap', '', 2),
(29, 17, 'sub2', 'Tunjangan', '', 3),
(30, 17, 'sub2', 'Sumber Tunjangan', '', 4),
(31, 18, 'sub2', 'Tunjangan', '', 1),
(32, 18, 'sub2', 'Sumber Tunjangan', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_kewenangan`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_kewenangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbmonografi_kewenangan`
--

INSERT INTO `tbmonografi_kewenangan` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(1, 0, 'main', 'Jumlah Perdes Yang Telah Ditetapkan', '1', 1),
(2, 0, 'main', 'Bidang Yang Diatur Oleh Perdes', '1', 2),
(3, 0, 'main', 'Urusan yang diserahkan oleh Kabupaten/Kota', '1', 3),
(4, 0, 'main', 'Urusan asli yang masih dilaksanakan desa', '-', 4),
(5, 0, 'main', 'Tugas pembantuan/program yang diterima desa', 'a', 5),
(6, 4, 'sub', 'Jumlah', '1', 1),
(7, 4, 'sub', 'Jenis', '1', 2),
(8, 5, 'sub', 'Pemerintahan', '1', 1),
(9, 5, 'sub', 'Provinsi', '1', 2),
(10, 5, 'sub', 'Kabupaten/Kota', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_personil`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_personil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbmonografi_personil`
--

INSERT INTO `tbmonografi_personil` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(1, 0, 'main', 'Nama Kepala Desa', '1', 1),
(2, 0, 'main', 'Nama Sekretaris Desa', '1', 2),
(3, 0, 'main', 'Jumlah Perangkat Desa', '1', 3),
(4, 0, 'main', 'Jumlah BPD', '1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_trantib`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_trantib` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbmonografi_trantib`
--

INSERT INTO `tbmonografi_trantib` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(1, 0, 'main', 'Jumlah Anggota Linmas', '1', 1),
(2, 0, 'main', 'Jumlah POS Kamling', '1', 2),
(3, 0, 'main', 'Jumlah Operasi Penertiban', '1', 3),
(4, 0, 'main', 'Jumlah Kejadian Kriminal', 'A', 4),
(5, 0, 'main', 'Jumlah Kejadian Bencana', '1', 5),
(6, 0, 'main', 'Jumlah POS Bencana Alam', '1', 6),
(7, 0, 'main', 'Jumlah Pembalakan Air', '1', 7),
(8, 0, 'main', 'Jumlah POS Hutan Lindung', '1', 8),
(9, 4, 'sub', 'Pencurian', '1', 1),
(10, 4, 'sub', 'Perkosaan', '1', 2),
(11, 4, 'sub', 'Kenakalan Remaja', '1', 3),
(12, 4, 'sub', 'Pembunuhan', '1', 4),
(13, 4, 'sub', 'Perampokan', '1', 5),
(14, 4, 'sub', 'Penipuan', '1', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbmonografi_umum`
--

CREATE TABLE IF NOT EXISTS `tbmonografi_umum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsub` int(11) NOT NULL,
  `tipe` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `pengurutan` varchar(2) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `tbmonografi_umum`
--

INSERT INTO `tbmonografi_umum` (`id`, `idsub`, `tipe`, `nama`, `pengurutan`, `posisi`) VALUES
(1, 0, 'main', 'Tipologi Desa', '1', 1),
(2, 0, 'main', 'Tingkat Perkembangan Desa Swasembada/ Swadaya/ Swakarya', '1', 2),
(4, 0, 'main', 'Luas Wilayah', '1', 3),
(5, 0, 'main', 'Batas Wilayah', 'a', 4),
(6, 0, 'main', 'Orbitasi (Jarak dari Pusat Pemerintahan)', 'a', 5),
(8, 0, 'main', 'Jumlah Penduduk', 'a', 6),
(9, 0, 'main', 'Mayoritas Pekerjaan', '1', 7),
(10, 0, 'main', 'Tingkat Pendidikan Masyarakat', 'a', 8),
(11, 5, 'sub', ' Sebelah Utara', 'a', 1),
(12, 5, 'sub', 'Sebelah Selatan', 'a', 2),
(13, 5, 'sub', 'Sebelah Barat', 'a', 3),
(84, 5, 'sub', 'Sebelah Timur', '1', 4),
(15, 6, 'sub', 'Jarak dari Pusat Pemerintahan Kecamatan', '1', 1),
(16, 6, 'sub', 'Jarak dari Pusat Pemerintahan Kota', '1', 2),
(17, 6, 'sub', 'Jarak dari Ibukota Kabupaten', '1', 3),
(18, 6, 'sub', 'Jarak dari Ibukota Provinsi', '1', 4),
(19, 8, 'sub', 'Laki-Laki', '1', 1),
(20, 8, 'sub', 'Perempuan', '1', 2),
(21, 8, 'sub', 'Usia 0-15', '1', 3),
(22, 8, 'sub', 'Usia 15-16', '1', 4),
(23, 8, 'sub', 'Usia 65 ke atas', '1', 5),
(24, 10, 'sub', 'Lulusan Pendidikan Umum', '1', 1),
(25, 10, 'sub', 'Lulusan Pendidikan Khusus', '1', 2),
(26, 24, 'sub2', 'Taman Kanak - Kanak', '', 1),
(27, 24, 'sub2', 'Sekolah Dasar', '', 2),
(28, 24, 'sub2', 'SMP', '', 3),
(29, 24, 'sub2', 'SMA/ SMU', '', 4),
(30, 24, 'sub2', 'Akademi / D1 - D3', '', 5),
(31, 24, 'sub2', 'Sarjana', '', 6),
(32, 24, 'sub2', 'Pascasarjana', '', 7),
(33, 25, 'sub2', 'Pondok Pesantren', '', 1),
(34, 25, 'sub2', 'Pendidikan Keagamaan', '', 2),
(35, 25, 'sub2', 'Sekolah Luar Biasa', '', 3),
(36, 25, 'sub2', 'Sekolah Khusus Keterampilan', '', 4),
(37, 10, 'sub', 'Tidak Lulus/ Tidak Sekolah', '1', 3),
(38, 0, 'main', 'Jumlah Penduduk Miskin', '1', 9),
(39, 0, 'main', 'UMR Kabupaten/ Kota', '1', 10),
(40, 0, 'main', 'Sarana dan Prasarana', 'a', 11),
(41, 40, 'sub', 'Kantor Desa', '1', 1),
(42, 40, 'sub', 'Prasarana Kesehatan', '1', 2),
(43, 40, 'sub', 'Prasarana Pendidikan', '1', 3),
(44, 40, 'sub', 'Prasarana Ibadah', '1', 4),
(45, 40, 'sub', 'Prasarana Umum', '1', 5),
(46, 42, 'sub2', 'Puskesmas', '', 1),
(47, 42, 'sub2', 'Poskesdes', '', 2),
(48, 42, 'sub2', 'UKBM (Posyandu, Polindes)', '', 3),
(49, 43, 'sub2', 'Perpusdes', '', 1),
(50, 43, 'sub2', 'PAUD', '', 2),
(51, 43, 'sub2', 'TK', '', 3),
(52, 43, 'sub2', 'SD', '', 4),
(53, 43, 'sub2', 'SMP', '', 5),
(54, 43, 'sub2', 'SMA', '', 6),
(55, 43, 'sub2', 'PT', '', 7),
(56, 44, 'sub2', 'Mesjid', '', 1),
(57, 44, 'sub2', 'Mushola', '', 2),
(58, 44, 'sub2', 'Gereja', '', 3),
(59, 44, 'sub2', 'Pura', '', 4),
(60, 44, 'sub2', 'Vihara', '', 5),
(61, 44, 'sub2', 'Klenteng', '', 6),
(62, 45, 'sub2', 'Olahraga', '', 1),
(63, 45, 'sub2', 'Kesenian / Budaya', '', 2),
(64, 45, 'sub2', 'Balai Pertemuan', '', 3),
(65, 45, 'sub2', 'Sumur Desa', '', 4),
(66, 45, 'sub2', 'Pasar Desa', '', 5),
(67, 45, 'sub2', 'Lainnya', '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbpakan_ternak`
--

CREATE TABLE IF NOT EXISTS `tbpakan_ternak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbpakan_ternak`
--

INSERT INTO `tbpakan_ternak` (`id`, `nama`, `satuan`, `posisi`) VALUES
(1, 'Di Subsidi Dinas', 'Ton', 5),
(3, 'Luas Tanaman Pakan Ternak (Rumput, Gajah, dll)', 'ha', 1),
(4, 'Produksi Hijauan Makanan Ternak', 'Ton/ha', 2),
(5, 'Luas Lahan Gembalaan', 'ha', 3),
(6, 'Dipasok dari luar desa/ Kelurahan', 'Ton', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbpemanfaatan`
--

CREATE TABLE IF NOT EXISTS `tbpemanfaatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbpemanfaatan`
--

INSERT INTO `tbpemanfaatan` (`id`, `nama`, `posisi`) VALUES
(1, 'Luas', 1),
(2, 'Kondisi', 2),
(4, 'Pemanfaatan', 3),
(5, 'Perikanan', 4),
(6, 'Air Minum/ AIr Baku', 5),
(7, 'Cuci dan Mandi', 6),
(8, 'Irigasi', 7),
(9, 'Buang air besar', 8),
(10, 'Pembangkit  Listrik', 9),
(11, 'Prasana Transportasi', 10),
(12, 'Tercemar', 11),
(13, 'Pendangkalan', 12),
(14, 'Keruh', 13),
(15, 'Berlumpur', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbpemasaran_galian`
--

CREATE TABLE IF NOT EXISTS `tbpemasaran_galian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbpemasaran_galian`
--

INSERT INTO `tbpemasaran_galian` (`id`, `nama`, `posisi`) VALUES
(1, 'Dijual Langsung ke Konsumen', 1),
(4, 'Dijual ke Pasar', 2),
(5, 'Dijual Melalui KUD', 3),
(6, 'Dijual Melalui Tengkulak', 4),
(7, 'Dijual Melalui Pengecer', 5),
(8, 'Dijual ke Perusahaan', 6),
(9, 'Dijual ke Lumbung Desa/ Kel.', 7),
(10, 'Tidak Dijual', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbpemeliharaan_ternak`
--

CREATE TABLE IF NOT EXISTS `tbpemeliharaan_ternak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbpemeliharaan_ternak`
--

INSERT INTO `tbpemeliharaan_ternak` (`id`, `nama`, `posisi`) VALUES
(1, 'Milik Masyarakat Umum', 1),
(5, 'Milik Perusahaan Peternakan (Ranch)', 2),
(6, 'Milik Perorangan', 3),
(7, 'Sewa Pakai', 4),
(8, 'Milik Pemerintah', 5),
(9, 'Milik Masyarakat Adat', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbperkembangan_usia`
--

CREATE TABLE IF NOT EXISTS `tbperkembangan_usia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbperkembangan_usia`
--

INSERT INTO `tbperkembangan_usia` (`id`, `nama`, `posisi`) VALUES
(1, '0-1 Tahun', 1),
(3, '1-3 Tahun', 2),
(6, '5-7Tahun', 5),
(5, '3-5 Tahun', 4),
(7, '7-12Tahun', 6),
(8, '12-15Tahun', 7),
(9, '15-18 Tahun', 8),
(10, '18-60 Tahun', 9),
(11, 'Diatas 60 Tahun', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbpopulasi_ternak`
--

CREATE TABLE IF NOT EXISTS `tbpopulasi_ternak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `tbpopulasi_ternak`
--

INSERT INTO `tbpopulasi_ternak` (`id`, `nama`, `posisi`) VALUES
(1, 'Sapi', 1),
(2, 'Kerbau', 2),
(4, 'Babi', 3),
(5, 'Ayam Kampung', 4),
(6, 'Jenis Ayam Brotler', 5),
(7, 'Bebek', 6),
(8, 'Kuda', 7),
(9, 'Kambing', 8),
(10, 'Domba', 9),
(11, 'Angsa', 10),
(12, 'Burung Puyuh', 11),
(13, 'Kelinci', 12),
(14, 'Burung Walet', 13),
(15, 'Anjing', 14),
(16, 'Kucing', 15),
(17, 'Ular Cobra', 16),
(18, 'Burung Unta', 17),
(19, 'Ular Pithon', 18),
(20, 'Burung Cendrawasih', 19),
(21, 'Burung Kakatua', 20),
(22, 'Burung Beo', 21),
(23, 'Burung Merak', 22),
(24, 'Burung Langka Lalainya', 23),
(25, 'Buaya', 24),
(26, 'Itik', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbpotensi_air`
--

CREATE TABLE IF NOT EXISTS `tbpotensi_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbpotensi_air`
--

INSERT INTO `tbpotensi_air` (`id`, `nama`, `satuan`, `posisi`) VALUES
(1, 'Sungai', 'Debit', 1),
(3, 'Danau', 'Volume', 2),
(4, 'Mata Air', 'Debit', 3),
(5, 'Bendungan/ Waduk/ Situ', 'Volume', 4),
(6, 'Embung - Embung', 'Volume', 5),
(7, 'Jebakan Air', 'Volume', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbpotensi_wisata`
--

CREATE TABLE IF NOT EXISTS `tbpotensi_wisata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbpotensi_wisata`
--

INSERT INTO `tbpotensi_wisata` (`id`, `nama`, `posisi`) VALUES
(1, 'Laut (Wisata Pulau, Taman Laut, Situs Sejarah Bahari, Pantai dll)', 1),
(3, 'Danau (Wisata Air, Hutan Wisata, Situs Purbakala)', 2),
(4, 'GOA', 3),
(5, 'Gunung (Wisata Hutan, Taman Nasional, Bumi Perkemahan, dll)', 4),
(6, 'Agrowisata', 5),
(7, 'Hutan Khusus', 6),
(8, 'Cagar Budaya', 7),
(9, 'Arum Jeram', 8),
(10, 'Situs Sejarah dan Museum', 9),
(11, 'Air Terjun', 10),
(12, 'Padang Savana (Wisata Padang Savana)', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_air`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbprasarana_air`
--

INSERT INTO `tbprasarana_air` (`id`, `nama`, `posisi`) VALUES
(1, 'Jumlah Sumur Pompa', 1),
(2, 'Jumlah Sumur Gali', 2),
(4, 'Jumlah Hidran Umum', 3),
(5, 'Jumlah PAM', 4),
(6, 'Jumlah Tangki Air Bersih', 5),
(7, 'Jumlah Embung', 6),
(8, 'Jumlah Mata Air', 7),
(9, 'Jumlah Bangunan Pengelolahan Air Bersih/ Air Minum', 8),
(10, 'Saluran Drainase/ Saluran Pembuangan Ari Limbah', 9),
(11, 'Jumlah MCK Umum', 10),
(12, 'Pemilik Jumlah Jamban Keluarga', 11),
(13, 'Kondisi Saluran Drainase/ Saluran Pembuangan Air Limbah', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_darat`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_darat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` varchar(4) NOT NULL,
  `idsub` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `tbprasarana_darat`
--

INSERT INTO `tbprasarana_darat` (`id`, `nama`, `tipe`, `idsub`, `posisi`) VALUES
(1, '1.1 Jalan Desa/Kelurahan', 'main', 0, 1),
(3, 'Panjang Jalan Aspal', 'sub', 1, 3),
(13, 'Panjang Jalan Sirtu', 'sub', 1, 6),
(11, 'Panjang Jalan Makadam', 'sub', 1, 4),
(12, 'Panjang Jalan Tanah', 'sub', 1, 5),
(14, 'Panjang Jalan Konblok/ Semen/ Beton', 'sub', 1, 7),
(15, '1.2 Jalan Antar Desa/ Kelurahan/ Kecamatan', 'main', 0, 2),
(16, 'Panjang Jalan Aspal', 'sub', 15, 1),
(17, 'Panjang Jalan Makadam', 'sub', 15, 2),
(18, 'Panjang Jalan Tanah', 'sub', 15, 3),
(19, 'Panjang Jalan Sirtu', 'sub', 15, 4),
(20, 'Panjang Jalan Konblok/ Semen/ Beton', 'sub', 15, 5),
(21, '1.4 Jalan Provinsi Yang Melewati Desa/ Kelurahan', 'main', 0, 4),
(22, '1.5 Panjang Jalan Negara', 'main', 0, 5),
(23, '1.6 Jembatan Desa/ Kelurahan', 'main', 0, 6),
(24, '1.7 Prasarana Angkutan Darat', 'main', 0, 7),
(25, '1.3 Jalan Kabupaten Yang Melewati Desa/ Kelurahan', 'main', 0, 3),
(26, 'Panjang Jalan Aspal', 'sub', 25, 1),
(27, 'Panjang Jalan Makadam', 'sub', 25, 2),
(28, 'Panjang Jalan Tanah', 'sub', 25, 3),
(29, 'Panjang Jalan Sirtu', 'sub', 25, 4),
(30, 'Panjang Jalan Konblok/ Semen/ Beton', 'sub', 25, 5),
(31, 'Panjang Jalan Aspal', 'sub', 21, 1),
(32, 'Panjang Jalan Makadam', 'sub', 21, 2),
(33, 'Panjang Jalan Tanah', 'sub', 21, 3),
(34, 'Panjang Jalan Sirtu', 'sub', 21, 4),
(35, 'Panjang Jalan Konblok/ Semen/ Beton', 'sub', 21, 5),
(36, 'Panjang Jalan Aspal', 'sub', 22, 1),
(37, 'Panjang Jalan Makadam', 'sub', 22, 2),
(38, 'Panjang Jalan Tanah', 'sub', 22, 3),
(39, 'Panjang Jalan Sirtu', 'sub', 22, 4),
(40, 'Panjang Jalan Konblok/ Semen/ Beton', 'sub', 22, 5),
(41, 'Jumlah Jembatan Beton', 'sub', 23, 1),
(42, 'Jumlah Jembatan Besi', 'sub', 23, 2),
(43, 'Jumlah Jembatan Kayu', 'sub', 23, 3),
(44, 'Jumlah Pangkata Ojek', 'sub', 24, 1),
(45, 'Jumlah Stasiun KA', 'sub', 24, 2),
(46, 'Terminal Bis/ Angkutan', 'sub', 24, 3),
(47, 'Pedesaan/ Perkotaan', 'sub', 24, 4),
(48, 'Jumlah ............', 'sub', 24, 5),
(49, 'Jumlah Total', 'sub', 24, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_energi`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_energi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbprasarana_energi`
--

INSERT INTO `tbprasarana_energi` (`id`, `nama`, `satuan`, `posisi`) VALUES
(1, 'Listrik PLN', 'Unit', 1),
(3, 'Diesel Umum', ' Unit', 2),
(4, 'Genset Pribadi', 'Unit', 3),
(5, 'Lampu Minyak Tanah/ Jarak/ Kelapa', 'Keluarga', 4),
(6, 'Kayu Bakar', 'Keluarga', 5),
(7, 'Batu Bara', 'Keluarga', 6),
(8, 'Tanpa Penerangan', 'Keluarga', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_hiburan`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_hiburan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbprasarana_hiburan`
--

INSERT INTO `tbprasarana_hiburan` (`id`, `nama`, `posisi`) VALUES
(1, 'Jumlah Wisata', 1),
(2, 'Hotel Bintang 5', 2),
(4, 'Hotel Bintang 4', 3),
(5, 'Hotel Bintang 3', 4),
(6, 'Hotel Bintang 2', 5),
(7, 'Hotel Bintang 1', 6),
(8, 'Hotel Melati', 7),
(9, 'Penginapan', 12),
(10, 'Losmen', 13),
(11, 'Diskotik', 14),
(12, 'Bilyar', 15),
(13, 'Karaoke', 16),
(14, 'Museum', 17),
(15, 'Restoran', 18),
(16, 'Bioskop', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_irigasi`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_irigasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbprasarana_irigasi`
--

INSERT INTO `tbprasarana_irigasi` (`id`, `nama`, `satuan`, `posisi`) VALUES
(2, 'Saluran Primer', 'm''', 1),
(3, 'Saluran Skunder', 'm''', 2),
(5, 'Saluran Tersier', 'm''', 3),
(6, 'Pintu Sadap', 'Unit', 7),
(7, 'Pintu Pembagi Air', 'Unit', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_kominfo`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_kominfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbprasarana_kominfo`
--

INSERT INTO `tbprasarana_kominfo` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Telepon Umum', 1, 1),
(2, 'Wartel', 1, 2),
(3, 'Warnet', 1, 3),
(4, 'Kantor Pos', 2, 1),
(5, 'Kantor Pos Pembantu', 2, 2),
(6, 'TV Umum', 3, 1),
(7, 'Jumlah Radio', 3, 2),
(8, 'Jumlah TV', 3, 4),
(9, 'Koran/Surat Kabar', 4, 1),
(10, 'Majalah', 4, 2),
(12, 'Jumlah Pelanggan TELKOM', 1, 4),
(13, 'Jumlah Pelanggan GSM', 1, 5),
(14, 'Jumlah Pelanggan CDMA', 1, 6),
(15, 'Sinyal Telepon Seluler/ Handphone', 1, 7),
(16, 'Tukang POS', 2, 3),
(17, 'Jumlah Parabola', 3, 5),
(18, 'Papan Iklan/ Reklame', 4, 3),
(19, 'Papan Pengumuman Umum', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_olga`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_olga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbprasarana_olga`
--

INSERT INTO `tbprasarana_olga` (`id`, `nama`, `posisi`) VALUES
(1, 'Lapangan Sepak Bola', 1),
(2, 'Lapangan Bulu Tangkis', 2),
(4, 'Meja Pingpong', 3),
(5, 'Lapangan Tenis', 4),
(6, 'Lapangan Golf', 6),
(7, 'Lapangan Voli', 5),
(8, 'Pacuan Kuda', 7),
(9, 'Arum Jeram', 8),
(10, 'Lapangan Basket', 9),
(11, 'Pusat Kebugaran', 10),
(12, 'Gelanggang Remaja', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_peribadatan`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_peribadatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbprasarana_peribadatan`
--

INSERT INTO `tbprasarana_peribadatan` (`id`, `nama`, `posisi`) VALUES
(1, 'Jumlah Masjid', 1),
(2, 'Jumlah Langgar/Surau/Mushola', 2),
(4, 'Jumlah Gereja Kristen Protestan', 3),
(5, 'Jumlah Gereja Katholik', 4),
(6, 'Jumlah Wihara', 5),
(7, 'Jumlah Pura', 6),
(8, 'Jumlah Klenteng', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbprasarana_udara`
--

CREATE TABLE IF NOT EXISTS `tbprasarana_udara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbprasarana_udara`
--

INSERT INTO `tbprasarana_udara` (`id`, `nama`, `posisi`) VALUES
(1, 'Lapangan Terbang Nasional/Internasional', 1),
(2, 'Lapangan Terbang Perintis', 2),
(3, 'Lapangan Terbang Domestik', 3),
(4, 'Helipad', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduksi_ternak`
--

CREATE TABLE IF NOT EXISTS `tbproduksi_ternak` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbproduksi_ternak`
--

INSERT INTO `tbproduksi_ternak` (`id`, `nama`, `satuan`, `posisi`) VALUES
(1, 'Susu', 'Kg/th', 1),
(3, 'Kulit', 'M/th', 2),
(4, 'Telur', 'Kg/th', 3),
(5, 'Madu', 'Lt/th', 5),
(6, 'Minyak', 'Lt/th', 7),
(7, 'Daging', 'Kg/th', 4),
(8, 'Bulu', 'Kg/h', 6),
(9, 'Hiasan/Lukisan', 'Unit/th', 8),
(10, 'Cinderamata', 'Unit/th', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbproduktivitas_pertanian`
--

CREATE TABLE IF NOT EXISTS `tbproduktivitas_pertanian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `tbproduktivitas_pertanian`
--

INSERT INTO `tbproduktivitas_pertanian` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Jagung', 1, 3),
(3, 'Ubi Jalar', 1, 10),
(4, 'Jeruk', 2, 1),
(5, 'Pepaya', 2, 3),
(6, 'Jahe', 3, 1),
(14, 'Kacang Kedelai', 1, 4),
(15, 'Kacang Tanah', 1, 5),
(16, 'Kacang Panjang', 1, 6),
(17, 'Kacang Merah', 1, 7),
(18, 'Padi Sawah', 1, 8),
(19, 'Ubi Kayu', 1, 9),
(20, 'Cabe', 1, 11),
(21, 'Bawang Merah', 1, 12),
(22, 'Bawang Putih', 1, 13),
(23, 'Tomat', 1, 14),
(24, 'Sawi', 1, 15),
(25, 'Kentang', 1, 16),
(26, 'Kubis', 1, 17),
(27, 'Mentimun', 1, 18),
(28, 'Buncis', 1, 19),
(29, 'Bayam', 1, 20),
(30, 'Kangkung', 1, 21),
(31, 'Talas', 1, 22),
(32, 'Wortel', 1, 23),
(49, 'Nanas', 2, 9),
(48, 'Sirsak', 2, 8),
(47, 'Nangka', 2, 7),
(46, 'Jeruk Nipis', 2, 6),
(45, 'Limau', 2, 5),
(44, 'Belimbing', 2, 4),
(43, 'Alpokat', 2, 2),
(50, 'Jambu Klutuk', 2, 10),
(51, 'Kunyit', 3, 3),
(52, 'Lengkuas', 3, 4),
(53, 'Mengkudu', 3, 5),
(54, 'Daun Dewa', 3, 6),
(55, 'Kumis Kucing ', 3, 7),
(56, 'Buah Merah', 3, 8),
(57, 'Sambiloto ', 3, 9),
(58, 'Temulawak', 3, 10),
(59, 'Temu Putri', 3, 11),
(60, 'Daun Sirih', 3, 12),
(61, 'Kayu Manis', 3, 13),
(62, 'Daun Sereh', 3, 14),
(63, 'Mahkota Dewa', 3, 15),
(64, 'Kencur', 3, 16);

-- --------------------------------------------------------

--
-- Table structure for table `tbruang_publik`
--

CREATE TABLE IF NOT EXISTS `tbruang_publik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbruang_publik`
--

INSERT INTO `tbruang_publik` (`id`, `nama`, `posisi`) VALUES
(1, 'Taman Desa/Kel.', 1),
(2, 'Taman Kas Desa', 2),
(4, 'Tanah Adat', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarana_darat`
--

CREATE TABLE IF NOT EXISTS `tbsarana_darat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbsarana_darat`
--

INSERT INTO `tbsarana_darat` (`id`, `nama`, `posisi`) VALUES
(1, 'Bus Umum', 1),
(2, 'Truk Umum', 2),
(3, 'Angkutan Per-desa/Kelurahan', 3),
(5, 'Ojek', 4),
(6, 'Delman/ Bendi/ Cidomo', 5),
(7, 'Becak', 6),
(8, 'Kereta Api', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarana_produksi`
--

CREATE TABLE IF NOT EXISTS `tbsarana_produksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbsarana_produksi`
--

INSERT INTO `tbsarana_produksi` (`id`, `nama`, `satuan`, `posisi`) VALUES
(1, 'Empang/Kolah', 'Unit', 1),
(3, 'Keramba', 'H2/m2', 2),
(4, 'Empang/Kolam', 'H2/m2', 3),
(5, 'Danau', 'H2/m2', 4),
(6, 'Rawa', 'H2/m2', 5),
(7, 'Sungai', 'H2/m2', 6),
(8, 'Sawah', 'H2/m2', 7),
(9, 'Jala', 'Unit', 8),
(10, 'Pancingan', 'Unit', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_badan`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_badan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbsarpras_badan`
--

INSERT INTO `tbsarpras_badan` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Gedung Kantor', 1, 1),
(2, 'Ruangan Kerja', 1, 2),
(3, 'Jumlah Mesin Tik', 2, 1),
(4, 'Jumlah Meja', 2, 2),
(5, 'Buku Administrasi Keanggotaan BPD', 3, 1),
(6, 'Buku Administrasi Kegiatan BPD', 3, 2),
(8, 'Balai BPD', 1, 3),
(9, 'Kondisi', 1, 4),
(10, 'Listrik', 1, 5),
(11, 'Air Bersih', 1, 6),
(12, 'Telepon', 1, 7),
(13, 'Jumlah Kursi', 2, 3),
(14, 'Jumlah Almari Arsip', 2, 4),
(15, 'Komputer', 2, 5),
(16, 'Mesin Fax', 2, 6),
(17, 'Buku Kegiatan BPD', 3, 3),
(18, 'Buku Himpunan Peraturan Desa Yang Ditetapkan BPD dan Kepala Desa', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_desa`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_desa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tbsarpras_desa`
--

INSERT INTO `tbsarpras_desa` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Gedung Kantor', 1, 1),
(2, 'Kondisi', 1, 2),
(3, 'Jumlah Ruang Kerja', 1, 3),
(4, 'Jumlah Mesin Tik', 2, 1),
(5, 'Jumlah Meja', 2, 2),
(6, 'Jumlah Kursi', 2, 3),
(7, 'Buku Data Peraturan Desa', 3, 1),
(8, 'Buku Keputusan Kepala Desa/Lurah', 3, 2),
(10, 'Balai Desa/ Kelurahan/ Sejenisnya', 1, 4),
(11, 'Listrik', 1, 5),
(12, 'Air Bersih', 1, 6),
(13, 'Telepon', 1, 7),
(14, 'Rumah Dinas Kepala Desa/ Lurah', 1, 8),
(15, 'Rumah Dinas Perangkat Desa/ Kelurahan', 1, 9),
(16, 'Jumlah Almari Arsip', 2, 4),
(17, 'komputer', 2, 5),
(18, 'Mesin Fax', 2, 6),
(19, 'Kendaraan Dinas', 2, 7),
(20, 'Buku Admiinistrasi Penduduk', 3, 3),
(21, 'Buku Data Inventaris', 3, 4),
(22, 'Buku Data Aparat', 3, 5),
(23, 'Buku Data Tanah Milik Desa/ Tanah Kas Desa/ Milik Kelurahan', 3, 6),
(24, 'Buku Administrasi Pajak Dan Retribusi', 3, 7),
(25, 'Buku Data Tanah', 3, 8),
(26, 'Buku Laporan Pengaduan Masyarakat ', 3, 9),
(27, 'Buku Agenda Ekspedisi', 3, 10),
(28, 'Buku Profil Desa/ Kelurahan', 3, 11),
(29, 'Buku Data Induk Penduduk', 3, 12),
(30, 'Buku-Buku Data Mutasi Penduduk', 3, 13),
(31, 'Buku Rekapitulasi Jumlah Penduduk Akhir Bulan', 3, 14),
(32, 'Buku Registrasi Pelayanan Penduduk', 3, 15),
(33, 'Buku Data Penduduk Sementara', 3, 16),
(34, 'Buku Anggaran Penerimaan', 3, 17),
(35, 'Buku Anggaran Pengeluaran Pegawai dan Pembangunan', 3, 18),
(36, 'Buku Kas Umum', 3, 19),
(37, 'Buku Kas Pembantu Penerimaan', 3, 20),
(38, 'Buku Kas Pembantu Pengeluaran dan Pembangunan', 3, 21),
(39, 'Buku Data Lembaga Kemasyarakatan', 3, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_dusun`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_dusun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbsarpras_dusun`
--

INSERT INTO `tbsarpras_dusun` (`id`, `nama`, `posisi`) VALUES
(1, 'Gedung Kantor atau Balai Pertemuan', 1),
(2, 'Alat Tulis Kantor', 2),
(4, 'Barang Inventaris', 3),
(5, 'Buku Administrasi', 4),
(6, 'Jenis Kegiatan', 5),
(7, 'Jumlah Pengurus', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_kebersihan`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_kebersihan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tbsarpras_kebersihan`
--

INSERT INTO `tbsarpras_kebersihan` (`id`, `nama`, `posisi`) VALUES
(1, 'Tempat Pembuangan Sementara (TPS)', 1),
(2, 'Tempat Pembuangan Akhir (TPA)', 2),
(3, 'Alat Penghancur Sampah/Incinerator', 3),
(5, 'Jumlah Gerobak Sampah', 4),
(6, 'Jumlah Tong Sampah', 5),
(7, 'Jumlah Truck Pengangkut Sampah', 6),
(8, 'Jumlah Satgas Kebersihan', 7),
(9, 'Jumlah Anggota Satgas Kebersihan', 8),
(10, 'Jumlah Pemulung', 9),
(11, 'Tempat Pengolahan Sampah', 10),
(12, 'Pengelolaan Sampah Lingkungan/ RT', 11),
(13, 'Pengelola Sampah Lainnya', 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_kesehatan`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_kesehatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbsarpras_kesehatan`
--

INSERT INTO `tbsarpras_kesehatan` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Rumah Sakit Umum', 1, 1),
(2, 'Puskesmas', 1, 2),
(3, 'Jumlah Dokter Umum', 2, 1),
(4, 'Jumlah Dokter Gigi', 2, 2),
(6, 'Puskesmas Pembantu', 1, 3),
(7, 'Poliklinik/ Balai Pengobatan', 1, 4),
(8, 'Apotik', 1, 5),
(9, 'Posyandu', 1, 6),
(10, 'Toko Obat', 1, 7),
(11, 'Balai Pengobatan Masyarakatan Yayasan/ Swasta', 1, 8),
(12, 'Gudang Penyimpanan Obat', 1, 13),
(13, 'Jumlah Rumah/ Kantor Praktek Dokter', 1, 14),
(14, 'Rumah Bersalin', 1, 15),
(15, 'Balai Pengobatan Ibu dan Anak', 1, 16),
(16, 'Rumah Sakit Mata', 1, 17),
(17, 'Jumlah Dokter Spesialis Lainnya', 2, 3),
(18, 'Jumlah Paramedis', 2, 4),
(19, 'Jumlah Dukun Bersalin Terlatih', 2, 5),
(20, 'Bidan', 2, 6),
(21, 'Perawat', 2, 7),
(22, 'Dukun Pengobatan Alternatif', 2, 8),
(24, 'Jumlah Dokter Praktek', 2, 10),
(25, 'Laboratorium Kesehatan', 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_laut`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_laut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbsarpras_laut`
--

INSERT INTO `tbsarpras_laut` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Jumlah Tambatan Perahu', 1, 1),
(2, 'Jumlah Pelabuhan Kapal Penumpang', 1, 2),
(3, 'Perahu Motor', 2, 1),
(4, 'Kapal Antar Pulau', 2, 2),
(5, 'Perahu Tanpa Motor', 2, 3),
(7, 'Jumlah Pelabuhan Kapal Barang', 1, 3),
(8, 'Jet Boat', 2, 4),
(9, 'Kapal Pesiar', 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_lembaga`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_lembaga` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `tbsarpras_lembaga`
--

INSERT INTO `tbsarpras_lembaga` (`id`, `nama`, `posisi`) VALUES
(1, 'Gedung/ Kantor Lembaga Kemasyarakatan Desa dan Kelurahan/LKD/LK', 1),
(2, 'Peralatan Kantor : Komputer, Fax', 2),
(4, 'Mesin Tik', 3),
(5, 'Kardek', 4),
(6, 'Buku Administrasi Lembaga Kemasyarakatan', 5),
(7, 'Jumlah Meja dan Kursi', 6),
(8, 'LKMD/ LPN atau Sebutan Lain', 8),
(9, 'Memiliki Kantor Sendiri', 9),
(10, 'Peralatan Kantor : Komputer, Fax', 10),
(11, 'Mesin Tik', 11),
(12, 'Kardek', 12),
(13, 'Buku Administrasi Lembaga Kemasyarakatan', 13),
(14, 'Jumlah Meja dan Kursi', 14),
(15, 'Buku Administrasi', 15),
(16, 'Jumlah Kegiatan', 16),
(17, 'PKK', 17),
(18, 'Gedung/ Kantor', 18),
(19, 'Peralatan Kantor/ ATK/ inventaris', 19),
(20, 'Kepengurusan', 20),
(21, 'Buku Administrasi PKK', 21),
(22, 'Kegiatan', 22),
(23, 'Jumlah Kegiatan', 23),
(24, 'Karang Taruna', 24),
(25, 'Kepengurusan', 25),
(26, 'Buku Administrasi', 26),
(27, 'Jumlah Kegiatan', 27),
(28, 'RT', 28),
(29, 'Kepengurusan', 29),
(30, 'Buku Administrasi', 30),
(31, 'Jumlah Kegiatan', 31),
(32, 'RW', 32),
(33, 'Kepengurusan', 33),
(34, 'Buku Administrasi', 34),
(35, 'Jumlah Kegiatan', 35),
(36, 'Bumdes', 41),
(37, 'Memiliki Kantor/ Gedung/ Menumpang', 37),
(38, 'Kepengurusan', 38),
(39, 'Buku Administrasi', 39),
(40, 'Jumlah Kegiatan', 40),
(41, 'Kepengurusan', 43),
(42, 'Memiliki Kantor/ Gedung/ Menumpang', 42),
(43, 'Jumlah Kegiatan', 45),
(44, 'Buku Administrasi', 44),
(45, 'Lembaga Adat', 36),
(46, 'Forum Komunikasi Kader Pemberdayaan Masyarakat', 46),
(47, 'Kantor/ Gedung/ Menumpang', 47),
(48, 'Kepengurusan', 48),
(49, 'Buku Administrasi', 49),
(50, 'Jumlah Kegiatan', 50),
(51, 'Kantor/ Gedung Organisasi Sosial Kemasyarakatan Lainnya', 51);

-- --------------------------------------------------------

--
-- Table structure for table `tbsarpras_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tbsarpras_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbsarpras_pendidikan`
--

INSERT INTO `tbsarpras_pendidikan` (`id`, `nama`, `posisi`) VALUES
(1, 'Gedung Kampus PTN', 1),
(2, 'Gedung Kampus PTS', 2),
(3, 'Gedung SMA/ Sederajat', 3),
(5, 'Gedung SMP/ Sederajat', 4),
(6, 'Gedung SD/ Sederajat', 5),
(7, 'Gedung TK', 6),
(8, 'Gedung Tempat Bermain Anak', 7),
(9, 'Jumlah Lembaga Pendidikan Agama', 8),
(10, 'Jumlah Perpustakaan Keliling', 9),
(11, 'Perpustakaan Desa/ Kelurahan', 10),
(12, 'Taman Bacaan', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbsumber_air`
--

CREATE TABLE IF NOT EXISTS `tbsumber_air` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbsumber_air`
--

INSERT INTO `tbsumber_air` (`id`, `nama`, `posisi`) VALUES
(1, 'Mata Air', 1),
(3, 'Sumur Gali', 2),
(4, 'Sumur Pompa', 3),
(5, 'Hidran Umum', 4),
(6, 'PAM', 5),
(7, 'Pipa', 6),
(8, 'Sungai', 7),
(9, 'Embung ', 8),
(10, 'Bak Penampung Air Hujan', 9),
(11, 'Beli Dari Tangki Swasta', 10),
(12, 'Depot Isi Ulang', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbsungai_rawa`
--

CREATE TABLE IF NOT EXISTS `tbsungai_rawa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `tipe` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbsungai_rawa`
--

INSERT INTO `tbsungai_rawa` (`id`, `nama`, `tipe`, `posisi`) VALUES
(1, 'Jumlah Sungai', 1, 1),
(2, 'Kondisi', 1, 3),
(4, 'Pencemaran Air', 2, 2),
(5, 'Tercemar', 1, 4),
(6, 'Pandangkalan/ Pengendapan Lumpur Tinggi', 1, 5),
(7, 'Keruh', 1, 6),
(8, 'Memenuhi Baku Mutu Air', 1, 7),
(9, 'Berkurangnya biota sungai', 1, 8),
(10, 'Kering', 1, 9),
(11, 'Luas Rawa', 2, 3),
(12, 'Pemanfaatan', 2, 4),
(13, 'Perikanan Darat Maupun Laut', 2, 5),
(14, 'Air baku untuk pengolahan air minurm', 2, 6),
(15, 'Cuci dan Mandi', 2, 7),
(16, 'Irigasi', 2, 8),
(17, 'Buang air besar', 2, 9),
(18, 'Perikanan', 2, 10),
(19, 'Sayuran', 2, 11),
(20, 'Pembudidayaan Hutan Manggrove', 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tbtenaga_kerja`
--

CREATE TABLE IF NOT EXISTS `tbtenaga_kerja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbtenaga_kerja`
--

INSERT INTO `tbtenaga_kerja` (`id`, `nama`, `posisi`) VALUES
(1, 'Penduduk Usia 18-56 Tahun', 1),
(2, 'Penduduk Usia 18-56 Tahun yang Bekerja', 2),
(4, 'Penduduk Usia 18-56 Tahun yang Belum/ Tidak Bekerja', 3),
(5, 'Penduduk usia 0 - 6 Tahun', 4),
(6, 'Penduduk masih sekolah 7-18 Tahun', 5),
(7, 'Penduduk usia 56 Tahun ke atas', 6),
(8, 'Angkatan Kerja', 7),
(9, 'Jumlah', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbtingkat_pendidikan`
--

CREATE TABLE IF NOT EXISTS `tbtingkat_pendidikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  `posisi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbtingkat_pendidikan`
--

INSERT INTO `tbtingkat_pendidikan` (`id`, `nama`, `posisi`) VALUES
(1, 'Usia 3-6 Tahun yang belum masuk TK', 1),
(3, 'Usia 6-12 Tahun yang Masuk SD', 2),
(5, 'usia 3-6 Tahun yang sedang TK/ Play Group', 3),
(6, 'Usia 7-18 yang tidak pernah sekolah', 4),
(7, 'Usia 7-18 yang tidak pernah SD tetapi tidak tamat', 5),
(8, 'Tamat SD/ Sederajat', 6),
(9, 'Jumlah Usia 12 - 56 Tahun yang tidak tamat SL/TP', 7),
(10, 'Jumlah Usia 12 - 56 Tahun yang tidak tamat SL/TA', 8),
(11, 'Tamat SMP/ Sederajat', 9),
(12, 'Tamat SMA/ Sederajat', 10),
(13, 'Tamat D-1/ Sederajat', 11),
(14, 'Tamat D-2/ Sederajat', 12),
(15, 'Tamat D-3/ Sederajat', 13),
(16, 'Tamat S-1/ Sederajat', 14),
(17, 'Tamat S-2/ Sederajat', 15),
(18, 'Tamat S-3/ Sederajat', 16),
(19, 'Tamat SLB A', 17),
(20, 'Tamat SLB B', 18),
(21, 'Tamat SLB C', 19),
(22, 'Jumlah', 20);
