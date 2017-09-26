-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 06:01 AM
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
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `id_akun` int(11) NOT NULL,
  `nama_akun` varchar(50) NOT NULL,
  `level_akun` int(2) NOT NULL COMMENT '1 = ketua komunitas, 2 = pengurus, 3 = anggota',
  `foto_akun` varchar(50) DEFAULT NULL,
  `username_akun` varchar(20) NOT NULL,
  `pw_akun` varchar(32) NOT NULL,
  `panggilan_akun` varchar(15) NOT NULL,
  `goldar_akun` varchar(2) NOT NULL,
  `ttl_akun` date NOT NULL,
  `tinggi_akun` int(4) NOT NULL,
  `email_akun` varchar(30) NOT NULL,
  `id_idol` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`id_akun`, `nama_akun`, `level_akun`, `foto_akun`, `username_akun`, `pw_akun`, `panggilan_akun`, `goldar_akun`, `ttl_akun`, `tinggi_akun`, `email_akun`, `id_idol`) VALUES
(1, 'ketua', 1, '', 'ketua', '00719910bb805741e4b7f28527ecb3ad', '', '', '0000-00-00', 0, '', 0),
(2, 'dad', 1, NULL, 'sdaa', '89defae676abd3e3a42b41df17c40096', 'asd', 'A', '0000-00-00', 321, '', 1),
(3, 'adfad', 1, '_jcr_content.autoteaser.jpeg', 'fsadas', 'baa7a52965b99778f38ef37f235e9053', 'dfsdjkh', 'A', '2017-05-10', 122, '', 1),
(4, 'namaleng', 1, 'blue_170316_0016.jpg', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'namapang', 'O', '2017-05-10', 321, 'dini@rio.com', 1),
(5, 'Rio Gunawan', 1, '11022593_890322477657013_5285411910248990684_o.jpg', 'rio', 'd5ed38fdbf28bc4e58be142cf5a17cf5', 'rio', 'A', '2017-05-08', 129, 'dini@rio.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akun`
--
ALTER TABLE `tb_akun`
  MODIFY `id_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
