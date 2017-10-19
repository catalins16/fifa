-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2017 at 07:09 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fifa`
--

-- --------------------------------------------------------

--
-- Table structure for table `championships`
--

CREATE TABLE IF NOT EXISTS `championships` (
`id` int(11) NOT NULL,
  `date` varchar(32) NOT NULL,
  `numOfPlayers` int(11) NOT NULL,
  `player1` varchar(32) NOT NULL,
  `player2` varchar(32) NOT NULL,
  `player3` varchar(32) NOT NULL,
  `player4` varchar(32) NOT NULL,
  `player5` varchar(32) NOT NULL,
  `player6` varchar(32) NOT NULL,
  `numOfMatches` int(11) NOT NULL,
  `1stPlace` varchar(32) NOT NULL,
  `2ndPlace` varchar(32) NOT NULL,
  `3rdPlace` varchar(32) NOT NULL,
  `4thPlace` varchar(32) NOT NULL,
  `5thPlace` varchar(32) NOT NULL,
  `6thPlace` varchar(32) NOT NULL,
  `winner` varchar(32) NOT NULL,
  `mayor` varchar(32) NOT NULL,
  `1stPlacePoints` int(11) NOT NULL,
  `2ndPlacePoints` int(11) NOT NULL,
  `3rdPlacePoints` int(11) NOT NULL,
  `4thPlacePoints` int(11) NOT NULL,
  `5thPlacePoints` int(11) NOT NULL,
  `6thPlacePoints` int(11) NOT NULL,
  `addedBy` varchar(32) NOT NULL,
  `finished` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `championships`
--

INSERT INTO `championships` (`id`, `date`, `numOfPlayers`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `numOfMatches`, `1stPlace`, `2ndPlace`, `3rdPlace`, `4thPlace`, `5thPlace`, `6thPlace`, `winner`, `mayor`, `1stPlacePoints`, `2ndPlacePoints`, `3rdPlacePoints`, `4thPlacePoints`, `5thPlacePoints`, `6thPlacePoints`, `addedBy`, `finished`) VALUES
(1, '23.9.2017', 5, 'Tibi', 'Pesky', 'Cata', 'Moshu', 'Luci', '', 15, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, '1', 1),
(2, '23.9.2017', 4, 'Cata', 'Tibi', 'Pesky', 'Moshu', '', '', 12, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 'admin', 1),
(3, '23.9.2017', 4, 'Cata', 'Mario', 'Nicusor', 'Oli', '', '', 15, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 'admin', 1),
(4, '23.9.2017', 5, 'Pesky', 'Cata', 'Moshu', 'Luci', 'Tibi', '', 15, '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 'admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE IF NOT EXISTS `matches` (
`id` int(32) NOT NULL,
  `championshipId` varchar(32) NOT NULL,
  `result` varchar(32) NOT NULL,
  `player1` varchar(32) NOT NULL,
  `player1WinDrawLose` varchar(32) NOT NULL,
  `player1GoalsScored` int(11) NOT NULL,
  `player1GoalsConceded` int(11) NOT NULL,
  `player1Points` int(11) NOT NULL,
  `player1GD` int(11) NOT NULL,
  `player2` varchar(32) NOT NULL,
  `player2WinDrawLose` varchar(32) NOT NULL,
  `player2GoalsScored` int(11) NOT NULL,
  `player2GoalsConceded` int(11) NOT NULL,
  `player2Points` int(11) NOT NULL,
  `player2GD` int(11) NOT NULL,
  `player3` varchar(32) NOT NULL,
  `player3WinDrawLose` varchar(32) NOT NULL,
  `player3GoalsScored` int(11) NOT NULL,
  `player3GoalsConceded` int(11) NOT NULL,
  `player3Points` int(11) NOT NULL,
  `player3GD` int(11) NOT NULL,
  `player4` varchar(32) NOT NULL,
  `player4WinDrawLose` varchar(32) NOT NULL,
  `player4GoalsScored` int(11) NOT NULL,
  `player4GoalsConceded` int(11) NOT NULL,
  `player4Points` int(11) NOT NULL,
  `player4GD` int(11) NOT NULL,
  `finished` varchar(32) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `championshipId`, `result`, `player1`, `player1WinDrawLose`, `player1GoalsScored`, `player1GoalsConceded`, `player1Points`, `player1GD`, `player2`, `player2WinDrawLose`, `player2GoalsScored`, `player2GoalsConceded`, `player2Points`, `player2GD`, `player3`, `player3WinDrawLose`, `player3GoalsScored`, `player3GoalsConceded`, `player3Points`, `player3GD`, `player4`, `player4WinDrawLose`, `player4GoalsScored`, `player4GoalsConceded`, `player4Points`, `player4GD`, `finished`) VALUES
(20, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, ''),
(21, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(22, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(23, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, ''),
(24, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(25, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(26, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, ''),
(27, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(28, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(29, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, ''),
(30, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, 'Cata', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, ''),
(31, '4', '', 'Pesky', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, ''),
(32, '4', '', 'Cata', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(33, '4', '', 'Cata', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, ''),
(34, '4', '', 'Cata', '', 0, 0, 0, 0, 'Tibi', '', 0, 0, 0, 0, 'Moshu', '', 0, 0, 0, 0, 'Luci', '', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `active`, `admin`) VALUES
(1, 'admin', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Cata', 'Smaranda', 'catalin.s@gmail.com', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `championships`
--
ALTER TABLE `championships`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `championships`
--
ALTER TABLE `championships`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
