-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/11/2025 às 21:39
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
-- Banco de dados: `laravel`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `data_avaliacao` date NOT NULL,
  `pontuacao_total` int(11) DEFAULT NULL,
  `eventos_id` bigint(20) UNSIGNED NOT NULL,
  `classificacoes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `data_avaliacao`, `pontuacao_total`, `eventos_id`, `classificacoes_id`, `created_at`, `updated_at`) VALUES
(1, '2025-11-06', 51, 3, NULL, '2025-11-06 20:06:38', '2025-11-06 20:06:38'),
(2, '2025-11-06', 51, 3, NULL, '2025-11-06 20:07:16', '2025-11-06 20:07:16'),
(3, '2025-11-06', 0, 3, NULL, '2025-11-06 20:07:20', '2025-11-06 20:07:20'),
(4, '2025-11-06', 0, 3, NULL, '2025-11-06 20:07:26', '2025-11-06 20:07:26'),
(5, '2025-11-06', 0, 3, NULL, '2025-11-06 20:07:41', '2025-11-06 20:07:41'),
(6, '2025-11-06', 0, 3, NULL, '2025-11-06 21:08:23', '2025-11-06 21:08:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `classificacoes`
--

CREATE TABLE `classificacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_class` varchar(100) NOT NULL,
  `intervalo_min` int(11) NOT NULL,
  `intervalo_max` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `criterios`
--

CREATE TABLE `criterios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `tipo_riscos_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `criterios`
--

INSERT INTO `criterios` (`id`, `descricao`, `peso`, `tipo_riscos_id`, `created_at`, `updated_at`) VALUES
(3, 'doença', 5.00, 3, '2025-11-06 19:15:49', '2025-11-06 19:15:49'),
(4, 'teste', 10.00, 2, '2025-11-06 19:48:11', '2025-11-06 19:48:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(500) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `local` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `eventos`
--

INSERT INTO `eventos` (`id`, `user_id`, `nome`, `data_inicio`, `data_fim`, `local`, `created_at`, `updated_at`) VALUES
(2, 2, 'teste', '2025-11-04 13:39:00', '2025-11-28 13:39:00', 'teste', '2025-11-06 19:40:01', '2025-11-06 19:40:01'),
(3, 1, 'teste', '0012-12-12 04:00:00', '0013-12-12 03:00:00', 'teste', '2025-11-06 19:40:41', '2025-11-06 19:41:34');

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
(5, '2025_11_06_035922_create_eventos_table', 1),
(6, '2025_11_06_035932_create_classificacaos_table', 1),
(7, '2025_11_06_035941_create_tipo_riscos_table', 1),
(8, '2025_11_06_035949_create_criterios_table', 1),
(9, '2025_11_06_040000_create_tipo_criterios_table', 1),
(10, '2025_11_06_040015_create_avaliacaos_table', 1),
(11, '2025_11_06_040023_create_resposta_avaliacaos_table', 1),
(12, '2025_11_06_040031_create_plano_mitigacaos_table', 1),
(13, '2025_11_06_040048_add_role_to_users_table', 1);

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
-- Estrutura para tabela `planos_mitigacao`
--

CREATE TABLE `planos_mitigacao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` text DEFAULT NULL,
  `data_criacao` date NOT NULL,
  `avaliacoes_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `respostas_avaliacao`
--

CREATE TABLE `respostas_avaliacao` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avaliacoes_id` bigint(20) UNSIGNED NOT NULL,
  `tipo_criterios_id` bigint(20) UNSIGNED NOT NULL,
  `valor_atribuido` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `respostas_avaliacao`
--

INSERT INTO `respostas_avaliacao` (`id`, `avaliacoes_id`, `tipo_criterios_id`, `valor_atribuido`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, '2025-11-06 20:06:38', '2025-11-06 20:06:38'),
(2, 1, 4, 1, '2025-11-06 20:06:38', '2025-11-06 20:06:38'),
(3, 2, 1, 50, '2025-11-06 20:07:16', '2025-11-06 20:07:16'),
(4, 2, 4, 1, '2025-11-06 20:07:16', '2025-11-06 20:07:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_criterios`
--

CREATE TABLE `tipo_criterios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor` int(11) NOT NULL,
  `criterios_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tipo_criterios`
--

