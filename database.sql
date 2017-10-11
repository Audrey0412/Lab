-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 11 Octobre 2017 à 14:37
-- Version du serveur :  5.5.42
-- Version de PHP :  7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `nationality` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `author`
--

INSERT INTO `author` (`id`, `firstname`, `lastname`, `nationality`) VALUES
(1, 'Victor', 'Hugo', 'French'),
(2, 'J.K', 'Rowling', 'British'),
(3, 'Nicholas', 'Sparks', 'American'),
(4, 'Lewis', 'Caroll', 'British'),
(5, 'Stephen', 'King', 'American'),
(6, 'Peter', 'Straub', 'American');

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL,
  `reserved` tinyint(1) NOT NULL DEFAULT '0',
  `img` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `reserved`, `img`) VALUES
(1, 'The Notebook', 'Nicholas Sparks', 0, 'notebook.jpg'),
(2, 'Alice In Wonderland', 'Lewis Carroll', 0, 'alice.jpg'),
(3, 'A walk To Remember', 'Nicholas Sparks', 0, 'walk.jpg'),
(4, 'Harry Potter', 'JK.Rowling', 0, 'harry.jpg'),
(7, 'Les Mis&eacute;rables', 'Victor Hugo', 0, '150755766097.jpg'),
(8, 'The Talisman', 'Peter Straub and Stephen King', 0, 'talisman.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `book_author`
--

CREATE TABLE `book_author` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `book_author`
--

INSERT INTO `book_author` (`id`, `book_id`, `author_id`) VALUES
(1, 1, 3),
(2, 3, 3),
(5, 4, 2),
(6, 2, 4),
(7, 7, 1),
(8, 8, 5),
(9, 8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `picture`
--

INSERT INTO `picture` (`id`, `name`, `id_user`) VALUES
(1, '150694501587.jpg', 1),
(2, '150694753061.jpg', 1),
(3, '150694755794.jpg', 1),
(4, '150755826889.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `admin`) VALUES
(1, 'Audrey', '$2a$10$CsONB9WQR9hk4j78pVPmau0yFxjfSdDvbupTRrKsUv9aSuAV/Oga2', 1),
(3, 'Bastien', '$2a$10$hstSrfWCdsfCBQU7lG6q8ukqixgwlzME.My7AS.VgyCdsJopDoLQC', 0),
(4, 'Antoine', '$2a$10$yYXUrbz9aY2mAykuFWE5p.WG9IBQp7G13LnTTHfAqWJi.ydRL6RIa', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `book_author`
--
ALTER TABLE `book_author`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `book_author`
--
ALTER TABLE `book_author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;