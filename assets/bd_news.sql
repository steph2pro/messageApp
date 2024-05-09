-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 09 mai 2024 à 22:42
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bd_news`
--

-- --------------------------------------------------------

--
-- Structure de la table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groups`
--

INSERT INTO `groups` (`id`, `name`, `profil`) VALUES
(1, 'stephane stephane', ''),
(2, 'test', 'PROFILE-6630c68dc4f3b4.62928822.png'),
(3, 'IUT', 'PROFILE-663377b30352c8.92113749.jpg'),
(4, 'IUT', 'PROFILE-6633780d1ffba9.13070509.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `sender` int(11) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `time` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `content`, `sender`, `recipient`, `time`) VALUES
(1, 'sdsd', 3, 1, '19:20:00'),
(2, 'Loic', 3, 1, '19:26:00'),
(3, 'sdsd', 3, 1, '19:35:00'),
(4, 'sdsd', 3, 1, '19:41:00'),
(5, 'sdsd', 3, 1, '19:41:00'),
(6, 'sdsd', 3, 1, '19:41:00'),
(7, 'La menace', 3, 1, '19:43:00'),
(8, 'Loic', 3, 1, '19:43:00'),
(9, 'La menace', 3, 1, '19:43:00'),
(10, 'Loic', 3, 2, '19:43:00'),
(11, 'La menace', 3, 4, '19:48:00'),
(12, 'La menace', 3, 4, '19:52:00'),
(13, 'La menace', 3, 4, '19:52:00'),
(14, 'La menace', 3, 4, '19:52:00'),
(15, 'La menace', 3, 4, '19:54:00'),
(16, 'La menace', 3, 4, '19:54:00'),
(17, 'La menace', 3, 4, '19:54:00'),
(18, 'La menace', 3, 4, '19:55:00'),
(19, 'La menace', 3, 4, '19:55:00'),
(20, 'La menace', 3, 4, '19:56:00'),
(21, 'La menace', 3, 4, '19:58:00'),
(22, 'La menace', 3, 4, '20:00:00'),
(23, 'La menace', 3, 4, '20:01:00'),
(24, 'La menace', 3, 4, '20:02:00'),
(25, 'La menace', 3, 4, '20:04:00'),
(26, 'La menace', 3, 4, '20:04:00'),
(27, 'sadsad', 9, 4, '20:15:00'),
(28, 'Loic', 9, 4, '20:16:00'),
(29, '1234', 9, 4, '20:16:00'),
(30, '1234', 9, 4, '20:16:00'),
(31, 'PSG', 11, 4, '20:25:00');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `auteur` varchar(30) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `dateAjout` datetime NOT NULL,
  `dateModif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `auteur`, `titre`, `contenu`, `dateAjout`, `dateModif`) VALUES
(1, 'steph', 'diagramme', '                        test        32        ', '2024-04-18 13:05:39', '2024-04-18 16:17:24'),
(4, 'steph', 'textemod', '                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget quam odio. Nullam facilisis risus et nisl dignissim, quis consectetur nunc tristique. Sed vel est id magna fermentum finibus. Duis nec odio vel mauris faucibus ultrices.        ', '2024-04-18 15:36:45', '2024-04-18 16:21:26'),
(5, 'steph2', 'texte', '        qqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq', '2024-04-18 16:21:54', '2024-04-18 16:21:54'),
(6, 'stephane2222', 'news', '        test news                ', '2024-04-18 16:50:46', '2024-04-18 16:51:17');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profil` varchar(255) NOT NULL,
  `enligne` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `profil`, `enligne`) VALUES
(1, 'stephane s', 'steph2004pro@gmail.com', 'PROFILE-662917cfe947a0.16751910.png', 0),
(3, 'user', 'steph2004pro@gmail.com', 'PROFILE-662b3e74266fa6.50123125.jpg', 0),
(4, 'test', 'sss@gmail.com', 'PROFILE-662d1a377a58e3.76955539.jpg', 0),
(5, 'jeanne', 'stephanekamga@gmail.com', 'PROFILE-6630c8f25a38e0.42649026.jpg', 0),
(6, 'jeanne', 'stephanekamga@gmail.com', 'PROFILE-6630c9784c5431.85993670.jpg', 0),
(7, 'jeannete', 'stephanekamga@gmail.com', 'PROFILE-6630c9a6053258.26928996.png', 0),
(8, 'talla', 'sss@gmail.com', 'PROFILE-6630c9c9e37f94.95819678.png', 0),
(9, 'talla22', 'sss@gmail.com', 'PROFILE-663375e9a213b8.09582001.png', 0),
(10, 'klj', 'klj@gmail.com', 'PROFILE-6633772ec9abf7.11483283.jpg', 0),
(11, 'Loic', 'klj@gmail.com', 'PROFILE-663d149141f545.75478397.jpg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user_group`
--

CREATE TABLE `user_group` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user_group`
--

INSERT INTO `user_group` (`user_id`, `group_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 2),
(4, 4),
(6, 3),
(7, 4),
(8, 3),
(9, 4),
(10, 4),
(11, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender`),
  ADD KEY `group_id` (`recipient`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`recipient`) REFERENCES `groups` (`id`);

--
-- Contraintes pour la table `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `user_group_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_group_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
