-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-04-2020 a las 15:25:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`id`, `equipo`, `usuario`, `asignadoPor`, `observacion`, `fecha`) VALUES
(40, 1801, 1, 1, '', '2020-03-29 18:20:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacionC`
--

CREATE TABLE `asignacionC` (
  `id` int(11) NOT NULL,
  `equipo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `asignadoPor` int(11) NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignacionC`
--

INSERT INTO `asignacionC` (`id`, `equipo`, `usuario`, `asignadoPor`, `observacion`, `fecha`) VALUES
(29, 2101, 1, 1, '', '2020-03-29 23:48:23'),
(30, 2201, 4, 1, '', '2020-03-29 23:48:38'),
(31, 2102, 1, 1, '', '2020-03-29 23:48:44'),
(32, 2002, 4, 1, '', '2020-03-29 23:48:53'),
(33, 2103, 1, 1, '', '2020-03-29 23:49:05');

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Estructura de tabla para la tabla `categoriasC`
--

CREATE TABLE `categoriasC` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoriasC`
--

INSERT INTO `categoriasC` (`id`, `categoria`, `fecha`) VALUES
(20, 'lapiz', '2020-03-28 19:58:31'),
(21, 'dvd', '2020-03-29 00:45:23'),
(22, 'cd', '2020-03-29 00:45:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `fecha`) VALUES
(2, 'elias', '18799886', 'elias2021@gmail.com', '(424) 577-7980', 'avenidad 1', '2020-03-15', 0, '2020-03-16 00:44:25'),
(3, 'ratia', '18799886', 'cesar_ratia_1988@hotmail.com', '(424) 577-7980', 'av bolivae', '2020-03-15', 0, '2020-03-16 01:39:39'),
(4, 'ratia', '18799886', 'cesar_ratia_1988@hotmail.com', '(424) 577-7980', 'la ciudadela', '1988-08-05', 0, '2020-03-16 02:03:14'),
(6, 'cesar', '22102779', 'deglid@gmai', '(533) 533-5335', 'hghgg', '2011-11-11', 0, '2020-03-20 17:28:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumibles`
--

CREATE TABLE `consumibles` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `seriales` text COLLATE utf8_unicode_ci NOT NULL,
  `categoria` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` text COLLATE utf8_unicode_ci NOT NULL,
  `marca` text COLLATE utf8_unicode_ci NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `asignacion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `consumibles`
--

INSERT INTO `consumibles` (`id`, `codigo`, `seriales`, `categoria`, `tipo`, `marca`, `modelo`, `estado`, `stock`, `asignacion`, `fecha`, `observacion`) VALUES
(31, 2101, '2101', '21', '21', '27', 'regrabable', 'activo', 13, 'asignado', '2020-03-29 23:48:23', 'ninguna'),
(32, 2201, '2201', '22', '22', '28', 'desechables', 'activo', 24, 'asignado', '2020-03-29 23:48:38', 'ninguna1'),
(33, 2102, '2102', '21', '21', '27', 'regrabable', 'activo', 23, 'asignado', '2020-03-29 23:48:45', 'ninguna'),
(34, 2002, '2002', '20', '20', '26', 'punta fina', 'activo', 23, 'asignado', '2020-03-29 23:48:53', 'ninguna'),
(35, 2103, 'rrerer', '21', '21', '27', 'regrabable', 'activo', 78, 'asignado', '2020-03-29 23:49:05', 'ninguna');

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
  `categoria` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` text COLLATE utf8_unicode_ci NOT NULL,
  `marca` text COLLATE utf8_unicode_ci NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `estado` text COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `asignacion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `codigo`, `seriales`, `categoria`, `tipo`, `marca`, `modelo`, `estado`, `stock`, `asignacion`, `fecha`, `observacion`) VALUES
(33, 1801, '1801', '18', '17', '23', 'lcd flash', 'activo', 12, 'asignado', '2020-03-29 22:37:03', 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idtipof` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion`, `idtipof`, `fecha`) VALUES
(23, 'samsung', 17, '2020-03-28 15:24:52'),
(24, 'hitachi', 19, '2020-03-29 15:43:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcasC`
--

CREATE TABLE `marcasC` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idtipof` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcasC`
--

INSERT INTO `marcasC` (`id`, `descripcion`, `idtipof`, `fecha`) VALUES
(26, 'mongol', 20, '2020-03-29 00:48:05'),
(27, 'sony', 21, '2020-03-29 00:48:17'),
(28, 'digital', 22, '2020-03-29 00:48:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `idmarcaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id`, `modelo`, `idmarcaf`, `fecha`) VALUES
(16, 'lcd flash', 23, '2020-03-29 15:15:24'),
(17, 'new live', 24, '2020-03-29 15:44:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelosC`
--

CREATE TABLE `modelosC` (
  `id` int(11) NOT NULL,
  `modelo` text COLLATE utf8_unicode_ci NOT NULL,
  `idmarcaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modelosC`
--

INSERT INTO `modelosC` (`id`, `modelo`, `idmarcaf`, `fecha`) VALUES
(17, 'punta fina', 26, '2020-03-29 00:48:59'),
(18, 'regrabable', 27, '2020-03-29 00:49:15'),
(19, 'desechables', 28, '2020-03-29 00:49:28');

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
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_modelo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`, `id_modelo`) VALUES
(68, 14, '1402', 'cpu', 'vistas/img/productos/default/anonymous.png', 12, 12, 16.8, 0, '2020-03-13 04:32:27', 0),
(69, 14, '1403', 'monitor', 'vistas/img/productos/default/anonymous.png', 22, 24, 33.6, 0, '2020-03-13 04:32:47', 0),
(70, 14, '1401', '12', 'vistas/img/productos/default/anonymous.png', 12, 21, 29.4, 0, '2012-11-01 18:06:34', 0),
(71, 14, '1401', '12', 'vistas/img/productos/default/anonymous.png', 212, 12, 16.8, 0, '2012-11-01 18:06:53', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `solicitud` text COLLATE utf8_spanish_ci NOT NULL,
  `usuariof` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `solicitud`, `usuariof`, `estado`, `fecha`) VALUES
(18, 'un monitor', 1, 1, '2020-03-29 23:56:00'),
(19, 'un teclado', 1, 0, '2020-03-29 23:56:09'),
(20, 'un mouse', 5, 0, '2020-03-29 23:56:36'),
(21, 'un dvd', 5, 0, '2020-03-29 23:57:03'),
(22, 'un toner', 5, 0, '2020-03-29 23:57:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idcategoriaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `descripcion`, `idcategoriaf`, `fecha`) VALUES
(17, 'lcd', 18, '2020-03-28 15:24:40'),
(18, 'inalambrico', 0, '2020-03-29 00:44:24'),
(19, 'plano', 19, '2020-03-29 15:43:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposC`
--

CREATE TABLE `tiposC` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `idcategoriaf` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tiposC`
--

INSERT INTO `tiposC` (`id`, `descripcion`, `idcategoriaf`, `fecha`) VALUES
(20, 'mongol', 20, '2020-03-29 00:47:02'),
(21, 'sony', 21, '2020-03-29 00:47:15'),
(22, 'digital', 22, '2020-03-29 00:47:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `cedulaf` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedulaf`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(60, 0, '1', 'cesar', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Administrador', 'vistas/img/usuarios/cesar/510.jpg', 1, '2020-04-01 09:24:43', '2020-04-01 13:24:43'),
(66, 0, '4', 'tecnico', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Tecnico', 'vistas/img/usuarios/cesar/510.jpg', 1, '2020-03-28 13:53:47', '2020-03-28 17:53:47'),
(67, 0, '5', 'usuario', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Usuario', 'vistas/img/usuarios/cesar/510.jpg', 1, '2020-03-29 19:56:23', '2020-03-29 23:56:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `asignacionC`
--
ALTER TABLE `asignacionC`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriasC`
--
ALTER TABLE `categoriasC`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `consumibles`
--
ALTER TABLE `consumibles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcasC`
--
ALTER TABLE `marcasC`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelosC`
--
ALTER TABLE `modelosC`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposC`
--
ALTER TABLE `tiposC`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `asignacionC`
--
ALTER TABLE `asignacionC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `categoriasC`
--
ALTER TABLE `categoriasC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consumibles`
--
ALTER TABLE `consumibles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `marcasC`
--
ALTER TABLE `marcasC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `modelosC`
--
ALTER TABLE `modelosC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tiposC`
--
ALTER TABLE `tiposC`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
