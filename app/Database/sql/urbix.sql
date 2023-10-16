-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2023 a las 01:13:34
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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id_carrito`, `nombre`, `cantidad`, `precio`, `imagen`) VALUES
(62, 'gygabite', 17, 0.00, '1697034966_9cd9081e7aeb8fa812a9.png'),
(63, '111111', 0, 242.00, ''),
(64, '111111', 0, 242.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_prod`
--

CREATE TABLE `descripcion_prod` (
  `id_descripcion_prod` int(11) NOT NULL,
  `descripcion_prod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `id_descripcion_prod` int(11) NOT NULL,
  `id_tipoprod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teclados`
--

CREATE TABLE `teclados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `teclados`
--

INSERT INTO `teclados` (`id`, `nombre`, `precio`, `imagen`) VALUES
(32, 'pepe', 0.00, '1697491287_d26872739e740491ad8b.jpg'),
(33, 'pepe123456', 0.00, '1697491298_c0e046ff52972a350d12.jpeg'),
(34, 'hola123', 0.00, '1697491364_bf2e004f8d0bfc13a71e.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id_tipoprod` int(11) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `perfil` varchar(255) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `perfil`, `name`, `email`, `bio`, `password`, `created_at`, `updated_at`, `rol`) VALUES
(3, '1697492315_70f3a27594800faeeca5.png', 'tiago', 'tiagocomba@gmail.com', 'hola, soy tiago comba desarrollador fronted.', '$2y$10$Bp9uTakfhLhZwsRDB65Yd.QAUh5uAS4jEs8FvatYe/d36qahUkWRK', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(5, '', 'hh', '', '', '$2y$10$jXlVn1lg46wOXzY2GLdEYuH1mjrm6gYTyNJ6WyaqhfR3qdQ.NCVlu', '2023-10-11 14:29:29', '2023-10-11 14:29:29', 0),
(6, '', '345', '', '', '$2y$10$L97xbGBYvRnQxOrQxD/szegUzf873YE2shcbBrUDijayeZ10JhpfS', '2023-10-16 16:35:07', '2023-10-16 16:35:07', 0),
(7, '', '12345', '', '', '$2y$10$LeuwGNC3h9T5K0aQX26Oxu0WAItYIP.SfmGn4H.lUeuTZZCrcFOpy', '2023-10-16 17:49:25', '2023-10-16 17:49:25', 0),
(8, '', 'tiago comba', 'tiagocomba@gmail.com', '', '$2y$10$snH99gijr.x/rT0tkbV7Q./rOm2jhsKfnK5PzCBHDTMGQI4tiTi3e', '2023-10-16 17:51:31', '2023-10-16 17:51:31', 0),
(9, '1697490751_14ce9774e1cb87474b8b.jpg', 'pedro', 'pedro@gmail.com', 'hola soy pedro', '$2y$10$/cmRHzGFB555S63bdchVweP/G3b/j0tja1RQ8FFO5337qeZBYv5sO', '2023-10-16 21:09:58', '2023-10-16 21:09:58', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `descripcion_prod`
--
ALTER TABLE `descripcion_prod`
  ADD PRIMARY KEY (`id_descripcion_prod`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `teclados`
--
ALTER TABLE `teclados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipoprod`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `descripcion_prod`
--
ALTER TABLE `descripcion_prod`
  MODIFY `id_descripcion_prod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `teclados`
--
ALTER TABLE `teclados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_tipoprod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
