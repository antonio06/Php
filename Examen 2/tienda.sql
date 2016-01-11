-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2015 a las 11:39:14
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tienda`
--
CREATE DATABASE IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf32 COLLATE utf32_spanish2_ci;
USE `tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `nombre` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `descripcion` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `precio` int(11) NOT NULL,
  `imagenes` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`nombre`, `descripcion`, `precio`, `imagenes`, `codigo`) VALUES
('Huawei P8 Lite', 'Huawei P8 Lite negro', 182, 'imagenes/huawei.png', 1),
('Ipad Air 2', 'Ipad Air 2 en color blanco plata', 489, 'imagenes/ipad.png', 2),
('Iphone 6s', 'Iphone 6s en color blanco plata', 749, 'imagenes/iphone.png', 3),
('Sansung Galaxi S6', 'Sansung Galaxi S6 color negro', 600, 'imagenes/sansung.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioscontrasena`
--

CREATE TABLE IF NOT EXISTS `usuarioscontrasena` (
  `usuario` varchar(50) COLLATE utf32_spanish2_ci NOT NULL,
  `contrasena` int(11) NOT NULL,
  PRIMARY KEY (`contrasena`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarioscontrasena`
--

INSERT INTO `usuarioscontrasena` (`usuario`, `contrasena`) VALUES
('admin', 123456);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
