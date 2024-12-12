-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 12 déc. 2024 à 14:24
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_livre` int NOT NULL,
  `prix` decimal(4,2) NOT NULL,
  `date_debut_cmd` date NOT NULL,
  `date_fin_cmd` date NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_livre` (`id_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_utilisateur`, `id_livre`, `prix`, `date_debut_cmd`, `date_fin_cmd`) VALUES
(1, 1, 16, 1.38, '2024-12-09', '2024-12-11'),
(2, 2, 15, 8.12, '2024-12-11', '2024-12-13'),
(3, 3, 12, 8.00, '2024-12-14', '2024-12-16'),
(4, 4, 13, 10.40, '2024-12-17', '2024-12-19'),
(5, 5, 14, 8.60, '2024-12-18', '2024-12-20'),
(6, 6, 10, 3.50, '2024-12-17', '2024-12-20'),
(7, 7, 4, 4.48, '2024-12-24', '2024-12-28'),
(8, 8, 8, 3.60, '2024-12-29', '2025-01-01'),
(9, 9, 17, 3.00, '2024-12-21', '2024-12-24'),
(10, 10, 19, 14.00, '2025-01-02', '2025-01-06'),
(11, 11, 11, 8.90, '2025-01-14', '2025-01-18'),
(12, 12, 9, 4.50, '2025-01-07', '2025-01-11'),
(13, 13, 1, 3.00, '2025-01-12', '2025-01-16'),
(14, 14, 3, 3.00, '2025-01-18', '2025-01-22'),
(15, 15, 5, 7.40, '2025-01-18', '2025-01-22'),
(16, 16, 6, 8.90, '2025-01-23', '2025-01-27'),
(17, 17, 12, 8.00, '2025-01-21', '2025-01-25'),
(18, 18, 15, 8.12, '2025-01-01', '2025-01-05'),
(19, 19, 8, 3.60, '2025-01-27', '2025-01-31'),
(20, 20, 10, 3.50, '2024-12-17', '2024-12-20');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int NOT NULL,
  `id_livre` int NOT NULL,
  `date_debut_emprunt` date NOT NULL,
  `date_fin_emprunt` date NOT NULL,
  PRIMARY KEY (`id_emprunt`),
  KEY `id_utilisateur` (`id_utilisateur`,`id_livre`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_utilisateur`, `id_livre`, `date_debut_emprunt`, `date_fin_emprunt`) VALUES
(1, 1, 18, '2024-12-12', '2024-12-18'),
(2, 2, 2, '2024-12-19', '2024-12-25'),
(3, 3, 20, '2024-12-26', '2025-01-01'),
(4, 4, 7, '2024-12-17', '2024-12-23'),
(5, 5, 1, '2024-12-22', '2024-12-28'),
(6, 7, 3, '2024-12-15', '2024-12-21'),
(8, 8, 12, '2024-12-29', '2025-01-04'),
(9, 9, 5, '2024-12-13', '2024-12-19'),
(10, 10, 19, '2024-12-24', '2024-12-30'),
(11, 11, 10, '2025-01-01', '2025-01-07'),
(12, 12, 17, '2025-01-07', '2025-01-13'),
(13, 13, 14, '2025-01-14', '2025-01-20'),
(14, 14, 13, '2025-01-21', '2025-01-27'),
(15, 15, 11, '2024-12-12', '2024-12-18'),
(16, 16, 19, '2024-12-23', '2024-12-29'),
(17, 17, 3, '2024-12-26', '2025-01-01'),
(18, 18, 7, '2024-12-30', '2025-01-05'),
(19, 19, 2, '2024-12-16', '2024-12-22'),
(20, 20, 15, '2024-12-15', '2024-12-21');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

DROP TABLE IF EXISTS `livres`;
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titre_livre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `annee_publication` year NOT NULL,
  `livre_populaire` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`id`, `titre_livre`, `auteur`, `annee_publication`, `livre_populaire`) VALUES
(1, 'Croc-Blanc', 'Jack London', '1906', ''),
(2, 'The Da Vinci Code', 'Dan Brown', '2003', ''),
(3, 'Les fleurs du mal', 'Charles Baudelaire', '1972', ''),
(4, '1984', 'George Orwell', '1972', ''),
(5, 'L\'étranger', 'Albert Camus', '1972', ''),
(6, 'Une vie', 'Simone Veil', '2009', ''),
(7, 'Ne tirez pas sur l\'oiseau moqueur', 'Harper Lee', '2006', ''),
(8, 'La Princesse de Clèves ', 'Madame de La Fayette', '1973', ''),
(9, 'Au bonheur des dames', 'Emile Zola', '1971', ''),
(10, 'Bel-Ami', 'Guy de Maupassant', '1999', ''),
(11, 'L\'Écume des jours', 'Boris Vian', '1947', ''),
(12, 'Les Raisins de la colère', 'John Steinbeck', '1939', ''),
(13, 'Lolita', 'Vladimir Nabokov', '1955', ''),
(14, 'La Ferme des animaux', 'George Orwell', '1945', ''),
(15, 'Le Parfum', 'Patrick Süskind', '1985', ''),
(16, 'Antigone', 'Jean Anouilh', '1944', ''),
(17, 'Le Joueur d\'échecs', 'Stefan Zweig', '1943', ''),
(18, 'Le Meilleur des mondes ', 'Aldous Huxley', '1931', ''),
(19, 'À la recherche du temps perdu', 'Marcel Proust', '1927', ''),
(20, 'La Métamorphose ', 'Franz Kafka', '1915', '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `identifiant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `motdepasse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  UNIQUE KEY `identifiant` (`identifiant`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `identifiant`, `motdepasse`) VALUES
(1, 'Bibliothecaire', 'i48Dha6P'),
(2, 'Admin 1', ''),
(3, 'Admin 2', ''),
(4, 'Admin 3', ''),
(5, 'Admin 4', ''),
(6, 'Utilisateur A', ''),
(7, 'Utilisateur B', ''),
(8, 'Utilisateur C', ''),
(9, 'Utilisateur D', ''),
(10, 'Utilisateur E', ''),
(11, 'Utilisateur F', ''),
(12, 'Utilisateur G', ''),
(13, 'Utilisateur H', ''),
(14, 'Utilisateur I', ''),
(15, 'Utilisateur J', ''),
(16, 'Utilisateur K', ''),
(17, 'Utilisateur L', ''),
(18, 'Utilisateur M', ''),
(19, 'Utilisateur N', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
