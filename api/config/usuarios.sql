-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 20:44:51
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
  `fechai` datetime NOT NULL,
  `fechaf` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capacitaciones`
--

INSERT INTO `capacitaciones` (`id`, `nombre`, `descripcion`, `cupo`, `fechai`, `fechaf`) VALUES
(20, '2', '2', '2', '2023-05-12 13:39:00', '2023-05-19 13:39:00');

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
(1, 'Ale132402', 'Inicio de Sesión', '2023-05-12 17:36:58'),
(2, 'Ale132402', 'Eliminacion Capacitacion Ale132402', '2023-05-12 17:38:36'),
(3, 'Ale132402', 'Eliminacion Capacitacion DNI132402', '2023-05-12 17:38:37'),
(4, 'Ale132402', 'Eliminacion de Capacitacion', '2023-05-12 17:57:23'),
(5, 'Ale132402', 'Inicio de Sesión', '2023-05-12 19:38:09'),
(6, 'Ale132402', 'Cerrada Por Inactividad', '2023-05-12 19:40:17'),
(7, 'ANG132402', 'Inicio de Sesión', '2023-05-12 20:23:56'),
(8, 'ANG132402', 'Creacion de Capacitacion', '2023-05-12 20:24:22'),
(9, '[object HTMLSelectElement]', 'Cerrada Por Inactividad', '2023-05-12 20:27:03'),
(10, 'ANG132402', 'Inicio de Sesión', '2023-05-12 20:27:28'),
(11, 'ANG132402', 'Inscripcion a Capacitacion Ale132402', '2023-05-12 20:29:01'),
(12, 'ANG132402', 'Modificacion de Capacitacion', '2023-05-12 20:30:53'),
(13, 'ANG132402', 'Cerrada Por Inactividad', '2023-05-12 20:32:12'),
(14, 'Ale132402', 'Inicio de Sesión', '2023-05-12 20:32:51'),
(15, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-12 20:35:02'),
(16, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-12 20:35:29'),
(17, 'Ale132402', 'Cerrada Por Inactividad', '2023-05-12 20:36:37'),
(18, 'Ale132402', 'Inicio de Sesión', '2023-05-12 20:38:04'),
(19, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-12 20:38:20'),
(20, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-12 20:38:53'),
(21, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-12 20:39:08'),
(22, 'Ale132402', 'Modificacion de Capacitacion', '2023-05-12 20:39:32'),
(23, 'Ale132402', 'Eliminacion Inscripcion Capacitacion Ale13240', '2023-05-12 20:39:43'),
(24, 'Ale132402', 'Cerrada Por Inactividad', '2023-05-12 20:40:45'),
(25, 'ANG132402', 'Inicio de Sesión', '2023-05-12 20:43:18'),
(26, 'ANG132402', 'Inscripcion a Capacitacion Ale132402', '2023-05-12 20:44:02'),
(27, 'ANG132402', 'Eliminacion Inscripcion Capacitacion Ale13240', '2023-05-12 20:44:16');

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
  `Capacitacion` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
