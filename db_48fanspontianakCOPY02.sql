-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 06:15 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_48fanspontianak`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_about`
--

CREATE TABLE `tb_about` (
  `id_about` int(2) NOT NULL,
  `isi_about` text NOT NULL,
  `email_about` varchar(30) NOT NULL,
  `nohp_about` varchar(100) NOT NULL,
  `link_fb_about` varchar(100) NOT NULL,
  `link_twitter_about` varchar(100) NOT NULL,
  `link_youtube_about` varchar(100) NOT NULL,
  `foto_about` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_about`
--

INSERT INTO `tb_about` (`id_about`, `isi_about`, `email_about`, `nohp_about`, `link_fb_about`, `link_twitter_about`, `link_youtube_about`, `foto_about`) VALUES
(1, 'hai \r\nksa\r\njksadlsa\r\nslkjaLKAL\r\nk>?{PPP+$#^*&()', '48fansptk@gmail.com', 'Arief 081351014256 | Fikri 08152246421', 'https://www.facebook.com/groups/AKB48.JKT48.PTK48', 'https://twitter.com/48fanspontianak', 'https://www.youtube.com/channel/UCm-nKMTZR8Q2RQjZAxQba2g', '48ptk2017_07_19_12_13_50.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `level_akun` int(2) NOT NULL COMMENT '1 = ketua komunitas, 2 = pengurus, 3 = anggota',
  `keanggotaan` varchar(20) NOT NULL,
  `foto_akun` text,
  `username_akun` varchar(20) NOT NULL,
  `pw_akun` varchar(32) NOT NULL,
  `panggilan_akun` varchar(15) NOT NULL,
  `kelamin_akun` varchar(10) NOT NULL,
  `goldar_akun` varchar(2) NOT NULL,
  `ttl_akun` date NOT NULL,
  `tinggi_akun` int(4) NOT NULL,
  `email_akun` varchar(30) NOT NULL,
  `link_fb_akun` varchar(100) NOT NULL,
  `link_twitter_akun` varchar(100) NOT NULL,
  `link_gplus_akun` varchar(100) NOT NULL,
  `deskripsi_akun` text NOT NULL,
  `created_akun` datetime DEFAULT NULL,
  `id_idol` int(5) NOT NULL,
  `del_akun` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_akun`, `level_akun`, `keanggotaan`, `foto_akun`, `username_akun`, `pw_akun`, `panggilan_akun`, `kelamin_akun`, `goldar_akun`, `ttl_akun`, `tinggi_akun`, `email_akun`, `link_fb_akun`, `link_twitter_akun`, `link_gplus_akun`, `deskripsi_akun`, `created_akun`, `id_idol`, `del_akun`) VALUES
