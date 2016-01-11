-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2015 a las 11:38:59
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestisimal`
--
CREATE DATABASE IF NOT EXISTS `gestisimal` DEFAULT CHARACTER SET utf32 COLLATE utf32_spanish2_ci;
USE `gestisimal`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `precioCompra` int(11) NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `categoria` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `descripcion`, `precioCompra`, `precioVenta`, `categoria`, `stock`) VALUES
(1, 'Iphone 6s en color blanco plata;;', 749, 680, 'movil', 10),
(2, 'Ipad Air 2 en color blanco plata;', 420, 380, 'tablet', 5),
(3, 'Sansung Galaxy S6 color Negro', 420, 320, 'movil', 7),
(4, 'Leotec L-Pad Supernova S16', 100, 90, 'tablet', 3),
(5, 'Asus X553MA Intel Celeron N2840', 300, 260, 'portatil', 4),
(6, 'HP 15-R249NS Intel Core i3-4005U', 380, 320, 'portatil', 7),
(7, 'PcCom Basic Office i3-4170', 345, 320, 'sobremesa', 0),
(8, 'PcCom Basic Enterprise i5-4460', 395, 370, 'sobremesa', 1),
(9, 'Disco Duro SSD', 50, 45, 'disco duro', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioscontrasena`
--

CREATE TABLE IF NOT EXISTS `usuarioscontrasena` (
  `usuario` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `contrasena` int(11) NOT NULL,
  `permiso` int(11) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarioscontrasena`
--

INSERT INTO `usuarioscontrasena` (`usuario`, `contrasena`, `permiso`) VALUES
('admin', 12345, 2),
('olga', 456, 1),
('pepe', 123, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
