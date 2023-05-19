-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-03-2023 a las 07:32:10
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(28, '2022-12-25', '07:00:00', 21, 8, 1, '2022-12-24 23:58:31'),
(29, '2023-01-13', '03:21:00', 22, 8, 1, '2023-01-07 08:19:31'),
(30, '2023-03-30', '09:42:00', 23, 8, 1, '2023-01-09 10:43:00'),
(31, '2023-03-30', '09:42:00', 23, 8, 1, '2023-01-09 10:46:04'),
(32, '2023-03-30', '05:50:00', 23, 7, 1, '2023-01-09 10:47:35'),
(33, '2023-03-23', '20:00:00', 25, 6, 2, '2023-03-12 01:00:25'),
(35, '2023-03-16', '19:28:24', 1, 1, 1, '2023-03-12 01:58:14'),
(36, '2023-03-16', '19:28:24', 1, 1, 1, '2023-03-12 01:59:59'),
(37, '2023-03-16', '19:28:24', 1, 1, 1, '2023-03-12 02:02:05'),
(38, '2023-03-16', '19:28:24', 1, 2, 1, '2023-03-02 03:37:10'),
(39, '2023-03-16', '19:28:24', 23, 3, 1, '2023-02-17 03:48:02'),
(40, '2023-03-16', '19:28:24', 3, 3, 1, '2023-03-12 04:08:45'),
(41, '2023-03-16', '19:28:24', 1, 1, 1, '2023-03-12 05:08:41'),
(42, '2023-03-16', '19:28:24', 1, 1, 1, '2023-03-12 05:49:38'),
(43, '2023-03-16', '19:28:24', 1, 1, 1, '2023-03-12 05:52:42'),
(44, '2024-03-16', '19:28:24', 2, 1, 1, '2023-03-12 05:53:49'),
(45, '2023-03-16', '00:00:03', 4, 1, 1, '2023-03-12 05:58:28'),
(46, '2023-03-23', '19:28:24', 25, 6, 0, '2023-03-12 06:04:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `apellidos`, `correo`, `edad`, `ocupacion`, `sexo`, `estado_civil`, `peso`, `nacimiento`, `familiar`, `telefono`, `direccion`, `enfermedad`, `tipo_sangre`, `alergias`, `curp`, `fecha`, `estado`, `id_user`) VALUES
(10, 'usuarios', 'ws', 'Usuario@gmail.coms', '10', 'www', 'Femenino', 'saa', '100', '2022-12-30', '1', '99111656701', '1', 'ee', 'j', 'ee', 'fdgfdhgfdhgfdhfdhg', '2022-12-23 17:38:23', 'Atendido', 11),
(11, 'Max', 'White', 'jabona3158@letpays.com', '10', 'No lose', 'Masculino', 'Calle 20', '50', '2022-12-31', 'Ejemplo', '9911165670', 'Cancun', 'SIDA', 'o+', 'No', 'dfrgfchdfghsdth', '2022-12-24 00:32:56', 'Pendiente', 11),
(14, 'Emmanuel', 'Poot Mugarte', 'mugarte5672@gmail.com', '21', 'Ninguna', 'Masculino', 'Soltero', '65', '2022-12-23', 'Efe', '9911165670', 'Mexico', 'Ninguna', '0-', 'No', 'POMP010314HYNTGRA6', '2022-12-24 05:57:45', 'Pendiente', 0),
(21, 'America ', 'Gomez Chavez', 'example@gmail.mx', '28', 'Ninguna', 'Femenino', 'Casado(a)', '50', '2022-12-24', 'Nadie', '9911165670', 'Veracruz', 'Ninguna', 'O+', 'No', '123456789123456789', '2022-12-24 15:33:04', 'Pendiente', 18),
(22, 'Alejandro', 'Galarza', 'pruebas@outlook.co.nz', '32', 'Ninguna', 'Masculino', 'Soltero(a)', '34', '2022-06-07', 'Mama', '9981276091', '2190 Beech Street', 'no', 'o', 'no', 'GATA010624HQRLHLA8', '2023-01-07 08:17:16', 'Pendiente', 30),
(23, 'Alejandro', 'Galarza', '00314412@red.unid.mx', '23', 'Ninguna', 'Masculino', 'Soltero(a)', '34', '2022-12-07', 'Mama', '9981276091', '2190 Beech Street', 'no', 'AB+', 'no', 'GATA010624HQRLHLA8', '2023-01-09 09:23:20', 'Pendiente', 31),
(24, 'Alejandro', 'Galarza', 'zumladigni@gufum.com', '22', 'Ninguna', 'Masculino', 'Soltero(a)', '54', '2001-01-30', 'NINGUNA', '9981276091', '2190 Beech Street', 'no', 'A-', 'no', 'GATA010624HQRLHLA8', '2023-03-11 07:27:28', 'Pendiente', 55),
(25, 'Alejandro', 'Galarza', 'vagonusid@jollyfree.com', '0', 'Ninguna', 'Masculino', 'Divorciado(a)', '34', '2023-03-11', 'NINGUNA', '9981276091', '2190 Beech Street', 'n', 'B+', 'no', 'GATA010624HQRLHLA8', '2023-03-11 07:32:20', 'Pendiente', 49);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`id`, `email`, `key`, `expDate`) VALUES
(6, 'jalegalarza@gmail.com', '59500f3f171d63abcb7a9e1c974dbdc43e96ccce6e', '2023-01-03 04:01:06'),
(7, 'jalegalarza@gmail.com', '59500f3f171d63abcb7a9e1c974dbdc47c748bd9ca', '2023-01-08 04:03:20'),
(8, 'jalegalarza@gmail.com', '59500f3f171d63abcb7a9e1c974dbdc4cbfccc3035', '2023-01-08 04:04:53');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Doctor'),
(3, 'Paciente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp_verify_code`
--

CREATE TABLE `tmp_verify_code` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `key` varchar(300) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tmp_verify_code`
--

INSERT INTO `tmp_verify_code` (`id`, `email`, `key`, `expDate`) VALUES
(4, 'mogogitive@jollyfree.com', '0839c4a5fad508372615fd81edd8ee998de4df98b1', '2023-03-09 18:21:11'),
(5, 'vopebum.jevuvos@jollyfree.com', 'ef9dc27f263b2aa526282bc5134a31e5e508c060c9', '2023-03-09 18:23:07'),
(6, 'rinedibifa@jollyfree.com', '621b2a49a460532094bf51b6cb7d325f62548dfea3', '2023-03-09 18:30:15'),
(7, 'nefasidum@jollyfree.com', '041a63d318c32d9ef4c28201ac725bb1b8115f44f6', '2023-03-09 18:32:18'),
(14, 'jalegalarza@gmail.com', '59500f3f171d63abcb7a9e1c974dbdc456ddb8809e', '2023-03-10 03:50:25'),
(15, 'jelocaperas@rungel.net', 'df2658c7b35132a2c31cf0acecf633470e312a2cd6', '2023-03-10 21:20:45'),
(16, 'mavoye3938@maazios.com', 'd0c777b1fb45d13652c8cb97b93feb56553d9a291f', '2023-03-10 21:36:04'),
(17, 'gelinonefida@rungel.net', '1e6743d2059cbc7b6605a452cdc6779943d88d6398', '2023-03-10 21:41:02'),
(18, 'tuqatefeli@jollyfree.com', '27280229ce58ae7e200ca8e80ffc57dd610facd953', '2023-03-11 00:34:47'),
(29, 'tibuqipucocu@gotgel.org', '96bcbb663c539b8ca7540699a212b1385a82c46faa', '2023-03-11 02:10:10'),
(30, 'himenofob.rabadiqub@gotgel.org', '53455b7829c8b1c6e4ab9d74712c5287143655433b', '2023-03-11 02:29:17'),
(31, 'sopomobu.ebovome@jollyfree.com', 'c62e3e83cdf0b0c7db106538cffe6a9c2feb5ee778', '2023-03-11 02:32:39'),
(35, 'fumicadu@rungel.net', '92ccaf17906827d3ddc02542c22d10f5f175f1678a', '2023-03-11 03:05:56'),
(36, 'zumladigni@gufum.com', 'b8e3bba2efe581bfb83f78d7f9bc24a2fba7533cb3', '2023-03-12 08:24:51');

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
  `rol` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `verified` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `nombre`, `correo`, `password`, `fecha`, `rol`, `status`, `verified`) VALUES
(11, 'Emanuel', 'mugarte5672@gmail.com', '12345', '2022-08-27 16:43:19', 1, 1, 0),
(12, 'user', 'usuario@gmail.com', '12345', '2022-08-27 16:43:37', 2, 1, 0),
(13, 'Administrador', 'admin@softcodepm.com', '12345', '2022-08-29 14:22:36', 1, 1, 0),
(17, 'Prueba', 'prueba@gmail.com', '12345', '2022-12-24 05:40:52', 3, 1, 0),
(18, 'Ejemplo', 'example@gmail.mx', '12345', '2022-12-24 15:12:39', 3, 1, 0),
(19, 'Alejandro2312', 'jabona3158@letpays.com', '$2y$05$LtLtkrYP2686T/ONrYNXEuPQ9pItG6A1gzGiFSFfwfsXGa5nlOvKe', '2023-01-06 03:57:57', 1, 0, 0),
(30, 'Alejandro', 'pruebas@outlook.co.nz', '$2y$05$QqPd33VKbP665n0kvC13ke1mv4/L81UbxG0lfgAd6GARl9jyViWiG', '2023-01-07 08:13:17', 2, 0, 0),
(31, 'Alejandro23', '00314412@red.unid.mx', '$2y$05$QCsTBWv16y.inH5Rt81FdOCSnWR8lgzuDFt9rSdUgmv6CYDtCQiYC', '2023-01-09 09:01:11', 3, 3, 0),
(32, 'Emanul', 'demitanab.tabitude@jollyfree.com', '$2y$05$aMeA/72T5opzPcDfj52YGefPC2bkBby6zqtyUXNA7klnWxQ5IWSzq', '2023-03-08 16:28:20', 3, 2, 0),
(33, 'Emanuel', 'ticadaq.coladu@rungel.net', '$2y$05$34upe06s.UyERd0ULPLUduwQgaWlOv0tRlySOawrRcgyOU1lZPtOy', '2023-03-08 16:30:55', 3, 2, 0),
(34, 'Emanuel', 'tufacalebup@rungel.net', '$2y$05$KWO/Wu2c6.zscfZReRS3YOFF9wvIntSGxljiHXTjsgbI4SBVDSFjK', '2023-03-08 16:32:26', 3, 2, 0),
(35, 'Emanuel', 'tivofor.sijojuh@rungel.net', '$2y$05$bucaXoCsPD.Zs56mhiqq5.MKc.GHNsevrQUmFe7h4v8Rx1nBu900y', '2023-03-08 16:35:30', 3, 2, 0),
(36, 'Emanuel', 'pehepijevo@jollyfree.com', '$2y$05$Eg3vg1wcQECL4TU9joPf3.RcHibBE1.j1466Da36I.fvPkSm01N5G', '2023-03-08 16:37:24', 3, 2, 0),
(37, 'Emanuel', 'hegegijanah@rungel.net', '$2y$05$fC6U7TTPChK814tvRd/Sau3iTtbiofmThNX2Q59SzQrdvQViFV/4O', '2023-03-08 16:41:41', 3, 2, 0),
(38, 'Emanuel', 'fihutiget@gotgel.org', '$2y$05$TxAWA8sZNb0dcK2I/Gwo9Oto7vtiTxvAxB7yg8Np6YyOes4BFILgO', '2023-03-08 16:43:07', 3, 2, 0),
(40, 'ale', 'mogogitive@jollyfree.com', '$2y$05$tbcFSVLy0D.lBn61Q/VgI.fFQBtcaDQmRIwSiVwqduoM13dpHdAJy', '2023-03-08 17:21:11', 3, 2, 0),
(41, 's', 'vopebum.jevuvos@jollyfree.com', '$2y$05$nNOu/WtHFrVPeCO6i2g8P.kZp.GtFD2ssAL/ysPEMsAWc0hO38.A6', '2023-03-08 17:23:06', 3, 2, 0),
(42, 'dsd', 'rinedibifa@jollyfree.com', '$2y$05$MinU7B6J3nRrJliEV6OPCejAgB4QSXrPrYO1hETvI7A7neaasUKie', '2023-03-08 17:30:15', 3, 2, 0),
(43, 'Emanuel', 'nefasidum@jollyfree.com', '$2y$05$o8vx4bpbnjHvaD6h7Q9nROY21Q/Ut4c3ubsVAqr9KixqnEWoGBHWG', '2023-03-08 17:32:18', 3, 2, 0),
(44, 'ALejandro', 'jalegalarza@gmail.com', '$2y$05$54kdBjdQnPcM9lhoPiyJv.7//T5.v/DZzjIdUy/BFcoiUO0niM4n6', '2023-03-08 21:56:04', 3, 2, 0),
(45, 'Emanuel', 'jelocaperas@rungel.net', '$2y$05$x2DQklgzEZ8PE4YRnClISOXnq/HzlbPZrgv6DZjEiLTrffKubtUhm', '2023-03-09 20:20:45', 3, 2, 0),
(46, 'Alejandro23', 'mavoye3938@maazios.com', '$2y$05$XUUCL1FquuMz9YDmqW76.uw.cAcIciwVMdTAk51TXch6O/oGx1Eoi', '2023-03-09 20:36:04', 3, 2, 0),
(47, 'Emanuel121', 'gelinonefida@rungel.net', '$2y$05$om6Su51mI1iUgu./eOg.cuv5IMfWaXLYoStebHzxn2rY0zgotwEXO', '2023-03-09 20:41:02', 3, 2, 0),
(48, 'Emanuel', 'tuqatefeli@jollyfree.com', '$2y$05$HlOWVqLPtMxfX1iwqxUr8eAyCscZECBaXTem7D9Y33t4k85wg42dG', '2023-03-09 23:34:46', 3, 2, 0),
(49, 'dsa', 'vagonusid@jollyfree.com', '$2y$05$cCAzYWPHb2mAaSup3MiXkuXumfPCFNCaVLaNbMe471TtTGXdxVKFi', '2023-03-09 23:36:08', 2, 0, 1),
(50, 'Emanuel121', 'tibuqipucocu@gotgel.org', '$2y$05$HKfDZaF78PVwJwBPjwctvO0/sTtgsJwKpQM.IbFqiCseFwrEWv9uu', '2023-03-10 01:10:10', 3, 2, 1),
(51, 'adasdsada', 'himenofob.rabadiqub@gotgel.org', '$2y$05$yFh2/oTr0L8mtXxkjSNoGO5bDloswnQgIkNpbmvxD/W82RRoTsj5m', '2023-03-10 01:29:17', 3, 2, 1),
(52, 'gdgfgdfg', 'sopomobu.ebovome@jollyfree.com', '$2y$05$YZOkoJ4SUEMqf8Ae6hnhq.6Ral8FfVAopGcNlFsOknVfMFenJRxsS', '2023-03-10 01:32:39', 3, 2, 0),
(53, 'adasdas', 'fipelane@rungel.net', '$2y$05$1inTwiFkH4.ja5pxxYmKc.8Mwmo9wwtQfpisUquGqD3iPQ9RzdJzu', '2023-03-10 01:54:44', 3, 2, 1),
(54, 'dasdsadsad', 'fumicadu@rungel.net', '$2y$05$ZoKcGThqLPzxsjNY0c.Q1.ZcFxmUhJxUL9.Lclr.IBT.BJkaugFem', '2023-03-10 02:05:55', 3, 2, 0),
(55, 'perez', 'zumladigni@gufum.com', '$2y$05$suG4GIcLCh939T2cfnT4Tu5kZoy2nQg1bjlMoa4LIcVzwOyrKhDA2', '2023-03-11 07:24:51', 3, 3, 1);

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
-- Indices de la tabla `tmp_verify_code`
--
ALTER TABLE `tmp_verify_code`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`),
  ADD KEY `permisos` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT de la tabla `tmp_verify_code`
--
ALTER TABLE `tmp_verify_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
