-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 03-Out-2018 às 22:56
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_teste`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `sp_create_divida`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_create_divida` (`pidentificador` VARCHAR(100), `pvalor` FLOAT(8,0), `pvencimento` DATE, `pdescricao` TEXT, `puser_id` INT(11))  BEGIN
    
    INSERT INTO dividas (identificador, valor, vencimento, descricao, user_id) values (pidentificador, pvalor, pvencimento, pdescricao, puser_id);
     SELECT * FROM dividas WHERE id = LAST_INSERT_ID();
     
    END$$

DROP PROCEDURE IF EXISTS `sp_user_create`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_create` (IN `pname` VARCHAR(45), IN `ptelefone` VARCHAR(11), IN `pemail` VARCHAR(45), IN `pendereco` VARCHAR(60))  BEGIN
    insert into clientes (nome, telefone, email, endereco) VALUES (pname, ptelefone, pemail, pendereco);
    
    SELECT * FROM clientes WHERE id = LAST_INSERT_ID();
    
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `email`, `endereco`) VALUES
(1, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'joaopaulo@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(2, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'joaopaulo.queiroz.545@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(3, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096', 'joaopaulo.queiroz.545@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(4, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'teste@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(5, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'teste02@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(6, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'teste02@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(7, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'teste02@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(8, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'teste02@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(9, 'JOAO PAULO GONÃ‡ALVES QUEIROZ', '11995096974', 'email@provedoremail.com.br', 'Rua Ronaldo Jesus Lentisco, 18'),
(10, 'Joao Paulo Goncalves Queiroz', '11995096974', 'joaopaulo@gmail.com', 'Rua da Paz'),
(11, 'Joao Paulo Goncalves Queiroz', '11995096974', 'joaopaulo@gmail.com', 'Rua da Paz'),
(12, 'Joao Paulo Goncalves Querioz', '11995096974', 'joaopaulo@gmail.com', 'Rua da Paz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas`
--

DROP TABLE IF EXISTS `dividas`;
CREATE TABLE IF NOT EXISTS `dividas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` float(8,2) NOT NULL,
  `vencimento` date NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `dividas`
--

INSERT INTO `dividas` (`id`, `identificador`, `valor`, `vencimento`, `descricao`, `user_id`) VALUES
(1, 'Teste', 100.00, '2010-06-10', 'Testte de insercao', 11),
(2, 'teste oi', 100.00, '2018-05-12', 'tESTEABASIDBAOSD INSERÃ‡ÃƒO', 11);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
