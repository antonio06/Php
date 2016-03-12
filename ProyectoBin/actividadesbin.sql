-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-02-2016 a las 17:07:37
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `actividadesbin`
--
CREATE DATABASE IF NOT EXISTS `actividadesbin` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `actividadesbin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `codigo_actividad` int(50) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` set('En proyecto','Abierto plazo de solicitud','Finalizado plazo de solicitud','Actividades en desarrollo','Terminadas') COLLATE utf8_spanish2_ci NOT NULL,
  `coordinador` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ponente` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `horario_inicio` time NOT NULL,
  `horario_fin` time NOT NULL,
  `n_Total_Horas` int(50) NOT NULL,
  `precio` int(50) NOT NULL,
  `IVA` set('Si','No') COLLATE utf8_spanish2_ci NOT NULL,
  `descriptor` set('Infantil','Primaria','Profesores de primaria','Profesores de secundaria','Padres','Madres') COLLATE utf8_spanish2_ci NOT NULL,
  `observaciones` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo_actividad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`codigo_actividad`, `titulo`, `estado`, `coordinador`, `ponente`, `ubicacion`, `fecha_inicio`, `fecha_fin`, `horario_inicio`, `horario_fin`, `n_Total_Horas`, `precio`, `IVA`, `descriptor`, `observaciones`) VALUES
(1, 'Alimentación personas mayores', 'En proyecto', 'Alejandro Molina', 'Antonio Mendoza', 'C/Random nº7', '2016-02-21', '2016-02-23', '13:45:00', '14:30:00', 1, 7, 'Si', 'Padres', 'sfasfasfdasfsdfs');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--

CREATE TABLE IF NOT EXISTS `participa` (
  `codigo_persona` int(15) NOT NULL,
  `codigo_actividad` int(15) NOT NULL,
  `codigo_perfil` int(15) NOT NULL,
  PRIMARY KEY (`codigo_persona`,`codigo_actividad`,`codigo_perfil`),
  KEY `codigo_actividad` (`codigo_actividad`),
  KEY `codigo_perfil` (`codigo_perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `codigo` int(15) NOT NULL AUTO_INCREMENT,
  `descripcion` set('socio','ponente','monitor','participante','colaborador') COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`codigo`, `descripcion`) VALUES
(1, 'socio'),
(2, 'ponente'),
(3, 'monitor'),
(4, 'participante'),
(5, 'colaborador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `codigo` int(50) NOT NULL AUTO_INCREMENT,
  `DNI` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` int(15) NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` set('hombre','mujer') COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `provincia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_baja` date NOT NULL,
  `n_Seguridad_Social` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `n_Cuenta_Bancaria` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `perfil` (`perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participa`
--
ALTER TABLE `participa`
  ADD CONSTRAINT `participa_ibfk_1` FOREIGN KEY (`codigo_actividad`) REFERENCES `actividad` (`codigo_actividad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `participa_ibfk_2` FOREIGN KEY (`codigo_perfil`) REFERENCES `perfil` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `participa_ibfk_3` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
