-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jan-2021 às 04:21
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nivel`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_end`
--

CREATE TABLE `perfil_end` (
  `id_end` int NOT NULL,
  `bairro` varchar(150) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(150) COLLATE utf8_bin NOT NULL,
  `endereco` varchar(150) COLLATE utf8_bin NOT NULL,
  `estado` varchar(2) COLLATE utf8_bin NOT NULL,
  `numero` int NOT NULL,
  `cep` int NOT NULL,
  `complemento` varchar(150) COLLATE utf8_bin NOT NULL,
  `id_perfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `perfil_end`
--

INSERT INTO `perfil_end` (`id_end`, `bairro`, `cidade`, `endereco`, `estado`, `numero`, `cep`, `complemento`, `id_perfil`) VALUES
(1, 'guaianases', 'sao paulo', 'rua qualquer', 'sp', 200, 2121022, 'casa 2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_user`
--

CREATE TABLE `perfil_user` (
  `id_perfil` int NOT NULL,
  `cpf` int NOT NULL COMMENT '9999999991',
  `d_nasc` int NOT NULL,
  `tel` int NOT NULL,
  `profissao` varchar(20) COLLATE utf8_bin NOT NULL,
  `id_user` int NOT NULL COMMENT '18'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `perfil_user`
--

INSERT INTO `perfil_user` (`id_perfil`, `cpf`, `d_nasc`, `tel`, `profissao`, `id_user`) VALUES
(1, 250123123, 0, 25252525, 'pedreiro', 1),
(2, 1858625622, 12252112, 25525656, 'dentista', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `senha` varchar(100) COLLATE utf8_bin NOT NULL,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `nivel` int NOT NULL DEFAULT '0',
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`email`, `senha`, `nome`, `nivel`, `id`) VALUES
('adm@adm.com', '1234', 'maria', 2, 1),
('aluno@aluno.com', '1234', 'aluno', 0, 2),
('prof@prof.com', '1234', 'joao', 1, 19);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `perfil_end`
--
ALTER TABLE `perfil_end`
  ADD PRIMARY KEY (`id_end`),
  ADD UNIQUE KEY `id_perfil` (`id_perfil`);

--
-- Índices para tabela `perfil_user`
--
ALTER TABLE `perfil_user`
  ADD PRIMARY KEY (`id_perfil`),
  ADD KEY `perfil_user` (`id_user`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `perfil_end`
--
ALTER TABLE `perfil_end`
  MODIFY `id_end` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `perfil_user`
--
ALTER TABLE `perfil_user`
  MODIFY `id_perfil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `perfil_end`
--
ALTER TABLE `perfil_end`
  ADD CONSTRAINT `user_perfil` FOREIGN KEY (`id_perfil`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Limitadores para a tabela `perfil_user`
--
ALTER TABLE `perfil_user`
  ADD CONSTRAINT `perfil_user` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
