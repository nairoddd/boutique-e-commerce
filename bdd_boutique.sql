-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 31 oct. 2022 à 14:02
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutiquecompiegne`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(5) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_membre` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(9, 14, 324, '2022-10-26 16:08:01', 'en cours de traitement'),
(10, 14, 2324, '2022-10-26 16:08:33', 'en cours de traitement'),
(11, 14, 2324, '2022-10-26 16:15:38', 'en cours de traitement'),
(12, 14, 2324, '2022-10-26 16:54:17', 'en cours de traitement'),
(13, 14, 2324, '2022-10-26 16:54:41', 'en cours de traitement'),
(14, 14, 46, '2022-10-26 16:55:52', 'en cours de traitement'),
(15, 14, 46, '2022-10-26 16:57:41', 'en cours de traitement'),
(16, 14, 140, '2022-10-26 16:57:58', 'en cours de traitement'),
(17, 14, 280, '2022-10-26 17:00:48', 'en cours de traitement'),
(18, 14, 7000, '2022-10-26 17:01:56', 'en cours de traitement'),
(19, 14, 115, '2022-10-27 10:58:20', 'en cours de traitement'),
(20, 14, 14, '2022-10-27 11:03:56', 'en cours de traitement'),
(21, 14, 14, '2022-10-27 11:04:11', 'en cours de traitement'),
(22, 14, 14, '2022-10-27 11:04:12', 'en cours de traitement'),
(23, 14, 14, '2022-10-27 11:04:13', 'en cours de traitement'),
(24, 14, 14, '2022-10-27 11:04:14', 'en cours de traitement'),
(26, 14, 114, '2022-10-27 11:07:02', 'en cours de traitement'),
(27, 14, 1714, '2022-10-27 11:12:20', 'en cours de traitement'),
(28, 14, 234, '2022-10-27 11:15:13', 'en cours de traitement'),
(29, 14, 210, '2022-10-27 11:16:09', 'en cours de traitement'),
(30, 14, 350, '2022-10-27 11:16:23', 'en cours de traitement'),
(31, 14, 350, '2022-10-27 11:18:16', 'en cours de traitement'),
(32, 14, 350, '2022-10-27 11:19:01', 'en cours de traitement'),
(33, 14, 350, '2022-10-27 11:19:16', 'en cours de traitement'),
(34, 14, 350, '2022-10-27 11:19:17', 'en cours de traitement'),
(35, 14, 364, '2022-10-27 11:21:13', 'en cours de traitement'),
(36, 14, 387, '2022-10-27 11:22:17', 'en cours de traitement'),
(37, 14, 387, '2022-10-27 11:23:10', 'envoyé'),
(38, 14, 387, '2022-10-27 11:25:49', 'en cours de traitement'),
(39, 14, 387, '2022-10-27 11:26:47', 'envoyé'),
(40, 14, 387, '2022-10-27 11:27:03', 'en cours de traitement'),
(41, 14, 378, '2022-10-27 11:42:18', 'en cours de traitement'),
(42, 14, 378, '2022-10-27 11:43:06', 'en cours de traitement'),
(43, 14, 378, '2022-10-27 11:44:00', 'en cours de traitement'),
(44, 14, 3168, '2022-10-27 14:04:32', 'envoyé'),
(45, 14, 140, '2022-10-27 14:23:24', 'en cours de traitement'),
(46, 14, 3780, '2022-10-27 15:35:52', 'en cours de traitement'),
(47, 14, 530, '2022-10-31 12:23:47', 'livré');

-- --------------------------------------------------------

--
-- Structure de la table `detail_commande`
--

