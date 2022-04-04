-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2018 at 04:51 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE IF NOT EXISTS `absen` (
  `id_karyawan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu1` time DEFAULT NULL,
  `waktu2` time DEFAULT NULL,
  `waktu3` time DEFAULT NULL,
  `waktu4` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_karyawan`, `nama`, `tanggal`, `waktu1`, `waktu2`, `waktu3`, `waktu4`) VALUES
(107, 'EKO PRASETIA S', '2018-01-10', '08:03:00', '12:39:00', '13:37:00', NULL),
(107, 'EKO PRASETIA S', '2018-01-11', '07:58:00', '12:12:00', '13:05:00', '17:01:00'),
(107, 'EKO PRASETIA S', '2018-01-12', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-13', '08:01:00', '12:20:00', '13:18:00', '17:02:00'),
(107, 'EKO PRASETIA S', '2018-01-14', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-15', '08:05:00', '12:12:00', '13:11:00', '17:05:00'),
(107, 'EKO PRASETIA S', '2018-01-16', '07:58:00', '12:08:00', '13:11:00', '17:02:00'),
(107, 'EKO PRASETIA S', '2018-01-17', '07:58:00', '12:08:00', '13:10:00', '17:06:00'),
(107, 'EKO PRASETIA S', '2018-01-18', '08:02:00', '17:05:00', NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-19', '07:55:00', '12:05:00', '13:26:00', '17:05:00'),
(107, 'EKO PRASETIA S', '2018-01-02', '08:01:00', '12:10:00', '13:15:00', '17:01:00'),
(107, 'EKO PRASETIA S', '2018-01-20', '08:02:00', '12:21:00', '13:20:00', '17:03:00'),
(107, 'EKO PRASETIA S', '2018-01-21', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-22', '08:05:00', '12:33:00', '13:38:00', '17:08:00'),
(107, 'EKO PRASETIA S', '2018-01-23', '07:59:00', '12:10:00', '13:14:00', '17:07:00'),
(107, 'EKO PRASETIA S', '2018-01-24', '08:02:00', '12:24:00', '13:34:00', NULL),
(107, 'EKO PRASETIA S', '2018-01-25', '08:03:00', '13:29:00', '14:25:00', NULL),
(107, 'EKO PRASETIA S', '2018-01-26', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-27', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-03', '08:02:00', '12:08:00', '13:11:00', '17:02:00'),
(107, 'EKO PRASETIA S', '2018-01-04', '08:00:00', '12:08:00', '13:05:00', '17:00:00'),
(107, 'EKO PRASETIA S', '2018-01-05', '08:03:00', '12:01:00', '13:34:00', '17:06:00'),
(107, 'EKO PRASETIA S', '2018-01-06', '08:00:00', '12:18:00', '13:23:00', '17:02:00'),
(107, 'EKO PRASETIA S', '2018-01-07', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA S', '2018-01-08', '08:03:00', '13:19:00', '14:07:00', '17:03:00'),
(107, 'EKO PRASETIA S', '2018-01-09', '08:03:00', '12:07:00', '13:05:00', '17:07:00'),
(107, 'EKO PRASETIA S', '2017-12-26', '07:59:00', '12:22:00', '13:27:00', '17:02:00'),
(107, 'EKO PRASETIA S', '2017-12-27', '08:01:00', '12:13:00', '13:21:00', '17:01:00'),
(107, 'EKO PRASETIA S', '2017-12-28', '07:58:00', '12:08:00', '13:11:00', '17:00:00'),
(107, 'EKO PRASETIA S', '2017-12-29', '07:58:00', '12:03:00', '13:38:00', '17:00:00'),
(107, 'EKO PRASETIA S', '2017-12-30', '08:04:00', '12:48:00', '13:32:00', '16:01:00'),
(107, 'EKO PRASETIA S', '2017-12-31', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-01', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-10', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-11', '07:57:00', '12:31:00', '13:46:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-12', '07:58:00', '12:12:00', '13:45:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-13', '07:58:00', '12:19:00', '15:15:00', '17:04:00'),
(11, 'TOMMY CHUANG', '2018-01-14', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-15', '08:01:00', '12:15:00', '13:25:00', '17:06:00'),
(11, 'TOMMY CHUANG', '2018-01-16', '07:58:00', '12:14:00', '17:09:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-17', '08:00:00', '12:19:00', NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-18', '07:55:00', '12:20:00', '17:12:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-19', '08:01:00', '12:35:00', '17:07:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-02', '07:54:00', '12:20:00', '13:22:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-20', '08:00:00', '12:21:00', '13:39:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-21', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-22', '07:57:00', '12:24:00', '17:08:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-23', '07:58:00', '12:08:00', '14:15:00', '17:11:00'),
(11, 'TOMMY CHUANG', '2018-01-24', '07:57:00', '12:44:00', '14:14:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-25', '07:56:00', '12:32:00', '13:38:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-26', '07:58:00', NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-27', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-03', '07:54:00', '12:07:00', '13:27:00', NULL),
(11, 'TOMMY CHUANG', '2018-01-04', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-05', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-06', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-07', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-08', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2018-01-09', NULL, NULL, NULL, NULL),
(11, 'TOMMY CHUANG', '2017-12-26', '07:54:00', '12:46:00', '14:23:00', '17:11:00'),
(11, 'TOMMY CHUANG', '2017-12-27', '07:56:00', '12:25:00', '13:38:00', NULL),
(11, 'TOMMY CHUANG', '2017-12-28', '08:04:00', '12:18:00', '13:31:00', '17:02:00'),
(11, 'TOMMY CHUANG', '2017-12-29', '07:56:00', '12:14:00', '13:27:00', NULL),
(11, 'TOMMY CHUANG', '2017-12-30', '07:56:00', '12:31:00', '13:46:00', NULL),
(11, 'TOMMY CHUANG', '2017-12-31', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-01', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-10', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-11', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-12', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-13', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-14', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-15', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-16', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-17', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-18', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-19', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-02', '08:06:00', '17:02:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-20', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-21', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-22', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-23', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-24', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-25', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-26', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-27', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-03', '08:03:00', '17:02:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-04', '08:03:00', '17:02:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-05', '08:04:00', '17:05:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-06', '08:00:00', '17:01:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-07', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-08', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2018-01-09', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2017-12-26', NULL, NULL, NULL, NULL),
(121, 'ALGI PRATAMA', '2017-12-27', '08:03:00', '17:03:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2017-12-28', '08:06:00', '17:01:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2017-12-29', '07:55:00', '17:01:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2017-12-30', '08:29:00', '16:05:00', NULL, NULL),
(121, 'ALGI PRATAMA', '2017-12-31', NULL, NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-01', NULL, NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-10', '07:54:00', '12:14:00', '13:11:00', '17:05:00'),
(122, 'EMIYANTI', '2018-01-11', '07:54:00', '12:07:00', '13:03:00', '17:02:00'),
(122, 'EMIYANTI', '2018-01-12', '07:57:00', '12:04:00', '13:00:00', '17:00:00'),
(122, 'EMIYANTI', '2018-01-13', '07:56:00', '12:05:00', '13:00:00', '17:03:00'),
(122, 'EMIYANTI', '2018-01-14', NULL, NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-15', '07:55:00', '12:06:00', '13:02:00', '17:02:00'),
(122, 'EMIYANTI', '2018-01-16', '07:56:00', '12:03:00', '13:00:00', '17:01:00'),
(122, 'EMIYANTI', '2018-01-17', '07:56:00', '12:04:00', '13:01:00', '17:03:00'),
(122, 'EMIYANTI', '2018-01-18', '07:56:00', '12:07:00', '13:01:00', '17:01:00'),
(122, 'EMIYANTI', '2018-01-19', '07:56:00', '13:37:00', '14:29:00', '17:02:00'),
(122, 'EMIYANTI', '2018-01-02', '07:54:00', '12:06:00', '13:00:00', '17:01:00'),
(122, 'EMIYANTI', '2018-01-20', '07:57:00', '13:42:00', '14:32:00', '17:02:00'),
(122, 'EMIYANTI', '2018-01-21', NULL, NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-22', '07:56:00', '17:05:00', NULL, NULL),
(122, 'EMIYANTI', '2018-01-23', '07:58:00', '12:10:00', '13:04:00', '17:01:00'),
(122, 'EMIYANTI', '2018-01-24', '07:56:00', '13:50:00', '14:35:00', '17:00:00'),
(122, 'EMIYANTI', '2018-01-25', '07:56:00', '12:50:00', '13:43:00', '17:01:00'),
(122, 'EMIYANTI', '2018-01-26', '07:56:00', NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-27', NULL, NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-03', '07:55:00', '12:09:00', '13:01:00', '17:02:00'),
(122, 'EMIYANTI', '2018-01-04', '07:54:00', '12:07:00', '13:00:00', '17:00:00'),
(122, 'EMIYANTI', '2018-01-05', '07:55:00', '12:01:00', '12:59:00', '17:03:00'),
(122, 'EMIYANTI', '2018-01-06', '07:55:00', '12:04:00', '13:00:00', '17:00:00'),
(122, 'EMIYANTI', '2018-01-07', NULL, NULL, NULL, NULL),
(122, 'EMIYANTI', '2018-01-08', '07:57:00', '12:06:00', '13:00:00', '17:01:00'),
(122, 'EMIYANTI', '2018-01-09', '07:57:00', '12:08:00', '13:03:00', '17:01:00'),
(122, 'EMIYANTI', '2017-12-26', '07:57:00', '12:14:00', '13:02:00', '17:01:00'),
(122, 'EMIYANTI', '2017-12-27', '07:55:00', '12:05:00', '13:01:00', '17:00:00'),
(122, 'EMIYANTI', '2017-12-28', '07:55:00', '12:06:00', '13:00:00', '17:00:00'),
(122, 'EMIYANTI', '2017-12-29', '07:56:00', '12:03:00', '13:01:00', '17:00:00'),
(122, 'EMIYANTI', '2017-12-30', '07:55:00', '13:14:00', '13:58:00', '16:01:00'),
(122, 'EMIYANTI', '2017-12-31', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-01', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-10', '07:53:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-11', '07:56:00', '17:01:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-12', '07:59:00', '14:20:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-13', '07:57:00', '17:02:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-14', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-15', '07:56:00', '17:06:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-16', '07:57:00', '17:05:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-17', '07:58:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-18', '07:57:00', '17:09:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-19', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-02', '07:56:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-20', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-21', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-22', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-23', '08:04:00', '17:08:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-24', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-25', '07:59:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-26', '08:14:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-27', '13:34:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-03', '07:56:00', '17:01:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-04', '07:57:00', '17:04:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-05', '07:57:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-06', '07:57:00', '17:05:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-07', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2018-01-08', '07:57:00', '17:03:00', NULL, NULL),
(4, 'JODI KARDO', '2018-01-09', '07:57:00', NULL, NULL, NULL),
(4, 'JODI KARDO', '2017-12-26', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2017-12-27', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2017-12-28', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2017-12-29', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2017-12-30', NULL, NULL, NULL, NULL),
(4, 'JODI KARDO', '2017-12-31', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-01', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-10', '08:08:00', '17:05:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-11', '08:01:00', '17:02:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-12', '08:44:00', '17:00:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-13', '08:16:00', '17:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-14', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-15', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-16', '08:07:00', '17:09:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-17', '08:01:00', '17:04:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-18', '08:23:00', '17:02:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-19', '08:22:00', '17:03:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-02', '08:03:00', '17:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-20', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-21', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-22', '08:12:00', '17:04:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-23', '08:01:00', '17:05:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-24', '08:14:00', '17:03:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-25', '08:26:00', '17:04:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-26', '08:18:00', NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-27', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-03', '08:03:00', '17:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-04', '08:17:00', '17:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-05', '08:12:00', '17:03:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-06', '08:07:00', '17:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-07', NULL, NULL, NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-08', '08:11:00', '17:02:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2018-01-09', '08:04:00', '17:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2017-12-26', '08:05:00', '17:02:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2017-12-27', '08:05:00', '17:00:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2017-12-28', '08:05:00', '17:00:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2017-12-29', '07:56:00', '17:00:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2017-12-30', '08:11:00', '16:01:00', NULL, NULL),
(92, 'WIWIK WIDYAWATI', '2017-12-31', NULL, NULL, NULL, NULL),
(107, 'EKO PRASETIA SAPUTRA', '2018-01-31', '07:58:00', '12:02:00', '13:00:00', '17:00:00'),
(107, 'EKO PRASETIA SYAHPUTRA', '2018-02-02', '07:58:00', '12:00:00', '12:59:00', '17:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 NOT NULL,
  `level` varchar(255) NOT NULL,
  `id_perusahaan` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `level`, `id_perusahaan`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Super_Admin', 5),
('jodhykardo', 'e10adc3949ba59abbe56e057f20f883e', 'Jodhy Kardo', 'Super', 2),
('test', '098f6bcd4621d373cade4e832627b4f6', 'test', 'Super', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cloud`
--

CREATE TABLE IF NOT EXISTS `cloud` (
`id_cloud` int(20) NOT NULL,
  `uploader` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `ukuran` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jml_download` varchar(255) NOT NULL,
  `tgl_upload` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `cloud`
--

INSERT INTO `cloud` (`id_cloud`, `uploader`, `tipe`, `ukuran`, `nama`, `jml_download`, `tgl_upload`) VALUES
(1, 'test', 'test', 'test', 'test', '1', '0000-00-00 00:00:00'),
(16, 'Administrator', '', '', '', '', '2017-12-29 13:45:21'),
(28, 'Administrator', '', '', '', '', '0000-00-00 00:00:00'),
(29, 'Administrator', '', '', '', '', '0000-00-00 00:00:00'),
(30, 'Administrator', '', '', '', '', '2018-01-17 16:24:03'),
(22, 'Jodhy Kardo', '', '', '', '', '2018-01-17 13:12:46'),
(23, 'Administrator', '', '', '', '', '2018-01-17 16:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(11) NOT NULL,
  `nm_karyawan` varchar(255) NOT NULL,
  `tmpt_lahir` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `agama` varchar(255) NOT NULL,
  `id_perusahaan` int(20) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `npwp` varchar(255) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `penginput` varchar(255) NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `pengubah` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nm_karyawan`, `tmpt_lahir`, `tgl_lahir`, `jk`, `alamat`, `agama`, `id_perusahaan`, `tgl_masuk`, `email`, `npwp`, `tgl_input`, `penginput`, `tgl_ubah`, `pengubah`) VALUES
(2, 'Jodi Kardo', 'Pekanbaru', '1997-01-31', 'Laki-laki', 'Jl. Sekapur Sirih Perm. Graha Hangtuah Permai Blok H No. 7', 'Buddha', 2, '2014-06-02', 'jodhykardo@gmail.com', '00001111', '2017-12-20 00:00:00', 'admin', '2017-12-25 10:57:54', 'admin'),
(4, 'X', 'X', '2017-12-31', 'Laki-laki', 'X', 'Kristen', 5, '2017-12-01', 'X', 'X', '2017-12-26 09:31:56', 'admin', '0000-00-00 00:00:00', ''),
(5, 'S', 'S', '2017-12-28', 'Laki-laki', 'S', 'Kristen', 2, '2017-12-28', 'S', '0001111', '2017-12-28 06:53:34', 'admin', '0000-00-00 00:00:00', ''),
(6, 'X', 'Pekanbaru', '2017-12-31', 'Laki-laki', 'X', 'Kristen', 5, '2017-12-01', 'X', 'X', '2017-12-26 09:31:56', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `master_gaji`
--

CREATE TABLE IF NOT EXISTS `master_gaji` (
`id_mastergaji` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `gaji_pokok` double NOT NULL DEFAULT '0',
  `tj_tetap` double NOT NULL DEFAULT '0',
  `transportasi` double NOT NULL DEFAULT '0',
  `prestasi` double NOT NULL DEFAULT '0',
  `totalbb` varchar(255) NOT NULL DEFAULT '0',
  `tgl_input` datetime NOT NULL,
  `penginput` varchar(255) NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `pengubah` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `master_gaji`
--

INSERT INTO `master_gaji` (`id_mastergaji`, `id_karyawan`, `gaji_pokok`, `tj_tetap`, `transportasi`, `prestasi`, `totalbb`, `tgl_input`, `penginput`, `tgl_ubah`, `pengubah`) VALUES
(1, 2, 1200000, 1000000, 35000, 100000, '', '2017-12-26 16:27:32', 'admin', '0000-00-00 00:00:00', ''),
(2, 4, 1200000, 500000, 27000, 100000, '', '2017-12-28 04:43:31', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
`id_merk` int(5) NOT NULL,
  `merk` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tgl_input` datetime NOT NULL,
  `penginput` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `pengubah` varchar(255) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `merk`, `tgl_input`, `penginput`, `tgl_ubah`, `pengubah`) VALUES
(37, 'Bosch', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(38, 'Maxpower', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(39, 'Jotun', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(40, 'Grundfos', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(48, 'CHTOOLS', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(49, 'Redbo', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(50, 'Rilon', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(51, 'Morris', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(52, 'KEN', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(53, 'Togawa', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(54, 'Edon', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(55, 'Dulux', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
`id_penjualan` int(20) NOT NULL,
  `id_perusahaan` int(20) NOT NULL,
  `id_merk` int(20) NOT NULL,
  `total_penjualan` float NOT NULL,
  `bonus` float NOT NULL,
  `total_bonus` float NOT NULL,
  `bulan_bonus` date NOT NULL,
  `tgl_input` datetime NOT NULL,
  `penginput` varchar(255) NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `pengubah` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_perusahaan`, `id_merk`, `total_penjualan`, `bonus`, `total_bonus`, `bulan_bonus`, `tgl_input`, `penginput`, `tgl_ubah`, `pengubah`) VALUES
(7, 5, 37, 87000000, 0.6, 522000, '2017-11-01', '2017-12-25 14:11:33', 'admin', '2017-12-25 15:22:07', 'admin'),
(6, 2, 52, 150000000, 0.8, 1200000, '2017-11-01', '2017-12-25 11:43:16', 'admin', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE IF NOT EXISTS `perusahaan` (
`id_perusahaan` int(20) NOT NULL,
  `nm_perusahaan` varchar(50) CHARACTER SET utf8 NOT NULL,
  `alamat` text CHARACTER SET utf8 NOT NULL,
  `tgl_input` datetime NOT NULL,
  `penginput` varchar(255) NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `pengubah` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id_perusahaan`, `nm_perusahaan`, `alamat`, `tgl_input`, `penginput`, `tgl_ubah`, `pengubah`) VALUES
(1, 'Metropolitan', 'Jl. Ir. H. Juanda No. 68-70 Pekanbaru', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(2, 'Sentral Perkakas', 'Jl. Ir. H. Juanda No. 64 Pekanbaru', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(5, 'Warna Jaya', 'Jl. Ir. H. Juanda No. 74 Pekanbaru', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', ''),
(6, 'Emporium', 'Jl. Ir. H. Juanda No. 12', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pinjaman`
--

CREATE TABLE IF NOT EXISTS `pinjaman` (
`id_pinjaman` int(20) NOT NULL,
  `id_karyawan` int(20) NOT NULL,
  `jml_pinjam` float NOT NULL,
  `cicilan` float NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_input` datetime NOT NULL,
  `penginput` varchar(255) NOT NULL,
  `tgl_ubah` datetime NOT NULL,
  `pengubah` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_karyawan`, `jml_pinjam`, `cicilan`, `tgl_pinjam`, `keterangan`, `tgl_input`, `penginput`, `tgl_ubah`, `pengubah`) VALUES
(2, 2, 8000000, 150000, '2017-12-18', '<p>apaan sih</p>', '2017-12-25 15:14:54', 'admin', '2017-12-25 15:41:10', 'admin'),
(4, 4, 800000, 35000, '2017-12-11', '<p>X</p>', '2017-12-26 09:32:16', 'admin', '0000-00-00 00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cloud`
--
ALTER TABLE `cloud`
 ADD PRIMARY KEY (`id_cloud`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `master_gaji`
--
ALTER TABLE `master_gaji`
 ADD PRIMARY KEY (`id_mastergaji`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
 ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
 ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indexes for table `pinjaman`
--
ALTER TABLE `pinjaman`
 ADD PRIMARY KEY (`id_pinjaman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cloud`
--
ALTER TABLE `cloud`
MODIFY `id_cloud` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_gaji`
--
ALTER TABLE `master_gaji`
MODIFY `id_mastergaji` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
MODIFY `id_merk` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `id_penjualan` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
MODIFY `id_perusahaan` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pinjaman`
--
ALTER TABLE `pinjaman`
MODIFY `id_pinjaman` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
