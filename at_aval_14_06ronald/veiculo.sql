-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/06/2019 às 02:06
-- Versão do servidor: 5.7.26-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `veiculo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carro`
--

CREATE TABLE `carro` (
  `id_car` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `tipov` varchar(20) NOT NULL,
  `qntpass` varchar(10) NOT NULL,
  `vlvenda` varchar(10) NOT NULL,
  `vlcompra` varchar(10) NOT NULL,
  `datcompra` varchar(10) NOT NULL,
  `estato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `carro`
--

INSERT INTO `carro` (`id_car`, `descricao`, `marca`, `modelo`, `tipov`, `qntpass`, `vlvenda`, `vlcompra`, `datcompra`, `estato`) VALUES
(5, 'carro', 'wolk', 'fox', 'passeio', '9', '255', '552', '25/06/2025', 'nÃ£o'),
(6, 'carro', 'wolk', 'zuzu', 'passeio', '4', '2.500', '2.500', '25/06/2025', 'vendido'),
(7, 'carro', 'wolk', 'zuzu', 'passeio', '4', '2.500', '2.500', '25/06/2025', 'vendido'),
(8, 'carro', 'gol', 'sedan', 'passeio', '8', '255', '255', '25/25/25', 'sim'),
(9, 'carro', 'gol', 'sedan', 'passeio', '8', '255', '255', '25/25/25', 'sim'),
(10, 'carro', 'gol', 'sedan', 'passeio', '8', '255', '255', '25/25/25', 'sim'),
(11, 'carro', 'gol', 'sedan', 'passeio', '8', '255', '255', '25/25/25', 'sim'),
(12, 'carros rosa', 'ford', 'esportivo', 'fox', '9', '250', '205', '25/25/06', 'vendido'),
(13, 'carros rosa', 'ford', 'esportivo', 'fox', '9', '250', '205', '25/25/06', 'vendido'),
(14, 'carros rosa', 'ford', 'esportivo', 'fox', '9', '250', '205', '25/25/06', 'vendido'),
(15, 'carros rosa', 'ford', 'esportivo', 'fox', '9', '250', '205', '25/25/06', 'vendido'),
(16, 'carros rosa', 'ford', 'esportivo', 'fox', '9', '250', '205', '25/25/06', 'vendido'),
(17, 'carros pretos', 'fiat', 'esportivo', 'fox', '9', '2.542', '2.542', '25/06/2025', 'vendido'),
(18, 'pato', 'ganÃ§o', 'aereo dinamico', 'animal', '2', '2.800', '1.900', '25/06/2010', 'vendido'),
(19, 'red', 'qualquer', 'bit', 'todos', '9', '201', '256', '25/02/2010', 'vendido'),
(20, 'cÃ£o', 'pitybull', 'dog', '4patas', '2', '2011', '2011', '25/25/025', 'vendido');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id_car`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `carro`
--
ALTER TABLE `carro`
  MODIFY `id_car` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
