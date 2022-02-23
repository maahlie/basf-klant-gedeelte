-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 25 jan 2022 om 12:21
-- Serverversie: 10.4.14-MariaDB
-- PHP-versie: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basfdb`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `availability`
--

CREATE TABLE `availability` (
  `availability` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `monday` int(1) NOT NULL,
  `tuesday` int(1) NOT NULL,
  `wednesday` int(1) NOT NULL,
  `thursday` int(1) NOT NULL,
  `friday` int(1) NOT NULL,
  `saturday` int(1) NOT NULL,
  `sunday` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `code`
--

CREATE TABLE `code` (
  `codeID` int(10) NOT NULL,
  `code` varchar(11) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `comp`
--

CREATE TABLE `comp` (
  `compID` int(10) NOT NULL,
  `compName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `comp`
--

INSERT INTO `comp` (`compID`, `compName`) VALUES
(1, 'Communicatief vaardig'),
(2, 'Assertief'),
(3, 'Positief'),
(4, 'Basis kennis groen'),
(5, 'Verantwoordelijkheidsgevoel'),
(6, 'Flexibiliteit ten aanzien van werktijden'),
(7, 'Zelfstandig en teamverband werken'),
(8, 'engels'),
(9, 'Leadership'),
(10, 'Leidinggevende capaciteiten'),
(11, 'Computer vaardighden'),
(12, 'Kennis veredeling'),
(13, 'Plan capaciteiten');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `klantnu` int(11) NOT NULL,
  `naam` varchar(50) NOT NULL,
  `achternaam` varchar(50) NOT NULL,
  `onderwerp` varchar(255) NOT NULL,
  `bericht` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `department`
--

