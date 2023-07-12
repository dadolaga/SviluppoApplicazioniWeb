-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Lug 12, 2023 alle 16:25
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

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`Id`, `Title`, `Description`, `Quantity`, `Price`) VALUES
(1, 'Magnetic field gun', 'This would be the description of the product', 35, '245.99'),
(2, 'Brain destroyer gun', 'This would be the description of the product', 47, '368.31'),
(3, 'Syringe gun', 'This would be the description of the product', 64, '156.31'),
(4, 'Portal gun', 'This would be the description of the product', 85, '545.36'),
(5, 'Steampunk ray gun', 'This would be the description of the product', 35, '365.21'),
(6, 'Lava lamp', 'This would be the description of the product', 150, '35.23'),
(7, 'Plasma lamp', 'This would be the description of the product', 157, '23.56'),
(8, 'Plant', 'This would be the description of the product', 36, '58.75'),
(9, 'High heels shoes', 'This would be the description of the product', 48, '124.45'),
(10, 'Slippers', 'This would be the description of the product', 254, '49.99'),
(11, 'Alexey staruduvom - car', 'This would be the description of the product', 15, '56549.99'),
(12, 'Motorcycle', 'This would be the description of the product', 36, '15648.15'),
(13, 'Spaceship', 'This would be the description of the product', 5, '1569599.99'),
(14, 'Tron bike', 'This would be the description of the product', 45, '23687.21'),
(15, 'Warasoodu', 'This would be the description of the product', 236, '56.00'),
(16, 'Aliencado', 'This would be the description of the product', 658, '15.65'),
(17, 'Biscuits with cream', 'This would be the description of the product', 879, '15.48'),
(18, 'Rich aquatics of Mars', 'This would be the description of the product', 485, '74.35'),
(19, 'Iron plate', 'This would be the description of the product', 32, '96.21'),
(20, 'Statue with seated alien', 'This would be the description of the product', 65, '49.85'),
(21, 'Iron sculpture alien', 'This would be the description of the product', 48, '85.68'),
(22, 'Poster', 'This would be the description of the product', 98, '68.48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