DROP TABLE IF EXISTS `detail_commande`;
CREATE TABLE IF NOT EXISTS `detail_commande` (
  `id_detail_commande` int(3) NOT NULL AUTO_INCREMENT,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(5) NOT NULL,
  PRIMARY KEY (`id_detail_commande`),
  KEY `id_commande` (`id_commande`),
  KEY `id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `detail_commande`
--

INSERT INTO `detail_commande` (`id_detail_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(4, 13, 4, 1, 140),
(5, 13, 9, 8, 23),
(6, 13, 27, 20, 100),
(7, 14, 9, 1, 23),
(8, 14, 31, 1, 23),
(9, 15, 9, 1, 23),
(10, 15, 31, 1, 23),
(11, 16, 4, 1, 140),
(12, 17, 16, 20, 14),
(13, 18, 4, 50, 140),
(14, 19, 26, 5, 23),
(15, 20, 16, 1, 14),
(16, 21, 16, 1, 14),
(17, 22, 16, 1, 14),
(18, 23, 16, 1, 14),
(19, 24, 16, 1, 14),
(21, 26, 16, 1, 14),
(23, 27, 16, 1, 14),
(25, 28, 16, 15, 14),
(27, 29, 16, 15, 14),
(28, 30, 16, 15, 14),
(30, 31, 16, 15, 14),
(32, 32, 16, 15, 14),
(33, 32, 4, 1, 140),
(34, 33, 16, 15, 14),
(35, 33, 4, 1, 140),
(36, 34, 16, 15, 14),
(37, 34, 4, 1, 140),
(38, 35, 16, 16, 14),
(39, 35, 4, 1, 140),
(40, 36, 16, 16, 14),
(41, 36, 4, 1, 140),
(42, 36, 9, 1, 23),
(43, 37, 16, 16, 14),
(49, 39, 16, 16, 14),
(50, 39, 4, 1, 140),
(51, 39, 9, 1, 23),
(52, 40, 16, 16, 14),
(53, 40, 4, 1, 140),
(54, 40, 9, 1, 23),
(55, 42, 16, 17, 14),
(56, 42, 4, 1, 140),
(57, 43, 16, 17, 14),
(58, 43, 4, 1, 140),
(59, 46, 4, 27, 140),
(60, 47, 8, 9, 12),
(61, 47, 9, 8, 23),
(62, 47, 27, 1, 100),
(63, 47, 26, 6, 23);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

DROP TABLE IF EXISTS `membre`;
CREATE TABLE IF NOT EXISTS `membre` (
  `id_membre` int(3) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `nom` varchar(60) NOT NULL,
  `prenom` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(50) NOT NULL,
  `code_postal` int(5) UNSIGNED ZEROFILL NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `statut` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `pseudo` (`pseudo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`) VALUES
(13, 'user', '$2y$10$9Si.JPgkHl.uU999wVkZt.vsRljC29tgUEsLewhjPicbTFJrup8Mi', 'user', 'user', 'user@user.com', 'm', 'Compiègne', 60200, '1 rue de mon adresse', 0),
(14, 'admin', '$2y$10$mgp4GrCfi9mMdbMEB4e7WuDNMlmTFpm3ed2s0xNRtNNykJsflt4qO', 'admin', 'admin', 'admin@test.cc', 'm', 'Compiègne', 60200, 'mon adresse', 1),
(15, 'membre', '$2y$10$waHqvBEH0IBpR4ESHwa4nO.ITzy96Fa638wcHlL7SKoT5xaDpHOM.', 'membre', 'membre', 'membre@membre.com', 'm', 'Compiègne', 60200, 'ade', 1),
(19, 'usera', '$2y$10$9Si.JPgkHl.uU999wVkZt.vsRljC29tgUEsLewhjPicbTFJrup8Mi', 'user', 'user', 'user@user.com', 'm', 'Compiègne', 60200, '1 rue de mon adresse', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(3) NOT NULL AUTO_INCREMENT,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(20) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(255) NOT NULL,
  `prix` int(6) NOT NULL,
  `stock` int(6) NOT NULL,
  PRIMARY KEY (`id_produit`),
  UNIQUE KEY `reference` (`reference`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(4, '89A8', 'Apple', 'Apple iPhone 14', 'Écran Super Retina XDR de 6,1 pouces avec ProMotion et écran toujours activé Dynamic Island, une manière inédite et magique d’interagir avec votre iPhone Appareil photo principal 48 Mpx pour une résolution jusqu’à 4x supérieure Mode Cinématique, désormais en 4K Dolby Vision jusqu’à 30 i/s\r\nMode Action, pour des vidéos stables et fluides lorsque vous êtes en mouvement', 'Blanc', 'XS', 'm', 'http://localhost/phpcompiegne/boutique/photo/1666676902_89A8_plage.jpg', 140, 0),
(8, 'A221', 'Music', 'Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite', 'Son de qualité premium : Echo livre des aigus clairs, des médiums dynamiques et des basses profondes pour un son riche et détaillé qui s\'adapte automatiquement à n\'importe quelle pièce.\r\nContrôlez votre divertissement par simple commande vocale : écoutez des titres en streaming sur Amazon Music, Apple Music, Spotify, Deezer et plus encore.', 'Noir', 'Autre taille', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666343872_A22_61J0hCAtMvL._AC_SL1000_.jpg', 12, 18),
(9, 'PUI881', 'Laptop', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Mise à niveau vers Windows 11 dès sa disponibilité Écran: 15.6&quot; FHD (1920x1080) IPS 250nits Anti-glare Processeur: Pentium N5030 (4C / 1.1GHz)', 'Noir', 'Autre taille', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666343951_PUI88_61ChorF2MUL._AC_SX679_.jpg', 23, 19),
(16, '89A812', 'Apple', 'Apple iPhone 14 Pro', 'Écran Super Retina XDR de 6,1 pouces avec ProMotion et écran toujours activé Dynamic Island, une manière inédite et magique d’interagir avec votre iPhone Appareil photo principal 48 Mpx pour une résolution jusqu’à 4x supérieure Mode Cinématique, désormais en 4K Dolby Vision jusqu’à 30 i/s\r\nMode Action, pour des vidéos stables et fluides lorsque vous êtes en mouvement', 'Blanc', 'XS', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666344048_89A8_61HHS0HrjpL._AC_SX679_.jpg', 14, 157),
(26, 'A1632ZHJ', 'Apple', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHDLenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Multicolore', 'XL', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666677426_A1632ZHJ_room.jpg', 23, 21),
(27, 'OUIY', 'Apple', 'Echo Avec son premium, hub connecté et Alexa, Anthracite', 'Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite', 'Rouge', 'M', 'f', 'http://localhost/phpcompiegne/boutique/photo/1666683773_OUIY_Fear-of-God.png', 100, 26),
(31, '89A81', 'Apple', 'Apple Iphone 1', 'Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1', 'Blanc', 'XS', 'f', 'http://localhost/phpcompiegne/boutique/photo/1666679402_A1632ZHJzfez_image_not_found.png', 23, 27),
(46, '89A', 'Apple', 'Apple iPhone 14', 'Écran Super Retina XDR de 6,1 pouces avec ProMotion et écran toujours activé Dynamic Island, une manière inédite et magique d’interagir avec votre iPhone Appareil photo principal 48 Mpx pour une résolution jusqu’à 4x supérieure Mode Cinématique, désormais en 4K Dolby Vision jusqu’à 30 i/s\r\nMode Action, pour des vidéos stables et fluides lorsque vous êtes en mouvement', 'Blanc', 'XS', 'm', 'http://localhost/phpcompiegne/boutique/photo/1666676902_89A8_plage.jpg', 140, 0),
(47, 'A22', 'Music', 'Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite', 'Son de qualité premium : Echo livre des aigus clairs, des médiums dynamiques et des basses profondes pour un son riche et détaillé qui s\'adapte automatiquement à n\'importe quelle pièce.\r\nContrôlez votre divertissement par simple commande vocale : écoutez des titres en streaming sur Amazon Music, Apple Music, Spotify, Deezer et plus encore.', 'Noir', 'Autre taille', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666343872_A22_61J0hCAtMvL._AC_SL1000_.jpg', 12, 27),
(48, 'PUI88', 'Laptop', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Mise à niveau vers Windows 11 dès sa disponibilité Écran: 15.6&quot; FHD (1920x1080) IPS 250nits Anti-glare Processeur: Pentium N5030 (4C / 1.1GHz)', 'Noir', 'Autre taille', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666343951_PUI88_61ChorF2MUL._AC_SX679_.jpg', 23, 27),
(49, '89ACDB', 'Apple', 'Apple iPhone 14 Pro', 'Écran Super Retina XDR de 6,1 pouces avec ProMotion et écran toujours activé Dynamic Island, une manière inédite et magique d’interagir avec votre iPhone Appareil photo principal 48 Mpx pour une résolution jusqu’à 4x supérieure Mode Cinématique, désormais en 4K Dolby Vision jusqu’à 30 i/s\r\nMode Action, pour des vidéos stables et fluides lorsque vous êtes en mouvement', 'Blanc', 'XS', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666344048_89A8_61HHS0HrjpL._AC_SX679_.jpg', 14, 157),
(50, 'A1632ZH', 'Apple', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD Lenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHDLenovo IdeaPad 3 Ordinateur Portable 15.6 Pouces FHD', 'Multicolore', 'XL', 'mixte', 'http://localhost/phpcompiegne/boutique/photo/1666677426_A1632ZHJ_room.jpg', 23, 27),
(51, 'D91BN', 'Apple', 'Echo Avec son premium, hub connecté et Alexa, Anthracite', 'Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite Echo (4e génération), Avec son premium, hub connecté et Alexa, Anthracite', 'Rouge', 'M', 'f', 'http://localhost/phpcompiegne/boutique/photo/1666683773_OUIY_Fear-of-God.png', 100, 27),
(52, '89', 'Apple', 'Apple Iphone 1', 'Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1Apple Iphone 1', 'Blanc', 'XS', 'f', 'http://localhost/phpcompiegne/boutique/photo/1666679402_A1632ZHJzfez_image_not_found.png', 23, 27);

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
