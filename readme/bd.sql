-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-03-2025 a las 22:44:32
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `epico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epico_categories`
--

CREATE TABLE `epico_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `epico_categories`
--

INSERT INTO `epico_categories` (`id`, `name`) VALUES
(1, 'Aseo'),
(2, 'Lacteos'),
(4, 'Abarrotes'),
(5, 'Licores'),
(6, 'Panaderia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `epico_items`
--

CREATE TABLE `epico_items` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `cost_price` decimal(15,2) DEFAULT NULL,
  `unit_price` decimal(15,2) DEFAULT NULL,
  `pic_filename` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `epico_items`
--

INSERT INTO `epico_items` (`id`, `name`, `category_id`, `cost_price`, `unit_price`, `pic_filename`) VALUES
(30, 'cepillo', 1, '2345.00', '3000.00', 'C:\\fakepath\\1.docx'),
(39, 'Aceite olesoya', 4, '5000.00', '6700.00', 'C:\\fakepath\\1.docx'),
(40, 'Aguardiente BLANCO DEL VALLE', 5, '15000.00', '40000.00', 'C:\\fakepath\\1.docx'),
(41, 'Pan Frances', 6, '1000.00', '2000.00', 'C:\\fakepath\\1.docx');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `epico_categories`
--
ALTER TABLE `epico_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `epico_items`
--
ALTER TABLE `epico_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `epico_categories`
--
ALTER TABLE `epico_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `epico_items`
--
ALTER TABLE `epico_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `epico_items`
--
ALTER TABLE `epico_items`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `epico_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
