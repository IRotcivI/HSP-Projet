-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 09 déc. 2024 à 16:20
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
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `motif` varchar(255) NOT NULL,
  `demande` varchar(255) NOT NULL,
  `autre` varchar(255) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_entreprise`
--

DROP TABLE IF EXISTS `fiche_entreprise`;
CREATE TABLE IF NOT EXISTS `fiche_entreprise` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CP` int NOT NULL,
  `Web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fiche_entreprise_ref_utilisateur_foreign` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_etablissement`
--

DROP TABLE IF EXISTS `fiche_etablissement`;
CREATE TABLE IF NOT EXISTS `fiche_etablissement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ville` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `CP` int NOT NULL,
  `Web` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fiche_etablissement_ref_utilisateur_foreign` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_evenement`
--

DROP TABLE IF EXISTS `fiche_evenement`;
CREATE TABLE IF NOT EXISTS `fiche_evenement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_place` int NOT NULL,
  `ref_hopital` int DEFAULT NULL,
  `ref_utilisateur` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eve_hopital` (`ref_hopital`),
  KEY `fk_utilisateur_evenement` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fich_eve_utilisateur`
--

DROP TABLE IF EXISTS `fich_eve_utilisateur`;
CREATE TABLE IF NOT EXISTS `fich_eve_utilisateur` (
  `ref_utilisateur` int NOT NULL,
  `ref_fiche_evenement` int NOT NULL,
  KEY `fk_userevent` (`ref_utilisateur`),
  KEY `fk_event` (`ref_fiche_evenement`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `hopital`
--

DROP TABLE IF EXISTS `hopital`;
CREATE TABLE IF NOT EXISTS `hopital` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rue` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int NOT NULL,
  `site` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `hopital`
--

