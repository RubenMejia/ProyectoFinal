-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-05-2018 a las 18:58:37
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
CREATE DATABASE IF NOT EXISTS `softcacol` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `softcacol`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_trabajador_a_terreno`
--
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `asignar_trabajador_a_terreno` (
  `id` int(11) NOT NULL,
  `id_terreno` int(11) NOT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `asignar_usuario_a_terreno` (
  `id` int(11) NOT NULL,
  `id_terreno` int(11) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `cargo`:
--

--
-- Truncar tablas antes de insertar `cargo`
--

TRUNCATE TABLE `cargo`;
--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `tipo`) VALUES
(1, 'Guadañador'),
(2, 'Recolector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago_a_trabajadores`
--
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `pago_a_trabajadores` (
  `id` int(11) NOT NULL,
  `comprobante` varchar(40) DEFAULT NULL,
  `cantidad_pago` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Creación: 16-04-2018 a las 14:31:04
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `persona`:
--

--
-- Truncar tablas antes de insertar `persona`
--

TRUNCATE TABLE `persona`;
--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nombres`, `apellidos`, `telefono`, `nombre_empresa`) VALUES
(40, 'user', 'admin', 3015638388, NULL),
(62, 'Ruben', 'Mejia', 3015638388, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registo_asistencia`
--
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `registo_asistencia` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_asistencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `registro_trabajo_realizado` (
  `id` int(11) NOT NULL,
  `kilos_de_cafe` bigint(20) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `registro_trabajo_realizado`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--   `id_trabajador`
--       `trabajador` -> `id`
--

--
-- Truncar tablas antes de insertar `registro_trabajo_realizado`
--

TRUNCATE TABLE `registro_trabajo_realizado`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `terrenos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELACIONES PARA LA TABLA `terrenos`:
--   `nombre_usuario`
--       `usuario` -> `nombre_usuario`
--

--
-- Truncar tablas antes de insertar `terrenos`
--

TRUNCATE TABLE `terrenos`;
--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`id`, `nombre`, `nombre_usuario`) VALUES
(3, 'Terreno', 'userAdmin'),
(7, 'La comparsa', 'RubenMejia'),
(8, 'Comparsa2', 'RubenMejia'),
(9, 'Comparsa3', 'RubenMejia'),
(10, 'OtroTerreno', 'userAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--
-- Creación: 11-05-2018 a las 16:23:17
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `tipo_trabajador` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombres`, `apellidos`, `telefono`, `nombre_usuario`, `id_cargo`, `tipo_trabajador`) VALUES
(1, 'Trabajador1', 'Apellido', 3217225482, 'userAdmin', 1, 'trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--
-- Creación: 16-04-2018 a las 14:21:55
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `foto_perfil` varchar(40) DEFAULT NULL,
  `tipo_usuario` varchar(40) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `password`, `foto_perfil`, `tipo_usuario`, `id_persona`) VALUES
('RubenMejia', '123', '../views/dist/img/images_users/user.png', 'administrador', 62),
('userAdmin', '123', '../views/dist/img/images_users/user.png', 'administrador', 40);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `id_trabajador` (`id_trabajador`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pago_a_trabajadores`
--
ALTER TABLE `pago_a_trabajadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

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
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`);

--
-- Filtros para la tabla `pago_a_trabajadores`
--
ALTER TABLE `pago_a_trabajadores`
  ADD CONSTRAINT `pago_a_trabajadores_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`),
  ADD CONSTRAINT `pago_a_trabajadores_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`);

--
-- Filtros para la tabla `registo_asistencia`
--
ALTER TABLE `registo_asistencia`
  ADD CONSTRAINT `registo_asistencia_ibfk_1` FOREIGN KEY (`id_asistencia`) REFERENCES `asistencia` (`id`),
  ADD CONSTRAINT `registo_asistencia_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`);

--
-- Filtros para la tabla `registro_trabajo_realizado`
--
ALTER TABLE `registro_trabajo_realizado`
  ADD CONSTRAINT `registro_trabajo_realizado_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_trabajo_realizado_ibfk_2` FOREIGN KEY (`id_trabajador`) REFERENCES `trabajador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
