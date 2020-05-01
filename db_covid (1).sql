-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 10:13 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_case`
--

CREATE TABLE `tb_case` (
  `id_case` int(11) NOT NULL,
  `total_case` int(11) NOT NULL,
  `id_negara` int(11) DEFAULT NULL,
  `nc` int(11) DEFAULT NULL,
  `td` int(11) DEFAULT NULL,
  `nd` int(11) DEFAULT NULL,
  `tr` int(11) DEFAULT NULL,
  `ac` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_case`
--

INSERT INTO `tb_case` (`id_case`, `total_case`, `id_negara`, `nc`, `td`, `nd`, `tr`, `ac`) VALUES
(1, 1029878, 1, 19522, 58640, 1843, 140138, 831100),
(2, 232128, 2, 2706, 23822, 301, 123903, 84403),
(3, 201505, 3, 2091, 27359, 382, 68941, 105205),
(4, 165911, 4, 2638, 23660, 367, 46886, 95365),
(5, 161145, 5, 3996, 21678, 586, 0, 139123),
(6, 159431, 6, 673, 6215, 89, 117400, 35816),
(7, 114653, 7, 2392, 2992, 92, 38809, 72852),
(8, 93558, 8, 6411, 867, 73, 8456, 84235),
(9, 92584, 9, 1112, 5877, 71, 72439, 14268),
(10, 82836, 10, 6, 4633, 0, 77555, 648);

-- --------------------------------------------------------

--
-- Table structure for table `tb_negara`
--

CREATE TABLE `tb_negara` (
  `id_negara` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_negara`
--

INSERT INTO `tb_negara` (`id_negara`, `nama`) VALUES
(1, 'USA'),
(2, 'Spain'),
(3, 'Italy'),
(4, 'France'),
(5, 'UK'),
(6, 'Germany'),
(7, 'Turkey'),
(8, 'Russia'),
(9, 'Iran'),
(10, 'China');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_case`
--
ALTER TABLE `tb_case`
  ADD PRIMARY KEY (`id_case`);

--
-- Indexes for table `tb_negara`
--
ALTER TABLE `tb_negara`
  ADD PRIMARY KEY (`id_negara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_case`
--
ALTER TABLE `tb_case`
  MODIFY `id_case` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_negara`
--
ALTER TABLE `tb_negara`
  MODIFY `id_negara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
