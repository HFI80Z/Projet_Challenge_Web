-- Créer la base de données si elle n'existe pas
CREATE DATABASE IF NOT EXISTS `projet_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Utiliser la base
USE `projet_db`;

-- Table users
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `nom` VARCHAR(100) DEFAULT NULL,
  `prenom` VARCHAR(100) DEFAULT NULL,
  `region` VARCHAR(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table annonces
-- Ajout de la colonne image VARCHAR(255)
CREATE TABLE IF NOT EXISTS `annonces` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `titre` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `prix` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `user_id` INT UNSIGNED NOT NULL,
  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` VARCHAR(255) DEFAULT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
