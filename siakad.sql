-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 01, 2017 at 08:02 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.1.3-2+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_pengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_pengguna`, `password`, `nama`, `admin`) VALUES
('190', 'd56b699830e77ba53855679cb1d252da', 'Guru 1', 0),
('191', 'd56b699830e77ba53855679cb1d252da', 'Guru 2', 0),
('admin', 'd56b699830e77ba53855679cb1d252da', 'Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `halaman`
--

CREATE TABLE `halaman` (
  `nama_halaman` varchar(60) NOT NULL,
  `content_halaman` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halaman`
--

INSERT INTO `halaman` (`nama_halaman`, `content_halaman`) VALUES
('jadwal', '&lt;p&gt;--&lt;/p&gt;'),
('kalender', '&lt;p&gt;--&lt;/p&gt;'),
('supervisi', '&lt;p&gt;--&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `nama`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Fisika'),
(4, 'Ilmu Pengetahuan Sosial');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_siswa` varchar(60) NOT NULL,
  `nilai` double NOT NULL,
  `id_mata_pelajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(4) NOT NULL,
  `nip_guru` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_pengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_pengguna`, `password`, `nama`) VALUES
('9090', 'd56b699830e77ba53855679cb1d252da', 'Siswa 1'),
('9091', 'd56b699830e77ba53855679cb1d252da', 'Siswa 2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
