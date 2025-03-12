-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 12 mars 2025 à 14:57
-- Version du serveur : 8.4.3
-- Version de PHP : 8.3.14

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
  `com_text` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_comments`
--

INSERT INTO `76_comments` (`com_id`, `com_text`, `post_id`, `user_id`) VALUES
(1, 'Superbe terrasse, j’adore !', 1, 2),
(2, 'Ce menu a l’air délicieux !', 2, 3),
(3, 'Hâte de tester cette recette !', 3, 1),
(4, 'Happy hour, j’arrive !', 4, 2),
(5, 'Les vins sont exceptionnels.', 5, 3),
(6, 'Je veux goûter ce brunch !', 6, 1),
(7, 'Ce dessert semble incroyable !', 7, 2),
(8, 'Starfoullah le ramadan en plus !', 5, 1),
(9, 'Wesh incr !', 1, 2),
(10, 'Sah c\'est nul', 1, 2),
(11, 'MUDA MUDA MUDA MUDA', 1, 2),
(12, 'MUDA MUDA MUDA MUDA', 1, 2),
(13, 'ORA ORA ORA ORA', 1, 2),
(14, '6+51614', 1, 2),
(15, 'Saïd', 1, 2),
(16, 'Saïd', 1, 2),
(17, 'Ichem', 1, 2),
(18, '@Arabe_du_76 C\'est une dinguerie que tu dises sa ', 5, 2),
(19, 'Wesh incr la version mobile', 5, 2),
(20, 'Une hallucination collective !!!', 1, 1),
(21, 'grzgzr', 1, 1),
(22, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 1),
(23, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, 1),
(24, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa aaaaaaaaaaaaaaaaaaaaaa', 1, 1),
(25, 'Sah c\'est nul !', 3, 1),
(26, 'Wesh incr !', 2, 1),
(27, 'Ambiance parfaite pour se détendre ☀️🍹✨ Qui veut prendre un verre ici ?', 1, 1),
(28, 'Ambiance parfaite pour se détendre ☀️🍹✨ Qui veut prendre un verre ici ?', 1, 1),
(29, 'Sah', 1, 1),
(30, 'Belle voiture dommage t\'as pas le permis', 8, 1);

-- --------------------------------------------------------

--
-- Structure de la table `76_favorites`
--

CREATE TABLE `76_favorites` (
  `user_id` int NOT NULL,
  `fav_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_favorites`
--

INSERT INTO `76_favorites` (`user_id`, `fav_id`) VALUES
(2, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `76_likes`
--

CREATE TABLE `76_likes` (
  `like_id` int NOT NULL,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `76_likes`
--

INSERT INTO `76_likes` (`like_id`, `user_id`, `post_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 5),
(4, 2, 1),
(5, 2, 4),
(6, 2, 6),
(7, 3, 1),
(8, 3, 3),
(9, 3, 5),
(10, 3, 7);

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
(7, 'dessert_nouveau.jpg', 7),
(9, 'ford_mustang.webp', 8),
(18, 'audi_a4.png', 17),
(20, 'volkswagen_golf.webp', 19),
(21, 'ford_mustang.webp', 20),
(22, 'chargeur_batterie.png', 21);

-- --------------------------------------------------------

--
-- Structure de la table `76_posts`
--

CREATE TABLE `76_posts` (
  `post_id` int NOT NULL,
  `post_timestamp` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
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
(7, '1735986600', 'Nouveau dessert au menu', 0, 2),
(8, '1741608869', 'Belle voiture mashallah', 0, 1),
(9, '1741609066', 'Au pif on s&#039;en blc', 0, 1),
(17, '1741615774', 'Wesh', 0, 4),
(19, '1741615861', 'Vols', 0, 4),
(20, '1741615902', 'Ma voiture', 0, 3),
(21, '1741687829', 'Sa charge même ta mère et ton père', 0, 1);

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
  `user_avatar` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.png',
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
(3, 'homme', 'MAHJOUB', 'Ridha', 'Arabe_du_76', 'avatar.png', '1900-01-01', 'mahjoub@ridha.dz', '$2y$10$g6Jkt1R7Q8HC3KIiPhftdOE52usGif2qRKX9a17v/Dmz.diqhgls6', 1),
(4, 'homme', 'FADLI', 'Saïd', 'Xx_Dark-Sasuke_xX', 'avatar.png', '2002-07-04', 'saidfadli213@gmail.com', '$2y$10$CMlarqrC/VDNp4BLNjZ.IO.hv9.iMVIN2Qhz42Z6FBm.sr.147J52', 1);

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
-- AUTO_INCREMENT pour la table `76_comments`
--
ALTER TABLE `76_comments`
  MODIFY `com_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `76_likes`
--
ALTER TABLE `76_likes`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `76_pictures`
--
ALTER TABLE `76_pictures`
  MODIFY `pic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `76_posts`
--
ALTER TABLE `76_posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `76_users`
--
ALTER TABLE `76_users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
