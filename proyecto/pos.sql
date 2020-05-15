-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2020 a las 04:53:28
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `id` int(11) NOT NULL,
  `equipo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `asignadoPor` int(11) NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `equipo`, `usuario`, `asignadoPor`, `observacion`, `fecha`) VALUES
(44, 1801, 1, 1, '', '2020-05-15 01:58:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacionc`
--

CREATE TABLE `asignacionc` (
  `id` int(11) NOT NULL,
  `equipo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `asignadoPor` int(11) NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignacionc`
--

INSERT INTO `asignacionc` (`id`, `equipo`, `usuario`, `asignadoPor`, `observacion`, `fecha`) VALUES
(34, 2001, 5, 1, '', '2020-05-15 02:00:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `iddepartamentof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `descripcion`, `iddepartamentof`) VALUES
(4, 'secretaria', 2),
(6, 'desarrollador', 4),
(7, 'tecnico', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(18, 'monitor', '2020-03-28 15:24:01'),
(19, 'teclado', '2020-03-28 15:24:15'),
(20, 'mouse', '2020-03-29 00:43:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasc`
--

CREATE TABLE `categoriasc` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoriasc`
--

INSERT INTO `categoriasc` (`id`, `categoria`, `fecha`) VALUES
(20, 'lapiz', '2020-03-28 19:58:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumibles`
--

CREATE TABLE `consumibles` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `seriales` text COLLATE utf8_unicode_ci NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `asignacion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `consumibles`
--

INSERT INTO `consumibles` (`id`, `codigo`, `seriales`, `categoria`, `tipo`, `marca`, `modelo`, `estado`, `stock`, `asignacion`, `fecha`, `observacion`) VALUES
(37, 2001, 'erfd', 20, 23, 29, 'punta fina', 'activo', 12, 'asignado', '2020-05-15 02:00:11', 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id`, `descripcion`) VALUES
(2, 'recursos humanos'),
(4, 'informatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `seriales` text COLLATE utf8_unicode_ci NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `marca` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `asignacion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `codigo`, `seriales`, `categoria`, `tipo`, `marca`, `modelo`, `estado`, `stock`, `asignacion`, `fecha`, `observacion`) VALUES
(42, 1801, 'erfd', 18, 20, 25, 'lcd full', 'activo', 12, 'asignado', '2020-05-15 01:58:05', 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idtipof` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion`, `idtipof`, `fecha`) VALUES
(25, 'samsung', 20, '2020-05-14 22:12:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcasc`
--

CREATE TABLE `marcasc` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idtipof` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcasc`
--

INSERT INTO `marcasc` (`id`, `descripcion`, `idtipof`, `fecha`) VALUES
(29, 'mogolll', 23, '2020-05-14 22:30:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `idmarcaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `modelo`, `idmarcaf`, `fecha`) VALUES
(18, 'lcd full', 25, '2020-05-14 22:13:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelosc`
--

CREATE TABLE `modelosc` (
  `id` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `idmarcaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelosc`
--

INSERT INTO `modelosc` (`id`, `modelo`, `idmarcaf`, `fecha`) VALUES
(20, 'punta fina', 29, '2020-05-14 22:30:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nac` text COLLATE utf8_spanish_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `fecha_nac`, `cargo`, `departamento`, `estado`, `fecha`) VALUES
(1, 18799886, 'cesar augusto', 'ratia parra', 'informaticoc.r05@gmail.com', '(412) 150-3288', 'la ciudadela', '2032/03/23', 6, 4, 'Activo', '2020-03-30 00:01:39'),
(4, 19799886, 'jose jose', 'perez perez', 'jose@gmail.com', '(042) 444-4444', 'acarigua', '1990/02/23', 7, 4, 'Activo', '2020-03-28 16:38:42'),
(5, 20799886, 'ana maria', 'rojas sanchez', 'ana@gmail.com', '(424) 577-7888', 'araure', '1990/01/01', 4, 2, 'Activo', '2020-03-28 16:41:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `solicitud` text COLLATE utf8_spanish_ci NOT NULL,
  `usuariof` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `solicitud`, `usuariof`, `estado`, `fecha`) VALUES
(18, 'un monitor', 1, 1, '2020-03-29 23:56:00'),
(19, 'un teclado', 1, 0, '2020-04-20 18:07:31'),
(20, 'un mouse1', 5, 0, '2020-04-28 21:36:02'),
(21, 'un dvd', 5, 0, '2020-03-29 23:57:03'),
(22, 'un toner', 5, 0, '2020-04-20 18:40:31'),
(23, 'otro', 5, 0, '2020-04-28 21:36:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte`
--

CREATE TABLE `soporte` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_atiende` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `asunto` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `solucion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estatus` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipo_falla` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `sop_departamento` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_soporte` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `soporte`
--

INSERT INTO `soporte` (`id`, `id_usuario`, `id_atiende`, `codigo`, `asunto`, `solucion`, `estatus`, `tipo_falla`, `sop_departamento`, `Fecha_soporte`) VALUES
(1, '18799886', '18799886', '1001', 'ADASDAS', 'en busca', 'En Proceso', 'Internet', '2', '2020-04-28 19:01:05'),
(2, '18799886', '18799886', '1002', 'ninfiuna', 'en buscay', 'En Proceso', 'Equipo', '4', '2020-04-28 18:42:34'),
(3, '18799886', '18799886', '1003', 'hkkkk', 'en busca', 'Finalizado', 'Configuracion', '2', '2020-04-28 19:01:16'),
(4, '18799886', '18799886', '1004', 'nueva', 'en busca', 'Finalizado', 'Internet', '2', '2020-04-28 20:23:25'),
(5, '18799886', '18799886', '1005', 'otra', 'en busca', 'En Proceso', 'Configuracion', '4', '2020-04-28 21:57:41'),
(6, '18799886', '18799886', '1006', 'yuyuy', 'en busca', 'En Proceso', 'Internet', '2', '2020-04-28 20:26:52'),
(7, '20799886', '18799886', '1007', 'no conecta', 'en busca', 'En Proceso', 'Internet', '2', '2020-04-28 21:34:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idcategoriaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `descripcion`, `idcategoriaf`, `fecha`) VALUES
(20, 'lcd', 18, '2020-05-14 22:12:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposc`
--

CREATE TABLE `tiposc` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idcategoriaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiposc`
--

INSERT INTO `tiposc` (`id`, `descripcion`, `idcategoriaf`, `fecha`) VALUES
(23, 'mongol', 20, '2020-05-14 22:30:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cedulaf` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` int(11) NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedulaf`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(60, 0, '1', 18799886, '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Administrador', '', 1, '2020-05-14 21:45:40', '2020-05-15 01:45:40'),
(67, 0, '5', 20799886, '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Usuario', '', 1, '2020-04-28 17:35:23', '2020-05-15 01:44:14'),
(68, 0, '4', 19799886, '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Tecnico', '', 1, '0000-00-00 00:00:00', '2020-05-15 01:40:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignacionc`
--
ALTER TABLE `asignacionc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `iddepartamentof` (`iddepartamentof`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriasc`
--
ALTER TABLE `categoriasc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consumibles`
--
ALTER TABLE `consumibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `marca` (`marca`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipof` (`idtipof`);

--
-- Indices de la tabla `marcasc`
--
ALTER TABLE `marcasc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtipof` (`idtipof`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmarcaf` (`idmarcaf`);

--
-- Indices de la tabla `modelosc`
--
ALTER TABLE `modelosc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idmarcaf` (`idmarcaf`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `departamento` (`departamento`),
  ADD KEY `cargo` (`cargo`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soporte`
--
ALTER TABLE `soporte`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoriaf` (`idcategoriaf`);

--
-- Indices de la tabla `tiposc`
--
ALTER TABLE `tiposc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoriaf` (`idcategoriaf`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `asignacionc`
--
ALTER TABLE `asignacionc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `categoriasc`
--
ALTER TABLE `categoriasc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `consumibles`
--
ALTER TABLE `consumibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `marcasc`
--
ALTER TABLE `marcasc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `modelosc`
--
ALTER TABLE `modelosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `soporte`
--
ALTER TABLE `soporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tiposc`
--
ALTER TABLE `tiposc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD CONSTRAINT `cargos_ibfk_1` FOREIGN KEY (`iddepartamentof`) REFERENCES `departamento` (`id`);

--
-- Filtros para la tabla `consumibles`
--
ALTER TABLE `consumibles`
  ADD CONSTRAINT `consumibles_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categoriasc` (`id`),
  ADD CONSTRAINT `consumibles_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tiposc` (`id`),
  ADD CONSTRAINT `consumibles_ibfk_3` FOREIGN KEY (`marca`) REFERENCES `marcasc` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `equipos_ibfk_2` FOREIGN KEY (`tipo`) REFERENCES `tipos` (`id`),
  ADD CONSTRAINT `equipos_ibfk_3` FOREIGN KEY (`marca`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD CONSTRAINT `marcas_ibfk_1` FOREIGN KEY (`idtipof`) REFERENCES `tipos` (`id`);

--
-- Filtros para la tabla `marcasc`
--
ALTER TABLE `marcasc`
  ADD CONSTRAINT `marcasC_ibfk_1` FOREIGN KEY (`idtipof`) REFERENCES `tiposc` (`id`);

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`idmarcaf`) REFERENCES `marcas` (`id`);

--
-- Filtros para la tabla `modelosc`
--
ALTER TABLE `modelosc`
  ADD CONSTRAINT `modelosC_ibfk_1` FOREIGN KEY (`idmarcaf`) REFERENCES `marcasc` (`id`);

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `personal_ibfk_2` FOREIGN KEY (`cargo`) REFERENCES `cargos` (`id`);

--
-- Filtros para la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD CONSTRAINT `tipos_ibfk_1` FOREIGN KEY (`idcategoriaf`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `tiposc`
--
ALTER TABLE `tiposc`
  ADD CONSTRAINT `tiposC_ibfk_1` FOREIGN KEY (`idcategoriaf`) REFERENCES `categoriasc` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `personal` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
