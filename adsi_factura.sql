-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2020 a las 01:55:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adsi_factura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefacturas`
--

CREATE TABLE `detallefacturas` (
  `CodigoDetalleFactura` int(11) NOT NULL,
  `CodigoFactura` int(11) NOT NULL,
  `CodigoProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `ValorUnitario` double(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `CodigoFactura` int(6) NOT NULL,
  `CodigoCliente` int(6) NOT NULL,
  `FechaFactura` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`CodigoFactura`, `CodigoCliente`, `FechaFactura`) VALUES
(1, 1206, '2020-06-14 01:10:13'),
(2, 1111, '2020-06-14 01:10:20'),
(3, 1111, '2020-06-14 01:10:36'),
(4, 1111, '2020-06-14 01:11:56'),
(5, 1111, '2020-06-14 01:22:46'),
(6, 1206, '2020-06-14 02:25:00'),
(7, 1206, '2020-06-14 02:27:55'),
(8, 1206, '2020-06-14 02:29:53'),
(9, 1206, '2020-06-14 02:30:35'),
(10, 1111, '2020-06-14 02:38:57'),
(11, 1206, '2020-06-14 15:58:49'),
(12, 1206, '2020-06-14 16:18:42'),
(13, 1111, '2020-06-14 16:24:44'),
(14, 1206, '2020-06-14 16:25:25'),
(15, 1206, '2020-06-14 16:27:27'),
(16, 1206, '2020-06-14 16:36:36'),
(17, 1206, '2020-06-14 18:47:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `CodigoProducto` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `ValorUnitario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(50) NOT NULL,
  `Contrasena` varchar(50) NOT NULL,
  `IdRol` int(1) NOT NULL,
  `IdEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NombreUsuario`, `Contrasena`, `IdRol`, `IdEstado`) VALUES
(1, 'olme', '123', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  ADD PRIMARY KEY (`CodigoDetalleFactura`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`CodigoFactura`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`CodigoProducto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `NombreUsuario` (`NombreUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallefacturas`
--
ALTER TABLE `detallefacturas`
  MODIFY `CodigoDetalleFactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `CodigoFactura` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `CodigoProducto` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
