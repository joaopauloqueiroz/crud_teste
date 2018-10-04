-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 04-Out-2018 às 01:07
-- Versão do servidor: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.2.9-1+ubuntu16.04.1+deb.sury.org+1

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_create_divida` (`pidentificador` VARCHAR(100), `pvalor` FLOAT(8,0), `pvencimento` DATE, `pdescricao` TEXT, `puser_id` INT(11))  BEGIN
    
    INSERT INTO dividas (identificador, valor, vencimento, descricao, user_id) values (pidentificador, pvalor, pvencimento, pdescricao, puser_id);
     SELECT * FROM dividas WHERE id = LAST_INSERT_ID();
     
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update` (IN `pidentificador` VARCHAR(100), IN `pvalor` FLOAT(8,2) UNSIGNED, IN `pvencimento` DATE, IN `pdescricao` TEXT, IN `puser_id` INT(11) UNSIGNED, IN `pid` INT(11) UNSIGNED)  BEGIN
    
    UPDATE dividas SET identificador = pidentificador, valor = pvalor, vencimento = pvencimento, descricao = pdescricao,  user_id = puser_id WHERE id = pid;
    
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_user_create` (IN `pname` VARCHAR(45), IN `ptelefone` VARCHAR(11), IN `pemail` VARCHAR(45), IN `pendereco` VARCHAR(60))  BEGIN
    insert into clientes (nome, telefone, email, endereco) VALUES (pname, ptelefone, pemail, pendereco);
    
    SELECT * FROM clientes WHERE id = LAST_INSERT_ID();
    
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `telefone`, `email`, `endereco`) VALUES
(15, 'Lucas da Silva Sousa', '11995096974', 'teste02@gmail.com', 'Rua Ronaldo Jesus Lentisco, 18'),
(17, 'Rodrigo Marioto', '11995096974', 'email@provedoremail.com.br', 'Rua Ronaldo Jesus Lentisco, 18'),
(11, 'Joao Paulo Goncalves Queiroz', '11995096974', 'joaopaulo@gmail.com', 'Rua da Paz');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dividas`
--

CREATE TABLE `dividas` (
  `id` int(11) NOT NULL,
  `identificador` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `valor` float(8,2) NOT NULL,
  `vencimento` date NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `dividas`
--

INSERT INTO `dividas` (`id`, `identificador`, `valor`, `vencimento`, `descricao`, `user_id`) VALUES
(3, 'Teste testando 2', 500.00, '2005-12-25', 'testee de inserÃ§Ã£o de tarefa', 15),
(5, 'Estou cadastrando uma divida de teste', 100.00, '2016-12-12', 'DescÃ§Ã£o da divida', 10),
(6, 'Cadastrando novas dividas', 4000.00, '2018-07-01', 'Criado divida de teste', 10),
(7, 'Testedasd', 500.00, '2018-06-12', 'Teste  de inserÃ§Ã£o', 17),
(8, 'Testedasd', 500.00, '2018-06-12', 'Teste  de inserÃ§Ã£o', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dividas`
--
ALTER TABLE `dividas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dividas`
--
ALTER TABLE `dividas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
