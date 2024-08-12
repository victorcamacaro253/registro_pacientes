-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-08-2024 a las 04:19:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basesegura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_pacientes`
--

CREATE TABLE `historial_pacientes` (
  `id_historial` int(50) NOT NULL,
  `id_paciente` int(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `diagnostico` varchar(2050) NOT NULL,
  `tratamiento` varchar(2050) NOT NULL,
  `fecha_consulta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_pacientes`
--

INSERT INTO `historial_pacientes` (`id_historial`, `id_paciente`, `descripcion`, `diagnostico`, `tratamiento`, `fecha_consulta`) VALUES
(1, 1, 'ruhgur', '', '', '2024-08-06'),
(2, 1, 'dfsdd', '', '', '2024-08-13'),
(3, 1, 'dvsgvfdxc', '', '', '2024-08-28'),
(4, 2, 'dvsvxcvcx', '', '', '2024-08-12'),
(5, 2, 'vxcvxc', '', '', '2024-08-14'),
(6, 10, 'cvscxvxfc', 'dvxdsvgsdfxc', 'vxfcvfcxv', '2024-05-07'),
(7, 11, 'dfsdgsdf', 'vfsdgsxfd', 'sdfsdfs', '2024-05-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `primer_nombre` varchar(250) NOT NULL,
  `segundo_nombre` varchar(250) NOT NULL,
  `primer_apellido` varchar(250) NOT NULL,
  `segundo_apellido` varchar(250) NOT NULL,
  `cedula` varchar(50) NOT NULL,
  `genero` enum('F','M') NOT NULL,
  `direccion` varchar(1024) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `imagen` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `cedula`, `genero`, `direccion`, `telefono`, `imagen`) VALUES
(1, 'victor', 'manuel', '123', '', '12347', 'M', 'la greda', '1234556', ''),
(2, 'ana', 'beatriz', 'alvarez', 'zambrano', '867674545434', 'F', 'la greda', '74655765', ''),
(7, 'edirmary', 'yubexi', 'parra', '', '187487658', 'F', 'barrio union', '0234939849', ''),
(8, 'Ander', 'jhoan', 'rodriguez', 'gil', '45435443', 'M', 'la paz', '564565', ''),
(10, 'mirlangel', 'jose', 'cortez', 'melendez', '345789', 'F', 'djfdjnfv', '584989', ''),
(11, 'marina', 'de los angeles', 'chirinos', 'alvarez', 'dkslk', 'F', 'nskncsk', 'nskdskck', ''),
(12, 'diosdao', 'cabello', 'alkalk', 'kslfdkl', 'kokofk', 'M', 'dfndjn', 'wi99991', ''),
(13, 'diosdao', 'cabello', 'alkalk', 'kslfdkl', 'kokofk', 'M', 'dfndjn', 'wi99991', ''),
(14, 'dfsfsd', 'gsdvsd', 'fsdfsdfsd', 'dfsdfsd', '43847857', 'F', 'SECTOR FINAL SECTOR EL ASFALTO FRENTE AVENIDA 1 VIA POTRERITO.DERECHA CALLE PRINCIPAL.IZQUIERDA CALLE 3 FRENTE A LA BODEGA EL SOCORRO CASA', '04245643535', ''),
(15, 'ewfwew', 'fwdfwdfd', 'fdsfdf', 'dfdf', '34354', 'F', 'dfsdfgsdgs', '54645', ''),
(16, 'ewfwew', 'fwdfwdfd', 'fdsfdf', 'dfdf', '34354', 'F', 'dfsdfgsdgs', '54645', ''),
(17, 'ewfwew', 'fwdfwdfd', 'fdsfdf', 'dfdf', '34354', 'F', 'dfsdfgsdgs', '54645', ''),
(18, 'efwfsdg', 'desfgstgrg', 'wfsdgd', 'sdfgsfgvs', '343534', 'F', ' SECTOR FINAL SECTOR EL ASFALTO FRENTE AVENIDA 1 VIA POTRERITO. DERECHA CALLE PRINCIPAL. IZQUIERDA CALLE 3 FRENTE A LA BODEGA EL SOCORRO CASA', '3234543', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id` int(50) NOT NULL,
  `nombre` varchar(244) NOT NULL,
  `paterno` varchar(250) NOT NULL,
  `materno` varchar(250) NOT NULL,
  `telefono` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id`, `nombre`, `paterno`, `materno`, `telefono`) VALUES
(3, 'victor', 'camacaro', 'alvarez', '223467888'),
(4, 'edirmary', 'parra', 'echeverria ', '1234578'),
(11, 'ander', 'rodriguez', 'gil', '12347'),
(12, 'edirmary', 'fgege', 'gfgfd', 'fgfd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_pacientes`
--
ALTER TABLE `historial_pacientes`
  ADD PRIMARY KEY (`id_historial`),
  ADD KEY `id_pacientes` (`id_paciente`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_pacientes`
--
ALTER TABLE `historial_pacientes`
  MODIFY `id_historial` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial_pacientes`
--
ALTER TABLE `historial_pacientes`
  ADD CONSTRAINT `id_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
