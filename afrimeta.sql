-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 19 juin 2022 à 02:50
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afrimeta`
--

-- --------------------------------------------------------

--
-- Structure de la table `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `genre` enum('homme','femme') NOT NULL,
  `github` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `biographie` varchar(255) DEFAULT NULL,
  `disponibilite` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `profile`
--

INSERT INTO `profile` (`id`, `id_utilisateur`, `image`, `ville`, `pays`, `genre`, `github`, `facebook`, `biographie`, `disponibilite`) VALUES
(2, 2, NULL, 'Brazzaville', 'Congo', 'homme', 'https://github.com/massiresogore', 'https://www.facebook.com/massiremsr/', 'Je suis un développeur en devenir', '0');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `posts` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `reinitialisePsw`
--

CREATE TABLE `reinitialisePsw` (
  `id_reinitialisePsw` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `email`, `password`, `token`, `active`, `date`) VALUES
(2, 'Massire Modifier', 'sogoremassire.fr@gmail.com', '$2y$10$0oTFCLRnwTwrcUGLoHC8/e5wYbzUzANUYBEdDNpK3ybXkGMLRnCuy', 'abcd', '1', '2022-06-09 19:39:41'),
(3, 'madesou', 'so@gmail.com', 'jfnbsjhngjsnbsf', 'valide', '1', '2022-06-11 23:28:03'),
(4, 'polo', 'polo@gmail.com', 'jkrtzjhhy', 'valide', '1', '2022-06-11 23:28:03'),
(5, 'aziz', 'aziz@gmail.com', 'jfjkqskjg', 'valide', '1', '2022-06-11 23:29:18'),
(6, 'dereet', 'deree@gmail.com', 'klkbdgbgg', 'valide', '1', '2022-06-11 23:29:18'),
(7, 'Bathé', 'qa@h', '$2y$10$u5GS6zl5tcySr.Tc3IB9mezeqKAAgJNcx9CnAdRn6b30pLKw13hPS', 'valide', '1', '2022-06-16 21:07:22');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_utilisateur`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_utilisateur`);

--
-- Index pour la table `reinitialisePsw`
--
ALTER TABLE `reinitialisePsw`
  ADD PRIMARY KEY (`id_reinitialisePsw`),
  ADD KEY `id_user` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `reinitialisePsw`
--
ALTER TABLE `reinitialisePsw`
  MODIFY `id_reinitialisePsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `publication_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`);

--
-- Contraintes pour la table `reinitialisePsw`
--
ALTER TABLE `reinitialisePsw`
  ADD CONSTRAINT `reinitialisepsw_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
