-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2017 at 02:57 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'Judul Explicit 111', 'Kategori Explicit 1213', '<p>Keterangan Explicit 132432</p>', '20171127202205.pdf', 0, '12345', '2017-11-27 20:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_tacit` int(11) NOT NULL,
  `id_explicit` int(11) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '12345', 'Judul 13', 'Kategori Tacit 13', '<p>Masalah Tacit 13</p>', '<p>Solusi Tacit 13</p>', '2017-11-27 18:03:50', 0);

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
('09021181520021', '985fabf8f96dc1c4c306341031569937', 'Aaaaaa', 'Kebagan', 'Kepala', 'arliansyah_azhary@yahoo.com', '324234', '', 'asdasdas'),
('12345', '985fabf8f96dc1c4c306341031569937', 'AABB', 'Staff', 'AABB', 'arliansyah_azhary@yahoo.com', '4353', '', 'AABB');

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
  MODIFY `id_explicit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tacit`
--
ALTER TABLE `tacit`
  MODIFY `id_tacit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
