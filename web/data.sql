-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2021 às 01:34
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `zumbosys`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `loginlogs`
--

CREATE TABLE `loginlogs` (
  `cpf` varchar(15) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `date` int(11) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `loginlogs`
--

INSERT INTO `loginlogs` (`cpf`, `ip`, `date`, `country`) VALUES
('Zumbo - failed', '::1', 1618516843, 'XX'),
('Zumbo', '::1', 1618516847, 'XX'),
('Zumbo', '::1', 1618516859, 'XX'),
('Zumbo', '::1', 1618516950, 'XX'),
('Zumbo', '::1', 1619187655, 'XX'),
('Zumbo', '::1', 1619189528, 'XX'),
('Zumbo', '::1', 1622773652, 'XX'),
('Zumbo', '::1', 1622773723, 'XX'),
('Zumbo', '::1', 1622773842, 'XX'),
('Zumbo', '::1', 1622773996, 'XX'),
('Zumbo', '::1', 1622774061, 'XX'),
('Zumbo', '::1', 1622774103, 'XX'),
('Zumbo', '::1', 1622774125, 'XX'),
('alunoucb - fail', '::1', 1622775565, 'XX'),
('alunoucb - fail', '::1', 1622775566, 'XX'),
('alunoucb - fail', '::1', 1622775570, 'XX'),
('alunoucb - fail', '::1', 1622775594, 'XX'),
('alunoucb - fail', '::1', 1622775598, 'XX'),
('alunoucb', '::1', 1622775612, 'XX'),
('alunoucb', '::1', 1622775851, 'XX'),
('alunoucb', '::1', 1622779622, 'XX'),
('alunoucb', '::1', 1622816959, 'XX'),
('alunoucb', '::1', 1622831712, 'XX'),
('alunoucb', '::1', 1622903045, 'XX'),
('alunoucb', '::1', 1623118553, 'XX'),
('alunoucb', '::1', 1623713351, 'XX'),
('alunoucb', '::1', 1623713432, 'XX'),
('alunoucb', '::1', 1623713570, 'XX'),
('alunoucb', '::1', 1623713619, 'XX'),
('alunoucb', '::1', 1623713644, 'XX');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `cpf` char(11) NOT NULL,
  `nomec` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `scode` char(4) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`ID`, `cpf`, `nomec`, `password`, `scode`, `email`) VALUES
(3, 'alunoucb', 'alunoucb', '2fc567d9fda19eae49293a39deaa5fc4b559dbb4', '5544', 'paulo.fonseca@a.ucb.br');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
