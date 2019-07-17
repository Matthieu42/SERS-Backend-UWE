-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 17 juil. 2019 à 08:31
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
SET FOREIGN_KEY_CHECKS=0;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `sers`
--

--
-- Déchargement des données de la table `components`
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

--
-- Déchargement des données de la table `date`
--

INSERT INTO `Date` (`id`, `date`) VALUES
(1, '2019-07-05 15:00:00'),
(2, '2019-07-10 13:00:00'),
(3, '2019-07-11 08:00:00'),
(4, '2019-07-15 09:30:00'),
(5, '2019-07-16 09:00:00'),
(6, '2019-07-17 09:00:00');

--
-- Déchargement des données de la table `exam`
--

INSERT INTO `Exam` (`id`, `date_id`, `component_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 4),
(4, 4, 5),
(5, 5, 3);

--
-- Déchargement des données de la table `modules`
--

INSERT INTO `Modules` (`id`, `title`, `acronym`) VALUES
(1, 'Web Programming', 'WP'),
(2, 'Web Design ', 'WD'),
(3, 'Content Management System', 'CMS'),
(4, 'Legal Ethical Social and Professional Issues', 'LESPI'),
(5, 'Web Development Frameworks', 'WDF'),
(6, 'Web Technologies', 'WT');

--
-- Déchargement des données de la table `modules_user`
--

INSERT INTO `modules_user` (`modules_id`, `user_id`) VALUES
(1, 1),
(1, 4),
(1, 5),
(2, 5),
(2, 6),
(2, 7);

--
-- Déchargement des données de la table `noteexam`
--

INSERT INTO `NoteExam` (`id`, `user_id`, `exam_id`, `note`) VALUES
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

--
-- Déchargement des données de la table `resitexam`
--

INSERT INTO `ResitExam` (`id`, `date_id`, `user_id`, `modules_id`, `aPaye`, `note`) VALUES
(1, 6, 6, 2, 1, 59);

--
-- Déchargement des données de la table `typecomponent`
--

INSERT INTO `TypeComponent` (`id`, `name`) VALUES
(1, 'Assignment'),
(2, 'Lab Tests'),
(3, 'Written Exam');

--
-- Déchargement des données de la table `user`
--

INSERT INTO `User` (`id`, `name`, `email`, `address`, `saltKey`, `password`, `isAdmin`) VALUES
(1, 'Jimmy', 'jimmy@uwe.com', '763 road TRUC', 'jidsd', 'root_jimmy', 0),
(4, 'Alexis', 'alexis@uwe.com', '526 road BROMA', 'dsfjdsl', 'root_alexis', 0),
(5, 'Mathew', 'mathew@uwe.com', '958 road TARD', 'ifdsjp', 'root_mathew', 0),
(6, 'Corentin', 'corentin@uwe.com', '324 road WEEB', 'udshfoskj', 'root_corentin', 0),
(7, 'Bastien', 'bastien@uwe.com', '3256 road BURP', 'sduifhois', 'root_bastien', 0),
(8, 'Professor', 'professor@uwe.com', '6543 road BADOUM_TCHHSSSS', 'dsufojsdpf', 'root_professor', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
SET FOREIGN_KEY_CHECKS=1;