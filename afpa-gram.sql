-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 10 mars 2025 à 07:03
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa-gram`
--

-- --------------------------------------------------------

--
-- Structure de la table `76_comments`
--

CREATE TABLE `76_comments` (
  `com_id` int NOT NULL,
  `com_text` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_favorites`
--

CREATE TABLE `76_favorites` (
  `user_id` int NOT NULL,
  `fav_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_likes`
--

CREATE TABLE `76_likes` (
  `like_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `76_pictures`
--

CREATE TABLE `76_pictures` (
  `pic_id` int NOT NULL,
  `pic_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_pictures`
--

INSERT INTO `76_pictures` (`pic_id`, `pic_name`, `post_id`) VALUES
(1, 'terrasse_paris.jpg', 1),
(2, 'menu_saisonnier.jpg', 2),
(3, 'recette_secrete.jpg', 3),
(4, 'happy_hour.jpg', 4),
(5, 'degustation_vins.jpg', 5),
(6, 'brunch_gourmand.jpg', 6),
(7, 'dessert_nouveau.jpg', 7);

-- --------------------------------------------------------

--
-- Structure de la table `76_posts`
--

CREATE TABLE `76_posts` (
  `post_id` int NOT NULL,
  `post_timestamp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_description` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_private` tinyint NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_posts`
--

INSERT INTO `76_posts` (`post_id`, `post_timestamp`, `post_description`, `post_private`, `user_id`) VALUES
(1, '1735879200', 'Déjeuner en terrasse à Paris', 0, 1),
(2, '1735889400', 'Nouveau menu saisonnier', 0, 1),
(3, '1735902300', 'Recette secrète dévoilée', 0, 1),
(4, '1735912800', 'Offre spéciale happy hour', 0, 1),
(5, '1735924800', 'Soirée dégustation vins', 0, 1),
(6, '1735968900', 'Brunch gourmand à tester', 0, 2),
(7, '1735986600', 'Nouveau dessert au menu', 0, 2);

-- --------------------------------------------------------

--
-- Structure de la table `76_users`
--

CREATE TABLE `76_users` (
  `user_id` int NOT NULL,
  `user_gender` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_pseudo` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_avatar` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.png',
  `user_birthdate` date NOT NULL,
  `user_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_activated` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_users`
--

INSERT INTO `76_users` (`user_id`, `user_gender`, `user_lastname`, `user_firstname`, `user_pseudo`, `user_avatar`, `user_birthdate`, `user_mail`, `user_password`, `user_activated`) VALUES
(1, 'homme', 'BARBIER', 'Théo', 'Xx_La-Barbe_xX', 'avatar.png', '1900-01-01', 'barbier@theo.fr', '$2y$10$KBtYJWO30WJCz7QnAlVTKuuzziTsC7n3QRwW.mxBM3NgwkY1StVIa', 1),
(2, 'homme', 'JOURDAIN', 'Ichem', 'mattong', 'avatar.png', '1995-09-27', 'tanjiro76610@outlook.fr', '$2y$10$ly99CKS4b9IuHp8IwZAMGOKj.A637.0GwdbR7gdhP24S4/H5iB7.6', 1),
(3, 'homme', 'MAHJOUB', 'Ridha', 'Arabe_du_76', 'avatar.png', '1900-01-01', 'mahjoub@ridha.dz', '$2y$10$g6Jkt1R7Q8HC3KIiPhftdOE52usGif2qRKX9a17v/Dmz.diqhgls6', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `76_comments_ibfk_1` (`post_id`),
  ADD KEY `76_comments_ibfk_2` (`user_id`);

--
-- Index pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD PRIMARY KEY (`user_id`,`fav_id`),
  ADD KEY `fav_id` (`fav_id`);

--
-- Index pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD PRIMARY KEY (`like_id`),
  ADD KEY `76_likes_ibfk_1` (`user_id`),
  ADD KEY `76_likes_ibfk_2` (`post_id`);

--
-- Index pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `76_pictures_ibfk_1` (`post_id`);

--
-- Index pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `76_users`
--
ALTER TABLE `76_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_pseudo` (`user_pseudo`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `76_likes`
--
ALTER TABLE `76_likes`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  MODIFY `pic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `76_posts`
--
ALTER TABLE `76_posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `76_users`
--
ALTER TABLE `76_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `76_comments`
--
ALTER TABLE `76_comments`
  ADD CONSTRAINT `76_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `76_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_favorites`
--
ALTER TABLE `76_favorites`
  ADD CONSTRAINT `76_favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`),
  ADD CONSTRAINT `76_favorites_ibfk_2` FOREIGN KEY (`fav_id`) REFERENCES `76_users` (`user_id`);

--
-- Contraintes pour la table `76_likes`
--
ALTER TABLE `76_likes`
  ADD CONSTRAINT `76_likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `76_likes_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  ADD CONSTRAINT `76_pictures_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `76_posts` (`post_id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Contraintes pour la table `76_posts`
--
ALTER TABLE `76_posts`
  ADD CONSTRAINT `76_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `76_users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
