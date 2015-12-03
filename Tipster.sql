-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 03 dec 2015 kl 11:23
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
  `user_id` int(11) NOT NULL,
  `home_score` int(11) NOT NULL,
  `away_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `games`
--

CREATE TABLE IF NOT EXISTS `games` (
`game_id` int(11) NOT NULL,
  `game_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `home_team` int(11) NOT NULL,
  `away_team` int(11) NOT NULL,
  `home_score` int(11) NOT NULL,
  `away_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
`team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `group_nr` varchar(255) NOT NULL,
  `flag_url` varchar(255) NOT NULL,
  `team_points` int(11) NOT NULL,
  `goals` int(11) NOT NULL,
  `concede` int(11) NOT NULL,
  `goal_difference` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `group_nr`, `flag_url`, `team_points`, `goals`, `concede`, `goal_difference`) VALUES
(1, 'sweden', '', '', 0, 0, 0, 0),
(2, 'france', '', '', 0, 0, 0, 0),
(3, 'spain', '', '', 2, 0, 0, 0),
(4, 'france', 'C', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `tournament`
--

CREATE TABLE IF NOT EXISTS `tournament` (
`tournament_id` int(11) NOT NULL,
  `tournament_name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
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
  `admin` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `admin`) VALUES
(5, 'lisafisa', 'drug6bAx!', 'lisahjarpe@gmail.com', 0),
(1, 'lisaadmin', 'drug6bAx!', 'lisahjarpe@gmail.com', 1);

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
 ADD PRIMARY KEY (`admin`), ADD UNIQUE KEY `user_id` (`user_id`,`user_name`);

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
MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `teams`
--
ALTER TABLE `teams`
MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT för tabell `tournament`
--
ALTER TABLE `tournament`
MODIFY `tournament_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `user_tournaments`
--
ALTER TABLE `user_tournaments`
MODIFY `user_tournaments_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
