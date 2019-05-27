-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 27 mai 2019 à 15:11
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_de_classe` varchar(30) NOT NULL,
  `niveau` varchar(30) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_de_classe` (`nom_de_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `nom_de_classe`, `niveau`, `description`) VALUES
(1, 'Terminal S1 B', 'Terminal', 'La salle au fond'),
(5, 'Terminal S2 B', 'Terminal', NULL),
(6, '', '', NULL),
(8, 'CinquiÃ¨me B', 'CinquiÃ¨me B', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `eleves`
--

DROP TABLE IF EXISTS `eleves`;
CREATE TABLE IF NOT EXISTS `eleves` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_classe` smallint(5) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_fk` (`id_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `eleves`
--

INSERT INTO `eleves` (`id`, `nom`, `prenom`, `adresse`, `tel`, `dateNaissance`, `dateInscription`, `id_classe`) VALUES
(1, 'Sow', 'Alpha Ibrahima', 'PIKINE(Guinawrails)', '221773917854', '2010-11-30', '2019-05-26 18:28:54', 6),
(4, 'Ndiaye', 'Amado', 'KAOLACK', '998675789', '2006-11-16', '2019-05-27 02:40:50', 5),
(5, 'niane', 'El Alpha', 'KAOLACK', '998675789', '2006-11-16', '2019-05-27 15:08:27', 8);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `eleves`
--
ALTER TABLE `eleves`
  ADD CONSTRAINT `emp_fk` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