INSERT INTO `hopital` (`id`, `nom`, `rue`, `cp`, `site`, `created_at`, `updated_at`) VALUES
(1, 'Hôpital Sud Paris', '12 Rue de Paris', 75001, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(2, 'Hôpital Nord Paris', '45 Avenue des Fleurs', 60140, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(3, 'Hôpital Général de Lyon', '78 Rue Victor Hugo', 69760, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(4, 'Hôpital Général de Marseille', '22 Boulevard du Prado', 13124, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(5, 'Hôpital Général de Bordeaux', '35 Allée des Vignes', 33750, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(6, 'Hôpital Général de Nantes', '50 Quai de Loire', 44470, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(7, 'Hôpital Général de Toulouse', '10 Rue de la Garonne', 31600, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(8, 'Hôpital Général de Strasbourg', '88 Rue des Vosges', 67550, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(9, 'Hôpital Général de Rennes', '5 Rue de Bretagne', 35131, NULL, '2024-11-17 13:42:53', '2024-11-17 13:42:53'),
(12, 'Hopital de HSP', '147 Av de la tourette', 93400, 'https://github.com/IRotcivI/HSP-Projet', '2024-11-25 14:45:30', '2024-11-25 14:45:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mdpreset`
--

INSERT INTO `mdpreset` (`mdpResetId`, `mdpResetEmail`, `mdpResetSelector`, `mdpResetToken`, `mdpResetTemps`) VALUES
(11, 'v.faye@lprs.fr', '0504284d02fec492', '$2y$10$01Pf704IjhP4E5y1RsRLauRwQey26XPrkB3/ZfNHevcMyDyLsqk/S', '1733154644');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tache` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaire` int NOT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `titre`, `description`, `tache`, `date`, `salaire`, `type`) VALUES
(7, 'TEST', '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur cum dolore dolorum eveniet fuga in ipsam ipsum iste necessitatibus nemo neque odio officiis reprehenderit, sed tempori', 'TEST', '01/01/2000', 1000, 'CDI');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_utilisateurpost` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `titre`, `categorie`, `contenu`, `ref_utilisateur`, `created_at`, `updated_at`) VALUES
(11, 'gh', 'general', 'gh', 28, '2024-12-09 14:02:06', '2024-12-09 14:02:06'),
(12, 'TEST', 'general', 'TEST', 28, '2024-12-09 14:49:21', '2024-12-09 14:49:21');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int NOT NULL AUTO_INCREMENT,
  `contenu` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_post` int NOT NULL,
  `ref_utilisateur` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_reponsepost` (`ref_post`),
  KEY `fk_reponseutilisateur` (`ref_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `specialite`
--

INSERT INTO `specialite` (`id`, `nom`) VALUES
(1, 'Cardiologue'),
(2, 'Neurologue'),
(3, 'Gastroentérologue'),
(4, 'Dermatologue'),
(5, 'Pédiatrie'),
(6, 'Oncologue'),
(7, 'Pneumologue'),
(8, 'Rhumatologue'),
(9, 'Endocrinologue'),
(10, 'Ophtalmologue'),
(11, 'Gynécologue'),
(12, 'Psychiatre'),
(13, 'Urologue'),
(14, 'Néphrologue'),
(15, 'Hématologue'),
(16, 'Oto-rhino-laryngologue'),
(17, 'Chirurgien orthopédique'),
(18, 'Anesthésiologue'),
(19, 'Médecin interne'),
(20, 'Médecin généraliste');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fonction` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `poste` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formation` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_specialite` int DEFAULT NULL,
  `ref_hopital` int DEFAULT NULL,
  `inscrit` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_email_unique` (`email`),
  KEY `fk_userhopital` (`ref_hopital`),
  KEY `fk_userspecialite` (`ref_specialite`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`, `fonction`, `poste`, `cv`, `formation`, `ref_specialite`, `ref_hopital`, `inscrit`) VALUES
(24, 'FAYE', 'Victor', 'funcyuncle@gmail.com', '$2y$10$8l874nvhNo/LiNQxzJO4VOpD8SwPr4o9NNyQ6UtRuMDKIc5Xv0CBi', 'professeur', NULL, 'CV.pdf', 'BTS SIO', NULL, NULL, 0),
(26, 'FAYE', 'Victor', 'r.asad@lprs.fr', '$2y$10$dOKOERVGS5iO4UBChumM9OjUShmnkDhXKGSov24CNRxq.pjLH8XTe', 'entreprise', 'Technicien', NULL, NULL, NULL, NULL, 0),
(27, 'FAYE', 'Victor', 'hsp.fleshy970@passinbox.com', '$2y$10$fG0Z4MwOTSnt3BhAtNtPw.8enIUAu1d7XX4nxtHgMbo4ScQKhOcEO', 'eleve', NULL, 'CV_FV.pdf', 'BTS SIO', NULL, NULL, 0),
(28, 'FAYE', 'Victor', 'v.faye@lprs.fr', '$2y$10$W7zH1CzxGqYhTOdLm2rx5.dMyhqyNE8QjTTV39up32yxFhehcdVYS', 'eleve', NULL, 'CV_FV.pdf', 'BTS SIO', NULL, NULL, 1),
(29, 'DJAIZ', 'Selim', 'v.f@lprs.fr', '$2y$10$0J4J.uXgl4qO4L.p4NN.Yu0cgevAtRTOKd8zgF4Koh89jaRZWiouW', 'professeur', NULL, NULL, NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_offre`
--

DROP TABLE IF EXISTS `utilisateur_offre`;
CREATE TABLE IF NOT EXISTS `utilisateur_offre` (
  `ref_utilisateur` int NOT NULL,
  `ref_offre` int NOT NULL,
  KEY `fk_offrecandidature` (`ref_offre`),
  KEY `fk_usercandidature` (`ref_utilisateur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fiche_evenement`
--
ALTER TABLE `fiche_evenement`
  ADD CONSTRAINT `fk_eve_hopital` FOREIGN KEY (`ref_hopital`) REFERENCES `hopital` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_utilisateur_evenement` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `fich_eve_utilisateur`
--
ALTER TABLE `fich_eve_utilisateur`
  ADD CONSTRAINT `fk_event` FOREIGN KEY (`ref_fiche_evenement`) REFERENCES `fiche_evenement` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_userevent` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_utilisateurpost` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponsepost` FOREIGN KEY (`ref_post`) REFERENCES `post` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_reponseutilisateur` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_userhopital` FOREIGN KEY (`ref_hopital`) REFERENCES `hopital` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_userspecialite` FOREIGN KEY (`ref_specialite`) REFERENCES `specialite` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `utilisateur_offre`
--
ALTER TABLE `utilisateur_offre`
  ADD CONSTRAINT `fk_offrecandidature` FOREIGN KEY (`ref_offre`) REFERENCES `offre` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_usercandidature` FOREIGN KEY (`ref_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;