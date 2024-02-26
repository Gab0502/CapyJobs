-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/02/2024 às 12:59
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
-- Estrutura para tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `fotoPerfil` varchar(255) NOT NULL,
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
  `numero` bigint(4) NOT NULL,
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
(6, 'Lucca Gomes', '', 'capivaraCozinheiraIcon.jpg', 'lucca.ag@capivarias.com', '7U@r&o02#capyjobs', 0, '', '', '', '', 0, '', '', 0, '', '', '', 0),
(7, 'Lucca Dionísio', '', 'capivaraCozinheiraIcon.jpg', 'lucca4547@gmail.com', '', 0, 'lucca empreedimento', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 8976541351),
(8, 'William Bonner', '', 'capivaraCozinheiraIcon.jpg', 'boner654@gmail.com', '', 0, 'boner jornalista', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 879841),
(9, 'Caio Mágico', '', 'capivaraCozinheiraIcon.jpg', 'caio432@gmail.com', '', 0, 'caio o melhor', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 84654, '', '', 0, '', '', '', 0),
(10, 'Pedro Henrique', '', 'capivaraCozinheiraIcon.jpg', 'henrique8676@gmai.com', '', 0, 'henrique digital ', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 875687987),
(11, 'Paulo Gome', '', 'capivaraCozinheiraIcon.jpg', 'paulo08497@gmail.com', '', 0, 'paulao da grandeza', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 9879845),
(12, 'Lucca Baco', '', 'capivaraCozinheiraIcon.jpg', 'lucca4547@gmail.com', '', 0, 'lucca empreedimento', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 8976541351),
(13, 'Vinícius Bonner', '', 'capivaraCozinheiraIcon.jpg', 'boner654@gmail.com', '', 0, 'filho do bonner', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 879841),
(14, 'asd', '', 'capivaraCozinheiraIcon.jpg', 'asd', 'asd', 0, '', '', '', '', 3407, 'SP', 'Rua Pinguins', 12, 'sdasd', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 0),
(15, 'asd', '', 'capivaraCozinheiraIcon.jpg', 'asd', 'dasdasdasd', 0, '', '', '', '', 3407, 'SP', 'Rua Pinguins', 12, 'sdasd', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 0),
(16, 'asd', '', 'capivaraCozinheiraIcon.jpg', 'asd', 'ddddddddddddddddd', 0, '', '', '', '', 3407, 'SP', 'Rua Pinguins', 12, '5252', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 0),
(17, 'asd', '', 'capivaraCozinheiraIcon.jpg', 'asd', 'ddddddddddddddddddd', 0, '', '', '', '', 3407, 'SP', 'Rua Pinguins', 12, '5252', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 52525252),
(18, 'asd', '', 'capivaraCozinheiraIcon.jpg', 'asd', 'asdasdas', 0, '', '', '', '', 3407090, 'SP', 'Rua Pinguins', 123, '123213', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 12123123123),
(19, 'asdasdasd', '', 'capivaraCozinheiraIcon.jpg', 'asd', 'ddddasdasdasd', 0, '', '', '', '', 3407090, 'SP', 'Rua Pinguins', 123, '123213', 'Chácara Santo Antônio (Zona Leste)', 'São Paulo', 12123123123),
(20, 'Caio Lencinho', '', '', 'caio432@gmail.com', '', 0, 'caio o melhor', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 84654, '', '', 0, '', '', '', 0),
(21, 'Henrique e Juliano', '', '', 'henrique8676@gmai.com', '', 0, 'henrique digital ', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 875687987),
(22, 'Paulo', '', '', 'paulo08497@gmail.com', '', 0, 'paulao da grandeza', 'https://br.linkedin.com', 'https://twitter.com/?lang=pt', 'https://www.instagram.com', 0, '', '', 0, '', '', '', 9879845);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
