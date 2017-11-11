-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2015 at 11:08 PM
-- Server version: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `luhcm`
--
CREATE DATABASE IF NOT EXISTS `luhcm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `luhcm`;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SENDER` int(11) NOT NULL,
  `MESSAGE` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`ID`, `SENDER`, `MESSAGE`) VALUES
(1, 1, 'Gee'),
(2, 1, 'Wetin Da sup'),
(3, 2, 'Chai'),
(4, 1, 'njnjl'),
(5, 1, 'blaa'),
(6, 1, 'play'),
(7, 1, 'ka'),
(8, 1, 'jj'),
(9, 1, 'huih'),
(10, 2, 'wetin na');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAILADDRESS` varchar(60) NOT NULL,
  `PWORD` varchar(60) NOT NULL,
  `NAME` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `EMAILADDRESS`, `PWORD`, `NAME`) VALUES
(1, 'hc.reception@lmu.edu.ng', 'hcreceptionpassword', 'Reception'),
(2, 'hc.femaleward@lmu.edu.ng', 'hcfemalewardpassword', 'Female Ward');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
