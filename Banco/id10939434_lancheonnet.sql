-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 23-Out-2019 às 01:43
-- Versão do servidor: 10.1.40-MariaDB
-- versão do PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10939434_lancheonnet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nm_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nm_email_cliente` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cd_telefone_cliente` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nm_cliente`, `nm_email_cliente`, `cd_telefone_cliente`) VALUES
(1, 'Maria Carla', 'mcarla_@gmail.com.br', '(13) 97402-1284'),
(2, 'Thales Almeida', 'adm.thales@gmail.com', '(13) 3327-2661');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanchonete`
--

CREATE TABLE `lanchonete` (
  `id_lanchonete` int(11) NOT NULL,
  `nm_lanchonete` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cd_cnpj_lanchonete` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nm_email_lanchonete` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nm_endereco_lanchonete` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `lanchonete`
--

INSERT INTO `lanchonete` (`id_lanchonete`, `nm_lanchonete`, `cd_cnpj_lanchonete`, `nm_email_lanchonete`, `nm_endereco_lanchonete`) VALUES
(2, 'Lanche On Net', '74.385.774/0001-16', 'lancheon@net.com.br', 'Rua Condessa de Buturuvi N. 300 loja 47, São Paulo - SP');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mesa`
--

CREATE TABLE `mesa` (
  `id_mesa` int(11) NOT NULL,
  `cd_numero_mesa` int(11) NOT NULL,
  `qt_cadeira_mesa` int(11) NOT NULL,
  `ds_mesa` longtext COLLATE utf8_unicode_ci NOT NULL,
  `disponibilidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `mesa`
--

INSERT INTO `mesa` (`id_mesa`, `cd_numero_mesa`, `qt_cadeira_mesa`, `ds_mesa`, `disponibilidade`) VALUES
(1, 27, 4, 'Mesa localizada próximo a porta, ar condicionado logo acima fazendo com que ela seja uma mesa bastante refrigerada. longe da janela.', 1),
(2, 13, 2, 'Mesa para dois localizada no meio da Lanchonete. boa iluminação e longe do ar condicionado sendo uma mesa mais quente.', 1),
(3, 33, 5, 'lorem ipsum sit amet ', 1),
(4, 5, 2, 'Mesa especial de casal, muito bem arejada, perto do bar', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `prato`
--

CREATE TABLE `prato` (
  `id_prato` int(11) NOT NULL,
  `nm_prato` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vl_prato` double NOT NULL,
  `ds_prato` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `prato`
--

INSERT INTO `prato` (`id_prato`, `nm_prato`, `vl_prato`, `ds_prato`) VALUES
(1, 'Prato', 40, 'teste de prato'),
(2, 'Prato02', 30.5, 'Teste valor quebrado'),
(3, 'dasdasd', 30.05, 'asdasdasd'),
(4, 'aaaaaaaaa', 20.04, 'wdasdawdweqwe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `promocao`
--

CREATE TABLE `promocao` (
  `id_promocao` int(11) NOT NULL,
  `vl_promocao` double NOT NULL,
  `nm_promocao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ds_promocao` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `promocao`
--

INSERT INTO `promocao` (`id_promocao`, `vl_promocao`, `nm_promocao`, `ds_promocao`, `ativo`) VALUES
(1, 35.45, 'Namoradinhos', 'Desconto para o Dia dos Namorados', 0),
(2, 10, '10 OFF', 'desconto de 10 reais liberado', 1),
(5, 45.5, 'Amigão', 'Venha com um Amigo que nunca veio à casa e ganhe um super desconto', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicao`
--

CREATE TABLE `refeicao` (
  `id_refeicao` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `id_prato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `login`, `senha`, `ativo`, `id`) VALUES
('Roberta Novaes', 'robs', 'f8ea3b8d90f45858fe7f1bb965c18287', 1, 1),
('André', 'saxton', 'e10adc3949ba59abbe56e057f20f883e', 1, 2),
('Professor Salgado', 'salgado', '25f7b61fc978131fbd1ab37710881728', 1, 5),
('Monteiro', 'Mont', 'f8ea3b8d90f45858fe7f1bb965c18287', 1, 6),
('Lisa', 'lisa32', 'f8ea3b8d90f45858fe7f1bb965c18287', 1, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `lanchonete`
--
ALTER TABLE `lanchonete`
  ADD PRIMARY KEY (`id_lanchonete`);

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
  ADD PRIMARY KEY (`id_promocao`);

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
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lanchonete`
--
ALTER TABLE `lanchonete`
  MODIFY `id_lanchonete` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prato`
--
ALTER TABLE `prato`
  MODIFY `id_prato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `promocao`
--
ALTER TABLE `promocao`
  MODIFY `id_promocao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `refeicao`
--
ALTER TABLE `refeicao`
  MODIFY `id_refeicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

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
