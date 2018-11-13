-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 13 nov. 2018 à 11:52
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `skicheapshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `idcategory` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idcategory`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idcategory`, `name`) VALUES
(2, 'skis'),
(3, 'poles'),
(4, 'boots'),
(5, 'accessories'),
(6, 'outfit');

-- --------------------------------------------------------

--
-- Structure de la table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `iditem` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `avaibility` tinyint(1) DEFAULT '1',
  `seller` int(11) DEFAULT NULL,
  `buyer` int(11) DEFAULT NULL,
  `category` int(11) NOT NULL,
  `price` int(5) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `imagepath` varchar(200) NOT NULL,
  `image` blob NOT NULL,
  PRIMARY KEY (`iditem`),
  KEY `seller` (`seller`),
  KEY `buyer` (`buyer`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `item`
--

INSERT INTO `item` (`iditem`, `brand`, `model`, `state`, `avaibility`, `seller`, `buyer`, `category`, `price`, `description`, `imagepath`, `image`) VALUES
(14, 'Armada', 'EDollo', 'Good', 1, 1, NULL, 2, 399, 'Greatest skis', '', ''),
(15, 'Dalbello', 'Krypton 110', 'Shit', 1, 1, NULL, 4, 10, 'Stinky', '', ''),
(16, 'K2', 'Plant', 'New', 1, 4, NULL, 3, 40, 'thief !', '', ''),
(17, 'Banchee', 'Bunguee', 'Good', 1, 4, NULL, 5, 301, '50mph at least', '', ''),
(19, 'Full Tilts', 'B&E', 'bad', 1, 1, NULL, 4, 20, 'Smells bad', '', ''),
(21, 'Armada', 'JJ', 'good', 1, 4, NULL, 2, 600, 'RIP', '', ''),
(22, 'y', 'h', 'new', 1, 1, NULL, 2, 2, 'hh', '32752105_10214698924539814_8199643943080558592_n.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `idpeople` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idpeople`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `people`
--

INSERT INTO `people` (`idpeople`, `name`, `email`, `pass`) VALUES
(1, 'Val', 'val@gmail.com', 'ok'),
(2, 'Val', 'val3r.x@gmail.com', 'okok'),
(4, 'Barbora', 'barbo@ra.cz', 'cz'),
(5, 'Dollo', 'hh', 'hh'),
(6, 'gg', 'gg', 'gg'),
(7, 'rr', 'rr', 'rr'),
(8, 'aa', 'aa', 'aa'),
(9, 'qq', 'qq', 'qq');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`seller`) REFERENCES `people` (`idpeople`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`buyer`) REFERENCES `people` (`idpeople`),
  ADD CONSTRAINT `item_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`idcategory`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
