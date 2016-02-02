-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-01-2013 a las 15:50:27
-- Versión del servidor: 5.1.58
-- Versión de PHP: 5.3.6-13ubuntu3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `musica`
--
CREATE DATABASE `musica` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `musica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `idartista` int(11) DEFAULT NULL,
  `idcancion` int(11) DEFAULT NULL,
  PRIMARY KEY (`usuario`),
  KEY `idartista` (`idartista`),
  KEY `idcancion` (`idcancion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`usuario`, `clave`, `idartista`, `idcancion`) VALUES
('a', '0cc175b9c0f1b6a831c399e269772661', 1, NULL),
('admin', '21232f297a57a5a743894a0e4a801fc3', NULL, NULL),
('b', '92eb5ffee6ae2fec3ad71c777531578f', 2, NULL),
('c', '4a8a08f09d37b73795649038408b5f33', 3, NULL),
('d', '8277e0910d750195b448797616e091ad', 4, NULL),
('m', '6f8f57715090da2632453988d9a1501b', NULL, 1),
('n', '7b8b965ad4bca0e41ab51de7b31363a1', NULL, 2),
('o', 'd95679752134a2d9eb61dbd7b91c4bcc', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `idalbum` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idartista` int(11) NOT NULL,
  PRIMARY KEY (`idalbum`),
  KEY `idartista` (`idartista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`idalbum`, `nombre`, `idartista`) VALUES
(1, 'Mylo Xyloto', 1),
(2, 'Viva la Vida', 1),
(4, 'Live On Ten Legs ', 2),
(5, 'Ten ', 2),
(6, 'No Line On The Horizon', 4),
(7, 'Boy', 4),
(8, 'October', 4),
(9, 'zzzzz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `idartista` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idartista`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`idartista`, `nombre`) VALUES
(1, 'Coldplay'),
(2, 'Pearl Jam'),
(3, 'U2'),
(4, 'Radiohead');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE IF NOT EXISTS `cancion` (
  `idcancion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idalbum` int(11) NOT NULL,
  `reproducciones` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcancion`),
  KEY `idalbum` (`idalbum`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`idcancion`, `nombre`, `idalbum`, `reproducciones`) VALUES
(1, 'Hurts Like Heaven', 1, 3),
(2, 'Paradise', 1, 1),
(3, 'Major Minus', 1, 2),
(4, 'Life In Technicolor', 2, 0),
(5, 'Cemeteries Of London', 2, 0),
(6, 'Lovers In Japan', 2, 0),
(8, 'Arms Aloft', 4, 0),
(9, 'World Wide Suicide', 4, 0),
(10, 'Once', 5, 0),
(11, 'Jeremy', 5, 0),
(12, 'Magnificent', 6, 0),
(13, 'Get On Your Boots', 6, 0),
(14, 'Twilight', 7, 0),
(15, 'Tomorrow', 8, 0),
(16, 'Stranger In a Strange Land', 8, 0),
(17, 'xxaxaxaxaxa', 1, 2),
(18, 'mmmmmmm', 1, 1),
(19, 'zazaza', 4, 0),
(20, 'zazazazaz', 1, 4),
(21, 'sasasasas', 9, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `acceso_ibfk_1` FOREIGN KEY (`idartista`) REFERENCES `artista` (`idartista`),
  ADD CONSTRAINT `acceso_ibfk_2` FOREIGN KEY (`idcancion`) REFERENCES `cancion` (`idcancion`);

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`idartista`) REFERENCES `artista` (`idartista`);

--
-- Filtros para la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD CONSTRAINT `cancion_ibfk_1` FOREIGN KEY (`idalbum`) REFERENCES `album` (`idalbum`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
