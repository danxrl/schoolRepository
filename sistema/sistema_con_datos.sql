-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2018 a las 22:32:17
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`, `direccion`, `telefono`, `correo`) VALUES
('almacenGDL', 'Almacen Guadalajara', 'Av. Guadalupe 564', '213854652', 'almacengdl@sistema.com'),
('almacenMTY', 'Almacen Monterrey', 'Av. Juan Zumarraga 1233', '3394730984', 'almacen_mty@sistema.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `rfc` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `direccion`, `telefono`, `correo`, `rfc`) VALUES
(1, 'Juan Pablo Naranjo', 'Av. Linces 1300', '3313124383', 'ichis0915@kleitonzoo.com', 'jpgn9080fxk'),
(2, 'Dany Lemus', 'Av. Bahía de Acapulco 2790', '3313841114', 'dnxrl@kleitonzoo.com', 'jdrm2344lsk'),
(4, 'Armando Rueda', 'Av. Tlaquepaque 837', '4489290216', 'a7xrueda@kleitonzoo.com', 'jarj0980sdin'),
(5, 'Alfonso Omar Galaviz', 'Av. Sn Pedro', '3215481235', 'strouts@gmail.com', 'JASKDNSK'),
(6, 'Diego Enrique', 'Chapulines 513', '324135453', 'quique@gmail.com', 'KLASDSDK'),
(7, 'La chona', 'La del ceti equis de', '45654654', 'chona@gg.com', 'SDFDSDS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `almacen_id` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `calibre` enum('20','22','24','26','28') NOT NULL,
  `peso` decimal(15,4) NOT NULL,
  `largo` decimal(15,2) NOT NULL,
  `ancho` decimal(15,2) NOT NULL,
  `peralte` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `descripcion`, `calibre`, `peso`, `largo`, `ancho`, `peralte`) VALUES
('0', 'Ternium TR-101 Zintro Galvanizado 183cm C-22', '22', '9.6807', '183.00', '101.00', '2.50'),
('1', 'Ternium TR-101 Zintro Galvanizado 183cm C-26', '26', '7.9422', '183.00', '101.00', '2.50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `id` int(11) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `almacen_id` varchar(10) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `tipo_movimiento` enum('Entrada','Salida') DEFAULT NULL,
  `fecha_movimiento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partida`
--

CREATE TABLE `partida` (
  `id` int(11) NOT NULL,
  `volumen` decimal(15,2) NOT NULL,
  `peso` decimal(15,2) NOT NULL,
  `material_id` varchar(10) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `piezas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `partida`
--

INSERT INTO `partida` (`id`, `volumen`, `peso`, `material_id`, `pedido_id`, `piezas`) VALUES
(3, '58997.74', '95.31', '1', 0, 12),
(4, '921839.63', '7942.20', '1', 0, 1000),
(5, '785989.58', '4840.35', '0', 0, 500),
(6, '66217.20', '116.17', '0', 0, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `almacen_id` varchar(10) NOT NULL,
  `transporte_id` varchar(10) DEFAULT NULL,
  `fecha_solicitud` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_envio` datetime DEFAULT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `status` enum('Pedido','Enviado','Entregado','Cancelado','Devuelto') NOT NULL,
  `observaciones` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `cliente_id`, `direccion`, `almacen_id`, `transporte_id`, `fecha_solicitud`, `fecha_envio`, `fecha_entrega`, `status`, `observaciones`) VALUES
(1, 1, 'Av. Tlanepantla 452', 'almacenMTY', 'DGE688', '2018-06-20 15:40:25', '2018-06-20 16:01:11', '2018-06-20 16:01:43', 'Entregado', 'Entragar al señor Jarquín Perez'),
(2, 1, 'Av. Dominicos 323', 'almacenMTY', 'DGE688', '2018-06-20 15:41:15', '2018-06-21 13:27:16', NULL, 'Enviado', 'Entragar al señor Jarquín Perez'),
(3, 2, 'Av. Sn Pedro', 'almacenMTY', 'TYT688', '2018-06-21 15:15:25', NULL, NULL, 'Pedido', '                    '),
(4, 5, 'Av. Sn Pedro', 'almacenGDL', 'DGE688', '2018-06-21 15:29:50', NULL, NULL, 'Entregado', '                    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transporte`
--

CREATE TABLE `transporte` (
  `id` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `ejes` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `ancho` int(11) NOT NULL,
  `largo` int(11) NOT NULL,
  `alto` int(11) NOT NULL,
  `caja` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transporte`
--

INSERT INTO `transporte` (`id`, `descripcion`, `marca`, `ejes`, `capacidad`, `ancho`, `largo`, `alto`, `caja`) VALUES
('DGE688', 'Camioneta dodge 6 cilindros', 'Dodge', 5, 3500, 250, 150, 130, '0'),
('TYT688', 'Camioneta toyota 4 cilindros', 'Dodge', 5, 1783, 150, 250, 130, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `almacen_id` (`almacen_id`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `almacen_id` (`almacen_id`);

--
-- Indices de la tabla `partida`
--
ALTER TABLE `partida`
  ADD PRIMARY KEY (`id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `almacen_id` (`almacen_id`),
  ADD KEY `transporte_id` (`transporte_id`);

--
-- Indices de la tabla `transporte`
--
ALTER TABLE `transporte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `partida`
--
ALTER TABLE `partida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `inventario_ibfk_2` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD CONSTRAINT `movimiento_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimiento_ibfk_2` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `partida`
--
ALTER TABLE `partida`
  ADD CONSTRAINT `partida_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`almacen_id`) REFERENCES `almacen` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_3` FOREIGN KEY (`transporte_id`) REFERENCES `transporte` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
