-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25-Fev-2021 às 15:29
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
-- Estrutura da tabela `tb_followers`
--

CREATE TABLE IF NOT EXISTS `tb_followers` (
  `id_followers` int(6) NOT NULL,
  `fk_user_follower` int(6) NOT NULL,
  `fk_user_following` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE IF NOT EXISTS `tb_posts` (
  `id_posts` int(6) NOT NULL,
  `fk_user` int(6) NOT NULL,
  `post` varchar(144) NOT NULL,
  `datatime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id_posts`, `fk_user`, `post`, `datatime`) VALUES
(10, 4, 'hello world', '0000-00-00 00:00:00'),
(11, 4, 'showww', '0000-00-00 00:00:00'),
(12, 3, 'belezaaaaaaaas', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `id_users` int(6) NOT NULL,
  `username` varchar(12) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`id_users`, `username`, `name`, `password`) VALUES
(2, 'webdominante', 'Paulo', '883d5554d83ebae9c26936212f20b9a2'),
(3, 'jefferson15', 'Jefferson', '883d5554d83ebae9c26936212f20b9a2'),
(4, 'pauloboare', 'Paulo', '883d5554d83ebae9c26936212f20b9a2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_followers`
--
ALTER TABLE `tb_followers`
  ADD PRIMARY KEY (`id_followers`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id_posts`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_followers`
--
ALTER TABLE `tb_followers`
  MODIFY `id_followers` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id_posts` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_users` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
