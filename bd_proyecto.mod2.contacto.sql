-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2020 at 05:04 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacto`
--

CREATE TABLE `tbl_contacto` (
  `id` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`id`, `correo`, `nombre`, `descripcion`) VALUES
(1, 'kevin.fallas.b@gmail.com', 'kevin', 'Excelente sitio');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeria`
--

CREATE TABLE `tbl_galeria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_galeria`
--

INSERT INTO `tbl_galeria` (`id`, `nombre`, `descripcion`) VALUES
(1, '1.jpg', 'ia stoi arto'),
(2, '2.jpg', 'yo con papi'),
(3, '3.jpg', 'recibo compu'),
(4, '4.png', 'ice clave'),
(5, '5.jpg', 'yo '),
(6, '6.png', 'two states');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seccion`
--

CREATE TABLE `tbl_seccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `banner` varchar(50) NOT NULL,
  `texto` varchar(3000) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_seccion`
--

INSERT INTO `tbl_seccion` (`id`, `nombre`, `banner`, `texto`, `tipo`) VALUES
(1, 'Inicio', 'ini.jpg', 'Bienvenido a nuestro sitio web.\\nAqui podras encontrar muchas cosas interesantes, te invitamos a explorar la pagina', 1),
(2, 'Quienes Somos?', 'quienessomos.jpg', 'hola mundo', 1),
(3, 'Galeria', 'galeria.png', 'fjidjsa', 2),
(4, 'Servicios', 'servicios.jpg', 'sdfsdaf', 3),
(5, 'Contacto', 'contacto.jpg', 'sinfs', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicio`
--

CREATE TABLE `tbl_servicio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `descripcioncorta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_servicio`
--

INSERT INTO `tbl_servicio` (`id`, `nombre`, `descripcion`, `descripcioncorta`) VALUES
(1, 'Corte de pelo', 'Distintos tipos de cortes ademas de cosas como tintes', 'Cortes para hombre y mujer'),
(2, 'programacion web', 'Sitios web completos con muchas tecnologias y disenos', 'Diseño de sitios web'),
(3, 'programacion movil', 'Apps para distintos OS moviles como lo son IOS y Android', 'Apps para telefonos');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contra` varchar(30) NOT NULL,
  `nombrereal` varchar(60) NOT NULL,
  `correo` int(30) NOT NULL,
  `foto` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_galeria`
--
ALTER TABLE `tbl_galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_seccion`
--
ALTER TABLE `tbl_seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_servicio`
--
ALTER TABLE `tbl_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_galeria`
--
ALTER TABLE `tbl_galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_seccion`
--
ALTER TABLE `tbl_seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_servicio`
--
ALTER TABLE `tbl_servicio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
