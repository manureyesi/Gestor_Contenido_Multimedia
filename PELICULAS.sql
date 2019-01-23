--
-- Base de datos: `PELICULAS`
--
CREATE DATABASE IF NOT EXISTS `PELICULAS`;
USE `PELICULAS`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `GENERO`
--

CREATE TABLE IF NOT EXISTS `GENERO` (
`ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `DESCRIPCION` mediumtext
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PELICULAS`
--

CREATE TABLE IF NOT EXISTS `PELICULAS` (
`ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `URL_VIDEO` varchar(200) NOT NULL,
  `FECHA_ALTA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `URL_IMG` varchar(100) DEFAULT NULL,
  `GENERO` int(11) DEFAULT NULL,
  `FECHA_SALIDA` date DEFAULT NULL,
  `VISITAS` int(11) NOT NULL DEFAULT '0'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PELICULAS_SAGAS`
--

CREATE TABLE IF NOT EXISTS `PELICULAS_SAGAS` (
`ID` int(11) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `URL_PELICULA` varchar(150) NOT NULL,
  `URL_IMG` varchar(100) DEFAULT NULL,
  `ID_SAGA` int(11) NOT NULL
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SAGAS`
--

CREATE TABLE IF NOT EXISTS `SAGAS` (
`ID` int(11) NOT NULL,
  `NOMBRE_SAGA` varchar(100) NOT NULL,
  `URL_CARPETA` varchar(150) NOT NULL,
  `GENERO` int(11) DEFAULT NULL,
  `VISITAS` int(11) NOT NULL DEFAULT '0'
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `TIPO_USUARIO`
--

CREATE TABLE IF NOT EXISTS `TIPO_USUARIO` (
`ID` int(11) NOT NULL,
  `NOMBRE_RANGO` varchar(100) NOT NULL
) AUTO_INCREMENT=3;

--
-- Volcado de datos para la tabla `TIPO_USUARIO`
--

INSERT INTO `TIPO_USUARIO` (`ID`, `NOMBRE_RANGO`) VALUES
(1, 'ADMIN'),
(2, 'GENERICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIOS`
--

CREATE TABLE IF NOT EXISTS `USUARIOS` (
`ID` int(11) NOT NULL,
  `USUARIO` varchar(100) NOT NULL,
  `CONTRASENA` varchar(150) NOT NULL,
  `NOMBRE` varchar(100) NOT NULL,
  `APELLIDOS` varchar(150) DEFAULT NULL,
  `TIPO_USUARIO` int(11) NOT NULL,
  `FECHA_CREACION` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

--
-- Ã?ndices para tablas volcadas
--

--
-- Indices de la tabla `GENERO`
--
ALTER TABLE `GENERO`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `PELICULAS`
--
ALTER TABLE `PELICULAS`
 ADD PRIMARY KEY (`ID`), ADD KEY `GENERO` (`GENERO`);

--
-- Indices de la tabla `PELICULAS_SAGAS`
--
ALTER TABLE `PELICULAS_SAGAS`
 ADD PRIMARY KEY (`ID`), ADD KEY `ID_SAGA` (`ID_SAGA`);

--
-- Indices de la tabla `SAGAS`
--
ALTER TABLE `SAGAS`
 ADD PRIMARY KEY (`ID`), ADD KEY `GENERO` (`GENERO`);

--
-- Indices de la tabla `TIPO_USUARIO`
--
ALTER TABLE `TIPO_USUARIO`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
 ADD PRIMARY KEY (`ID`), ADD KEY `TIPO_USUARIO` (`TIPO_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `GENERO`
--
ALTER TABLE `GENERO`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PELICULAS`
--
ALTER TABLE `PELICULAS`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `PELICULAS_SAGAS`
--
ALTER TABLE `PELICULAS_SAGAS`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `SAGAS`
--
ALTER TABLE `SAGAS`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `TIPO_USUARIO`
--
ALTER TABLE `TIPO_USUARIO`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `PELICULAS`
--
ALTER TABLE `PELICULAS`
ADD CONSTRAINT `PELICULAS_ibfk_1` FOREIGN KEY (`GENERO`) REFERENCES `GENERO` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `PELICULAS_SAGAS`
--
ALTER TABLE `PELICULAS_SAGAS`
ADD CONSTRAINT `PELICULAS_SAGAS_ibfk_1` FOREIGN KEY (`ID_SAGA`) REFERENCES `SAGAS` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `SAGAS`
--
ALTER TABLE `SAGAS`
ADD CONSTRAINT `SAGAS_ibfk_1` FOREIGN KEY (`GENERO`) REFERENCES `GENERO` (`ID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIOS`
--
ALTER TABLE `USUARIOS`
ADD CONSTRAINT `USUARIOS_ibfk_1` FOREIGN KEY (`TIPO_USUARIO`) REFERENCES `TIPO_USUARIO` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;