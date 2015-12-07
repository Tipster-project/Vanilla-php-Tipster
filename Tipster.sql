-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 07 dec 2015 kl 11:12
-- Serverversion: 5.6.21
-- PHP-version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `Tipster`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bets`
--

CREATE TABLE IF NOT EXISTS `bets` (
`bet_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `goal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `games`
--

CREATE TABLE IF NOT EXISTS `games` (
`game_id` int(11) NOT NULL,
  `home_team` varchar(30) NOT NULL,
  `away_team` varchar(30) NOT NULL,
  `game_date` varchar(30) NOT NULL,
  `game_time` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `games`
--

INSERT INTO `games` (`game_id`, `home_team`, `away_team`, `game_date`, `game_time`) VALUES
(1, '0', '0', '2016-02-18', '18:00'),
(2, 'Germany', 'Italy', '2016-02-28', '20:00');

-- --------------------------------------------------------

--
-- Tabellstruktur `goals`
--

CREATE TABLE IF NOT EXISTS `goals` (
`goal_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `goal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
`team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `group_nr` varchar(255) NOT NULL,
  `team_flag` varchar(255) NOT NULL,
  `team_points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `group_nr`, `team_flag`, `team_points`) VALUES
(17, 'France', 'A', 'FRA.png', 0),
(18, 'Sweden', 'B', 'SWE.png', 0),
(19, 'England', 'A', 'ENG.png', 0),
(20, 'Ireland', 'C', 'IRL.png', 0),
(21, 'Spain', 'C', 'ESP.png', 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
`tournament_id` int(11) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `admin` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `admin`) VALUES
(1, 'lisaadmin', 'drug6bAx!', 'lisahjarpe@hotmail.com', 'true'),
(5, 'lisafisa', 'drug6bAx!', 'lisahjarpe@gmail.com', 'false');

-- --------------------------------------------------------

--
-- Tabellstruktur `user_tournaments`
--

CREATE TABLE IF NOT EXISTS `user_tournaments` (
`user_tournaments_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tournament_id` int(11) NOT NULL,
  `user_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `bets`
--
ALTER TABLE `bets`
 ADD PRIMARY KEY (`bet_id`), ADD UNIQUE KEY `bet_id` (`bet_id`);

--
-- Index för tabell `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`game_id`), ADD UNIQUE KEY `game_id` (`game_id`);

--
-- Index för tabell `goals`
--
ALTER TABLE `goals`
 ADD PRIMARY KEY (`goal_id`);

--
-- Index för tabell `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`team_id`), ADD UNIQUE KEY `team_id` (`team_id`);

--
-- Index för tabell `tournament`
--
ALTER TABLE `tournament`
 ADD PRIMARY KEY (`tournament_id`), ADD UNIQUE KEY `tournament_id` (`tournament_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user_id` (`user_id`,`user_name`);

--
-- Index för tabell `user_tournaments`
--
ALTER TABLE `user_tournaments`
 ADD PRIMARY KEY (`user_tournaments_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `bets`
--
ALTER TABLE `bets`
MODIFY `bet_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `games`
--
ALTER TABLE `games`
MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `goals`
--
ALTER TABLE `goals`
MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `teams`
--
ALTER TABLE `teams`
MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT för tabell `tournament`
--
ALTER TABLE `tournament`
MODIFY `tournament_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `user_tournaments`
--
ALTER TABLE `user_tournaments`
MODIFY `user_tournaments_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
