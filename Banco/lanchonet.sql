-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Set-2019 às 03:02
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lanchonet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nm_cliente` varchar(100) NOT NULL,
  `nm_email_cliente` varchar(100) NOT NULL,
  `cd_telefone_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nm_cliente`, `nm_email_cliente`, `cd_telefone_cliente`) VALUES
(1, 'AndrÃ©', 'Saxton', 0),
(2, 'AndrÃ©', 'email@email.com', 2147483647),
(3, 'AndrÃ©', 'email@email.com', 1391234567),
(4, 'AndrÃ©', 'email@email.com', 1391234567);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanchonete`
--

CREATE TABLE `lanchonete` (
  `nm_lanchonete` varchar(50) NOT NULL,
  `nm_email_lanchonete` varchar(50) DEFAULT NULL,
  `nm_endereco_lanchonete` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `lanchonete`
--

INSERT INTO `lanchonete` (`nm_lanchonete`, `nm_email_lanchonete`, `nm_endereco_lanchonete`) VALUES
('Lanchonet', 'lanchonet@lanchonet.com.br', 'Rua False, n 123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `qt_cadeira_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `qt_cadeira_mesa`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato`
--

CREATE TABLE `prato` (
  `id_prato` int(11) NOT NULL,
  `nm_prato` varchar(50) NOT NULL,
  `vl_prato` double NOT NULL,
  `ds_prato` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `prato`
--

INSERT INTO `prato` (`id_prato`, `nm_prato`, `vl_prato`, `ds_prato`) VALUES
(1, 'Arroz com Feijao', 15.5, 'Tem arroz e feijao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `id_promocao` int(11) NOT NULL,
  `vl_promocao` double NOT NULL,
  `vl_porcentagem_promocao` double DEFAULT NULL,
  `id_prato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`id_promocao`, `vl_promocao`, `vl_porcentagem_promocao`, `id_prato`) VALUES
(1, 5.5, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicao`
--

CREATE TABLE `refeicao` (
  `id_refeicao` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_prato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `refeicao`
--

INSERT INTO `refeicao` (`id_refeicao`, `id_reserva`, `id_prato`) VALUES
(7, 7, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `dt_inicio_reserva` datetime NOT NULL,
  `dt_termino_reserva` datetime NOT NULL,
  `dt_pagamento_reserva` datetime DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `dt_inicio_reserva`, `dt_termino_reserva`, `dt_pagamento_reserva`, `id_cliente`, `id_mesa`) VALUES
(7, '2019-09-12 17:29:40', '2019-09-12 18:29:40', NULL, 2, 1),
(8, '2019-09-12 17:29:40', '2019-09-12 18:29:40', '2019-09-12 17:29:40', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indexes for table `prato`
--
ALTER TABLE `prato`
  ADD PRIMARY KEY (`id_prato`);

--
-- Indexes for table `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`id_promocao`),
  ADD KEY `FKPromocaoPrato` (`id_prato`);

--
-- Indexes for table `refeicao`
--
ALTER TABLE `refeicao`
  ADD PRIMARY KEY (`id_refeicao`),
  ADD KEY `FKRefeicaoReserva` (`id_reserva`),
  ADD KEY `FKRefeicaoPrato` (`id_prato`);

--
-- Indexes for table `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FKReservaCliente` (`id_cliente`),
  ADD KEY `FKReservaMesa` (`id_mesa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prato`
--
ALTER TABLE `prato`
  MODIFY `id_prato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `id_promocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `refeicao`
--
ALTER TABLE `refeicao`
  MODIFY `id_refeicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `FKPromocaoPrato` FOREIGN KEY (`id_prato`) REFERENCES `prato` (`id_prato`);

--
-- Limitadores para a tabela `refeicao`
--
ALTER TABLE `refeicao`
  ADD CONSTRAINT `FKRefeicaoPrato` FOREIGN KEY (`id_prato`) REFERENCES `prato` (`id_prato`),
  ADD CONSTRAINT `FKRefeicaoReserva` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FKReservaCliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `FKReservaMesa` FOREIGN KEY (`id_mesa`) REFERENCES `mesa` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
