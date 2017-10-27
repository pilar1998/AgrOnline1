-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2017 a las 03:51:04
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agroonline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_finca`
--

CREATE TABLE `administrador_finca` (
  `id_admin` int(11) NOT NULL,
  `nombres_admin` varchar(20) NOT NULL,
  `apellidos_admin` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador_finca`
--

INSERT INTO `administrador_finca` (`id_admin`, `nombres_admin`, `apellidos_admin`) VALUES
(1234567, 'ukihjubguhyvfutf', 'hygv'),
(11317451, 'Jose Bertildo', 'Roa Merchan'),
(20871766, 'Noralba', 'Pena Betancourt'),
(123456789, 'Jeisson Andres', 'Forero Valero'),
(1073630120, 'Bertil Guillermo', 'Roa Pena'),
(1073630351, 'Pilar Mariana', 'Roa Pena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(20) NOT NULL,
  `cantidad_total` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_producto`, `cantidad_total`) VALUES
(1, 'Mango', 55),
(2, 'Platano', 25),
(3, 'Mandarina Arrayana', 25),
(5, 'Naranja Comun', 10),
(7, 'Guayaba', 20),
(10, 'Guanabana', 35),
(11, 'Melocoton', 19),
(14, 'Mora', 14),
(15, 'Ahuyama', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `id_ubicacion` int(11) NOT NULL,
  `nombre_finca` varchar(20) NOT NULL,
  `id_admin` int(20) NOT NULL,
  `id_vereda` int(11) NOT NULL,
  `latitud` float NOT NULL,
  `longitud` float NOT NULL,
  `cantidadto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`id_ubicacion`, `nombre_finca`, `id_admin`, `id_vereda`, `latitud`, `longitud`, `cantidadto`) VALUES
(1, 'Risaralda', 123456789, 1, 8.8888, 8.8888, 64),
(2, 'La guasima', 1073630120, 1, 8.8888, 8.888, 49),
(3, 'Alto del Trigo', 1073630351, 1, 8.888, 8.888, 30),
(4, 'Alto del Roble', 20871766, 1, 8.888, 8.8888, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_producto`
--

CREATE TABLE `ubicacion_producto` (
  `id_ubicacion_producto` int(11) NOT NULL,
  `id_ubicacion` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicacion_producto`
--

INSERT INTO `ubicacion_producto` (`id_ubicacion_producto`, `id_ubicacion`, `cantidad`, `id_producto`) VALUES
(27, 4, 15, 10),
(28, 4, 20, 7),
(29, 4, 25, 3),
(30, 3, 30, 1),
(31, 2, 10, 5),
(32, 1, 25, 1),
(33, 1, 25, 2),
(34, 2, 20, 10),
(35, 2, 19, 11),
(37, 1, 14, 14);

--
-- Disparadores `ubicacion_producto`
--
DELIMITER $$
CREATE TRIGGER `sumadel` AFTER DELETE ON `ubicacion_producto` FOR EACH ROW begin update ubicacion set cantidadto=cantidadto-old.cantidad where id_ubicacion=old.id_ubicacion; UPDATE producto set cantidad_total=cantidad_total-old.cantidad where id_producto=old.id_producto; end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sumain` AFTER INSERT ON `ubicacion_producto` FOR EACH ROW begin
update ubicacion set cantidadto=cantidadto+new.cantidad where id_ubicacion=new.id_ubicacion;
UPDATE producto set cantidad_total=cantidad_total+new.cantidad where id_producto=new.id_producto;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `sumamo` AFTER UPDATE ON `ubicacion_producto` FOR EACH ROW begin update ubicacion set cantidadto=cantidadto-(old.cantidad-new.cantidad) where id_ubicacion=new.id_ubicacion; UPDATE producto set cantidad_total=cantidad_total-(old.cantidad-new.cantidad) where id_producto=new.id_producto; end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vereda`
--

CREATE TABLE `vereda` (
  `id_vereda` int(11) NOT NULL,
  `nombre_vereda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vereda`
--

INSERT INTO `vereda` (`id_vereda`, `nombre_vereda`) VALUES
(1, 'Naranjalito'),
(2, 'Pantanos'),
(3, 'Charcolargo'),
(4, 'Naranjal'),
(5, 'Salcedo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador_finca`
--
ALTER TABLE `administrador_finca`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `nombre_producto` (`nombre_producto`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`id_ubicacion`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `vereda` (`id_vereda`);

--
-- Indices de la tabla `ubicacion_producto`
--
ALTER TABLE `ubicacion_producto`
  ADD PRIMARY KEY (`id_ubicacion_producto`),
  ADD KEY `ubi` (`id_ubicacion`),
  ADD KEY `pro` (`id_producto`);

--
-- Indices de la tabla `vereda`
--
ALTER TABLE `vereda`
  ADD PRIMARY KEY (`id_vereda`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `ubicacion_producto`
--
ALTER TABLE `ubicacion_producto`
  MODIFY `id_ubicacion_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `vereda`
--
ALTER TABLE `vereda`
  MODIFY `id_vereda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD CONSTRAINT `id_admin` FOREIGN KEY (`id_admin`) REFERENCES `administrador_finca` (`id_admin`),
  ADD CONSTRAINT `vereda` FOREIGN KEY (`id_vereda`) REFERENCES `vereda` (`id_vereda`);

--
-- Filtros para la tabla `ubicacion_producto`
--
ALTER TABLE `ubicacion_producto`
  ADD CONSTRAINT `pro` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
  ADD CONSTRAINT `ubi` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion` (`id_ubicacion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
