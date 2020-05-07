-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  ven. 20 sep. 2019 à 19:27
-- Version du serveur :  10.1.40-MariaDB
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `stock`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE `achat` (
  `id_achat` int(11) NOT NULL,
  `achat_date` varchar(10) NOT NULL,
  `achat_marque` varchar(250) NOT NULL,
  `achat_model` varchar(250) NOT NULL,
  `achat_num_serie` varchar(50) NOT NULL,
  `achat_descript` text NOT NULL,
  `achat_type` varchar(250) NOT NULL,
  `achat_quantite` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `achat`
--

INSERT INTO `achat` (`id_achat`, `achat_date`, `achat_marque`, `achat_model`, `achat_num_serie`, `achat_descript`, `achat_type`, `achat_quantite`) VALUES
(1, '19/09/2019', 'Samsung', 'Galaxy Note 10', 'CM1B8X', '', 'Phone', '1'),
(2, '19/09/2019', 'Sandisk', '16g', '', '', 'USB', '5'),
(3, '19/09/2019', 'Samsung', 'Ecran plat 32', 'S87NG0X1QA154', '', 'Ecran', '1'),
(4, '19/09/2019', 'Sandisk', '16g', '', '', 'USB', '10'),
(5, '19/09/2019', 'Sandisk', '64g', '', '', 'USB', '10'),
(6, '19/09/2019', 'Apple', 'MBA', 'C1MQV3X0G943', '', 'PC', '1');

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(15) NOT NULL,
  `stock_marque` varchar(250) NOT NULL,
  `stock_model` varchar(250) NOT NULL,
  `stock_type` varchar(250) NOT NULL,
  `stock_quantite` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id_stock`, `stock_marque`, `stock_model`, `stock_type`, `stock_quantite`) VALUES
(2, 'Sandisk', '16g', 'USB', '10'),
(4, 'Sandisk', '64g', 'USB', '3'),
(5, 'Apple', 'MBA', 'PC', '0');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `adresse` text NOT NULL,
  `cin` varchar(12) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `adresse`, `cin`, `username`, `password`, `type`) VALUES
(1, 'TSANGY', 'Hobiniaina', 'Lot II S 40 T Anjanahary', '111111111111', 'hobiniaina', '$2y$10$tScWlJHAqbzlCGXYt7', 'gestionnaire'),
(2, 'RAMAHATSANGIARISON', 'Hobiniaina Mirado', 'Lot II S 40 T Anjanahary', '111111111112', 'Mirado', '$2y$10$OOhHiBkYt8qoKDOhlz', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE `vente` (
  `id_vente` int(11) NOT NULL,
  `vente_date` varchar(10) NOT NULL,
  `vente_marque` varchar(250) NOT NULL,
  `vente_model` varchar(250) NOT NULL,
  `vente_num_serie` varchar(50) NOT NULL,
  `vente_descript` text NOT NULL,
  `vente_type` varchar(250) NOT NULL,
  `vente_quantite` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vente`
--

INSERT INTO `vente` (`id_vente`, `vente_date`, `vente_marque`, `vente_model`, `vente_num_serie`, `vente_descript`, `vente_type`, `vente_quantite`) VALUES
(1, '19/09/2019', 'Samsung', 'Galaxy Note 10', 'CM1B8X', '', 'Telephone', '1'),
(2, '19/09/2019', 'Sandisk', '16g', '', '', 'USB', '2'),
(3, '19/09/2019', 'Sandisk', '64g', '', '', 'USB', '5'),
(4, '19/09/2019', 'Samsung', 'Ecran plat 32', 'S87NG0X1QA154', '', 'Ecran', '1'),
(5, '19/09/2019', 'Sandisk', '16g', '', '', 'USB', '3'),
(6, '20/09/2019', 'Apple', 'MBA', 'C1MQV3X0G943', '', 'PC', '1'),
(7, '20/09/2019', 'Sandisk', '64g', '', '', 'USB', '2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_achat`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `cin` (`cin`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_vente`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_vente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
