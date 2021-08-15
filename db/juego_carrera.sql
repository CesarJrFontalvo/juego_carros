-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-08-2021 a las 18:21:50
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juego_carrera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carril`
--

CREATE TABLE `carril` (
  `id` int(11) NOT NULL,
  `id_carro` int(11) DEFAULT NULL,
  `desplazamiento` int(11) DEFAULT '0',
  `id_pista` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carril`
--

INSERT INTO `carril` (`id`, `id_carro`, `desplazamiento`, `id_pista`) VALUES
(1, 0, 0, 1),
(2, 0, 0, 1),
(3, 0, 0, 1),
(4, 0, 0, 2),
(5, 0, 0, 2),
(6, 0, 0, 2),
(7, 0, 0, 2),
(8, 0, 0, 3),
(9, 0, 0, 3),
(10, 0, 0, 3),
(11, 0, 0, 3),
(12, 0, 0, 3),
(13, 0, 0, 4),
(14, 0, 0, 4),
(15, 0, 0, 4),
(16, 0, 0, 4),
(17, 0, 0, 4),
(18, 0, 0, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `color` varchar(50) NOT NULL,
  `id_conductor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`id`, `color`, `id_conductor`) VALUES
(1, 'Amarillo', 1),
(2, 'Azul', 2),
(3, 'Violeta', 3),
(4, 'Negro', 4),
(5, 'Blanco', 5),
(6, 'Verde', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_jugador` int(11) DEFAULT NULL,
  `escogido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`id`, `nombre`, `id_jugador`, `escogido`) VALUES
(1, 'Lois', 0, 0),
(2, 'Cj', 0, 0),
(3, 'Dayana', 0, 0),
(4, 'Michel', 0, 0),
(5, 'Andres', 0, 0),
(6, 'Enma', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id` int(11) NOT NULL,
  `id_Pista` int(11) NOT NULL,
  `id_Podio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id`, `id_Pista`, `id_Podio`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `primerLugar` int(11) NOT NULL,
  `estaJugando` tinyint(1) NOT NULL DEFAULT '0',
  `turno` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `primerLugar`, `estaJugando`, `turno`) VALUES
(1, 'Jugador 1', 0, 0, 0),
(2, 'Jugador 2', 1, 0, 0),
(3, 'Jugador 3', 0, 0, 0),
(4, 'Jugador 4', 0, 0, 0),
(5, 'Jugador 5', 0, 0, 0),
(6, 'Jugador 6', 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pista`
--

CREATE TABLE `pista` (
  `id` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `carriles` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pista`
--

INSERT INTO `pista` (`id`, `km`, `carriles`, `nombre`) VALUES
(1, 2, 3, 'Grand Prix'),
(2, 2, 4, 'GP San Marino'),
(3, 2, 5, 'GP Brasil '),
(4, 2, 6, 'Gran Premio de Monaco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `podio`
--

CREATE TABLE `podio` (
  `id` int(11) NOT NULL,
  `jugadorPrimero` int(11) DEFAULT NULL,
  `jugadorSegundo` int(11) DEFAULT NULL,
  `jugadorTercero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `podio`
--

INSERT INTO `podio` (`id`, `jugadorPrimero`, `jugadorSegundo`, `jugadorTercero`) VALUES
(1, 2, 6, 4),
(2, 6, 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carril`
--
ALTER TABLE `carril`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pista` (`id_pista`);

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_conductor` (`id_conductor`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pista`
--
ALTER TABLE `pista`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `podio`
--
ALTER TABLE `podio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carril`
--
ALTER TABLE `carril`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pista`
--
ALTER TABLE `pista`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `podio`
--
ALTER TABLE `podio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carril`
--
ALTER TABLE `carril`
  ADD CONSTRAINT `carril_ibfk_1` FOREIGN KEY (`id_pista`) REFERENCES `pista` (`id`);

--
-- Filtros para la tabla `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `carro_ibfk_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
