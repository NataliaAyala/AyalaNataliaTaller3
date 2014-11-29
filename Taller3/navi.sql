-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2014 a las 05:08:51
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `navi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `lat` float(15,11) DEFAULT NULL,
  `lng` float(15,11) DEFAULT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `locations`
--

INSERT INTO `locations` (`id`, `name`, `lat`, `lng`, `tipo`) VALUES
(1, 'COmerPollo', 3.46585702896, -76.53031921387, 1),
(2, 'La Casona', 3.46804690361, -76.52946472168, 1),
(3, 'La tertulia', 3.46804690361, -76.52946472168, 2),
(4, 'Restaurante italiano', 3.45865702629, -76.53490447998, 1),
(5, 'Museo del cuervo', 3.45770907402, -76.53557586670, 2),
(6, 'Aeropuerto', 3.46063804626, -76.53337097168, 3),
(7, 'Museo Azul', 3.45889496803, -76.53266143799, 2),
(8, 'Restaurante Rubí', 3.45844602585, -76.52911376953, 1),
(9, 'Museo Zafiro', 3.45040798187, -76.53964233398, 2),
(10, 'Aeropuerto Verde', 3.45000791550, -76.54049682617, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locations`
--
ALTER TABLE `locations`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locations`
--
ALTER TABLE `locations`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
