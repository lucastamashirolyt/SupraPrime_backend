-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 17:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `auth_app`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pendente','concluido','cancelado') DEFAULT 'pendente',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `imagem`, `created_at`) VALUES
(1, 'Bcaa + Creatina 2', 260.00, 'img/whey.jpg', '2024-11-15 23:14:52'),
(2, 'Whey', 150.00, 'img/wheyp.png', '2024-11-16 02:11:15'),
(3, 'Pré-Treino Diabo Verde', 100.00, 'img/pre-treino.png', '2024-11-16 02:11:15'),
(4, 'Whey', 80.00, 'img/whey1.png', '2024-11-16 02:11:15'),
(5, 'Isolate', 120.00, 'img/isolate.png', '2024-11-16 02:11:15'),
(6, 'Creatina', 80.00, 'img/creatina2.png', '2024-11-16 02:11:15'),
(7, 'Creatina', 75.00, 'img/CREATINA.png', '2024-11-16 02:11:15'),
(8, 'Whey + Bcaa + Creatina', 180.00, 'img/Max-TitaniumBaunilha.png', '2024-11-16 02:11:15'),
(9, 'Whey', 130.00, 'img/protein.jpg', '2024-11-16 02:11:15'),
(10, 'Kit : Mass Titanium 3Kg + Creatina 100G + Bcaa 60 Caps - Max TitaniumBaunilha', 50.00, 'img/Max-TitaniumBaunilha.png', '2024-11-16 02:11:15'),
(11, 'Creatina - Universal (200g)', 35.00, 'img/creatina1.png', '2024-11-16 02:11:15'),
(12, 'Creatina Pura Probiotica 100g', 15.00, 'img/CREATINA.png', '2024-11-16 02:11:15'),
(13, 'Whey Protein Gold Standard 100% 907g', 50.00, 'img/wheyp.png', '2024-11-16 02:11:15'),
(14, 'Nutri Whey Protein', 50.00, 'img/protein.jpg', '2024-11-16 02:11:15'),
(15, 'Isolate Protein Mix 1,8kg', 50.00, 'img/isolate.png', '2024-11-16 02:11:15'),
(16, 'WHEY PROTEIN ISO PROTEIN BLEND 2kg', 80.00, 'img/whey1.png', '2024-11-16 02:11:15'),
(17, 'Pré Treino Prohibido Hardcore Pre-Workout, 3VS Nutrition', 80.00, 'img/11.jpg', '2024-11-16 02:11:15'),
(18, 'Pré-treino Diabo Verde', 80.00, 'img/pre-treino.png', '2024-11-16 02:11:15'),
(19, 'Hand Grip Regulável Hidrolight', 20.00, 'img/hand_grip.png', '2024-11-16 02:11:15'),
(20, 'Kettlebell Emborrachado 26kg - Peso Academia Exercit Esportes', 439.40, 'img/peso.png', '2024-11-16 02:11:15'),
(21, 'Dumbbell Halter de Ferro 1kg', 15.00, 'img/halter.webp', '2024-11-16 02:11:15'),
(22, '2 Halteres Rosca + 24kg D Anilhas Sport 31mm - Peso Academia', 830.00, 'img/halteres.webp', '2024-11-16 02:11:15'),
(23, 'Kit Halteres De Anilhas E Barras Fitness - 18 Peças', 193.45, 'img/halter1.webp', '2024-11-16 02:11:15'),
(24, 'POLIMET Anilha de Ferro Pintada, Unissex Adulto', 32.19, 'img/anilha.jpg', '2024-11-16 02:11:15'),
(25, 'Cinturão de Musculação Muvin – Tamanho Ajustável', 79.90, 'img/cinturao.jpg', '2024-11-16 02:11:15'),
(26, 'Par Caneleira Tornozeleira de Peso Punch', 21.78, 'img/caneleira.jpg', '2024-11-16 02:11:15'),
(27, 'Bola Suiça Premium para Pilates', 49.90, 'img/bola.jpg', '2024-11-16 02:11:15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `registros_clientes`
--

CREATE TABLE `registros_clientes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data_compra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `registros_clientes`
--

INSERT INTO `registros_clientes` (`id`, `user_id`, `produto_id`, `quantidade`, `data_compra`) VALUES
(1, 2, 1, 1, '2024-11-16 03:55:32'),
(2, 4, 3, 1, '2024-11-16 04:06:08'),
(3, 4, 4, 1, '2024-11-16 04:06:08'),
(4, 2, 1, 1, '2024-11-18 14:25:46'),
(5, 2, 1, 1, '2024-11-21 12:03:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `genero` enum('masculino','feminino','outro') DEFAULT NULL,
  `endereco1` varchar(255) DEFAULT NULL,
  `endereco2` varchar(255) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `regiao` varchar(2) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `email`, `senha`, `telefone`, `data_nascimento`, `genero`, `endereco1`, `endereco2`, `pais`, `cidade`, `regiao`, `cep`, `role`, `created_at`) VALUES
(1, 'ADMIN', 'admin@admin.com', '$2y$10$o5fTH/f44Tw2sPP.Kk0se.H.I5g2AiK9LJfpmxqAFEF80GDnoMMz6', '1932720909', '2001-06-09', 'masculino', 'dsadad', 'adada', 'Brasil', 'campinas', 'SP', '13031-650', 'admin', '2024-11-15 23:11:06'),
(2, 'lucas yuji', 'lucas@lucas.com', '$2y$10$LqdvfqR.1oi/b2ZxGHTBL.whW7bEVAgAbqFvMutw1owjIzy7XMsSy', '19912345678', '2001-06-09', 'masculino', 'dsadad', 'adada', 'Brasil', 'campinas', 'SP', '13031-650', 'user', '2024-11-16 03:55:01'),
(3, 'André Marques', 'andre@andre.com', '$2y$10$l4FDaJk76Q..eAYqkwfERu63uDeAiF6KrRe7Pe.e0aypLOHYU0U6q', '1932720909', '2024-06-09', 'masculino', 'dsadad', 'adada', 'Brasil', 'campinas', 'SP', '13031-650', 'user', '2024-11-16 04:01:22'),
(4, 'Gabriel Silveira', 'gabriel@gabriel.com', '$2y$10$9FWxHyvJ0bQiXEz/DnTLZulAEYJ.6KZJYBPLxG1bKRFjTgnotmbbC', '19932720909', '2001-06-09', 'masculino', 'dsadad', 'adada', 'País', 'campinas', 'Re', '13031-650', 'user', '2024-11-16 04:04:01'),
(5, 'Gustavo Pascoal', 'gustavo@gustavo.com', '$2y$10$7zLw84RakcuoSFHN5X9cYeRuFUzgbWu3.wCbYCWomf8tezWp6YmBi', '199327290909', '2001-06-09', 'masculino', 'dsadad', 'adada', 'Brasil', 'campinas', 'SP', '13031-650', 'user', '2024-11-16 04:06:50');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `registros_clientes`
--
ALTER TABLE `registros_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `registros_clientes`
--
ALTER TABLE `registros_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `itens_pedido_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restrições para tabelas `registros_clientes`
--
ALTER TABLE `registros_clientes`
  ADD CONSTRAINT `registros_clientes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `registros_clientes_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
