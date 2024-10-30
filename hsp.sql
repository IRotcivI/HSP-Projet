-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 30 oct. 2024 à 13:47
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hsp`
--

-- --------------------------------------------------------

--
-- Structure de la table `fiche_entreprise`
--

DROP TABLE IF EXISTS `fiche_entreprise`;
CREATE TABLE IF NOT EXISTS `fiche_entreprise` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CP` int NOT NULL,
  `Web` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fiche_entreprise_ref_utilisateur_foreign` (`ref_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_etablissement`
--

DROP TABLE IF EXISTS `fiche_etablissement`;
CREATE TABLE IF NOT EXISTS `fiche_etablissement` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CP` int NOT NULL,
  `Web` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fiche_etablissement_ref_utilisateur_foreign` (`ref_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_evenement`
--

DROP TABLE IF EXISTS `fiche_evenement`;
CREATE TABLE IF NOT EXISTS `fiche_evenement` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_place` int NOT NULL,
  `hop` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `fiche_evenement`
--

INSERT INTO `fiche_evenement` (`id`, `titre`, `description`, `rue`, `ville`, `cp`, `type`, `nb_place`, `hop`) VALUES
(1, 'Dépistage', 'Lorem, tu es nul Selim', '12 Rue de AHAD', 'DUGNY', '93440', 'Préventive', 10, 'HSP De DUGNY');

-- --------------------------------------------------------

--
-- Structure de la table `fich_eve_utilisateur`
--

DROP TABLE IF EXISTS `fich_eve_utilisateur`;
CREATE TABLE IF NOT EXISTS `fich_eve_utilisateur` (
  `ref_utilisateur` int NOT NULL,
  `ref_fiche_evenement` int NOT NULL,
  KEY `fich_eve_utilisateur_ref_utilisateur_foreign` (`ref_utilisateur`),
  KEY `fich_eve_utilisateur_ref_fiche_evenement_foreign` (`ref_fiche_evenement`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hopital`
--

DROP TABLE IF EXISTS `hopital`;
CREATE TABLE IF NOT EXISTS `hopital` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Specialite` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Voie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CP` int NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hopital_ref_utilisateur_foreign` (`ref_utilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `mdpreset`
--

DROP TABLE IF EXISTS `mdpreset`;
CREATE TABLE IF NOT EXISTS `mdpreset` (
  `mdpResetId` int NOT NULL AUTO_INCREMENT,
  `mdpResetEmail` text NOT NULL,
  `mdpResetSelector` text NOT NULL,
  `mdpResetToken` longtext NOT NULL,
  `mdpResetTemps` text NOT NULL,
  PRIMARY KEY (`mdpResetId`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mdpreset`
--

INSERT INTO `mdpreset` (`mdpResetId`, `mdpResetEmail`, `mdpResetSelector`, `mdpResetToken`, `mdpResetTemps`) VALUES
(9, 'fayedaour@outlook.fr', '1aaff3c46e318513', '$2y$10$..U0WSgeLTDdAIyEixwtf.54cXV4D4xZEc9yRimgD5HcuEedbRzQC', '1728857850'),
(22, 'funcyuncle@gmail.com', '32336d971284eab8', '$2y$10$OZBjN3Aw7uRsRcdhaMWfx.by6EHIXRF3DdPH3BKNkIe4VERxvpj7W', '1730133987');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_09_23_135147_utilisateur', 1),
(3, '2024_09_23_135246_fiche_evenement', 1),
(4, '2024_09_23_140536_fiche_etablissement', 1),
(5, '2024_09_23_141646_fich_eve_utilisateur', 1),
(6, '2024_09_23_142121_post', 1),
(7, '2024_09_23_144305_offre', 1),
(8, '2024_09_23_144309_fiche_entreprise', 1),
(9, '2024_09_23_144337_reponse', 1),
(10, '2024_09_23_145516_utilisateur_offre', 1),
(11, '2024_09_23_145917_hopital', 1);

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tache` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` int NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Contenu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Heure` time NOT NULL,
  `ref_reponse` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_ref_reponse_foreign` (`ref_reponse`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heure` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `entreprise` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_post` int DEFAULT NULL,
  `ref_reponse` int DEFAULT NULL,
  `ref_offre` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_email_unique` (`email`),
  KEY `utilisateur_ref_post_foreign` (`ref_post`),
  KEY `utilisateur_ref_reponse_foreign` (`ref_reponse`),
  KEY `utilisateur_ref_offre_foreign` (`ref_offre`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`, `fonction`, `cv`, `entreprise`, `ref_post`, `ref_reponse`, `ref_offre`) VALUES
(1, 'FAYE', 'Victor', 'v.faye@lprs.fr', '$2y$10$MB2tqdhVyhCwfXT7I4nxcOOC7Zy1lfCePfFxJoZJvXchW5aZmGZ62', 'Professeur', '', 'Hopital HSP', NULL, NULL, NULL),
(2, 'a', 'a', 'a@a.fr', '$2y$10$7rgr3uScLrYiyvtwEe/1JOBjs7Cxy9s2bACdNC5JLrOOLO5TlYd8e', 'eleve', '', NULL, NULL, NULL, NULL),
(3, 'c', 'c', 'c@c.fr', '$2y$10$A6iQUVHrkBladtDiD88fFuUSwyXCvB38zKK5fGL.Rq91dL0y.6Wtm', 'eleve', 'file', NULL, NULL, NULL, NULL),
(4, 'b', 'b', 'b@b.fr', '$2y$10$Vqkc3kaeJj/sfG3Re9efR.k0.bgfkoIoUg81YOOgKA.Bo5R49ukIO', 'eleve', 'CV.pdf', NULL, NULL, NULL, NULL),
(5, 'ad', 'ad', 'ad@ad.fr', '$2y$10$S8zqRiVlT5khp44EP1/Ek.IeF9NLaFCS.OLm0I1BNeckMjaXHIMbq', 'eleve', 'LETTRE.pdf', NULL, NULL, NULL, NULL),
(9, 'FAYE', 'a', 'funcyuncle@gmail.com', '$2y$10$BfxLdx6B.lfqT3oWJRJ.u.78qL7VH3u0Go1ulZS/PVflGZ6dlVkd2', 'eleve', 'CV.pdf', NULL, NULL, NULL, NULL),
(8, 'a', 'a', 'as@as.fr', '$2y$10$cvBGaDWbrUjRWIg2NJa5eOptm.mEMpTgmCDuFbIDZToELjD.9kYiy', 'professeur', '', NULL, NULL, NULL, NULL),
(7, 'AHD', 'Asad', 'r.asad@lprs.fr', '$2y$10$AvrjFSGIF2VYG3/63LGDne1BP5zjhyksAtJ8w9tFnNP7Tz5PNlMkC', 'eleve', 'pdf-exemple.pdf', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_offre`
--

DROP TABLE IF EXISTS `utilisateur_offre`;
CREATE TABLE IF NOT EXISTS `utilisateur_offre` (
  `ref_utilisateur` int NOT NULL,
  `ref_offre` int NOT NULL,
  KEY `utilisateur_offre_ref_utilisateur_foreign` (`ref_utilisateur`),
  KEY `utilisateur_offre_ref_offre_foreign` (`ref_offre`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
