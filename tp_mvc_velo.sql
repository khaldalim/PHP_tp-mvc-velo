-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 18 mars 2021 à 16:26
-- Version du serveur :  5.7.31
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp_mvc_velo`
--

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id_color` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id_color`, `color_name`) VALUES
(1, 'Rouge'),
(2, 'Bleu'),
(3, 'Vert'),
(4, 'Jaune'),
(5, 'Noir'),
(6, 'Blanc');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `createdAt`, `username`, `password`) VALUES
(1, '2021-03-18 09:46:49', 'leo@leo.fr', 'password');

-- --------------------------------------------------------

--
-- Structure de la table `velo`
--

DROP TABLE IF EXISTS `velo`;
CREATE TABLE IF NOT EXISTS `velo` (
  `velo_id` int(11) NOT NULL AUTO_INCREMENT,
  `velo_name` varchar(50) NOT NULL,
  `velo_price` float NOT NULL,
  `velo_height` int(11) NOT NULL,
  `velo_type` tinyint(1) NOT NULL,
  `velo_suspension` tinyint(1) NOT NULL,
  `velo_color` int(11) NOT NULL,
  PRIMARY KEY (`velo_id`),
  KEY `velo_color_id_color_fk` (`velo_color`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `velo`
--

INSERT INTO `velo` (`velo_id`, `velo_name`, `velo_price`, `velo_height`, `velo_type`, `velo_suspension`, `velo_color`) VALUES
(9, 'test', 120.6, 160, 0, 0, 2),
(8, 'vÃ©lo 155', 10.52, 120, 0, 1, 1),
(6, 'Velo1', 150.3, 120, 1, 0, 2),
(7, 'test10', 10.25, 20, 0, 0, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
