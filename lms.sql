-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 oct. 2020 à 15:43
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `lms`
--

-- --------------------------------------------------------

--
-- Structure de la table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `year` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `is_correct`, `created_at`, `updated_at`) VALUES
(21, 20, 'j\'ai 12', 1, '2020-09-01 14:55:46', '2020-09-01 14:55:46'),
(22, 20, 'j\'ai 12 ans', 1, '2020-09-01 14:55:46', '2020-09-01 14:55:46'),
(23, 20, 'jé 12 ans', 0, '2020-09-01 14:55:46', '2020-09-01 14:55:46'),
(24, 20, 'jai Dousant', 0, '2020-09-01 14:55:46', '2020-09-01 14:55:46'),
(25, 20, 'je ne sais pas', 0, '2020-09-01 14:55:46', '2020-09-01 14:55:46'),
(33, 23, 'Sall', 0, '2020-09-01 16:06:40', '2020-09-01 16:06:40'),
(34, 23, 'faye', 0, '2020-09-01 16:06:40', '2020-09-01 16:06:40'),
(35, 23, 'wade', 0, '2020-09-01 16:06:40', '2020-09-01 16:06:40'),
(37, 23, 'diouf', 1, '2020-09-01 16:06:41', '2020-09-01 16:06:41'),
(43, 25, '100000 m2', 0, '2020-09-19 21:10:03', '2020-09-19 21:10:03'),
(44, 25, '166700 m2', 1, '2020-09-19 21:10:03', '2020-09-19 21:10:03'),
(45, 25, '2 m3', 0, '2020-09-19 21:10:03', '2020-09-19 21:10:03'),
(47, 25, '29999', 0, '2020-09-19 21:10:03', '2020-09-19 21:10:03');

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adresse` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date` datetime NOT NULL,
  `destinataire` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `contacts`
--

INSERT INTO `contacts` (`id`, `adresse`, `email`, `name`, `message`, `sujet`, `created_at`, `updated_at`, `date`, `destinataire`) VALUES
(2, '0', 'sc@gm.com', 'sc', 'ksncvjsdvdsz', 'sk', '2020-07-27 11:32:00', '2020-07-27 11:32:00', '0000-00-00 00:00:00', ''),
(3, 'Ouest Foire VDN', 'contact@infoetudes.com', 'Bara DIAW', 'salut ca va', 'Retour Contact', '2020-08-11 10:29:43', '2020-08-11 10:29:43', '2020-08-11 10:29:43', 'sc@gm.com'),
(5, 'Ouest Foire VDN', 'admin@admin.com', 'sdv lknf', 'Bonjoursb', 'Slautation', '2020-08-11 10:53:49', '2020-08-11 10:53:49', '2020-08-11 10:53:49', 'contact@infoetudes.com'),
(6, '0', 'moustaph@gmail.com', 'Moustapha', 'Bonjour vous allé bien j\'esperes', 'Information', '2020-09-05 12:33:39', '2020-09-05 12:33:39', '2020-09-05 12:33:39', 'contact@infoetudes.com');

-- --------------------------------------------------------

--
-- Structure de la table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `image`, `price`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, 'Programmation Algorithmique', 'Analyse et programmation', 'uploads/avatars/1_1595195103.jpg', '20000', 4, '2020-07-21 11:55:42', '2020-07-20 07:32:07'),
(2, 'Base de données 2', 'type de données', 'uploads/avatars/1_1595230415.jpg', '20000', 1, '2020-07-19 21:44:49', '2020-08-12 14:45:12'),
(3, 'Base de données', 'type de données', 'uploads/avatars/1_1595195103.jpg', '0', 4, '2020-07-19 21:45:03', '2020-07-19 21:45:03'),
(4, 'réseaux et systemes', 'Systemes et reseaux de télécom', 'uploads/avatars/1_1595230895.png', '30000', 1, '2020-07-20 07:41:35', '2020-07-20 07:41:35'),
(5, 'théorie des graphes', 'Beaucoup de situations réelles et pratiques requièrent des graphes\r\ndans lesquels l’orientation des arêtes est importante.\r\nC’est le cas des cartes routières d’une ville où des rues ont un sens\r\nunique de parcours, des réseaux électriques, de flots sur des réseaux\r\nde pipelines.', 'uploads/avatars/3_1600279254.JPG', '15000', 1, '2020-09-16 17:43:04', '2020-09-16 18:02:17'),
(6, 'Administration réseau et systeme', 'Administrer les réseaux et les systemes', 'uploads/avatars/1_1600524119.jpg', '55000', 3, '2020-09-19 14:01:59', '2020-09-19 14:02:21');

