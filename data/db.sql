-- phpMyAdmin SQL
-- version 127.0.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2024 a las 17:12:53
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chambeapues`
--

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
    `user_id` INT(11) PRIMARY KEY AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    `apellido` VARCHAR(100),
    `edad` INT,
    `correo` VARCHAR(100) NOT NULL UNIQUE,
    `contrasena` VARCHAR(255) NOT NULL,
    `fecha_registro` TIMESTAMP,
    `estado` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
    `trabajoID` INT PRIMARY KEY AUTO_INCREMENT,
    `foto` VARCHAR(255),
    `titulo` VARCHAR(255) NOT NULL,
    `descripcion` TEXT,
    `fecha_inicio` DATE,
    `fecha_fin` DATE,
    `ubicacion` VARCHAR(100),
    `precio` DECIMAL(10, 2),
    `empleadorID` INT,
    FOREIGN KEY (`empleadorID`) REFERENCES `usuarios`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `tomar_chamba`
--

CREATE TABLE `tomar_chamba` (
    `tomarID` INT PRIMARY KEY AUTO_INCREMENT,
    `trabajoID` INT,
    `usuarioID` INT,
    FOREIGN KEY (`trabajoID`) REFERENCES `trabajos`(`trabajoID`),
    FOREIGN KEY (`usuarioID`) REFERENCES `usuarios`(`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `pqr`
--

CREATE TABLE `pqr` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `tipo` VARCHAR(20) NOT NULL,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `telefono` VARCHAR(20),
    `mensaje` TEXT NOT NULL,
    `fecha_envio` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
    `admid` INT PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(100),
    `correo` VARCHAR(100) NOT NULL UNIQUE,
    `contrasena` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;