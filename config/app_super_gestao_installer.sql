-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/07/2025 às 18:44
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_super_gestao_installer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `filiais`
--

CREATE TABLE `filiais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `site` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `uf` varchar(5) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id`, `name`, `site`, `created_at`, `updated_at`, `email`, `uf`, `deleted_at`) VALUES
(1, 'Dinélia', 'www.dinelia.com.ao', '2025-07-29 09:01:05', '2025-07-29 09:01:05', 'dinela@g.com', 'BG', NULL),
(2, 'Malamu', 'www.malamu.com.ao', '2025-07-29 09:01:05', '2025-07-29 09:01:05', 'malamu@gmail.com', 'IB', NULL),
(3, 'Dinélia', 'www.dinelia.com.ao', '2025-07-29 09:02:01', '2025-07-29 09:02:01', 'dinela@g.com', 'BG', NULL),
(4, 'Malamu', 'www.malamu.com.ao', '2025-07-29 09:02:01', '2025-07-29 09:02:01', 'malamu@gmail.com', 'IB', NULL),
(5, 'Tupuca', 'www.tupuca.com.ao', NULL, NULL, 'tupuca@gmail.com', 'IB', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_07_15_142722_create_site_contatos_table', 1),
(6, '2025_07_16_054733_create_fornecedores_table', 1),
(7, '2025_07_16_061930_alter_fornecedores_colunas', 1),
(8, '2025_07_16_072558_create_produtos_table', 1),
(9, '2025_07_16_081158_create_produtos_detalhes', 1),
(10, '2025_07_16_083326_create_unidades_table', 1),
(11, '2025_07_16_091157_create_ajuste_produtos_filiais', 1),
(12, '2025_07_17_085441_alter_fonecedor_coluna_after', 1),
(13, '2025_07_29_072741_alter_fornecedores_softdelete', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `weight` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unidade_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos_detalhes`
--

CREATE TABLE `produtos_detalhes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `length` double(8,2) NOT NULL,
  `width` double(8,2) NOT NULL,
  `height` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unidade_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto_filiais`
--

CREATE TABLE `produto_filiais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filial_id` bigint(20) UNSIGNED NOT NULL,
  `produto_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.01,
  `min_stock` int(11) NOT NULL DEFAULT 1,
  `max_stock` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `site_contatos`
--

CREATE TABLE `site_contatos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_reason` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `site_contatos`
--

INSERT INTO `site_contatos` (`id`, `created_at`, `updated_at`, `name`, `phone`, `email`, `contact_reason`, `message`) VALUES
(1, '2025-07-29 14:51:55', '2025-07-29 14:51:55', 'Uana Tech', '+244 934691341', 'uana.tech@gmail.com', 2, 'Solicito o desenvolvimento do meu site'),
(2, '2025-07-29 14:51:55', '2025-07-29 14:51:55', 'Malamba Tech', '+244 951398685', 'malamba.tech@gmail.com', 1, 'Rede muito lenta'),
(3, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Zella Davis Jr.', '888.956.9211', 'nstark@example.net', 2, 'Dolore velit quod et qui nulla. Consequatur repudiandae et sed sint qui dicta. Voluptate qui impedit eveniet inventore molestiae in aliquid.'),
(4, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Kadin Parker', '866-761-7438', 'xjerde@example.org', 1, 'Praesentium voluptates omnis amet ex id. Non animi magni sequi rem sit. Quia id vero voluptates sunt. Architecto repellat dolore repellat quo atque tempore.'),
(5, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Evie Morissette', '844-507-0709', 'janae.hoppe@example.net', 1, 'Minima enim reprehenderit excepturi dolorem. Officiis suscipit aut non iste ut exercitationem est. Aliquid ut fuga accusamus. Est ut eos et ea sint.'),
(6, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Cristina Pfannerstill', '888.893.0814', 'vanessa45@example.org', 2, 'Rerum blanditiis qui rerum vel voluptates. Officiis eos qui sunt eveniet fugiat odio iure. Est eius et et corrupti quos voluptatum vel dolores.'),
(7, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Miss Roma Hintz III', '1-800-456-9828', 'jorge14@example.com', 2, 'Occaecati suscipit modi neque omnis. Omnis praesentium eos non optio. Exercitationem sunt pariatur nulla. Aut eius sapiente debitis praesentium eligendi.'),
(8, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Miss Makayla Gorczany DVM', '(866) 638-3079', 'breana37@example.net', 1, 'Voluptatum autem sit eius. Reiciendis quibusdam ex sequi in reprehenderit. Repudiandae consequatur repellendus tenetur cumque quas ipsum enim. Dolorem nobis dolor id est illo.'),
(9, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Leif Block', '1-855-262-5253', 'elenora69@example.org', 2, 'Et et nostrum nobis culpa aut. Itaque similique dolores nisi molestiae velit iure. Est sint magni quas.'),
(10, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Obie Stamm', '800.950.9692', 'howell.oberbrunner@example.com', 1, 'Porro id possimus accusamus commodi occaecati. Quo pariatur accusamus voluptate praesentium iste. Ut laboriosam quia magnam quo quaerat qui ex. Qui aut distinctio asperiores saepe a dicta nam.'),
(11, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Dr. Fredy Denesik II', '855.346.2836', 'karelle53@example.org', 2, 'Sunt maxime enim dolor labore autem. Enim quia id dolore molestiae. Itaque ut numquam nesciunt et. Expedita dolorem nihil qui praesentium dolores.'),
(12, '2025-07-29 15:28:13', '2025-07-29 15:28:13', 'Abdullah Mante', '1-844-767-1432', 'kyle.hackett@example.org', 1, 'Laudantium sint sunt qui magni molestiae architecto quae. Qui aliquid unde magnam adipisci et nisi. Ut repudiandae assumenda eos dicta nemo voluptate rerum.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidades`
--

CREATE TABLE `unidades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unidades` varchar(5) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices de tabela `filiais`
--
ALTER TABLE `filiais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Índices de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produtos_unidade_id_foreign` (`unidade_id`);

--
-- Índices de tabela `produtos_detalhes`
--
ALTER TABLE `produtos_detalhes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produtos_detalhes_produto_id_unique` (`produto_id`),
  ADD KEY `produtos_detalhes_unidade_id_foreign` (`unidade_id`);

--
-- Índices de tabela `produto_filiais`
--
ALTER TABLE `produto_filiais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_filiais_filial_id_foreign` (`filial_id`),
  ADD KEY `produto_filiais_produto_id_foreign` (`produto_id`);

--
-- Índices de tabela `site_contatos`
--
ALTER TABLE `site_contatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `unidades`
--
ALTER TABLE `unidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `filiais`
--
ALTER TABLE `filiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos_detalhes`
--
ALTER TABLE `produtos_detalhes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produto_filiais`
--
ALTER TABLE `produto_filiais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `site_contatos`
--
ALTER TABLE `site_contatos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_unidade_id_foreign` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`);

--
-- Restrições para tabelas `produtos_detalhes`
--
ALTER TABLE `produtos_detalhes`
  ADD CONSTRAINT `produtos_detalhes_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`),
  ADD CONSTRAINT `produtos_detalhes_unidade_id_foreign` FOREIGN KEY (`unidade_id`) REFERENCES `unidades` (`id`);

--
-- Restrições para tabelas `produto_filiais`
--
ALTER TABLE `produto_filiais`
  ADD CONSTRAINT `produto_filiais_filial_id_foreign` FOREIGN KEY (`filial_id`) REFERENCES `filiais` (`id`),
  ADD CONSTRAINT `produto_filiais_produto_id_foreign` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
