-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2020 a las 09:05:59
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicataw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nombre`) VALUES
(1, 'Ropa'),
(2, 'Electronica'),
(3, 'Muebles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catfabricantes`
--

CREATE TABLE `catfabricantes` (
  `idCatFabricante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catfabricantes`
--

INSERT INTO `catfabricantes` (`idCatFabricante`, `nombre`) VALUES
(1, 'Ropa'),
(2, 'Electronica'),
(3, 'Muebles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricantes`
--

CREATE TABLE `fabricantes` (
  `idFabricante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fkcatfabricante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fabricantes`
--

INSERT INTO `fabricantes` (`idFabricante`, `nombre`, `direccion`, `correo`, `telefono`, `fkcatfabricante`) VALUES
(1, 'Nike', 'direccion x', 'correox@gmail.com', '8342738293', 1),
(3, 'Adidas', 'Direccion a', 'adidas@gmail.com', '8349238293', 1),
(5, 'Sony', 'direccion s', 'sony@gmail.com', '8346218293', 2),
(6, 'Ikea', 'direccion i', 'ikea@gmail.com', '8342839202', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precioVenta` int(11) NOT NULL,
  `precioCompra` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `fkCategoria` int(11) NOT NULL,
  `fkFabricante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nombre`, `descripcion`, `precioVenta`, `precioCompra`, `color`, `fkCategoria`, `fkFabricante`) VALUES
(1, 'Tenis', 'Tenis Quake 2', 1119, 1590, 'azul', 1, 1),
(7, 'PS4', 'Consola ps4', 5123, 4432, 'negro', 2, 5),
(8, 'Tenis Max Bella 2', 'Tenis Nike Max Bella 2', 1699, 1280, 'negro', 1, 1),
(9, 'Mueble loki', 'Mueble de madera ', 2132, 1892, 'cafe', 3, 6);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `catfabricantes`
--
ALTER TABLE `catfabricantes`
  ADD PRIMARY KEY (`idCatFabricante`);

--
-- Indices de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`idFabricante`),
  ADD KEY `fkcatfabricante` (`fkcatfabricante`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fkCategoria` (`fkCategoria`),
  ADD KEY `fkFabricante` (`fkFabricante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catfabricantes`
--
ALTER TABLE `catfabricantes`
  MODIFY `idCatFabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `idFabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD CONSTRAINT `fabricantes_ibfk_1` FOREIGN KEY (`fkcatfabricante`) REFERENCES `catfabricantes` (`idCatFabricante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`fkCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`fkFabricante`) REFERENCES `fabricantes` (`idFabricante`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
