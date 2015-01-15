-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 15, 2015 at 02:37 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sistem_akaun`
--
CREATE DATABASE IF NOT EXISTS `sistem_akaun` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sistem_akaun`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `semak` varchar(33) NOT NULL DEFAULT 'Baru',
  `Jamaun` varchar(99) NOT NULL,
  `Jbank` varchar(99) NOT NULL,
  `masa` time NOT NULL,
  `Nbank` varchar(99) NOT NULL,
  `perkara` varchar(99) NOT NULL,
  `tarikh` date NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `jumlah` varchar(55) NOT NULL,
  `Available` int(3) DEFAULT '3',
  `Month` varchar(33) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=379 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `semak`, `Jamaun`, `Jbank`, `masa`, `Nbank`, `perkara`, `tarikh`, `name`, `email`, `jumlah`, `Available`, `Month`) VALUES
(376, 'Baru', 'Kredit', 'Maybank', '12:59:00', '7566', 'sdccd', '2015-12-31', 'buzz', 'Bsempoi40@gmail.com', '50', 3, NULL),
(377, 'Baru', 'Kredit', 'Maybank', '12:59:00', '7566', 'sdccd', '2015-12-31', 'buzz', 'Bsempoi40@gmail.com', '50', 3, NULL),
(378, 'Baru', 'Debit', 'Maybank', '12:59:00', '7566', 'sdccd', '2015-12-31', 'buzz', 'Bsempoi40@gmail.com', '99.9', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `pass` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`pass`, `username`) VALUES
('bazli93', 'bazli');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_bank` varchar(99) NOT NULL,
  `Num_bank` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_amaun`
--

CREATE TABLE IF NOT EXISTS `jenis_amaun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit` varchar(55) NOT NULL,
  `debit` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `Fname` varchar(99) NOT NULL,
  `ic` varchar(99) NOT NULL,
  `pass` varchar(99) NOT NULL,
  `tel` varchar(99) NOT NULL,
  `username` varchar(99) NOT NULL,
  `type` varchar(33) NOT NULL,
  `month` varchar(33) NOT NULL,
  `quantity` int(11) NOT NULL,
  `week` varchar(33) NOT NULL,
  `weekQuantity` varchar(33) NOT NULL,
  `day` varchar(33) NOT NULL,
  `dayQuantity` varchar(33) NOT NULL,
  `log` varchar(33) NOT NULL,
  `in` varchar(33) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=140 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `address`, `email`, `Fname`, `ic`, `pass`, `tel`, `username`, `type`, `month`, `quantity`, `week`, `weekQuantity`, `day`, `dayQuantity`, `log`, `in`) VALUES
(138, 'knhasbhbsa', 'buzzlee199@yahoo.com', 'bazli terbaek', '987654321', 'buzzlee_93', '0176588515', 'buzz', '', 'Jan', 27100, '03', '7100', '15', '2100', '3000', ''),
(139, 'weec', 'dbazli@yahoo.com', 'bazli terbaek', '987654321', 'buzzlee_93', '0176588515', 'buzzlee', '', 'Jan', 3000, '03', '1000', '13', '500', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
