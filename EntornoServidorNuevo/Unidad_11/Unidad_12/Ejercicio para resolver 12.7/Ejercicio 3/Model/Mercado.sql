-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-02-2026 a las 00:39:49
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
-- Base de datos: `Mercado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cesta`
--

CREATE TABLE `Cesta` (
  `Cod_Producto` int(11) NOT NULL,
  `ID_cliente` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Cesta`
--

INSERT INTO `Cesta` (`Cod_Producto`, `ID_cliente`, `Cantidad`) VALUES
(7, 4, 2),
(7, 5, 2),
(1, 5, 4),
(7, 2, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Detalle` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID`, `Nombre`, `Imagen`, `Detalle`, `Precio`, `Stock`) VALUES
(1, 'Coco', 'coco.webp', 'coco los gordos', 2.03, 4),
(7, 'Fresa', 'fresa.jpg', 'fresas del tiempo', 1.20, 20),
(8, 'Melon', 'melon.jpg', 'melon grande y rico', 5.53, 15),
(10, 'Naranja', 'naranja.jpg', 'Naranja muy rica en vitamina C', 3.23, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Token`
--

CREATE TABLE `Token` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Peticiones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Token`
--

INSERT INTO `Token` (`ID`, `Nombre`, `Token`, `Peticiones`) VALUES
(2, 'Mendo', 'a7fd648849a2ffc45b78', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE `Usuario` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `Rol` enum('admin','cliente') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`ID`, `Nombre`, `Pass`, `Rol`) VALUES
(1, 'Mendo', 'mendo', 'admin'),
(2, 'Juan', 'juan', 'cliente'),
(3, 'Pedro', 'pedro', 'cliente'),
(4, 'Paco', 'paco', 'cliente'),
(5, 'Manuel', 'manuel', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Cesta`
--
ALTER TABLE `Cesta`
  ADD KEY `Cod_Producto` (`Cod_Producto`),
  ADD KEY `Id_cliente` (`ID_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `Token`
--
ALTER TABLE `Token`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nombre` (`Nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `Token`
--
ALTER TABLE `Token`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Cesta`
--
ALTER TABLE `Cesta`
  ADD CONSTRAINT `Cesta_ibfk_1` FOREIGN KEY (`Cod_Producto`) REFERENCES `productos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Cesta_ibfk_2` FOREIGN KEY (`ID_cliente`) REFERENCES `Usuario` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
