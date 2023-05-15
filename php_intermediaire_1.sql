-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 mai 2023 à 14:50
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `php_intermediaire_1`
--

-- --------------------------------------------------------

--
-- Structure de la table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` text NOT NULL,
  `city_size` int NOT NULL,
  `city_habitants` text NOT NULL,
  `city_description` text NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `city_size`, `city_habitants`, `city_description`) VALUES
(1, 'Paris', 105, '2.161 millions', 'Paris, capitale de la France, est une grande ville européenne et un centre mondial de l\'art, de la mode, de la gastronomie et de la culture. Son paysage urbain du XIXe siècle est traversé par de larges boulevards et la Seine. Outre les monuments comme la tour Eiffel et la cathédrale gothique Notre-Dame du XIIe siècle, la ville est réputée pour ses cafés et ses boutiques de luxe bordant la rue du Faubourg-Saint-Honoré.'),
(2, 'Nice', 72, '342 522', 'Nice est la capitale du département des Alpes-Maritimes sur la Côte d\'Azur. Elle est située sur le littoral de galets de la baie des Anges. Fondée par les Grecs puis prisée par l\'élite européenne au XIXe siècle, la ville attire l\'attention des artistes depuis longtemps. Le musée Henri Matisse est consacré au parcours artistique du peintre niçois. Le musée Marc Chagall abrite certaines des plus grandes œuvres religieuses de l\'artiste auquel il doit son nom'),
(3, 'Pau', 32, '77 215', 'Pau est une ville située dans le sud-ouest de la France, le long de l\'arête nord des Pyrénées, à environ 85 km de la frontière espagnole. En arpentant le boulevard des Pyrénées, dans le centre-ville, les piétons pourront admirer la campagne et profiter d\'un panorama sur les montagnes par temps clair. Le boulevard mène au château de Pau, lieu de naissance de Henri IV, roi de France et de Navarre. Il expose aujourd\'hui des tapisseries, du mobilier et des œuvres d\'art de l\'époque. '),
(4, 'Toulouse', 118, '471 941', 'Toulouse est une commune française, chef-lieu de la région Occitanie, préfecture du département de la Haute-Garonne, et siège de Toulouse Métropole. La ville de Toulouse était également le chef-lieu de l\'ancienne région Midi-Pyrénées jusqu\'à sa disparition au 1ᵉʳ janvier 2016.'),
(5, 'Quimperlé', 84, '63 508', 'Quimper est une commune française de la région Bretagne située dans le nord-ouest de la France. La ville est la préfecture du département du Finistère, le siège du Conseil départemental, ainsi que des deux cantons qui la composent.'),
(6, 'Pont-Aven', 30, '2 823', 'Pont-Aven [pɔ̃tavɛn] est une commune du département du Finistère dans la région Bretagne en France. Pont-Aven est surnommée « la cité des peintres » car de nombreux peintres, dont Gauguin, y ont séjourné');

-- --------------------------------------------------------

--
-- Structure de la table `search`
--

DROP TABLE IF EXISTS `search`;
CREATE TABLE IF NOT EXISTS `search` (
  `search_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `ville_id` int NOT NULL,
  PRIMARY KEY (`search_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `search`
--

INSERT INTO `search` (`search_id`, `user_id`, `ville_id`) VALUES
(13, 1, 5),
(12, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_password`) VALUES
(1, 'tloudoux', 'azerty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
