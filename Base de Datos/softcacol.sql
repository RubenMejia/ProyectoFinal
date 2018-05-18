-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2018 a las 17:59:41
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador_encargados`
--

CREATE TABLE `administrador_encargados` (
  `id` int(11) NOT NULL,
  `id_usuario` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `id_encargado` varchar(40) COLLATE utf8mb4_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_trabajador_a_terreno`
--

CREATE TABLE `asignar_trabajador_a_terreno` (
  `id_terreno` int(11) NOT NULL,
  `id_trabajador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignar_trabajador_a_terreno`
--

INSERT INTO `asignar_trabajador_a_terreno` (`id_terreno`, `id_trabajador`) VALUES
(3, 1),
(3, 9),
(3, 2),
(10, 9),
(10, 10),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_usuario_a_terreno`
--

CREATE TABLE `asignar_usuario_a_terreno` (
  `id` int(11) NOT NULL,
  `id_terreno` int(11) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `nombre_usuario`, `fecha`) VALUES
(12, 'userAdmin', '2018-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `tipo` varchar(40) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `pago_a_trabajadores` (
  `id` int(11) NOT NULL,
  `comprobante` varchar(40) DEFAULT NULL,
  `cantidad_pago` bigint(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `nombres` varchar(40) DEFAULT NULL,
  `apellidos` varchar(40) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `registo_asistencia` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_asistencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registo_asistencia`
--

INSERT INTO `registo_asistencia` (`id`, `fecha`, `id_trabajador`, `id_asistencia`) VALUES
(65, '2018-05-18', 9, 12),
(66, '2018-05-18', 1, 12),
(67, '2018-05-18', 10, 12),
(68, '2018-05-18', 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_trabajo_realizado`
--

CREATE TABLE `registro_trabajo_realizado` (
  `id` int(11) NOT NULL,
  `kilos_de_cafe` bigint(20) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `id_terreno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_trabajo_realizado`
--

INSERT INTO `registro_trabajo_realizado` (`id`, `kilos_de_cafe`, `descripcion`, `fecha`, `nombre_usuario`, `id_trabajador`, `id_terreno`) VALUES
(14, NULL, NULL, '2018-05-17', 'userAdmin', NULL, 3),
(15, NULL, NULL, '2018-05-18', 'userAdmin', NULL, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terrenos`
--

CREATE TABLE `terrenos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `nombre_usuario` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `terrenos`
--

INSERT INTO `terrenos` (`id`, `nombre`, `nombre_usuario`) VALUES
(3, 'Terreno', 'userAdmin'),
(7, 'La comparsa', 'RubenMejia'),
(8, 'Comparsa2', 'RubenMejia'),
(9, 'Comparsa3', 'RubenMejia'),
(10, 'OtroTerrenoxD', 'userAdmin'),
(12, 'NuevoTerreno', 'userAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
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
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombres`, `apellidos`, `telefono`, `nombre_usuario`, `id_cargo`, `tipo_trabajador`) VALUES
(1, 'Trabajador1', 'Apellido', 3217225482, 'userAdmin', 2, 'trabajador'),
(2, 'Trabajador2', 'Apellido', 3212311, 'userAdmin', 1, 'trabajador'),
(9, 'Trabajador3', 'Apellido', 3333335, 'userAdmin', 2, 'trabajador'),
(10, 'Jose', 'Ortiz', 3454357, 'userAdmin', 1, 'trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre_usuario` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `foto_perfil` varchar(40) DEFAULT NULL,
  `tipo_usuario` varchar(40) DEFAULT NULL,
  `id_persona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD KEY `fk_terrenos` (`id_terreno`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `asignar_usuario_a_terreno`
--
ALTER TABLE `asignar_usuario_a_terreno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `registro_trabajo_realizado`
--
ALTER TABLE `registro_trabajo_realizado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `terrenos`
--
ALTER TABLE `terrenos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `fk_terrenos` FOREIGN KEY (`id_terreno`) REFERENCES `terrenos` (`id`),
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
