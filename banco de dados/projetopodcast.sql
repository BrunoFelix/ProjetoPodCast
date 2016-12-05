-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 05-Dez-2016 às 12:41
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetopodcast`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_favorito`
--

CREATE TABLE `tb_favorito` (
  `ID` int(11) NOT NULL,
  `LINK_PLAYER` varchar(99) NOT NULL,
  `AUTOR` varchar(99) NOT NULL,
  `TITULO` varchar(60) NOT NULL,
  `MINUTOS_EXEC_PLAYER` time DEFAULT NULL,
  `ID_USUARIO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(30) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `sobrenome` varchar(30) NOT NULL,
  `Email` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `login`, `senha`, `nome`, `sobrenome`, `Email`) VALUES
(1, 'admin', 'admin', 'administrador', 'do sistema', ''),
(2, 'brunofelixbarbosa123@hotmail.com', '987654321', 'bruno', 'felix', ''),
(3, 'TESTE@HOTMAIL.COM', '987654321', 'TESTE', 'TESTE2', ''),
(4, 'admin2@hotmail.com', '123456789', 'admin2', 'admin2', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_favorito`
--
ALTER TABLE `tb_favorito`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_favorito`
--
ALTER TABLE `tb_favorito`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
