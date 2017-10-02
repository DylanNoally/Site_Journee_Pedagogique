-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 02 Octobre 2017 à 17:02
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `journee_pedagogique`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `IMA_Id` int(255) NOT NULL AUTO_INCREMENT,
  `IMA_Titre` varchar(255) NOT NULL,
  `IMA_Description` varchar(255) NOT NULL,
  `IMA_Url` varchar(500) NOT NULL,
  PRIMARY KEY (`IMA_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `texte`
--

CREATE TABLE IF NOT EXISTS `texte` (
  `TEX_Id` int(255) NOT NULL AUTO_INCREMENT,
  `TEX_Title` varchar(255) NOT NULL,
  `TEX_Text` varchar(255) NOT NULL,
  PRIMARY KEY (`TEX_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `UTI_Id` int(255) NOT NULL AUTO_INCREMENT,
  `UTI_Login` varchar(255) NOT NULL,
  `UTI_Password` varchar(255) NOT NULL,
  PRIMARY KEY (`UTI_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`UTI_Id`, `UTI_Login`, `UTI_Password`) VALUES
(1, 'noally', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9'),
(2, 'macciocu', '1cfe25a1af55d49242b8aee168675c41b644153f'),
(3, 'aliouate', '81ca33ab1766c0893a450c9680b2bcd6319a9712'),
(4, 'mandambu', 'gradi'),
(5, 'idasiak', 'mikael'),
(6, 'ammar', 'fethi'),
(7, 'jullien', 'marienoelle');

-- --------------------------------------------------------

--
-- Structure de la table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `VID_Id` int(255) NOT NULL AUTO_INCREMENT,
  `VID_Date` date NOT NULL,
  `VID_Url` varchar(500) NOT NULL,
  PRIMARY KEY (`VID_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
