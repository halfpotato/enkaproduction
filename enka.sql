-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2013 at 03:00 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `enka`
--
-- CREATE DATABASE IF NOT EXISTS `enka` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
-- USE `enka`;

-- --------------------------------------------------------

--
-- Table structure for table `sevices`
--

CREATE TABLE IF NOT EXISTS `sevices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(140) DEFAULT NULL,
  `description` text,
  `img` varchar(255) DEFAULT NULL,
  `catalogue` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `webmaster`
--

CREATE TABLE IF NOT EXISTS `webmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `webmaster`
--

INSERT INTO `webmaster` (`id`, `name`, `email`, `password`) VALUES
(1, 'Nana Cidharta', 'webmaster@enkaproduction.com', '50a9c7dbf0fa09e8969978317dca12e8');

-- --------------------------------------------------------

--
-- Table structure for table `webprofiles`
--

CREATE TABLE IF NOT EXISTS `webprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(255) DEFAULT NULL,
  `about` text,
  `whyus` text,
  `officeaddress` varchar(255) DEFAULT NULL,
  `officemail` varchar(255) DEFAULT NULL,
  `officephone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `webprofiles`
--

INSERT INTO `webprofiles` (`id`, `webname`, `about`, `whyus`, `officeaddress`, `officemail`, `officephone`) VALUES
(7, 'Enka Production', 'Event Organizer (EO).', 'because we are professional.', 'Jl.Mendawai 1 no 52 Kebayoran Baru Jakarta Selatan', 'nana24dec@yahoo.com', '+62-0000000000');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