INSERT INTO `tipo_criterios` (`id`, `descricao`, `valor`, `criterios_id`, `created_at`, `updated_at`) VALUES
(1, 'piolho', 50, 3, '2025-11-06 19:16:10', '2025-11-06 19:17:45'),
(2, 'raiva', 100, 3, '2025-11-06 19:17:18', '2025-11-06 19:17:18'),
(4, 'testado 1', 1, 4, '2025-11-06 19:48:28', '2025-11-06 19:48:28'),
(5, 'testado 2', 2, 4, '2025-11-06 19:48:37', '2025-11-06 19:48:37'),
(6, 'praga', 999, 3, '2025-11-06 19:49:35', '2025-11-06 19:49:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_riscos`
--

CREATE TABLE `tipo_riscos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `risco` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tipo_riscos`
--

INSERT INTO `tipo_riscos` (`id`, `risco`, `created_at`, `updated_at`) VALUES
(2, 'teste tipo do risco', '2025-11-06 18:01:06', '2025-11-06 18:01:06'),
(3, 'Biologico', '2025-11-06 19:15:35', '2025-11-06 19:15:35');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'organizador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Eduardo', 'eltakaya@hotmail.com', NULL, '$2y$10$pcotAzimseKP9LFAkd.8BuAdV1JkxfVxCpCj89lQmWAdRqcwe0sgK', '6t5oizzq9JXU5iLb9MQ80RRxBBk8EhYY9aExuaFHHNZfjWYeebHbHFivYeM0', '2025-11-06 15:39:17', '2025-11-06 15:39:17', 'gestor'),
(2, 'teste', 'teste@hotmail.com', NULL, '$2y$10$V4PIcL.kGqWaZI4/nBfOKOwsO9JmfVCVFCsIXS5hXJNGwSOtLWsK.', NULL, '2025-11-06 19:39:40', '2025-11-06 19:39:40', 'organizador');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `avaliacoes_eventos_id_foreign` (`eventos_id`),
  ADD KEY `avaliacoes_classificacoes_id_foreign` (`classificacoes_id`);

--
-- Índices de tabela `classificacoes`
--
ALTER TABLE `classificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `criterios`
--
ALTER TABLE `criterios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criterios_tipo_riscos_id_foreign` (`tipo_riscos_id`);

--
-- Índices de tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eventos_user_id_foreign` (`user_id`);

--
-- Índices de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Índices de tabela `planos_mitigacao`
--
ALTER TABLE `planos_mitigacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `planos_mitigacao_avaliacoes_id_foreign` (`avaliacoes_id`);

--
-- Índices de tabela `respostas_avaliacao`
--
ALTER TABLE `respostas_avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `respostas_avaliacao_avaliacoes_id_foreign` (`avaliacoes_id`),
  ADD KEY `respostas_avaliacao_tipo_criterios_id_foreign` (`tipo_criterios_id`);

--
-- Índices de tabela `tipo_criterios`
--
ALTER TABLE `tipo_criterios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_criterios_criterios_id_foreign` (`criterios_id`);

--
-- Índices de tabela `tipo_riscos`
--
ALTER TABLE `tipo_riscos`
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
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `classificacoes`
--
ALTER TABLE `classificacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `criterios`
--
ALTER TABLE `criterios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de tabela `planos_mitigacao`
--
ALTER TABLE `planos_mitigacao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `respostas_avaliacao`
--
ALTER TABLE `respostas_avaliacao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tipo_criterios`
--
ALTER TABLE `tipo_criterios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tipo_riscos`
--
ALTER TABLE `tipo_riscos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_classificacoes_id_foreign` FOREIGN KEY (`classificacoes_id`) REFERENCES `classificacoes` (`id`),
  ADD CONSTRAINT `avaliacoes_eventos_id_foreign` FOREIGN KEY (`eventos_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `criterios`
--
ALTER TABLE `criterios`
  ADD CONSTRAINT `criterios_tipo_riscos_id_foreign` FOREIGN KEY (`tipo_riscos_id`) REFERENCES `tipo_riscos` (`id`);

--
-- Restrições para tabelas `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `planos_mitigacao`
--
ALTER TABLE `planos_mitigacao`
  ADD CONSTRAINT `planos_mitigacao_avaliacoes_id_foreign` FOREIGN KEY (`avaliacoes_id`) REFERENCES `avaliacoes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `respostas_avaliacao`
--
ALTER TABLE `respostas_avaliacao`
  ADD CONSTRAINT `respostas_avaliacao_avaliacoes_id_foreign` FOREIGN KEY (`avaliacoes_id`) REFERENCES `avaliacoes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `respostas_avaliacao_tipo_criterios_id_foreign` FOREIGN KEY (`tipo_criterios_id`) REFERENCES `tipo_criterios` (`id`);

--
-- Restrições para tabelas `tipo_criterios`
--
ALTER TABLE `tipo_criterios`
  ADD CONSTRAINT `tipo_criterios_criterios_id_foreign` FOREIGN KEY (`criterios_id`) REFERENCES `criterios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
