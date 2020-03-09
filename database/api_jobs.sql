-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-03-2020 a las 20:01:18
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_jobs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id_client`, `name`, `lastname`, `phone`, `mail`) VALUES
(1, 'Francisco ', 'Roa', '+56932243182', 'franroav@gmail.com'),
(3, 'Rodrigo', 'Varas Couchot', '+56912549638', 'r.varas@gmail.com'),
(4, 'Pablo', 'Jara', '+56952356778', 'p.jara@gmail.com'),
(5, 'Axel', 'Campos', '+56924156789', 'a.campos@gmail.com'),
(6, 'Camila', 'Campos', '+56924123789', 'c.campos@gmail.com'),
(7, 'Christian', 'Peralta', '+56924156741', 'c.peralta@gmail.com'),
(8, 'Miguel', 'Leyton', '+56924789798', 'm.leyton@gmail.com'),
(9, 'Naima', 'Paredes', '+56932167589', 'n.paredes@gmail.com'),
(10, 'Jorgue', 'Araya', '+56924456789', 'j.araya@gmail.com'),
(11, 'Camilo', 'Williams', '+56936555647', 'c.williams@gmail.com'),
(12, 'Esteban', 'Henriquez', '+56946783249', 'e.henriquez@gmail.com'),
(13, 'Emilio', 'Tramon', '+56924456789', 'e.tramon@gmail.com'),
(14, 'Emilio', 'Luican', '+56989645731', 'e.luican@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_job_processor` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `last_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jobs`
--

INSERT INTO `jobs` (`id_job`, `id_client`, `id_job_processor`, `title`, `description`, `last_date`) VALUES
(1, 1, 1, 'Hidraulica', 'Cotizacion de bombas sumideros.', '2020-03-07 21:06:30'),
(2, 1, 2, 'Hidraulica', 'Cotizacion de accesorios y despiece bomba sumidero 526-g-PLC2 y 562-g-PLC3', '2020-03-07 21:12:32'),
(3, 1, 2, 'Hidraulica', 'Desarrollo de planos', '2020-03-07 22:42:59'),
(5, 3, 3, 'Medicina', 'Operacion de estomago', '2020-03-09 13:06:30'),
(6, 3, 3, 'Medicina', 'Operacion de Corazon', '2020-03-08 15:09:38'),
(7, 3, 3, 'Medicina', 'Operacion de Pulmones', '2020-03-09 16:06:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_processors`
--

CREATE TABLE `job_processors` (
  `id_processor` int(11) NOT NULL,
  `id_job_processor` int(11) NOT NULL,
  `priority_level` int(11) NOT NULL,
  `priority` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `job_processors`
--

INSERT INTO `job_processors` (`id_processor`, `id_job_processor`, `priority_level`, `priority`) VALUES
(1, 0, 0, '1st Priority'),
(2, 1, 1, '2nd Priority'),
(3, 2, 2, '3rd Priority'),
(4, 3, 3, '4th Priority'),
(5, 4, 4, '6th Priority'),
(6, 5, 5, '7th Priority');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_client` (`id_client`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD KEY `idx_client` (`id_client`),
  ADD KEY `idx_job_processor` (`id_job_processor`);

--
-- Indices de la tabla `job_processors`
--
ALTER TABLE `job_processors`
  ADD PRIMARY KEY (`id_processor`),
  ADD UNIQUE KEY `id_job_processor_2` (`id_job_processor`),
  ADD UNIQUE KEY `priority_level` (`priority_level`),
  ADD KEY `id_job_processor` (`id_job_processor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `job_processors`
--
ALTER TABLE `job_processors`
  MODIFY `id_processor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `idx_client` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idx_job_processor` FOREIGN KEY (`id_job_processor`) REFERENCES `job_processors` (`id_job_processor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
