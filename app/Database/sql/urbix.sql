-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2023 a las 04:07:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

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
(51, 51, 'ssdf');

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
(16, 'sfdsf');

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

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `id_user`, `id_producto`, `cantidad`) VALUES
(225, 3, 40, 1);

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
(51, 51, 'fdsfdsfds');

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
(50, 3, 1, 51, 150, '2023-11-29 19:33:30');

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
(60, 50, 38, 1, 150, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_ca`
--

CREATE TABLE `direccion_ca` (
  `id_direccion_casa` int(11) NOT NULL,
  `id_barrio` int(11) NOT NULL,
  `id_calle` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `descripcion_casa` varchar(175) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `direccion_ca`
--

INSERT INTO `direccion_ca` (`id_direccion_casa`, `id_barrio`, `id_calle`, `id_user`, `codigo_postal`, `numero`, `descripcion_casa`) VALUES
(51, 51, 16, 3, 32423, 32424, 'sfdsf');

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
(51, 'fssf');

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
(38, 'PRO KEYBOARD', 149.99, '1701302069_91e82f634837e8f5347c.png', 'The tournament-proven PRO design, now with your choice of swappable pro-grade GX mechanical switches: Clicky, Tactile an', 3),
(39, 'Urbix 413', 350.00, '1701302081_579c95b0c5ca81b8aaf7.png', 'From tactile mechanical switches to 6-key rollover anti-ghosting and PBT keycaps—the full-size G413 SE keyboard has the ', 3),
(40, 'Urbix 513', 445.99, '1701302091_7df9e35c8c7ff7d9a654.png', 'Advanced gaming keyboard featuring your choice of GX mechanical switches. The detachable, memory-foam palmrest and premi', 3),
(41, 'Urbix 715', 175.00, '1701302099_e24f3fb23931487e4392.png', 'Advanced gaming keyboard featuring your choice of GX mechanical switches. The detachable, memory-foam palmrest and premi', 3),
(42, 'Urbix 915', 450.50, '1701302105_5fb83b7ced156419e949.png', 'A breakthrough in design and engineering. LIGHTSPEED pro-grade wireless, advanced LIGHTSYNC RGB, and your choice in pro-', 3),
(43, 'Urbix 560', 1200.00, '1701302055_ec90f68b229675883730.png', '2.1 speaker system with full-spectrum LIGHTSYNC RGB reacts to in-game action and audio. DTS:X Ultra positional surround ', 6),
(44, 'Urbix Z623 SPEAKER SYSTEM', 995.99, '1701302048_5a5ee1b543afdfeb724c.png', 'More sound, more dimension. THX®-certified sound features 400 Watts Peak/200 Watts RMS power, adding richness to music, ', 6),
(45, 'Urbix MegaBoom 3', 2100.00, '1701302037_21cb1a947c91663ee51c.png', 'Introducing the MEGABOOM 3 —the ultimate portable party speaker! Blast your favorite tunes with powerful, Hi-Fi sound th', 6),
(46, 'Pro x Superlight 2', 150.00, '1701301695_4c0a1170846b2ec98c99.png', 'The next evolution of our championship-winning mouse. Meet the new weapon of choice for the world’s top esports athletes', 5),
(47, 'PRO X', 185.00, '1701301686_6b7b70f69cf68ab54f59.png', 'Less than 63 grams. Advanced low-latency LIGHTSPEED wireless. Sub-micron precision with HERO 25K sensor. Remove all obst', 5),
(48, 'Urbix 502 x plus', 159.99, '1701301675_43131a9594399150a492.png', 'G502 X PLUS is the latest addition to legendary G502 lineage. Reinvented with our first-ever LIGHTFORCE hybrid switches,', 5),
(49, 'Urbix 502', 89.99, '1701301666_81c07f2beb1afd2e98e6.png', 'Iconic G502 design meets pro-grade LIGHTSPEED wireless for ultra-fast, reliable connectivity. HERO 25K sensor features s', 5),
(50, 'Urbix 705', 79.99, '1701301658_b7a16e2813d832deb81d.png', 'From the Aurora Collection, G705 Wireless Gaming Mouse is contoured for comfort and control with an intentional design t', 5),
(51, 'Snowball-Ice', 49.99, '1701205346_27dac2575b9f1133c88f.png', 'From the Aurora Collection, G705 Wireless Gaming Mouse is contoured for comfort and control with an intentional design t', 7),
(52, 'YETI-ORB', 59.99, '1701205387_9a12033266c918ebed40.png', 'Logitech G Yeti Orb is a premium gaming microphone with LIGHTSYNC RGB, a condenser capsule optimized for game streaming,', 7),
(53, 'YETI-URBIX X', 149.99, '1701205418_4ce0c5d5844ab8810fe3.png', 'Logitech G Yeti Orb is a premium gaming microphone with LIGHTSYNC RGB, a condenser capsule optimized for game streaming,', 7),
(54, 'YETI X', 139.99, '1701205497_f635332446e078b9c0c9.png', 'Yeti X is a state-of-the-art flagship USB microphone for professional gaming, Twitch streaming, podcasting and YouTube p', 7),
(55, 'PRO X 2 LIGHTSPEED', 249.99, '1701301514_36327a003c6f28582e7e.png', 'Designed with pros for the highest levels of competition.', 4),
(56, 'Urbix 735', 159.99, '1701301503_fcf5f883088f5527221a.png', 'From the Aurora Collection, G735 maximizes comfort and fit for all gamers inclusive of smaller head sizes. ', 4),
(57, 'ASTRO A50 WIRELESS + BASE STATION', 299.99, '1701301461_a5661e51e1df7f54af10.png', 'With revolutionary design, advanced acoustics and ergonomic comfort, A50 Wireless + Base Station delivers an unforgettab', 4);

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
(51, 51, 'fsdffdsf');

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
(3, 'Keyboards'),
(4, 'Headphones'),
(5, 'Mouses'),
(6, 'Speakers'),
(7, 'Microphones');

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
(3, '1701313482_0188a9f0c433c92a1992.gif', 'Admin', '1@admin', 'soy admin', '$2y$10$Bp9uTakfhLhZwsRDB65Yd.QAUh5uAS4jEs8FvatYe/d36qahUkWRK', '0000-00-00 00:00:00', 1);

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
  MODIFY `id_barrio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `calle`
--
ALTER TABLE `calle`
  MODIFY `id_calle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `id_dcompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `direccion_ca`
--
ALTER TABLE `direccion_ca`
  MODIFY `id_direccion_casa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_meotod_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipoprod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
