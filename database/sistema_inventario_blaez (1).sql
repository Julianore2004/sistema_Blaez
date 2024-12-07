
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Base de datos: `sistema_inventario_blaez`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombreCategoria` varchar(255) NOT NULL,
  `descripcion_categoria` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombreCategoria`, `descripcion_categoria`, `date_added`) VALUES
(1, 'Repuestos', 'Equipos para el hogar', '2024-12-06 06:29:12'),
(4, 'Equipos', 'Equipos stihl', '2016-12-19 21:06:37'),
(5, 'Accesorios', 'Accesorios stihl', '2016-12-19 21:06:39'),
(6, 'a', 'a', '2024-12-04 17:51:11'),
(7, 'XXX', 'XXXX', '2024-12-04 21:04:50'),
(8, 'asas', 'as', '2024-12-05 18:52:51'),
(9, 'sss', 'ss', '2024-12-06 02:12:51'),
(10, 'qwewqew', 'ewqewq', '2024-12-06 06:29:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` int(11) NOT NULL,
  `nombrecompleto` varchar(255) NOT NULL,
  `programa_de_estudios` varchar(255) NOT NULL,
  `semestre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `nombrecompleto`, `programa_de_estudios`, `semestre`) VALUES
(1, 'Juan Pérez', 'Ingeniería de Sistemas', 'Semestre IV'),
(2, 'a', 'a', 'Semestre I'),
(3, 'z', 'z', 'Semestre III'),
(4, 'sa', 'as', 'Semestre I'),
(6, 'AAA', 'AAA', 'Semestre IV'),
(7, 'zzz', 'zz', 'Semestre III'),
(61, 'Sofía García', 'Ingeniería de Sistemas', 'Semestre II'),
(114, 'Juan Pérez', 'Ingeniería de Sistemas', 'Semestre I'),
(214, 'María López', 'Ingeniería de Sistemas', 'Semestre V'),
(341, 'Carlos Gómez', 'Ingeniería de Sistemas', 'Semestre II'),
(414, 'Ana Martínez', 'Ingeniería de Sistemas', 'Semestre V'),
(5141, 'Luis Rodríguez', 'Ingeniería de Sistemas', 'Semestre III');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `codigo_patrimonial` varchar(50) NOT NULL,
  `denominacion` varchar(255) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `color` varchar(50) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `dimensiones` varchar(100) NOT NULL,
  `valor` varchar(50) NOT NULL,
  `situacion` varchar(100) NOT NULL,
  `estado_de_observacion` varchar(255) NOT NULL,
  `observaciones` varchar(100) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `codigo_patrimonial`, `denominacion`, `marca`, `modelo`, `tipo`, `color`, `serie`, `dimensiones`, `valor`, `situacion`, `estado_de_observacion`, `observaciones`, `imagen`, `id_estudiante`, `id_categoria`) VALUES
(2, 'ASSAS', 'a', 'a', 'a', 's', 's', 's', 'SS', 's', 'sss', 'ss', 'ss', 'sss', 'ss', 1, 1),
(3, 'QAZXCV', 'XXX', 'XX', 'XXX', 'X', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 'XXX', 1, 4),
(4, 'PERRA', 'z', 'zz', 'zz', 'zz', 'zzz', 'zz', 'z', 'zz', 'zz', 'zz', 'zz', 'z', 'https://www.impacto.com.pe/storage/pc/md/173154252122960.webp', 2, 7),
(8, 'LAJS', 'XX', 'XX', 'XX', 'XZ', 'ZX', 'ZXZX', 'XZXZX', 'ZXXZ', 'XZX', 'SAS', 'XZX', 'XZX', 'ZX', 3, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

/* CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `id_estudiante` int(11) DEFAULT NULL,
  `imagen` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
 */

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `semestre` varchar(50) NOT NULL,
  `imagen` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


--
-- Volcado de datos para la tabla `modulo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `user_name` varchar(64) NOT NULL,
  `user_password_hash` varchar(255) NOT NULL,
  `user_email` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `user_name`, `user_password_hash`, `user_email`, `date_added`, `rol`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$qpkWKZ6CpsurgLnPxYl92uMJLCu.OpS9Y4x7MW4SVMtU5dpv8nvQ2', 'admin@admin.com', '2024-12-06 21:14:33', 'administrador');
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_categoria` (`id_categoria`);


--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5142;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `fk_inventario_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_inventario_estudiantes` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/* --
-- Filtros para la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD CONSTRAINT `fk_modulo_estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_modulo_estudiante` (`id_estudiante`);
 */