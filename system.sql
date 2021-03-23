-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Mar-2021 às 01:05
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `system`
--

DELIMITER $$
--
-- Procedimentos
--
DROP PROCEDURE IF EXISTS `delete`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete` (IN `aid` INT(11))  BEGIN
	DELETE FROM `user` WHERE id_user = aid;
    DELETE FROM `address_user` WHERE id_user = aid;
    
END$$

DROP PROCEDURE IF EXISTS `inserir`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `inserir` (IN `anome` VARCHAR(150), IN `aidade` INT(3), IN `acep` INT(11), IN `arua` VARCHAR(200), IN `anumero` INT(6), IN `abairro` VARCHAR(100), IN `acidade` VARCHAR(100), IN `aestado` VARCHAR(100))  BEGIN
	INSERT INTO user ( name, age) VALUES (anome, aidade);
	INSERT INTO address_user ( id_user,CEP, street, number, district, city, state) VALUES (LAST_INSERT_ID(),acep, arua, anumero, abairro, acidade, aestado);
END$$

DROP PROCEDURE IF EXISTS `update`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `update` (IN `aid` INT(11), IN `anome` VARCHAR(150), IN `aidade` INT(3), IN `acep` INT(11), IN `arua` VARCHAR(200), IN `anumero` INT(6), IN `abairro` VARCHAR(100), IN `acidade` VARCHAR(100), IN `aestado` VARCHAR(100))  BEGIN
	UPDATE `user` SET `name` = anome, `age` = aidade where `id_user` = aid;
	UPDATE `address_user` SET `CEP` = acep, `street` = arua, `number` = anumero, `district` = abairro, `city` = acidade, `state` = aestado where `id_user` = aid; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `address_user`
--

DROP TABLE IF EXISTS `address_user`;
CREATE TABLE `address_user` (
  `id_address` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `CEP` int(11) NOT NULL,
  `street` varchar(200) NOT NULL,
  `number` int(6) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `address_user`
--

INSERT INTO `address_user` (`id_address`, `id_user`, `CEP`, `street`, `number`, `district`, `city`, `state`) VALUES
(1, 8, 61945080, 'Rua Teresina', 253, 'Cônego Raimundo Pinto', 'Maranguape', 'CE'),
(3, 10, 61945080, 'Rua Teresina', 253, 'Cônego Raimundo Pinto', 'Maranguape', 'CE'),
(4, 11, 61945080, 'Rua Teresina', 249, 'Cônego Raimundo Pinto', 'Maranguape', 'CE'),
(6, 13, 61945080, 'Rua Teresina', 456, 'Cônego Raimundo Pinto', 'Maranguape', 'CE'),
(7, 14, 61945080, 'rua', 123, 'bairro', 'cidade tal', 'estado do tal'),
(8, 15, 61945080, 'Rua Teresina', 253, 'Cônego Raimundo Pinto', 'Maranguape', 'CE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `name`, `age`) VALUES
(8, 'agora foi', 2),
(10, 'felipe gabriel da silva', 28),
(11, 'felipe gabriel da silva', 20),
(13, 'maria das graças', 58),
(14, 'teste inserir', 2),
(15, 'felipe das tantas', 41);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `address_user`
--
ALTER TABLE `address_user`
  ADD PRIMARY KEY (`id_address`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_cliente` (`id_user`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `address_user`
--
ALTER TABLE `address_user`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
