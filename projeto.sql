-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3309
-- Tempo de geração: 11/06/2025 às 22:54
-- Versão do servidor: 8.0.41
-- Versão do PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `categorias_id` int NOT NULL,
  `categorias_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categorias`
--

INSERT INTO `categorias` (`categorias_id`, `categorias_nome`) VALUES
(8, 'Pizzas'),
(9, 'Refrigerante'),
(10, 'Hamburgues');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE `cidades` (
  `cidades_id` int NOT NULL,
  `cidades_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cidades_uf` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cidades`
--

INSERT INTO `cidades` (`cidades_id`, `cidades_nome`, `cidades_uf`) VALUES
(4, 'Ceress', 'GO'),
(6, 'Brasilia', 'DF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `clientes_id` int NOT NULL,
  `clientes_data_cadastro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `clientes_usuarios_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`clientes_id`, `clientes_data_cadastro`, `clientes_usuarios_id`) VALUES
(8, '04/04/2025', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `enderecos_id` int NOT NULL,
  `enderecos_cep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enderecos_logradouro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enderecos_numero` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enderecos_complemento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enderecos_bairro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `enderecos_cidades_id` int NOT NULL,
  `enderecos_usuarios_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `entregas`
--

CREATE TABLE `entregas` (
  `entregas_id` int NOT NULL,
  `entregas_data_saida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entregas_data_entrega` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entregas_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entregas_observacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `entregas_vendas_id` int NOT NULL,
  `entregas_funcionarios_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `entregas`
--

INSERT INTO `entregas` (`entregas_id`, `entregas_data_saida`, `entregas_data_entrega`, `entregas_status`, `entregas_observacao`, `entregas_vendas_id`, `entregas_funcionarios_id`) VALUES
(3, '04/04/2025', '', 'Entregue', 'Não', 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estoques`
--

CREATE TABLE `estoques` (
  `estoques_id` int NOT NULL,
  `estoques_quantidade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estoques_data_compra` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estoques_data_validade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estoques_lote` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `estoques_produtos_id` int NOT NULL,
  `estoques_funcionarios_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `estoques`
--

INSERT INTO `estoques` (`estoques_id`, `estoques_quantidade`, `estoques_data_compra`, `estoques_data_validade`, `estoques_lote`, `estoques_produtos_id`, `estoques_funcionarios_id`) VALUES
(2, '10', '04/04/2025', '05/05/2025', '1', 5, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `forma_pagamentos`
--

CREATE TABLE `forma_pagamentos` (
  `forma_pagamentos_id` int NOT NULL,
  `forma_pagamentos_descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `forma_pagamentos`
--

INSERT INTO `forma_pagamentos` (`forma_pagamentos_id`, `forma_pagamentos_descricao`) VALUES
(4, 'Pix'),
(5, 'Credito');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `funcionarios_id` int NOT NULL,
  `funcionarios_data_admissao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `funcionarios_contrato` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `funcionarios_salario` float NOT NULL,
  `funcionarios_cargo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `funcionarios_usuarios_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`funcionarios_id`, `funcionarios_data_admissao`, `funcionarios_contrato`, `funcionarios_salario`, `funcionarios_cargo`, `funcionarios_usuarios_id`) VALUES
(3, '04/04/2025', 'clt', 0, 'Caixa', 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `imgprodutos`
--

CREATE TABLE `imgprodutos` (
  `imgprodutos_id` int NOT NULL,
  `imgprodutos_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgprodutos_descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imgprodutos_produtos_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imgprodutos`
--

INSERT INTO `imgprodutos` (`imgprodutos_id`, `imgprodutos_link`, `imgprodutos_descricao`, `imgprodutos_produtos_id`) VALUES
(4, 'uploads/20250604/1749079667_96aad34389849c072e38.jpg', 'Imagem Pizzas', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `pedidos_id` int NOT NULL,
  `pedidos_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pedidos_produtos_id` int NOT NULL,
  `pedidos_funcionarios_id` int NOT NULL,
  `pedidos_clientes_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`pedidos_id`, `pedidos_data`, `pedidos_produtos_id`, `pedidos_funcionarios_id`, `pedidos_clientes_id`) VALUES
(3, '22/05/2024', 5, 3, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `produtos_id` int NOT NULL,
  `produtos_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produtos_descricao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `produtos_preco_custo` float NOT NULL,
  `produtos_preco_venda` float NOT NULL,
  `produtos_categorias_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`produtos_id`, `produtos_nome`, `produtos_descricao`, `produtos_preco_custo`, `produtos_preco_venda`, `produtos_categorias_id`) VALUES
(5, 'Pizza de Calabreza', 'Calabreza', 50, 75, 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuarios_id` int NOT NULL,
  `usuarios_nome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_sobrenome` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_cpf` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_senha` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_data_nasc` date NOT NULL,
  `usuarios_fone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_nivel` int NOT NULL,
  `usuarios_data_cadastro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`usuarios_id`, `usuarios_nome`, `usuarios_sobrenome`, `usuarios_cpf`, `usuarios_email`, `usuarios_senha`, `usuarios_data_nasc`, `usuarios_fone`, `usuarios_nivel`, `usuarios_data_cadastro`) VALUES
(1, 'Admin', '', '999.999.999-99', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '1981-12-03', '(62)99999-999', 1, '2025-04-23 15:52:40'),
(4, 'Isaque ', 'Romualdo', '11111111111', 'isaque@isaque.com', 'e10adc3949ba59abbe56e057f20f883e', '2004-03-17', '619998263948', 0, '2025-06-04 22:59:46'),
(5, 'Cliente', 'Clinente', '22222222222', 'cliente@cliente', 'e10adc3949ba59abbe56e057f20f883e', '2004-02-18', '6454884', 0, '2025-06-04 23:42:14'),
(6, 'Supervisor', 'supervisor', '333.333.333-33', 'supervisor@supervisor', 'e10adc3949ba59abbe56e057f20f883e', '2000-03-17', '655585', 0, '2025-06-04 23:43:18');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `vendas_id` int NOT NULL,
  `vendas_quantidade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vendas_data` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vendas_forma_pagamentos_id` int NOT NULL,
  `vendas_funcionarios_id` int NOT NULL,
  `vendas_clientes_id` int NOT NULL,
  `vendas_produtos_id` int NOT NULL,
  `vendas_pedidos_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`vendas_id`, `vendas_quantidade`, `vendas_data`, `vendas_forma_pagamentos_id`, `vendas_funcionarios_id`, `vendas_clientes_id`, `vendas_produtos_id`, `vendas_pedidos_id`) VALUES
(2, '4', '30/08/2025', 4, 3, 8, 5, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categorias_id`);

--
-- Índices de tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`cidades_id`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clientes_id`),
  ADD KEY `usuarios_clientes` (`clientes_usuarios_id`);

--
-- Índices de tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`enderecos_id`),
  ADD KEY `cidades_enderecos` (`enderecos_cidades_id`),
  ADD KEY `usuarios_enderecos` (`enderecos_usuarios_id`);

--
-- Índices de tabela `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`entregas_id`),
  ADD KEY `vendas_entregas` (`entregas_vendas_id`),
  ADD KEY `funcionarios_entregas` (`entregas_funcionarios_id`);

--
-- Índices de tabela `estoques`
--
ALTER TABLE `estoques`
  ADD PRIMARY KEY (`estoques_id`),
  ADD KEY `produtos_estoques` (`estoques_produtos_id`),
  ADD KEY `funcionarios_estoques` (`estoques_funcionarios_id`);

--
-- Índices de tabela `forma_pagamentos`
--
ALTER TABLE `forma_pagamentos`
  ADD PRIMARY KEY (`forma_pagamentos_id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`funcionarios_id`),
  ADD KEY `usuarios_funcionarios` (`funcionarios_usuarios_id`);

--
-- Índices de tabela `imgprodutos`
--
ALTER TABLE `imgprodutos`
  ADD PRIMARY KEY (`imgprodutos_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`pedidos_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`produtos_id`),
  ADD KEY `categorias_produtos` (`produtos_categorias_id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuarios_id`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`vendas_id`),
  ADD KEY `formapagamentos_vendas` (`vendas_forma_pagamentos_id`),
  ADD KEY `funcionarios_vendas` (`vendas_funcionarios_id`),
  ADD KEY `clientes_vendas` (`vendas_clientes_id`),
  ADD KEY `produtos_vendas` (`vendas_produtos_id`),
  ADD KEY `pedidos_vendas` (`vendas_pedidos_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categorias_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `cidades_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clientes_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `enderecos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `entregas`
--
ALTER TABLE `entregas`
  MODIFY `entregas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estoques`
--
ALTER TABLE `estoques`
  MODIFY `estoques_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `forma_pagamentos`
--
ALTER TABLE `forma_pagamentos`
  MODIFY `forma_pagamentos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `funcionarios_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `imgprodutos`
--
ALTER TABLE `imgprodutos`
  MODIFY `imgprodutos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `pedidos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `produtos_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuarios_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `vendas_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `usuarios_clientes` FOREIGN KEY (`clientes_usuarios_id`) REFERENCES `usuarios` (`usuarios_id`);

--
-- Restrições para tabelas `enderecos`
--
ALTER TABLE `enderecos`
  ADD CONSTRAINT `cidades_enderecos` FOREIGN KEY (`enderecos_cidades_id`) REFERENCES `cidades` (`cidades_id`),
  ADD CONSTRAINT `usuarios_enderecos` FOREIGN KEY (`enderecos_usuarios_id`) REFERENCES `usuarios` (`usuarios_id`);

--
-- Restrições para tabelas `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `funcionarios_entregas` FOREIGN KEY (`entregas_funcionarios_id`) REFERENCES `funcionarios` (`funcionarios_id`),
  ADD CONSTRAINT `vendas_entregas` FOREIGN KEY (`entregas_vendas_id`) REFERENCES `vendas` (`vendas_id`);

--
-- Restrições para tabelas `estoques`
--
ALTER TABLE `estoques`
  ADD CONSTRAINT `funcionarios_estoques` FOREIGN KEY (`estoques_funcionarios_id`) REFERENCES `funcionarios` (`funcionarios_id`),
  ADD CONSTRAINT `produtos_estoques` FOREIGN KEY (`estoques_produtos_id`) REFERENCES `produtos` (`produtos_id`);

--
-- Restrições para tabelas `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD CONSTRAINT `usuarios_funcionarios` FOREIGN KEY (`funcionarios_usuarios_id`) REFERENCES `usuarios` (`usuarios_id`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `categorias_produtos` FOREIGN KEY (`produtos_categorias_id`) REFERENCES `categorias` (`categorias_id`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `clientes_vendas` FOREIGN KEY (`vendas_clientes_id`) REFERENCES `clientes` (`clientes_id`),
  ADD CONSTRAINT `formapagamentos_vendas` FOREIGN KEY (`vendas_forma_pagamentos_id`) REFERENCES `forma_pagamentos` (`forma_pagamentos_id`),
  ADD CONSTRAINT `funcionarios_vendas` FOREIGN KEY (`vendas_funcionarios_id`) REFERENCES `funcionarios` (`funcionarios_id`),
  ADD CONSTRAINT `pedidos_vendas` FOREIGN KEY (`vendas_pedidos_id`) REFERENCES `pedidos` (`pedidos_id`),
  ADD CONSTRAINT `produtos_vendas` FOREIGN KEY (`vendas_produtos_id`) REFERENCES `produtos` (`produtos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
