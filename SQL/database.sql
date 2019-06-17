-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 17 Juin 2019 à 15:39
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `connectedcv`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(10) DEFAULT NULL,
  `lastName` varchar(10) DEFAULT NULL,
  `description` text NOT NULL,
  `birthDate` varchar(10) DEFAULT NULL,
  `mail` varchar(20) DEFAULT NULL,
  `telephoneNumber` varchar(20) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `postalCode` int(11) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `gitLink` varchar(50) DEFAULT NULL,
  `linkedinLink` varchar(75) DEFAULT NULL,
  `picture` varchar(50) DEFAULT NULL,
  `languages` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `firstName`, `lastName`, `description`, `birthDate`, `mail`, `telephoneNumber`, `address`, `postalCode`, `city`, `gitLink`, `linkedinLink`, `picture`, `languages`) VALUES
(1, 'Rémi', 'FEYDIT', 'Actuellement en 1er année chez Ynov Informatique, je recherche actuellement un stage pour ma 2ème année qui permettrait par la suite de partir sur une alternance l\'année suivante', '10/08/1998', 'feyditremi@gmail.com', '06.68.48.05.91', '11 rue Henri Expert appt 20', 33300, 'Bordeaux', 'https://github.com/RemiFeydit', 'https://www.linkedin.com/in/r%C3%A9mi-feydit-750936165/', './images/photo.jpg', 'Français, Anglais');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `message` text,
  `sendingDate` varchar(50) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `subject`, `mail`, `message`, `sendingDate`, `idAdmin`) VALUES
(22, 'remifeydit', 'Recrutement', 'notitou.pvp@gmail.com', 'sdnvindxvhiodhiog', '2019-06-16 01:43:13', 1);

-- --------------------------------------------------------

--
-- Structure de la table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `startDate` varchar(30) DEFAULT NULL,
  `endDate` varchar(30) DEFAULT NULL,
  `schoolName` varchar(20) DEFAULT NULL,
  `degree` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `education`
--

INSERT INTO `education` (`id`, `startDate`, `endDate`, `schoolName`, `degree`, `description`, `idAdmin`) VALUES
(1, '2009', '2013', 'Collège Cheverus', 'Brevet des collèges', 'Je sais pas vraiment je rempli juste ça pour faire genre j\'ai vraiment une description mais c\'est pas vraiment vrai', 1);

-- --------------------------------------------------------

--
-- Structure de la table `professionalexperience`
--

CREATE TABLE `professionalexperience` (
  `id` int(11) NOT NULL,
  `companyName` varchar(20) DEFAULT NULL,
  `startDate` varchar(20) DEFAULT NULL,
  `endDate` varchar(20) DEFAULT NULL,
  `jobName` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `professionalexperience`
--

INSERT INTO `professionalexperience` (`id`, `companyName`, `startDate`, `endDate`, `jobName`, `description`, `idAdmin`) VALUES
(2, 'La Poste', 'Juillet 2017', 'Août 2017', 'Facteur à vélo', 'J\'ai effectué un travail de facteur à vélo. Le travail consistait à préparer ses tournées, trier le courrier et partir en tournée afin de distribuer les courriers que ce soit des lettres, des colis ou des recommandés. Le travail permettait de rencontrer des gens ainsi que l\'organisation de son courrier pour suivre le plan de sa tournée.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skillName` varchar(20) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `skills`
--

INSERT INTO `skills` (`id`, `skillName`, `level`, `idAdmin`) VALUES
(10, 'Programmation C', 50, 1),
(11, 'Python', 80, 1),
(12, 'SQL', 85, 1),
(13, 'PHP', 80, 1),
(14, 'Nul', 50, 1);

-- --------------------------------------------------------

--
-- Structure de la table `usercv`
--

CREATE TABLE `usercv` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usercv`
--

INSERT INTO `usercv` (`id`, `name`, `password`) VALUES
(1, 'remifeydit', 'YUGIOH2013');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Index pour la table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Index pour la table `professionalexperience`
--
ALTER TABLE `professionalexperience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Index pour la table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Index pour la table `usercv`
--
ALTER TABLE `usercv`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `professionalexperience`
--
ALTER TABLE `professionalexperience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `usercv`
--
ALTER TABLE `usercv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `professionalexperience`
--
ALTER TABLE `professionalexperience`
  ADD CONSTRAINT `professionalexperience_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`id`);

--
-- Contraintes pour la table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
