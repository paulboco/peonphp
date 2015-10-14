-- phpMyAdmin SQL Dump
-- version 4.5.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2015 at 11:40 AM
-- Server version: 5.5.44-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peon`
--

-- --------------------------------------------------------

--
-- Table structure for table `bondservants`
--

CREATE TABLE IF NOT EXISTS `bondservants` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `ratin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bondservants`
--

INSERT INTO `bondservants` (`id`, `name`, `ratin`) VALUES
(1, 'Harold Whitchaser', 0),
(2, 'Edward Schlowdern', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bondservants`
--
ALTER TABLE `bondservants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bondservants`
--
ALTER TABLE `bondservants`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