CREATE TABLE `department` (
  `departmentID` int(10) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  `subDepartmentIDs` varchar(500) DEFAULT NULL,
  `budgetGiven` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `department`
--

INSERT INTO `department` (`departmentID`, `departmentName`, `subDepartmentIDs`, `budgetGiven`) VALUES
(1, 'CAC wortel', NULL, 100),
(2, 'LEL prei', NULL, 150),
(3, 'asperge ASA 120', NULL, 1000),
(4, 'knolselderij CEC 150', NULL, 15000),
(5, 'SPS spinazie', NULL, 17500),
(6, 'genetic enhancement', NULL, 16500),
(7, 'tunnelverzorging', NULL, 12030),
(8, 'openfield machinery', NULL, 7500),
(9, 'diversen', NULL, 18000),
(10, 'facility climate cells', NULL, 9000),
(11, 'facility greenhouses', NULL, 9500),
(12, 'processing', NULL, 13500),
(13, 'QA', NULL, 6500);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `employee`
--

CREATE TABLE `employee` (
  `userID` int(10) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthDate` date NOT NULL,
  `telNumMobile` varchar(10) NOT NULL,
  `telNumEmergency` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `salt` int(11) NOT NULL,
  `clearanceLvl` int(10) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `departmentID` int(10) DEFAULT NULL,
  `streetName` varchar(100) NOT NULL,
  `postalCode` varchar(10) NOT NULL,
  `country` varchar(60) NOT NULL,
  `houseNr` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `employee`
--

INSERT INTO `employee` (`userID`, `firstName`, `lastName`, `email`, `birthDate`, `telNumMobile`, `telNumEmergency`, `password`, `salt`, `clearanceLvl`, `active`, `departmentID`, `streetName`, `postalCode`, `country`, `houseNr`, `city`) VALUES
(1, 'Tomas', 'Joon', 'Thomas@joon.com', '2003-05-07', '0612345678', '0623456789', 'thomas', 0, 1, 1, 2, 'Akkerpad', '6081AA', 'Nederland', '16', 'Haelen'),
(2, 'Mitchell', 'Tang', 'a@a.com', '1993-07-09', '0611111111', '0611111112', 'a', 0, 2, 0, NULL, 'Kempweg', '6045EH', 'Nederland', '20', 'Roermond'),
(3, 'Bert', 'Visser', 'bert@visser.com', '1994-05-07', '0612345679', '0623456780', 'bert', 0, 3, 1, 2, 'Dorpstraat', '6081BA', 'Nederland', '18', 'Haelen'),
(4, 'Tim', 'Janssen', 'tim@janssen.com', '1993-09-07', '0611111113', '0611111114', 'tim', 0, 4, 0, NULL, 'Kempweg', '6045EH', 'Nederland', '20', 'Roermond'),
(5, 'Diederik', 'Stolman', 'diederik@stolman.com', '2003-05-07', '0612345678', '0623456789', 'diederik', 0, 1, 1, 2, 'Kerkstraat', '6081CA', 'Nederland', '1', 'Haelen'),
(6, 'Emma', 'Teeuwen', 'emma@teeuwen.com', '1996-04-12', '0621111111', '0612111112', 'emma', 0, 4, 0, NULL, 'Saturnuslaan', '6045BB', 'Nederland', '30', 'Roermond'),
(7, 'Zack', 'Efron', 'zack@efron.com', '1991-01-08', '0612345600', '0623456700', 'zack', 0, 3, 1, 1, 'Dorpstraat', '6081BA', 'Nederland', '42', 'Haelen'),
(8, 'Tom', 'Neelen', 'tom@neelen.com', '1990-12-07', '0611111199', '0611111199', 'tom', 0, 4, 0, NULL, 'Sumatrastraat', '6045EL', 'Nederland', '20', 'Roermond'),
(9, 'Rob', 'Jenssen', 'rob@jenssen.com', '1994-02-10', '0612345777', '0612345888', 'rob', 0, 1, 1, 3, 'Kemplaan', '6045MN', 'Nederland', '2', 'roermond'),
(10, 'Jan', 'Joost', 'jan@joost.com', '1984-02-10', '0612345222', '0612345666', 'jan', 0, 3, 1, 4, 'Kerklaan', '6045ML', 'Nederland', '3', 'Roermond'),
(11, 'Lex', 'Luther', 'lex@luther.com', '1985-01-13', '0698765432', '0687654321', 'lex', 0, 1, 1, 12, 'Stationstraat', '6045ED', 'Nederland', '6', 'Roermond'),
(12, 'Jarvin', 'King', 'jarvin@king.com', '1987-10-02', '0622222222', '0633333333', 'jarvin', 0, 3, 1, 7, 'Stationstraat', '6045ED', 'Nederland', '8', 'Roermond'),
(13, 'Mark', 'Rutte', 'mark@rutte.com', '1973-01-16', '0623232323', '0632323232', 'mark', 0, 4, 1, NULL, 'Keizerlaan', '6045MM', 'Nederland', '1', 'Roermond'),
(19, 'Johan', 'Kruif', 'johan@kruif.com', '2001-03-17', '0654545454', '0645454545', 'johan', 0, 1, 1, 5, 'Bredeweg', '6045GG', 'Nederland', '20', 'Roermond');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `leaverequest`
--

CREATE TABLE `leaverequest` (
  `requestID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `reason` varchar(50) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `requestDate` date NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `approvedDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `ordercomp`
--

CREATE TABLE `ordercomp` (
  `userID` int(10) NOT NULL,
  `compID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `ordercomp`
--

INSERT INTO `ordercomp` (`userID`, `compID`) VALUES
(1, 1),
(3, 1),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12),
(19, 13);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orderworkcomp`
--

CREATE TABLE `orderworkcomp` (
  `userID` int(10) NOT NULL,
  `workCompID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `orderworkcomp`
--

INSERT INTO `orderworkcomp` (`userID`, `workCompID`) VALUES
(1, 3),
(1, 6),
(1, 7),
(1, 14),
(3, 1),
(3, 2),
(9, 1),
(9, 2),
(9, 3),
(9, 4),
(9, 5),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(9, 10),
(9, 11),
(9, 12),
(9, 13),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 15),
(10, 16),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(11, 6),
(11, 7),
(11, 8),
(11, 9),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(12, 14),
(12, 15),
(12, 16),
(12, 17),
(12, 18),
(12, 19),
(19, 1),
(19, 2),
(19, 3),
(19, 4),
(19, 5),
(19, 6),
(19, 7),
(19, 8),
(19, 9),
(19, 10),
(19, 11),
(19, 12),
(19, 13),
(19, 14),
(19, 15),
(19, 16),
(19, 17),
(19, 18),
(19, 19);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `planning`
--

