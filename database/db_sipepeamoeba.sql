-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2013 at 01:59 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipepe`
--
CREATE DATABASE `sipepe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sipepe`;

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
  `biaya_admin` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE IF NOT EXISTS `cust` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `latitute` decimal(16,2) NOT NULL,
  `longitude` decimal(16,2) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `gol` varchar(10) NOT NULL,
  `diameter_pipa` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `golongan` varchar(5) NOT NULL,
  `meter1` int(11) NOT NULL,
  `meter2` int(11) NOT NULL,
  `HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kritiksaran`
--

CREATE TABLE IF NOT EXISTS `kritiksaran` (
  `Nama` varchar(65) NOT NULL,
  `Alamat` varchar(65) DEFAULT NULL,
  `Email` varchar(65) DEFAULT NULL,
  `No_Hp` varchar(15) DEFAULT NULL,
  `No_Meter` int(8) NOT NULL,
  `Kritik_Saran` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE IF NOT EXISTS `pemakaian` (
  `id_pemakaian` int(23) NOT NULL AUTO_INCREMENT,
  `nomor_meter` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` blob NOT NULL,
  `stand_awal` decimal(16,2) NOT NULL,
  `stand_akhir` decimal(16,2) NOT NULL,
  `biaya_pemakaian` decimal(16,2) NOT NULL,
  `biaya_admin` decimal(16,2) NOT NULL,
  `biaya_pemeliharaan` decimal(16,2) NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `total_biaya` decimal(16,2) NOT NULL,
  PRIMARY KEY (`id_pemakaian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE IF NOT EXISTS `pemeliharaan` (
  `diameter_pipa` decimal(4,2) NOT NULL,
  `biaya_pemeliharaan` decimal(16,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
  `No_pengaduan` int(5) NOT NULL,
  `Nama` varchar(65) NOT NULL,
  `Alamat` varchar(65) DEFAULT NULL,
  `Email` varchar(65) DEFAULT NULL,
  `No_Hp` int(15) DEFAULT NULL,
  `No_meter` int(8) NOT NULL,
  `Komentar` varchar(4000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(23) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `encrypted_password` varchar(80) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;
