-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Mar-2019 às 20:10
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_xnor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `bebida_id` int(11) NOT NULL,
  `bebida_nome` varchar(45) COLLATE utf8_bin NOT NULL,
  `bebida_valor` varchar(45) COLLATE utf8_bin NOT NULL,
  `bebida_marca` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanche`
--

CREATE TABLE `lanche` (
  `lanche_id` int(11) NOT NULL,
  `lanche_nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `lanche_descricao` varchar(200) COLLATE utf8_bin NOT NULL,
  `lanche_preco` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(60) DEFAULT NULL,
  `usuario_email` varchar(60) DEFAULT NULL,
  `usuario_rua` varchar(60) DEFAULT NULL,
  `usuario_bairro` varchar(60) DEFAULT NULL,
  `usuario_cidade` varchar(60) DEFAULT NULL,
  `usuario_numero` varchar(20) DEFAULT NULL,
  `usuario_cep` varchar(40) DEFAULT NULL,
  `usuario_telefone` varchar(60) DEFAULT NULL,
  `usuario_senha` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nome`, `usuario_email`, `usuario_rua`, `usuario_bairro`, `usuario_cidade`, `usuario_numero`, `usuario_cep`, `usuario_telefone`, `usuario_senha`) VALUES
(8, 'Nicole', 'nicoleeguido@gmail.com', NULL, 'Brabância', 'Avaré', '340', '18704410', '(14)98825-4719', '15963200'),
(9, 'Anderson', 'andy@andy.com', NULL, '123456', '123456', '123456', '123456', '123456', '123456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `venda_id` int(11) NOT NULL,
  `venda_data` datetime NOT NULL,
  `venda_cliente` varchar(60) COLLATE utf8_bin NOT NULL,
  `venda_valor` decimal(10,10) NOT NULL,
  `venda_funcionario` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='				';

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_lanche_bebida`
--

CREATE TABLE `venda_lanche_bebida` (
  `lanche_lanche_id` int(11) NOT NULL,
  `venda_venda_id` int(11) NOT NULL,
  `bebida_bebida_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`bebida_id`);

--
-- Indexes for table `lanche`
--
ALTER TABLE `lanche`
  ADD PRIMARY KEY (`lanche_id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Indexes for table `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`venda_id`);

--
-- Indexes for table `venda_lanche_bebida`
--
ALTER TABLE `venda_lanche_bebida`
  ADD KEY `fk_venda_lanche_lanche_idx` (`lanche_lanche_id`),
  ADD KEY `fk_venda_lanche_venda1_idx` (`venda_venda_id`),
  ADD KEY `fk_venda_lanche_bebida1_idx` (`bebida_bebida_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bebida`
--
ALTER TABLE `bebida`
  MODIFY `bebida_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lanche`
--
ALTER TABLE `lanche`
  MODIFY `lanche_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `venda`
--
ALTER TABLE `venda`
  MODIFY `venda_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `venda_lanche_bebida`
--
ALTER TABLE `venda_lanche_bebida`
  ADD CONSTRAINT `fk_venda_lanche_bebida1` FOREIGN KEY (`bebida_bebida_id`) REFERENCES `bebida` (`bebida_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venda_lanche_lanche` FOREIGN KEY (`lanche_lanche_id`) REFERENCES `lanche` (`lanche_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venda_lanche_venda1` FOREIGN KEY (`venda_venda_id`) REFERENCES `venda` (`venda_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
