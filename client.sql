-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 26 Février 2017 à 10:12
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `connectlife`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `civilite` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `poste_occupe` varchar(255) DEFAULT NULL,
  `nom_societe` varchar(255) DEFAULT NULL,
  `adresse1` varchar(255) NOT NULL,
  `adresse2` varchar(255) DEFAULT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `telephone1` int(11) NOT NULL,
  `telephone2` int(11) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `GUID` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `civilite`, `nom`, `prenom`, `poste_occupe`, `nom_societe`, `adresse1`, `adresse2`, `code_postal`, `ville`, `telephone1`, `telephone2`, `email`, `GUID`, `created_date`) VALUES
(4, 'h', 'jeremy', 'bonhomme', 'developpeur', 'ducatillon', 'la bas', '', 62190, 'ici', 648656565, 648656565, 'jeremy.bonhomme@societe2.fr', '1fde3e0a-d149-473d-ad92-7a979c06f01c', '2017-02-17 12:04:34'),
(6, 'h', 'dupont', 'maurice', 'developpeur', 'La poste', 'blabla', 'blabla', 56098, 'weppes', 648656565, 648656565, 'dupontmaurice@societe2.com', '1eee4438-6095-4531-acaf-e0436caf9e81', '2017-02-20 14:12:55');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
