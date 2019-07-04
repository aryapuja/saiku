-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 05:34 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

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
  `ak_plan_imp` datetime NOT NULL,
  `ak_act_imp` datetime DEFAULT NULL,
  `nama_dvs` varchar(100) NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `nama_act`, `ak_plan_imp`, `ak_act_imp`, `nama_dvs`, `nor`, `no`) VALUES
(7, 'dssds', '2019-07-04 07:00:00', '2019-07-03 07:00:00', 'pp', 'RZN21', '0010'),
(8, 'qq', '2019-07-02 07:00:00', '2019-07-01 07:00:00', 'de', 'RZN21', '0010'),
(12, ':D', '2019-07-02 07:00:00', '2019-07-03 07:00:00', 'ppc', 'RJCZM19', '3210'),
(20, 'dummy act 1', '2019-07-03 00:00:00', '2019-07-03 00:00:00', 'pp', 'RZN21', '3210'),
(23, 'Dummy Act 3', '2019-07-05 00:00:00', '2019-07-05 00:00:00', 'prod', 'JP13N', '3182'),
(34, 'wd', '2019-07-02 00:00:00', '0000-00-00 00:00:00', 'de', 'JP12N', '0011'),
(37, 'tes1', '2019-07-01 00:00:00', '0000-00-00 00:00:00', 'qp', 'JP12N', '0011'),
(38, 'testing', '2019-07-01 00:00:00', '0000-00-00 00:00:00', 'prod', 'JP12N', '0011'),
(39, 'testing2', '1970-01-01 07:00:00', '0000-00-00 00:00:00', 'ppc', 'JP12N', '0011'),
(40, 'testing', '2019-07-01 00:00:00', '0000-00-00 00:00:00', 'prod', 'JP12N', '0011'),
(41, 'testing2', '1970-01-01 07:00:00', '0000-00-00 00:00:00', 'ppc', 'JP12N', '0011'),
(42, 'testing', '2019-07-01 00:00:00', '0000-00-00 00:00:00', 'prod', 'JP12N', '0011'),
(43, 'testing2', '1970-01-01 07:00:00', '0000-00-00 00:00:00', 'ppc', 'JP12N', '0011'),
(46, 'testing', '2019-07-04 00:00:00', '2019-07-16 00:00:00', 'nys', '323232', 'cvc'),
(47, 'Bismillah :D', '2019-07-08 00:00:00', '0000-00-00 00:00:00', 'ppc', 'RZN21', '3210');

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
  `nor_plan_imp` datetime NOT NULL,
  `nor_act_imp` datetime DEFAULT NULL,
  `status` enum('Close','Open') NOT NULL DEFAULT 'Open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nor`
--

