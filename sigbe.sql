-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 12:38 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigbe`
--

-- --------------------------------------------------------

--
-- Table structure for table `becas`
--

CREATE TABLE `becas` (
  `idBeca` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `idtipo_becas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `becas`
--

INSERT INTO `becas` (`idBeca`, `descripcion`, `idtipo_becas`) VALUES
(1, 'Beca Almuerzo', 1),
(2, 'Beca Refrigerio', 1);

-- --------------------------------------------------------

--
-- Table structure for table `convocatorias`
--

CREATE TABLE `convocatorias` (
  `idConvocatorias` int(11) NOT NULL,
  `fechahora_inicio` datetime NOT NULL,
  `fechahora_final` datetime NOT NULL,
  `idBeca` int(11) NOT NULL,
  `idperiodo_academicos` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `estado_convocatoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `convocatorias`
--

INSERT INTO `convocatorias` (`idConvocatorias`, `fechahora_inicio`, `fechahora_final`, `idBeca`, `idperiodo_academicos`, `cupos`, `estado_convocatoria`) VALUES
(19, '2020-03-10 00:00:00', '2020-03-31 00:00:00', 1, 2, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `periodo_academicos`
--

CREATE TABLE `periodo_academicos` (
  `idperiodo_academicos` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periodo_academicos`
--

INSERT INTO `periodo_academicos` (`idperiodo_academicos`, `fecha_inicio`, `fecha_final`) VALUES
(1, '2019-10-21', '2020-02-17'),
(2, '2019-09-25', '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `postulacion`
--

CREATE TABLE `postulacion` (
  `id_postulacion` int(11) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `idConvocatorias` int(11) NOT NULL,
  `promedio` double DEFAULT NULL,
  `fechapostulacion` date NOT NULL,
  `comentpsicologa` varchar(500) DEFAULT NULL,
  `estado_postulacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idRol`, `descripcion`) VALUES
(1, 'Estudiante'),
(2, 'Bienestar'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `idTicket` int(11) NOT NULL,
  `fechacompra` date NOT NULL,
  `identificacion` int(11) NOT NULL,
  `estado_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`idTicket`, `fechacompra`, `identificacion`, `estado_ticket`) VALUES
(1, '2020-03-22', 1234123, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_becas`
--

CREATE TABLE `tipo_becas` (
  `idtipo_becas` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipo_becas`
--

INSERT INTO `tipo_becas` (`idtipo_becas`, `descripcion`) VALUES
(1, 'Beca alimenticias');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `identificacion` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `corrreo` varchar(150) NOT NULL,
  `codigoestudiante` varchar(35) DEFAULT NULL,
  `contrasena` varchar(15) NOT NULL,
  `saldo` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`identificacion`, `nombre`, `apellido`, `corrreo`, `codigoestudiante`, `contrasena`, `saldo`, `idRol`) VALUES
(1234, 'Gustavo', 'QUintero', 'quintero.gustavo@correounivalle.edu.co', '111', '0', 10889, 2),
(1234123, 'Alejandro', 'Ospina Escobar', 'alejandro.ospina@correounivalle.edu.co', '1234', '1234', 1500, 1),
(4444444, 'William', 'Rueda Bejarano', 'william.rueda@correounivalle.edu.co', '1763662', '12345678', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `becas`
--
ALTER TABLE `becas`
  ADD PRIMARY KEY (`idBeca`),
  ADD KEY `fk_Becas_tipo_becas_idx` (`idtipo_becas`);

--
-- Indexes for table `convocatorias`
--
ALTER TABLE `convocatorias`
  ADD PRIMARY KEY (`idConvocatorias`),
  ADD KEY `fk_Convocatorias_Becas1_idx` (`idBeca`),
  ADD KEY `fk_Convocatorias_periodo_academicos1_idx` (`idperiodo_academicos`);

--
-- Indexes for table `periodo_academicos`
--
ALTER TABLE `periodo_academicos`
  ADD PRIMARY KEY (`idperiodo_academicos`);

--
-- Indexes for table `postulacion`
--
ALTER TABLE `postulacion`
  ADD PRIMARY KEY (`id_postulacion`,`idConvocatorias`,`identificacion`),
  ADD KEY `fk_Usuarios_has_Convocatorias_Convocatorias1_idx` (`idConvocatorias`),
  ADD KEY `fk_Usuarios_has_Convocatorias_Usuarios1_idx` (`identificacion`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_Tickets_Usuarios1_idx` (`identificacion`);

--
-- Indexes for table `tipo_becas`
--
ALTER TABLE `tipo_becas`
  ADD PRIMARY KEY (`idtipo_becas`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`identificacion`),
  ADD KEY `fk_Usuarios_Roles1_idx` (`idRol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `convocatorias`
--
ALTER TABLE `convocatorias`
  MODIFY `idConvocatorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `postulacion`
--
ALTER TABLE `postulacion`
  MODIFY `id_postulacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `becas`
--
ALTER TABLE `becas`
  ADD CONSTRAINT `fk_Becas_tipo_becas` FOREIGN KEY (`idtipo_becas`) REFERENCES `tipo_becas` (`idtipo_becas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `convocatorias`
--
ALTER TABLE `convocatorias`
  ADD CONSTRAINT `fk_Convocatorias_Becas1` FOREIGN KEY (`idBeca`) REFERENCES `becas` (`idBeca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Convocatorias_periodo_academicos1` FOREIGN KEY (`idperiodo_academicos`) REFERENCES `periodo_academicos` (`idperiodo_academicos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `postulacion`
--
ALTER TABLE `postulacion`
  ADD CONSTRAINT `fk_Usuarios_has_Convocatorias_Convocatorias1` FOREIGN KEY (`idConvocatorias`) REFERENCES `convocatorias` (`idConvocatorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_has_Convocatorias_Usuarios1` FOREIGN KEY (`identificacion`) REFERENCES `usuarios` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_Tickets_Usuarios1` FOREIGN KEY (`identificacion`) REFERENCES `usuarios` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_Usuarios_Roles1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
