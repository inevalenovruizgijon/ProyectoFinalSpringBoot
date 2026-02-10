-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-01-2026 a las 17:12:30
-- Versión del servidor: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumno`
--

CREATE TABLE `Alumno` (
  `Matricula` varchar(6) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Alumno`
--

INSERT INTO `Alumno` (`Matricula`, `Nombre`, `Apellido`, `Curso`) VALUES
('1', 'Miguel Angel', 'Brenes Orozco', '2º DAW'),
('2', 'Manuel', 'Coronilla Maya', '2º DAW'),
('3', 'Juan', 'Nieto Perez', '2º DAW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Alumno_Asignatura`
--

CREATE TABLE `Alumno_Asignatura` (
  `Codigo` int(11) NOT NULL,
  `Matricula` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Alumno_Asignatura`
--

INSERT INTO `Alumno_Asignatura` (`Codigo`, `Matricula`) VALUES
(1, '1'),
(4, '1'),
(5, '1'),
(4, '2'),
(1, '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignatura`
--

CREATE TABLE `Asignatura` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Asignatura`
--

INSERT INTO `Asignatura` (`Codigo`, `Nombre`) VALUES
(1, 'Entorno Cliente'),
(4, 'Entorno Servidor'),
(5, 'Diseño Web');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Alumno`
--
ALTER TABLE `Alumno`
  ADD PRIMARY KEY (`Matricula`);

--
-- Indices de la tabla `Alumno_Asignatura`
--
ALTER TABLE `Alumno_Asignatura`
  ADD KEY `Codigo` (`Codigo`),
  ADD KEY `Matricula` (`Matricula`);

--
-- Indices de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  ADD PRIMARY KEY (`Codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Asignatura`
--
ALTER TABLE `Asignatura`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Alumno_Asignatura`
--
ALTER TABLE `Alumno_Asignatura`
  ADD CONSTRAINT `Codigo` FOREIGN KEY (`Codigo`) REFERENCES `Asignatura` (`Codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Matricula` FOREIGN KEY (`Matricula`) REFERENCES `Alumno` (`Matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
