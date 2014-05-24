-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Maio-2014 às 03:32
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tarefa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE IF NOT EXISTS `tarefa` (
  `codTarefa` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `status` enum('Designado','Em andamento','Pendente','Fechado') NOT NULL,
  `criticidade` enum('Baixo','Médio','Alto','Urgente') NOT NULL,
  `tarefa` text NOT NULL,
  PRIMARY KEY (`codTarefa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`codTarefa`, `titulo`, `status`, `criticidade`, `tarefa`) VALUES
(1, 'teste', 'Designado', 'Médio', 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `matricula` varchar(10) NOT NULL DEFAULT '',
  `nome` varchar(100) NOT NULL,
  `nivel` enum('Usuario','Operador','Administrador') DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `ativo` enum('sim','não') DEFAULT NULL,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`matricula`, `nome`, `nivel`, `senha`, `ativo`) VALUES
('p701153', 'Neon Dotta', 'Administrador', '123456', 'sim'),
('teste', 'Neon FabrÃ­cio Pereira Dotta', 'Administrador', 'Europa14', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_tarefa`
--

CREATE TABLE IF NOT EXISTS `usuario_tarefa` (
  `Usuario_matricula` varchar(20) NOT NULL DEFAULT '',
  `Tarefa_codTarefa` int(11) NOT NULL,
  `solicitante` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Usuario_matricula`,`Tarefa_codTarefa`),
  KEY `fk_Usuario_has_Tarefa_Tarefa1_idx` (`Tarefa_codTarefa`),
  KEY `fk_Usuario_has_Tarefa_Usuario_idx` (`Usuario_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_tarefa`
--

INSERT INTO `usuario_tarefa` (`Usuario_matricula`, `Tarefa_codTarefa`, `solicitante`) VALUES
('teste', 1, 'p701153');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
