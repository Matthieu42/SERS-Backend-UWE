-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 18 juil. 2019 à 08:34
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sers`
--
CREATE DATABASE IF NOT EXISTS `sers` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sers`;

-- --------------------------------------------------------

--
-- Structure de la table `Components`
--

DROP TABLE IF EXISTS `Components`;
CREATE TABLE IF NOT EXISTS `Components` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modules_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `percentage` double NOT NULL,
  `typeComponent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A115F62D60D6DC42` (`modules_id`),
  KEY `IDX_A115F62DEF3E1168` (`typeComponent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Components`
--

INSERT INTO `Components` (`id`, `modules_id`, `name`, `percentage`, `typeComponent_id`) VALUES
(1, 1, 'Assignment 1', 30, 1),
(2, 1, 'Lab Tests 1', 20, 2),
(3, 1, 'Written Exam 1', 50, 3),
(4, 2, 'Assignment 1', 50, 1),
(5, 2, 'Lab Tests 1', 50, 2),
(6, 3, 'Lab Tests 1', 60, 2),
(7, 3, 'Written Exam 1', 40, 3),
(8, 4, 'Assignment 1', 50, 1),
(9, 4, 'Assignment 2', 50, 1),
(10, 5, 'Assignment 1', 100, 1),
(11, 6, 'Assignment 1', 50, 1),
(12, 6, 'Assignment 2', 50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Date`
--

DROP TABLE IF EXISTS `Date`;
CREATE TABLE IF NOT EXISTS `Date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Date`
--

INSERT INTO `Date` (`id`, `date`) VALUES
(1, '2019-07-05 15:00:00'),
(2, '2019-07-10 13:00:00'),
(3, '2019-07-11 08:00:00'),
(4, '2019-07-15 09:30:00'),
(5, '2019-07-16 09:00:00'),
(6, '2019-07-17 09:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Exam`
--

DROP TABLE IF EXISTS `Exam`;
CREATE TABLE IF NOT EXISTS `Exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_id` int(11) DEFAULT NULL,
  `component_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_988909F8B897366B` (`date_id`),
  KEY `IDX_988909F8E2ABAFFF` (`component_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Exam`
--

INSERT INTO `Exam` (`id`, `date_id`, `component_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4),
(4, 4, 5),
(5, 5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Modules`
--

DROP TABLE IF EXISTS `Modules`;
CREATE TABLE IF NOT EXISTS `Modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acronym` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Modules`
--

INSERT INTO `Modules` (`id`, `title`, `acronym`) VALUES
(1, 'Web Programming', 'WP'),
(2, 'Web Design ', 'WD'),
(3, 'Content Management System', 'CMS'),
(4, 'Legal Ethical Social and Professional Issues', 'LESPI'),
(5, 'Web Development Frameworks', 'WDF'),
(6, 'Web Technologies', 'WT');

-- --------------------------------------------------------

--
-- Structure de la table `Modules_user`
--

DROP TABLE IF EXISTS `Modules_user`;
CREATE TABLE IF NOT EXISTS `Modules_user` (
  `modules_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`modules_id`,`user_id`),
  KEY `IDX_A9D4137160D6DC42` (`modules_id`),
  KEY `IDX_A9D41371A76ED395` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Modules_user`
--

INSERT INTO `Modules_user` (`modules_id`, `user_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(2, 5),
(2, 6),
(2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `Noteexam`
--

DROP TABLE IF EXISTS `Noteexam`;
CREATE TABLE IF NOT EXISTS `Noteexam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_5C6752B4A76ED395` (`user_id`),
  KEY `IDX_5C6752B4578D5E91` (`exam_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Noteexam`
--

INSERT INTO `Noteexam` (`id`, `user_id`, `exam_id`, `note`) VALUES
(1, 1, 1, '45'),
(2, 1, 2, '66'),
(3, 1, 5, '17'),
(4, 4, 1, '98'),
(5, 4, 2, '57'),
(6, 4, 5, '67'),
(7, 5, 1, '64'),
(8, 5, 2, '84'),
(9, 5, 3, '39'),
(10, 5, 4, '79'),
(11, 5, 5, '59'),
(12, 6, 3, '22'),
(13, 6, 4, '34'),
(14, 7, 3, '58'),
(15, 7, 4, '44');

-- --------------------------------------------------------

--
-- Structure de la table `Resitexam`
--

DROP TABLE IF EXISTS `Resitexam`;
CREATE TABLE IF NOT EXISTS `Resitexam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `modules_id` int(11) DEFAULT NULL,
  `aPaye` tinyint(1) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6542D74EB897366B` (`date_id`),
  KEY `IDX_6542D74EA76ED395` (`user_id`),
  KEY `IDX_6542D74E60D6DC42` (`modules_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Resitexam`
--

INSERT INTO `Resitexam` (`id`, `date_id`, `user_id`, `modules_id`, `aPaye`, `note`) VALUES
(1, 6, 6, 2, 1, 59);

-- --------------------------------------------------------

--
-- Structure de la table `Typecomponent`
--

DROP TABLE IF EXISTS `Typecomponent`;
CREATE TABLE IF NOT EXISTS `Typecomponent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `Typecomponent`
--

INSERT INTO `Typecomponent` (`id`, `name`) VALUES
(1, 'Assignment'),
(2, 'Lab Tests'),
(3, 'Written Exam');

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `saltKey` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `address`, `saltKey`, `password`, `isAdmin`) VALUES
(1, 'Jimmy', 'jimmy@uwe.com', '763 road TRUC', 'jidsd', 'root_jimmy', 0),
(4, 'Alexis', 'alexis@uwe.com', '526 road BROMA', 'dsfjdsl', 'root_alexis', 0),
(5, 'Mathew', 'mathew@uwe.com', '958 road TARD', 'ifdsjp', 'root_mathew', 0),
(6, 'Corentin', 'corentin@uwe.com', '324 road WEEB', 'udshfoskj', 'root_corentin', 0),
(7, 'Bastien', 'bastien@uwe.com', '3256 road BURP', 'sduifhois', 'root_bastien', 0),
(8, 'Professor', 'professor@uwe.com', '6543 road BADOUM_TCHHSSSS', 'dsufojsdpf', 'root_professor', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Components`
--
ALTER TABLE `Components`
  ADD CONSTRAINT `FK_A115F62D60D6DC42` FOREIGN KEY (`modules_id`) REFERENCES `Modules` (`id`),
  ADD CONSTRAINT `FK_A115F62DEF3E1168` FOREIGN KEY (`typeComponent_id`) REFERENCES `Typecomponent` (`id`);

--
-- Contraintes pour la table `Exam`
--
ALTER TABLE `Exam`
  ADD CONSTRAINT `FK_988909F8B897366B` FOREIGN KEY (`date_id`) REFERENCES `Date` (`id`),
  ADD CONSTRAINT `FK_988909F8E2ABAFFF` FOREIGN KEY (`component_id`) REFERENCES `Components` (`id`);

--
-- Contraintes pour la table `Modules_user`
--
ALTER TABLE `Modules_user`
  ADD CONSTRAINT `FK_A9D4137160D6DC42` FOREIGN KEY (`modules_id`) REFERENCES `Modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A9D41371A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `Noteexam`
--
ALTER TABLE `Noteexam`
  ADD CONSTRAINT `FK_5C6752B4578D5E91` FOREIGN KEY (`exam_id`) REFERENCES `Exam` (`id`),
  ADD CONSTRAINT `FK_5C6752B4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Contraintes pour la table `Resitexam`
--
ALTER TABLE `Resitexam`
  ADD CONSTRAINT `FK_6542D74E60D6DC42` FOREIGN KEY (`modules_id`) REFERENCES `Modules` (`id`),
  ADD CONSTRAINT `FK_6542D74EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`),
  ADD CONSTRAINT `FK_6542D74EB897366B` FOREIGN KEY (`date_id`) REFERENCES `Date` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
