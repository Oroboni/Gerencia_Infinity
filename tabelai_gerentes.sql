-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 01-Maio-2017 às 21:25
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `banco`
--
DROP DATABASE banco;
create database banco;
use banco;
-- --------------------------------------------------------

--
-- Estrutura da tabela `tabelaimg`
--

CREATE TABLE IF NOT EXISTS `tabelaimg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(250) NOT NULL,
  `produto` varchar(250) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `data` date NOT NULL,
  `imagem` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tabelafuncionarios`
--

INSERT INTO `tabelaimg` (`id`, `codigo`, `produto`, `descricao`, `data`, `imagem`) VALUES
(1, 'Matheus', 'Rua jovenal', 'TI', '2007-02-26', 'matheus.png'),
(2, 'Carlos', 'Rua espelho', 'VENDAS', '2005-06-25', 'carlos.png'),
(3, 'Isabella', 'Rua espiral', 'RH', '2006-08-16', 'isa.jpeg'),
(4, 'Cleitin', 'Rua calor', 'ENTREGAS', '2006-05-01', 'cleitin.jpeg'),
(5, 'Jusbiscludia', 'Rua inverno', 'GERAL', '2008-05-01', 'julia.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