(1, 'ketua', 2, '', '48ptk2017_07_19_12_13_50.jpg', 'ketua', '00719910bb805741e4b7f28527ecb3ad', '', 'laki-laki', '', '0000-00-00', 0, '', '', '', '', '', '0000-00-00 00:00:00', 0, 1),
(2, 'dad', 3, '', '48ptk2017_07_19_12_13_50.jpg', 'sdaa', '89defae676abd3e3a42b41df17c40096', 'asd', 'perempuan', 'A', '0000-00-00', 321, '', '', '', '', '', '0000-00-00 00:00:00', 1, 1),
(3, 'adfad', 3, '', '_jcr_content.autoteaser.jpeg', 'fsadas', 'baa7a52965b99778f38ef37f235e9053', 'dfsdjkh', 'perempuan', 'A', '2017-05-10', 122, '', '', '', '', '', '0000-00-00 00:00:00', 1, 1),
(4, 'namaleng oleng', 2, 'Wakil Ketua', '48ptk2017_07_25_17_08_14.png', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'namapang', 'Laki-laki', 'O', '2017-05-10', 200, 'dini@rio.com', 'fb', 'twitt', 'google', 'akkkkhhh\r\nakkkhh\r\nkasjdklaj', '0000-00-00 00:00:00', 1, 0),
(5, 'padukan', 1, 'Ketua Komunitas', '48ptk2017_06_16_06_37_54.jpg', 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'paduu', 'laki-laki', 'B', '1999-12-01', 144, 'reae@asda.com', 'http://facebook.com/fg', 'gfg', 'gfg', '', '0000-00-00 00:00:00', 0, 0),
(6, 'melo sia', 3, '', '48ptk2017_07_17_12_34_00.jpg', 'meloo', '81dc9bdb52d04dc20036dbd8313ed055', 'sou', 'Laki-laki', 'B', '2017-07-04', 161, 'lome@ow.com', '', '', '', '', '0000-00-00 00:00:00', 1, 0),
(7, 'Admin yg kedua', 3, '', 'CKCfxDmUEAALN_X.jpg', 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'duamin', 'Perempuan', 'O', '2009-11-26', 155, 'sdah@diah.com', '', '', '', 'ouhuhkjh\r\noww okkk okok\r\nwooo', '0000-00-00 00:00:00', 3, 0),
(8, 'dgahsjd', 3, '', '48ptk2017_07_19_12_13_50.jpg', 'hdasd', '268a99ebd88a4a87727b6ea08871c800', '', '', '', '0000-00-00', 0, 'agd@sahgd.com', '', '', '', '', NULL, 2, 0),
(9, 'sajdhasjk', 3, '', '48ptk2017_07_19_12_13_50.jpg', 'mantao', '5dfc830291d31506ef8b50eae959b67a', '', '', '', '0000-00-00', 0, 'ahdghja!@jasd.om', '', '', '', '', '2017-07-26 11:49:45', 2, 0),
(10, 'hardini', 3, '', '48ptk2017_07_19_12_13_50.jpg', 'dini', '1081d10fa81a9f9555231efdbd302313', '', '', '', '0000-00-00', 0, 'oclaudini@gmail.com', '', '', '', '', '2017-07-31 09:35:01', 2, 0),
(11, 'riogunawan', 3, '', '48ptk2017_07_19_12_13_50.jpg', 'riogun', '25d55ad283aa400af464c76d713c07ad', '', '', '', '0000-00-00', 0, 'tes@mail.com', '', '', '', '', '2017-07-31 09:39:05', 4, 0),
(12, 'Rio Gunawan', 3, '', '', 'rioya', '25d55ad283aa400af464c76d713c07ad', '', '', '', '0000-00-00', 0, 'riogunawan29@gmail.com', '', '', '', '', '2017-08-10 11:31:51', 2, 0),
(13, 'Isbandi', 3, 'Anggota', '', 'bandi', '25d55ad283aa400af464c76d713c07ad', '', '', '', '0000-00-00', 0, 'isbandi9@gmail.com', '', '', '', '', '2017-08-10 16:06:23', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(111) NOT NULL,
  `judul_berita` varchar(200) NOT NULL,
  `isi_berita` text NOT NULL,
  `tgl_berita` date NOT NULL,
  `id_jns_berita` int(11) NOT NULL,
  `foto_berita` text,
  `foto_ket_berita` varchar(200) DEFAULT NULL,
  `id_akun` int(11) NOT NULL,
  `del_berita` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `judul_berita`, `isi_berita`, `tgl_berita`, `id_jns_berita`, `foto_berita`, `foto_ket_berita`, `id_akun`, `del_berita`) VALUES
