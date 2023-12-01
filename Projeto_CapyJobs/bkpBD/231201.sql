-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2023 às 15:46
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

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
-- Estrutura da tabela `tb_pub`
--

CREATE TABLE `tb_pub` (
  `idPub` int(11) NOT NULL,
  `ad` tinyint(1) NOT NULL,
  `idTag` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` longtext NOT NULL,
  `date` datetime NOT NULL,
  `datePub` datetime NOT NULL DEFAULT current_timestamp(),
  `cep` int(11) NOT NULL,
  `idUF` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(4) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `media1` varchar(255) NOT NULL,
  `media2` varchar(255) NOT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_pub`
--

INSERT INTO `tb_pub` (`idPub`, `ad`, `idTag`, `title`, `desc`, `date`, `datePub`, `cep`, `idUF`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `media1`, `media2`, `idUser`) VALUES
(1, 0, 15, '', 'Como ficar tranquileba', '2023-12-01 14:31:57', '2023-12-01 10:36:36', 98745463, 25, 'Rua tilanbu', 25, '', 'jardim lazer', 'Sao Paulo', '', '', 1),
(2, 1, 14, 'Nao sei', 'como isso é possivel', '2023-12-01 14:31:57', '2023-12-01 10:36:36', 98754621, 26, 'Rua jacinto o pinto', 2, '', 'jardim corno', 'Santa Catarina', 'dgdgdf', 'dgdfg', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tags`
--

CREATE TABLE `tb_tags` (
  `idTag` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_tags`
--

INSERT INTO `tb_tags` (`idTag`, `tag`) VALUES
(1, 'Palhaco'),
(2, 'Cozinha'),
(3, 'Banda'),
(4, 'DiversaoGarantida'),
(5, 'VibePositiva'),
(6, 'PistaDeDanca'),
(7, 'AlegriaContagiante'),
(8, 'NoiteInesquecivel'),
(9, 'AgitoTotal'),
(10, 'Folia'),
(11, 'Balada'),
(12, 'Festança'),
(13, 'AmigoFesta'),
(14, 'Festividade'),
(15, 'FicaTranquileba');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_uf`
--

CREATE TABLE `tb_uf` (
  `idUF` int(11) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_uf`
--

INSERT INTO `tb_uf` (`idUF`, `uf`, `estado`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `bio` longtext NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `cep` int(11) NOT NULL,
  `idUF` int(11) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(4) NOT NULL,
  `comp` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cpf_cnpj` bigint(14) NOT NULL,
  `doc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`idUser`, `name`, `profilePic`, `likes`, `email`, `pw`, `phone`, `bio`, `linkedin`, `twitter`, `instagram`, `cep`, `idUF`, `rua`, `numero`, `comp`, `bairro`, `cidade`, `cpf_cnpj`, `doc`) VALUES
(1, 'Eric Capy', 'eric.jpg', 0, 'eric.capy@capivarias.com', 'eric123', 957910504, 'Eu sou uma capivara designer.', 'https://br.linkedin.com/', 'https://twitter.com/?lang=pt', 'https://www.instagram.com/', 66677766, 1, 'Capivarias', 67, 'Casa de baixo', 'Jardim do Lago', 'Capivari', 66677766677, 'ericDoc.pdf');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_pub`
--
ALTER TABLE `tb_pub`
  ADD PRIMARY KEY (`idPub`);

--
-- Índices para tabela `tb_tags`
--
ALTER TABLE `tb_tags`
  ADD PRIMARY KEY (`idTag`);

--
-- Índices para tabela `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD PRIMARY KEY (`idUF`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT de tabelas despejadas
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
-- AUTO_INCREMENT de tabela `tb_uf`
--
ALTER TABLE `tb_uf`
  MODIFY `idUF` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
