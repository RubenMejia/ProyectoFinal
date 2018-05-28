-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2018 a las 19:43:23
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
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `administrador_encargados`;
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
-- Truncar tablas antes de insertar `administrador_encargados`
--

TRUNCATE TABLE `administrador_encargados`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_trabajador_a_terreno`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `asignar_trabajador_a_terreno`;
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
-- Truncar tablas antes de insertar `asignar_trabajador_a_terreno`
--

TRUNCATE TABLE `asignar_trabajador_a_terreno`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_usuario_a_terreno`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `asignar_usuario_a_terreno`;
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

--
-- Truncar tablas antes de insertar `asignar_usuario_a_terreno`
--

TRUNCATE TABLE `asignar_usuario_a_terreno`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `asistencia`;
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
-- Truncar tablas antes de insertar `asistencia`
--

TRUNCATE TABLE `asistencia`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- RELACIONES PARA LA TABLA `cargo`:
--

--
-- Truncar tablas antes de insertar `cargo`
--

TRUNCATE TABLE `cargo`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_a_trabajadores`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `pago_a_trabajadores`;
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
-- Truncar tablas antes de insertar `pago_a_trabajadores`
--

TRUNCATE TABLE `pago_a_trabajadores`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `persona`;
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
-- Truncar tablas antes de insertar `persona`
--

TRUNCATE TABLE `persona`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registo_asistencia`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `registo_asistencia`;
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
-- Truncar tablas antes de insertar `registo_asistencia`
--

TRUNCATE TABLE `registo_asistencia`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_trabajo_realizado`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `registro_trabajo_realizado`;
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
-- Truncar tablas antes de insertar `registro_trabajo_realizado`
--

TRUNCATE TABLE `registro_trabajo_realizado`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `terrenos`;
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
-- Truncar tablas antes de insertar `terrenos`
--

TRUNCATE TABLE `terrenos`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `trabajador`;
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
-- Truncar tablas antes de insertar `trabajador`
--

TRUNCATE TABLE `trabajador`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 28-05-2018 a las 17:39:03
--

DROP TABLE IF EXISTS `usuario`;
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
-- Truncar tablas antes de insertar `usuario`
--

TRUNCATE TABLE `usuario`;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignar_trabajador_a_terreno`
--
ALTER TABLE `asignar_trabajador_a_terreno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignar_usuario_a_terreno`
--
ALTER TABLE `asignar_usuario_a_terreno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago_a_trabajadores`
--
ALTER TABLE `pago_a_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registo_asistencia`
--
ALTER TABLE `registo_asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_trabajo_realizado`
--
ALTER TABLE `registro_trabajo_realizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
