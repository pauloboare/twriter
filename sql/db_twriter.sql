-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Mar-2021 às 19:30
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_twriter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_follow`
--

CREATE TABLE IF NOT EXISTS `tb_follow` (
  `id_follow` int(10) NOT NULL,
  `user_on` int(6) NOT NULL,
  `user_following` int(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_follow`
--

INSERT INTO `tb_follow` (`id_follow`, `user_on`, `user_following`) VALUES
(5, 5, 4),
(6, 3, 4),
(65, 8, 4),
(116, 8, 3),
(117, 4, 5),
(118, 4, 3),
(119, 14, 4),
(120, 4, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE IF NOT EXISTS `tb_posts` (
  `id_posts` int(6) NOT NULL,
  `fk_user` int(6) NOT NULL,
  `post` varchar(144) NOT NULL,
  `datatime` datetime NOT NULL,
  `timestamp` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id_posts`, `fk_user`, `post`, `datatime`, `timestamp`) VALUES
(116, 10, 'Boa noite!!', '2021-03-08 23:53:30', '1161615258410'),
(117, 4, 'Boooooooa noite!!! quase meia noite', '2021-03-08 23:58:30', '1171615258710'),
(118, 5, 'Boa noite!!', '2021-03-09 02:22:29', '1181615267349'),
(119, 5, 'UHUL', '2021-03-09 02:22:36', '1191615267356'),
(121, 3, 'Boa tarde!', '2021-03-09 13:08:13', '1211615306093'),
(122, 3, 'AGREMAK Ã‰ TOP', '2021-03-09 13:09:09', '1221615306149');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_users` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL,
  `avatar` varchar(40) NOT NULL,
  `bio` varchar(160) NOT NULL,
  `local` varchar(30) NOT NULL,
  `site` varchar(100) NOT NULL,
  `nascimento` date NOT NULL,
  `since` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `name`, `password`, `avatar`, `bio`, `local`, `site`, `nascimento`, `since`) VALUES
(3, 'jefferson15', 'Jefferson', '883d5554d83ebae9c26936212f20b9a2', '1456fb02c670cb40e6840bd8bd4f0e01.jpg', 'Eu sou o 15', 'TaubatÃ©, SP', 'https://www.agremak.com.br', '0000-00-00', '2021-03-05'),
(4, 'pauloboare', 'Paulo Henrique', '883d5554d83ebae9c26936212f20b9a2', '531a843a64077a0aa847989775fc1a2c.jpg', 'Eu sou muito lindo', 'TaubatÃ©, SP', 'https://www.youtube.com/pauloboare', '0000-00-00', '2021-03-01'),
(5, 'cine_barreto', 'Francine Barreto', '883d5554d83ebae9c26936212f20b9a2', 'cine.jpg', '', 'TaubatÃ©, SP', '', '0000-00-00', '2021-03-03'),
(8, 'code', 'Code', '883d5554d83ebae9c26936212f20b9a2', 'default.png', '', '', '', '0000-00-00', '2021-03-04'),
(9, 'sazinha', 'Sá', '883d5554d83ebae9c26936212f20b9a2', 'default.png', '', '', '', '0000-00-00', '2021-03-06'),
(10, 'filomena', 'Filó', '883d5554d83ebae9c26936212f20b9a2', 'default.png', '', '', '', '0000-00-00', '2021-03-05'),
(14, 'braito', 'Edenrique', '883d5554d83ebae9c26936212f20b9a2', '9541e463f0733ea6bc8d49af37f9ead8.png', 'Gosto de ROCK', 'TaubatÃ©, SP', 'https://www.artadnroll.com.br', '0000-00-00', '2021-03-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_follow`
--
ALTER TABLE `tb_follow`
  ADD PRIMARY KEY (`id_follow`), ADD KEY `user_on` (`user_on`), ADD KEY `user_following` (`user_following`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id_posts`), ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_follow`
--
ALTER TABLE `tb_follow`
  MODIFY `id_follow` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id_posts` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- Constraints for dumped tables
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
