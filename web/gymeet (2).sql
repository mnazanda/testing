-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2015 at 08:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gymeet`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `userName` varchar(20) NOT NULL,
  `friend` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`userName`, `friend`) VALUES
('test2', 'test'),
('test', 'test2'),
('bhan', 'mnazanda'),
('mnazanda', 'bhan'),
('bhan', 'jle'),
('jle', 'bhan'),
('bhan', 'tkelly'),
('tkelly', 'bhan'),
('lfiji', 'tkelly'),
('tkelly', 'lfiji'),
('lfiji', 'mnazanda'),
('mnazanda', 'lfiji'),
('bhan', 'lfiji'),
('lfiji', 'bhan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `email`, `FirstName`, `LastName`) VALUES
('bhan', 'password', 'hanba@uci.edu', 'Braxton', 'Han'),
('jle', 'password', '', 'Justin', 'Le'),
('lfiji', 'password', '', 'Luke', 'Fiji'),
('mnazanda', 'password', '', 'Marwan', 'Nazanda'),
('tkelly', 'password', '', 'Tim', 'Kelly');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `workoutDate` varchar(15) NOT NULL,
  `title` varchar(40) NOT NULL,
  `location` varchar(50) NOT NULL,
  `numOfReserves` int(2) NOT NULL,
  `spotsLeft` int(1) NOT NULL,
  `author` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `startTime` varchar(15) NOT NULL,
  `endTime` varchar(15) NOT NULL,
  `reserve1` varchar(20) NOT NULL,
  `reserve2` varchar(20) NOT NULL,
  `reserve3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`workoutDate`, `title`, `location`, `numOfReserves`, `spotsLeft`, `author`, `description`, `startTime`, `endTime`, `reserve1`, `reserve2`, `reserve3`) VALUES
('5-30-2015', 'lukes workout 2', 'asdfa', 3, 3, 'lfiji', ' qwerqwer', '12:00am', '1:00am', '', '', ''),
('5-31-2015', 'lukes workout 3', 'asdfa', 3, 2, 'lfiji', 'second workout 31st', '12:30am', '3:00am', '', '', 'bhan'),
('5-31-2015', 'lukes workout 4', 'asdfaasd', 2, 2, 'lfiji', 'qasdfqwe', '2:00am', '3:00am', '', '', ''),
('5-30-2015', 'workout 100', 'la fatness for fat people', 1, 1, 'bhan', ' ', '12:40am', '1:30am', '', '', ''),
('5-30-2015', 'workout 2 on 30th', 'ARC', 2, 2, 'bhan', ' second workout to see on 30th', '1:30am', '2:30am', '', '', ''),
('5-31-2015', 'braxtons second 31st workout', 'la fatness', 3, 0, 'bhan', ' second workout', '5:00pm', '6:00pm', 'mnazanda', 'jle', 'lfiji'),
('5-28-2015', 'past curr day', 'past', 1, 1, 'bhan', ' past', '1:00am', '2:00am', '', '', ''),
('5-30-2015', 'chesticles', 'golds gym', 3, 3, 'mnazanda', ' aaaaaaaaaaaaa', '7:00pm', '8:00pm', '', '', ''),
('5-30-2015', 'tes test', 'qqwwe', 2, 2, 'mnazanda', ' qwerqwer', '11:30pm', '12:30am', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
