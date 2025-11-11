-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11/11/2025 às 23:48
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
(14, '2025-11-07', 59, 7, NULL, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(15, '2025-11-07', 59, 8, NULL, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(16, '2025-11-07', 87, 7, 6, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(17, '2025-11-07', 77, 8, 6, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(20, '2025-11-11', 83, 11, 6, '2025-11-11 05:03:16', '2025-11-11 05:03:16');

-- --------------------------------------------------------

--
-- Estrutura para tabela `classificacoes`
--

CREATE TABLE `classificacoes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_class` varchar(100) NOT NULL,
  `intervalo_min` int(11) NOT NULL,
  `intervalo_max` int(11) NOT NULL,
  `acoes_recomendadas` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `classificacoes`
--

INSERT INTO `classificacoes` (`id`, `tipo_class`, `intervalo_min`, `intervalo_max`, `acoes_recomendadas`, `created_at`, `updated_at`) VALUES
(4, 'RISCO MUITO BAIXO - GRAU 1', 35, 54, 'Probabilidade muita baixa de ocorrer, ocasionando impactos de fácil controle, sem geração de transtornos ao público', '2025-11-07 19:39:40', '2025-11-07 19:39:40'),
(5, 'RISCO BAIXO - GRAU 2', 55, 73, 'Baixa probabilidade de ocorrer, ocasionando impactos de fácil controle, com baixa geração de transtornos ao público', '2025-11-07 19:40:07', '2025-11-07 19:40:07'),
(6, 'RISCO MÉDIO - GRAU 3', 74, 92, 'Probabilidade considerável de ocorrer, ocasionando impactos que necessitam de ações estratégias para controle, com geração de transtornos ao público', '2025-11-07 20:49:32', '2025-11-07 20:49:32'),
(7, 'RISCO ALTO - GRAU 4', 93, 111, 'Alta probabilidade de ocorrer, ocasionando grandes impactos no evento, com necessidade de atuação e controle imediato, gerando muitos transtornos ao público', '2025-11-07 20:49:57', '2025-11-07 20:49:57'),
(8, 'RISCO MUITO ALTO - GRAU 5', 112, 130, 'A probabilidade de ocorrer é altíssima, por isso, carece de planejamento para gestão e monitoramento durante o evento. Se efetivado, causará transtornos graves ao público', '2025-11-07 20:50:22', '2025-11-07 20:50:22');

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
(5, 'Publico', NULL, 5, '2025-11-07 19:16:32', '2025-11-07 19:31:08'),
(6, 'Período', NULL, 5, '2025-11-07 19:31:02', '2025-11-07 19:31:31'),
(7, 'Duração', NULL, 5, '2025-11-07 19:31:20', '2025-11-07 19:31:20'),
(8, 'Faixa etária', NULL, 5, '2025-11-07 19:31:51', '2025-11-07 19:31:51'),
(9, 'Porte', NULL, 5, '2025-11-07 19:32:06', '2025-11-07 19:32:06'),
(10, 'Acesso', NULL, 5, '2025-11-07 19:32:14', '2025-11-07 19:32:14'),
(11, 'Acomodação', NULL, 5, '2025-11-07 19:32:24', '2025-11-07 19:32:24'),
(12, 'Bebidas alcoólicas', NULL, 5, '2025-11-07 19:32:38', '2025-11-07 19:32:38'),
(13, 'Drogas Ilícitas', NULL, 5, '2025-11-07 19:32:57', '2025-11-07 19:32:57'),
(14, 'Fase do plano de flexibilização', NULL, 5, '2025-11-07 19:33:18', '2025-11-07 19:33:18'),
(15, 'Uso de máscara faciais para proteção', NULL, 5, '2025-11-07 19:33:29', '2025-11-07 19:33:29'),
(16, 'Presença de estrangeiros', NULL, 5, '2025-11-07 19:33:39', '2025-11-07 19:33:39'),
(17, 'Tipologia de Evento', NULL, 5, '2025-11-07 19:34:05', '2025-11-07 19:34:05'),
(18, 'Local do Evento', NULL, 6, '2025-11-07 20:13:27', '2025-11-07 20:13:27'),
(19, 'Climatização', NULL, 6, '2025-11-07 20:14:02', '2025-11-07 20:14:02'),
(20, 'Brinquedos', NULL, 6, '2025-11-07 20:14:25', '2025-11-07 20:14:25'),
(21, 'Distanciamento possível', NULL, 6, '2025-11-07 20:14:36', '2025-11-07 20:14:36'),
(22, 'Acesso ao local', NULL, 6, '2025-11-07 20:14:46', '2025-11-07 20:14:46'),
(23, 'Localização', NULL, 6, '2025-11-07 20:14:56', '2025-11-07 20:14:56'),
(24, 'Zoneamento', NULL, 6, '2025-11-07 20:15:12', '2025-11-07 20:15:12'),
(25, 'Serviços emergenciais no entorno', NULL, 6, '2025-11-07 20:15:32', '2025-11-07 20:15:32'),
(26, 'Instalações elétricas', NULL, 6, '2025-11-07 20:15:42', '2025-11-07 20:15:42'),
(28, 'Alvarás de funcionamento', NULL, 6, '2025-11-07 20:16:20', '2025-11-07 20:16:20'),
(29, 'Saída de emergência', NULL, 6, '2025-11-07 20:16:32', '2025-11-07 20:16:32'),
(30, 'Estação do ano', NULL, 7, '2025-11-07 20:32:36', '2025-11-07 20:32:36'),
(31, 'Inclinação do terreno', NULL, 7, '2025-11-07 20:32:57', '2025-11-07 20:32:57'),
(32, 'Desastres Naturais', NULL, 7, '2025-11-07 20:33:08', '2025-11-07 20:33:08'),
(33, 'Cozinha', NULL, 8, '2025-11-07 20:42:25', '2025-11-07 20:42:25'),
(34, 'Alimentação e bebidas (A&B)', NULL, 8, '2025-11-07 20:42:36', '2025-11-07 20:42:36'),
(35, 'Serviço de salão', NULL, 8, '2025-11-07 20:42:48', '2025-11-07 20:42:48'),
(36, 'Ventilação', NULL, 8, '2025-11-07 20:43:06', '2025-11-07 20:43:06'),
(37, 'Lixeiras', NULL, 8, '2025-11-07 20:43:19', '2025-11-07 20:43:19');

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
(7, 1, 'Festa Formatura', '2025-11-01 13:30:00', '2025-11-02 13:30:00', 'Salão Imperial', '2025-11-07 19:30:37', '2025-11-07 19:30:37'),
(8, 3, 'Festa Formatura', '2025-11-05 14:06:00', '2025-11-06 14:06:00', 'Salão Imperial', '2025-11-07 20:06:31', '2025-11-07 20:06:31'),
(11, 1, 'Casamento Mariana e Eduardo', '2025-12-27 17:00:00', '2025-12-28 05:00:00', 'Chacara Felicita', '2025-11-11 04:56:18', '2025-11-11 04:56:18');

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
(13, '2025_11_06_040048_add_role_to_users_table', 1),
(14, '2025_11_06_172132_add_acoes_to_classificacoes_table', 2);

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

--
-- Despejando dados para a tabela `planos_mitigacao`
--

INSERT INTO `planos_mitigacao` (`id`, `descricao`, `data_criacao`, `avaliacoes_id`, `created_at`, `updated_at`) VALUES
(1, 'Probabilidade considerável de ocorrer, ocasionando impactos que necessitam de ações estratégias para controle, com geração de transtornos ao público', '2025-11-07', 17, '2025-11-07 21:49:49', '2025-11-07 21:49:49'),
(2, 'awedadsawdasd', '2025-11-11', 16, '2025-11-11 04:28:09', '2025-11-11 04:28:09');

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
(20, 14, 8, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(21, 14, 13, 4, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(22, 14, 17, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(23, 14, 21, 4, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(24, 14, 25, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(25, 14, 29, 4, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(26, 14, 32, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(27, 14, 36, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(28, 14, 40, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(29, 14, 43, 4, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(30, 14, 44, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(31, 14, 50, 5, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(32, 14, 51, 3, '2025-11-07 19:51:44', '2025-11-07 19:51:44'),
(33, 15, 8, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(34, 15, 13, 4, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(35, 15, 17, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(36, 15, 21, 4, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(37, 15, 25, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(38, 15, 29, 4, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(39, 15, 32, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(40, 15, 36, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(41, 15, 40, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(42, 15, 43, 4, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(43, 15, 44, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(44, 15, 50, 5, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(45, 15, 51, 3, '2025-11-07 20:06:52', '2025-11-07 20:06:52'),
(46, 16, 8, 5, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(47, 16, 12, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(48, 16, 14, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(49, 16, 18, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(50, 16, 22, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(51, 16, 26, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(52, 16, 32, 5, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(53, 16, 36, 5, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(54, 16, 39, 4, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(55, 16, 42, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(56, 16, 45, 4, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(57, 16, 50, 5, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(58, 16, 52, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(59, 16, 56, 5, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(60, 16, 58, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(61, 16, 60, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(62, 16, 61, 4, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(63, 16, 67, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(64, 16, 69, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(65, 16, 73, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(66, 16, 77, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(67, 16, 81, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(68, 16, 84, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(69, 16, 86, 1, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(70, 16, 88, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(71, 16, 91, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(72, 16, 94, 4, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(73, 16, 98, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(74, 16, 102, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(75, 16, 104, 2, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(76, 16, 107, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(77, 16, 110, 3, '2025-11-07 21:13:26', '2025-11-07 21:13:26'),
(78, 17, 9, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(79, 17, 11, 1, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(80, 17, 15, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(81, 17, 19, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(82, 17, 23, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(83, 17, 26, 1, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(84, 17, 32, 5, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(85, 17, 34, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(86, 17, 39, 4, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(87, 17, 42, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(88, 17, 47, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(89, 17, 50, 5, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(90, 17, 51, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(91, 17, 55, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(92, 17, 57, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(93, 17, 59, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(94, 17, 63, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(95, 17, 67, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(96, 17, 70, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(97, 17, 73, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(98, 17, 77, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(99, 17, 82, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(100, 17, 84, 1, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(101, 17, 86, 1, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(102, 17, 89, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(103, 17, 92, 4, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(104, 17, 96, 1, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(105, 17, 97, 1, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(106, 17, 102, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(107, 17, 104, 2, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(108, 17, 107, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(109, 17, 110, 3, '2025-11-07 21:49:39', '2025-11-07 21:49:39'),
(174, 20, 10, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(175, 20, 13, 4, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(176, 20, 16, 4, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(177, 20, 20, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(178, 20, 22, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(179, 20, 28, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(180, 20, 31, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(181, 20, 34, 2, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(182, 20, 39, 4, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(183, 20, 41, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(184, 20, 47, 2, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(185, 20, 50, 5, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(186, 20, 51, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(187, 20, 54, 2, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(188, 20, 58, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(189, 20, 60, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(190, 20, 61, 4, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(191, 20, 66, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(192, 20, 69, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(193, 20, 74, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(194, 20, 79, 5, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(195, 20, 81, 2, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(196, 20, 85, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(197, 20, 86, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(198, 20, 88, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(199, 20, 90, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(200, 20, 96, 1, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(201, 20, 98, 2, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(202, 20, 102, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(203, 20, 103, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(204, 20, 107, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16'),
(205, 20, 110, 3, '2025-11-11 05:03:16', '2025-11-11 05:03:16');

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
(8, 'Geral', 5, 5, '2025-11-07 19:16:53', '2025-11-07 19:16:53'),
(9, 'Dirigido', 3, 5, '2025-11-07 19:17:05', '2025-11-07 19:17:05'),
(10, 'Específico', 1, 5, '2025-11-07 19:17:22', '2025-11-07 19:17:22'),
(11, 'Científico e acadêmico (objetivo pode ser educacional, política, artístico ou esportivo) - Congressos, Semanas Acadêmicas, Palestras etc.', 1, 17, '2025-11-07 19:34:29', '2025-11-07 19:34:29'),
(12, 'Comercial e/ou empresarial - Lançamento de produtos, Inauguração de lojas e empreendimentos diversos etc.', 2, 17, '2025-11-07 19:34:51', '2025-11-07 19:34:51'),
(13, 'Social (objetivo pode ser lazer, entretenimento, integração, comemoração, cultural) - Shows, Festivais, Festas abertas etc.', 4, 17, '2025-11-07 19:35:12', '2025-11-07 19:35:12'),
(14, 'Manhã', 1, 6, '2025-11-07 19:35:34', '2025-11-07 19:35:34'),
(15, 'Tarde', 2, 6, '2025-11-07 19:35:51', '2025-11-07 19:35:51'),
(16, 'Noite', 4, 6, '2025-11-07 19:36:01', '2025-11-07 19:36:01'),
(17, 'Dia todo (24 horas)', 5, 6, '2025-11-07 19:36:23', '2025-11-07 19:36:23'),
(18, 'Até 4 horas', 1, 7, '2025-11-07 19:36:58', '2025-11-07 19:36:58'),
(19, 'De 4 a 8 horas', 2, 7, '2025-11-07 19:37:09', '2025-11-07 19:37:09'),
(20, 'De 8 horas a 14 horas', 3, 7, '2025-11-07 19:37:23', '2025-11-07 19:37:23'),
(21, 'Acima de 14 horas', 4, 7, '2025-11-07 19:37:34', '2025-11-07 19:37:34'),
(22, 'Pequeno (até 200 pessoas)', 1, 9, '2025-11-07 19:37:58', '2025-11-07 19:37:58'),
(23, 'Médio (entre 201 e 500 pessoas)', 2, 9, '2025-11-07 19:38:14', '2025-11-07 19:38:14'),
(24, 'Grande (entre 501 e 5 mil)', 4, 9, '2025-11-07 19:38:23', '2025-11-07 19:38:23'),
(25, 'Megaevento (acima de 5 mil)', 5, 9, '2025-11-07 19:42:31', '2025-11-07 19:42:31'),
(26, 'Acima de 60 anos', 1, 8, '2025-11-07 19:42:44', '2025-11-07 19:42:44'),
(27, 'Entre 40 e 60 anos', 2, 8, '2025-11-07 19:43:00', '2025-11-07 19:43:00'),
(28, 'Entre 20 e 40 anos', 3, 8, '2025-11-07 19:43:12', '2025-11-07 19:43:12'),
(29, 'Até 20 anos', 4, 8, '2025-11-07 19:43:24', '2025-11-07 19:43:24'),
(30, 'Controlado/restrito/pago', 1, 10, '2025-11-07 19:43:49', '2025-11-07 19:43:49'),
(31, 'Controlado/gratuito', 3, 10, '2025-11-07 19:44:12', '2025-11-07 19:44:12'),
(32, 'Não controlado', 5, 10, '2025-11-07 19:44:24', '2025-11-07 19:44:24'),
(33, 'Sentado', 1, 11, '2025-11-07 19:44:49', '2025-11-07 19:44:49'),
(34, 'Sentado/em pé', 2, 11, '2025-11-07 19:45:00', '2025-11-07 19:45:00'),
(35, 'Em pé', 4, 11, '2025-11-07 19:45:19', '2025-11-07 19:45:19'),
(36, 'Aglomerado', 5, 11, '2025-11-07 19:45:30', '2025-11-07 19:45:30'),
(37, 'Nenhum', 1, 12, '2025-11-07 19:46:01', '2025-11-07 19:46:01'),
(38, 'Restrito', 2, 12, '2025-11-07 19:46:14', '2025-11-07 19:46:14'),
(39, 'Disponível', 4, 12, '2025-11-07 19:46:25', '2025-11-07 19:46:25'),
(40, 'Sem controle', 5, 12, '2025-11-07 19:46:45', '2025-11-07 19:46:45'),
(41, 'Nenhuma', 1, 13, '2025-11-07 19:47:35', '2025-11-07 19:47:35'),
(42, 'Possível', 2, 13, '2025-11-07 19:47:47', '2025-11-07 19:47:47'),
(43, 'Provável', 4, 13, '2025-11-07 19:47:58', '2025-11-07 19:47:58'),
(44, 'Vermelha', 5, 14, '2025-11-07 19:48:24', '2025-11-07 19:48:24'),
(45, 'Laranja', 4, 14, '2025-11-07 19:48:37', '2025-11-07 19:48:37'),
(46, 'Amarela', 3, 14, '2025-11-07 19:48:48', '2025-11-07 19:48:48'),
(47, 'Verde', 2, 14, '2025-11-07 19:48:58', '2025-11-07 19:48:58'),
(48, 'Possível o tempo todo', 1, 15, '2025-11-07 19:49:23', '2025-11-07 19:49:23'),
(49, 'Parcialmente', 3, 15, '2025-11-07 19:49:36', '2025-11-07 19:49:36'),
(50, 'Nenhum momento', 5, 15, '2025-11-07 19:49:47', '2025-11-07 19:49:47'),
(51, 'Sim', 3, 16, '2025-11-07 19:49:57', '2025-11-07 19:49:57'),
(52, 'Não', 1, 16, '2025-11-07 19:50:08', '2025-11-07 19:50:08'),
(53, 'Aberto', 1, 18, '2025-11-07 20:17:15', '2025-11-07 20:17:15'),
(54, 'Aberto/Fechado', 2, 18, '2025-11-07 20:17:29', '2025-11-07 20:17:29'),
(55, 'Fechado com baixa densidade de público', 3, 18, '2025-11-07 20:17:43', '2025-11-07 20:17:43'),
(56, 'Fechado com alta densidade de público', 5, 18, '2025-11-07 20:18:05', '2025-11-07 20:18:05'),
(57, 'Climatizado', 2, 19, '2025-11-07 20:18:36', '2025-11-07 20:18:36'),
(58, 'Não climatizado', 3, 19, '2025-11-07 20:18:47', '2025-11-07 20:18:47'),
(59, 'Existente', 3, 20, '2025-11-07 20:19:03', '2025-11-07 20:19:03'),
(60, 'Não existente', 1, 20, '2025-11-07 20:19:13', '2025-11-07 20:19:13'),
(61, '< 1 metro', 4, 21, '2025-11-07 20:19:55', '2025-11-07 20:19:55'),
(62, '1 a 1.5 metros', 3, 21, '2025-11-07 20:20:07', '2025-11-07 20:20:07'),
(63, '1.5 a 2 metros', 2, 21, '2025-11-07 20:20:23', '2025-11-07 20:20:23'),
(64, '> 2 metros', 1, 21, '2025-11-07 20:20:42', '2025-11-07 20:20:42'),
(65, 'Rodovia', 4, 22, '2025-11-07 20:22:37', '2025-11-07 20:22:37'),
(66, 'Estrada de terra', 3, 22, '2025-11-07 20:22:51', '2025-11-07 20:22:51'),
(67, 'Avenidas', 2, 22, '2025-11-07 20:23:04', '2025-11-07 20:23:04'),
(68, 'Rua em bairros', 1, 22, '2025-11-07 20:23:14', '2025-11-07 20:23:14'),
(69, 'Área rural', 3, 23, '2025-11-07 20:23:43', '2025-11-07 20:23:43'),
(70, 'Área urbana', 2, 23, '2025-11-07 20:23:58', '2025-11-07 20:23:58'),
(71, 'Periurbano', 1, 23, '2025-11-07 20:24:16', '2025-11-07 20:24:16'),
(72, 'Área residencial', 3, 24, '2025-11-07 20:24:37', '2025-11-07 20:24:37'),
(73, 'Área comercial', 2, 24, '2025-11-07 20:24:50', '2025-11-07 20:24:50'),
(74, 'Área industrial', 1, 24, '2025-11-07 20:25:07', '2025-11-07 20:25:07'),
(75, 'Hospital', 1, 25, '2025-11-07 20:25:48', '2025-11-07 20:25:48'),
(76, 'Bombeiros', 2, 25, '2025-11-07 20:26:06', '2025-11-07 20:26:06'),
(77, 'Delegacias', 3, 25, '2025-11-07 20:26:30', '2025-11-07 20:26:30'),
(78, 'Farmácia', 4, 25, '2025-11-07 20:26:47', '2025-11-07 20:26:47'),
(79, 'Nenhum', 5, 25, '2025-11-07 20:27:00', '2025-11-07 20:27:00'),
(80, 'Ótimo estado', 1, 26, '2025-11-07 20:27:23', '2025-11-07 20:27:23'),
(81, 'Bom estado', 2, 26, '2025-11-07 20:27:39', '2025-11-07 20:27:39'),
(82, 'Regular', 3, 26, '2025-11-07 20:27:52', '2025-11-07 20:27:52'),
(83, 'Ruim', 4, 26, '2025-11-07 20:28:08', '2025-11-07 20:28:08'),
(84, 'Sim', 1, 28, '2025-11-07 20:28:25', '2025-11-07 20:28:25'),
(85, 'Não', 3, 28, '2025-11-07 20:28:44', '2025-11-07 20:28:44'),
(86, 'Sim', 1, 29, '2025-11-07 20:28:58', '2025-11-07 20:28:58'),
(87, 'Não', 3, 29, '2025-11-07 20:29:14', '2025-11-07 20:29:14'),
(88, 'Verão/primavera', 3, 30, '2025-11-07 20:33:24', '2025-11-07 20:33:24'),
(89, 'Outuno/inverno', 2, 30, '2025-11-07 20:33:37', '2025-11-07 20:33:37'),
(90, 'Plano', 1, 31, '2025-11-07 20:34:15', '2025-11-07 20:34:15'),
(91, 'Vertente', 3, 31, '2025-11-07 20:34:31', '2025-11-07 20:34:31'),
(92, 'Fundo de vale', 4, 31, '2025-11-07 20:36:29', '2025-11-07 20:36:29'),
(93, 'Vulcanismo', 5, 32, '2025-11-07 20:37:11', '2025-11-07 20:37:11'),
(94, 'Abalo sísmico (terremoto/maremoto)', 4, 32, '2025-11-07 20:37:26', '2025-11-07 20:37:26'),
(95, 'Tornado/ciclone/furacão', 2, 32, '2025-11-07 20:39:13', '2025-11-07 20:39:13'),
(96, 'Tempestades', 1, 32, '2025-11-07 20:39:26', '2025-11-07 20:39:26'),
(97, 'Não', 1, 33, '2025-11-07 20:43:44', '2025-11-07 20:43:44'),
(98, 'Sim - fixa', 2, 33, '2025-11-07 20:43:58', '2025-11-07 20:43:58'),
(99, 'Sim - móvel', 4, 33, '2025-11-07 20:44:14', '2025-11-07 20:44:14'),
(100, 'Sem alimentação', 1, 34, '2025-11-07 20:44:33', '2025-11-07 20:44:33'),
(101, 'Industrializada', 2, 34, '2025-11-07 20:44:59', '2025-11-07 20:44:59'),
(102, 'Preparada no local', 3, 34, '2025-11-07 20:45:13', '2025-11-07 20:45:13'),
(103, 'Buffet', 3, 35, '2025-11-07 20:45:31', '2025-11-07 20:45:31'),
(104, 'A la carte', 2, 35, '2025-11-07 20:45:46', '2025-11-07 20:45:46'),
(105, 'Individual', 1, 35, '2025-11-07 20:46:48', '2025-11-07 20:46:48'),
(106, 'Alta', 1, 36, '2025-11-07 20:47:26', '2025-11-07 20:47:26'),
(107, 'Moderada', 3, 36, '2025-11-07 20:47:38', '2025-11-07 20:47:38'),
(108, 'Baixa', 5, 36, '2025-11-07 20:47:58', '2025-11-07 20:47:58'),
(109, 'Coleta seletiva', 1, 37, '2025-11-07 20:48:18', '2025-11-07 20:48:18'),
(110, 'Lixeira comum', 3, 37, '2025-11-07 20:48:39', '2025-11-07 20:48:39'),
(111, 'Sem lixeira', 4, 37, '2025-11-07 20:48:49', '2025-11-07 20:48:49');

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
(5, 'HUMANOS', '2025-11-07 19:14:25', '2025-11-07 19:14:25'),
(6, 'TÉCNICOS E ESTRUTURAIS', '2025-11-07 20:12:29', '2025-11-07 20:12:29'),
(7, 'NATURAIS', '2025-11-07 20:32:16', '2025-11-07 20:32:16'),
(8, 'BIOLÓGICOS', '2025-11-07 20:41:53', '2025-11-07 20:41:53');

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
(1, 'Eduardo', 'eltakaya@hotmail.com', NULL, '$2y$10$pcotAzimseKP9LFAkd.8BuAdV1JkxfVxCpCj89lQmWAdRqcwe0sgK', 'eLHqpdkt3kh68JoAPgXs1835330UZTg2uhpXcSl5f2MhFcBze9jDrDWdlKPY', '2025-11-06 15:39:17', '2025-11-06 15:39:17', 'gestor'),
(2, 'teste', 'teste@hotmail.com', NULL, '$2y$10$V4PIcL.kGqWaZI4/nBfOKOwsO9JmfVCVFCsIXS5hXJNGwSOtLWsK.', NULL, '2025-11-06 19:39:40', '2025-11-06 19:39:40', 'organizador'),
(3, 'teste', 'teste@teste.com', NULL, '$2y$10$/doAuyaRzwaeCTYWhBX7oOQi.frAVQ9lI13s852.SpZZyN8yEfaWK', NULL, '2025-11-07 20:06:06', '2025-11-07 20:06:06', 'organizador');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `classificacoes`
--
ALTER TABLE `classificacoes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `criterios`
--
ALTER TABLE `criterios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `planos_mitigacao`
--
ALTER TABLE `planos_mitigacao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `respostas_avaliacao`
--
ALTER TABLE `respostas_avaliacao`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT de tabela `tipo_criterios`
--
ALTER TABLE `tipo_criterios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de tabela `tipo_riscos`
--
ALTER TABLE `tipo_riscos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
