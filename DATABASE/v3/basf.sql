-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 10 dec 2021 om 13:10
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.10

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
-- Tabelstructuur voor tabel `afdeling`
--

CREATE TABLE `afdeling` (
  `afdeling_id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `afdeling_naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `beschikbaarheid`
--

CREATE TABLE `beschikbaarheid` (
  `beschikbaarheid_id` int(11) NOT NULL,
  `werknemer_id` int(11) NOT NULL,
  `beschikbaarheid_datum` date NOT NULL,
  `beschikbaarheid_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `klant_id` int(11) NOT NULL,
  `klant_voornaam` varchar(255) NOT NULL,
  `klant_achternaam` varchar(255) NOT NULL,
  `klant_bedrijf` varchar(255) NOT NULL,
  `klant_email` varchar(55) NOT NULL,
  `klant_telefoonnummer` varchar(12) NOT NULL,
  `klant_klantnummer` int(6) NOT NULL,
  `klant_wachtwoord` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`klant_id`, `klant_voornaam`, `klant_achternaam`, `klant_bedrijf`, `klant_email`, `klant_telefoonnummer`, `klant_klantnummer`, `klant_wachtwoord`) VALUES
(1, 'Thomas', 'Joon', 'The Council of Thomas', 'Thomas@test.com', '0626378192', 123456, 'test');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planning`
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
-- Tabelstructuur voor tabel `taak`
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
-- Tabelstructuur voor tabel `werknemer`
--

CREATE TABLE `werknemer` (
  `werknemer_id` int(3) NOT NULL,
  `werknemer_rol` enum('werknemer','teamleider','planner') NOT NULL,
  `werknemer_personeelnummer` int(6) NOT NULL,
  `werknemer_wachtwoord` varchar(55) NOT NULL,
  `werknemer_email` varchar(55) NOT NULL,
  `werknemer_voornaam` varchar(55) NOT NULL,
  `werknemer_achternaam` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `werknemer`
--

INSERT INTO `werknemer` (`werknemer_id`, `werknemer_rol`, `werknemer_personeelnummer`, `werknemer_wachtwoord`, `werknemer_email`, `werknemer_voornaam`, `werknemer_achternaam`) VALUES
(1, 'werknemer', 123456, 'test', 'Test@gmail.com', 'Maikel', 'Selder');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afdeling`
--
ALTER TABLE `afdeling`
  ADD PRIMARY KEY (`afdeling_id`);

--
-- Indexen voor tabel `beschikbaarheid`
--
ALTER TABLE `beschikbaarheid`
  ADD PRIMARY KEY (`beschikbaarheid_id`);

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klant_id`);

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`planning_id`);

--
-- Indexen voor tabel `taak`
--
ALTER TABLE `taak`
  ADD PRIMARY KEY (`taak_id`);

--
-- Indexen voor tabel `werknemer`
--
ALTER TABLE `werknemer`
  ADD PRIMARY KEY (`werknemer_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afdeling`
--
ALTER TABLE `afdeling`
  MODIFY `afdeling_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `beschikbaarheid`
--
ALTER TABLE `beschikbaarheid`
  MODIFY `beschikbaarheid_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `klant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `planning_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `taak`
--
ALTER TABLE `taak`
  MODIFY `taak_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `werknemer`
--
ALTER TABLE `werknemer`
  MODIFY `werknemer_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
