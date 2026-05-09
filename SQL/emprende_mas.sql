-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1  
-- Tiempo de generación: 07-05-2026 a las 19:11:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emprende_mas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id_estado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`, `descripcion`) VALUES
(1, 'activo', 'Activo'),
(2, 'inactivo', 'Inactivo'),
(3, 'ganador', 'Ya ganó'),
(4, 'pendiente', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `diseno` varchar(50) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento_premio`
--

CREATE TABLE `evento_premio` (
  `id_evento` int(11) NOT NULL,
  `id_premio` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galerias`
--

CREATE TABLE `galerias` (
  `id_galeria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganadores`
--

CREATE TABLE `ganadores` (
  `id_ganador` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_premio` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `id_participante` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre`, `descripcion`) VALUES
(1, 'ver_usuarios', 'Ver usuarios'),
(2, 'crear_usuarios', 'Crear usuarios'),
(3, 'editar_usuarios', 'Editar usuarios'),
(4, 'eliminar_usuarios', 'Eliminar usuarios'),
(5, 'ver_eventos', 'Ver eventos'),
(6, 'crear_eventos', 'Crear eventos'),
(7, 'editar_eventos', 'Editar eventos'),
(8, 'eliminar_eventos', 'Eliminar eventos'),
(9, 'usar_ruleta', 'Usar ruleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `id_premio` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_galeria` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premio_imagen`
--

CREATE TABLE `premio_imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_premio` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_evento`
--

CREATE TABLE `registro_evento` (
  `id_registro` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`) VALUES
(1, 'admin'),
(2, 'operador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_permiso`
--

CREATE TABLE `rol_permiso` (
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol_permiso`
--

INSERT INTO `rol_permiso` (`id_rol`, `id_permiso`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `email`, `username`, `password`, `id_estado`, `created_at`) VALUES
(1, 1, 'caleb@dev.com', 'Caleb Ingeniero', '$2y$10$kYZBG2JT0c4FFz8XbiUZfOJESXon5utaVLY1gyXWTppcfEh0uQScS', 1, '2026-05-05 21:23:53');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `fk_evento_estado` (`id_estado`);

--
-- Indices de la tabla `evento_premio`
--
ALTER TABLE `evento_premio`
  ADD PRIMARY KEY (`id_evento`,`id_premio`),
  ADD KEY `fk_ep_premio` (`id_premio`);

--
-- Indices de la tabla `galerias`
--
ALTER TABLE `galerias`
  ADD PRIMARY KEY (`id_galeria`);

--
-- Indices de la tabla `ganadores`
--
ALTER TABLE `ganadores`
  ADD PRIMARY KEY (`id_ganador`),
  ADD KEY `fk_gan_evento` (`id_evento`),
  ADD KEY `fk_gan_participante` (`id_participante`),
  ADD KEY `fk_gan_premio` (`id_premio`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id_participante`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`id_premio`),
  ADD KEY `fk_premio_galeria` (`id_galeria`);

--
-- Indices de la tabla `premio_imagen`
--
ALTER TABLE `premio_imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_img_premio` (`id_premio`);

--
-- Indices de la tabla `registro_evento`
--
ALTER TABLE `registro_evento`
  ADD PRIMARY KEY (`id_registro`),
  ADD UNIQUE KEY `uk_evento_participante` (`id_evento`,`id_participante`),
  ADD KEY `fk_reg_participante` (`id_participante`),
  ADD KEY `fk_reg_estado` (`id_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD PRIMARY KEY (`id_rol`,`id_permiso`),
  ADD KEY `fk_rolperm_perm` (`id_permiso`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_usuario_rol` (`id_rol`),
  ADD KEY `fk_usuario_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galerias`
--
ALTER TABLE `galerias`
  MODIFY `id_galeria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ganadores`
--
ALTER TABLE `ganadores`
  MODIFY `id_ganador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id_participante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `id_premio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `premio_imagen`
--
ALTER TABLE `premio_imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_evento`
--
ALTER TABLE `registro_evento`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `fk_evento_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento_premio`
--
ALTER TABLE `evento_premio`
  ADD CONSTRAINT `fk_ep_evento` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ep_premio` FOREIGN KEY (`id_premio`) REFERENCES `premios` (`id_premio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ganadores`
--
ALTER TABLE `ganadores`
  ADD CONSTRAINT `fk_gan_evento` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gan_participante` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id_participante`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gan_premio` FOREIGN KEY (`id_premio`) REFERENCES `premios` (`id_premio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `premios`
--
ALTER TABLE `premios`
  ADD CONSTRAINT `fk_premio_galeria` FOREIGN KEY (`id_galeria`) REFERENCES `galerias` (`id_galeria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `premio_imagen`
--
ALTER TABLE `premio_imagen`
  ADD CONSTRAINT `fk_img_premio` FOREIGN KEY (`id_premio`) REFERENCES `premios` (`id_premio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_evento`
--
ALTER TABLE `registro_evento`
  ADD CONSTRAINT `fk_reg_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reg_evento` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_reg_participante` FOREIGN KEY (`id_participante`) REFERENCES `participantes` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rol_permiso`
--
ALTER TABLE `rol_permiso`
  ADD CONSTRAINT `fk_rolperm_perm` FOREIGN KEY (`id_permiso`) REFERENCES `permisos` (`id_permiso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rolperm_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuario_estado` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
