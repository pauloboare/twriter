-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 04-Mar-2021 às 19:23
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
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_follow`
--

INSERT INTO `tb_follow` (`id_follow`, `user_on`, `user_following`) VALUES
(1, 1, 2),
(5, 3, 1),
(6, 3, 4),
(7, 3, 5),
(8, 4, 5),
(9, 4, 1),
(10, 4, 3),
(11, 5, 1),
(12, 5, 3),
(13, 5, 4),
(14, 2, 1),
(15, 2, 3),
(141, 1, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE IF NOT EXISTS `tb_posts` (
  `id_posts` int(6) NOT NULL,
  `fk_user` int(6) NOT NULL,
  `post` varchar(144) NOT NULL,
  `datatime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id_posts`, `fk_user`, `post`, `datatime`) VALUES
(1, 1, 'Hello, World!', '2021-03-04 11:42:42'),
(2, 1, 'Bom dia!', '2021-03-04 11:43:13'),
(3, 3, 'Ficou legal!', '2021-03-04 11:43:47'),
(4, 3, 'Funcionando!', '2021-03-04 11:44:14'),
(5, 4, 'au au', '2021-03-04 11:44:36'),
(6, 5, 'au auuuuu', '2021-03-04 11:45:09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_users` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `name`, `password`) VALUES
(1, 'pauloboare', 'Paulo Henrique', '883d5554d83ebae9c26936212f20b9a2'),
(2, 'jefferson15', 'Jefferson', '883d5554d83ebae9c26936212f20b9a2'),
(3, 'cine_barreto', 'Francine', '883d5554d83ebae9c26936212f20b9a2'),
(4, 'code', 'Code', '883d5554d83ebae9c26936212f20b9a2'),
(5, 'sazinha', 'SÃ¡', '883d5554d83ebae9c26936212f20b9a2');

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
  ADD PRIMARY KEY (`id_users`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_follow`
--
ALTER TABLE `tb_follow`
  MODIFY `id_follow` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id_posts` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
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
