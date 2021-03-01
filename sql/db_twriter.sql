-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Mar-2021 às 04:35
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_twriter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_follow`
--

CREATE TABLE `tb_follow` (
  `id_follow` int(10) NOT NULL,
  `user_on` int(6) NOT NULL,
  `user_following` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_follow`
--

INSERT INTO `tb_follow` (`id_follow`, `user_on`, `user_following`) VALUES
(3, 4, 5),
(4, 4, 3),
(5, 5, 4),
(6, 3, 4),
(8, 4, 5),
(9, 8, 3),
(10, 8, 3),
(11, 4, 8),
(12, 4, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id_posts` int(6) NOT NULL,
  `fk_user` int(6) NOT NULL,
  `post` varchar(144) NOT NULL,
  `datatime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id_posts`, `fk_user`, `post`, `datatime`) VALUES
(37, 4, 'Bom dia!', '2021-02-26 23:54:13'),
(38, 4, 'Estamos começando!', '2021-02-26 23:54:19'),
(39, 5, 'Que legal esse sistema', '2021-02-26 23:54:36'),
(40, 5, 'Top demais', '2021-02-26 23:54:41'),
(41, 3, 'Tá progredindo!', '2021-02-26 23:55:10'),
(42, 3, 'Isso é legal', '2021-02-26 23:55:30'),
(43, 4, 'Vamos que vamos', '2021-02-26 23:55:44'),
(45, 4, 'DEU CERTO', '2021-02-27 00:31:02'),
(46, 4, 'Agora to com fome', '2021-02-27 00:39:15'),
(47, 4, 'TO COM FOME', '2021-02-27 18:54:51'),
(51, 5, 'O code é lindoooo', '2021-02-27 19:01:37'),
(52, 8, 'auau', '2021-02-27 19:08:19'),
(53, 8, 'au au', '2021-02-27 23:23:00'),
(54, 9, 'Oi, gente', '2021-02-27 23:36:45'),
(55, 4, 'Deu certo', '2021-02-28 23:45:39'),
(56, 4, 'uhull', '2021-03-01 00:31:39');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `name`, `password`) VALUES
(3, 'jefferson15', 'Jefferson', '883d5554d83ebae9c26936212f20b9a2'),
(4, 'pauloboare', 'Paulo Henrique', '883d5554d83ebae9c26936212f20b9a2'),
(5, 'cine_barreto', 'Francine Barreto', '883d5554d83ebae9c26936212f20b9a2'),
(8, 'code', 'Code', '883d5554d83ebae9c26936212f20b9a2'),
(9, 'sazinha', 'Sá', '883d5554d83ebae9c26936212f20b9a2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_follow`
--
ALTER TABLE `tb_follow`
  ADD PRIMARY KEY (`id_follow`),
  ADD KEY `user_on` (`user_on`),
  ADD KEY `user_following` (`user_following`);

--
-- Índices para tabela `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id_posts`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_follow`
--
ALTER TABLE `tb_follow`
  MODIFY `id_follow` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id_posts` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_follow`
--
ALTER TABLE `tb_follow`
  ADD CONSTRAINT `tb_follow_ibfk_1` FOREIGN KEY (`user_on`) REFERENCES `tb_users` (`id_users`),
  ADD CONSTRAINT `tb_follow_ibfk_2` FOREIGN KEY (`user_following`) REFERENCES `tb_users` (`id_users`);

--
-- Limitadores para a tabela `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD CONSTRAINT `tb_posts_ibfk_1` FOREIGN KEY (`fk_user`) REFERENCES `tb_users` (`id_users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
