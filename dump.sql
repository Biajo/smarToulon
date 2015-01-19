-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Lun 19 Janvier 2015 à 16:11
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `tpmsmartcity`
--
CREATE DATABASE `tpmsmartcity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tpmsmartcity`;

-- --------------------------------------------------------

--
-- Structure de la table `identifiants`
--

CREATE TABLE IF NOT EXISTS `identifiants` (
  `idTag` int(30) NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `motdepasse` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `identifiants`
--

INSERT INTO `identifiants` (`idTag`, `login`, `motdepasse`) VALUES
(566151, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `resultats`
--

CREATE TABLE IF NOT EXISTS `resultats` (
  `idTag` int(30) NOT NULL,
  `temps` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
