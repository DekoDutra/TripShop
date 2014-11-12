-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Nov-2014 às 20:46
-- Versão do servidor: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trip_shop`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`id`, `usuario`, `senha`, `email`, `tipo_usuario`, `ativo`) VALUES
(1, 'Gabriel', 'ed7f8fc2e212cddcc3de223e54b736d0', 'gabrielhenriquedutra@gmail.com', 3, 1),
(6, 'Gabriel', '', 'bieldutra13@hotmail.com', 3, 1),
(10, 'Mauro', '698dc19d489c4e4db73e28a713eab07b', 'suporte@eurotunnel.com.br', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluga_carros`
--

CREATE TABLE IF NOT EXISTS `aluga_carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `carros_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuarios_id`,`carros_id`),
  KEY `fk_usuarios_has_carros_carros1_idx` (`carros_id`),
  KEY `fk_usuarios_has_carros_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `aluga_carros`
--

INSERT INTO `aluga_carros` (`id`, `usuarios_id`, `carros_id`) VALUES
(1, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE IF NOT EXISTS `carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) DEFAULT NULL,
  `cor` varchar(45) DEFAULT NULL,
  `placa` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id`, `modelo`, `cor`, `placa`) VALUES
(1, 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cor_carros`
--

CREATE TABLE IF NOT EXISTS `cor_carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `festas`
--

CREATE TABLE IF NOT EXISTS `festas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `casa` varchar(50) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `preco` varchar(50) NOT NULL,
  `festa_atracao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `festas_compradas`
--

CREATE TABLE IF NOT EXISTS `festas_compradas` (
  `usuarios_id` int(11) NOT NULL,
  `festas_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_id`,`festas_id`),
  KEY `fk_usuarios_has_festas_festas1_idx` (`festas_id`),
  KEY `fk_usuarios_has_festas_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `financeiro`
--

CREATE TABLE IF NOT EXISTS `financeiro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `compra` varchar(45) DEFAULT NULL,
  `parcelas` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_financeiro_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `hoteis`
--

CREATE TABLE IF NOT EXISTS `hoteis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `estrelas` int(11) DEFAULT NULL,
  `quartos` int(11) DEFAULT NULL,
  `quartos_vagos` int(11) DEFAULT NULL,
  `tipo_quarto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelos_carros`
--

CREATE TABLE IF NOT EXISTS `modelos_carros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagem_detalhes`
--

CREATE TABLE IF NOT EXISTS `passagem_detalhes` (
  `passagens_id` int(11) NOT NULL,
  `nome_passageiro` varchar(45) DEFAULT NULL,
  `sobrenome_passageiro` varchar(45) DEFAULT NULL,
  `idade_passageiro` varchar(45) DEFAULT NULL,
  `rg` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  KEY `fk_passagem_detalhes_passagens_idx` (`passagens_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `passagens`
--

CREATE TABLE IF NOT EXISTS `passagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `voos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuarios_id`,`voos_id`),
  KEY `fk_usuarios_has_voos_voos1_idx` (`voos_id`),
  KEY `fk_usuarios_has_voos_usuarios_idx` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quartos`
--

CREATE TABLE IF NOT EXISTS `quartos` (
  `usuarios_id` int(11) NOT NULL,
  `hoteis_id` int(11) NOT NULL,
  PRIMARY KEY (`usuarios_id`,`hoteis_id`),
  KEY `fk_usuarios_has_hoteis_hoteis1_idx` (`hoteis_id`),
  KEY `fk_usuarios_has_hoteis_usuarios1_idx` (`usuarios_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `telefone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logradouro` varchar(100) NOT NULL,
  `cep` int(11) NOT NULL,
  `rg` int(11) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `id_sistema` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`),
  UNIQUE KEY `id_sistema` (`id_sistema`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `telefone`, `email`, `logradouro`, `cep`, `rg`, `cpf`, `id_sistema`, `senha`) VALUES
(3, 'A', '', '', '', '', 0, 0, '', '', ''),
(4, 'Mauro', 'Mauro', '123456', 'Mauro@Mauro.com.br', 'Mauro Avenue', 14090130, 99999999, '99999999999', '9999', 'Mauro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `voos`
--

CREATE TABLE IF NOT EXISTS `voos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_voo` varchar(30) NOT NULL,
  `data_voo` date NOT NULL,
  `horario_voo` time NOT NULL,
  `qtd_passagens` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_voo` (`numero_voo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `voos`
--

INSERT INTO `voos` (`id`, `numero_voo`, `data_voo`, `horario_voo`, `qtd_passagens`) VALUES
(1, '001', '2014-11-07', '11:00:00', 40);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluga_carros`
--
ALTER TABLE `aluga_carros`
  ADD CONSTRAINT `fk_usuarios_has_carros_carros1` FOREIGN KEY (`carros_id`) REFERENCES `carros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_carros_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `festas_compradas`
--
ALTER TABLE `festas_compradas`
  ADD CONSTRAINT `fk_usuarios_has_festas_festas1` FOREIGN KEY (`festas_id`) REFERENCES `festas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_festas_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `financeiro`
--
ALTER TABLE `financeiro`
  ADD CONSTRAINT `fk_financeiro_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `passagem_detalhes`
--
ALTER TABLE `passagem_detalhes`
  ADD CONSTRAINT `fk_passagem_detalhes_passagens` FOREIGN KEY (`passagens_id`) REFERENCES `passagens` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `passagens`
--
ALTER TABLE `passagens`
  ADD CONSTRAINT `fk_usuarios_has_voos_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_voos_voos1` FOREIGN KEY (`voos_id`) REFERENCES `voos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `quartos`
--
ALTER TABLE `quartos`
  ADD CONSTRAINT `fk_usuarios_has_hoteis_hoteis1` FOREIGN KEY (`hoteis_id`) REFERENCES `hoteis` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_has_hoteis_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
