-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 25 sep. 2017 à 12:23
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
-- Base de données :  `journee_peda`
--

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `IMA_Id` int(255) DEFAULT NULL,
  `IMA_Title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `IMA_Description` varchar(255) CHARACTER SET utf16 DEFAULT NULL,
  `IMA_Url` varchar(512) CHARACTER SET utf8 DEFAULT NULL,
  `USE_Id` int(255) NOT NULL,
  UNIQUE KEY `IMA_Id` (`IMA_Id`),
  KEY `USE_Id` (`USE_Id`),
  KEY `USE_Id_2` (`USE_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`IMA_Id`, `IMA_Title`, `IMA_Description`, `IMA_Url`, `USE_Id`) VALUES
(1, 'image1', 'Voici l\'image 1', 'url1', 1),
(2, 'image2', 'Voici l\'image 2', 'url2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `text`
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `TEX_Id` int(255) DEFAULT NULL,
  `TEX_Title` varchar(255) CHARACTER SET utf16 DEFAULT NULL,
  `TEX_Text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `USE_Id` int(255) DEFAULT NULL,
  UNIQUE KEY `TEX_Id` (`TEX_Id`),
  KEY `USE_Id` (`USE_Id`),
  KEY `USE_Id_2` (`USE_Id`),
  KEY `USE_Id_3` (`USE_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `USE_Id` int(255) DEFAULT NULL,
  `USE_Login` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `USE_Password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  UNIQUE KEY `USE_Id` (`USE_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`USE_Id`, `USE_Login`, `USE_Password`) VALUES
(1, 'user1.stvinvent', 'abc123'),
(2, 'user2.stvinvent', 'efg456');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `VID_Id` int(255) DEFAULT NULL,
  `VID_Date` datetime(3) DEFAULT NULL,
  `VID_Url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `USE_Id` int(255) NOT NULL,
  UNIQUE KEY `VID_Id` (`VID_Id`),
  KEY `USE_Id` (`USE_Id`),
  KEY `USE_Id_2` (`USE_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video`
--

INSERT INTO `video` (`VID_Id`, `VID_Date`, `VID_Url`, `USE_Id`) VALUES
(1, '2017-09-06 00:00:00.000', 'url1', 1),
(2, '2017-09-07 00:00:00.000', 'url2', 1),
(3, '2017-09-13 00:00:00.000', 'url3', 1),
(4, '2017-09-20 00:00:00.000', 'url4', 1),
(5, '2017-09-06 00:00:00.000', 'url5', 2),
(6, '2017-09-13 00:00:00.000', 'url6', 2),
(9, '2017-09-17 00:00:00.000', 'url9', 1),
(10, '2017-09-18 00:00:00.000', 'url10', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
