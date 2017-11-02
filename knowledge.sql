-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2017 at 12:19 PM
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
-- Table structure for table `hasil_uji_daun`
--

CREATE TABLE `hasil_uji_daun` (
  `id_hasil` int(11) NOT NULL,
  `nama_sampel` varchar(20) NOT NULL,
  `tahun_tanam` varchar(4) NOT NULL,
  `jenis_sampel` varchar(10) NOT NULL,
  `tgl_mulai_analisa` date NOT NULL,
  `tgl_selesai_analisa` date NOT NULL,
  `kondisi_sampel` varchar(30) NOT NULL,
  `kode_lab` varchar(15) NOT NULL,
  `parameter` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `hasil_analisa` varchar(50) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_uji_tanah`
--

CREATE TABLE `hasil_uji_tanah` (
  `id_hasil` int(11) NOT NULL,
  `nama_sampel` varchar(20) NOT NULL,
  `tahun_tanam` varchar(4) NOT NULL,
  `jenis_sampel` varchar(10) NOT NULL,
  `tgl_mulai_analisa` date NOT NULL,
  `tgl_selesai_analisa` date NOT NULL,
  `kondisi_sampel` varchar(30) NOT NULL,
  `kode_lab` varchar(15) NOT NULL,
  `parameter` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `hasil_analisa` varchar(50) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan_tacit`
--

CREATE TABLE `pengetahuan_tacit` (
  `id_pengetahuan` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan_tacit`
--

INSERT INTO `pengetahuan_tacit` (`id_pengetahuan`, `judul`, `deskripsi`) VALUES
(1, 'Judul', 'Deskripsi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_uji_daun`
--
ALTER TABLE `hasil_uji_daun`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `hasil_uji_tanah`
--
ALTER TABLE `hasil_uji_tanah`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `pengetahuan_tacit`
--
ALTER TABLE `pengetahuan_tacit`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_uji_daun`
--
ALTER TABLE `hasil_uji_daun`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hasil_uji_tanah`
--
ALTER TABLE `hasil_uji_tanah`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengetahuan_tacit`
--
ALTER TABLE `pengetahuan_tacit`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
