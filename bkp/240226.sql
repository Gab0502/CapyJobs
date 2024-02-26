-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/02/2024 às 12:20
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

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  ADD PRIMARY KEY (`idPub`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  MODIFY `idPub` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
