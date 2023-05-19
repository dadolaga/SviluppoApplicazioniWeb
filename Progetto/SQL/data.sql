-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 19, 2023 alle 15:52
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

--
-- Svuota la tabella prima dell'inserimento `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`Id`, `Name`) VALUES
(6, 'Art'),
(3, 'Fashion'),
(5, 'Food'),
(2, 'House tools'),
(1, 'Technology'),
(4, 'Vehicle');

--
-- Svuota la tabella prima dell'inserimento `product`
--

TRUNCATE TABLE `product`;
--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`Id`, `Title`, `Description`, `Quantity`, `Price`, `Category`) VALUES
(1, 'Magnetic field gun', NULL, 35, '245.99', 1),
(2, 'Brain destroyer gun', NULL, 47, '368.31', 1),
(3, 'Syringe gun', NULL, 64, '156.31', 1),
(4, 'Portal gun', NULL, 85, '545.36', 1),
(5, 'Steampunk ray gun', NULL, 35, '365.21', 1),
(6, 'Lava lamp', NULL, 150, '35.23', 2),
(7, 'Plasma lamp', NULL, 157, '23.56', 2),
(8, 'Plant', NULL, 36, '58.75', 2),
(9, 'High heels shoes', NULL, 48, '124.45', 3),
(10, 'Slippers', NULL, 254, '49.99', 3),
(11, 'Alexey staruduvom - car', NULL, 15, '56549.99', 4),
(12, 'Motorcycle', NULL, 36, '15648.15', 4),
(13, 'Spaceship', NULL, 5, '1569599.99', 4),
(14, 'Tron bike', NULL, 45, '23687.21', 4),
(15, 'Warasoodu', NULL, 236, '56.00', 5),
(16, 'Aliencado', NULL, 658, '15.65', 5),
(17, 'Biscuits with cream', NULL, 879, '15.48', 5),
(18, 'Rich aquatics of Mars', NULL, 485, '74.35', 5),
(19, 'Iron plate', NULL, 32, '96.21', 6),
(20, 'Statue with seated alien', NULL, 65, '49.85', 6),
(21, 'Iron sculpture alien', NULL, 48, '85.68', 6),
(22, 'Poster', NULL, 98, '68.48', 6);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
