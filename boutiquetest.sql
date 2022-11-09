-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 09 nov. 2022 à 17:37
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutiquetest`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(5) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(23, 14, 14, '2022-10-27 10:39:44', 'en cours de traitement'),
(24, 14, 14, '2022-10-27 10:40:17', 'en cours de traitement'),
(25, 14, 114, '2022-10-27 10:40:59', 'en cours de traitement'),
(26, 14, 114, '2022-10-27 10:52:08', 'en cours de traitement'),
(27, 14, 114, '2022-10-27 10:52:38', 'en cours de traitement'),
(28, 14, 114, '2022-10-27 10:56:04', 'en cours de traitement'),
(29, 14, 114, '2022-10-27 10:57:04', 'en cours de traitement'),
(30, 14, 114, '2022-10-27 11:11:08', 'en cours de traitement'),
(31, 14, 114, '2022-10-27 11:11:20', 'en cours de traitement'),
(32, 14, 114, '2022-10-27 11:19:25', 'en cours de traitement'),
(33, 14, 114, '2022-10-27 11:21:31', 'en cours de traitement'),
(34, 14, 114, '2022-10-27 11:44:33', 'en cours de traitement'),
(35, 14, 114, '2022-10-27 11:45:23', 'en cours de traitement'),
(36, 14, 114, '2022-10-27 12:16:34', 'en cours de traitement'),
(37, 14, 240, '2022-10-27 13:24:56', 'envoyé'),
(38, 14, 140, '2022-11-04 16:35:35', 'envoyé');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

CREATE TABLE `detail_commande` (
  `id_detail_commande` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_commande`
--

