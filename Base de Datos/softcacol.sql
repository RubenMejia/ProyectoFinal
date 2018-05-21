-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2018 a las 06:21:23
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softcacol`
--
CREATE DATABASE IF NOT EXISTS `softcacol` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `softcacol`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_encargados`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `administrador_encargados` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_encargado` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `administrador_encargados`:
--   `id_usuario`
--       `usuario` -> `nombre_usuario`
--   `id_encargado`
--       `usuario` -> `nombre_usuario`
--

--
-- Volcado de datos para la tabla `administrador_encargados`
--

INSERT INTO `administrador_encargados` (`id`, `id_usuario`, `id_encargado`) VALUES
(1, 'deividasccc1', 'danka');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_trabajador_a_terreno`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `asignar_trabajador_a_terreno` (
  `id` int(11) NOT NULL,
  `id_terreno` int(11) NOT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `asignar_trabajador_a_terreno`:
--   `id_trabajador`
--       `trabajador` -> `id`
--   `id_terreno`
--       `terrenos` -> `id`
--

--
-- Volcado de datos para la tabla `asignar_trabajador_a_terreno`
--

INSERT INTO `asignar_trabajador_a_terreno` (`id`, `id_terreno`, `id_trabajador`) VALUES
(1, 6, 23),
(2, 6, 25),
(11, 6, 24),
(12, 6, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_usuario_a_terreno`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `asignar_usuario_a_terreno` (
  `id` int(11) NOT NULL,
  `id_terreno` int(11) NOT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `asignar_usuario_a_terreno`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--   `id_terreno`
--       `terrenos` -> `id`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `asistencia`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `nombre_usuario`, `fecha`) VALUES
(2, 'rdaj', '2018-05-18'),
(3, 'userAdmin', '2018-05-19'),
(4, 'userAdmin', '2018-05-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `cargo`:
--

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `tipo`) VALUES
(1, 'Recolector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_a_trabajadores`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `pago_a_trabajadores` (
  `id` int(11) NOT NULL,
  `comprobante` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cantidad_pago` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `pago_a_trabajadores`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--   `id_trabajador`
--       `trabajador` -> `id`
--

--
-- Volcado de datos para la tabla `pago_a_trabajadores`
--

INSERT INTO `pago_a_trabajadores` (`id`, `comprobante`, `cantidad_pago`, `fecha`, `id_trabajador`, `nombre_usuario`) VALUES
(1, NULL, 70000, '2018-05-19', 28, 'userAdmin'),
(2, NULL, 70000, '2018-05-19', 23, 'userAdmin'),
(3, NULL, 50000, '2018-05-19', 25, 'userAdmin'),
(4, NULL, 50000, '2018-05-19', 24, 'userAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `nombre_empresa` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `persona`:
--

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellidos`, `telefono`, `nombre_empresa`) VALUES
(1, 'ddavid', 'sadasdasd', 0, NULL),
(2, 'AVID', 'ASASD', 1234, NULL),
(3, 'dasd', 'asdasda', 2321321, NULL),
(4, 'David', 'david', 2345, NULL),
(5, 'David', 'david', 2345, NULL),
(6, 'rdaj', 'rdaj', 31232, NULL),
(7, 'rdaj', 'rdaj', 3123, NULL),
(8, 'jhan', 'jhan', 322, NULL),
(9, 'mario', 'caballero', 3122233, NULL),
(10, 'user', 'admin', 123, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registo_asistencia`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `registo_asistencia` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_asistencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `registo_asistencia`:
--   `id_asistencia`
--       `asistencia` -> `id`
--   `id_trabajador`
--       `trabajador` -> `id`
--

--
-- Volcado de datos para la tabla `registo_asistencia`
--

INSERT INTO `registo_asistencia` (`id`, `fecha`, `id_trabajador`, `id_asistencia`) VALUES
(24, '2018-05-18', 20, 2),
(25, '2018-05-18', 21, 2),
(26, '2018-05-18', 22, 2),
(35, '2018-05-19', 23, 3),
(39, '2018-05-19', 24, 3),
(40, '2018-05-19', 25, 3),
(41, '2018-05-19', 28, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_trabajo_realizado`
--
-- Creación: 20-05-2018 a las 04:05:55
--

CREATE TABLE `registro_trabajo_realizado` (
  `id` int(11) NOT NULL,
  `kilos_de_cafe` bigint(20) DEFAULT NULL,
  `descripcion` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_terreno` int(11) DEFAULT NULL,
  `estado` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `registro_trabajo_realizado`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--   `id_trabajador`
--       `trabajador` -> `id`
--   `id_terreno`
--       `terrenos` -> `id`
--

--
-- Volcado de datos para la tabla `registro_trabajo_realizado`
--

INSERT INTO `registro_trabajo_realizado` (`id`, `kilos_de_cafe`, `descripcion`, `fecha`, `nombre_usuario`, `id_trabajador`, `id_terreno`, `estado`) VALUES
(2, NULL, NULL, '2018-05-18', 'rdaj', NULL, 2, ''),
(3, NULL, NULL, '2018-05-18', 'rdaj1', NULL, 3, ''),
(4, NULL, NULL, '2018-05-18', 'jhan', NULL, 4, ''),
(5, NULL, NULL, '2018-05-18', 'mario', NULL, 5, ''),
(6, NULL, NULL, '2018-05-19', 'userAdmin', NULL, 6, 'activo'),
(7, NULL, NULL, '2018-05-20', 'userAdmin', NULL, 6, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `terrenos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `terrenos`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--

--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`id`, `nombre`, `nombre_usuario`) VALUES
(2, 'rdaj', 'rdaj'),
(3, 'rdaj1', 'rdaj1'),
(4, 'jhan', 'jhan'),
(5, 'Terrenomario', 'mario'),
(6, 'MiTerreno', 'userAdmin'),
(7, 'OtroTerreno', 'userAdmin'),
(8, 'OtroTerreno:V', 'userAdmin'),
(9, 'La comparsa', 'userAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `tipo_trabajador` text COLLATE utf8mb4_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `trabajador`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--   `id_cargo`
--       `cargo` -> `id`
--

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombres`, `apellidos`, `telefono`, `nombre_usuario`, `id_cargo`, `tipo_trabajador`) VALUES
(18, 'David', 'Gonzalez Manrique', 3142258, 'rdaj1', 1, 'trabajador'),
(19, 'Jhan', 'Jhandsd', 3222, 'jhan', 1, 'trabajador'),
(20, 'ruben', 'mejia romero', 3145567, 'mario', 1, 'trabajador'),
(21, 'Land', 'Robert', 32347828, 'mario', 1, 'trabajador'),
(22, 'David', 'Gomez', 213710, 'mario', 1, 'trabajador'),
(23, 'Trabajador1', 'Apellido Trabajador', 3454357, 'userAdmin', 1, 'trabajador'),
(24, 'Trabajador2', 'Apellido Trabajador2', 3454357, 'userAdmin', 1, 'trabajador'),
(25, 'Trabajador3', 'Apellido Trabajador3', 3454357, 'userAdmin', 1, 'trabajador'),
(26, 'Trabajador4', 'Apellido Trabajador4', 3454357, 'userAdmin', 1, 'trabajador'),
(27, 'Trabajador5', 'Apellido Trabajador5', 3454357, 'userAdmin', 1, 'trabajador'),
(28, 'Jose Andres', 'Mejia Romero', 3015896574, 'userAdmin', 1, 'trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 19-05-2018 a las 04:16:29
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto_perfil` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `tipo_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `usuario`:
--   `id_persona`
--       `persona` -> `id`
--

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `password`, `foto_perfil`, `tipo_usuario`, `id_persona`) VALUES
('danka', 'danka', 'null', 'encargado', 3),
('deividasccc1', 'david123', 'null', 'administrador', 1),
('jhan', 'jhan', '../views/dist/img/images_users/user.png', 'administrador', 8),
('mario', 'mario', '../views/dist/img/images_users/user.png', 'administrador', 9),
('rdaj', 'rdaj', '../views/dist/img/images_users/user.png', 'administrador', 6),
('rdaj1', 'rdaj', '../views/dist/img/images_users/user.png', 'administrador', 7),
('userAdmin', '123', '../views/dist/img/images_users/user.png', 'administrador', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador_encargados`
--
ALTER TABLE `administrador_encargados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_encargado` (`id_encargado`);

--
-- Indices de la tabla `asignar_trabajador_a_terreno`
--
ALTER TABLE `asignar_trabajador_a_terreno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_trabajador` (`id_trabajador`),
  ADD KEY `id_terreno` (`id_terreno`);

--
-- Indices de la tabla `asignar_usuario_a_terreno`
--
ALTER TABLE `asignar_usuario_a_terreno`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_terreno` (`id_terreno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago_a_trabajadores`
--
ALTER TABLE `pago_a_trabajadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registo_asistencia`
--
ALTER TABLE `registo_asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_asistencia` (`id_asistencia`),
  ADD KEY `id_trabajador` (`id_trabajador`);

--
-- Indices de la tabla `registro_trabajo_realizado`
--
ALTER TABLE `registro_trabajo_realizado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_trabajador` (`id_trabajador`),
  ADD KEY `id_terreno` (`id_terreno`);

--
-- Indices de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombre_usuario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador_encargados`
--
ALTER TABLE `administrador_encargados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asignar_trabajador_a_terreno`
--
ALTER TABLE `asignar_trabajador_a_terreno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `asignar_usuario_a_terreno`
--
ALTER TABLE `asignar_usuario_a_terreno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pago_a_trabajadores`
--
ALTER TABLE `pago_a_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `registo_asistencia`
--
ALTER TABLE `registo_asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `registro_trabajo_realizado`
--
ALTER TABLE `registro_trabajo_realizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador_encargados`
--
ALTER TABLE `administrador_encargados`
  ADD CONSTRAINT `administrador_encargados_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `administrador_encargados_ibfk_2` FOREIGN KEY (`id_encargado`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignar_trabajador_a_terreno`
--
ALTER TABLE `asignar_trabajador_a_terreno`
  ADD CONSTRAINT `asignar_trabajador_a_terreno_ibfk_1` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignar_trabajador_a_terreno_ibfk_2` FOREIGN KEY (`id_terreno`) REFERENCES `terrenos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignar_usuario_a_terreno`
--
ALTER TABLE `asignar_usuario_a_terreno`
  ADD CONSTRAINT `asignar_usuario_a_terreno_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignar_usuario_a_terreno_ibfk_2` FOREIGN KEY (`id_terreno`) REFERENCES `terrenos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago_a_trabajadores`
--
ALTER TABLE `pago_a_trabajadores`
  ADD CONSTRAINT `pago_a_trabajadores_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pago_a_trabajadores_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registo_asistencia`
--
ALTER TABLE `registo_asistencia`
  ADD CONSTRAINT `registo_asistencia_ibfk_1` FOREIGN KEY (`id_asistencia`) REFERENCES `asistencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registo_asistencia_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_trabajo_realizado`
--
ALTER TABLE `registro_trabajo_realizado`
  ADD CONSTRAINT `registro_trabajo_realizado_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_trabajo_realizado_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_trabajo_realizado_ibfk_3` FOREIGN KEY (`id_terreno`) REFERENCES `terrenos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `terrenos`
--
ALTER TABLE `terrenos`
  ADD CONSTRAINT `terrenos_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD CONSTRAINT `trabajador_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trabajador_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
