-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 16-09-2020 a las 16:37:17
-- Versión del servidor: 10.5.5-MariaDB-1:10.5.5+maria~focal
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `database`
--

-- --------------------------------------------------------

--
-- `autoa` tabla sortzeko komandoak
--
CREATE TABLE AUTOA
	(Marka VARCHAR(30),
	Prezioa INT,
	Matrikula VARCHAR(30) NOT NULL,
	KarburanteMota VARCHAR(30),
	Modeloa VARCHAR(30),
	PRIMARY KEY (Matrikula)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- `erabiltzailea` tabla sortzeko komandoak
--
CREATE TABLE ERABILTZAILEA
	(IzenAbizenak VARCHAR(30),
	NAN VARCHAR(30) NOT NULL,
	Gakoa VARCHAR(30),
	Telefonoa INT,
	JaiotzeData VARCHAR(10),
	Email VARCHAR(50),
	PRIMARY KEY (NAN)) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- auto batzuk sarzeko datu basean
--
INSERT INTO AUTOA VALUES ('Citroen', 20, '1234 ABC', 'Gasolina', 'C4 cactus');
INSERT INTO AUTOA VALUES('Citroen', 25, '5678 DEF', 'Gasolina', 'Jumper furgon');
INSERT INTO AUTOA VALUES('Cupra', 17, '9876 GHI', 'Diesel', 'Cupra Ateca');
INSERT INTO AUTOA VALUES('Audi', 23, '5432 JKL', 'Diesel', 'Audi A4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

