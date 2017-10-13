-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 13 Octobre 2017 à 17:30
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `journee_pedagogique`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `IMA_Id` int(255) NOT NULL,
  `IMA_Titre` varchar(255) NOT NULL,
  `IMA_Description` varchar(255) NOT NULL,
  `IMA_Chemin` varchar(500) NOT NULL,
  `IMA_Type` varchar(50) NOT NULL,
  `UTI_Id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

CREATE TABLE `texte` (
  `TEX_Id` int(255) NOT NULL,
  `TEX_Titre` varchar(255) NOT NULL,
  `TEX_Text` text NOT NULL,
  `TEX_Type` varchar(50) NOT NULL,
  `UTI_Id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `UTI_Id` int(255) NOT NULL,
  `UTI_Login` varchar(255) NOT NULL,
  `UTI_Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UTI_Id`, `UTI_Login`, `UTI_Password`) VALUES
(1, 'noally', 'dd378c4ca75f71f527acddef5b43fc35b68d5b7a'),
(2, 'macciocu', '1cfe25a1af55d49242b8aee168675c41b644153f'),
(3, 'aliouate', '81ca33ab1766c0893a450c9680b2bcd6319a9712'),
(4, 'mandambu', '3dd56b8235f2c1a3a223cb28265966cdf9980953'),
(5, 'idasiak', 'db0bc01cafdcc5adfb51f6844b2d7ab21963ee5d'),
(6, 'ammar', 'e00219825c863b6dba902abc8e24f4a55fa869b0'),
(7, 'jullien', '34cb3feefc55af26d439d4b0a34d74f5ce7f947c');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE `video` (
  `VID_Id` int(255) NOT NULL,
  `VID_Date` date NOT NULL,
  `VID_Lien` varchar(500) NOT NULL,
  `VID_Titre` varchar(255) DEFAULT NULL,
  `VID_Type` varchar(50) NOT NULL,
  `UTI_Id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`IMA_Id`),
  ADD KEY `#UTI_Id` (`UTI_Id`);

--
-- Index pour la table `texte`
--
ALTER TABLE `texte`
  ADD PRIMARY KEY (`TEX_Id`),
  ADD KEY `#UTI_Id` (`UTI_Id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`UTI_Id`);

--
-- Index pour la table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`VID_Id`),
  ADD KEY `VID_Id` (`VID_Id`),
  ADD KEY `#UTI_Id` (`UTI_Id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `IMA_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `texte`
--
ALTER TABLE `texte`
  MODIFY `TEX_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `UTI_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `video`
--
ALTER TABLE `video`
  MODIFY `VID_Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `key1` FOREIGN KEY (`UTI_Id`) REFERENCES `utilisateur` (`UTI_Id`);

--
-- Contraintes pour la table `texte`
--
ALTER TABLE `texte`
  ADD CONSTRAINT `key2` FOREIGN KEY (`UTI_Id`) REFERENCES `utilisateur` (`UTI_Id`);

--
-- Contraintes pour la table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `key3` FOREIGN KEY (`UTI_Id`) REFERENCES `utilisateur` (`UTI_Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
