-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 28 mars 2019 à 15:58
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `dislikedshops`
--

DROP TABLE IF EXISTS `dislikedshops`;
CREATE TABLE IF NOT EXISTS `dislikedshops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `dislikedshops`
--

INSERT INTO `dislikedshops` (`id`, `user_id`, `shop_id`, `created_at`) VALUES
(5, 6, 8, '2019-03-28 15:22:10'),
(6, 6, 6, '2019-03-28 15:46:27'),
(7, 7, 2, '2019-03-28 15:56:21'),
(8, 6, 3, '2019-03-28 16:56:04');

-- --------------------------------------------------------

--
-- Structure de la table `preferredshops`
--

DROP TABLE IF EXISTS `preferredshops`;
CREATE TABLE IF NOT EXISTS `preferredshops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `shop_id` (`shop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `preferredshops`
--

INSERT INTO `preferredshops` (`id`, `user_id`, `shop_id`) VALUES
(38, 6, 2),
(40, 6, 5),
(41, 6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `shops`
--

DROP TABLE IF EXISTS `shops`;
CREATE TABLE IF NOT EXISTS `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `image` varchar(45) NOT NULL,
  `distance` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `shops`
--

INSERT INTO `shops` (`id`, `name`, `image`, `distance`) VALUES
(1, 'Shop1', 'image.png', 80),
(2, 'Shop2', 'image.png', 20),
(3, 'Shop3', 'image.png', 30),
(4, 'Shop4', 'image.png', 60),
(5, 'Shop5', 'image.png', 50),
(6, 'Shop6', 'image.png', 10),
(7, 'Shop7', 'image.png', 70),
(8, 'Shop8', 'image.png', 40);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `mail` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `mail`, `password`) VALUES
(6, 'mansouri', 'kawtar', 'kawtarevans@gmail.com', '$2y$10$OoODpoaynYhwrY7T5Fi61.KgM8SgZ2SVZAFgnZx5Ttyh82wd1CfD2'),
(7, 'mansouri', 'kawtar', 'mansourikawtar93@gmail.com', '$2y$10$QoDr8qf2yDUKL02wiIO.f.9hPqdk0hxORxNOLupoGJzsTtkD8RWby');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `dislikedshops`
--
ALTER TABLE `dislikedshops`
  ADD CONSTRAINT `dislikedshops_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dislikedshops_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Contraintes pour la table `preferredshops`
--
ALTER TABLE `preferredshops`
  ADD CONSTRAINT `preferredshops_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `preferredshops_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
