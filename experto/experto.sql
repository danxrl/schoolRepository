-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 08:04 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `experto`
--

-- --------------------------------------------------------

--
-- Table structure for table `atomos`
--

CREATE TABLE `atomos` (
  `id` int(255) NOT NULL,
  `atomo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atomos`
--

INSERT INTO `atomos` (`id`, `atomo`) VALUES
(5, 'Actividades imaginacion'),
(43, 'Administracion'),
(27, 'Analizar hechos'),
(29, 'Analizar leyes fisicas'),
(36, 'Anatomia'),
(4, 'Arte'),
(37, 'Biologia'),
(22, 'Buscar soluciones'),
(18, 'Buscas argumentos'),
(23, 'Calculo mental'),
(56, 'Ciencias de la computacion'),
(20, 'Ciencias formales'),
(15, 'Ciencias naturales'),
(10, 'Ciencias sociales'),
(53, 'Computador'),
(38, 'Comunicacion'),
(68, 'Concluir'),
(7, 'Conflictos sociales'),
(21, 'Conocimiento teorico'),
(33, 'Contruir robot'),
(1, 'Creatividad estetica'),
(8, 'Cultura'),
(16, 'Desastres naturales'),
(50, 'Descubrir fallas'),
(2, 'Detalles'),
(69, 'Enfermedades'),
(34, 'Entender mecanismos'),
(57, 'Equipo'),
(54, 'Exactitud'),
(13, 'Fenomenos naturales'),
(31, 'Fisica'),
(45, 'Gestion'),
(61, 'Gustar construir'),
(24, 'Gusto matematico'),
(44, 'Informacion'),
(52, 'Ingenieria computacion'),
(60, 'Ingenieria de software'),
(3, 'Jugar imaginacion'),
(17, 'Laboratorio'),
(48, 'Liderazgo'),
(28, 'Logica'),
(58, 'Lugares apropiados'),
(39, 'Manejar informacion'),
(41, 'Manipulacion escritorio'),
(25, 'Matematica'),
(55, 'Messenger'),
(11, 'Necesidades personales'),
(59, 'Observar construir'),
(40, 'Oficina'),
(46, 'Organizar'),
(6, 'Originalidad'),
(12, 'Participacion social'),
(47, 'Persuacion'),
(49, 'Plantear'),
(9, 'Problemas Sociales'),
(62, 'Procesos'),
(65, 'Programas rapidos'),
(42, 'Redactar informes'),
(30, 'Resolver problemas'),
(19, 'Riguroso'),
(35, 'Robotica'),
(64, 'Sistemas de informacion'),
(66, 'Tecnologias de la informacion'),
(67, 'Trabajar ya'),
(32, 'Transformar energia'),
(14, 'Universo'),
(26, 'Uso de graficos'),
(51, 'Uso instrumental'),
(63, 'Vestir formal');

-- --------------------------------------------------------

--
-- Table structure for table `atomos_reglas`
--

CREATE TABLE `atomos_reglas` (
  `idr` varchar(255) NOT NULL,
  `atomo_id` int(255) NOT NULL,
  `signo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `atomos_reglas`
--

INSERT INTO `atomos_reglas` (`idr`, `atomo_id`, `signo`) VALUES
('1', 1, 1),
('1', 2, 1),
('1', 3, 1),
('2', 1, 1),
('2', 2, 1),
('2', 5, 1),
('3', 1, 1),
('3', 3, 1),
('3', 6, 1),
('4', 1, 1),
('4', 5, 1),
('4', 6, 1),
('5', 7, 1),
('5', 8, 1),
('5', 9, 1),
('6', 7, 1),
('6', 9, 1),
('6', 11, 1),
('7', 7, 1),
('7', 9, 1),
('7', 12, 1),
('8', 13, 1),
('8', 14, 1),
('9', 13, 1),
('9', 16, 1),
('10', 13, 1),
('10', 17, 1),
('11', 18, 1),
('11', 19, 1),
('12', 21, 1),
('13', 20, 1),
('13', 22, 1),
('13', 23, 1),
('13', 24, 1),
('14', 20, 1),
('14', 22, 1),
('14', 24, 1),
('14', 26, 1),
('15', 20, 1),
('15', 27, 1),
('16', 20, 1),
('16', 68, 1),
('17', 15, 1),
('17', 29, 1),
('17', 30, 1),
('18', 15, 1),
('18', 29, 1),
('18', 32, 1),
('19', 15, 1),
('19', 33, 1),
('19', 34, 1),
('20', 15, 1),
('20', 17, 1),
('20', 36, 1),
('21', 15, 1),
('21', 36, 1),
('21', 69, 1),
('22', 10, 1),
('22', 38, 1),
('22', 39, 1),
('23', 10, 1),
('23', 38, 1),
('23', 41, 1),
('24', 10, 1),
('24', 38, 1),
('24', 42, 1),
('25', 10, 1),
('25', 43, 1),
('25', 44, 1),
('26', 10, 1),
('26', 42, 1),
('26', 43, 1),
('27', 10, 1),
('27', 46, 1),
('27', 47, 1),
('28', 10, 1),
('28', 47, 1),
('28', 49, 1),
('29', 25, 1),
('29', 28, 1),
('29', 31, 1),
('29', 50, 1),
('29', 51, 1),
('30', 25, 1),
('30', 28, 1),
('30', 31, 1),
('30', 34, 1),
('31', 25, 1),
('31', 28, 1),
('31', 53, 1),
('31', 54, 1),
('31', 55, 1),
('32', 25, 1),
('32', 28, 1),
('32', 31, 1),
('32', 53, 1),
('32', 55, 1),
('33', 25, 1),
('33', 28, 1),
('33', 35, 1),
('33', 53, 1),
('33', 55, 1),
('34', 25, 1),
('34', 28, 1),
('34', 37, 1),
('34', 53, 1),
('34', 55, 1),
('35', 40, 1),
('35', 48, 1),
('35', 57, 1),
('35', 58, 1),
('35', 59, 1),
('36', 40, 1),
('36', 48, 1),
('36', 57, 1),
('36', 58, 1),
('36', 61, 1),
('37', 40, 1),
('37', 45, 1),
('37', 48, 1),
('37', 57, 1),
('37', 58, 1),
('38', 45, 1),
('38', 48, 1),
('38', 57, 1),
('38', 62, 1),
('38', 63, 1),
('39', 40, 1),
('39', 45, 1),
('39', 51, 1),
('39', 65, 1),
('40', 40, 1),
('40', 45, 1),
('40', 51, 1),
('40', 67, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reglas`
--

CREATE TABLE `reglas` (
  `id` int(255) NOT NULL,
  `regla` varchar(255) NOT NULL,
  `consecuente` int(255) NOT NULL,
  `signo` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reglas`
--

INSERT INTO `reglas` (`id`, `regla`, `consecuente`, `signo`) VALUES
(1, '1', 4, 1),
(2, '2', 4, 1),
(3, '3', 4, 1),
(4, '4', 4, 1),
(5, '5', 10, 1),
(6, '6', 10, 1),
(7, '7', 10, 1),
(8, '8', 15, 1),
(9, '9', 15, 1),
(10, '10', 15, 1),
(11, '11', 20, 1),
(12, '12', 20, 1),
(13, '13', 25, 1),
(14, '14', 25, 1),
(15, '15', 28, 1),
(16, '16', 28, 1),
(17, '17', 31, 1),
(18, '18', 31, 1),
(19, '19', 35, 1),
(20, '20', 37, 1),
(21, '21', 37, 1),
(22, '22', 40, 1),
(23, '23', 40, 1),
(24, '24', 40, 1),
(25, '25', 45, 1),
(26, '26', 45, 1),
(27, '27', 48, 1),
(28, '28', 48, 1),
(29, '29', 52, 1),
(30, '30', 51, 1),
(31, '31', 56, 1),
(32, '32', 56, 1),
(33, '33', 56, 1),
(34, '34', 56, 1),
(35, '35', 60, 1),
(36, '36', 60, 1),
(37, '37', 60, 1),
(38, '38', 64, 1),
(39, '39', 66, 1),
(40, '40', 66, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atomos`
--
ALTER TABLE `atomos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `atomo` (`atomo`);

--
-- Indexes for table `atomos_reglas`
--
ALTER TABLE `atomos_reglas`
  ADD KEY `fk_atomo_regla` (`atomo_id`);

--
-- Indexes for table `reglas`
--
ALTER TABLE `reglas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_regla_consecuente` (`consecuente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atomos`
--
ALTER TABLE `atomos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `reglas`
--
ALTER TABLE `reglas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atomos_reglas`
--
ALTER TABLE `atomos_reglas`
  ADD CONSTRAINT `fk_atomo_regla` FOREIGN KEY (`atomo_id`) REFERENCES `atomos` (`id`);

--
-- Constraints for table `reglas`
--
ALTER TABLE `reglas`
  ADD CONSTRAINT `fk_regla_consecuente` FOREIGN KEY (`consecuente`) REFERENCES `atomos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
