-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/01/2024 às 15:43
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
-- Banco de dados: `capybd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pub`
--

CREATE TABLE `tb_pub` (
  `idPub` int(11) NOT NULL,
  `ad` tinyint(1) NOT NULL,
  `idTag` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `data` datetime NOT NULL,
  `dataPub` datetime NOT NULL DEFAULT current_timestamp(),
  `cep` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(4) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `midia1` varchar(255) NOT NULL,
  `midia1T` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_pub`
--

INSERT INTO `tb_pub` (`idPub`, `ad`, `idTag`, `titulo`, `desc`, `data`, `dataPub`, `cep`, `uf`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `midia1`, `midia1T`) VALUES
(1, 0, 15, '', 'Como ficar tranquileba', '2023-12-01 14:31:57', '2023-12-01 10:36:36', 98745463, '25', 'Rua tilanbu', 25, '', 'jardim lazer', 'Sao Paulo', '', ''),
(2, 1, 14, 'Nao sei', 'como isso é possivel', '2023-12-01 14:31:57', '2023-12-01 10:36:36', 98754621, '26', 'Rua jacinto o pinto', 2, '', 'jardim corno', 'Santa Catarina', 'dgdgdf', 'dgdfg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tags`
--

CREATE TABLE `tb_tags` (
  `idTag` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_tags`
--

INSERT INTO `tb_tags` (`idTag`, `tag`) VALUES
(1, 'palhaco'),
(2, 'magico'),
(3, 'banda'),
(4, 'cozinha'),
(5, 'bebida'),
(6, 'danca'),
(7, 'dj'),
(8, 'musica'),
(9, 'bartender'),
(10, 'folia'),
(11, 'balada'),
(12, 'festanca'),
(13, 'aniversario'),
(14, 'infantil'),
(15, 'ficatranquileba');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `fotoPerfil` varchar(255) NOT NULL,
  `seguidores` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` int(11) NOT NULL,
  `bio` longtext NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `cep` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(4) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cpf_cnpj` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `nome`, `fotoPerfil`, `seguidores`, `email`, `senha`, `celular`, `bio`, `linkedin`, `twitter`, `instagram`, `cep`, `uf`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `cpf_cnpj`) VALUES
(1, 'Eric Capy', 'eric.jpg', 0, 'eric.capy@capivarias.com', 'eric123', 957910504, 'Eu sou uma capivara designer.', 'https://br.linkedin.com/', 'https://twitter.com/?lang=pt', 'https://www.instagram.com/', 66677766, '1', 'Capivarias', 67, 'Casa de baixo', 'Jardim do Lago', 'Capivari', 66677766677);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  ADD PRIMARY KEY (`idPub`);

--
-- Índices de tabela `tb_tags`
--
ALTER TABLE `tb_tags`
  ADD PRIMARY KEY (`idTag`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_tags`
--
ALTER TABLE `tb_tags`
  MODIFY `idTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
