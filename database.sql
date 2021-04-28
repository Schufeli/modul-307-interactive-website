-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 27. Apr 2021 um 16:05
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hippibank`
--
CREATE DATABASE IF NOT EXISTS hippibank;
-- --------------------------------------------------------
USE hippibank;
--
-- Tabellenstruktur für Tabelle `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `start` DATE NOT NULL,
  `finish` DATE NOT NULL,
  `completed` tinyint DEFAULT 0,
  `fk_risklevelId` int(11) NOT NULL,
  `fk_mortgageId` int(11) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `mortgages`
--

CREATE TABLE `mortgages` (
  `id` int(11) NOT NULL,
  `package` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `mortgages`
--

INSERT INTO `mortgages` (`id`, `package`) VALUES
(20, 'Hypo-Paket: Fest 2  (0,54 %)'),
(21, 'Hypo-Paket: Fest 3  (0,54 %)'),
(22, 'Hypo-Paket: Fest 4  (0,59 %)'),
(23, 'Hypo-Paket: Fest 5  (0,62 %)'),
(24, 'Hypo-Paket: Fest 6  (0,75 %)'),
(25, 'Hypo-Paket: Fest 7  (0,80 %)'),
(26, 'Hypo-Paket: Fest 8  (0,83 %)'),
(27, 'Hypo-Paket: Fest 9  (0,86 %)'),
(28, 'Hypo-Paket: Fest 10  (0,91 %)'),
(29, 'Hypo-Paket: Fest 11  (0,96 %)'),
(30, 'Hypo-Paket: Fest 12  (1,02 %)'),
(31, 'Hypo-Paket: Fest 13  (1,48 %)'),
(32, 'Hypo-Paket: Fest 14  (1,54 %)'),
(33, 'Hypo-Paket: Fest 15  (1,40 %)'),
(34, 'Hypo-Paket: LIBOR 1M (0,72 %)'),
(35, 'Hypo-Paket: LIBOR 3M (0,65 %)'),
(36, 'Hypo-Paket: LIBOR 6M (0,65 %)'),
(37, 'Hypo-Paket: LIBOR 12M (0,71 %)'),
(38, 'Hypo-Paket: Variabel (2,25 %)');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `risklevels`
--

CREATE TABLE `risklevels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `risklevels`
--

INSERT INTO `risklevels` (`id`, `name`, `duration`) VALUES
(1, 'sehr tief', 840),
(2, 'tief', 660),
(3, 'normal', 480),
(4, 'hoch', 360),
(5, 'sehr hoch', 240);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mortgage` (`fk_mortgageId`),
  ADD KEY `fk_risklevel` (`fk_risklevelId`);

--
-- Indizes für die Tabelle `mortgages`
--
ALTER TABLE `mortgages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `risklevels`
--
ALTER TABLE `risklevels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `mortgages`
--
ALTER TABLE `mortgages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT für Tabelle `risklevels`
--
ALTER TABLE `risklevels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_mortgage` FOREIGN KEY (`fk_mortgageId`) REFERENCES `mortgages` (`id`),
  ADD CONSTRAINT `fk_risklevel` FOREIGN KEY (`fk_risklevelId`) REFERENCES `risklevels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
