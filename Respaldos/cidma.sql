-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2016 a las 17:40:21
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cidma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `ID_ACCESO` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `CONTRASENA` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso_ambientes`
--

CREATE TABLE `acceso_ambientes` (
  `ID_ACCESO` int(11) NOT NULL,
  `ID_ESTADO` int(11) DEFAULT NULL,
  `ID_EVENTO` int(11) DEFAULT NULL,
  `FECHA_COMPLETA` date DEFAULT NULL,
  `OBSERVACIONES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `ID_AMBIENTE` int(11) NOT NULL,
  `ID_CENTRO` int(11) DEFAULT NULL,
  `CODIGO` int(11) NOT NULL,
  `NOMBRE` varchar(250) NOT NULL,
  `DESCRIPCION` varchar(500) NOT NULL,
  `PUESTOS_TRABAJO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario_evento`
--

CREATE TABLE `calendario_evento` (
  `ID_CALENDARIO` int(11) NOT NULL,
  `ID_EVENTO` int(11) DEFAULT NULL,
  `DIA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL,
  `ESTADO` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_formacion`
--

CREATE TABLE `centro_formacion` (
  `ID_CENTRO` int(11) NOT NULL,
  `CODIGO` int(11) NOT NULL,
  `ID_REGIONAL` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE `elemento` (
  `ID_ELEMENTO` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_TIPO_ELEMENTO` int(11) DEFAULT NULL,
  `MARCA` varchar(250) DEFAULT NULL,
  `SERIAL` varchar(500) DEFAULT NULL,
  `OBSERVACIONES` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento_ingreso`
--

CREATE TABLE `elemento_ingreso` (
  `ID` int(11) NOT NULL,
  `ID_ELEMENTO` int(11) DEFAULT NULL,
  `ID_INGRESO` int(11) DEFAULT NULL,
  `COD_BARRAS` varchar(250) DEFAULT NULL,
  `ESTADO` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `ID_ESTADO` int(11) NOT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_acceso_ambientes`
--

CREATE TABLE `estado_acceso_ambientes` (
  `ID_ESTADO` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_usuario`
--

CREATE TABLE `estado_usuario` (
  `ID_ESTADO_USUARIO` int(11) NOT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `ID_EVENTO` int(11) NOT NULL,
  `ID_FICHA` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_AMBIENTE` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `ID_FICHA` int(11) NOT NULL,
  `ID_NIVEL` int(11) DEFAULT NULL,
  `CODIGO` int(11) NOT NULL,
  `PROGRAMA` varchar(250) DEFAULT NULL,
  `INSTRUCTOR_LIDER` int(11) DEFAULT NULL,
  `FECHA_INICIO_LECTIVA` date DEFAULT NULL,
  `FECHA_FIN_LECTIVA` date DEFAULT NULL,
  `FECHA_CIERRE_FICHA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `ID` int(11) NOT NULL,
  `ID_JORNADA` int(11) DEFAULT NULL,
  `ID_FICHA` int(11) DEFAULT NULL,
  `DIA` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `ID_INGRESO` int(11) NOT NULL,
  `ID_ESTADO` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `TAG` varchar(250) DEFAULT NULL,
  `FECHA_COMPLETA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada`
--

CREATE TABLE `jornada` (
  `ID_JORNADA` int(11) NOT NULL,
  `HORA_INICIO` time DEFAULT NULL,
  `HORA_FIN` time DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_formacion`
--

CREATE TABLE `nivel_formacion` (
  `ID_NIVEL` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE `notificaciones` (
  `ID_NOTIFICACION` int(11) NOT NULL,
  `ID_TIPO_NOTIFICACION` int(11) DEFAULT NULL,
  `ID_FICHA` int(11) DEFAULT NULL,
  `ID_USUARIO_GEN` int(11) DEFAULT NULL,
  `ID_USUARIO_REEM` int(11) DEFAULT NULL,
  `ESTADO` varchar(250) DEFAULT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL,
  `FECHA_NOTIFICACION` date DEFAULT NULL,
  `FECHA_RESPUESTA` date DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `HORA_INICIO` time DEFAULT NULL,
  `HORA_FIN` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regional`
--

CREATE TABLE `regional` (
  `ID_REGIONAL` int(11) NOT NULL,
  `CODIGO` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software`
--

CREATE TABLE `software` (
  `ID_SOFTWARE` int(11) NOT NULL,
  `CATEGORIA` varchar(250) DEFAULT NULL,
  `NOMBRE` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `ID_SOLICITUD` int(11) NOT NULL,
  `ID_AMBIENTE` int(11) DEFAULT NULL,
  `FECHA_SOLICITUD` date DEFAULT NULL,
  `FECHA_RESPUESTA` date DEFAULT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `HORA_INICIO` time DEFAULT NULL,
  `HORA_FIN` time DEFAULT NULL,
  `ESTADO` varchar(250) DEFAULT NULL,
  `NUMERO_PERSONAS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sw_ambiente`
--

CREATE TABLE `sw_ambiente` (
  `ID` int(11) NOT NULL,
  `ID_SOFTWARE` int(11) DEFAULT NULL,
  `ID_AMBIENTE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sw_solicitud`
--

CREATE TABLE `sw_solicitud` (
  `ID` int(11) NOT NULL,
  `ID_SOLICITUD` int(11) DEFAULT NULL,
  `ID_SOFTWARE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_elemento`
--

CREATE TABLE `tipo_elemento` (
  `ID_TIPO_ELEMENTO` int(11) NOT NULL,
  `DESCRIPCION` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_notificacion`
--

CREATE TABLE `tipo_notificacion` (
  `ID_TIPO_NOTIFICACION` int(11) NOT NULL,
  `NOMBRE` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `ID_TIPO_USUARIO` int(11) NOT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `locked` tinyint(1) NOT NULL,
  `expired` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  `confirmation_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `credentials_expired` tinyint(1) NOT NULL,
  `credentials_expire_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `locked`, `expired`, `expires_at`, `confirmation_token`, `password_requested_at`, `roles`, `credentials_expired`, `credentials_expire_at`) VALUES
(1, 'Admin', 'admin', 'prueba@mail.com', 'prueba@mail.com', 1, 'qzptdxv4kcg0sk0cws0ckcogsk80k0g', 'MUKqlRzLo1Qh5+f68Lf/WoyPKjNQJHTHolXSptCDzRDD5SEyL8nRpGs/Z+tYiv5J3bKjaupknVgG248MQuNHFA==', '2016-08-17 09:42:58', 0, 0, NULL, NULL, NULL, 'a:0:{}', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ESTADO_USUARIO` int(11) DEFAULT NULL,
  `ID_TIPO_USUARIO` int(11) DEFAULT NULL,
  `CEDULA` int(11) NOT NULL,
  `NOMBRE` varchar(250) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `TAG` varchar(250) DEFAULT NULL,
  `EMAIL` varchar(250) DEFAULT NULL,
  `FOTO` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ficha`
--

CREATE TABLE `usuario_ficha` (
  `ID` int(11) NOT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL,
  `ID_FICHA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`ID_ACCESO`),
  ADD KEY `FK_RELATIONSHIP_11` (`ID_USUARIO`);

--
-- Indices de la tabla `acceso_ambientes`
--
ALTER TABLE `acceso_ambientes`
  ADD PRIMARY KEY (`ID_ACCESO`),
  ADD KEY `FK_RELATIONSHIP_19` (`ID_ESTADO`),
  ADD KEY `FK_RELATIONSHIP_20` (`ID_EVENTO`);

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`ID_AMBIENTE`),
  ADD KEY `FK_RELATIONSHIP_2` (`ID_CENTRO`);

--
-- Indices de la tabla `calendario_evento`
--
ALTER TABLE `calendario_evento`
  ADD PRIMARY KEY (`ID_CALENDARIO`),
  ADD KEY `FK_RELATIONSHIP_21` (`ID_EVENTO`);

--
-- Indices de la tabla `centro_formacion`
--
ALTER TABLE `centro_formacion`
  ADD PRIMARY KEY (`ID_CENTRO`),
  ADD KEY `FK_RELATIONSHIP_1` (`ID_REGIONAL`);

--
-- Indices de la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD PRIMARY KEY (`ID_ELEMENTO`),
  ADD KEY `FK_RELATIONSHIP_24` (`ID_USUARIO`),
  ADD KEY `FK_RELATIONSHIP_25` (`ID_TIPO_ELEMENTO`);

--
-- Indices de la tabla `elemento_ingreso`
--
ALTER TABLE `elemento_ingreso`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_28` (`ID_ELEMENTO`),
  ADD KEY `FK_RELATIONSHIP_29` (`ID_INGRESO`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`ID_ESTADO`);

--
-- Indices de la tabla `estado_acceso_ambientes`
--
ALTER TABLE `estado_acceso_ambientes`
  ADD PRIMARY KEY (`ID_ESTADO`);

--
-- Indices de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  ADD PRIMARY KEY (`ID_ESTADO_USUARIO`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`ID_EVENTO`),
  ADD KEY `FK_RELATIONSHIP_16` (`ID_FICHA`),
  ADD KEY `FK_RELATIONSHIP_17` (`ID_USUARIO`),
  ADD KEY `FK_RELATIONSHIP_18` (`ID_AMBIENTE`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`ID_FICHA`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_NIVEL`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_12` (`ID_JORNADA`),
  ADD KEY `FK_RELATIONSHIP_13` (`ID_FICHA`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`ID_INGRESO`),
  ADD KEY `FK_RELATIONSHIP_26` (`ID_ESTADO`),
  ADD KEY `FK_RELATIONSHIP_27` (`ID_USUARIO`);

--
-- Indices de la tabla `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`ID_JORNADA`);

--
-- Indices de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  ADD PRIMARY KEY (`ID_NIVEL`);

--
-- Indices de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`ID_NOTIFICACION`),
  ADD KEY `FK_RELATIONSHIP_22` (`ID_TIPO_NOTIFICACION`),
  ADD KEY `FK_RELATIONSHIP_23` (`ID_FICHA`);

--
-- Indices de la tabla `regional`
--
ALTER TABLE `regional`
  ADD PRIMARY KEY (`ID_REGIONAL`);

--
-- Indices de la tabla `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`ID_SOFTWARE`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`ID_SOLICITUD`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_AMBIENTE`);

--
-- Indices de la tabla `sw_ambiente`
--
ALTER TABLE `sw_ambiente`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_4` (`ID_SOFTWARE`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_AMBIENTE`);

--
-- Indices de la tabla `sw_solicitud`
--
ALTER TABLE `sw_solicitud`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_SOLICITUD`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_SOFTWARE`);

--
-- Indices de la tabla `tipo_elemento`
--
ALTER TABLE `tipo_elemento`
  ADD PRIMARY KEY (`ID_TIPO_ELEMENTO`);

--
-- Indices de la tabla `tipo_notificacion`
--
ALTER TABLE `tipo_notificacion`
  ADD PRIMARY KEY (`ID_TIPO_NOTIFICACION`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`ID_TIPO_USUARIO`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_2DA1797792FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_2DA17977A0D96FBF` (`email_canonical`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_ESTADO_USUARIO`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_TIPO_USUARIO`);

--
-- Indices de la tabla `usuario_ficha`
--
ALTER TABLE `usuario_ficha`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RELATIONSHIP_14` (`ID_USUARIO`),
  ADD KEY `FK_RELATIONSHIP_15` (`ID_FICHA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `ID_ACCESO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `acceso_ambientes`
--
ALTER TABLE `acceso_ambientes`
  MODIFY `ID_ACCESO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `ID_AMBIENTE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `calendario_evento`
--
ALTER TABLE `calendario_evento`
  MODIFY `ID_CALENDARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `centro_formacion`
--
ALTER TABLE `centro_formacion`
  MODIFY `ID_CENTRO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `elemento`
--
ALTER TABLE `elemento`
  MODIFY `ID_ELEMENTO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `elemento_ingreso`
--
ALTER TABLE `elemento_ingreso`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_acceso_ambientes`
--
ALTER TABLE `estado_acceso_ambientes`
  MODIFY `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado_usuario`
--
ALTER TABLE `estado_usuario`
  MODIFY `ID_ESTADO_USUARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `ID_FICHA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `ID_INGRESO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jornada`
--
ALTER TABLE `jornada`
  MODIFY `ID_JORNADA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `nivel_formacion`
--
ALTER TABLE `nivel_formacion`
  MODIFY `ID_NIVEL` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `ID_NOTIFICACION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `regional`
--
ALTER TABLE `regional`
  MODIFY `ID_REGIONAL` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `software`
--
ALTER TABLE `software`
  MODIFY `ID_SOFTWARE` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `ID_SOLICITUD` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sw_ambiente`
--
ALTER TABLE `sw_ambiente`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sw_solicitud`
--
ALTER TABLE `sw_solicitud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_elemento`
--
ALTER TABLE `tipo_elemento`
  MODIFY `ID_TIPO_ELEMENTO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_notificacion`
--
ALTER TABLE `tipo_notificacion`
  MODIFY `ID_TIPO_NOTIFICACION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `ID_TIPO_USUARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario_ficha`
--
ALTER TABLE `usuario_ficha`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD CONSTRAINT `FK_RELATIONSHIP_11` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `acceso_ambientes`
--
ALTER TABLE `acceso_ambientes`
  ADD CONSTRAINT `FK_RELATIONSHIP_19` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado_acceso_ambientes` (`ID_ESTADO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_20` FOREIGN KEY (`ID_EVENTO`) REFERENCES `evento` (`ID_EVENTO`);

--
-- Filtros para la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`ID_CENTRO`) REFERENCES `centro_formacion` (`ID_CENTRO`);

--
-- Filtros para la tabla `calendario_evento`
--
ALTER TABLE `calendario_evento`
  ADD CONSTRAINT `FK_RELATIONSHIP_21` FOREIGN KEY (`ID_EVENTO`) REFERENCES `evento` (`ID_EVENTO`);

--
-- Filtros para la tabla `centro_formacion`
--
ALTER TABLE `centro_formacion`
  ADD CONSTRAINT `FK_RELATIONSHIP_1` FOREIGN KEY (`ID_REGIONAL`) REFERENCES `regional` (`ID_REGIONAL`);

--
-- Filtros para la tabla `elemento`
--
ALTER TABLE `elemento`
  ADD CONSTRAINT `FK_RELATIONSHIP_24` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_25` FOREIGN KEY (`ID_TIPO_ELEMENTO`) REFERENCES `tipo_elemento` (`ID_TIPO_ELEMENTO`);

--
-- Filtros para la tabla `elemento_ingreso`
--
ALTER TABLE `elemento_ingreso`
  ADD CONSTRAINT `FK_RELATIONSHIP_28` FOREIGN KEY (`ID_ELEMENTO`) REFERENCES `elemento` (`ID_ELEMENTO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_29` FOREIGN KEY (`ID_INGRESO`) REFERENCES `ingreso` (`ID_INGRESO`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_RELATIONSHIP_16` FOREIGN KEY (`ID_FICHA`) REFERENCES `ficha` (`ID_FICHA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_17` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_18` FOREIGN KEY (`ID_AMBIENTE`) REFERENCES `ambiente` (`ID_AMBIENTE`);

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_NIVEL`) REFERENCES `nivel_formacion` (`ID_NIVEL`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `FK_RELATIONSHIP_12` FOREIGN KEY (`ID_JORNADA`) REFERENCES `jornada` (`ID_JORNADA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_13` FOREIGN KEY (`ID_FICHA`) REFERENCES `ficha` (`ID_FICHA`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `FK_RELATIONSHIP_26` FOREIGN KEY (`ID_ESTADO`) REFERENCES `estado` (`ID_ESTADO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_27` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `FK_RELATIONSHIP_22` FOREIGN KEY (`ID_TIPO_NOTIFICACION`) REFERENCES `tipo_notificacion` (`ID_TIPO_NOTIFICACION`),
  ADD CONSTRAINT `FK_RELATIONSHIP_23` FOREIGN KEY (`ID_FICHA`) REFERENCES `ficha` (`ID_FICHA`);

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_AMBIENTE`) REFERENCES `ambiente` (`ID_AMBIENTE`);

--
-- Filtros para la tabla `sw_ambiente`
--
ALTER TABLE `sw_ambiente`
  ADD CONSTRAINT `FK_RELATIONSHIP_4` FOREIGN KEY (`ID_SOFTWARE`) REFERENCES `software` (`ID_SOFTWARE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_AMBIENTE`) REFERENCES `ambiente` (`ID_AMBIENTE`);

--
-- Filtros para la tabla `sw_solicitud`
--
ALTER TABLE `sw_solicitud`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_SOLICITUD`) REFERENCES `solicitud` (`ID_SOLICITUD`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_SOFTWARE`) REFERENCES `software` (`ID_SOFTWARE`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_ESTADO_USUARIO`) REFERENCES `estado_usuario` (`ID_ESTADO_USUARIO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_TIPO_USUARIO`) REFERENCES `tipo_usuario` (`ID_TIPO_USUARIO`);

--
-- Filtros para la tabla `usuario_ficha`
--
ALTER TABLE `usuario_ficha`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`ID_FICHA`) REFERENCES `ficha` (`ID_FICHA`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
