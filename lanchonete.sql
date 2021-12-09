-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 09-Dez-2021 às 02:18
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `lanchonete`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adicional`
--

CREATE TABLE `adicional` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `adicional`
--

INSERT INTO `adicional` (`codigo`, `descricao`, `preco`) VALUES
(1, 'Catchup', 1),
(2, 'Mostarda', 1),
(3, 'Maionese', 1),
(4, 'Batata Palha', 1),
(5, 'Molho', 1),
(6, 'Pimenta', 1),
(7, 'Purê', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`codigo`, `descricao`, `preco`) VALUES
(1, 'Coca Cola', 4),
(2, 'Sprite', 4),
(3, 'Pepsi', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `codigo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`codigo`, `nome`, `endereco`, `telefone`) VALUES
(1, 'Caroline', 'Campinas', 987654321),
(2, 'João', 'Campinas', 912345678),
(3, 'Rhaissa', 'Campinas', 99999999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanche`
--

CREATE TABLE `lanche` (
  `codigo` int(11) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `preco` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lanche`
--

INSERT INTO `lanche` (`codigo`, `descricao`, `preco`) VALUES
(1, 'Cachorro Quente', 10),
(2, 'Coxinha', 5),
(3, 'Pastel', 6),
(4, 'Hambúrguer', 8),
(5, 'Sanduíche', 7),
(6, 'Batata Frita', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `codigoPedido` int(11) NOT NULL,
  `nomePedido` varchar(500) NOT NULL,
  `lanchePedido` varchar(500) NOT NULL,
  `bebidaPedido` tinyint(1) NOT NULL,
  `bebidaGeladaPedido` tinyint(1) NOT NULL,
  `bebidaTipoPedido` varchar(500) NOT NULL,
  `adicionalPedido` tinyint(1) NOT NULL,
  `adicionalListaPedido` varchar(500) NOT NULL,
  `dataPedido` date NOT NULL,
  `observacoesPedido` varchar(500) NOT NULL,
  `totalPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adicional`
--
ALTER TABLE `adicional`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices para tabela `lanche`
--
ALTER TABLE `lanche`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adicional`
--
ALTER TABLE `adicional`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `bebida`
--
ALTER TABLE `bebida`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
