-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 06:39:09
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_pemex`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulos`
--

CREATE TABLE `tbl_articulos` (
  `idGasolina` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombreGasolina` varchar(50) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `octanaje` varchar(50) NOT NULL,
  `nivelEtanol` varchar(50) NOT NULL,
  `nivelAzufre` varchar(50) NOT NULL,
  `tipoAditivos` varchar(50) NOT NULL,
  `existencia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tbl_articulos`
--

INSERT INTO `tbl_articulos` (`idGasolina`, `codigo`, `nombreGasolina`, `precio`, `octanaje`, `nivelEtanol`, `nivelAzufre`, `tipoAditivos`, `existencia`) VALUES
(1, '1', 'Magna', 18.00, '87 OCTANOS', 'E10', '25PP', 'ADITEC', 30000.00),
(2, '2', 'Premium', 20.00, '92 OCTANOS', 'E10', '25PP', 'ADITEC', 30000.00),
(3, '3', 'Diesel', 22.00, '0 OCTANOS', 'E10', '25PP', 'ADITEC', 30000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_articulos_vendidos`
--

CREATE TABLE `tbl_articulos_vendidos` (
  `id_articulo_vendido` bigint(20) UNSIGNED NOT NULL,
  `id_articulo` bigint(20) UNSIGNED NOT NULL,
  `litros` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ventas`
--

CREATE TABLE `tbl_ventas` (
  `id_venta` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  ADD PRIMARY KEY (`idGasolina`);

--
-- Indices de la tabla `tbl_articulos_vendidos`
--
ALTER TABLE `tbl_articulos_vendidos`
  ADD PRIMARY KEY (`id_articulo_vendido`),
  ADD KEY `id_producto` (`id_articulo`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_articulos`
--
ALTER TABLE `tbl_articulos`
  MODIFY `idGasolina` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_articulos_vendidos`
--
ALTER TABLE `tbl_articulos_vendidos`
  MODIFY `id_articulo_vendido` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tbl_ventas`
--
ALTER TABLE `tbl_ventas`
  MODIFY `id_venta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_articulos_vendidos`
--
ALTER TABLE `tbl_articulos_vendidos`
  ADD CONSTRAINT `tbl_articulos_vendidos_ibfk_1` FOREIGN KEY (`id_articulo`) REFERENCES `tbl_articulos` (`idGasolina`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_articulos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `tbl_ventas` (`id_venta`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
