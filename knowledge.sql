-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 06:43 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge`
--

-- --------------------------------------------------------

--
-- Table structure for table `explicit`
--

CREATE TABLE `explicit` (
  `id_explicit` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `nip` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `explicit`
--

INSERT INTO `explicit` (`id_explicit`, `judul`, `kategori`, `keterangan`, `dokumen`, `status`, `nip`, `waktu`) VALUES
(2, 'Test', 'test', '<p>test</p>', '20180112002516.pdf', 1, '12345', '2018-01-12 00:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_tacit` int(11) NOT NULL,
  `id_explicit` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_tacit`, `id_explicit`, `nip`, `waktu`, `komentar`) VALUES
(1, 1, 0, '12345', '2018-01-11 22:45:57', 'haha'),
(2, 1, 0, '12345', '2018-01-11 22:54:40', 'Ini komentarku, maka komentarmu?'),
(3, 0, 1, '12345', '2018-01-11 23:04:57', 'Ini komentarmu, mana komentarku?'),
(4, 0, 1, '09021181520021', '2018-01-11 23:24:18', 'tes'),
(5, 2, 0, '09021181520021', '2018-01-11 23:27:12', 'hihi'),
(6, 2, 0, '123', '2018-01-12 01:37:33', 'wess'),
(7, 0, 2, '123', '2018-01-12 01:40:43', 'tes'),
(8, 2, 0, '09021181419007', '2018-01-14 23:50:41', 'saya admin'),
(10, 2, 0, '09021181419007', '2018-01-15 00:17:02', 'test key');

-- --------------------------------------------------------

--
-- Table structure for table `tacit`
--

CREATE TABLE `tacit` (
  `id_tacit` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `judul` varchar(225) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `masalah` varchar(200) NOT NULL,
  `solusi` text NOT NULL,
  `waktu` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tacit`
--

INSERT INTO `tacit` (`id_tacit`, `nip`, `judul`, `kategori`, `masalah`, `solusi`, `waktu`, `status`) VALUES
(1, '12345', 'Judul 13', 'Kategori Tacit 13', '<p>Masalah Tacit 13</p>', '<p>Solusi Tacit 13</p>', '2017-11-27 18:03:50', 0),
(2, '12345', 'Tacit', 'cit', '<p>cit</p>', '<p>cit</p>', '2018-01-11 22:32:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `userfile` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `password`, `nama`, `jabatan`, `bagian`, `email`, `no_hp`, `userfile`, `alamat`) VALUES
('09021181419007', '985fabf8f96dc1c4c306341031569937', 'Azhary Arliansyah', 'Admin', 'Keuangan', 'arliansyah_azhary@yahoo.com', '08080808', 'aaabbbccc', 'GG LMPGsdfsd'),
('09021181520021', '985fabf8f96dc1c4c306341031569937', 'Aaaaaazzz', 'Kebagan', 'Kepalaaa', 'arliansyah_azhary@yahoo.coms', '32453', '', 'asd567iyasdasdas'),
('123', '985fabf8f96dc1c4c306341031569937', 'Azh', 'Staff Ahli', 'AABB', 'arliansyah_azhary@yahoo.com', '081234265011', '', 'Komplek Bougenville KM. 7 Palembang'),
('12345', 'a4f95a239896cd1fada61069976b9dda', 'AABBCC', 'Staff', 'AABBDD', 'arliansyah_azhary@yahoo.commm', 'trhfh43', '', 'AdABB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `explicit`
--
ALTER TABLE `explicit`
  ADD PRIMARY KEY (`id_explicit`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_tacit` (`id_tacit`),
  ADD KEY `id_explicit` (`id_explicit`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tacit`
--
ALTER TABLE `tacit`
  ADD PRIMARY KEY (`id_tacit`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `explicit`
--
ALTER TABLE `explicit`
  MODIFY `id_explicit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tacit`
--
ALTER TABLE `tacit`
  MODIFY `id_tacit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `explicit`
--
ALTER TABLE `explicit`
  ADD CONSTRAINT `explicit_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`id_tacit`) REFERENCES `tacit` (`id_tacit`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`id_explicit`) REFERENCES `explicit` (`id_explicit`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tacit`
--
ALTER TABLE `tacit`
  ADD CONSTRAINT `tacit_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `user` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
