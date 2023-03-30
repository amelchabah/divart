-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 30 mars 2023 à 00:42
-- Version du serveur : 10.6.10-MariaDB-cll-lve
-- Version de PHP : 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `u549574845_divart`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `pseudo`, `mdp`) VALUES
(1, 'admin', '$2y$10$A2Dsuwx5Ipl7mUfbekTNO.0rK7hL0Ykl76CWr55CNMC8xO4nMNd.q');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `horaire` varchar(50) NOT NULL,
  `amount` int(10) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `mail` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `horaire`, `amount`, `prenom`, `nom`, `mail`) VALUES
(11, '2023-03-30', '12:00', 2, 'Dan', 'Pn', 'amelou518@gmail.com'),
(12, '2023-04-08', '18:00', 1, 'Amel', 'Chabah', 'amelou518@gmail.com'),
(22, '2023-03-31', '18:00', 3, 'Marche', 'Stp', 'amel.chabah@edu.univ-eiffel.fr'),
(23, '2023-04-01', '13:00', 3, 'Mama', 'Papa', 'amelou518@gmail.com'),
(24, '2023-03-30', '18:00', 4, 'Pitié', 'Marche', 'amelou518@gmail.com'),
(25, '2023-04-01', '13:00', 1, 'Bry', 'Pho', 'bryanpncontactpro@gmail.com'),
(26, '2023-04-07', '12:00', 1, 'Mama', 'Mama', 'amelou518@gmail.com'),
(27, '2023-04-07', '18:00', 7, 'Nell', 'Antona', 'amel.chabah@edu.univ-eiffel.fr'),
(28, '2023-03-29', '14:00', 3, 'Anna', 'Hassani', 'annahassani@gmail.com'),
(49, '2023-04-05', '14:00', 3, 'Samir', 'Lapyutt', 'amelou518@gmail.com'),
(50, '2023-03-31', '12:00', 3, 'Madame', 'Monsieur', 'amelou518@gmail.com'),
(51, '2023-04-02', '13:00', 1, 'Amel', 'Chabah', 'amelou518@gmail.com'),
(52, '2023-03-31', '12:00', 2, 'Amel', 'Chabah', 'amelou518@gmail.com'),
(53, '2023-03-31', '12:00', 2, 'Amel', 'Chabah', 'amelou518@gmail.com'),
(54, '2023-03-31', '12:00', 2, 'Amel', 'Chabah', 'amelou518@gmail.com'),
(55, '2023-04-01', '13:00', 2, 'Noam', 'Seb', 'amelou518@gmail.com'),
(56, '2023-04-01', '12:00', 3, 'Eléa', 'Crunchant', 'amelou518@gmail.com'),
(57, '2023-04-01', '12:00', 3, 'Eléa', 'Crunchant', 'amelou518@gmail.com'),
(58, '2023-04-01', '11:00', 4, 'Claire', 'Fontaine', 'amelou518@gmail.com'),
(59, '2023-04-08', '13:00', 3, 'Amel', 'Chabah', 'amelou518@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
