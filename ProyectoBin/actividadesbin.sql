-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2016 a las 22:41:54
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actividadesbin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `codigo_actividad` int(50) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` set('En proyecto','Abierto plazo de solicitud','Finalizado plazo de solicitud','Actividades en desarrollo','Terminadas') COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'En proyecto',
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
  `observaciones` varchar(500) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`codigo_actividad`, `titulo`, `estado`, `coordinador`, `ponente`, `ubicacion`, `fecha_inicio`, `fecha_fin`, `horario_inicio`, `horario_fin`, `n_Total_Horas`, `precio`, `IVA`, `descriptor`, `observaciones`) VALUES
(1, 'Alimentación personas mayores', 'En proyecto', 'Alejandro Molina', 'Antonio Mendoza', 'C/Random nº8', '2016-02-21', '2016-02-23', '13:45:00', '14:30:00', 1, 7, 'Si', 'Padres', 'sfasfasfdasfsdfs'),
(4, 'Nuevas formas de educación', 'Abierto plazo de solicitud', 'Álvaro Fernandez ', 'Jose Montiel', 'C/Salitre', '2016-03-16', '2016-03-18', '13:30:00', '14:30:00', 1, 5, 'Si', 'Profesores de primaria', 'La actividad tiene plazo abierto'),
(5, 'Curso de cocina Infantil', 'Abierto plazo de solicitud', 'Manuel ', 'Isabel', 'C/ Ayala nº 21', '2016-03-10', '2016-03-10', '10:00:00', '14:00:00', 4, 5, 'Si', 'Primaria', 'Cocina para los más pequeños de la casa'),
(6, 'Clases de matemáticas', 'En proyecto', 'Juan Martinez', 'Manuel Sanchez', 'C/Los Majarones', '2016-03-21', '2016-03-23', '13:00:00', '14:00:00', 1, 5, 'Si', 'Primaria', 'Clases de matemáticas para niños'),
(7, 'Clases de lengua', 'Abierto plazo de solicitud', 'Sergio Banderas', 'Luis Sanchez', 'C/ Ayala nº 21', '2016-03-30', '2016-03-31', '10:00:00', '14:00:00', 4, 6, 'Si', 'Infantil', 'Clases de lengua para niños'),
(8, 'Curso Comida para embarazadas', 'En proyecto', 'Edurne', 'Pedro', 'C/Los Majarones', '2016-04-01', '2016-04-03', '13:00:00', '14:30:00', 1, 3, 'Si', 'Madres', 'Curso de cocina indicada para mujeres embarazadas'),
(9, 'Curso contra el maltrato escolar', 'Abierto plazo de solicitud', 'Miguel Angel', 'David', 'C/Random 7', '2016-03-30', '2016-03-31', '09:00:00', '11:00:00', 2, 3, 'No', 'Profesores de secundaria', 'Curso para profesores para prevenir el maltrato entre los jóvenes'),
(10, 'Cursos para maquillaje saludable', 'Finalizado plazo de solicitud', 'Eva', 'Pedro', 'C/Random 10', '2016-04-05', '2016-03-06', '09:00:00', '11:00:00', 2, 3, 'No', 'Madres', 'Curso de maquillaje con productos naturales y sin perjuicios para la piel '),
(11, 'Curso Reciclaje', 'En proyecto', 'Juan y Medio', 'Eva Sanchez', 'C/Los Sevillanos', '2016-03-11', '2016-03-13', '07:00:00', '13:00:00', 6, 3, 'No', 'Madres', 'Cursos para aprender a reciclar en casa'),
(12, 'Curso Móviles ', 'Abierto plazo de solicitud', 'Eva H', 'Manuel Orta', 'Antonio', '2016-03-11', '2016-03-12', '13:00:00', '15:00:00', 2, 5, 'No', 'Primaria', 'Curso de móviles para niños '),
(13, 'Internet para padres ', 'Actividades en desarrollo', 'Conchi Román', 'María Victoria Contreras', 'C/Random 9', '2016-04-15', '2016-04-16', '09:30:00', '11:30:00', 2, 3, 'No', 'Padres', 'Curso de internet para padres nivel principiante '),
(14, 'Costura para pequeños', 'Abierto plazo de solicitud', 'Leticia', 'Pablo', 'C/Random 4', '2016-03-11', '2016-03-13', '12:00:00', '14:00:00', 2, 2, 'Si', 'Infantil', 'Costura para pequeños'),
(15, 'Practicas Para Embarazos', 'En proyecto', 'Susana', 'Luis', 'C/Salitre', '2016-03-31', '2016-04-02', '13:00:00', '14:00:00', 1, 5, 'No', 'Padres', 'Practicas para madres embarazadas'),
(21, 'adsad', 'Finalizado plazo de solicitud', '', '', '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, 'Si', 'Profesores de primaria', ''),
(22, 'sasdfs', 'En proyecto', '', '', '', '0000-00-00', '0000-00-00', '00:00:00', '00:00:00', 0, 0, 'No', 'Padres', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--

CREATE TABLE `participa` (
  `codigo_persona` int(15) NOT NULL,
  `codigo_actividad` int(15) NOT NULL,
  `codigo_perfil` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `participa`
--

INSERT INTO `participa` (`codigo_persona`, `codigo_actividad`, `codigo_perfil`) VALUES
(21, 1, 1),
(24, 9, 3),
(24, 13, 3),
(29, 1, 4),
(29, 4, 4),
(36, 1, 4),
(36, 4, 4),
(36, 7, 4),
(36, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `codigo` int(15) NOT NULL,
  `descripcion` set('socio','ponente','monitor','participante','colaborador') COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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

CREATE TABLE `persona` (
  `codigo` int(50) NOT NULL,
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
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil_usuario` set('Administrador','Limitado','Usuario') COLLATE utf8_spanish2_ci NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`codigo`, `DNI`, `nombre`, `apellido1`, `apellido2`, `perfil`, `foto`, `sexo`, `fecha_nac`, `direccion`, `municipio`, `provincia`, `pais`, `fecha_alta`, `fecha_baja`, `n_Seguridad_Social`, `n_Cuenta_Bancaria`, `email`, `password`, `perfil_usuario`, `observaciones`) VALUES
(21, '44444-LR', 'María Victoria', 'Contreras', 'Martín', 2, 'Koala.jpg', 'mujer', '2016-03-13', 'C/Random 1', 'Granada', 'Granada', 'España', '2016-03-13', '2016-03-15', '44444-6', '147238-O', 'mariavictoria@gmail.com', '$2y$10$mU6YIm4KBZQL4WccNiRm1OBFdMQaGkaWxtqafh70Iw7AKmtytckOq', 'Limitado', 'Una persona llamada María Victoria'),
(24, '77777-P', 'Concepción', 'Román', 'Losada', 1, 'Chrysanthemum.jpg', 'mujer', '1946-02-14', 'C/Random 7', 'Málaga', 'Málaga', 'España', '2016-03-13', '2016-03-30', '777777-P', '1428236-D', 'conchi@gmail.com', '$2y$10$EXZEJQlxFsxrKc9AeAoAJOKboE0E4erXU88zz2UXNL0i0fnaJb4g.', 'Administrador', 'Una persona llamada Concepción'),
(26, '9999-W', 'Alejandro', 'Sanchez', 'Nuñez', 3, '', 'hombre', '2016-03-16', 'C/Random 4', 'Málaga', 'Málaga', 'España', '2016-03-14', '2016-03-16', '9999-W', '147235-V', 'alejandro@gmail.com', '$2y$10$ktwrYDGtmAlg0kgjN5wDqeO7EPCs1sBVtODAhz2t1f/K8sKGTWdQG', 'Usuario', 'Usuario Alejandro'),
(27, '22222-J', 'Luis', 'Sanchez', 'Castejón', 2, 'Hydrangeas.jpg', 'hombre', '2016-03-21', 'C/Salmonete 4', 'Málaga', 'Málaga', 'España', '2016-03-14', '2016-03-15', '22222.J', '147529-O', 'luis@gmail.com', '$2y$10$dptckPed2UX/jUZoFa4iMefd418yIXs78iB4Sjb14EE2W0QlIqgnG', 'Usuario', 'Usuario Luis'),
(28, '88888-A', 'Juan', 'Fernandez', 'Ruiz', 2, '1.jpg', 'hombre', '2016-03-14', 'C/Aprobado', 'Málaga', 'Málaga', 'España', '2016-03-14', '2016-03-15', '888888-A', '427639-P', 'juan@gmail.com', '$2y$10$hnK9tunhGtH4u2sHkc2woO3epw7/O7JqQZX4tLYdDOKB3zdsaEqEu', 'Limitado', 'Una persona llamada Juan'),
(29, '2222-PÑ', 'Luisa', 'Gutierrez', 'Franco', 5, 'Jellyfish.jpg', 'mujer', '2016-03-07', 'C/Salmonete 3', 'Málaga', 'Málaga', 'España', '2016-03-08', '2016-03-14', '2222-P', '235871-LO', 'luisa@gmail.com', '$2y$10$BunTXNpnKJNuuYhHd59OIOY6gOw7hCgVHohqwNY8Oc1kpt2yFWwPq', 'Usuario', 'Una persona llamada Luisa'),
(30, '5555-Ñ', 'Carmela', 'Contreras', 'Frias', 3, 'Tulips.jpg', 'mujer', '2016-03-01', 'C/Aprobado 9', 'Málaga', 'Málaga', 'España', '2016-03-14', '2016-03-20', '8888-Ñ', '748639-P', 'carmela@gmail.com', '$2y$10$sJKbmZEclPBHQ/G.Go6na.v7pLBjRlwGf3nHr.SqaY.h0nny3/MyC', 'Usuario', 'Una persona llamada Carmela'),
(31, '9999-L', 'María', 'Nuñez', 'Lopez', 4, 'Jellyfish.jpg', 'mujer', '2016-03-14', 'C/Aprobado 4', 'Málaga', 'Málaga', 'España', '2016-03-14', '2016-03-15', '9999-L', '15839-O', 'maria@gmail.com', '$2y$10$reUM9RUe2esJ6JubzYJgvOzbCUDvw3xspBrkpSwRBsB9Y6gjwWxGS', 'Limitado', 'Una persona llamada María'),
(32, '77777-I', 'Iñaki', 'Gurruchaga', 'Ñoñez', 1, 'Lighthouse.jpg', 'mujer', '2016-02-15', 'C/Random 11', 'Málaga', 'Málaga', 'España', '2016-03-15', '2016-03-18', '77777-I', '48239-k', 'inaki@gmail.com', '$2y$10$3Bxdq29SFnYrzOeopal0/uhRTw7IEw/0246paREEsJ0Dc8AuZ6/gq', 'Usuario', 'Una persona llamada Iñaki'),
(34, '44444-T', 'Marta', 'Contreras', 'Ruíz', 2, 'Tulips.jpg', 'mujer', '2016-01-18', 'C/Aprobado 14', 'Málaga', 'Málaga', 'España', '2016-03-08', '2016-03-31', '44444-T', '992571-T', 'marta@gmail.com', '$2y$10$bVAYmU/JsIzaPjVgUCcJC.n2Rpge.B4TND9cTsTc3TMn9ivYSaGrG', 'Usuario', 'Una persona llamada Marta'),
(36, '44444-TPX', 'Antonio', 'Contreras', 'Román', 1, 'Tulips.jpg', 'hombre', '2016-03-14', 'C/Random 1', 'Málaga', 'Málaga', 'España', '2016-03-31', '2016-04-03', '888888-Ao', '38475-Itx', 'antonio@gmail.com', '$2y$10$3IWXW0gZdy1GmX.Vs6WUu.iWp1.mt3uQJ/Abq5Rk2aQd0sDT6xumi', 'Administrador', 'Una persona llamada Antonio'),
(37, '33333-LO', 'Pablo', 'Iglesias', 'Turrion', 1, 'Tulips.jpg', 'hombre', '2016-03-31', 'C/Aprobado 18', 'Málaga', 'Málaga', 'España', '2016-04-01', '2016-04-03', '37418-I', '64172-ÑU', 'pablo@gmail.com', '$2y$10$mV/cddRMHSOeH2fasV.tC.ycbCsBy3LPQCXhkiG9FPzH5Gw9lKHha', 'Administrador', 'Una persona llamada Pablo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`codigo_actividad`);

--
-- Indices de la tabla `participa`
--
ALTER TABLE `participa`
  ADD PRIMARY KEY (`codigo_persona`,`codigo_actividad`,`codigo_perfil`),
  ADD KEY `codigo_actividad` (`codigo_actividad`),
  ADD KEY `codigo_perfil` (`codigo_perfil`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `perfil` (`perfil`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `codigo_actividad` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `codigo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `participa`
--
ALTER TABLE `participa`
  ADD CONSTRAINT `participa_ibfk_1` FOREIGN KEY (`codigo_actividad`) REFERENCES `actividad` (`codigo_actividad`) ON UPDATE CASCADE,
  ADD CONSTRAINT `participa_ibfk_2` FOREIGN KEY (`codigo_perfil`) REFERENCES `perfil` (`codigo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `participa_ibfk_3` FOREIGN KEY (`codigo_persona`) REFERENCES `persona` (`codigo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`codigo`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