-- --------------------------------------------------------

--
-- Structure de la table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `note` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `evaluation` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `evaluations`
--

INSERT INTO `evaluations` (`id`, `course_id`, `student_id`, `note`, `date`, `evaluation`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 13.00, '2020-07-23', 'ceci est le lien du quiz', '2020-07-30 12:14:56', '2020-07-30 12:14:56'),
(2, 4, 1, 10.00, '2020-07-01', 'evaluation ', '2020-07-23 12:24:33', '2020-07-23 12:24:33'),
(3, 4, 2, 14.00, '2020-07-23', 'EVlation de l\'etudiant', '2020-07-23 12:24:33', '2020-07-23 12:24:33');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `forums`
--

CREATE TABLE `forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `forums`
--

INSERT INTO `forums` (`id`, `user_id`, `date`, `message`, `created_at`, `updated_at`) VALUES
(3, 4, '2020-09-17 13:29:46', 'salut comment vous allez', '2020-09-17 13:29:46', '2020-09-17 13:29:46'),
(4, 4, '2020-09-22 10:17:48', 'salut ibou', '2020-09-22 10:17:48', '2020-09-22 10:17:48'),
(5, 4, '2020-09-22 10:18:34', 'Salut tout le monde \r\nAujourd\'huit qui part a dakara', '2020-09-16 10:18:34', '2020-09-30 10:18:34'),
(6, 4, '2020-09-23 12:17:07', 'sxkcsbj', '2020-09-23 12:17:07', '2020-09-23 12:17:07'),
(7, 4, '2020-09-23 12:17:36', 'wxcb  cb nW', '2020-09-23 12:17:36', '2020-09-23 12:17:36'),
(8, 4, '2020-09-23 12:17:45', 'wxkjcbq wn, shqc senqc wdx', '2020-09-23 12:17:45', '2020-09-23 12:17:45'),
(9, 4, '2020-09-23 12:17:55', 'oui cool', '2020-09-23 12:17:55', '2020-09-23 12:17:55'),
(10, 4, '2020-09-23 12:19:58', 'cool', '2020-09-23 12:19:58', '2020-09-23 12:19:58');

-- --------------------------------------------------------

--
-- Structure de la table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lessons`
--

