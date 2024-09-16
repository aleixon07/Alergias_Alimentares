-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/11/2023 às 01:59
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc_alexandre`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alergia_alimentar`
--

CREATE TABLE `alergia_alimentar` (
  `IdAlergia_Alimentar` int(11) NOT NULL,
  `Text_Area` text NOT NULL,
  `Cor` varchar(10) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alergia_alimentar`
--

INSERT INTO `alergia_alimentar` (`IdAlergia_Alimentar`, `Text_Area`, `Cor`, `IdUsuario`) VALUES
(1, '<p>Por defini&ccedil;&atilde;o,&nbsp;<strong>alergia alimentar</strong><strong>&nbsp;se trata de uma rea&ccedil;&atilde;o do sistema imunol&oacute;gico</strong>&nbsp;a algum componente presente em um determinado alimento.</p>\r\n\r\n<p>A fun&ccedil;&atilde;o do nosso sistema imunol&oacute;gico &eacute; proteger o corpo de subst&acirc;ncias possivelmente nocivas, como bact&eacute;rias, v&iacute;rus e toxinas.</p>\r\n\r\n<p>Quando uma rea&ccedil;&atilde;o al&eacute;rgica ocorre, &eacute; porque houve resposta imunol&oacute;gica aos&nbsp;<strong>anticorpos imunoglobulina E</strong>&nbsp;(IgE), subst&acirc;ncia produzida pelo organismo.</p>\r\n\r\n<p>Ainda n&atilde;o se sabe ao certo o porqu&ecirc; das prote&iacute;nas de alguns alimentos causarem rea&ccedil;&otilde;es al&eacute;rgicas. Mas, segundo o Consenso Brasileiro sobre Alergia Alimentar, atualizado em 16 de Abril de 2018 pela&nbsp;<a href=\"http://www.sbp.com.br/\" target=\"_blank\">Sociedade Brasileira de Pediatria</a>&nbsp;(SBP) e pela&nbsp;<a href=\"http://www.asbai.org.br/\" target=\"_blank\">Associa&ccedil;&atilde;o Brasileira de Alergia e Imunologia</a>&nbsp;(Asbai):</p>\r\n\r\n<p><em>&ldquo;No Brasil, os dados sobre preval&ecirc;ncia de alergia alimentar s&atilde;o escassos e limitados a grupos populacionais, o que dificulta uma avalia&ccedil;&atilde;o mais pr&oacute;xima da realidade. Estudo realizado por gastroenterologistas pedi&aacute;tricos apontou como incid&ecirc;ncia de alergia no Pa&iacute;s as prote&iacute;nas do leite de vaca (2,2%), e a preval&ecirc;ncia de 5,4% em crian&ccedil;as entre os servi&ccedil;os avaliados&rdquo;</em></p>\r\n\r\n<p>Os&nbsp;<strong>alimentos al&eacute;rgicos</strong>, mesmo quando consumidos em pequenas quantidades, podem desencadear sinais e sintomas que variam de gravidade, chegando a causar risco de vida.</p>\r\n', '#ffffff', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `IdAvaliacao` int(11) NOT NULL,
  `Num_Star` int(11) NOT NULL,
  `IdProfissional` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Data_Avaliacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `IdComentario` int(11) NOT NULL,
  `Conteudo` text NOT NULL,
  `IdReceita` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Data_Postagem` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curtida`
--

CREATE TABLE `curtida` (
  `IdCurtida` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `IdReceita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `home`
--

CREATE TABLE `home` (
  `IdHome` int(11) NOT NULL,
  `Titulo` varchar(100) DEFAULT NULL,
  `Conteudo` text DEFAULT NULL,
  `Foto` text DEFAULT NULL,
  `Cor` varchar(10) DEFAULT NULL,
  `Section` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `home`
--

INSERT INTO `home` (`IdHome`, `Titulo`, `Conteudo`, `Foto`, `Cor`, `Section`, `IdUsuario`) VALUES
(1, 'Você sabe reconhecer os sintomas ?', '   Será que você está mesmo preparado para lidar com uma emergência quando ela acontecer? O próximo salvamento pode depender de você !', 'alergia.jpg652e9b26c87ff.jpeg', '#ffffff', 2, 1),
(2, 'Você conhece os profissionais nessa área ?', 'Você sabia que existem vários profissionais capacitados para lidar com situações de intolerâncias alimentares? Desde médicos alergistas, nutricionistas, até mesmo bombeiros e socorristas. Conhecer esses profissionais é fundamental para garantir a segurança e o bem-estar de todos.', NULL, '#34eb92', 3, 1),
(3, NULL, NULL, NULL, '#72eeb2', 0, 1),
(4, NULL, NULL, 'Nutricao-Clinica-Artere.jpg64d6d539e8013.jpeg652e9e9419fdb.jpeg', '#fffff', 1, 1),
(5, NULL, 'foodhelp@gmail.com', NULL, NULL, 51, 1),
(6, NULL, 'São Borja, Rs', NULL, NULL, 52, 1),
(7, NULL, '08:00 - 18:00', NULL, NULL, 53, 1),
(9, NULL, '55 xxxx-xxxx', NULL, NULL, 54, 1),
(10, 'Não sabe quais comidas comer ?', 'Você já se sentiu perdido na hora de escolher o que comer ?  Em nosso site, você encontrará dicas valiosas sobre como escolher os alimentos certos .', NULL, '#ffffff', 4, 1),
(11, NULL, NULL, 'alergia-alimentar-tudo-que-voce-precisa-saber.jpg64c9549b624f3.jpeg652ea0411f3f7.jpeg', NULL, 11, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `IdProfissional` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Profissao` varchar(100) NOT NULL,
  `Local_Atendimento` varchar(100) NOT NULL,
  `Horario_Atendimento` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefone` varchar(13) NOT NULL,
  `Biografia` text NOT NULL,
  `Precos` varchar(100) NOT NULL,
  `Foto` text NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Oculta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `profissionais`
--

INSERT INTO `profissionais` (`IdProfissional`, `Nome`, `Profissao`, `Local_Atendimento`, `Horario_Atendimento`, `Email`, `Telefone`, `Biografia`, `Precos`, `Foto`, `IdUsuario`, `Oculta`) VALUES
(1, 'Alexandre ', 'das', 'DSA Theory Test Centre, Winston Way, Ilford, Reino Unido', 'dsa', 'das@das', 'dsa', '<p>dsadsa</p>\r\n', 'dsas', 'cahorro.jpg6548e2ab76280.jpeg', 1, 2),
(2, 'das', 'SAD', 'Sri Lanka', 'DSA', 'dass@FAS', 'das', '<p>das</p>\r\n', 'DAS', 'PXL_20221111_150854719.jpg6549a6987947d.jpeg', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

CREATE TABLE `receitas` (
  `IdReceita` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Porcoes` varchar(45) NOT NULL,
  `Tempo` time NOT NULL,
  `Tipo_Alergia` varchar(100) NOT NULL,
  `Ingredientes` text NOT NULL,
  `Modo_Preparo` text NOT NULL,
  `Foto` text NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Oculta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`IdReceita`, `Nome`, `Porcoes`, `Tempo`, `Tipo_Alergia`, `Ingredientes`, `Modo_Preparo`, `Foto`, `IdUsuario`, `Oculta`) VALUES
(1, 'dsa', 'das', '12:11:00', 'das', '<p>das</p>\r\n', '<p>da</p>\r\n', 'images (5).jpg6549a649e85ad.jpeg', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nome` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Senha` text NOT NULL,
  `Nivel` int(11) NOT NULL,
  `Foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nome`, `Email`, `Senha`, `Nivel`, `Foto`) VALUES
(1, 'Alexandre Pires da Fonseca,', 'adm@gmail.com', '202cb962ac59075b964b07152d234b70', 3, 'shutterstock_632318627.jpg64d87161bf00a.jpeg652ebdada05d1.jpeg'),
(2, 'teste', 'teste@teste', '202cb962ac59075b964b07152d234b70', 2, 'cahorro.jpg654a1f92618d7.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alergia_alimentar`
--
ALTER TABLE `alergia_alimentar`
  ADD PRIMARY KEY (`IdAlergia_Alimentar`);

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`IdAvaliacao`),
  ADD KEY `fk_avaliacao_usuario` (`IdUsuario`),
  ADD KEY `fk_avaliacao_profissional` (`IdProfissional`);

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`IdComentario`),
  ADD KEY `fk_comentario_usuario` (`IdUsuario`),
  ADD KEY `fk_comentario_receita` (`IdReceita`);

--
-- Índices de tabela `curtida`
--
ALTER TABLE `curtida`
  ADD PRIMARY KEY (`IdCurtida`),
  ADD KEY `fk_curtida_usuario` (`IdUsuario`),
  ADD KEY `fk_curtida_receita` (`IdReceita`);

--
-- Índices de tabela `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`IdHome`),
  ADD KEY `fk_home_usuario` (`IdUsuario`);

--
-- Índices de tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`IdProfissional`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Telefone` (`Telefone`),
  ADD KEY `fk_profissional_usuario` (`IdUsuario`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`IdReceita`),
  ADD KEY `fk_receita_usuario` (`IdUsuario`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alergia_alimentar`
--
ALTER TABLE `alergia_alimentar`
  MODIFY `IdAlergia_Alimentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `IdAvaliacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IdComentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `curtida`
--
ALTER TABLE `curtida`
  MODIFY `IdCurtida` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `home`
--
ALTER TABLE `home`
  MODIFY `IdHome` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `IdProfissional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `IdReceita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `fk_avaliacao_profissional` FOREIGN KEY (`IdProfissional`) REFERENCES `profissionais` (`IdProfissional`),
  ADD CONSTRAINT `fk_avaliacao_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Restrições para tabelas `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `fk_comentario_receita` FOREIGN KEY (`IdReceita`) REFERENCES `receitas` (`IdReceita`),
  ADD CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Restrições para tabelas `curtida`
--
ALTER TABLE `curtida`
  ADD CONSTRAINT `fk_curtida_receita` FOREIGN KEY (`IdReceita`) REFERENCES `receitas` (`IdReceita`),
  ADD CONSTRAINT `fk_curtida_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Restrições para tabelas `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `fk_home_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Restrições para tabelas `profissionais`
--
ALTER TABLE `profissionais`
  ADD CONSTRAINT `fk_profissional_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `fk_receita_usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
