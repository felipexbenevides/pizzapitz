-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jul-2016 às 13:43
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
('07270579403', 'Edson', 'Benevides', '8799617721', '56330530', '312');

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
-- Estrutura da tabela `t_produtos`
--

CREATE TABLE IF NOT EXISTS `t_produtos` (
  `pk_cod_prod` int(3) NOT NULL DEFAULT '0',
  `desc_prod` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `composicao_prod` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor_prod` decimal(5,2) DEFAULT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`pk_cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `t_produtos`
--

INSERT INTO `t_produtos` (`pk_cod_prod`, `desc_prod`, `composicao_prod`, `valor_prod`, `status`) VALUES
(100, 'Alho e Óleo', 'Molho, mussarela, alho e óleo, orégano', '22.00', 0),
(101, 'Alicci', 'Molho, mussarela, alicci e orégano', '20.00', 0),
(102, 'Americana', 'molho, mussarela, bacon, milho, ovos e orégan', '24.00', 0),
(103, 'Atum', 'Molho, mussarela, atum e orégano', '20.00', 0),
(104, 'Bacon', 'Molho, mussarela, bacon e orégano', '20.00', 0),
(105, 'Baiana', 'Molho, mussarela, calabresa, pimenta e orégano', '24.00', 0),
(106, 'Bolonhesa', 'Molho, mussarela, carne moída e orégano', '22.00', 0),
(107, 'Brasileira', 'Molho, mussarela, milho, ervilha e orégano', '22.00', 0),
(108, 'Brócolis', 'Molho, mussarela, brócolis, bacon, catupiry e orégano', '24.00', 0),
(109, 'Calabresa', 'Molho, mussarela, calabresa e orégano', '20.00', 0),
(110, 'Calabresa com Catupiry', 'Molho, mussarela, calabresa, catupiry e orégano', '22.00', 0),
(111, 'Calabresa com Cheddar', 'Molho, mussarela, calabresa, cheddar e orégan', '22.00', 0),
(112, 'Calabresa Mineira', 'Molho, mussarela, calabresa, milho, bacon e orégano', '24.00', 0),
(113, 'Camponesa', 'Molho, mussarela, frango, tomate picado, gorgonzola e manjericã', '24.00', 0),
(114, 'Catupiry', 'Molho, mussarela, catupiry e orégano', '20.00', 0),
(115, 'Champignon', 'Molho, mussarela, champignon e orégano', '22.00', 0),
(116, 'Crocante', 'Molho, mussarela, presunto, bacon, milho, batata palha e orégano', '24.00', 0),
(117, 'Escarola', 'Molho, mussarela, escarola, alho, bacon e orégano', '22.00', 0),
(118, 'Frango', 'Molho, mussarela, frango e orégano', '20.00', 0),
(119, 'Frango Caipira', 'Molho, mussarela, frango, catupiry, bacon, milho e orégan', '24.00', 0),
(120, 'Frango com Catupiry', 'Molho, mussarela, frango, catupiry e orégano', '22.00', 0),
(121, 'Frango com Cheddar', 'Molho, mussarela, frango, cheddar e orégano', '22.00', 0),
(122, 'Gorgonzola', 'Molho, mussarela, tomate, gorgonzola e orégano', '24.00', 0),
(123, 'Grega', 'Molho, mussarela, lombo, cebola, palmito e orégano', '24.00', 0),
(124, 'Havaiana', 'Molho, mussarela, lombo e abacax', '20.00', 0),
(125, 'Humita', 'Molho, mussarela, presunto, milho e orégano', '22.00', 0),
(126, 'Lombo', 'Molho, mussarela, lombo e orégano', '20.00', 0),
(127, 'Lombo Califórnia', 'Molho, mussarela, lombo, califórnia e orégano', '22.00', 0),
(128, 'Lombo Canadense', 'Molho, mussarela, lombo, tomate, alicci, parmesão e orégano', '24.00', 0),
(129, 'Lombo com Catupiry', 'Molho, mussarela, lombo, catupiry e orégano', '22.00', 0),
(130, 'Lombo com Champignon', 'Molho, mussarela, lombo, champignon e orégano', '24.00', 0),
(131, 'Lombo com Cheddar', 'Molho, mussarela, lombo, cheddar e orégan', '22.00', 0),
(132, 'Lombo Especial', 'Molho, mussarela, lombo, champignon, catupiry e orégano', '24.00', 0),
(133, 'Maguerita', 'Molho, mussarela, tomate e manjericão', '20.00', 0),
(134, 'Maiale', 'Molho, mussarela, lombo, calabresa, bacon, catupiry e orégan', '24.00', 0),
(135, 'Marinara', 'Molho, mussarela, atum, tomate picado, provolone e orégan', '24.00', 0),
(136, 'Mexicana', 'Molho, mussarela, calabresa, cebola, pimenta e orégano', '24.00', 0),
(137, 'Milho Verde', 'Molho, mussarela, milho verde e orégano', '20.00', 0),
(138, 'Mussarela', 'Molho, mussarela e orégano', '18.00', 0),
(139, 'Napolitana', 'Molho, mussarela, tomate, parmesão e orégano', '20.00', 0),
(140, 'Palmito', 'Molho, mussarela, palmito e orégano', '20.00', 0),
(141, 'Palmito Especial', 'Molho, mussarela, palmito, milho, bacon e orégano', '22.00', 0),
(142, 'Parmegiana', 'Mussarela, molho ao sugo, parmesão e orégano', '22.00', 0),
(143, 'Paulista', 'Molho, mussarela, palmito, ervilha e orégano', '20.00', 0),
(144, 'Peruana', 'Massa, molho, mussarela, atum, cebola, ervilha e orégano', '24.00', 0),
(145, 'Portuguesa', 'Molho, mussarela, presunto, cebola, ovos, azeitona e orégano', '24.00', 0),
(146, 'Provolone', 'Molho, mussarela, provolone e orégano', '20.00', 0),
(147, 'Q Delícia', 'Molho, mussarela, bolonhesa, cebola, batata palha e orégano', '24.00', 0),
(148, 'Quatro Queijos', 'Molho, mussarela, provolone, parmesão, catupiry e orégano', '24.00', 0),
(149, 'Romana', 'Molho, mussarela, presunto e orégano', '20.00', 0),
(150, 'Siciliana', 'Molho, mussarela, champignon, bacon, pimentão, azeitona e orégano', '22.00', 0),
(151, 'Vegetariana', 'Molho, mussarela, escarola, tomate, milho, ervilha e orégano', '24.00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `t_usuarios`
--

CREATE TABLE IF NOT EXISTS `t_usuarios` (
  `CPF` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gerente` tinyint(1) NOT NULL,
  PRIMARY KEY (`CPF`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `t_usuarios`
--

INSERT INTO `t_usuarios` (`CPF`, `nome`, `senha`, `gerente`) VALUES
('01101101100', 'admin', '123456', 0),
('01101101101', 'gerente', '123456', 1);

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
