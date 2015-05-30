-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2015 at 10:47 AM
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
('bhan', 'lfiji'),
('lfiji', 'bhan'),
('bhan', 'jle'),
('jle', 'bhan'),
('bhan', 'tkelly'),
('tkelly', 'bhan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Password` varchar(20) DEFAULT NULL,
  `FirstName` varchar(20) DEFAULT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Password`, `FirstName`, `LastName`) VALUES
('bhan', 'password', 'Braxton', 'Han'),
('jle', 'password', 'Justin', 'Le'),
('lfiji', 'password', 'Luke', 'Fiji'),
('mnazanda', 'password', 'Marwan', 'Nazanda'),
('tkelly', 'password', 'Tim', 'Kelly');

-- --------------------------------------------------------

--
-- Table structure for table `workouts`
--

CREATE TABLE IF NOT EXISTS `workouts` (
  `date` date NOT NULL,
  `title` varchar(40) NOT NULL,
  `numOfReserves` int(2) NOT NULL,
  `author` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workouts`
--

INSERT INTO `workouts` (`date`, `title`, `numOfReserves`, `author`, `description`) VALUES
('0000-00-00', 'asdasdf', 1, 'justinle', 'qwerqwerqwer'),
('0000-00-00', 'qwerqwer', 2, 'timkelly', 'adbadb'),
('0000-00-00', 'title', 2, 'tkelly', 'asdfasdf'),
('0000-00-00', 'justin workout', 3, 'jle', 'qqwweeer'),
('0000-00-00', 'qqwweerrfiji', 3, 'lfiji', 'asfdsasdf'),
('0000-00-00', 'second jle workout', 3, 'jle', 'qqqwerrrrt'),
('0000-00-00', 'bhan workout 1', 3, 'bhan', 'afasdf'),
('0000-00-00', 'bhan workout 2', 3, 'bhan', 'qwerqwer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
