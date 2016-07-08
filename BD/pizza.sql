-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Jun-2016 às 22:13
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizza`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_cliente`
--

CREATE TABLE IF NOT EXISTS `t_cliente` (
  `CPF` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sobrenome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `CEP` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `t_cliente`
--

INSERT INTO `t_cliente` (`CPF`, `nome`, `sobrenome`, `telefone`, `CEP`, `numero`) VALUES
('07270579400', 'Daniel Lucas', 'Nunes de Alencar Alves', '87991279126', '56280000', '100'),
('07270579401', 'Carolina', 'Victoria', '38770101', '56280000', '5'),
('07270579402', 'Mateus', 'Nunes', '87991259826', '56280000', '150'),
('07270579403', 'Edson', 'Costa', '38631766', '56300123', '312'),
('07270579404', 'Felipe', 'Benevides', '38631455', '56330530', '210');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_funcionarios`
--

CREATE TABLE IF NOT EXISTS `t_funcionarios` (
  `CPF` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sobrenome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `t_funcionarios`
--

INSERT INTO `t_funcionarios` (`CPF`, `nome`, `sobrenome`, `telefone`) VALUES
('01101101100', 'Joao', 'da Silva', '38732542'),
('01101101101', 'Gercilio', 'Martins', '8738731174'),
('01101101102', 'Pedro', 'Monteiro', '38631754');

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_usuarios`
--

CREATE TABLE IF NOT EXISTS `t_usuarios` (
  `CPF` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `t_usuarios`
--

INSERT INTO `t_usuarios` (`CPF`, `nome`, `senha`) VALUES
('01101101100', 'admin', '123456'),
('01101101101', 'gercilio', '123');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `t_usuarios`
--
ALTER TABLE `t_usuarios`
  ADD CONSTRAINT `t_usuarios_ibfk_1` FOREIGN KEY (`CPF`) REFERENCES `t_funcionarios` (`CPF`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