CREATE TABLE `planning` (
  `planningID` int(10) NOT NULL,
  `date` date NOT NULL,
  `timeStart` time NOT NULL,
  `timeEnd` time NOT NULL,
  `departmentID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `taskID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `subdepartments`
--

CREATE TABLE `subdepartments` (
  `subDepartmentID` int(10) NOT NULL,
  `subDeptName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `task`
--

CREATE TABLE `task` (
  `taskID` int(10) NOT NULL,
  `reqStaff` varchar(50) NOT NULL,
  `descr` varchar(70) NOT NULL,
  `date` date NOT NULL,
  `departmentID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `task`
--

INSERT INTO `task` (`taskID`, `reqStaff`, `descr`, `date`, `departmentID`) VALUES
(4, '5', 'Zaaien', '2022-01-24', 4),
(5, '5', 'Zaaien', '2022-01-20', 4),
(6, '3', 'Ploegen', '2022-01-24', 2),
(8, '5', 'Zaaien', '2022-01-25', 2),
(9, '5', 'Zaaien', '2022-01-31', 1),
(10, '5', 'Zaaien', '2022-02-01', 1),
(11, '3', 'Ploegen', '2022-02-02', 1),
(12, '5', 'Zaaien', '2022-02-03', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `userclearance`
--

CREATE TABLE `userclearance` (
  `clearanceLvl` int(10) NOT NULL,
  `lvlName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `userclearance`
--

INSERT INTO `userclearance` (`clearanceLvl`, `lvlName`) VALUES
(1, 'werknemer'),
(2, 'planner'),
(3, 'klant'),
(4, 'student');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `workcomp`
--

CREATE TABLE `workcomp` (
  `workCompID` int(10) NOT NULL,
  `workCompName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `workcomp`
--

INSERT INTO `workcomp` (`workCompID`, `workCompName`) VALUES
(1, 'Zaaien'),
(2, 'Wannen'),
(3, 'Dorsen'),
(4, 'Bestuiven'),
(5, 'MS controle'),
(6, 'Selectiewerk'),
(7, 'Sorteren'),
(8, 'Schoffelen'),
(9, 'Dunnen'),
(10, 'Wrijven'),
(11, 'Rooien'),
(12, 'Scannen'),
(13, 'Aftellen'),
(14, 'Werk voorbereiden'),
(15, 'Proeven uitzetten'),
(16, 'Projecten uitvoeren'),
(17, 'IT'),
(18, 'Proeven voorbereiden met klant'),
(19, 'Zelfstandig beslissingen nemen');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`availability`),
  ADD KEY `userID` (`userID`);

--
-- Indexen voor tabel `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`codeID`),
  ADD KEY `userID` (`userID`);

--
-- Indexen voor tabel `comp`
--
ALTER TABLE `comp`
  ADD PRIMARY KEY (`compID`);

--
-- Indexen voor tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexen voor tabel `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `clearanceLvl` (`clearanceLvl`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexen voor tabel `leaverequest`
--
ALTER TABLE `leaverequest`
  ADD PRIMARY KEY (`requestID`),
  ADD KEY `userID` (`userID`);

--
-- Indexen voor tabel `ordercomp`
--
ALTER TABLE `ordercomp`
  ADD KEY `userID` (`userID`),
  ADD KEY `compID` (`compID`);

--
-- Indexen voor tabel `orderworkcomp`
--
ALTER TABLE `orderworkcomp`
  ADD KEY `workCompID` (`workCompID`),
  ADD KEY `userID` (`userID`);

--
-- Indexen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD PRIMARY KEY (`planningID`),
  ADD KEY `taskID` (`taskID`),
  ADD KEY `userID` (`userID`);

--
-- Indexen voor tabel `subdepartments`
--
ALTER TABLE `subdepartments`
  ADD PRIMARY KEY (`subDepartmentID`);

--
-- Indexen voor tabel `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`taskID`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexen voor tabel `userclearance`
--
ALTER TABLE `userclearance`
  ADD PRIMARY KEY (`clearanceLvl`);

--
-- Indexen voor tabel `workcomp`
--
ALTER TABLE `workcomp`
  ADD PRIMARY KEY (`workCompID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `code`
--
ALTER TABLE `code`
  MODIFY `codeID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `comp`
--
ALTER TABLE `comp`
  MODIFY `compID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT voor een tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `employee`
--
ALTER TABLE `employee`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `leaverequest`
--
ALTER TABLE `leaverequest`
  MODIFY `requestID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `planning`
--
ALTER TABLE `planning`
  MODIFY `planningID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `subdepartments`
--
ALTER TABLE `subdepartments`
  MODIFY `subDepartmentID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `task`
--
ALTER TABLE `task`
  MODIFY `taskID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `userclearance`
--
ALTER TABLE `userclearance`
  MODIFY `clearanceLvl` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `workcomp`
--
ALTER TABLE `workcomp`
  MODIFY `workCompID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `employee` (`userID`);

--
-- Beperkingen voor tabel `code`
--
ALTER TABLE `code`
  ADD CONSTRAINT `code_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `employee` (`userID`);

--
-- Beperkingen voor tabel `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`clearanceLvl`) REFERENCES `userclearance` (`clearanceLvl`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);

--
-- Beperkingen voor tabel `leaverequest`
--
ALTER TABLE `leaverequest`
  ADD CONSTRAINT `leaverequest_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `employee` (`userID`);

--
-- Beperkingen voor tabel `ordercomp`
--
ALTER TABLE `ordercomp`
  ADD CONSTRAINT `ordercomp_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `employee` (`userID`),
  ADD CONSTRAINT `ordercomp_ibfk_2` FOREIGN KEY (`compID`) REFERENCES `comp` (`compID`);

--
-- Beperkingen voor tabel `orderworkcomp`
--
ALTER TABLE `orderworkcomp`
  ADD CONSTRAINT `orderworkcomp_ibfk_1` FOREIGN KEY (`workCompID`) REFERENCES `workcomp` (`workCompID`),
  ADD CONSTRAINT `orderworkcomp_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `employee` (`userID`);

--
-- Beperkingen voor tabel `planning`
--
ALTER TABLE `planning`
  ADD CONSTRAINT `planning_ibfk_1` FOREIGN KEY (`taskID`) REFERENCES `task` (`taskID`),
  ADD CONSTRAINT `planning_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `employee` (`userID`);

--
-- Beperkingen voor tabel `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
