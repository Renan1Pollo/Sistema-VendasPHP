-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/06/2023 às 05:04
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `loja`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `usuario` varchar(12) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `senha`, `email`) VALUES
(1, 'renan', '12345', 'renan@email.com'),
(2, 'admin', 'ads123', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(1, 'Camisetas'),
(2, 'Calças'),
(3, 'Moletons'),
(4, 'Sapatos'),
(5, 'Acessórios');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(12) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `data_nascimento`, `cpf`, `estado`, `cidade`, `telefone`) VALUES
(1, 'João', '1990-01-01', '12345678901', 'São Paulo', 'São Paulo', '123456789'),
(2, 'Maria', '1985-02-02', '98765432109', 'São Paulo', 'São Paulo', '987654321'),
(3, 'Pedro', '1995-03-03', '45678912345', 'Rio de Janeiro', 'Rio de Janeiro', '456789123'),
(4, 'Gabrielle', '1980-04-04', '65432198709', 'Paraná', 'Curitiba', '654321987'),
(5, 'Carlos', '1992-05-05', '98765432100', 'Bahia', 'Salvador', '987654321');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `qtde_estoque` int(11) DEFAULT NULL,
  `valor_unitario` decimal(10,2) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`id`, `descricao`, `qtde_estoque`, `valor_unitario`, `idCategoria`) VALUES
(1, 'Camiseta Nike Masculina', 50, 379.96, 1),
(2, 'Moletom Blunt com Capuz', 20, 503.96, 3),
(3, 'Tênis Nike Air Max 270', 15, 569.98, 4),
(4, 'Calça Cargo Unissex', 25, 683.96, 2),
(5, 'Moletom Blunt Unissex', 15, 607.96, 3),
(6, 'Tênis Puma RS-X', 10, 987.96, 4),
(7, 'Colar de Prata com Pingente', 50, 303.96, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtde_vendida` int(11) NOT NULL,
  `valor` float NOT NULL,
  `data_venda` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `venda`
--

INSERT INTO `venda` (`id`, `idCliente`, `idProduto`, `qtde_vendida`, `valor`, `data_venda`) VALUES
(1, 1, 3, 5, 120, '2023-07-02'),
(2, 2, 2, 7, 180, '2023-07-03'),
(3, 3, 4, 2, 50, '2023-07-04'),
(4, 1, 1, 3, 75, '2023-07-05');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendaproduto`
--

CREATE TABLE `vendaproduto` (
  `id` int(11) NOT NULL,
  `idVenda` int(11) DEFAULT NULL,
  `idProduto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Índices de tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idVenda` (`idVenda`),
  ADD KEY `idProduto` (`idProduto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `vendaproduto`
--
ALTER TABLE `vendaproduto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`id`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);

--
-- Restrições para tabelas `vendaproduto`
--
ALTER TABLE `vendaproduto`
  ADD CONSTRAINT `vendaproduto_ibfk_1` FOREIGN KEY (`idVenda`) REFERENCES `venda` (`id`),
  ADD CONSTRAINT `vendaproduto_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `produto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
