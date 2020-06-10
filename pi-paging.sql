-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2020 a las 20:15:21
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pi-paging`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club`
--

CREATE TABLE `club` (
  `idClub` int(11) NOT NULL,
  `Creator_id` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `Descrip` tinytext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_avisos`
--

CREATE TABLE `club_avisos` (
  `idClub` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_finaliza` date NOT NULL,
  `Descrip` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_chat`
--

CREATE TABLE `club_chat` (
  `id_mensaje_club` int(11) NOT NULL,
  `club_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `mensaje` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `club_suscrip`
--

CREATE TABLE `club_suscrip` (
  `user_id` int(11) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follows`
--

CREATE TABLE `follows` (
  `User_id` int(11) NOT NULL,
  `Sigue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `ISBN` int(11) NOT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `autor` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `genero` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`ISBN`, `titulo`, `autor`, `genero`) VALUES
(607, 'Sleepwatcher', 'Luis Pérez de Sevilla', 'Ciencia Ficción'),
(829, 'Manantiales en el desierto', 'L.B. Cowman', 'Bíblica'),
(897, 'El diario de Ana Frank', 'Ana Frank', 'Diario'),
(948, 'La semilla de Cthulhu', 'August Derleth', 'Fantasía'),
(978, 'La casa de los espíritus', 'Isabel Allende', 'Fantasía'),
(987, 'El resplandor', 'Stephen King', 'Horror'),
(997, 'Caballo de Troya', 'J.J. Benítez', 'Histórico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `idListas` int(11) NOT NULL,
  `Nom_List` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `User_id` int(11) NOT NULL,
  `Descrip` tinytext COLLATE utf8_unicode_ci DEFAULT NULL,
  `lista_lib` varchar(139) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `idPost` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `isbn` int(13) NOT NULL,
  `titulo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `stars` int(1) DEFAULT NULL,
  `spoiler` int(1) NOT NULL,
  `review` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idPost`, `userId`, `isbn`, `titulo`, `stars`, `spoiler`, `review`, `fecha`) VALUES
(40, 15, 829, 'Manantiales en el desierto', 4, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin mollis at magna non malesuada. Nullam id arcu ut orci accumsan aliquet. Sed efficitur, lacus at maximus commodo, elit est rhoncus ligula, id gravida nunc felis quis nunc. Proin facilisis arcu eu enim pulvinar vulputate. Nullam at viverra velit. Nunc at sollicitudin sapien. Nunc diam augue, laoreet eu purus vel, gravida finibus elit. Morbi faucibus interdum aliquet. Proin placerat, massa id condimentum tempus, diam mauris iaculis arcu, vel condimentum massa dui at dolor. Donec a odio urna. Ut sodales vulputate risus, id imperdiet libero efficitur ut. ', '2020-06-10 12:37:14'),
(45, 15, 897, 'El diario de Ana Frank', 5, 1, '&#13;&#10;&#13;&#10;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur magna erat, iaculis sed nulla a, venenatis lobortis est. Vestibulum viverra semper lectus sit amet porttitor. Sed congue finibus lorem sit amet fringilla. Phasellus eu purus at felis iaculis blandit at et magna. In efficitur sit amet nunc non elementum. Fusce congue ex et ipsum consequat fermentum. Sed vitae velit odio. Praesent at nisl maximus, bibendum quam mollis, auctor sem. Donec non felis malesuada, dictum nunc sit amet, varius ipsum. Nullam iaculis accumsan consectetur. Aliquam scelerisque ligula et velit tristique, sed hendrerit lectus rhoncus. Sed ac congue justo. Integer mattis leo a rhoncus volutpat. Phasellus ut mattis leo. Proin eget velit sapien.&#13;&#10;&#13;&#10;In hac habitasse platea dictumst. Aliquam erat volutpat. Phasellus quis sagittis eros, quis aliquet risus. Vestibulum eros lorem, blandit sed finibus non, tincidunt eu leo. Ut euismod convallis nisi. Morbi ac sapien ac augue ornare aliquet. Curabitur ac nisi in dui interdum feugiat. ', '2020-06-10 13:03:33'),
(46, 15, 948, 'La semilla de Cthulhu', 2, 0, '&#13;&#10;&#13;&#10;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur magna erat, iaculis sed nulla a, venenatis lobortis est. Vestibulum viverra semper lectus sit amet porttitor. Sed congue finibus lorem sit amet fringilla. Phasellus eu purus at felis iaculis blandit at et magna. In efficitur sit amet nunc non elementum. Fusce congue ex et ipsum consequat fermentum. Sed vitae velit odio. Praesent at nisl maximus, bibendum quam mollis, auctor sem. Donec non felis malesuada, dictum nunc sit amet, varius ipsum. Nullam iaculis accumsan consectetur. Aliquam scelerisque ligula et velit tristique, sed hendrerit lectus rhoncus. Sed ac congue justo. Integer mattis leo a rhoncus volutpat. Phasellus ut mattis leo. Proin eget velit sapien.&#13;&#10;&#13;&#10;', '2020-06-10 13:04:08'),
(47, 15, 948, 'La semilla de Cthulhu', 2, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur magna erat, iaculis sed nulla a, venenatis lobortis est. Vestibulum viverra semper lectus sit amet porttitor. Sed congue finibus lorem sit amet fringilla. Phasellus eu purus at felis iaculis blandit at et magna. In efficitur sit amet nunc non elementum. Fusce congue ex et ipsum consequat fermentum. Sed vitae velit odio. ', '2020-06-10 13:04:37'),
(48, 15, 987, 'El resplandor', 4, 0, '&#13;&#10;&#13;&#10;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget sollicitudin elit, ut vulputate orci. Nam quis tellus sapien. Sed elit nisl, pharetra eget ex id, bibendum gravida felis. Nunc quis faucibus leo, quis maximus est. Maecenas varius rhoncus felis, in dictum turpis pellentesque nec. Nullam consectetur nulla a est aliquet, porta elementum urna tempus. Proin convallis nisl et interdum tempor. Curabitur ullamcorper neque eget felis vehicula scelerisque. Suspendisse felis eros, posuere non cursus vitae, laoreet Maecenas vitae sapien enim. Aenean maximus vel ipsum at ultrices. Cras ullamcorper dictum neque non lacinia. Fusce sagittis congue sapien, vel mollis. ', '2020-06-10 13:05:12'),
(49, 15, 607, 'Sleepwatcher', 1, 0, '&#13;&#10;&#13;&#10;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget sollicitudin elit, ut vulputate orci. Nam quis tellus sapien. Sed elit nisl, pharetra eget ex id, bibendum gravida felis. Nunc quis faucibus leo, quis maximus est. Maecenas varius rhoncus felis, in dictum turpis pellentesque nec. Nullam consectetur nulla a est aliquet, porta elementum urna tempus. Proin convallis nisl et interdum tempor. Curabitur ullamcorper neque eget felis vehicula scelerisque. Suspendisse felis eros, posuere non cursus vitae, laoreet id enim.&#13;&#10;&#13;&#10;Maecenas vitae sapien enim. Aenean maximus vel ipsum at ultrices. Cras ullamcorper dictum neque non lacinia. Fusce sagittis congue sapien, vel mollis. &#13;&#10;&#13;&#10;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget sollicitudin elit, ut vulputate orci. Nam quis tellus sapien. Sed elit nisl, pharetra eget ex id, bibendum gravida felis. Nunc quis faucibus leo, quis maximus est. Maecenas varius rhoncus felis, in dictum turpis pellentesque nec. Nullam consectetur nulla a est aliquet, porta elementum urna tempus. Proin convallis nisl et interdum tempor. Curabitur ullamcorper neque eget felis vehicula scelerisque. Suspendisse felis eros, posuere non cursus vitae, laoreet id enim.&#13;&#10;&#13;&#10;Maecenas vitae sapien enim. Aenean maximus vel ipsum at ultrices. Cras ullamcorper dictum neque non lacinia. Fusce sagittis congue sapien, vel mollis. ', '2020-06-10 13:05:22'),
(50, 16, 997, 'Caballo de Troya', 5, 0, 'Proin convallis nisl et interdum tempor. Curabitur ullamcorper neque eget felis vehicula scelerisque. Suspendisse felis eros, posuere non cursus vitae, laoreet id enim.&#13;&#10;&#13;&#10;Maecenas vitae sapien enim. Aenean maximus vel ipsum at ultrices. Cras ullamcorper dictum neque non lacinia. Fusce sagittis congue sapien, vel mollis. ', '2020-06-10 13:06:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `idReporte` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Report_user` int(11) NOT NULL,
  `Justifi` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_Alias` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `user_Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_Pass` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Apellido` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Foto` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gene_Favo` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Verifi_Account` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `user_Alias`, `user_Email`, `user_Pass`, `Nombre`, `Apellido`, `Foto`, `Gene_Favo`, `Verifi_Account`) VALUES
(15, 'Daniel', 'dmontesdeoca1@ucol.mx', '123456', NULL, NULL, NULL, NULL, 0),
(16, 'DanielMontes', 'danymontes00@hotmail.com', '1234', NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_chat`
--

CREATE TABLE `user_chat` (
  `idChat` int(11) NOT NULL,
  `remitente` int(11) NOT NULL,
  `destinatario` int(11) NOT NULL,
  `mensaje` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`idClub`),
  ADD KEY `Creator_id` (`Creator_id`),
  ADD KEY `Creator_id_2` (`Creator_id`);

--
-- Indices de la tabla `club_avisos`
--
ALTER TABLE `club_avisos`
  ADD PRIMARY KEY (`idClub`),
  ADD KEY `club_id` (`club_id`);

--
-- Indices de la tabla `club_chat`
--
ALTER TABLE `club_chat`
  ADD PRIMARY KEY (`id_mensaje_club`),
  ADD KEY `club_id` (`club_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `club_id_2` (`club_id`),
  ADD KEY `User_id_2` (`User_id`);

--
-- Indices de la tabla `club_suscrip`
--
ALTER TABLE `club_suscrip`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `club_id` (`club_id`);

--
-- Indices de la tabla `follows`
--
ALTER TABLE `follows`
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Sigue_id` (`Sigue_id`),
  ADD KEY `User_id_2` (`User_id`),
  ADD KEY `Sigue_id_2` (`Sigue_id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`idListas`),
  ADD KEY `User_id` (`User_id`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idPost`),
  ADD KEY `User_id` (`userId`),
  ADD KEY `Libro_isbn` (`isbn`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`idReporte`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Report_user` (`Report_user`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_chat`
--
ALTER TABLE `user_chat`
  ADD PRIMARY KEY (`idChat`),
  ADD KEY `remitente` (`remitente`),
  ADD KEY `destinatario` (`destinatario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `club`
--
ALTER TABLE `club`
  MODIFY `idClub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `club_avisos`
--
ALTER TABLE `club_avisos`
  MODIFY `idClub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `club_chat`
--
ALTER TABLE `club_chat`
  MODIFY `id_mensaje_club` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `idListas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idPost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `idReporte` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user_chat`
--
ALTER TABLE `user_chat`
  MODIFY `idChat` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `club`
--
ALTER TABLE `club`
  ADD CONSTRAINT `club_ibfk_1` FOREIGN KEY (`Creator_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `club_avisos`
--
ALTER TABLE `club_avisos`
  ADD CONSTRAINT `club_avisos_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`idClub`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `club_chat`
--
ALTER TABLE `club_chat`
  ADD CONSTRAINT `club_chat_ibfk_1` FOREIGN KEY (`club_id`) REFERENCES `club` (`idClub`) ON UPDATE CASCADE,
  ADD CONSTRAINT `club_chat_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `club_suscrip`
--
ALTER TABLE `club_suscrip`
  ADD CONSTRAINT `club_suscrip_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `club_suscrip_ibfk_2` FOREIGN KEY (`club_id`) REFERENCES `club` (`idClub`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `follows_ibfk_2` FOREIGN KEY (`Sigue_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `listas_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`isbn`) REFERENCES `libro` (`ISBN`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`Report_user`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_chat`
--
ALTER TABLE `user_chat`
  ADD CONSTRAINT `user_chat_ibfk_1` FOREIGN KEY (`remitente`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_chat_ibfk_2` FOREIGN KEY (`destinatario`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
