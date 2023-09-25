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
-- Estructura de tabla para la tabla `usuarios`
--
CREATE TABLE AUTOA
 	(Marka VARCHAR(30),
 	Prezioa INT,
 	Matrikula VARCHAR(30) NOT NULL,
 	KarburanteMota VARCHAR(30),
 	Modeloa VARCHAR(30),
 	PRIMARY KEY (Matrikula));
 
 
CREATE TABLE ERABILTZAILEA
 	(IzenAbizenak VARCHAR(30),
 	NAN VARCHAR(30) NOT NULL,
 	Telefonoa INT,
 	JaiotzeData DATE,
 	Email VARCHAR(50),
 	PRIMARY KEY (NAN));
 
INSERT INTO AUTOA VALUES(“Citroen”, 20, 1234 ABC, “Gasolina”, “C4 cactus”);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
