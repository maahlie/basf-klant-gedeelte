-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2021 at 09:31 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basf`
--

-- --------------------------------------------------------

--
-- Table structure for table `afdeling`
--

CREATE TABLE `afdeling` (
  `afdeling_id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `afdeling_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `beschikbaarheid`
--

CREATE TABLE `beschikbaarheid` (
  `beschikbaarheid_id` int(11) NOT NULL,
  `werknemer_id` int(11) NOT NULL,
  `beschikbaarheid_datum` date NOT NULL,
  `beschikbaarheid_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `klant_naam` varchar(255) NOT NULL,
  `klant_bedrijf` varchar(255) NOT NULL,
  `klant_telefoonnummer` varchar(12) NOT NULL,
  `klant_klantnummer` int(6) NOT NULL,
  `klant_wachtwoord` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klant_id`, `klant_naam`, `klant_bedrijf`, `klant_telefoonnummer`, `klant_klantnummer`, `klant_wachtwoord`) VALUES
(1, 'Thomas', 'The Council of Thomas', '1234567890', 123456, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `planning`
--

CREATE TABLE `planning` (
  `planning_id` int(11) NOT NULL,
  `planning_taak_id` int(11) NOT NULL,
  `werknemer_id` int(11) NOT NULL,
  `planning_datum` date NOT NULL,
  `planning_start` decimal(10,0) NOT NULL,
  `planning_eind` decimal(10,0) NOT NULL,
  `planning_verlof` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `taak`
--

CREATE TABLE `taak` (
  `taak_id` int(11) NOT NULL,
  `afdeling_id` int(11) NOT NULL,
  `taak_naam` varchar(255) NOT NULL,
  `taak_omschrijving` varchar(255) NOT NULL,
  `taak_aantal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `werknemer`
--

CREATE TABLE `werknemer` (
  `werknemer_id` int(3) NOT NULL,
  `werknemer_rol` enum('werknemer','teamleider','planner') NOT NULL,
  `werknemer_personeelnummer` int(6) NOT NULL,
  `werknemer_wachtwoord` varchar(55) NOT NULL,
  `werknemer_voornaam` varchar(55) NOT NULL,
  `werknemer_achternaam` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `werknemer`
--

INSERT INTO `werknemer` (`werknemer_id`, `werknemer_rol`, `werknemer_personeelnummer`, `werknemer_wachtwoord`, `werknemer_voornaam`, `werknemer_achternaam`) VALUES
(1, 'werknemer', 123456, 'test', 'Maikel', 'Selder');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afdeling`
--
ALTER TABLE `afdeling`
  ADD PRIMARY KEY (`afdeling_id`);

--
-- Indexes for table `beschikbaarheid`
--
ALTER TABLE `beschikbaarheid`
  ADD PRIMARY KEY (`beschikbaarheid_id`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexes for table `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`planning_id`);

--
-- Indexes for table `taak`
--
ALTER TABLE `taak`
  ADD PRIMARY KEY (`taak_id`);

--
-- Indexes for table `werknemer`
--
ALTER TABLE `werknemer`
  ADD PRIMARY KEY (`werknemer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afdeling`
--
ALTER TABLE `afdeling`
  MODIFY `afdeling_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `beschikbaarheid`
--
ALTER TABLE `beschikbaarheid`
  MODIFY `beschikbaarheid_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `planning`
--
ALTER TABLE `planning`
  MODIFY `planning_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taak`
--
ALTER TABLE `taak`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `werknemer`
--
ALTER TABLE `werknemer`
  MODIFY `werknemer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
