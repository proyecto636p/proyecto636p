-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2020 a las 18:11:32
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
(4, 'Programador', 2),
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
(14, 'equipos', '2020-03-15 23:15:46'),
(15, 'consumibles', '2020-03-13 04:17:25');

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
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `fecha`) VALUES
(2, 'elias', '18745555', 'elias@gmail.com', '(424) 577-7945', 'avenidad 1', '2020-03-15', 0, '2020-03-16 00:44:25'),
(5, 'cesar', 'fgffgf', '122', '(111) 111-1111', 'ffffff', '2011-11-11', 0, '2020-03-17 01:19:21');

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
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `observacion` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `codigo`, `seriales`, `categoria`, `tipo`, `marca`, `modelo`, `estado`, `stock`, `asignacion`, `fecha`, `observacion`) VALUES
(13, 1501, 'rytyt', '15', '15', '19', 'nuevo', 'activo', 23, 'no asignado', '2012-11-01 19:03:36', 'ninguna'),
(16, 1402, 'hhho', '14', '13', '18', 'pclite', 'inactivo', 66, 'asignado', '2020-03-15 23:10:37', 'ningunao'),
(18, 1402, 'hhyyg5454', '14', '13', '16', 'lcd flash', 'activo', 12, 'no asignado', '2020-03-15 23:16:23', 'ninguna'),
(19, 140218, 'cvvctt', '14', '13', '18', 'pclite', 'activo', 13, 'no asignado', '2020-03-15 23:16:48', 'ninguna'),
(20, 1402, 'hhh', '14', '12', '21', 'toush pack', 'activo', 87, 'no asignado', '2020-03-15 23:17:18', 'ninguna'),
(21, 140220, 'rth567', '14', '13', '16', 'lcd flash', 'activo', 99, 'no asignado', '2020-03-15 23:17:46', 'ninguna'),
(22, 14022021, 'jhghh', '14', '13', '16', 'lcd flash', 'activo', 34, 'no asignado', '2020-03-17 02:12:51', 'ninguna'),
(23, 1402, 'ñ}ñ.', '14', '12', '21', 'toush pack', 'inactivo', 44, 'no asignado', '2020-03-20 02:49:09', '{ñññ');

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
(16, 'samsung', 13, '2012-11-01 18:33:43'),
(18, 'syragon', 13, '2012-11-01 18:34:40'),
(19, 'hp', 15, '2012-11-01 18:34:50'),
(20, 'epson', 15, '2012-11-01 18:34:59'),
(21, 'sony', 12, '2012-11-01 18:41:23');

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
(9, 'lcd flash', 16, '2012-11-01 18:37:45'),
(10, 'pclite', 18, '2012-11-01 18:38:12'),
(11, 'double print', 20, '2012-11-01 18:38:23'),
(12, 'nuevo', 19, '2012-11-01 18:38:43'),
(13, 'toush pack', 21, '2012-11-01 18:41:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `nombres` text COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` text COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nac` text COLLATE utf8_unicode_ci NOT NULL,
  `cargo` int(11) NOT NULL,
  `departamento` int(11) NOT NULL,
  `status` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `cedula`, `nombres`, `apellidos`, `email`, `telefono`, `direccion`, `fecha_nac`, `cargo`, `departamento`, `status`, `fecha`) VALUES
(1, 18799886, 'cesar', 'ratia', 'informatico@gmail.com', '(222) 222-2222', 'dsdssdsds', '32323', 4, 4, 'Activo', '2012-11-01 11:55:02');

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
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
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
(11, 'cpu', 7, '2012-11-01 09:00:37'),
(12, 'mouse', 14, '2020-03-13 04:17:55'),
(13, 'monitor', 14, '2020-03-13 04:18:07'),
(14, 'dvd', 15, '2012-11-01 12:10:11'),
(15, 'toner', 15, '2012-11-01 12:10:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
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

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2020-03-08 22:00:54', '2020-03-16 01:15:44'),
(57, 'Juan Fernando Urrego', 'juan', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 'Vendedor', 'vistas/img/usuarios/juan/461.jpg', 1, '2017-12-21 12:07:24', '2012-11-01 04:40:39'),
(58, 'Julio Gómez', 'julio', '$2a$07$asxx54ahjppf45sd87a5auQhldmFjGsrgUipGlmQgDAcqevQZSAAC', 'Especial', 'vistas/img/usuarios/julio/100.png', 1, '2017-12-21 12:07:39', '2017-12-21 17:07:39'),
(59, 'Ana Gonzalez', 'ana', '$2a$07$asxx54ahjppf45sd87a5auLd2AxYsA/2BbmGKNk2kMChC3oj7V0Ca', 'Vendedor', 'vistas/img/usuarios/ana/260.png', 1, '2017-12-21 12:07:47', '2020-03-08 03:47:48'),
(60, 'cesar', 'cesar', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Administrador', 'vistas/img/usuarios/cesar/510.jpg', 1, '2020-03-19 21:05:29', '2020-03-20 01:05:29'),
(61, 'ratia', 'ratia', '$2a$07$asxx54ahjppf45sd87a5auJRR6foEJ7ynpjisKtbiKJbvJsoQ8VPS', 'Vendedor', '', 1, '2020-03-15 22:52:59', '2020-03-16 02:52:59');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
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
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
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
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
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
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
