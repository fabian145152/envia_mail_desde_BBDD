-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-01-2022 a las 13:49:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aa01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manda_email`
--

CREATE TABLE `manda_email` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `cel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `manda_email`
--

INSERT INTO `manda_email` (`id`, `nombre`, `email`, `cel`) VALUES
(1, 'fabian                        ', 'fabian_12345@hotmail.com      ', '1169356236'),
(2, 'labo', 'laboratorio.fabian@gmail.com', '1169356236'),
(3, 'Cucho', 'cucho@gmail.com', '1156892356'),
(4, 'Jorge', 'jorge@gmail.com', '1178451245'),
(5, 'Alberto', 'alberto@gmail.com', '1145125623'),
(6, 'Carlos', 'carlos@gmail.com', '1158475236'),
(14, 'Fabian Nogueroles', 'fabian_12345@hotmail.com', '1158475236'),
(15, 'Anchorena', 'anchorena@gmail.com', '1145124512'),
(16, 'Mendizabal', 'mendizabal@gmail.com', '145785689'),
(17, 'Mendizabal', 'mendizabal@gmail.com', '145785689'),
(18, 'Calixto', 'calixto44@gmail.com', '78451245'),
(23, 'Jeremy                        ', 'Jeremy@gmail.com              ', '1155555555');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `manda_email`
--
ALTER TABLE `manda_email`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `manda_email`
--
ALTER TABLE `manda_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
