-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2017 a las 18:29:18
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `juegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `texto` longtext NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `img1` varchar(45) NOT NULL,
  `img2` varchar(45) NOT NULL,
  `img3` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `date_born` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolla`
--

CREATE TABLE `desarrolla` (
  `juegos_id` int(11) NOT NULL,
  `Empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `desarrolla`
--

INSERT INTO `desarrolla` (`juegos_id`, `Empresa_id`) VALUES
(5, 1),
(6, 1),
(7, 4),
(8, 4),
(9, 4),
(10, 1),
(11, 6),
(12, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `name`) VALUES
(1, 'Infinity Ward'),
(2, 'Activision'),
(3, 'Electronics Arts'),
(4, 'Square Enix'),
(5, 'Squaresoft'),
(6, 'Camelot'),
(7, 'Nintendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `subtitulo` varchar(45) NOT NULL,
  `caratula` varchar(45) NOT NULL,
  `fecha_lanzamiento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`id`, `titulo`, `subtitulo`, `caratula`, `fecha_lanzamiento`) VALUES
(5, 'Call of Duty 4', 'Modern Warfrare', '5QHbVJ1.jpg', '5/11/2007'),
(6, 'Call of Duty', 'Modern Warfrare 2', 'CarÃ¡tula_COD_MW2.jpg', '10/11/2009'),
(7, 'Final Fantasy VII', '', 'final_fantasy_viii-1696283.jpg', '27/10/1999'),
(8, 'Final Fantasy Tactics Advance', '', 'FFTA_Official_Guide_Book_Cover.jpg', '23/10/2003'),
(9, 'Final Fantasy X', '', 'tumblr_m2u5toi1eP1ruo93qo3_1280.jpg', '19/6/2001'),
(10, 'Call of Duty', 'Modern Warfrare 3', 'Modern-Warfare-3.jpg', '8/11/2011'),
(11, 'Golden Sun', '', '1.jpg', '22/2/2002'),
(12, 'Golden Sun', 'La Edad Perdida', '1 (1).jpg', '19/9/2003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_has_articulos`
--

CREATE TABLE `juegos_has_articulos` (
  `juegos_id` int(11) NOT NULL,
  `articulos_id` int(11) NOT NULL,
  `juegos_has_articuloscol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos_has_video`
--

CREATE TABLE `juegos_has_video` (
  `juegos_id` int(11) NOT NULL,
  `Video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugados`
--

CREATE TABLE `jugados` (
  `juegos_id` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `terminado` tinyint(1) NOT NULL,
  `empezado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jugados`
--

INSERT INTO `jugados` (`juegos_id`, `Usuario_id`, `terminado`, `empezado`) VALUES
(5, 1, 1, 0),
(6, 1, 1, 0),
(7, 1, 0, 0),
(8, 1, 1, 0),
(9, 1, 1, 0),
(10, 1, 1, 0),
(11, 1, 1, 0),
(12, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `company` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`id`, `name`, `company`) VALUES
(1, 'PS4', 'Sony'),
(2, 'PC', 'Steam'),
(3, 'PS3', 'Sony'),
(4, 'XBOX 360', 'Microsoft'),
(5, 'PS2', 'Sony'),
(6, 'PS', 'Sony'),
(7, 'Game Boy Advance', 'Nintendo'),
(8, 'PS Vita', 'Sony'),
(9, 'XBOX ONE', 'Microsoft');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_has_juegos`
--

CREATE TABLE `plataforma_has_juegos` (
  `plataforma_id` int(11) NOT NULL,
  `juegos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma_has_juegos`
--

INSERT INTO `plataforma_has_juegos` (`plataforma_id`, `juegos_id`) VALUES
(1, 7),
(1, 9),
(1, 10),
(2, 5),
(2, 6),
(2, 7),
(2, 9),
(2, 10),
(3, 5),
(3, 6),
(3, 9),
(3, 10),
(4, 5),
(4, 6),
(4, 10),
(5, 9),
(6, 7),
(7, 8),
(7, 11),
(7, 12),
(8, 9),
(9, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_has_jugados`
--

CREATE TABLE `plataforma_has_jugados` (
  `plataforma_id` int(11) NOT NULL,
  `jugados_juegos_id` int(11) NOT NULL,
  `jugados_Usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plataforma_has_jugados`
--

INSERT INTO `plataforma_has_jugados` (`plataforma_id`, `jugados_juegos_id`, `jugados_Usuario_id`) VALUES
(2, 7, 1),
(4, 6, 1),
(4, 10, 1),
(5, 9, 1),
(6, 7, 1),
(7, 8, 1),
(7, 11, 1),
(7, 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produce`
--

CREATE TABLE `produce` (
  `juegos_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `produce`
--

INSERT INTO `produce` (`juegos_id`, `empresa_id`) VALUES
(5, 2),
(6, 2),
(7, 5),
(8, 5),
(9, 5),
(10, 2),
(11, 7),
(12, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajo`
--

CREATE TABLE `trabajo` (
  `autores_id` int(11) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `juegos_id` int(11) NOT NULL,
  `puesto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nick` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `surnames` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `name`, `surnames`, `cargo`, `password`) VALUES
(1, 'Cristian', 'Cristian Hernán', 'de la Rosa Bandi', 'redactor', '$2y$10$1jgjtGGSlG2zzr6JxExNse92nZV7T8KQEx6WE3EtqMEmR1hF7Mc9G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_video`
--

CREATE TABLE `usuario_has_video` (
  `Usuario_id` int(11) NOT NULL,
  `Video_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `url` varchar(45) NOT NULL,
  `iframe` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articulos_Usuario1_idx` (`Usuario_id`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `desarrolla`
--
ALTER TABLE `desarrolla`
  ADD PRIMARY KEY (`juegos_id`,`Empresa_id`),
  ADD KEY `fk_juegos_has_Empresa_Empresa1_idx` (`Empresa_id`),
  ADD KEY `fk_juegos_has_Empresa_juegos1_idx` (`juegos_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `juegos_has_articulos`
--
ALTER TABLE `juegos_has_articulos`
  ADD PRIMARY KEY (`juegos_id`,`articulos_id`),
  ADD KEY `fk_juegos_has_articulos_articulos1_idx` (`articulos_id`),
  ADD KEY `fk_juegos_has_articulos_juegos1_idx` (`juegos_id`);

--
-- Indices de la tabla `juegos_has_video`
--
ALTER TABLE `juegos_has_video`
  ADD PRIMARY KEY (`juegos_id`,`Video_id`),
  ADD KEY `fk_juegos_has_Video_Video1_idx` (`Video_id`),
  ADD KEY `fk_juegos_has_Video_juegos1_idx` (`juegos_id`);

--
-- Indices de la tabla `jugados`
--
ALTER TABLE `jugados`
  ADD PRIMARY KEY (`juegos_id`,`Usuario_id`),
  ADD KEY `fk_juegos_has_Usuario_Usuario1_idx` (`Usuario_id`),
  ADD KEY `fk_juegos_has_Usuario_juegos1_idx` (`juegos_id`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_has_juegos`
--
ALTER TABLE `plataforma_has_juegos`
  ADD PRIMARY KEY (`plataforma_id`,`juegos_id`),
  ADD KEY `fk_plataforma_has_juegos_juegos1_idx` (`juegos_id`),
  ADD KEY `fk_plataforma_has_juegos_plataforma1_idx` (`plataforma_id`);

--
-- Indices de la tabla `plataforma_has_jugados`
--
ALTER TABLE `plataforma_has_jugados`
  ADD PRIMARY KEY (`plataforma_id`,`jugados_juegos_id`,`jugados_Usuario_id`),
  ADD KEY `fk_plataforma_has_jugados_jugados1_idx` (`jugados_juegos_id`,`jugados_Usuario_id`),
  ADD KEY `fk_plataforma_has_jugados_plataforma1_idx` (`plataforma_id`);

--
-- Indices de la tabla `produce`
--
ALTER TABLE `produce`
  ADD PRIMARY KEY (`juegos_id`,`empresa_id`),
  ADD KEY `fk_juegos_has_empresa_empresa2_idx` (`empresa_id`),
  ADD KEY `fk_juegos_has_empresa_juegos2_idx` (`juegos_id`);

--
-- Indices de la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD PRIMARY KEY (`autores_id`,`empresa_id`,`juegos_id`),
  ADD KEY `fk_trabajo_empresa1_idx` (`empresa_id`),
  ADD KEY `fk_trabajo_juegos1_idx` (`juegos_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario_has_video`
--
ALTER TABLE `usuario_has_video`
  ADD PRIMARY KEY (`Usuario_id`,`Video_id`),
  ADD KEY `fk_Usuario_has_Video_Video1_idx` (`Video_id`),
  ADD KEY `fk_Usuario_has_Video_Usuario1_idx` (`Usuario_id`);

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_articulos_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `desarrolla`
--
ALTER TABLE `desarrolla`
  ADD CONSTRAINT `fk_juegos_has_Empresa_Empresa1` FOREIGN KEY (`Empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_juegos_has_Empresa_juegos1` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `juegos_has_articulos`
--
ALTER TABLE `juegos_has_articulos`
  ADD CONSTRAINT `fk_juegos_has_articulos_articulos1` FOREIGN KEY (`articulos_id`) REFERENCES `articulos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_juegos_has_articulos_juegos1` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `juegos_has_video`
--
ALTER TABLE `juegos_has_video`
  ADD CONSTRAINT `fk_juegos_has_Video_Video1` FOREIGN KEY (`Video_id`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_juegos_has_Video_juegos1` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jugados`
--
ALTER TABLE `jugados`
  ADD CONSTRAINT `fk_juegos_has_Usuario_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_juegos_has_Usuario_juegos1` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plataforma_has_juegos`
--
ALTER TABLE `plataforma_has_juegos`
  ADD CONSTRAINT `fk_plataforma_has_juegos_juegos1` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plataforma_has_juegos_plataforma1` FOREIGN KEY (`plataforma_id`) REFERENCES `plataforma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `plataforma_has_jugados`
--
ALTER TABLE `plataforma_has_jugados`
  ADD CONSTRAINT `fk_plataforma_has_jugados_jugados1` FOREIGN KEY (`jugados_juegos_id`,`jugados_Usuario_id`) REFERENCES `jugados` (`juegos_id`, `Usuario_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_plataforma_has_jugados_plataforma1` FOREIGN KEY (`plataforma_id`) REFERENCES `plataforma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `fk_juegos_has_empresa_empresa2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_juegos_has_empresa_juegos2` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `trabajo`
--
ALTER TABLE `trabajo`
  ADD CONSTRAINT `fk_trabajo_autores1` FOREIGN KEY (`autores_id`) REFERENCES `autores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabajo_empresa1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabajo_juegos1` FOREIGN KEY (`juegos_id`) REFERENCES `juegos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_has_video`
--
ALTER TABLE `usuario_has_video`
  ADD CONSTRAINT `fk_Usuario_has_Video_Usuario1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_has_Video_Video1` FOREIGN KEY (`Video_id`) REFERENCES `video` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