(1, 'Veranda', 'aaa\r\nbbbbb\r\ncc\r\ndd', '2017-06-01', 1, '48ptk1497505999.jpg', 'rumah kalender', 5, 0),
(2, 'dasda', 'dasjd', '2017-06-02', 2, '+.jpg', 'xhgdsja', 5, 1),
(3, 'dffdadDASJ', 'JAGHJDASGDJH', '2017-06-02', 1, '48ptk1497505844.jpg', 'dsahuda', 5, 0),
(4, 'sameke', 'djash\r\ndjsah\r\nsdja\r\n', '2017-06-02', 1, '+.jpg', 'okeeey', 5, 0),
(5, 'ini yang ke 4 t', 'semua\r\nitu \r\nindah', '2017-06-04', 1, '11022593_890322477657013_5285411910248990684_o.jpg', 'disini', 5, 0),
(6, 'dsad', 'dsad', '2017-06-04', 2, '', 'dsad', 5, 1),
(7, 'jjk', 'lkl', '2017-06-04', 2, '', 'klk', 5, 1),
(8, 'hdajsk', 'kjdas', '2017-06-04', 48, '', 'kfdl', 5, 1),
(9, 'kjhkj', 'kldjsakd', '2017-06-04', 2, '', 'oop', 5, 1),
(10, 'tesyg ke5', 'sad\r\naaa\r\nbbb\r\nccc', '2017-06-04', 1, '+.jpg', 'jpp', 5, 0),
(11, 'apa ya', 'padu baishdajd \r\ndajsgd\r\njdgasjh\r\ndgjhas', '2017-06-06', 2, '2A94D53B00000578-0-image-a-1_1437048505257.jpg', 'pg kerennn', 5, 0),
(12, 'ini hanya coba', 'dojsaodj\r\ndsajdka\r\nkos\r\nsada', '2017-06-07', 2, '48ptk1497505604.png', 'bioskop', 5, 0),
(13, 'sdjadah', 'djashjdka', '2017-06-18', 2, '48ptk2017_06_19_07_50_15.jpeg', 'kjdas', 5, 0),
(14, 'bnmbnm', 'nbnmcbxkjca', '2017-06-18', 1, '48ptk2017_07_08_08_33_36.jpg', 'dirumah', 5, 0),
(15, 'ini akan dihapus', 'yaaa benarr harus dihapus', '2017-07-08', 1, '_jcr_content.autoteaser.jpeg', 'hapus saja', 5, 1),
(16, 'hapus', 'hdhasdh', '2017-07-08', 1, 'a.png', 'dkjaskdlas', 5, 0),
(17, 'berita pertama kirim', 'ini bauidas hjk \r\nsdbuahd\r\neohauhdkuahds djsahd hdsa dhas\\ds\r\ndsuah duah ishdai dhljpsjd\r\nhsudash dahdoi', '2017-08-01', 1, '48ptk2017_07_19_12_13_50.jpg', 'dashdia', 5, 0),
(27, 'ini kedua', 'dnasj', '2017-08-01', 2, '48ptk2017_07_19_12_13_50.jpg', 'sgdah', 5, 0),
(28, 'ini yang ke 3', 'shjgdah gdasj', '2017-08-01', 2, '48ptk2017_07_19_12_13_50.jpg', 'jdasjhd', 5, 0),
(29, 'ini ketiga', 'djakshsdba\r\n dsagdj jksgdafas\r\nsfdjy asfaskgsak cg\r\nsdadjy askas', '2017-08-01', 1, '48ptk2017_07_19_12_13_50.jpg', 'sjahdg', 5, 0),
(30, 'ini yang keempat', 'dsabdasbdna asjdb\r\nfsfa sfafafa\r\nasff fafasf \r\nasfa asda\r\ndad a', '2017-08-01', 1, '48ptk2017_07_19_12_13_50.jpg', 'sdjahjd', 5, 0),
(31, 'ini coba ke satu', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-08-01', 1, '48ptk2017_07_19_12_13_50.jpg', 'dsad', 5, 0),
(32, 'tesss', 'hhoug hkg uuo \r\njimim\r\nimi', '2017-08-04', 1, 'B94e8bmIMAA9LMn.jpg', 'sendiri', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_event`
--

CREATE TABLE `tb_event` (
  `id_event` int(11) NOT NULL,
  `judul_event` varchar(100) NOT NULL,
  `poster_event` varchar(100) NOT NULL,
  `isi_event` text NOT NULL,
  `tgl_posting_event` date NOT NULL,
  `tgl_event` date NOT NULL,
  `waktu_event` varchar(50) NOT NULL,
  `lokasi_event` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `jenis_event` varchar(20) NOT NULL,
  `tiket_online` varchar(20) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `del_event` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_event`
--

INSERT INTO `tb_event` (`id_event`, `judul_event`, `poster_event`, `isi_event`, `tgl_posting_event`, `tgl_event`, `waktu_event`, `lokasi_event`, `latitude`, `longitude`, `jenis_event`, `tiket_online`, `id_akun`, `del_event`) VALUES
(1, 'udqah idubag', '48ptk2017_06_26_03_43_58.jpg', 'djhajsdhjk', '2017-06-26', '2017-06-20', '12:20 - selesai', 'sijada', '132136129', '-8917381927', 'gathering', '', 5, 0),
(2, 'gathering 1', '48ptk2017_07_19_12_13_50.jpg', 'isi nya keren', '2017-06-20', '2017-06-20', '13:00 wib - selesai', 'lkjsadlksa', '-312893718', '-12.2013', 'gathering', '', 5, 0),
(3, 'dsagd 1', '48ptk2017_07_19_12_13_50.jpg', 'yt32yue', '2017-06-26', '2015-07-15', 'hasjd', 'jhsajd', '-312893718', '-12.2013', 'gathering', '', 5, 0),
(4, 'dsadsajh', '001.jpg', 'sdlahd', '2017-06-20', '0000-00-00', 'dgas', 'dasjg', '123', '2131', 'gathering', '', 5, 0),
(5, 'kjkj', '48ptk2017_07_19_12_13_50.jpg', 'sdlahd', '2017-06-26', '2013-05-13', 'dgas', 'dasjg', '89.9999974386834', '-28.99977469444275', 'gathering', '', 5, 1),
(6, 'Jdul Event', 'anakagei BW logo.png', 'isi nya kana\r\nhskad\r\ndsahdkashkdh\r\nAKSHAS', '2017-07-22', '2012-07-13', '10.202 wi - idwda', 'di sekertariat\r\nankah\r\naakk', '-0.022386474858168342', '109.33952539286804', 'event', 'tersedia', 5, 0),
(7, 'adahdg', 'anakagei_BW_logo.png', 'jdahsdjksa', '2017-07-20', '2017-06-07', 'dahd', 'ajdhja', '-0.021689100565892766', '109.33831303439331', 'event', '', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_idol`
--

CREATE TABLE `tb_idol` (
  `id_idol` int(11) NOT NULL,
  `nama_idol` varchar(50) NOT NULL,
  `panggilan_idol` varchar(15) NOT NULL,
  `tlahir_idol` date NOT NULL,
  `goldar_idol` varchar(2) DEFAULT NULL,
  `tinggi_idol` int(4) NOT NULL,
  `foto_idol` varchar(100) NOT NULL,
  `id_idol_group` int(5) NOT NULL,
  `del_idol` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_idol`
--

INSERT INTO `tb_idol` (`id_idol`, `nama_idol`, `panggilan_idol`, `tlahir_idol`, `goldar_idol`, `tinggi_idol`, `foto_idol`, `id_idol_group`, `del_idol`) VALUES
(1, 'Melody wow', 'Miawww', '2017-07-16', 'AB', 200, '48ptk2017_08_11_05_48_42.jpg', 1, 0),
(2, 'zooo looo', 'ziie', '2017-07-14', 'B', 160, 'bl.jpg', 2, 0),
(3, 'sadas', '', '0000-00-00', 'B', 0, '', 1, 1),
(4, 'idol 2', 'satu', '2017-07-19', 'AB', 200, '48ptk1497505557.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_idol_group`
--

CREATE TABLE `tb_idol_group` (
  `id_idol_group` int(5) NOT NULL,
  `nama_idol_group` varchar(10) NOT NULL,
  `logo_idol_group` varchar(100) NOT NULL,
  `banner_idol_group` varchar(100) NOT NULL,
  `ket_idol_group` text NOT NULL,
  `link_idol_group` varchar(100) NOT NULL,
  `tahun_idol_group` varchar(100) NOT NULL,
  `lokasi_idol_group` varchar(100) NOT NULL,
  `del_idol_group` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_idol_group`
--

INSERT INTO `tb_idol_group` (`id_idol_group`, `nama_idol_group`, `logo_idol_group`, `banner_idol_group`, `ket_idol_group`, `link_idol_group`, `tahun_idol_group`, `lokasi_idol_group`, `del_idol_group`) VALUES
(1, 'AKB48', '48ptk2017_07_14_11_00_38.jpg', '48ptk2017_07_14_11_03_43.png', 'Kami ingin menciptakan tempat bagi para perempuan Indonesia untuk mewujudkan impian mereka. Bersama para penggemar, kami ingin membuat satu-satunya “Idola Orisinil Indonesia“. Inilah inspirasi utama kami meluncurkan JKT48.\r\n\r\nSeluruh anggota JKT48 akan berjuang untuk menggapai tujuan mereka menjadi idola sesungguhnya. Untuk itu, mereka akan berdedikasi tinggi terhadap kegiatan mereka. Tidak hanya menyanyi dan menari, namun juga bakat atau penampilan lainnya. Ayo, datang dan saksikan para anggota berjuang keras mewujudkan mimpi mereka. AKB48 dapat sukses karena tumbuh “bersama“ para penggemar sehingga mereka dapat mencapai posisi seperti saat ini. Kami ingin JKT48 mengikuti jejak AKB48 untuk menjadi grup idola yang dekat dengan para penggemarnya dan juga menjalin hubungan yang erat dengan mereka. Kami percaya bahwa dukungan dari para penggemar akan membawa JKT48 ke tingkat yang lebih tinggi, dimulai dari grup idola yang berbasis di Jakarta hingga menjadi dikenal di seluruh dunia.', 'http://www.akb48.co.jp', '2006', 'Akihabara, Jepang', 0),
(2, 'JKT48', 'jkt48.jpg', '48ptk2017_07_13_12_22_43.gif', 'Kami ingin menciptakan tempat bagi para perempuan Indonesia untuk mewujudkan impian mereka. Bersama para penggemar, kami ingin membuat satu-satunya “Idola Orisinil Indonesia“. Inilah inspirasi utama kami meluncurkan JKT48.\r\n\r\nSeluruh anggota JKT48 akan berjuang untuk menggapai tujuan mereka menjadi idola sesungguhnya. Untuk itu, mereka akan berdedikasi tinggi terhadap kegiatan mereka. Tidak hanya menyanyi dan menari, namun juga bakat atau penampilan lainnya. Ayo, datang dan saksikan para anggota berjuang keras mewujudkan mimpi mereka. AKB48 dapat sukses karena tumbuh “bersama“ para penggemar sehingga mereka dapat mencapai posisi seperti saat ini. Kami ingin JKT48 mengikuti jejak AKB48 untuk menjadi grup idola yang dekat dengan para penggemarnya dan juga menjalin hubungan yang erat dengan mereka. Kami percaya bahwa dukungan dari para penggemar akan membawa JKT48 ke tingkat yang lebih tinggi, dimulai dari grup idola yang berbasis di Jakarta hingga menjadi dikenal di seluruh dunia.', 'https://jkt48.com/', '2011', 'Jakarta, Indonesia', 0),
(3, 'zmz', '+.jpg', '48ptk2017_07_14_11_09_45.jpeg', 'hdasjkdh', 'http://www.dhasjdah.com', '', '', 1),
(4, 'SKE48', 'ske48.png', '48ptk2017_08_10_12_01_59.png', 'Sebagai kemajuan nasional yang pertama dari AKB48 yang berbasis di Akihabara, Tokyo, pada bulan Juli 2008, grup idola lahir di Nagoya Sakae. Hal ini dinamai inisial rumah Sakae (Sakae) SKE48 dan (SK E Forty Eight). Kemudian Jepang, dan merupakan cikal bakal dari 48 proyek yang akan dikerahkan di dunia. \r\nDalam SKE48 Ferris wheel terletak di Nagoya Sakae terletak di lantai dua dari hiburan bangunan keluar Sunshine Sakae simbol teater (SKE48 THEATER), masing-masing dari pertunjukan sekitar 2 jam terdiri dari lagu dan tarian, pembicaraan tentang S · K? · E Kami secara teratur diadakan pada siswa tim dan penelitian.', 'http://www.ske48.co.jp', '2008', 'Nagoya Sakae, Jepang', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jns_berita`
--

CREATE TABLE `tb_jns_berita` (
  `id_jns_berita` int(11) NOT NULL,
  `jns_berita` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jns_berita`
--

INSERT INTO `tb_jns_berita` (`id_jns_berita`, `jns_berita`) VALUES
(1, '48Group'),
(2, '48FansPontianak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_memesan`
--

CREATE TABLE `tb_memesan` (
  `id_memesan` int(11) NOT NULL,
  `no_memesan` varchar(20) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `jumlah_tiket` int(5) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `foto_resi` varchar(100) DEFAULT NULL,
  `kode_tiket` varchar(50) DEFAULT NULL,
  `tgl_memesan` date NOT NULL,
  `del_memesan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_memesan`
--

INSERT INTO `tb_memesan` (`id_memesan`, `no_memesan`, `id_tiket`, `total_harga`, `jumlah_tiket`, `id_akun`, `status_bayar`, `foto_resi`, `kode_tiket`, `tgl_memesan`, `del_memesan`) VALUES
(2, 'M06155', 1, 800, 1, 5, 'Sudah', 'resi48ptk2017_08_10_13_52_31.JPG', 'Tiket48ptk-6-1-06-M06155-5-1-0', '2017-08-06', 0),
(3, 'M06155', 1, 1600, 2, 5, 'Sudah', 'resi48ptk2017_08_10_13_52_31.JPG', 'Tiket48ptk-6-1-06-M06155-5-2-1', '2017-08-06', 0),
(4, 'M06155', 1, 2400, 3, 5, 'Sudah', 'resi48ptk2017_08_10_13_52_31.JPG', 'Tiket48ptk-6-1-06-M06155-5-3-2', '2017-08-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_metamemesan`
--

CREATE TABLE `tb_metamemesan` (
  `id_metamemesan` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `jumlah_tiket` int(5) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `tgl_memesan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_metamemesan`
--

INSERT INTO `tb_metamemesan` (`id_metamemesan`, `id_tiket`, `total_harga`, `jumlah_tiket`, `id_akun`, `status_bayar`, `tgl_memesan`) VALUES
(7, 2, 4000, 2, 5, 'belum', '2017-08-06'),
(8, 1, 2400, 3, 5, 'belum', '2017-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` int(5) NOT NULL,
  `harga_tiket` int(8) NOT NULL,
  `jenis_tiket` varchar(20) NOT NULL,
  `diskon_tiket` int(8) NOT NULL,
  `stok_tiket` int(5) NOT NULL,
  `id_event` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `del_tiket` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `harga_tiket`, `jenis_tiket`, `diskon_tiket`, `stok_tiket`, `id_event`, `id_akun`, `del_tiket`) VALUES
(1, 1000, 'Reguler', 20, 244, 6, 5, 0),
(2, 2000, 'vip', 0, 100, 6, 5, 0),
(4, 315, 'rhei', 10, 27, 3, 5, 0),
(5, 200, 'wuha', 0, 100, 5, 5, 1),
(6, 1000, 'rty', 0, 23, 3, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiketmeta`
--

CREATE TABLE `tb_tiketmeta` (
  `id_metatiket` int(2) NOT NULL,
  `harga_tiket` int(8) NOT NULL,
  `jenis_tiket` varchar(20) NOT NULL,
  `diskon_tiket` int(8) DEFAULT NULL,
  `id_event` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `stok_tiket` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`),
  ADD UNIQUE KEY `username_akun` (`username_akun`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `tb_idol`
--
ALTER TABLE `tb_idol`
  ADD PRIMARY KEY (`id_idol`);

--
-- Indexes for table `tb_idol_group`
--
ALTER TABLE `tb_idol_group`
  ADD PRIMARY KEY (`id_idol_group`);

--
-- Indexes for table `tb_jns_berita`
--
ALTER TABLE `tb_jns_berita`
  ADD PRIMARY KEY (`id_jns_berita`);

--
-- Indexes for table `tb_memesan`
--
ALTER TABLE `tb_memesan`
  ADD PRIMARY KEY (`id_memesan`);

--
-- Indexes for table `tb_metamemesan`
--
ALTER TABLE `tb_metamemesan`
  ADD PRIMARY KEY (`id_metamemesan`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `tb_tiketmeta`
--
ALTER TABLE `tb_tiketmeta`
  ADD PRIMARY KEY (`id_metatiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id_about` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_event`
--
ALTER TABLE `tb_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_idol`
--
ALTER TABLE `tb_idol`
  MODIFY `id_idol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_idol_group`
--
ALTER TABLE `tb_idol_group`
  MODIFY `id_idol_group` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_jns_berita`
--
ALTER TABLE `tb_jns_berita`
  MODIFY `id_jns_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_memesan`
--
ALTER TABLE `tb_memesan`
  MODIFY `id_memesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_metamemesan`
--
ALTER TABLE `tb_metamemesan`
  MODIFY `id_metamemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  MODIFY `id_tiket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_tiketmeta`
--
ALTER TABLE `tb_tiketmeta`
  MODIFY `id_metatiket` int(2) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
