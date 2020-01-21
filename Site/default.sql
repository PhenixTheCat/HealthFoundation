-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 10:30 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_foundation`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `online_psychotest`
--

CREATE TABLE `online_psychotest` (
  `id` int(11) NOT NULL,
  `id_pilot` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `psychotechnical_data`
--

CREATE TABLE `psychotechnical_data` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `psychotechnical_data`
--

INSERT INTO `psychotechnical_data` (`id`, `type`, `unit`) VALUES
(1, 'Stress', 'Bpm'),
(2, 'Perception', 'Hz'),
(3, 'Temps de réaction', 'ms'),
(4, 'Tonalité', 'Hz');

-- --------------------------------------------------------

--
-- Table structure for table `resetpass`
--

CREATE TABLE `resetpass` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `test` int(11) NOT NULL COMMENT 'test id',
  `timeline` int(11) NOT NULL COMMENT 'moment of the measure in the test',
  `value` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `measured_data` int(11) NOT NULL COMMENT 'psychotechnical_data id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `referent` int(11) DEFAULT NULL COMMENT 'user id',
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postcode` int(11) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'duration in seconds',
  `score` int(11) NOT NULL,
  `testbed` int(11) DEFAULT NULL COMMENT 'testbed id',
  `measured_data` int(11) DEFAULT NULL COMMENT 'psychotechnical data id',
  `pilot` int(11) DEFAULT NULL COMMENT 'pilot id',
  `instructor` int(11) DEFAULT NULL COMMENT 'instructor id',
  `sensor` int(11) NOT NULL COMMENT 'sensor id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `testbed`
--

CREATE TABLE `testbed` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL COMMENT 'adress of the testbed',
  `structure` int(11) DEFAULT NULL COMMENT 'structure id'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `instructor` int(11) DEFAULT NULL COMMENT 'user id of the instructor',
  `structure` int(11) DEFAULT NULL COMMENT 'structure id',
  `adress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postecode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `phone_number` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT 'P',
  `validation_key` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `sex`, `type`, `email`, `password`, `birthdate`, `instructor`, `structure`, `adress`, `city`, `postecode`, `country`, `phone_number`, `code`, `status`, `validation_key`) VALUES
(1, 'Admin', 'Istrator', '', 'Administrator', 'admin@email.fr', 'f7d2f352146fb9b88320961c4b52f17f6d57fd86', '0000-00-00', 0, NULL, '', '', '', NULL, NULL, 'ad15474325', 'A', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_psychotest`
--
ALTER TABLE `online_psychotest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psychotechnical_data`
--
ALTER TABLE `psychotechnical_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resetpass`
--
ALTER TABLE `resetpass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testbed`
--
ALTER TABLE `testbed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_psychotest`
--
ALTER TABLE `online_psychotest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `psychotechnical_data`
--
ALTER TABLE `psychotechnical_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resetpass`
--
ALTER TABLE `resetpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testbed`
--
ALTER TABLE `testbed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
