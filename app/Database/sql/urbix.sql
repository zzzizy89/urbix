-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2023 a las 22:16:27
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
-- Base de datos: `urbix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE `barrio` (
  `id_barrio` int(11) NOT NULL,
  `id_ciudad` int(11) NOT NULL,
  `barrio` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`id_barrio`, `id_ciudad`, `barrio`) VALUES
(45, 45, 'castagnino'),
(46, 46, 'dwawddw');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calle`
--

CREATE TABLE `calle` (
  `id_calle` int(11) NOT NULL,
  `calle` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `calle`
--

INSERT INTO `calle` (`id_calle`, `calle`) VALUES
(10, 'leandro n alem'),
(11, '1212');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `id_prov` int(11) NOT NULL,
  `ciudad` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `id_prov`, `ciudad`) VALUES
(45, 45, 'Rio tercero'),
(46, 46, 'dwwdawd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_metodo_pago` int(11) NOT NULL,
  `id_direccion_casa` int(11) NOT NULL,
  `total_c` int(11) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `id_user`, `id_metodo_pago`, `id_direccion_casa`, `total_c`, `fecha_compra`) VALUES
(44, 3, 1, 45, 43000, '2023-11-28 00:09:55'),
(45, 3, 1, 46, 12000, '2023-11-27 21:14:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_dcompra` int(11) NOT NULL,
  `id_compras` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`id_dcompra`, `id_compras`, `id_producto`, `cantidad`, `precio_unitario`, `subtotal`) VALUES
(52, 44, 34, 1, 12000, 12000),
(53, 44, 37, 2, 8000, 16000),
(54, 44, 35, 1, 15000, 15000),
(55, 45, 34, 1, 12000, 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_ca`
--

CREATE TABLE `direccion_ca` (
  `id_direccion_casa` int(11) NOT NULL,
  `id_barrio` int(11) NOT NULL,
  `id_calle` int(11) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion_casa` varchar(175) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `direccion_ca`
--

INSERT INTO `direccion_ca` (`id_direccion_casa`, `id_barrio`, `id_calle`, `codigo_postal`, `numero`, `descripcion_casa`) VALUES
(45, 45, 10, 5850, 1712, 'casa de rejas negras'),
(46, 46, 11, 5850, 2333, 'casa roja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_meotod_pago` int(11) NOT NULL,
  `metodo_pago` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `metodo_pago`
--

INSERT INTO `metodo_pago` (`id_meotod_pago`, `metodo_pago`) VALUES
(1, 'PayPal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `pais`) VALUES
(45, 'Argentina'),
(46, 'aSsdsad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion_prod` varchar(120) NOT NULL,
  `id_tipoprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `imagen`, `descripcion_prod`, `id_tipoprod`) VALUES
(34, 'hyperx', 12000.00, '1701118994_5cb045821410950e1f22.jpg', 'teclaod facheraso loco', 3),
(35, 'aufinexs', 15000.00, '1701119059_c72758022870c76cc022.jpg', 'audifonos facheritos facha', 4),
(36, 'cascotex', 7000.00, '1701119084_cec811228783176b25fa.jpg', 'cascos facha', 4),
(37, 'teclado', 8000.00, '1701119105_198334f621b8cad3589b.jpg', 'teclado de colores good', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_prov` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `provincia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_prov`, `id_pais`, `provincia`) VALUES
(45, 45, 'Cordoba'),
(46, 46, 'awdd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipoprod` int(11) NOT NULL,
  `tipo` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipoprod`, `tipo`) VALUES
(3, 'teclado'),
(4, 'audifonos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `perfil`, `name`, `email`, `bio`, `password`, `created_at`, `rol`) VALUES
(3, '1699995101_98462e7bfa97732c856c.jpg', 'Pepe', 'tiagocomba@gmail.com', 'hola me gusta la manzana', '$2y$10$Bp9uTakfhLhZwsRDB65Yd.QAUh5uAS4jEs8FvatYe/d36qahUkWRK', '0000-00-00 00:00:00', 1),
(5, '', 'test', 'test@gmail.com', '', '$2y$10$jXlVn1lg46wOXzY2GLdEYuH1mjrm6gYTyNJ6WyaqhfR3qdQ.NCVlu', '2023-10-11 14:29:29', 0),
(6, '', 'pepe', 'pepe@gmail.com', '', '$2y$10$WNP/RwmlNlWqn0czYtzkN.LKBEovUYqywiemsYkCKBvYOR5BTgSVS', '2023-10-15 22:18:21', 0),
(7, '', 'Luca', 'lucaferna@gmail.com', '', '$2y$10$4li6pkjY7bROijJFuTGrTecLinIsc1N9mAVdcppB7eEiC62hgLsuK', '2023-10-25 19:40:11', 0),
(8, '1700075362_cbf670270209050e4eb6.jpg', 'eze', 'eze@gmail.com', '', '$2y$10$fINKdk19sX.xXaumtRXyzewh/sZ7m1XXMghWjjvP172SsmLT0pp9e', '2023-11-01 19:19:52', 0),
(9, '', '3', 'palo@gmail.com', '', '$2y$10$AO0iNaBdRlXPqsYoTy5ipukhiXTFVz5YCjccZjIAknUXNFtssP0BC', '2023-11-07 23:42:58', 0),
(10, '', 'eze', 'lololo@gmail.com', '', '$2y$10$aWMiO/bO6e8mZ2kR47/TleRhqf7rua2zCs7s7fg.8DTTlebuCM7u.', '2023-11-10 22:10:24', 0),
(11, '', '1313', 'peapwe@gmail.com', '', '$2y$10$cxtcMxrJkKkbJcvn0Pq0A.sOvMkttF6XnzikH6ufGqWhqALVWzl8O', '2023-11-17 22:50:36', 0),
(12, '', '13123', 'adado@gmail.com', '', '$2y$10$b7wdOOYixqhU0bzm9lSsJ.bFAoCnLJdLRcz0E.I50lWWuekhsmLGK', '2023-11-17 22:55:50', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `barrio`
--
ALTER TABLE `barrio`
  ADD PRIMARY KEY (`id_barrio`);

--
-- Indices de la tabla `calle`
--
ALTER TABLE `calle`
  ADD PRIMARY KEY (`id_calle`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_dcompra`);

--
-- Indices de la tabla `direccion_ca`
--
ALTER TABLE `direccion_ca`
  ADD PRIMARY KEY (`id_direccion_casa`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_meotod_pago`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipoprod`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `barrio`
--
ALTER TABLE `barrio`
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `calle`
--
ALTER TABLE `calle`
  MODIFY `id_calle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_dcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `direccion_ca`
--
ALTER TABLE `direccion_ca`
  MODIFY `id_direccion_casa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_meotod_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipoprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
