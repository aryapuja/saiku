-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2019 at 11:35 AM
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
  `status` enum('not updated','verified','waiting') NOT NULL,
  `nor` varchar(10) NOT NULL,
  `no` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `nama_act`, `ak_plan_imp`, `ak_act_imp`, `nama_dvs`, `status`, `nor`, `no`) VALUES
(1712, 'Upload EPL di AS400 + Release oracle address', '2019-08-05 00:00:00', '2019-08-02 00:00:00', 'de', 'verified', 'JCZT19', '0261'),
(1713, 'Release Engineering Drawing', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZT19', '0261'),
(1714, 'WO input matrik (Housing, SP, MSP, Offline, Central Plug)', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZT19', '0261'),
(1715, 'WO cek matrik (SP, Offline)', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZT19', '0261'),
(1716, 'WO ID BOX MATERIAL', '2019-08-05 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZT19', '0261'),
(1717, 'REPLACE ID & BOX MATERIAL', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZT19', '0261'),
(1718, 'Release material offline', '2019-08-05 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZT19', '0261'),
(1719, 'Sosialisasi henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZT19', '0261'),
(1720, 'Release henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZT19', '0261'),
(1721, '(fa) input matrik (Housing, Msp, Plug, SP, Offline, DIM/VIS)', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCZT19', '0261'),
(1722, '(fa) repair jig drawing / repair jig ( SP/JIG/OFFLINE)', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCZT19', '0261'),
(1723, '(fa) Implementasi D/C & cek item perubahan', '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZT19', '0261'),
(1724, 'Request Price dan UMH ke FA', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZT19', '0261'),
(1725, 'Update assy code di assy plan', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZT19', '0261'),
(1726, 'Update suffix level di heikinka, assy plan, dan SPP', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZT19', '0261'),
(1727, 'Update component packing di oracle', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZT19', '0261'),
(1728, '(D/C) Prepare NOR, checksheet dan kartu implementasi DC', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZT19', '0261'),
(1729, '(D/C) Check list implementasi', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZT19', '0261'),
(1730, 'Upload EPL di AS400 + Release oracle address', '2019-08-05 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZM19', '0164, 0194'),
(1731, 'Release commonize tube', '2019-08-05 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZM19', '0164, 0194'),
(1732, 'Release Engineering Drawing', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZM19', '0164, 0194'),
(1733, 'Release time study F/A KE PRODUKSI (Housing, Setting, Taping, SP, MSP, Offline)', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZM19', '0164, 0194'),
(1734, 'RELEASE WASURENBO', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZM19', '0164, 0194'),
(1735, 'WO ANALISA SIZE BOX', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZM19', '0164, 0194'),
(1736, 'Release dan Sosialisasi Henkaten', '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZM19', '0164, 0194'),
(1737, 'Update revision record all JB', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCZM19', '0164, 0194'),
(1738, 'Sosialisasi henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZM19', '0164, 0194'),
(1739, 'Release henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZM19', '0164, 0194'),
(1740, '(fa) repair ID papan sao/add papan sao', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCZM19', '0164, 0194'),
(1741, '(fa) Repair/penambahan no material ', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCZM19', '0164, 0194'),
(1742, '(fa) Implementasi D/C & cek item perubahan', '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZM19', '0164, 0194'),
(1743, '(fa) trial metode baru bersama QC & PP', '2019-07-31 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZM19', '0164, 0194'),
(1744, '(fa) cutting tube', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZM19', '0164, 0194'),
(1745, '(pa) Release machine loading tube', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCZM19', '0164, 0194'),
(1746, '(fa) Kirim analisa size box ke WHS / CTB', '2019-08-01 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCZM19', '0164, 0194'),
(1747, '(fa) Release analisa type box ke PP dan QP,QMP', '2019-08-02 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCZM19', '0164, 0194'),
(1748, '(fa) Release ID material ke PP dan QP, QMP', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCZM19', '0164, 0194'),
(1749, 'Check status old part', '2019-07-30 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCZM19', '0164, 0194'),
(1750, 'Check status new part', '2019-07-30 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCZM19', '0164, 0194'),
(1751, 'Supply new part ', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCZM19', '0164, 0194'),
(1752, 'Release Harness Price', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'fa', 'not updated', 'JCZM19', '0164, 0194'),
(1753, 'Release UMH', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'fa', 'not updated', 'JCZM19', '0164, 0194'),
(1754, 'Request Price dan UMH ke FA', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1755, 'Update assy code di assy plan', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1756, 'Update suffix level di heikinka, assy plan, dan SPP', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1757, '(nameplate) Pembuatan approval nameplate', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1758, '(nameplate) Print sample name plate to DE+QA+kantong name plate', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1759, '(nameplate) Print name plate baru', '2019-08-06 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1760, '(D/C) Prepare NOR, checksheet dan kartu implementasi DC', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1761, '(D/C) Check list implementasi', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1762, '(D/C) Kirim GJN ke customer', '2019-08-14 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1763, '(D/C) Supply heikinka, nameplate, CIK dan Label', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1764, '(D/C) Update D/C Matrik', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZM19', '0164, 0194'),
(1765, 'Upload EPL di AS400 + Release oracle address', '2019-07-30 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZA19', '0072'),
(1766, 'Release PA drawing & matrik', '2019-07-31 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZA19', '0072'),
(1767, 'Release Engineering Drawing', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'de', 'not updated', 'JCZA19', '0072'),
(1768, 'Release time study F/A KE PRODUKSI (Housing, Setting, Taping, SP, MSP, Offline)', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZA19', '0072'),
(1769, 'WO input matrik (Housing, SP, MSP, Offline, Central Plug)', '2019-08-02 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZA19', '0072'),
(1770, 'Cek matrik (housing, Msp, Central Plug)', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZA19', '0072'),
(1771, 'Release dan Sosialisasi Henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'pp', 'not updated', 'JCZA19', '0072'),
(1772, 'Supply W/H buzzer ke produksi', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCZA19', '0072'),
(1773, 'Trial program EC-1,2 + AB', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCZA19', '0072'),
(1774, 'Validasi program area Inspeksi', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCZA19', '0072'),
(1775, 'Up date JB Justment', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCZA19', '0072'),
(1776, 'Validasi mesin fuse', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qmp', 'not updated', 'JCZA19', '0072'),
(1777, 'WO input matrik inspection area ke FAE ', '2019-08-02 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZA19', '0072'),
(1778, 'Sosialisasi henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZA19', '0072'),
(1779, 'Release henkaten', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'qp', 'not updated', 'JCZA19', '0072'),
(1780, '(fa) input matrik (Housing, Msp, Plug, SP, Offline, DIM/VIS)', '2019-08-05 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCZA19', '0072'),
(1781, '(fa) Implementasi D/C & cek item perubahan', '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZA19', '0072'),
(1782, '(fa) Ganti N/P pada W/H buzzer', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZA19', '0072'),
(1783, '(pa) cutting circuit', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZA19', '0072'),
(1784, '(pa) Supply circuit', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'prod', 'not updated', 'JCZA19', '0072'),
(1785, '(pa) Release machine loading shield', '2019-08-02 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCZA19', '0072'),
(1786, '(pa) Replace/release kanban cct', '2019-08-08 00:00:00', '0000-00-00 00:00:00', 'nys', 'not updated', 'JCZA19', '0072'),
(1787, 'Check status old part', '2019-07-30 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCZA19', '0072'),
(1788, 'Check status new part', '2019-07-30 00:00:00', '0000-00-00 00:00:00', 'ic', 'not updated', 'JCZA19', '0072'),
(1789, 'Supply new part ', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'whs', 'not updated', 'JCZA19', '0072'),
(1790, '(pa) setting machine loading', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'engineering', 'not updated', 'JCZA19', '0072'),
(1791, 'Request Price dan UMH ke FA', '2019-07-31 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1792, '(nameplate) Pembuatan approval nameplate', '2019-07-31 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1793, '(nameplate) Print name plate baru', '2019-08-07 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1794, '(nameplate) Scrap name plate', '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1795, '(D/C) Prepare NOR, checksheet dan kartu implementasi DC', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1796, '(D/C) Check list implementasi', '2019-08-09 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1797, '(D/C) Kirim GJN ke customer', '2019-08-15 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072'),
(1798, '(D/C) Konfirmasi ke Cust. Plan SAI implementasi NOR (jika tidak sesuai requirement Cust.) - Format G', '2019-08-02 00:00:00', '0000-00-00 00:00:00', 'ppc', 'not updated', 'JCZA19', '0072');

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
(5, 'engineering'),
(10, 'exim'),
(9, 'fa'),
(12, 'ic'),
(6, 'nys'),
(2, 'pp'),
(8, 'ppc'),
(7, 'prod'),
(4, 'qmp'),
(3, 'qp'),
(11, 'whs');

-- --------------------------------------------------------

--
-- Table structure for table `mactivity`
--

CREATE TABLE `mactivity` (
  `id` int(11) NOT NULL,
  `namaActivity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mactivity`
--

INSERT INTO `mactivity` (`id`, `namaActivity`) VALUES
(4, 'Folow up NOR ke customer'),
(5, 'Release DCIL'),
(6, 'Release original drawing'),
(7, 'Release original circuit list'),
(8, 'Release original kakouzu'),
(9, 'Upload EPL di AS400 + Release oracle address'),
(10, 'Release part list matrix'),
(11, 'Release TSQ'),
(12, 'Release nameplate matrik'),
(13, 'Release commonize circuit'),
(14, 'Release commonize tube'),
(15, 'Release PA drawing & matrik'),
(16, 'Approval nameplate'),
(17, 'Release Engineering Drawing'),
(18, 'Release circuit list'),
(19, 'Release form obsolete'),
(20, 'Scrab document obsolete'),
(21, 'Release time study F/A KE PRODUKSI (Housing, Setting, Taping, SP, MSP, Offline)'),
(22, 'Release drawing (Sakehame, Atohame, Plug)'),
(23, 'WO input matrik (Housing, SP, MSP, Offline, Central Plug)'),
(24, 'WO cek matrik (SP, Offline)'),
(25, 'Cek matrik (housing, Msp, Central Plug)'),
(26, 'WO  REVISI DRAFT SAO'),
(27, 'WO REPAIR SAO'),
(28, 'RELEASE WASURENBO'),
(29, 'WO ANALISA SIZE BOX'),
(30, 'WO ID BOX MATERIAL'),
(31, 'REPLACE ID & BOX MATERIAL'),
(32, 'RELEASE ADRESSING CCT'),
(33, 'REPLACE & TEMPEL ID CCT'),
(34, 'REPLACE & TEMPEL ID SAO SUB ASSY'),
(35, 'RELEASE MATRIKS VARIAN BONDER'),
(36, 'UPDATE NO MATERIAL JIG DWG'),
(37, 'UPDATE NO PROGRAM DI SP'),
(38, 'UPDATE NO PROGRAM DI OFFLINE'),
(39, 'Release dan Sosialisasi Henkaten'),
(40, 'WO ENG. PACKET/ ENG. ORI JAPAN'),
(41, 'Supply W/H buzzer ke produksi'),
(42, 'Trial program EC-1,2 + AB'),
(43, 'Validasi program area Inspeksi'),
(44, 'Trial program SP1+SP2+AB'),
(45, 'Cek New Part Equipment'),
(46, 'Check dimensi / jig drawing'),
(47, 'Update revision record all JB'),
(48, 'Up date JB Justment'),
(49, 'Validasi mesin fuse'),
(50, 'IPI  check/TR check'),
(51, 'Release Symbol Nameplate (untuk approval NP)'),
(52, 'Pengembalian form dan dokumen obsolete'),
(53, 'Trial program SP1+SP2'),
(54, 'WO Ori drawing ke DE'),
(55, 'Compare drawaing'),
(56, 'Trial metode baru area inspeksi'),
(57, 'Change SWCT/Time Study'),
(58, 'Revisi matrik inspection area (MSP / Fuse EC/ Dim Check / Siage/ Visual / Double check)'),
(59, 'Revisi Important point / inspection point'),
(60, 'Update visual matting'),
(61, 'Update harness sample'),
(62, 'Update sample wire / terminal PA'),
(63, 'WO input matrik inspection area ke FAE '),
(64, 'WO input patern fuse ke FAE'),
(65, 'WO analisa size box ke NYS'),
(66, 'WO ID dan box Material ke NYS'),
(67, 'WO cek matrik ke QMP'),
(68, 'WO validasi hasil input patern fuse ke QMP'),
(69, 'Sosialisasi henkaten'),
(70, 'Release henkaten'),
(71, 'Release SWCT /Time Study'),
(72, 'Replace ID material pada box / ID dikasihkan ke WHS'),
(73, '(fa) check stock part / order part'),
(74, '(fa) check new equipment / order new equipment'),
(75, '(fa) repair box sakihame / repair meja insert plug'),
(76, '(fa) repair housing / mapping duct'),
(77, '(fa) repair navigasi'),
(78, '(fa) repair meja MSU'),
(79, '(fa) input matrik (Housing, Msp, Plug, SP, Offline, DIM/VIS)'),
(80, '(fa) share henkaten jig'),
(81, '(fa) repair jig drawing / repair jig ( SP/JIG/OFFLINE)'),
(82, '(fa) Release draft SAO ke PP'),
(83, '(fa) repair ID papan sao/add papan sao'),
(84, '(fa) kirim data matrik separator ke NYS'),
(85, '(fa) Repair/penambahan no material '),
(86, '(fa) repair ec/chg cf/add cf'),
(87, '(fa) input/chg program ec , chg ec dwg'),
(88, '(fa) add program CB EC/DIM/VIS'),
(89, '(fa) Implementasi D/C & cek item perubahan'),
(90, '(fa) karantina old part + cct'),
(91, '(fa) Pengembalian material'),
(92, '(fa) scrab old part dan circuit'),
(93, '(fa) trial metode baru bersama QC & PP'),
(94, '(fa) Supply material'),
(95, '(fa) cutting tube'),
(96, '(fa) check stock cct/material'),
(97, '(fa) buat stock SP1 + A/B'),
(98, '(fa) buat stock sub assy'),
(99, '(fa) Repair WH buzzer'),
(100, '(fa) Ganti N/P pada W/H buzzer'),
(101, '(fa) Kirim hasil tial analisa material tube ke NYS'),
(102, '(fa) Pengembalian box material ke NYS'),
(103, '(fa) Pengembalian ID sample N/P BO ke NYS'),
(104, '(fa) Pengembalian withdrawal'),
(105, '(fa) Pengembalian form dan dokumen obsolete'),
(106, '(fa) Mengosongkan wip housing'),
(107, '(fa) Mengosongkan wip Setting'),
(108, '(fa) Mengosongkan wip Taping'),
(109, '(fa) Mengosongkan wip inspeksi'),
(110, '(fa) Karantina dan pengembalian sisa label'),
(111, '(fa) Karantina dan pengembalian sisa np'),
(112, '(fa) Karantina dan pengembalian sisa cik'),
(113, '(pa) cutting circuit'),
(114, '(pa) Supply circuit'),
(115, '(pa) Pengembalian box material ke NYS'),
(116, '(pa) Pengembalian kanban cutting'),
(117, '(pa) Pengembalian kanban drawing'),
(118, '(pa) Release machine loading shield'),
(119, '(pa) Release machine loading cct'),
(120, '(pa) Release machine loading AB'),
(121, '(pa) Release machine loading tube'),
(122, '(pa) Replace/release kanban cct'),
(123, '(pa) Replace/release kanban material PA'),
(124, '(pa) WO kode RFID kanban'),
(125, '(pa) Update database e-kanban'),
(126, '(pa) Update patch bonder'),
(127, '(pa) Release list cct delete'),
(128, '(fa) Kirim analisa size box ke WHS / CTB'),
(129, '(fa) Release analisa type box ke PP dan QP,QMP'),
(130, '(fa) Release box material ke PP dan QP,QMP'),
(131, '(fa) Release ID material ke PP dan QP, QMP'),
(132, '(fa) Change identitas part store'),
(133, '(fa) Release / Replace CIK'),
(134, '(fa) Release kanban WU / BT'),
(135, '(fa) Replace / Release ID Sample Nameplate FA / PA'),
(136, '(pp pa) Release dan sosialisai henkaten'),
(137, '(pp pa) WO input matrik'),
(138, '(pp pa) WO bonding std'),
(139, '(pp pa) Release addresing cct'),
(140, '(pp pa) Replace dan tempel id sao'),
(141, '(pp pa) Cek matrik'),
(142, '(pp pa) WO equipment'),
(143, '(pp pa) Release mapping flow PA dwg'),
(144, '(pp pa) Release matrik maooing flow'),
(145, '(pp pa) Addresing acc'),
(146, '(pp pa) WO input matrik'),
(147, '(pp pa) WO box'),
(148, 'Check status old part'),
(149, 'Claimkan dead stock ke customer'),
(150, 'Release schedule stop order old part'),
(151, 'Check status new part'),
(152, 'Order new part, request ETA SAI :'),
(153, 'Material free SoC'),
(154, 'List Material CSS'),
(155, 'Informasi usage per day to WHS'),
(156, 'Check actual stock old part yang mengalami D/C'),
(157, 'Identifikasi new part'),
(158, 'Supply new part '),
(159, 'Replace ID Material (R/C)'),
(160, 'Kirim hasil analisa size box ke NYS'),
(161, 'Supply material common ke line : ??????'),
(162, 'Request SO ke PLB'),
(163, '(pa) check applikator'),
(164, '(pa) pembuatan crimping standart dan bonder standart'),
(165, '(pa) setting machine loading'),
(166, '(pa) Pengembalian form dan dokumen obsolete'),
(167, '(pa) Input kode RFID ke Karakuri'),
(168, '(pa) Release mapping applikator'),
(169, '(pa) order new equipment, request ETA SAI :'),
(170, 'Isi no box/ polytainer pada kartu imp dc'),
(171, 'Release Harness Price'),
(172, 'Release UMH'),
(173, 'Request Price dan UMH ke FA'),
(174, 'Update assy code di assy plan'),
(175, 'Update suffix level di heikinka, assy plan, dan SPP'),
(176, 'Update component packing di oracle'),
(177, 'Release analisa S/R max loading per shift'),
(178, 'Release Countdown assy '),
(179, '(nameplate) Print sample label'),
(180, '(nameplate) Pembuatan approval nameplate'),
(181, '(nameplate) Print sample name plate to DE+QA+kantong name plate'),
(182, '(nameplate) Print name plate baru'),
(183, '(nameplate) Scrap name plate'),
(184, '(D/C) Distribusi DCIL'),
(185, '(D/C) Request NOR official ke Cust'),
(186, '(D/C) Prepare NOR, checksheet dan kartu implementasi DC'),
(187, '(D/C) Check list implementasi'),
(188, '(D/C) Release form obsolete (COPY NOR)'),
(189, '(D/C) Scrab (COPY NOR)'),
(190, '(D/C) Kirim GJN ke customer'),
(191, '(D/C) Konfirmasi ke Cust. Plan SAI implementasi NOR (jika tidak sesuai requirement Cust.) - Format GJN'),
(192, '(D/C) Supply heikinka, nameplate, CIK dan Label'),
(193, '(D/C) Update D/C Matrik');

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
  `line2` varchar(10) DEFAULT NULL,
  `line3` varchar(10) DEFAULT NULL,
  `line4` varchar(10) DEFAULT NULL,
  `line5` varchar(10) DEFAULT NULL,
  `nor_plan_imp` datetime NOT NULL,
  `nor_act_imp` datetime NOT NULL,
  `status` enum('Close','Open','On Progress') NOT NULL DEFAULT 'Close'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nor`
--

INSERT INTO `nor` (`id`, `nor`, `no`, `item_changes`, `line`, `line2`, `line3`, `line4`, `line5`, `nor_plan_imp`, `nor_act_imp`, `status`) VALUES
(72, 'JCZT19', '0261', 'Changes material dan level sai', '11B', '12B', NULL, NULL, NULL, '2019-08-13 00:00:00', '2019-08-02 00:00:00', 'On Progress'),
(73, 'JCZA19', '0072', 'Change material dan level sai', '4A', NULL, NULL, NULL, NULL, '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'On Progress'),
(74, 'JCZM19', '0164, 0194', 'Changes material dan level', 'L-3C', NULL, NULL, NULL, NULL, '2019-08-13 00:00:00', '0000-00-00 00:00:00', 'On Progress');

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
  `name` varchar(100) NOT NULL,
  `password` varchar(199) NOT NULL,
  `section` varchar(199) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `status` enum('off','on','waiting') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `password`, `section`, `nik`, `jabatan`, `status`) VALUES
(1, 'ppc1', 'ppc1234', 'ppc', 'ppc', '', 'on'),
(2, 'ppc2', 'ppc2', 'ppc', 'ppc2', '', 'on'),
(3, 'de', 'de1234', 'de', 'de', '', 'on'),
(4, 'pp', 'pp1234', 'pp', 'pp', '', 'on'),
(5, 'qp', 'qp1234', 'qp', 'qp', '', 'on'),
(8, 'nys', 'nys1234', 'nys', 'nys', 'freelance', 'on'),
(10, 'yudha', '1234', 'ppc', '1234', 'manager', 'on'),
(11, 'arya p', '1212', 'ppc', '12123', 'spv', 'on'),
(12, 'exim', 'exim1234', 'exim', 'exim', '', 'on'),
(13, 'fa', 'fa1234', 'fa', 'fa', '', 'on'),
(14, 'ic', 'ic1234', 'ic', 'ic', '', 'on'),
(15, 'qmp', 'qmp1234', 'qmp', 'qmp', '', 'on'),
(16, 'whs', 'whs1234', 'whs', 'whs', '', 'on'),
(17, 'prod', 'prod1234', 'prod', 'prod', '', 'on');

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
-- Indexes for table `mactivity`
--
ALTER TABLE `mactivity`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `fk_section` (`section`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1799;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `kode_dvs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mactivity`
--
ALTER TABLE `mactivity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `nor`
--
ALTER TABLE `nor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
