-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 12 fév. 2023 à 21:23
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `meetics`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date_de_naissance` date NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `genre` enum('Homme','Femme','Autre') NOT NULL,
  `poids` enum('flyweight','bantamweight','featherweight','lightweight','welterweight','middleweight','lightheavyweight','heavyweight') NOT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `statut` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `prenom`, `nom`, `date_de_naissance`, `adresse`, `zipcode`, `ville`, `pays`, `genre`, `poids`, `mot_de_passe`, `created_at`, `updated_at`, `statut`) VALUES
(12, 'islam.makhachev@ufc.com', 'Islame', 'Makhachev', '1991-12-28', 'bonjour', 'bonjour', 'bonjour', 'bonjour', 'Femme', 'lightweight', '$2y$10$y1InCjB.l3CESFOL1sb0B.1lsXvpObYRO9zay7Wup.a5wukZM8sHS', '0000-00-00 00:00:00', '2023-02-12 19:45:55', 1),
(13, 'alexander.volkanovski@ufc.com', 'Alexander', 'Volkanovski', '1988-01-04', 'La rue secrete', '13002', 'Marseille', 'France', 'Femme', 'featherweight', '$2y$10$HWQu8QiZgK4xKYCqd.8w5.IFX7gCqDuaGrYO3wtRbKFD7SOdOOVCK', '0000-00-00 00:00:00', '2023-02-12 21:20:47', 1),
(18, 'francis.nganou@ufc.com', 'Francis', 'Nganou', '1986-02-09', 'Dans un endroit', '1475', 'Marseille', 'France', 'Autre', 'heavyweight', '$2y$10$ScciJowN8vU.Ac9Y0MJVa.JRpZUmciAoMgXzariEgZqcvTFBeM3Yy', '2023-02-09 13:44:46', '2023-02-12 16:32:33', 1),
(19, 'conor.mcgregor@ufc.com', 'Conor', 'Mcgregor', '1988-02-10', 'Dans un endroit', '1475', 'Marseille', 'France', 'Homme', 'lightweight', '$2y$10$9T.g5kwINxylNXAcA21DSeLHw0BmfbeuyK06nUjSoSgO3yiYTrhWq', '2023-02-09 13:46:00', '2023-02-12 16:32:48', 1),
(20, 'kamaru.usman@ufc.com', 'Kamaru', 'Usman', '1987-02-02', 'Dans un endroit', '1475', 'marseille', 'France', 'Homme', 'middleweight', '$2y$10$V5BUIPXOrMBlfzVTk2idjueqFgdkjZog83yrV43isXMrlT3m9Ee/q', '2023-02-09 13:47:07', '2023-02-12 16:33:04', 1),
(21, 'cyril.gane@ufc.com', 'Cyril', 'Gane', '1990-04-12', 'Un truc', '75001', 'Paris', 'France', 'Homme', 'flyweight', '$2y$10$w763b/zFea3cTh2D/1Kbf.nEpzjt80B2VUbn84IOxCQzke2ERjBHa', '2023-02-12 21:22:29', '2023-02-12 21:22:29', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_dislike`
--

CREATE TABLE `user_dislike` (
  `id_dislike` int(11) DEFAULT NULL,
  `target_dislike` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user_like`
--

CREATE TABLE `user_like` (
  `id` int(11) DEFAULT NULL,
  `target` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user_like`
--

INSERT INTO `user_like` (`id`, `target`) VALUES
(18, 20),
(18, 13),
(18, 12),
(18, 19),
(19, 20),
(13, 12),
(13, 19),
(19, 13),
(19, 12),
(19, 18),
(20, 18),
(20, 19);

-- --------------------------------------------------------

--
-- Structure de la table `user_profil`
--

CREATE TABLE `user_profil` (
  `id_user` int(11) DEFAULT NULL,
  `profil_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user_profil`
--

INSERT INTO `user_profil` (`id_user`, `profil_pic`) VALUES
(13, '13.png'),
(12, '12.png'),
(18, '18.png'),
(19, '19.png'),
(20, '20.png');

-- --------------------------------------------------------

--
-- Structure de la table `user_settings`
--

CREATE TABLE `user_settings` (
  `id_user` int(11) DEFAULT NULL,
  `pref_genre` varchar(255) NOT NULL,
  `pref_poids` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `user_settings`
--

INSERT INTO `user_settings` (`id_user`, `pref_genre`, `pref_poids`) VALUES
(12, '%%', '%%'),
(13, '%%', 'lightweight'),
(18, '%%', '%%'),
(19, '%%', '%%'),
(20, '%%', '%%'),
(21, '%%', '%%');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

--
-- Index pour la table `user_dislike`
--
ALTER TABLE `user_dislike`
  ADD KEY `id_dislike` (`id_dislike`),
  ADD KEY `target_dislike` (`target_dislike`);

--
-- Index pour la table `user_like`
--
ALTER TABLE `user_like`
  ADD KEY `id` (`id`),
  ADD KEY `target` (`target`);

--
-- Index pour la table `user_profil`
--
ALTER TABLE `user_profil`
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `user_settings`
--
ALTER TABLE `user_settings`
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user_dislike`
--
ALTER TABLE `user_dislike`
  ADD CONSTRAINT `user_dislike_ibfk_1` FOREIGN KEY (`id_dislike`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_dislike_ibfk_2` FOREIGN KEY (`target_dislike`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_like`
--
ALTER TABLE `user_like`
  ADD CONSTRAINT `user_like_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_like_ibfk_2` FOREIGN KEY (`target`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_profil`
--
ALTER TABLE `user_profil`
  ADD CONSTRAINT `user_profil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Contraintes pour la table `user_settings`
--
ALTER TABLE `user_settings`
  ADD CONSTRAINT `user_settings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