INSERT INTO `detail_commande` (`id_detail_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(21, 23, 16, 1, 14),
(22, 24, 16, 1, 14),
(23, 25, 16, 1, 14),
(25, 26, 16, 1, 14),
(27, 27, 16, 1, 14),
(29, 28, 16, 1, 14),
(31, 29, 16, 1, 14),
(33, 30, 16, 1, 14),
(35, 31, 16, 1, 14),
(37, 32, 16, 1, 14),
(39, 33, 16, 1, 14),
(41, 34, 16, 1, 14),
(42, 34, 27, 1, 100),
(43, 35, 16, 1, 14),
(44, 35, 27, 1, 100),
(45, 36, 16, 1, 14),
(46, 36, 27, 1, 100),
(47, 37, 27, 1, 100),
(48, 37, 4, 1, 140),
(49, 38, 4, 1, 140);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(13, 'user', '$2y$10$9Si.JPgkHl.uU999wVkZt.vsRljC29tgUEsLewhjPicbTFJrup8Mi', 'user', 'user', 'user@user.com', 'm', 'Compiègne', 60200, '1 rue de mon adresse', 0),
(14, 'admin', '$2y$10$mgp4GrCfi9mMdbMEB4e7WuDNMlmTFpm3ed2s0xNRtNNykJsflt4qO', 'admin', 'admin', 'admin@test.cc', 'm', 'Compiègne', 60200, 'mon adresse admin', 1),
(16, 'chop_973', '$2y$10$A0QlLbdNRa/jvWSVqdd5GeE36g8aUaqjYxZSGqS9HnRtyxDP5CpMm', 'vil', 'dor', 'dor@gmail.com', 'm', 'COMPIEGNE', 60200, '1 rue de la poire', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(20) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` int(6) NOT NULL,
  `stock` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(4, '89A8', 'Apple', 'Apple iPhone 14', 'Écran Super Retina XDR de 6,1 pouces avec ProMotion et écran toujours activé Dynamic Island, une manière inédite et magique d’interagir avec votre iPhone Appareil photo principal 48 Mpx pour une résolution jusqu’à 4x supérieure Mode Cinématique, désormais en 4K Dolby Vision jusqu’à 30 i/s\r\nMode Action, pour des vidéos stables et fluides lorsque vous êtes en mouvement    ', 'Blanc', 'XS', 'm', 'http://localhost/php/boutiqueFinal/photo/1668009946_89A8_mediamodifier-Hijdo4O1iZU-unsplash.jpg', 1200, 2),
(8, 'A221', 'Music', 'Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite', 'Son de qualité premium : Echo livre des aigus clairs, des médiums dynamiques et des basses profondes pour un son riche et détaillé qui s&#039;adapte automatiquement à n&#039;importe quelle pièce.\r\nContrôlez votre divertissement par simple commande vocale : écoutez des titres en streaming sur Amazon Music, Apple Music, Spotify, Deezer et plus encore.    ', 'Noir', 'Autre taille', 'm', 'http://localhost/php/boutiqueFinal/photo/1668010000_A221_71Q9d6N7xkL._SX342_.jpg', 60, 100),
(9, 'PUI881', 'Laptop', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Mise à niveau vers Windows 11 dès sa disponibilité Écran: 15.6&quot; FHD (1920x1080) IPS 250nits Anti-glare Processeur: Pentium N5030 (4C / 1.1GHz)', 'Noir', 'Autre taille', 'm', 'http://localhost/php/boutiqueFinal/photo/1668010060_PUI881_61ChorF2MUL._AC_SX425_.jpg', 1000, -25),
(16, '89A812', 'Apple', 'Apple iPhone 14 Pro', 'Écran Super Retina XDR de 6,1 pouces avec ProMotion et écran toujours activé Dynamic Island, une manière inédite et magique d’interagir avec votre iPhone Appareil photo principal 48 Mpx pour une résolution jusqu’à 4x supérieure Mode Cinématique, désormais en 4K Dolby Vision jusqu’à 30 i/s\r\nMode Action, pour des vidéos stables et fluides lorsque vous êtes en mouvement', 'Blanc', 'XS', 'm', 'http://localhost/php/boutiqueFinal/photo/1668009797_89A812_iPhone14ProMax_VioletProfond_3-4-Side_Back_Left_400x540px.png', 1400, 443),
(26, 'A1632ZHJ', 'Apple', 'MacBook Pro 16 pouces', 'Le plus puissant des MacBook Pro est arrivé. Avec la puce M1 Pro ou M1 Max, la première conçue par Apple pour les pros, vous bénéficiez de performances exceptionnelles et d’une incroyable autonomie. Ajoutez à cela un sublime écran Liquid Retina XDR, la meilleure caméra et le meilleur système audio jamais intégrés à un portable Mac et tous les ports dont vous avez besoin. Premier portable du genre, le MacBook Pro est un véritable monstre.', 'Multicolore', 'XL', 'mixte', 'http://localhost/php/boutiqueFinal/photo/1668010416_A1632ZHJ_apple-macbook-pro-16-2021-1200.jpg', 2000, 100),
(27, 'OUIY', 'Apple', 'HomePod mini', 'Véritable concentré d’innovation, le HomePod mini diffuse un son inouï pour une enceinte de cette taille. Avec ses 8,43 cm de hauteur, il se fait tout petit pour laisser toute la place à un son uniforme à 360° d’une richesse exceptionnelle, quel que soit l’endroit de la pièce où vous vous trouvez. Vous pouvez également l’étoffer avec d’autres HomePod mini et profiter d’un son d’une ampleur remarquable.\r\n\r\n', 'Rouge', 'M', 'mixte', 'http://localhost/php/boutiqueFinal/photo/1668010575_OUIY_homepod-mini-select-orange-202110_FMT_WHH.jpg', 100, 484);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD PRIMARY KEY (`id_detail_commande`),
  ADD KEY `id_commande` (`id_commande`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD UNIQUE KEY `reference` (`reference`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  MODIFY `id_detail_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id_membre`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Contraintes pour la table `detail_commande`
--
ALTER TABLE `detail_commande`
  ADD CONSTRAINT `detail_commande_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
