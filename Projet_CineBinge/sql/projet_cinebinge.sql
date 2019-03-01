-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 01 mars 2019 à 12:06
-- Version du serveur :  10.1.38-MariaDB
-- Version de PHP :  7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_cinebinge`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `IDFILM` int(11) NOT NULL,
  `TITRE` varchar(255) NOT NULL,
  `AFFICHE` text NOT NULL,
  `BANDEANNONCE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`IDFILM`, `TITRE`, `AFFICHE`, `BANDEANNONCE`) VALUES
(2, 'Spider-Man: Far from Home', 'http://fr.web.img5.acsta.net/pictures/19/01/17/12/00/4297458.jpg', 'http://video.cinetrafic.fr/videos/173645_sd.mp4'),
(3, 'Ready Player One', 'https://www.avoir-alire.com/IMG/arton37657.jpg', 'http://video.cinetrafic.fr/videos/149443_sd.mp4'),
(4, 'Mission : Impossible - Fallout', 'http://fr.web.img5.acsta.net/pictures/18/05/14/16/32/0850449.jpg', 'http://video.cinetrafic.fr/videos/150121_sd.mp4');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IDFILM`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `IDFILM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
