-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-01-2023 a las 04:59:13
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `medicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `fecha`, `hora`, `id_paciente`, `id_doctor`, `estado`, `fecha_registro`) VALUES
(17, '2022-12-23', '18:48:00', 11, 8, 1, '2022-12-24 00:46:32'),
(18, '2022-12-31', '12:30:00', 14, 8, 1, '2022-12-24 06:12:40'),
(20, '2022-12-31', '10:30:00', 21, 8, 1, '2022-12-24 15:35:41'),
(21, '2022-12-24', '17:20:00', 11, 6, 2, '2022-12-24 22:20:57'),
(22, '2022-12-27', '18:40:00', 21, 6, 1, '2022-12-24 22:41:08'),
(25, '2022-12-20', '19:30:00', 14, 7, 1, '2022-12-24 23:25:54'),
(26, '2022-12-01', '10:30:00', 21, 6, 2, '2022-12-24 23:26:54'),
(27, '2023-01-01', '09:30:00', 10, 6, 1, '2022-12-24 23:28:27'),
(28, '2022-12-25', '07:00:00', 21, 8, 1, '2022-12-24 23:58:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `cedula` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `correo` varchar(50) NOT NULL DEFAULT 'current_timestamp()',
  `id_horario` int(11) NOT NULL,
  `id_especialidad` int(11) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id`, `cedula`, `name`, `apellidos`, `correo`, `id_horario`, `id_especialidad`, `sexo`, `telefono`, `direccion`, `fecha`, `fecha_registro`, `id_rol`) VALUES
(6, 101, 'Ejemplo', 'Example', 'mugarte5672@gmail.com.mx', 4, 6, 'Masculino', '99111656701', '0', '2022-09-05', '2022-09-05 15:56:14', 0),
(7, 4535463, 'usuario', 'user', 'Usuario@gmail.mx.com', 1, 1, 'Masculino', '549481512', 'xxss', '2022-12-25', '2022-12-23 17:58:09', 0),
(8, 4578, 'Jonn', 'Campos', 'campos12@gmail.com', 6, 8, 'Masculino', '99111656701', 'dgdfgh', '2022-12-31', '2022-12-23 23:55:41', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(100) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidades`
--

INSERT INTO `especialidades` (`id`, `especialidad`, `fecha`) VALUES
(1, 'Medicina General', '2022-08-25 01:20:04'),
(5, 'Cardiologia', '2022-08-25 01:51:36'),
(6, 'Pediatria', '2022-08-25 01:51:51'),
(7, 'Dermatologia', '2022-08-25 06:11:51'),
(8, 'Odontologia', '2022-08-25 16:46:32'),
(9, 'Oftamologia', '2022-12-24 00:30:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `estado`) VALUES
(1, 'Atendido'),
(2, 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `dias` varchar(250) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `dias`, `id_doctor`, `fecha`) VALUES
(1, 'Lunes', 6, '2022-08-25 06:02:19'),
(4, 'Domingos', 7, '2022-08-25 16:44:49'),
(5, 'Martes, Miercoles', 7, '2022-12-23 18:03:05'),
(6, 'Martes, Jueves', 8, '2022-12-24 00:20:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicamentos`
--

CREATE TABLE `medicamentos` (
  `id` int(11) NOT NULL,
  `caducidad` date NOT NULL,
  `medicamento` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `entrada` date NOT NULL,
  `salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medicamentos`
--

INSERT INTO `medicamentos` (`id`, `caducidad`, `medicamento`, `marca`, `cantidad`, `entrada`, `salida`) VALUES
(2, '2023-01-03', 'Prueba', 'FERMONT', 20, '2023-01-03', '2023-01-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `edad` varchar(150) NOT NULL,
  `ocupacion` varchar(150) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `estado_civil` varchar(150) NOT NULL,
  `peso` varchar(150) NOT NULL,
  `nacimiento` date NOT NULL,
  `familiar` varchar(150) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `enfermedad` varchar(150) NOT NULL,
  `tipo_sangre` varchar(150) NOT NULL,
  `alergias` varchar(150) NOT NULL,
  `curp` varchar(150) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellidos`, `correo`, `edad`, `ocupacion`, `sexo`, `estado_civil`, `peso`, `nacimiento`, `familiar`, `telefono`, `direccion`, `enfermedad`, `tipo_sangre`, `alergias`, `curp`, `fecha`, `estado`, `id_user`) VALUES
(10, 'usuarios', 'ws', 'Usuario@gmail.coms', '10', 'www', 'Femenino', 'saa', '100', '2022-12-30', '1', '99111656701', '1', 'ee', 'j', 'ee', 'fdgfdhgfdhgfdhfdhg', '2022-12-23 17:38:23', 'Atendido', 0),
(11, 'Max', 'White', 'example@gmail.com', '10', 'No lose', 'Masculino', 'Calle 20', '50', '2022-12-31', 'Ejemplo', '9911165670', 'Cancun', 'SIDA', 'o+', 'No', 'dfrgfchdfghsdth', '2022-12-24 00:32:56', 'Pendiente', 0),
(14, 'Emmanuel', 'Poot Mugarte', 'mugarte5672@gmail.com', '21', 'Ninguna', 'Masculino', 'Soltero', '65', '2022-12-23', 'Efe', '9911165670', 'Mexico', 'Ninguna', '0-', 'No', 'POMP010314HYNTGRA6', '2022-12-24 05:57:45', 'Pendiente', 0),
(21, 'America ', 'Gomez Chavez', 'example@gmail.mx', '28', 'Ninguna', 'Femenino', 'Casado(a)', '50', '2022-12-24', 'Nadie', '9911165670', 'Veracruz', 'Ninguna', 'O+', 'No', '123456789123456789', '2022-12-24 15:33:04', 'Pendiente', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `diagnostico` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id`, `id_doctor`, `id_medicamento`, `id_paciente`, `fecha`, `diagnostico`) VALUES
(1, 6, 2, 21, '2023-01-03', 'Prueba'),
(3, 8, 2, 11, '2023-01-12', 'Tiene SIDA Y VIH\r\n\r\n'),
(4, 8, 2, 11, '2023-01-11', 'XXXX');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Doctor'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `password`, `fecha`, `rol`) VALUES
(11, 'Emanuel', 'mugarte5672@gmail.com', '12345', '2022-08-27 16:43:19', 1),
(12, 'user', 'usuario@gmail.com', '12345', '2022-08-27 16:43:37', 2),
(13, 'Administrador', 'admin@softcodepm.com', '12345', '2022-08-29 14:22:36', 1),
(15, 'Alejandro', 'jalegalarza@gmail.com', '$2y$05$PrDlX8cPuoC.Yp2SIJEbSOkZqr82GWjPBWPSvUIKIfQwpxhX/PkU6', '2022-12-23 19:01:58', 1),
(17, 'Prueba', 'prueba@gmail.com', '12345', '2022-12-24 05:40:52', 3),
(18, 'Ejemplo', 'example@gmail.mx', '12345', '2022-12-24 15:12:39', 3),
(19, 'Alejandro2312', 'jabona3158@letpays.com', '$2y$05$LtLtkrYP2686T/ONrYNXEuPQ9pItG6A1gzGiFSFfwfsXGa5nlOvKe', '2023-01-06 03:57:57', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `medicamentos`
--
ALTER TABLE `medicamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `permisos` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
