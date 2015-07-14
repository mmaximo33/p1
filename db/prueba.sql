-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2015 a las 04:51:18
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE IF NOT EXISTS `tusuarios` (
  `id` int(11) NOT NULL,
  `apellido` text NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_menu`
--

CREATE TABLE IF NOT EXISTS `t_menu` (
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_perfiles`
--

CREATE TABLE IF NOT EXISTS `t_perfiles` (
  `idPerfil` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios_rel_perfiles`
--

CREATE TABLE IF NOT EXISTS `t_usuarios_rel_perfiles` (
  `idRel` int(11) NOT NULL,
  `idUsuarios` int(11) NOT NULL,
  `idPerfiles` int(11) NOT NULL,
  `FechaHora` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`id`), ADD KEY `idUsuario` (`id`), ADD KEY `idUsuario_2` (`id`);

--
-- Indices de la tabla `t_perfiles`
--
ALTER TABLE `t_perfiles`
  ADD PRIMARY KEY (`idPerfil`), ADD KEY `idPerfil` (`idPerfil`);

--
-- Indices de la tabla `t_usuarios_rel_perfiles`
--
ALTER TABLE `t_usuarios_rel_perfiles`
  ADD PRIMARY KEY (`idRel`), ADD KEY `idUsuarios` (`idUsuarios`), ADD KEY `idPerfiles` (`idPerfiles`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `t_perfiles`
--
ALTER TABLE `t_perfiles`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `t_usuarios_rel_perfiles`
--
ALTER TABLE `t_usuarios_rel_perfiles`
  MODIFY `idRel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_usuarios_rel_perfiles`
--
ALTER TABLE `t_usuarios_rel_perfiles`
ADD CONSTRAINT `t_usuarios_rel_perfiles_ibfk_2` FOREIGN KEY (`idPerfiles`) REFERENCES `t_perfiles` (`idPerfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
