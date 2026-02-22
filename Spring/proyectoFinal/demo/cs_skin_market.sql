-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-02-2026 a las 13:07:21
-- Versión del servidor: 10.11.13-MariaDB-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cs_skin_market`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_item`
--

CREATE TABLE `carrito_item` (
  `id` bigint(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `skin_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_item_seq`
--

CREATE TABLE `carrito_item_seq` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito_item_seq`
--

INSERT INTO `carrito_item_seq` (`next_val`) VALUES
(1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(5, 'Escopeta'),
(3, 'Francotirador'),
(2, 'Pistola'),
(1, 'Rifle'),
(4, 'SMG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skin`
--

CREATE TABLE `skin` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` double NOT NULL,
  `tipo_id` bigint(20) NOT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `imagen_url` varchar(600) DEFAULT NULL,
  `rareza` varchar(255) DEFAULT NULL,
  `owner_id` bigint(20) DEFAULT NULL,
  `categoria_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `skin`
--

INSERT INTO `skin` (`id`, `nombre`, `precio`, `tipo_id`, `usuario_id`, `imagen_url`, `rareza`, `owner_id`, `categoria_id`) VALUES
(9, 'Redline', 18.5, 1, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyLwlcK3wiFO0POlPPNSI_-RHGavzOtyufRkASq2lkxx4W-HnNyqJC3FZwYoC5p0Q7FfthW6wdWxPu-371Pdit5HnyXgznQeHYY5wyA/360fx360f', NULL, NULL, 1),
(10, 'Asiimov', 120, 1, NULL, 'https://community.akamai.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyLwiYbf_jdk7uW-V6V-Kf2cGFidxOp_pewnF3nhxEt0sGnSzN76dH3GOg9xC8FyEORftRe-x9PuYurq71bW3d8UnjK-0H0YSTpMGQ/360fx360f', NULL, NULL, 1),
(11, 'Printstream', 320, 2, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyL8ypexwjFS4_ega6F_H_OGMWrEwL9lj_F7Rienhgk1tjyIpYL8JSLSMxghAsBwQeMN5BHtlIblZuLr4Q3biNkRmH_5iX5Muypj47pWA6EsqPaGkUifZp-rQ1Ym/360fx360f', NULL, NULL, 1),
(12, 'Dragon Lore', 8500, 3, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyLwiYbf_jdk4veqYaF7IfysCnWRxuF4j-B-Xxa_nBovp3Pdwtj9cC_GaAd0DZdwQu9fuhS4kNy0NePntVTbjYpCyyT_3CgY5i9j_a9cBkcCWUKV/360fx360f', NULL, NULL, 3),
(13, 'Asiimov', 95, 3, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyLwlcK3wiFO0POlPPNSIeOaB2qf19F7teVgWiT9x01x623cmd2rcXKQbw4oA8dzReEK5EK6kNO2NOO04FeIjYJCmyr4jzQJsHiu1I77Gg/360fx360f', NULL, NULL, 3),
(14, 'Fade', 600, 4, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyL8ypexwjFS4_ega6F_H_GSMWGRxetJvbVoHjqMmRQguynLm92pci2WagEkC5Z5Q7VetkbukIXjNrnm5QPbjt8WxS-vii4b5i5v4fFCD_TfxF4xWg/330x192?allow_animated=1', NULL, NULL, 2),
(15, 'Blaze', 700, 5, NULL, 'https://community.akamai.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyL1m5fn8Sdk7vORbqhsLfWAMWuZxuZi_uI_TX6wxxkjsGXXnImsJ37COlUoWcByEOMOtxa5kdXmNu3htVPZjN1bjXKpkHLRfQU/360fx360f', NULL, NULL, 2),
(16, 'Mount Fuji', 45, 6, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyL8js_f_CNk4uL3V6J4KvmsHm6eytF6ueZhW2fgkUoh5m7dnt78eC7FPFQgXJByE-AL5Bixld20MO2x51DX2o1NxCyokGoXudOiZ_SY/360fx360f', NULL, NULL, 4),
(17, 'Death by Kitty', 30, 7, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyLhx8bf_jdk7PO6e694LPyAMXfJkdF6ueZhW2fgkUh042jUnN2geSqTaFN2CcQmQuRfsBXtxtfkN7mztASIg91Bniv8kGoXucYQxgOQ/360fx360f', NULL, NULL, 4),
(18, 'Bloomstick', 12, 8, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyL_kYDhwiFO0OG-eq1jJ8-dAXGR_uJ_t-l9AXDrxU4msD_UzN2qIy6Va1chXJJxFu8OtBO5l9fjZLnh4wXd3olBmCzgznQeBg5SBVo/360fx360f', NULL, NULL, 5),
(19, 'Wasteland Princess', 14, 9, NULL, 'https://community.fastly.steamstatic.com/economy/image/i0CoZ81Ui0m-9KwlBY1L_18myuGuq1wfhWSaZgMttyVfPaERSR0Wqmu7LAocGIGz3UqlXOLrxM-vMGmW8VNxu5Dx60noTyLin4Hl-S1d6c2tfZt6MM-AD3CVxeFwtt5kSi26gBBp4jjXw9f9JHOXaAF0WMNwTeEIuhK_k4DlY-uz4gPai4NNnCqsiyIc7TErvbiW3Wbv9Q/330x192?allow_animated=1', NULL, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skinsDisponibles`
--

CREATE TABLE `skinsDisponibles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `skinsDisponibles`
--

INSERT INTO `skinsDisponibles` (`id`, `nombre`, `tipo_id`) VALUES
(1, 'Redline', 1),
(2, 'Fire Serpent', 1),
(3, 'Vulcan', 1),
(4, 'Neon Rider', 1),
(5, 'Hyper Beast', 2),
(6, 'Atomic Alloy', 2),
(7, 'Dragon Lore', 3),
(8, 'Medusa', 3),
(9, 'Printstream', 3),
(10, 'Blaze', 5),
(11, 'Fade', 4),
(12, 'Hot Rod', 6),
(13, 'Death by Kitty', 7),
(14, 'Hyper Beast', 8),
(15, 'The Kraken', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skinsisponibles`
--

CREATE TABLE `skinsisponibles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `skins_disponibles`
--

CREATE TABLE `skins_disponibles` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`, `categoria_id`) VALUES
(1, 'AK-47', 1),
(2, 'M4A1-S', 1),
(3, 'AWP', 3),
(4, 'Glock-18', 2),
(5, 'Desert Eagle', 2),
(6, 'MP9', 4),
(7, 'P90', 4),
(8, 'Nova', 5),
(9, 'Sawed-Off', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `contrasena`, `correo`, `enabled`) VALUES
(1, 'admin', 'admin123', 'admin@example.com', 1),
(2, 'player1', 'pass123', 'player1@example.com', 1),
(3, 'player2', 'pass456', 'player2@example.com', 1),
(52, 'usuario', '$2a$10$6SMkhtlpvEM4v09CdBqZluZ6zx7TqHDuxt5PYwoJX6BXX8QRbbyUW', 'ejemplo@gmail.com', 1),
(102, 'yari', '$2a$10$VF4xc7UD8tk2aSxwuXju6Oko8J/VxK/b.1XtRrTgGq4jWRagx8QIC', 'juan@gmail.com', 1),
(152, 'yari2', '$2a$10$5CoPYXqj0rVqqrZcmMeBS.4g2JzNme.ikKnDFIrs9YbahMQ1Kdv72', 'nevalenov.iarik@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_seq`
--

CREATE TABLE `users_seq` (
  `next_val` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_seq`
--

INSERT INTO `users_seq` (`next_val`) VALUES
(251);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_item`
--
ALTER TABLE `carrito_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK6crpkjd2ol4fs5lq3vik49kcl` (`skin_id`),
  ADD KEY `FK5jyt1e7cwl1dos2qfctpm50r5` (`user_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `skin`
--
ALTER TABLE `skin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_skin_tipo` (`tipo_id`),
  ADD KEY `fk_skin_user` (`usuario_id`),
  ADD KEY `FKpoiw7uddh6qjurg82p8p2s19p` (`owner_id`),
  ADD KEY `FKd3c62wq61wkpbtnx2u7s5nd9t` (`categoria_id`);

--
-- Indices de la tabla `skinsDisponibles`
--
ALTER TABLE `skinsDisponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_id` (`tipo_id`);

--
-- Indices de la tabla `skinsisponibles`
--
ALTER TABLE `skinsisponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK4phnbp1i8uagve7nqxrxqky8c` (`tipo_id`);

--
-- Indices de la tabla `skins_disponibles`
--
ALTER TABLE `skins_disponibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKoqnjht9v6i5pbs81fw6mkose8` (`tipo_id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipo_categoria` (`categoria_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nombre`),
  ADD UNIQUE KEY `email` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `skin`
--
ALTER TABLE `skin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `skinsDisponibles`
--
ALTER TABLE `skinsDisponibles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `skinsisponibles`
--
ALTER TABLE `skinsisponibles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `skins_disponibles`
--
ALTER TABLE `skins_disponibles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_item`
--
ALTER TABLE `carrito_item`
  ADD CONSTRAINT `FK5jyt1e7cwl1dos2qfctpm50r5` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK6crpkjd2ol4fs5lq3vik49kcl` FOREIGN KEY (`skin_id`) REFERENCES `skin` (`id`);

--
-- Filtros para la tabla `skin`
--
ALTER TABLE `skin`
  ADD CONSTRAINT `FKd3c62wq61wkpbtnx2u7s5nd9t` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`),
  ADD CONSTRAINT `FKpoiw7uddh6qjurg82p8p2s19p` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_skin_tipo` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_skin_user` FOREIGN KEY (`usuario_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `skinsDisponibles`
--
ALTER TABLE `skinsDisponibles`
  ADD CONSTRAINT `skinsDisponibles_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);

--
-- Filtros para la tabla `skinsisponibles`
--
ALTER TABLE `skinsisponibles`
  ADD CONSTRAINT `FK4phnbp1i8uagve7nqxrxqky8c` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);

--
-- Filtros para la tabla `skins_disponibles`
--
ALTER TABLE `skins_disponibles`
  ADD CONSTRAINT `FKoqnjht9v6i5pbs81fw6mkose8` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`);

--
-- Filtros para la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD CONSTRAINT `fk_tipo_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
