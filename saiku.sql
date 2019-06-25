-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 06:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saiku`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `nama_act` varchar(100) NOT NULL,
  `date_plan` datetime NOT NULL,
  `date_actual` datetime NOT NULL,
  `nama_dvs` varchar(100) NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `nama_act`, `date_plan`, `date_actual`, `nama_dvs`, `nor`, `no`) VALUES
(1, 'DE', '2019-06-25 00:00:00', '2019-06-26 00:00:00', 'de', 'PDN19N', '2130'),
(2, 'logisstik', '2019-06-26 00:00:00', '2019-06-27 00:00:00', 'ppc', 'PDN19N', '2130');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `kode_dvs` int(11) NOT NULL,
  `nama_dvs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`kode_dvs`, `nama_dvs`) VALUES
(1, 'de'),
(5, 'eng'),
(6, 'nys'),
(2, 'pp'),
(8, 'ppc'),
(7, 'prod'),
(4, 'qmp'),
(3, 'qp');

-- --------------------------------------------------------

--
-- Table structure for table `nor`
--

CREATE TABLE `nor` (
  `id` int(11) NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL,
  `item_changes` text NOT NULL,
  `line` varchar(10) NOT NULL,
  `date_plan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nor`
--

INSERT INTO `nor` (`id`, `nor`, `no`, `item_changes`, `line`, `date_plan`) VALUES
(1, 'PDN19N', '2130', 'Change dim, change cot length, change packing, change outer covering (spiral ? VS)', '1A', '2019-06-26 00:00:00'),
(2, 'PDN19N', '2131', 'change tape, type, add detail dwg, change of wire size, add note', '1B', '2019-06-26 00:00:00'),
(7, 'RJVC3', '00212', 'Bismillah :D', '10A', '2019-06-25 00:00:00'),
(10, 'RJ451', '02002', 'Dummy 1', '2C', '2019-06-27 00:00:00'),
(11, 'RJ451', '02021', 'Dummy 2', '1A', '2019-06-27 00:00:00'),
(12, 'RJ431', '02022', 'Dummy 3', '3A', '2019-06-27 00:00:00'),
(13, 'JCZM19', '0019', 'Dummy 4', '2A', '2019-06-28 00:00:00'),
(14, 'JCZM19', '0020', 'Dummy 5', '4B', '2019-06-28 00:00:00'),
(15, 'RJCZM19', '02023', 'Dummy 6', '12A', '2019-06-28 00:00:00'),
(16, 'RJCZM19', '02049', 'Dummy 6', '20A', '2019-06-28 00:00:00'),
(17, 'RZN21', '0010', 'Dummy 7', '3A', '2019-06-29 00:00:00'),
(18, 'RZN21', '0020', 'Dummy 8', '2A', '2019-06-29 00:00:00'),
(19, 'RZN21', '30', 'Dummy 9', '4B', '2019-06-29 00:00:00'),
(20, 'RZN21', '0040', 'Dummy 10', '12A', '2019-06-29 00:00:00'),
(21, 'RZN21', '0050', 'Dummy 11', '20A', '2019-06-29 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nama_dvs` (`nama_dvs`),
  ADD KEY `fk_nor` (`nor`),
  ADD KEY `fk_no` (`no`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`kode_dvs`),
  ADD KEY `nama_dvs` (`nama_dvs`);

--
-- Indexes for table `nor`
--
ALTER TABLE `nor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nor` (`nor`),
  ADD KEY `no` (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_dvs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nor`
--
ALTER TABLE `nor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `fk_nama_dvs` FOREIGN KEY (`nama_dvs`) REFERENCES `divisi` (`nama_dvs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_no` FOREIGN KEY (`no`) REFERENCES `nor` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_nor` FOREIGN KEY (`nor`) REFERENCES `nor` (`nor`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
