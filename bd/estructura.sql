-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-01-2023 a las 21:02:42
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id20080817_ljl_construccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiom`
--

CREATE TABLE `idiom` (
  `id_idiom` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `icino` varchar(75) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `our_company`
--

CREATE TABLE `our_company` (
  `id` int(11) NOT NULL,
  `idiom` varchar(11) COLLATE utf8mb4_spanish_ci NOT NULL,
  `c_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `c_description` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `our_company_file`
--

CREATE TABLE `our_company_file` (
  `id` int(11) NOT NULL,
  `id_our` int(11) NOT NULL,
  `our_file` mediumblob NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_personal` smallint(6) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ingles` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `user` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(45) COLLATE utf8mb4_spanish_ci NOT NULL,
  `photo` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_contact`
--

CREATE TABLE `personal_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_personal` smallint(10) NOT NULL,
  `type` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `content` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `schedule` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_project`
--

CREATE TABLE `personal_project` (
  `id` int(11) NOT NULL,
  `id_personal` smallint(6) NOT NULL,
  `cliente` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `participacion` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `logros` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_studies`
--

CREATE TABLE `personal_studies` (
  `id` int(11) NOT NULL,
  `id_personal` smallint(6) NOT NULL,
  `instituto` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `grado` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `anno` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_work_experience`
--

CREATE TABLE `personal_work_experience` (
  `id` int(11) NOT NULL,
  `id_personal` smallint(6) NOT NULL,
  `empresa` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `area` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `annos` varchar(10) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `logros` varchar(250) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id_projects` int(11) UNSIGNED NOT NULL,
  `pr_name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_direction` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_start_date` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_stop_date` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_description` varchar(350) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_status` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_show` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_category` int(11) UNSIGNED NOT NULL,
  `pr_stage_number` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pr_current_stage` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_file`
--

CREATE TABLE `projects_file` (
  `id_file` int(11) UNSIGNED NOT NULL,
  `id_project` int(11) UNSIGNED NOT NULL,
  `id_estage` int(11) UNSIGNED NOT NULL,
  `pj_file` mediumblob NOT NULL,
  `pj_description` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects_stage`
--

CREATE TABLE `projects_stage` (
  `id_stage` int(11) UNSIGNED NOT NULL,
  `id_project` int(11) UNSIGNED NOT NULL,
  `n_stage` int(11) UNSIGNED NOT NULL,
  `name_stage` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `description_stage` varchar(300) COLLATE utf8mb4_spanish_ci NOT NULL,
  `condition_stage` varchar(500) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud`
--

CREATE TABLE `tbl_solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `nombre` varchar(90) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apoderado` varchar(90) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `correo` varchar(25) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(400) COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud_file`
--

CREATE TABLE `tbl_solicitud_file` (
  `id` int(11) NOT NULL,
  `id_solicitu` int(11) NOT NULL,
  `archivo` mediumblob NOT NULL,
  `descripcion` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud_minuta`
--

CREATE TABLE `tbl_solicitud_minuta` (
  `id` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `minuta` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(11) UNSIGNED NOT NULL,
  `ct_name` varchar(60) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ct_description` varchar(650) COLLATE utf8mb4_spanish_ci NOT NULL,
  `image_one` mediumblob NOT NULL,
  `image_two` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `idiom`
--
ALTER TABLE `idiom`
  ADD PRIMARY KEY (`id_idiom`);

--
-- Indices de la tabla `our_company`
--
ALTER TABLE `our_company`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `our_company_file`
--
ALTER TABLE `our_company_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_file_ourcomapny` (`id_our`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `personal_contact`
--
ALTER TABLE `personal_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal` (`id_personal`);

--
-- Indices de la tabla `personal_project`
--
ALTER TABLE `personal_project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_projects` (`id_personal`);

--
-- Indices de la tabla `personal_studies`
--
ALTER TABLE `personal_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_studies` (`id_personal`);

--
-- Indices de la tabla `personal_work_experience`
--
ALTER TABLE `personal_work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal_experience` (`id_personal`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id_projects`),
  ADD KEY `fk_project_category` (`pr_category`);

--
-- Indices de la tabla `projects_file`
--
ALTER TABLE `projects_file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_project` (`id_project`);

--
-- Indices de la tabla `projects_stage`
--
ALTER TABLE `projects_stage`
  ADD PRIMARY KEY (`id_stage`),
  ADD UNIQUE KEY `ie_nestage` (`n_stage`,`id_project`),
  ADD KEY `fk_project_stage` (`id_project`);

--
-- Indices de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `tbl_solicitud_file`
--
ALTER TABLE `tbl_solicitud_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solicitu` (`id_solicitu`);

--
-- Indices de la tabla `tbl_solicitud_minuta`
--
ALTER TABLE `tbl_solicitud_minuta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `idiom`
--
ALTER TABLE `idiom`
  MODIFY `id_idiom` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `our_company`
--
ALTER TABLE `our_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `our_company_file`
--
ALTER TABLE `our_company_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_personal` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_contact`
--
ALTER TABLE `personal_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_project`
--
ALTER TABLE `personal_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_studies`
--
ALTER TABLE `personal_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_work_experience`
--
ALTER TABLE `personal_work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id_projects` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `projects_file`
--
ALTER TABLE `projects_file`
  MODIFY `id_file` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `projects_stage`
--
ALTER TABLE `projects_stage`
  MODIFY `id_stage` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_solicitud_file`
--
ALTER TABLE `tbl_solicitud_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_solicitud_minuta`
--
ALTER TABLE `tbl_solicitud_minuta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `id_category` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `our_company_file`
--
ALTER TABLE `our_company_file`
  ADD CONSTRAINT `fk_file_ourcomapny` FOREIGN KEY (`id_our`) REFERENCES `our_company` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_contact`
--
ALTER TABLE `personal_contact`
  ADD CONSTRAINT `fk_personal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_project`
--
ALTER TABLE `personal_project`
  ADD CONSTRAINT `fk_personal_projects` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_studies`
--
ALTER TABLE `personal_studies`
  ADD CONSTRAINT `fk_personal_studies` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_work_experience`
--
ALTER TABLE `personal_work_experience`
  ADD CONSTRAINT `fk_personal_experience` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `fk_project_category` FOREIGN KEY (`pr_category`) REFERENCES `tb_category` (`id_category`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `projects_file`
--
ALTER TABLE `projects_file`
  ADD CONSTRAINT `projects_file_ibfk_1` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_projects`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `projects_stage`
--
ALTER TABLE `projects_stage`
  ADD CONSTRAINT `fk_project_stage` FOREIGN KEY (`id_project`) REFERENCES `projects` (`id_projects`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_solicitud_file`
--
ALTER TABLE `tbl_solicitud_file`
  ADD CONSTRAINT `tbl_solicitud_file_ibfk_1` FOREIGN KEY (`id_solicitu`) REFERENCES `tbl_solicitud` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_solicitud_minuta`
--
ALTER TABLE `tbl_solicitud_minuta`
  ADD CONSTRAINT `tbl_solicitud_minuta_ibfk_1` FOREIGN KEY (`id_solicitud`) REFERENCES `tbl_solicitud` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
