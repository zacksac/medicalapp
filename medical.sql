-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2018 at 10:12 AM
-- Server version: 5.7.21
-- PHP Version: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical`
--

-- --------------------------------------------------------

--
-- Table structure for table `purchasedproducts`
--

DROP TABLE IF EXISTS `purchasedproducts`;
CREATE TABLE IF NOT EXISTS `purchasedproducts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `batch` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `datem` date NOT NULL,
  `datee` date NOT NULL,
  `rate` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchasedproducts`
--

INSERT INTO `purchasedproducts` (`id`, `name`, `batch`, `quantity`, `datem`, `datee`, `rate`, `timestamp`) VALUES
(19, 'tab loc-s', 't-027', 4, '2016-08-01', '2016-07-01', 17, '2018-08-10 08:47:15'),
(15, 'tet', 'asdfasd', 44, '2018-07-24', '2016-07-25', 23, '2018-07-04 12:21:34'),
(16, 'cv', 'asdf', 34, '2018-07-25', '2018-07-18', 23, '0000-00-00 00:00:00'),
(17, 'tab loc-s', 't-027', 54, '2016-08-01', '2018-07-01', 17, '2018-07-04 08:30:35'),
(18, 'gui', 'jhgkj', 33, '2018-07-05', '2018-07-19', 56, '2018-07-04 08:30:42'),
(22, 'xxx', 'asdf', 23, '2018-07-23', '2018-07-25', 23, '2018-07-10 13:03:34'),
(21, 'tab zuflo 200', 'tml 18231', 146, '2018-02-01', '2021-01-01', 57, '2018-07-04 08:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `soldproduct`
--

DROP TABLE IF EXISTS `soldproduct`;
CREATE TABLE IF NOT EXISTS `soldproduct` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchasedid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soldproduct`
--

INSERT INTO `soldproduct` (`id`, `purchasedid`, `quantity`, `timestamp`) VALUES
(1, 19, 2, '2018-08-10 08:37:42'),
(2, 19, 2, '2018-08-10 08:38:32'),
(3, 19, 2, '2018-08-10 08:38:46'),
(4, 19, 2, '2018-08-10 08:39:48'),
(5, 19, 2, '2018-08-10 08:39:54'),
(6, 19, 3, '2018-08-10 08:42:03'),
(7, 19, 33, '2018-08-10 08:42:51'),
(8, 19, 1, '2018-08-10 08:45:22'),
(9, 19, 1, '2018-08-10 08:45:46'),
(10, 19, 2, '2018-08-10 08:46:51'),
(11, 19, 2, '2018-08-10 08:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admine51%%');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