INSERT INTO `lessons` (`id`, `course_id`, `name`, `file`, `video`, `created_at`, `updated_at`) VALUES
(1, 4, 'name du lesson', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', '2020-07-01 12:19:42', '2020-07-29 12:19:42'),
(2, 2, 'name du lesson', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', '2020-07-13 12:19:42', '2020-07-21 12:19:42'),
(3, 2, 'les Bases de données MySQL', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', '2020-07-20 12:20:11', '2020-09-21 11:31:17'),
(4, 3, 'leçon 1', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', '2020-07-21 12:20:11', '2020-08-28 09:55:02'),
(5, 2, 'structure des données', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', NULL, NULL),
(6, 2, 'Base de données avancés', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', NULL, NULL),
(7, 1, 'Base de données', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', '2020-07-20 15:42:10', '2020-07-20 15:42:10'),
(8, 2, 'analyse de données', 'uploads/files/1595411795.pdf', 'uploads/videos/1595411806.mkv', '2020-07-22 09:56:46', '2020-07-22 09:56:46'),
(9, 2, 'Théorie des graphes et analyse', 'uploads/files/1600687767.pdf', ' uploads/videos/1599320471.mp4', '2020-09-05 15:41:11', '2020-09-21 11:29:27');

-- --------------------------------------------------------

--
-- Structure de la table `marks`
--

CREATE TABLE `marks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` double(8,2) NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `anneeAca_id` bigint(20) UNSIGNED NOT NULL,
  `quizze_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sujet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `receiver_id`, `sender_id`, `message`, `sujet`, `date`, `created_at`, `updated_at`) VALUES
(18, 3, 2, 'caa', 'salut', '2020-07-27 14:34:35', '2020-07-27 14:34:35', '2020-07-27 14:34:35');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_14_105826_create_teachers_table', 1),
(5, '2020_07_14_105827_create_courses_table', 1),
(6, '2020_07_14_112341_create_admins_table', 1),
(7, '2020_07_14_112418_create_students_table', 1),
(8, '2020_07_14_112619_create_academic_years_table', 1),
(9, '2020_07_14_112643_create_settings_table', 1),
(10, '2020_07_14_112845_create_quizzes_table', 1),
(11, '2020_07_14_112931_create_marks_table', 1),
(12, '2020_07_14_112949_create_forums_table', 1),
(13, '2020_07_14_113036_create_evaluations_table', 1),
(14, '2020_07_14_115700_create_lessons_table', 1),
(15, '2020_07_20_120307_create_students-courses_table', 1),
(16, '2020_07_23_115015_create_evaluations_table', 2),
(17, '2020_07_23_115026_create_quizzes_table', 2),
(18, '2020_07_24_085706_create_messages_table', 3),
(19, '2020_07_27_111504_create_contacts_table', 4),
(20, '2020_07_27_120630_create_notifications_table', 5),
(21, '2020_08_21_120153_create_questions_table', 6),
(22, '2020_09_01_132839_create_answers_table', 7),
(23, '2020_09_16_112055_create_student_attendances_table', 8),
(24, '2020_10_06_133626_create_products_table', 8);

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('77dfbd48-792d-49a5-ad0f-754719ab3a83', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"subject\":\"Salam\",\"body\":\"Bonjour , j\'ai un probleme avec mon compte\",\"attachment\":[],\"sender_id\":4,\"date\":{\"date\":\"2020-10-07 09:50:19.419753\",\"timezone_type\":3,\"timezone\":\"UTC\"},\"sender\":\"student@gmail.com\",\"receiver\":\"admin@admin.com\"}', '2020-10-07 13:22:47', '2020-10-07 09:50:22', '2020-10-07 13:22:47'),
('ed3ede6b-8f1e-4cdb-8374-496b9ddb2dbd', 'App\\Notifications\\Notifications', 'App\\User', 1, '{\"subject\":\"qc\",\"body\":\"scvjksn\",\"attachment\":[],\"sender_id\":4,\"date\":{\"date\":\"2020-09-19 16:23:36.781795\",\"timezone_type\":3,\"timezone\":\"UTC\"},\"sender\":\"student@gmail.com\",\"receiver\":\"admin@admin.com\"}', '2020-09-19 16:26:49', '2020-09-19 16:23:36', '2020-09-19 16:26:49');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `point` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('multiple','unique') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unique',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `point`, `question`, `type`, `created_at`, `updated_at`) VALUES
(20, 1, 1, 'Quel age as tu', 'multiple', '2020-09-01 14:34:59', '2020-09-01 14:55:46'),
(23, 1, 3, 'quel est le nom de Abdou diouf', 'unique', '2020-09-01 16:06:40', '2020-09-01 16:06:40'),
(25, 4, 2, 'Quel est la superficie de la terre ?', 'unique', '2020-09-19 21:10:03', '2020-09-19 21:10:03');

-- --------------------------------------------------------

--
-- Structure de la table `quizzes`
--

CREATE TABLE `quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` double(8,2) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `quizzes`
--

INSERT INTO `quizzes` (`id`, `course_id`, `student_id`, `file`, `note`, `date`, `created_at`, `updated_at`) VALUES
(5, 4, 1, 'uploads/quiz/1_1600524716.pdf', 1.00, '2020-09-19', '2020-09-19 14:11:58', '2020-09-19 14:11:58'),
(15, 4, 1, 'uploads/quiz/4_1601310902.pdf', 2.00, '2020-09-28', '2020-09-28 16:35:03', '2020-09-28 16:35:03'),
(16, 4, 1, 'uploads/quiz/4_1602064502.pdf', 0.00, '2020-10-07', '2020-10-07 09:55:06', '2020-10-07 09:55:06');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `code`, `value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'academic_year', '2020', 'Notre établissement a pour vocation de vous aider à atteindre vos objectifs', NULL, '2020-06-12 17:20:21'),
(2, 'timezone', 'Africa/Dakar', '', NULL, '2020-08-17 09:57:24'),
(3, 'currency', 'Fcfa', '', NULL, '2020-08-17 09:57:24'),
(4, 'currency_position', 'right', '', NULL, NULL),
(9, 'active_theme', 'default', 'le theme par defaut', NULL, '2020-06-10 12:22:26'),
(10, 'disabled_website', 'yes', '', NULL, NULL),
(11, 'copyright_text', '&copy; Copyright 2018. All Rights Reserved. | This template is made with <i class=\"fa fa-heart-o\" aria-hidden=\"true\"></i> by <a href=\"https://colorlib.com\">Colorlib</a>', '', NULL, NULL),
(14, 'phone', '338275231', '', '2019-06-21 22:32:54', '2019-09-11 10:57:03'),
(15, 'email', 'contact@infoetudes.com', '', '2019-06-21 22:32:54', '2020-08-17 09:57:24'),
(16, 'language', 'fr', '', '2019-06-21 22:40:14', '2020-08-17 09:57:24'),
(17, 'address', 'Ouest Foire VDN', 'adresse', '2019-06-21 22:40:14', '2020-08-17 09:57:24'),
(18, 'app_title', 'Univers Professionnel', '', NULL, '2019-09-11 10:57:03'),
(19, 'app_name', 'App\'School', '', NULL, NULL),
(20, 'logo', 'uploads/settings/logo_1598864814.JPG', '', NULL, '2020-08-31 09:06:54'),
(21, 'mini_logo', 'images/settings/mini.png', '', NULL, NULL),
(22, 'favicon', 'uploads/settings/favicon_1598611551.png', '', NULL, '2020-08-28 10:45:51'),
(23, 'avatar', 'images/users/avatar.png', '', NULL, NULL),
(24, 'website', 'http://infoetudes.com', '', NULL, NULL),
(25, 'school_name', 'Groupe Info Etudes', '', NULL, '2020-08-17 09:57:24'),
(26, 'profil_cover', 'images/users/cover.jpg', '', NULL, NULL),
(27, 'meta_description', 'Application de gestion scolaire', '', NULL, NULL),
(28, 'from_email', 'diawbara93@gmail.com', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(29, 'from_name', 'Bara DIAW', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(30, 'smtp_host', 'smtp.gmail.com', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(31, 'smtp_port', '587', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(32, 'smtp_encryption', 'ssl', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(33, 'smtp_username', 'exemple@gmail.com', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(34, 'smtp_password', '123456789', '', '2019-07-16 20:53:26', '2019-07-16 20:53:26'),
(35, 'sidebarbgcolor', '#009689', '', '2019-07-18 03:58:25', '2019-07-18 04:07:14'),
(36, 'headerbgcolor', '', '', '2019-07-18 03:58:25', '2019-07-18 04:07:14'),
(37, 'site_title', 'Webschool', '', NULL, NULL),
(38, 'site_slogan', 'Application de gestion scolaire', '', NULL, NULL),
(39, 'slogan', 'Travillez et reussisez', 'Notre établissement a pour vocation de vous aider à atteindre vos objectifs', '2020-06-08 17:59:34', '2020-06-08 17:59:34'),
(40, 'slogan', 'Travillez et reussisez', 'Notre établissement a pour vocation de vous aider à atteindre vos objectifs', '2020-06-08 18:00:17', '2020-06-08 18:00:17'),
(41, 'slogan', 'Travillez et reussisez', 'Notre établissement a pour vocation de vous aider à atteindre vos objectifs', '2020-06-08 18:00:59', '2020-06-08 18:00:59'),
(42, 'session', '2019-2020', '', '2020-07-29 13:24:59', '2020-07-22 13:24:59'),
(43, 'tel', '+221338900909', '', '2020-07-28 20:47:58', '2020-07-30 20:47:58'),
(44, 'phone1', '779009890', NULL, '2020-08-17 09:56:46', '2020-08-17 09:57:24'),
(45, 'phone2', '', NULL, '2020-08-17 09:56:46', '2020-08-17 09:57:24'),
(46, 'default_bg', 'uploads/settings/avatar_1598611567.png', NULL, '2020-08-28 10:44:44', '2020-08-28 10:46:07'),
(47, 'email_paypal', 'sb-n2idm2880783_api1.business.example.com', 'l\'adresse email utilisé sur le compte paypal', '2020-09-28 15:52:35', '2020-09-28 15:52:35'),
(48, 'password_paypal', 'R8E77FH6VUEWANFP', 'Le password du compte paypal , utiliser par l\'application ', '2020-09-28 15:53:45', '2020-09-28 15:53:45'),
(49, 'signature_paypal', 'ArSJn3A3bWm.P0RiPfs618kKyRSxA0YF4T3k3EV3AdzzX0yw.eQAuLAf', 'Le signature de l\'API du compte paypal ', '2020-09-29 15:55:01', '2020-09-29 15:55:01');

-- --------------------------------------------------------

--
-- Structure de la table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ine` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students`
--

INSERT INTO `students` (`id`, `ine`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1890199718098', 4, '2020-07-31 11:52:39', '2020-07-31 11:52:39'),
(2, '1890199609290', 8, '2020-07-22 16:22:55', '2020-10-07 13:24:49'),
(3, 'N120021200202', 13, '2020-10-28 10:47:45', '2020-10-28 10:47:45');

-- --------------------------------------------------------

--
-- Structure de la table `students-courses`
--

CREATE TABLE `students-courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `students-courses`
--

INSERT INTO `students-courses` (`id`, `course_id`, `student_id`, `note`, `date`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '5', '2020-07-22', '2020-07-23 12:52:56', '2020-07-23 12:52:56'),
(5, 3, 1, '0', '1992-02-02', '2020-09-22 17:51:10', '2020-09-22 17:51:10'),
(6, 3, 3, '0', '2020-10-07', '2020-10-07 10:58:05', '2020-10-07 10:58:05');

-- --------------------------------------------------------

--
-- Structure de la table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `matricule` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `career` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `matricule`, `career`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'T190720', 'Mathématique', 'la science en son vrai sens du terme', '2020-07-07 11:48:00', '2020-07-02 11:48:00'),
(2, 5, 'M22134', 'Styliste , Tailleur \r\n\r\nInfographe', 'la description d\'une parfaite styliste , d\'un bon tailleur et d\'un bon infographe', '2020-07-02 09:43:32', '2020-07-30 09:43:32'),
(3, 9, 'T123332', 'description de ma cariere', 'mon profil', '2020-07-23 16:30:47', '2020-08-09 20:36:56'),
(4, 10, 'T102020', 'je suis formateur en genie civil depuis 5 ans', 'ceci est ma description', '2020-08-31 09:23:20', '2020-08-31 09:24:10');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role` enum('student','teacher','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexe` enum('Masculin','Feminin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lieuNaissance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/uploads/avatars/avatar.png',
  `dateNaissance` date NOT NULL,
  `tel` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '779009090',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `status`, `role`, `prenom`, `adresse`, `sexe`, `lieuNaissance`, `avatar`, `dateNaissance`, `tel`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'laye', 1, 'admin', 'Camara', 'qlkn', 'Masculin', 'dakar', 'uploads/avatars/1_1598519053.jpg', '2021-02-01', '779009090', 'admin@gmail.com', NULL, '$2y$10$KXpNoL18i67.pfroHRJJrO8VRvDWsG5yJCXHFohe4c9NeiAb0z1IO', NULL, '2020-07-15 10:08:58', '2020-10-07 13:25:48'),
(2, 'khouma', 1, 'admin', 'moi', 'dakar', 'Masculin', 'kaka', '/uploads/avatars/1_1595195103.jpg', '2020-01-01', '779009090', 'moustaphakhouma964@gmail.com', NULL, '$2y$10$dD0MNAigmjl6AES4kfNHju1IpudTZYHQOUnMsNuhmCLsWUSVL2psS', NULL, '2020-07-15 13:03:40', '2020-07-15 13:03:40'),
(3, 'sall', 1, 'teacher', 'moustapha', 'dakar', 'Masculin', 'Dakar', '/uploads/avatars/1_1595195103.jpg', '2020-07-22', '779009090', 'teacher@gmail.com', '2020-07-29 11:46:10', '$2y$10$rppyQQEYGYm/dRZXe9R/IuVafnGqqLKstsP3zzjeMcIny0U2eYx2e', NULL, '2020-07-02 11:46:10', '2020-10-07 12:45:22'),
(4, 'ka', 1, 'student', 'babacar', 'tivaoune', 'Masculin', 'Saint luis', 'uploads/avatars/4_1600525731.jpg', '1855-01-01', '779009090', 'student@gmail.com', '2020-07-22 11:49:23', '$2y$10$rppyQQEYGYm/dRZXe9R/IuVafnGqqLKstsP3zzjeMcIny0U2eYx2e', NULL, '2020-07-30 11:49:23', '2020-09-19 14:28:51'),
(5, 'khouma', 1, 'teacher', 'sokhna', 'pikine', 'Masculin', 'dakar', '/uploads/avatars/1_1595195103.jpg', '2020-07-07', '779009090', 'sokhna@gmail.com', '2020-07-16 09:42:15', '$2y$10$rppyQQEYGYm/dRZXe9R/IuVafnGqqLKstsP3zzjeMcIny0U2eYx2e', NULL, NULL, NULL),
(6, 'ka', 1, 'admin', 'fallou', 'diamegueune', 'Masculin', 'diourbel', '/uploads/avatars/1_1595195103.jpg', '1986-01-01', '779009090', 'fallou@admin.com', NULL, '$2y$10$.AzuKylscOIjJsLubgvjsOSjN1172MRhIKKS1nH0x2NQHG9Qos4JG', NULL, '2020-07-22 15:23:43', '2020-07-22 15:23:43'),
(8, 'fall', 1, 'admin', 'Madieng', 'median', 'Masculin', 'médina', '/uploads/avatars/1_1595195103.jpg', '2007-01-31', '778980090', 'madieng@student.com', NULL, '$2y$10$qv6IQjF2XWMRQqEQ3wJEr.kge73sfrClVLYBaS4q0us0Xay8vy5mi', NULL, '2020-07-22 16:22:55', '2020-08-31 09:25:05'),
(9, 'fall', 1, 'admin', 'sidi ka', 'kanerou', 'Feminin', 'bakel', '/uploads/avatars/1_1595195103.jpg', '2009-12-01', '789000909', 'sidi@formateur.com', NULL, '$2y$10$dY.OPavC5TBXW2TG3yZwzOdcI1k6Wg3YJfC2uVQZ8HqcTKu.WZfLS', NULL, '2020-07-22 16:29:22', '2020-08-28 09:52:17'),
(10, 'ka', 1, 'admin', 'samba', 'thiaroye', 'Masculin', 'dakar', '/uploads/avatars/avatar.png', '2010-12-31', '779008998', 'samba@gmail.com', NULL, '$2y$10$ObIneqxCxluDQiA8MuaeuepwqMY6UOHXrzT8PcO7pVUOHq6YuLVWa', NULL, '2020-08-31 09:23:20', '2020-08-31 09:23:20'),
(13, 'Sarr', 1, 'student', 'El hadji Momar', 'Rufisque', 'Masculin', 'Dakar', '/uploads/avatars/avatar.png', '2000-11-11', '779009090', 'momar@gmail.com', NULL, '$2y$10$F2agXVGt/Ncz24lHpWOYnOc.IOCHikUnTevGC1VIR/BypyDiHtVtW', NULL, '2020-10-07 10:46:15', '2020-10-07 11:13:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admins_user_id_foreign` (`user_id`);

--
-- Index pour la table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Index pour la table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_teacher_id_foreign` (`teacher_id`);

--
-- Index pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_course_id_foreign` (`course_id`),
  ADD KEY `evaluations_student_id_foreign` (`student_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forums_user_id_foreign` (`user_id`);

--
-- Index pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_course_id_foreign` (`course_id`);

--
-- Index pour la table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marks_course_id_foreign` (`course_id`),
  ADD KEY `marks_quizze_id_foreign` (`quizze_id`),
  ADD KEY `marks_student_id_foreign` (`student_id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_course_id_foreign` (`course_id`);

--
-- Index pour la table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizzes_course_id_foreign` (`course_id`),
  ADD KEY `quizzes_student_id_foreign` (`student_id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_ine_unique` (`ine`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Index pour la table `students-courses`
--
ALTER TABLE `students-courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_courses_course_id_foreign` (`course_id`),
  ADD KEY `students_courses_student_id_foreign` (`student_id`);

--
-- Index pour la table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_matricule_unique` (`matricule`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `students-courses`
--
ALTER TABLE `students-courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Contraintes pour la table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `evaluations_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Contraintes pour la table `forums`
--
ALTER TABLE `forums`
  ADD CONSTRAINT `forums_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `marks_quizze_id_foreign` FOREIGN KEY (`quizze_id`) REFERENCES `quizzes` (`id`),
  ADD CONSTRAINT `marks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Contraintes pour la table `quizzes`
--
ALTER TABLE `quizzes`
  ADD CONSTRAINT `quizzes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `quizzes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Contraintes pour la table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `students-courses`
--
ALTER TABLE `students-courses`
  ADD CONSTRAINT `students_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `students_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Contraintes pour la table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
