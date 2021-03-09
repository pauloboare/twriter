-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Mar-2021 às 06:27
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
(5, 5, 4),
(6, 3, 4),
(65, 8, 4),
(116, 8, 3),
(117, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id_posts` int(6) NOT NULL,
  `fk_user` int(6) NOT NULL,
  `post` varchar(144) NOT NULL,
  `datatime` datetime NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id_posts`, `fk_user`, `post`, `datatime`, `timestamp`) VALUES
(37, 4, 'Bom dia!', '2021-02-26 23:54:13', '1121'),
(38, 4, 'Estamos começando!', '2021-02-26 23:54:19', '1121'),
(39, 5, 'Que legal esse sistema', '2021-02-26 23:54:36', '1121'),
(40, 5, 'Top demais', '2021-02-26 23:54:41', '1121'),
(41, 3, 'Tá progredindo!', '2021-02-26 23:55:10', '1121'),
(42, 3, 'Isso é legal', '2021-02-26 23:55:30', '1121'),
(43, 4, 'Vamos que vamos', '2021-02-26 23:55:44', '1121'),
(45, 4, 'DEU CERTO', '2021-02-27 00:31:02', '1121'),
(46, 4, 'Agora to com fome', '2021-02-27 00:39:15', '1121'),
(47, 4, 'TO COM FOME', '2021-02-27 18:54:51', '1121'),
(51, 5, 'O code é lindoooo', '2021-02-27 19:01:37', '1121'),
(52, 8, 'auau', '2021-02-27 19:08:19', '1121'),
(53, 8, 'au au', '2021-02-27 23:23:00', '1121'),
(54, 9, 'Oi, gente', '2021-02-27 23:36:45', '1121'),
(55, 4, 'Deu certo', '2021-02-28 23:45:39', '1121'),
(56, 4, 'uhull', '2021-03-01 00:31:39', '1121'),
(57, 4, 'MUITO LEGAL', '2021-03-02 01:22:26', '1121'),
(58, 4, 'MUITO LEGAL', '2021-03-02 01:22:26', '1121'),
(59, 4, 'FOME DE NOVO', '2021-03-02 21:15:52', '1121'),
(60, 4, 'FOMMMEEE', '2021-03-02 21:16:32', '1121'),
(61, 4, 'QUERO COMER', '2021-03-02 21:18:15', '1121'),
(62, 4, 'AGORA', '2021-03-02 21:18:20', '1121'),
(63, 4, 'show', '2021-03-02 21:20:19', '1121'),
(64, 4, 'show', '2021-03-02 21:20:19', '1121'),
(65, 4, 'show', '2021-03-02 21:21:09', '1121'),
(66, 4, 'aaah', '2021-03-02 21:21:16', '1121'),
(67, 4, 'aaqa', '2021-03-02 21:24:31', '1121'),
(68, 4, 'aaqa', '2021-03-02 21:24:31', '1121'),
(69, 4, 'bbbb', '2021-03-02 21:24:44', '1121'),
(70, 4, 'bbbb', '2021-03-02 21:24:44', '1121'),
(71, 4, 'sbc', '2021-03-02 21:25:22', '1121'),
(72, 4, 'sbc', '2021-03-02 21:25:22', '1121'),
(73, 4, 'abc', '2021-03-02 21:25:35', '1121'),
(74, 4, 'abc', '2021-03-02 21:25:35', '1121'),
(75, 4, 'foi', '2021-03-02 21:27:33', '1121'),
(76, 4, 'foi', '2021-03-02 21:27:33', '1121'),
(77, 4, 'kkk', '2021-03-02 21:28:42', '1121'),
(78, 4, 'kkk', '2021-03-02 21:28:42', '1121'),
(79, 4, 'au oi ei', '2021-03-02 21:29:19', '1121'),
(80, 4, 'au oi ei', '2021-03-02 21:29:19', '1121'),
(81, 4, 'ooi', '2021-03-02 21:39:21', '1121'),
(82, 4, 'ooi', '2021-03-02 21:39:21', '1121'),
(83, 4, 'vaaai', '2021-03-02 21:43:57', '1121'),
(84, 4, 'vaaai', '2021-03-02 21:43:57', '1121'),
(85, 4, 'boa', '2021-03-02 21:45:03', '1121'),
(86, 4, 'arroz', '2021-03-02 21:45:07', '1121'),
(87, 4, 'kasoa', '2021-03-02 21:47:38', '1121'),
(88, 4, 'kasoa', '2021-03-02 21:47:38', '1121'),
(89, 4, 'ksdokds', '2021-03-02 21:47:45', '1121'),
(90, 4, 'ksdokds', '2021-03-02 21:47:45', '1121'),
(91, 4, 'kkk', '2021-03-02 21:53:03', '1121'),
(92, 4, 'kkk', '2021-03-02 21:53:03', '1121'),
(93, 4, 'ufa', '2021-03-02 21:53:39', '1121'),
(94, 4, 'ufa', '2021-03-02 21:53:39', '1121'),
(95, 4, '', '2021-03-02 21:53:40', '1121'),
(96, 4, '', '2021-03-02 21:53:40', '1121'),
(97, 4, 'opp', '2021-03-02 21:54:19', '1121'),
(98, 4, 'opp', '2021-03-02 21:54:19', '1121'),
(99, 4, 'atchim', '2021-03-02 21:55:04', '1121'),
(100, 4, 'atchim', '2021-03-02 21:55:04', '1121'),
(101, 4, 'ok', '2021-03-02 22:01:30', '1121'),
(102, 4, 'Boa noite!', '2021-03-08 22:53:56', '1121'),
(103, 4, 'AGORA FOI!!', '2021-03-08 23:06:52', '1121'),
(104, 4, 'SEERO', '2021-03-08 23:07:31', '1121'),
(105, 4, 'o0oiopip', '2021-03-08 23:09:23', '1121'),
(106, 4, 'Assim OK', '2021-03-08 23:13:32', '1121'),
(107, 4, 'KKKKKKKKKKKK', '2021-03-08 23:25:34', '1121'),
(108, 4, 'Boa noite amigos', '2021-03-08 23:32:16', '1121'),
(109, 4, 'UNICOOOO', '2021-03-08 23:34:52', '1121'),
(110, 4, 'UNIXX', '2021-03-08 23:35:43', '1121'),
(111, 4, 'UNIX', '2021-03-08 23:36:36', '1121'),
(112, 4, 'oooi', '2021-03-08 23:42:11', '1121'),
(113, 4, 'ooi', '2021-03-08 23:43:17', '1615257797'),
(114, 4, 'oioio', '2021-03-08 23:46:21', '114-1615257981'),
(115, 4, 'uhu', '2021-03-08 23:49:27', '1151615258167'),
(116, 10, 'Boa noite!!', '2021-03-08 23:53:30', '1161615258410'),
(117, 4, 'Boooooooa noite!!! quase meia noite', '2021-03-08 23:58:30', '1171615258710'),
(118, 5, 'Boa noite!!', '2021-03-09 02:22:29', '1181615267349'),
(119, 5, 'UHUL', '2021-03-09 02:22:36', '1191615267356');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `id_users` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `avatar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `name`, `password`, `avatar`) VALUES
(3, 'jefferson15', 'Jefferson', '883d5554d83ebae9c26936212f20b9a2', 'img/default.png'),
(4, 'pauloboare', 'Paulo Henrique', '883d5554d83ebae9c26936212f20b9a2', '03f0eeae8353ae4b576b6c7b44f1dc35.jpg'),
(5, 'cine_barreto', 'Francine Barreto', '883d5554d83ebae9c26936212f20b9a2', 'cine.jpg'),
(8, 'code', 'Code', '883d5554d83ebae9c26936212f20b9a2', 'img/default.png'),
(9, 'sazinha', 'Sá', '883d5554d83ebae9c26936212f20b9a2', 'img/default.png'),
(10, 'filomena', 'Filó', '883d5554d83ebae9c26936212f20b9a2', 'img/default.png'),
(11, 'zero', '0000', '883d5554d83ebae9c26936212f20b9a2', 'img/default.png'),
(12, 'libertadores', 'Libertadores Conmembol', '883d5554d83ebae9c26936212f20b9a2', 'img/default.png');

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
  MODIFY `id_follow` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de tabela `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id_posts` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
