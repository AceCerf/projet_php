-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Mer 13 Février 2019 à 14:45
-- Version du serveur :  10.1.26-MariaDB-0+deb9u1
-- Version de PHP :  7.0.30-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `datas`
--

CREATE TABLE `datas` (
  `id` int(11) NOT NULL,
  `chemin_relatif` varchar(255) NOT NULL,
  `mime_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `auteur_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `datas`
--

INSERT INTO `datas` (`id`, `chemin_relatif`, `mime_type`, `description`, `auteur_id`, `date`) VALUES
(1, '/multimedia/images/rip.jpg', 'image/jpeg', 'La mort annoncée du jpeg ?', 1, '2019-02-12'),
(2, '/multimedia/images/soldier.png', 'image/png', 'L\'image d\'un soldat de profil, son meilleur ?', 2, '2019-02-12'),
(3, '/multimedia/images/kenny.gif', 'image/gif', 'Lui c\'est sur ils vont le tuer ', 3, '2019-02-12'),
(4, '/multimedia/images/homer.svg', 'image/svg+xml', 'Faut-il encore le présenter ? celui qui est capable de lire ce qui est écrit sur un gâteau rien qu\'à l\'odeur.', 4, '2019-02-12'),
(5, '/multimedia/audio/CouldYouBeLoved.ogg', 'audio/ogg', 'Titre de la légende du regage', 1, '2019-02-12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `password`) VALUES
(1, 'Bastien', '1234512345'),
(2, 'Tian', '1234512345'),
(3, 'Cyril', '1234512345'),
(4, 'Gerard', '1234512345');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `datas`
--
ALTER TABLE `datas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auteur_id` (`auteur_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `datas`
--
ALTER TABLE `datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `datas`
--
ALTER TABLE `datas`
  ADD CONSTRAINT `datas_ibfk_1` FOREIGN KEY (`auteur_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