INSERT INTO `nor` (`id`, `nor`, `no`, `item_changes`, `line`, `nor_plan_imp`, `nor_act_imp`, `status`) VALUES
(1, 'PDN19N', '2130', 'Change dim, change cot length, change packing, change outer covering (spiral ? VS)', '1A', '2019-07-02 00:00:00', '2019-07-04 00:00:00', 'Open'),
(7, 'RJVC3', '0212', 'Bismillah :D', '10A', '2019-07-02 00:00:00', NULL, 'Open'),
(10, 'RJ451', '0202', 'Dummy 1', '2C', '2019-07-03 00:00:00', NULL, 'Open'),
(11, 'RJ451', '0202', 'Dummy 2', '2A', '2019-07-02 00:00:00', '1970-01-01 07:00:00', 'Open'),
(12, 'RJ431', '0222', 'Dummy 3', '2A', '2019-07-04 00:00:00', NULL, 'Open'),
(13, 'JCZM19', '0019', 'Dummy 4', '2A', '2019-07-04 00:00:00', NULL, 'Open'),
(15, 'RJCZM19', '0223', 'Dummy 6', '12A', '2019-07-04 00:00:00', NULL, 'Open'),
(16, 'RJCZM19', '2049', 'Dummy 6', '2A', '2019-07-05 00:00:00', NULL, 'Open'),
(17, 'RZN21', '0010', 'Dummy 7', '3A', '2019-07-05 00:00:00', NULL, 'Open'),
(18, 'RZN21', '0020', 'Dummy 8', '2A', '2019-07-05 00:00:00', NULL, 'Open'),
(19, 'RZN21', '3210', 'Dummy 9', '4B', '2019-07-05 00:00:00', NULL, 'Open'),
(20, 'RZN21', '0040', 'Dummy 10', '2A', '2019-07-05 00:00:00', NULL, 'Open'),
(21, 'RZN21', '0050', 'Dummy 11', '2A', '2019-07-05 00:00:00', NULL, 'Open'),
(22, 'PDN19N', '2100', 'Change dim, change cot length, change packing, change outer covering (spiral ? VS)', '1A', '2019-07-03 00:00:00', NULL, 'Open'),
(23, 'JP12N', '0011', 'Dummy 12', '1a', '2019-07-01 00:00:00', '2019-08-02 00:00:00', 'Open'),
(24, 'JP13N', '3182', 'Dummy 13', '1A', '2019-07-01 00:00:00', NULL, 'Open'),
(25, 'JZ12', '6251', 'Tes Input', '5A', '2019-07-01 00:00:00', NULL, 'Open'),
(27, 'testing2', '2222222', 'tes2', '2a', '2019-07-01 00:00:00', '2019-07-02 00:00:00', 'Open'),
(28, '7828482482', '2242', 'yazz', '10 A', '2019-07-06 00:00:00', NULL, 'Open'),
(29, '3121321212', 'hah21', 'waw', '5 D', '2019-07-07 00:00:00', NULL, 'Open'),
(30, '13232', '23232', 'as', '3 C', '2019-07-08 00:00:00', NULL, 'Open'),
(31, 'adsaa', '12', '21', '10 A', '2019-07-09 00:00:00', NULL, 'Open'),
(32, 'wwq21', '318203', '12121', '10 A', '2019-07-10 00:00:00', NULL, 'Close'),
(33, '323232', 'cvc', '3', '10 A', '2019-07-11 00:00:00', NULL, 'Open'),
(34, '3343', 'ffffc', 'd', '3 S', '2019-07-13 00:00:00', NULL, 'Open'),
(35, 'qw', 'vvf32', 're', '1A', '2019-07-12 00:00:00', NULL, 'Open'),
(36, 'yudha', '1', 'llkl', '1a', '2019-07-03 00:00:00', NULL, 'Open'),
(37, 'aaa', '111', '1', '1', '2019-07-03 00:00:00', NULL, 'Open'),
(38, 'wee', '12', 'weee', '11', '2019-07-03 00:00:00', NULL, 'Open'),
(39, 'lalal', '111', '1', '1', '2019-07-03 00:00:00', NULL, 'Open');

--
-- Triggers `nor`
--
DELIMITER $$
CREATE TRIGGER `delete activity` AFTER DELETE ON `nor` FOR EACH ROW delete from activity where activity.nor=old.nor AND activity.no=old.no
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(199) NOT NULL,
  `section` varchar(199) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `section`) VALUES
(1, 'ppc1', 'ppc1', 'ppc'),
(2, 'ppc2', 'ppc2', 'ppc'),
(3, 'de', 'de', 'de'),
(4, 'pp', 'pp', 'pp'),
(5, 'qp', 'qp', 'qp'),
(6, 'qmp', 'qmp', 'qmp'),
(7, 'eng', 'eng', 'eng'),
(8, 'nys', 'nys', 'nys'),
(9, 'prod', 'prod', 'prod');

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_section` (`section`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_dvs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nor`
--
ALTER TABLE `nor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_section` FOREIGN KEY (`section`) REFERENCES `divisi` (`nama_dvs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
