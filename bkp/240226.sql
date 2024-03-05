-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/03/2024 às 14:43
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
-- Estrutura para tabela `tb_likes`
--

CREATE TABLE `tb_likes` (
  `idLike` int(11) NOT NULL,
  `idPub` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_likes`
--

INSERT INTO `tb_likes` (`idLike`, `idPub`, `idUser`) VALUES
(0, 74, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pub`
--

CREATE TABLE `tb_pub` (
  `idPub` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `ad` tinyint(1) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` longtext DEFAULT NULL,
  `dia` datetime NOT NULL,
  `dataPub` datetime NOT NULL DEFAULT current_timestamp(),
  `cep` int(11) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` int(4) DEFAULT NULL,
  `comp` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `midia1` varchar(255) DEFAULT NULL,
  `midia1T` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_pub`
--

INSERT INTO `tb_pub` (`idPub`, `idUser`, `ad`, `tag`, `titulo`, `descricao`, `dia`, `dataPub`, `cep`, `uf`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `midia1`, `midia1T`) VALUES
(74, 1, 0, '#CapyJobs', '', 'Bem-vindos à CapyJobs: O Espaço dos Profissionais que Transformam Eventos! ? Sou o Eric Capy, o mascote mais animado! Se você vive e ama eventos, este é seu palco para brilhar. Desapegue do currículo, mostre seu talento, e faça história conosco! ?', '0000-00-00 00:00:00', '2024-02-05 11:17:50', 0, '', '', 0, '', '', '', '65c0ee0ed304b_capivaraPagodeIcon.jpg', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_seg`
--

CREATE TABLE `tb_seg` (
  `idSeg` int(11) NOT NULL,
  `idSeg1` int(11) NOT NULL,
  `idSeg2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_seg`
--

INSERT INTO `tb_seg` (`idSeg`, `idSeg1`, `idSeg2`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `fotoPerfil` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `bio` longtext NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `cep` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` bigint(12) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cpf_cnpj` bigint(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `nome`, `banner`, `fotoPerfil`, `email`, `senha`, `celular`, `bio`, `linkedin`, `twitter`, `instagram`, `cep`, `uf`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `cpf_cnpj`) VALUES
(1, 'Eric Capy', '', 'capivaraCozinheiraIcon.jpg', 'eric.capy@capivarias.com', 'eric123', 957910504, 'Eu sou uma capivara designer.', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 66677766, 'SP', 'Capivarias', 67, 'Casa de baixo', 'Jardim do Lago', 'Capivari', 66677766677),
(2, 'Gabriel Marquez Trevisan', '', 'capivaraCozinheiraIcon.jpg', 'gabmt2210@capivarias.com', 'asdasd', 0, '', '', '', '', 3407090, 'SP', 'Rua Pinguins', 84, 'cu', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 52829157826),
(3, 'Iori Takedo', '', 'capivaraCozinheiraIcon.jpg', 'ioritakedo16@capivarias.com', 'admin', 0, '', '', '', '', 2831001, 'SP', 'Rua Parapuã', 1037, 'senzala', 'Itaberaba', 'São Paulo', 53850887812),
(4, 'Ana Lemes', '', 'capivaraCozinheiraIcon.jpg', 'al@capivarias.com', 'fds', 0, '', '', '', '', 0, '', '', 0, '', '', '', 0),
(5, 'Kauã Calisto', '', 'capivaraCozinheiraIcon.jpg', 'kv@capivarias.com', 'fds', 0, '', '', '', '', 0, '', '', 0, '', '', '', 0),
(6, 'Lucca Gomes', '', 'capivaraCozinheiraIcon.jpg', 'lucca.ag@capivarias.com', '7U@r&o02#capyjobs', 0, '', '', '', '', 0, '', '', 0, '', '', '', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`idLike`);

--
-- Índices de tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  ADD PRIMARY KEY (`idPub`);

--
-- Índices de tabela `tb_seg`
--
ALTER TABLE `tb_seg`
  ADD PRIMARY KEY (`idSeg`);

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_likes`
--
ALTER TABLE `tb_likes`
  MODIFY `idLike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de tabela `tb_seg`
--
ALTER TABLE `tb_seg`
  MODIFY `idSeg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
