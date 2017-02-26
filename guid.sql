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
-- Structure de la table `guid`
--

CREATE TABLE `guid` (
  `GUID` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `societe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `guid`
--

INSERT INTO `guid` (`GUID`, `nom`, `email`, `societe`) VALUES
('1eee4438-6095-4531-acaf-e0436caf9e81', 'Dupont', 'dupontmaurice@societe2.com', '1'),
('1fde3e0a-d149-473d-ad92-7a979c06f01c', 'Bonhomme', 'jeremy.bonhomme@societe2.fr', '1'),
('261ecd2a-a324-411c-bbdd-3d6ab304d3a1', 'Durand', 'thomas.durand@societe4.fr', '0'),
('5253d3da-e0b6-461b-9240-9c2603b3614b', 'Bonhomme', 'jeremy.bonhomme@societe4.fr', '1'),
('553d2066-ff19-42dc-b08e-c8ed676e8d3b', 'Dupond', 'stephane.dupond@societe1.fr', '0'),
('64fbf526-3839-40f0-a03a-558d16c4b65f', 'Durand', 'thomas.durand@societe2.fr', '0'),
('699a83fe-82d1-41e8-bcfd-d9a25635e196', 'Dupond', 'stephane.dupond@societe3.fr', '1'),
('88be008e-fc71-4c36-b9c8-0871c70c80b2', 'Durand', 'thomas.durand@societe3.fr', '0'),
('8ce92784-91f8-477c-8f0b-037295df54b4', 'Durand', 'thomas.durand@societe1.fr', '0'),
('90776f84-94a3-492b-853b-bff77d416e6b', 'Dupont', 'fdupont@societe1.com', '1'),
('99ded90e-8513-4213-adca-2332393b8aa5', 'Durant', 'thomas.durant@societe1.fr', '1'),
('9ecdda99-2517-49a4-a376-2292a4a8c3e7', 'Bonhomme', 'jeremy.bonhomme@societe1.fr', '1'),
('a86d7d10-4850-4fbc-8b9e-ae9e262b29e1', 'Durant', 'thomas.durant@societe3.fr', '1'),
('b438c72f-7c27-4118-9da8-43a1bb7fb20e', 'Durant', 'thomas.durant@societe4.fr', '1'),
('c11c98f9-414b-4775-b206-3fa380df42eb', 'Durant', 'thomas.durant@societe2.fr', '0'),
('c1417696-392b-4053-8864-12bf8f8d5236', 'Dupont', 'fdupont@gmail.com', '0'),
('d389bd92-acf4-4f3d-814f-7ff093a9603e', 'Dupond', 'stephane.dupond@societe2.fr', '0'),
('db203954-b99b-4d41-a270-ef7d52405ea2', 'Dupont', 'stephane.dupont@societe3.fr', '1'),
('e00ea584-f8a1-41c0-b232-a9671fbe65da', 'Bonhomme', 'jeremy.bonhomme@societe6.fr', '0'),
('e4cfce81-72b2-4708-ab86-7c37cb091755', 'Bonhomme', 'jeremy.bonhomme@societe5.fr', '0');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `guid`
--
ALTER TABLE `guid`
  ADD PRIMARY KEY (`GUID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
