-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Dic 03, 2022 alle 14:59
-- Versione del server: 10.4.27-MariaDB
-- Versione PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s4803351`
--
CREATE DATABASE IF NOT EXISTS `s4803351` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `s4803351`;

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--
-- Creazione: Nov 28, 2022 alle 09:39
--

CREATE TABLE `carrello` (
  `UtenteId` int(11) NOT NULL,
  `ProdottoId` int(11) NOT NULL,
  `Quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--
-- Creazione: Nov 28, 2022 alle 09:38
--

CREATE TABLE `prodotti` (
  `Id` int(11) NOT NULL,
  `Titolo` varchar(200) NOT NULL,
  `Descrizione` text DEFAULT NULL,
  `Quantita` int(11) NOT NULL,
  `Prezzo` decimal(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `recensioni`
--
-- Creazione: Nov 28, 2022 alle 09:42
--

CREATE TABLE `recensioni` (
  `Id` int(11) NOT NULL,
  `UtenteId` int(11) NOT NULL,
  `ProdottoId` int(11) NOT NULL,
  `Recensione` text DEFAULT NULL,
  `Valutazione` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `Verifica` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--
-- Creazione: Nov 28, 2022 alle 09:43
--

CREATE TABLE `utenti` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Email` varchar(319) NOT NULL,
  `Username` varchar(250) DEFAULT NULL,
  `Password` varchar(72) NOT NULL,
  `HashPass` varchar(100) NOT NULL,
  `Residenza` varchar(50) DEFAULT NULL,
  `DataNascita` date DEFAULT NULL,
  `SocialWeb` text DEFAULT NULL,
  `Social` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`UtenteId`,`ProdottoId`),
  ADD KEY `Index_utente` (`UtenteId`),
  ADD KEY `Index_prodotto` (`ProdottoId`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Unique_Titolo` (`Titolo`);

--
-- Indici per le tabelle `recensioni`
--
ALTER TABLE `recensioni`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Index_utente` (`UtenteId`),
  ADD KEY `Index_prodotto` (`ProdottoId`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Unique_Email` (`Email`),
  ADD UNIQUE KEY `Unique_Username` (`Username`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`ProdottoId`) REFERENCES `prodotti` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`UtenteId`) REFERENCES `utenti` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `recensioni`
--
ALTER TABLE `recensioni`
  ADD CONSTRAINT `recensioni_ibfk_1` FOREIGN KEY (`ProdottoId`) REFERENCES `prodotti` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recensioni_ibfk_2` FOREIGN KEY (`UtenteId`) REFERENCES `utenti` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
