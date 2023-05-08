-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2021 a las 02:52:34
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregaresiduos`
--

CREATE TABLE `entregaresiduos` (
  `id_entregaResiduo` int(11) NOT NULL,
  `registroResiduo` int(11) NOT NULL,
  `tipoResiduo` int(11) DEFAULT NULL,
  `peso` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entregaresiduos`
--

INSERT INTO `entregaresiduos` (`id_entregaResiduo`, `registroResiduo`, `tipoResiduo`, `peso`) VALUES
(11, 5, 1, 0.25),
(12, 10, 1, 4.5),
(13, 10, 1, 5),
(14, 9, 1, 0.25),
(20, 10, 1, 3),
(21, 10, 1, 3),
(22, 10, 1, 3),
(23, 9, 14, 3),
(24, 9, 14, 3),
(25, 9, 14, 3),
(26, 10, 1, 1),
(27, 10, 1, 0),
(31, 5, 1, 0),
(32, 10, 1, 0),
(33, 10, 1, 0),
(34, 10, 1, 0),
(35, 10, 1, 0),
(36, 10, 1, 0),
(37, 10, 1, 0),
(38, 9, 1, 0),
(39, 21, 6, 0),
(40, 23, 7, 0),
(41, 8, 1, 0),
(42, 24, 5, 0.5),
(43, 24, 27, 0.21),
(44, 25, 14, 0.5),
(45, 25, 1, 0),
(46, 5, 1, 0.5),
(48, 15, 1, 1.5),
(50, 15, 1, 5),
(52, 15, 1, 5),
(53, 15, 14, 9),
(54, 22, 1, 0.4),
(56, 26, 29, 20),
(57, 26, 13, 2.6),
(58, 27, 29, 30),
(59, 27, 6, 2),
(60, 28, 34, 0.5),
(61, 28, 13, 0.4),
(62, 29, 32, 0.4),
(64, 30, 4, 5),
(66, 31, 3, 5),
(67, 31, 35, 0.4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichas`
--

CREATE TABLE `fichas` (
  `id_ficha` int(11) NOT NULL,
  `numeroFicha` varchar(30) NOT NULL,
  `ambiente` varchar(15) NOT NULL,
  `instructor` varchar(100) NOT NULL,
  `jornada` enum('Mañana','Tarde','Noche') NOT NULL,
  `nombrePrograma` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fichas`
--

INSERT INTO `fichas` (`id_ficha`, `numeroFicha`, `ambiente`, `instructor`, `jornada`, `nombrePrograma`) VALUES
(1, '2027446', '14b', 'Carlos Caro', 'Noche', 'ADSI'),
(2, '1947662', '08A', 'Juan Perez', 'Mañana', 'Mecatronica'),
(3, '209876', '9A', 'Lizley Reyes', 'Tarde', 'Dibujo Arquitectonico'),
(5, '209876', '9A', 'Lizley Reyes', 'Mañana', 'Diseño de Modas'),
(10, '1956772', '6B', 'Juan Camilo Gomez', 'Noche', 'HSQ'),
(11, '2027445', '14A', 'Luis Miguel Diaz', 'Mañana', 'Gestión de Deportes'),
(13, '2198542', 'Mecatronica', 'Luis Manuel Perez', 'Tarde', 'Mecatronica'),
(14, '2146703', '8B', 'Manuel Fernando Lopez', 'Noche', 'ADSI'),
(15, '2219556', '15A', 'Andres Felipe Granados', 'Tarde', 'HSQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroresiduos`
--

CREATE TABLE `registroresiduos` (
  `id_residuos` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombreAprendiz` varchar(50) NOT NULL,
  `usuarios` int(11) DEFAULT NULL,
  `ficha` int(11) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `estado` enum('Pendiente','Realizado') NOT NULL,
  `firmaAprendiz` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registroresiduos`
--

INSERT INTO `registroresiduos` (`id_residuos`, `fecha`, `nombreAprendiz`, `usuarios`, `ficha`, `observaciones`, `estado`, `firmaAprendiz`) VALUES
(5, '2021-06-20 02:06:16', 'Maria Isabel Forero', 16, 2, 'Ninguna', 'Pendiente', '5'),
(6, '2021-06-22 01:13:38', 'Cristian Sebastian Neita Alvarez', 2, 1, 'Ninguna', 'Pendiente', '0986'),
(7, '2021-06-23 00:01:20', 'Cristian Sebastian', 1, 1, 'Ninguna', 'Pendiente', '4'),
(8, '2021-06-29 03:43:40', 'Cristian Sebastian', 20, 1, 'Ninguna', 'Realizado', '890929'),
(9, '2021-06-26 21:40:44', 'Maria diaz', 22, 5, 'Ninguna', 'Realizado', '957803'),
(10, '2021-06-26 21:22:33', 'Rosa', 22, 3, 'Ninguna', 'Realizado', '222591'),
(11, '2021-06-28 20:05:57', 'Nicolas Camilo Mendivelso', NULL, 1, 'Ninguna', 'Pendiente', '151412'),
(12, '2021-06-28 20:07:19', 'Nicolas Camilo Mendivelso', NULL, 1, 'Ninguna', 'Pendiente', '666138'),
(13, '2021-06-28 20:11:05', 'Cristian Sebastian', NULL, 1, 'Ninguna', 'Pendiente', '192502'),
(14, '2021-06-28 20:11:27', 'Cristian Sebastian', NULL, 1, 'Ninguna', 'Pendiente', '365458'),
(15, '2021-06-29 21:01:05', 'Cristian Neita', 20, 14, 'Ninguna', 'Realizado', '209837'),
(16, '2021-06-28 20:19:29', 'Juan Camilo Diaz', NULL, 14, 'Ninguna', 'Pendiente', '983188'),
(17, '2021-06-29 02:20:12', 'Cristian Neita', NULL, 2, 'Ninguna', 'Pendiente', '123456'),
(18, '2021-06-28 20:22:21', 'Carlos Perez', NULL, 5, 'Ninguna', 'Pendiente', '586097'),
(20, '2021-06-28 20:26:42', 'Carlos Perez', NULL, 3, 'Ninguna', 'Pendiente', '722717'),
(21, '2021-06-28 20:34:19', 'Cristian Neita', 22, 5, 'Ninguna', 'Realizado', '098765'),
(22, '2021-06-29 21:02:43', 'Carlos Andres Diaz', 20, 1, 'Ninguna', 'Realizado', '640401'),
(23, '2021-06-29 01:40:56', 'Cristian Sebastian', 22, 10, 'Ninguna', 'Realizado', '857594'),
(24, '2021-06-29 04:40:41', 'Juan Manuel Perez', 22, 3, 'Ninguna', 'Realizado', '151938'),
(25, '2021-06-29 20:51:03', 'Rosa Maria Aguillon Leon', 20, 1, 'Ninguna', 'Realizado', '258848'),
(26, '2021-06-29 23:41:47', 'Geovany', 22, 11, 'Ninguna', 'Realizado', '586660'),
(27, '2021-07-01 02:18:00', 'Andres Fernando Diaz', 23, 13, 'Ninguna', 'Realizado', '572379'),
(28, '2021-07-06 23:45:31', 'Saray Daniela Gomez Alvarez', 22, 15, 'Mejorar el sistema de recolección', 'Realizado', '455850'),
(29, '2021-07-07 00:27:38', 'Laura Acero', 22, 14, 'Ninguna', 'Realizado', '938160'),
(30, '2021-07-07 23:23:04', 'Sebastian Mongui', 22, 15, 'Ninguna', 'Realizado', '922640'),
(31, '2021-07-07 23:23:41', 'Camilo Correa', 22, 1, 'Ninguna', 'Realizado', '943126');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporesiduos`
--

CREATE TABLE `tiporesiduos` (
  `id_tipoResiduo` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiporesiduos`
--

INSERT INTO `tiporesiduos` (`id_tipoResiduo`, `categoria`, `tipo`) VALUES
(1, 'Aprovechables', 'Cartón'),
(2, 'Aprovechables', 'Papel'),
(3, 'Aprovechables', 'Vidrio'),
(4, 'Aprovechables', 'Madera (Pedazos)'),
(5, 'Aprovechables', 'Aserrín de madera'),
(6, 'Aprovechables', 'Chatarra'),
(7, 'Aprovechables', 'Retazo de Tela'),
(13, 'Aprovechables', 'prueba'),
(14, 'Aprovechables', 'prueba2'),
(27, 'Organicos', 'funciono?'),
(29, 'Peligrosos', 'Aceite Usado de Carro'),
(31, 'Organicos', 'Envoltura de Alimentos'),
(32, 'Organicos', 'Barrido'),
(33, 'Organicos', 'Residuos de Cafeteria'),
(34, 'Organicos', 'Servilletas y Papel Higienico'),
(35, 'Peligrosos', 'Envases: aseo, pintura, barniz'),
(36, 'Peligrosos', 'Cartón contamido con aceite u otras sustancia'),
(37, 'Peligrosos', 'Estopas Contaminandas'),
(38, 'Peligrosos', 'Residuos liquídos refrigerante'),
(39, 'Peligrosos', 'Raes: Pilas, baterias y todo tipo electrico y electrónico'),
(40, 'Peligrosos', 'Toner'),
(41, 'Peligrosos', 'Ácido férrico'),
(42, 'Peligrosos', 'Acerrín contaminado con aceite'),
(43, 'Peligrosos', 'Elementos de aseo contaminados'),
(44, 'Peligrosos', 'Fibra de vidrio'),
(45, 'Peligrosos', 'Biosanitarios'),
(46, 'Especiales', 'Aceite de Cocina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiporesiduos_has_fichas`
--

CREATE TABLE `tiporesiduos_has_fichas` (
  `tipoResiduo` int(11) NOT NULL,
  `ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `tipoIdentificacion` enum('C.C','T.I','C.E') NOT NULL,
  `numeroIdentificacion` varchar(15) NOT NULL,
  `rol` enum('Administrador','Auxiliar') NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombres`, `apellidos`, `tipoIdentificacion`, `numeroIdentificacion`, `rol`, `estado`, `correo`, `password`) VALUES
(1, 'Cristian Sebastian', 'Neita Alvarez', 'C.C', '1007751125', 'Administrador', 'Activo', 'neitaalvarez@gmail.com', '123456'),
(2, 'Laura Melisa', 'Acero Sierra', 'C.C', '12345566', 'Administrador', 'Activo', 'lauraacero', '12345'),
(3, 'Carlos ', 'Caro', 'C.C', '123456', 'Auxiliar', 'Activo', 'carlos@gmail.com', '123456'),
(4, 'Prueba', 'Contraseña', 'C.C', '1234567', 'Auxiliar', 'Activo', 'prueba@gmail.com', '$2a$07$usesomesillystringfor.1'),
(5, 'Andres', 'Gomez', 'C.C', '09876521', 'Administrador', 'Activo', 'andresgomez', '$2a$07$usesomesillystringfor.H'),
(6, 'Prueba 2', 'Contraseña', 'C.C', '12312412', 'Auxiliar', 'Activo', 'prueba2', '$2y$10$KnDTZgYIbZkzBNaYapVg7uq'),
(7, 'Prueba ', 'Mensaje', 'C.C', '12334', 'Administrador', 'Activo', 'pruebamensaje', '$2y$10$GpKaOBaijFc3LtX1Ns2x6O6'),
(13, 'prueba', 'password', 'C.C', '1000000', 'Administrador', 'Activo', 'pruebapass', '$2y$10$OsODGx122LVueP.NK.ge3.I'),
(14, 'Cristian', 'password', 'C.C', '11111', 'Administrador', 'Activo', 'registro', '$2y$10$Q/u.5D/BXXYQTxS6c/PxxeCAAYJGrQHRjFUmtT7ftOGIlmhlwAhFu'),
(15, 'Karen', 'Sisa', 'T.I', '100000', 'Auxiliar', 'Activo', 'karen', ''),
(16, 'prueba', 'prueba', 'C.C', '323323', 'Administrador', 'Activo', 'laura', '$2y$10$RiVDYiZ32KBGzrvDhGTyKOfgsIbNKup.Rl3alYcc6d/bEOUSZQeOq'),
(20, 'Angie', 'Contraseña', 'C.C', '1234567', 'Administrador', 'Activo', 'actualizar', '$2y$10$TOZfWWkHvVpgXUWhIQszluyQ0nSLoJQ40rtyNV89z6ICJhZdU189G'),
(21, 'Paula Andrea', 'Perez Arenas', 'C.C', '0987654', 'Administrador', 'Activo', 'paula', '$2y$10$ZSvC8qSbytMlSgW.jkPlhebJLnSEHQFA1JmXkFcNy92aEehZ.amQ6'),
(22, 'Cristian Sebastian', 'Neita', 'C.C', '1007751125', 'Administrador', 'Activo', 'cristian', '$2y$10$4rPztnOV9v7d2i66HkwvIe3naLU/BYq2NqiKCXRUHqMvCxwqB0MT6'),
(23, 'Juan Camilo', 'Perez Arenas', 'C.C', '123456', 'Administrador', 'Activo', 'juan', '$2y$10$UBWSoIllhsjJIJyASC3b.ulKzA.sX/r0RKmUPkcgNYXnsJWMlI0qe'),
(24, 'Marieta', 'Alvarez Malpica', 'C.C', '46662415', 'Administrador', 'Activo', 'marieta', '$2y$10$0q8TJaxht2ALc3qGyVsGPeldMlWKy9mEr8jCZzowZfFuBtboIcsTy');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entregaresiduos`
--
ALTER TABLE `entregaresiduos`
  ADD PRIMARY KEY (`id_entregaResiduo`),
  ADD KEY `fk_registroResiduos_has_tipoResiduos_tipoResiduos1_idx` (`tipoResiduo`),
  ADD KEY `fk_registroResiduos_has_tipoResiduos_registroResiduos1_idx` (`registroResiduo`);

--
-- Indices de la tabla `fichas`
--
ALTER TABLE `fichas`
  ADD PRIMARY KEY (`id_ficha`);

--
-- Indices de la tabla `registroresiduos`
--
ALTER TABLE `registroresiduos`
  ADD PRIMARY KEY (`id_residuos`),
  ADD KEY `fk_registroResiduos_ficha1_idx` (`ficha`),
  ADD KEY `fk_registroResiduos_usuarios_idx` (`usuarios`);

--
-- Indices de la tabla `tiporesiduos`
--
ALTER TABLE `tiporesiduos`
  ADD PRIMARY KEY (`id_tipoResiduo`);

--
-- Indices de la tabla `tiporesiduos_has_fichas`
--
ALTER TABLE `tiporesiduos_has_fichas`
  ADD PRIMARY KEY (`tipoResiduo`,`ficha`),
  ADD KEY `fk_tipoResiduos_has_fichas_fichas1_idx` (`ficha`),
  ADD KEY `fk_tipoResiduos_has_fichas_tipoResiduos1_idx` (`tipoResiduo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entregaresiduos`
--
ALTER TABLE `entregaresiduos`
  MODIFY `id_entregaResiduo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `fichas`
--
ALTER TABLE `fichas`
  MODIFY `id_ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `registroresiduos`
--
ALTER TABLE `registroresiduos`
  MODIFY `id_residuos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `tiporesiduos`
--
ALTER TABLE `tiporesiduos`
  MODIFY `id_tipoResiduo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entregaresiduos`
--
ALTER TABLE `entregaresiduos`
  ADD CONSTRAINT `fk_registroResiduos_has_tipoResiduos_registroResiduos1` FOREIGN KEY (`registroResiduo`) REFERENCES `registroresiduos` (`id_residuos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroResiduos_has_tipoResiduos_tipoResiduos1` FOREIGN KEY (`tipoResiduo`) REFERENCES `tiporesiduos` (`id_tipoResiduo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `registroresiduos`
--
ALTER TABLE `registroresiduos`
  ADD CONSTRAINT `fk_registroResiduos_ficha1` FOREIGN KEY (`ficha`) REFERENCES `fichas` (`id_ficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroResiduos_usuarios` FOREIGN KEY (`usuarios`) REFERENCES `usuarios` (`id_usuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tiporesiduos_has_fichas`
--
ALTER TABLE `tiporesiduos_has_fichas`
  ADD CONSTRAINT `fk_tipoResiduos_has_fichas_fichas1` FOREIGN KEY (`ficha`) REFERENCES `fichas` (`id_ficha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tipoResiduos_has_fichas_tipoResiduos1` FOREIGN KEY (`tipoResiduo`) REFERENCES `tiporesiduos` (`id_tipoResiduo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
