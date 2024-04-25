DROP DATABASE IF EXISTS bookln;


CREATE DATABASE bookln;


USE bookln;


-- Créer la table des comptes utilisateurs
CREATE TABLE utilisateurs (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL
);


-- Créer la table des livres
CREATE TABLE livres (
Reference VARCHAR(50) PRIMARY KEY,
Categorie VARCHAR(255) NOT NULL,
Produit VARCHAR(255) NOT NULL,
Photo VARCHAR(255),
Description TEXT,
Prix DECIMAL(10, 2),
Stock INT
);