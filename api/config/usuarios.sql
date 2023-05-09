-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2023 a las 20:56:56
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

CREATE TABLE `capacitaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `cupo` varchar(45) NOT NULL,
  `fechai` date NOT NULL,
  `fechaf` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capacitaciones`
--

INSERT INTO `capacitaciones` (`id`, `nombre`, `descripcion`, `cupo`, `fechai`, `fechaf`) VALUES
(13, 'CAP12', 'CAP12', '1', '2023-05-09', '2023-05-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `usuario`, `accion`, `fecha`) VALUES
(1, 'ANG132402', 'Inicio de Sesión', '2023-05-09 20:08:14'),
(2, 'ANG132402', 'Eliminacion de Capacitacion', '2023-05-09 20:13:08'),
(3, 'ANG132402', 'Creacion de Capacitacion', '2023-05-09 20:13:39'),
(4, 'ANG132402', 'Modificacion de Capacitacion', '2023-05-09 20:15:17'),
(5, 'ANG132402', 'Inscripcion a Capacitacion', '2023-05-09 20:16:43'),
(6, 'ANG132402', 'Eliminacion a Capacitacion', '2023-05-09 20:17:06'),
(7, 'ANG132402', 'Inscripcion a Capacitacion', '2023-05-09 20:17:28'),
(8, 'ANG132402', 'Modificacion de Capacitacion', '2023-05-09 20:17:40'),
(9, 'ANG132402', 'Inscripcion a Capacitacion', '2023-05-09 20:17:47'),
(10, 'ANG132402', 'Cierre de sesión', '2023-05-09 20:17:50'),
(11, 'Ale132402', 'Inicio de Sesión', '2023-05-09 20:18:06'),
(12, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:21:01'),
(13, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:21:23'),
(14, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:22:35'),
(15, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:22:57'),
(16, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:23:05'),
(17, 'Ale132402', 'Inscripcion a Capacitacion7', '2023-05-09 20:25:52'),
(18, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:33:10'),
(19, 'Ale132402', 'Inscripcion a Capacitacion', '2023-05-09 20:33:13'),
(20, 'Ale132402', 'Eliminacion Capacitacion', '2023-05-09 20:34:33'),
(21, 'Ale132402', 'Inscripcion a CapacitacionAle132402', '2023-05-09 20:34:38'),
(22, 'ANG132402', 'Inicio de Sesión', '2023-05-09 20:35:59'),
(23, 'ANG132402', 'Eliminacion Capacitacion', '2023-05-09 20:36:02'),
(24, 'ANG132402', 'Inscripcion a Capacitacion Ale132402', '2023-05-09 20:36:14'),
(25, 'ANG132402', 'Eliminacion Capacitacion Ale132402', '2023-05-09 20:40:44'),
(26, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-09 20:43:41'),
(27, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-09 20:44:30'),
(28, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-09 20:44:58'),
(29, 'Ale132402', 'Cierre de sesión', '2023-05-09 20:53:16'),
(30, 'DNI132402', 'Creacion de Usuario', '2023-05-09 20:53:34'),
(31, 'DNI132402', 'Inscripcion a Capacitacion DNI132402', '2023-05-09 20:55:15'),
(32, 'DNI132402', 'Eliminacion Capacitacion DNI132402', '2023-05-09 20:55:28'),
(33, 'DNI132402', 'Inscripcion a Capacitacion DNI132402', '2023-05-09 20:55:33'),
(34, 'DNI132402', 'Cierre de sesión', '2023-05-09 20:55:38'),
(35, 'ANG132402', 'Inicio de Sesión', '2023-05-09 20:55:45'),
(36, 'ANG132402', 'Modificacion de Capacitacion', '2023-05-09 20:56:04'),
(37, 'ANG132402', 'Cierre de sesión', '2023-05-09 20:56:07'),
(38, 'Ale132402', 'Inicio de Sesión', '2023-05-09 20:56:15'),
(39, 'Ale132402', 'Inscripcion a Capacitacion Ale132402', '2023-05-09 20:56:18'),
(40, 'Ale132402', 'Cierre de sesión', '2023-05-09 20:56:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `nombre`, `correo`, `telefono`, `rol`) VALUES
(7, 'Ale132402', 'MTMyNDAy', 'Ale132402', '132402', '132402', 1),
(8, 'ANG132402', 'MTMyNDAy', 'ANG132402', '132402', '132402', 2),
(9, 'DNI132402', 'MTMyNDAy', 'DNI132402', '132402', '132402', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_capacitaciones`
--

CREATE TABLE `usuario_has_capacitaciones` (
  `usuario` int(11) NOT NULL,
  `Capacitacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_has_capacitaciones`
--

INSERT INTO `usuario_has_capacitaciones` (`usuario`, `Capacitacion`) VALUES
(7, 13),
(8, 13),
(9, 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_Rol_idx` (`rol`);

--
-- Indices de la tabla `usuario_has_capacitaciones`
--
ALTER TABLE `usuario_has_capacitaciones`
  ADD PRIMARY KEY (`usuario`,`Capacitacion`),
  ADD KEY `fk_usuario_has_Capacitaciones_Capacitaciones1_idx` (`Capacitacion`),
  ADD KEY `fk_usuario_has_Capacitaciones_usuario1_idx` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_Rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_capacitaciones`
--
ALTER TABLE `usuario_has_capacitaciones`
  ADD CONSTRAINT `fk_usuario_has_Capacitaciones_Capacitaciones1` FOREIGN KEY (`Capacitacion`) REFERENCES `capacitaciones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_Capacitaciones_usuario1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
