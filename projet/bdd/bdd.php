<?php

include_once 'bddData.php';

// Fonction de connexion à la base de données
function connectDB() {
    global $servername, $username, $password, $database;
    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }
    
    return $conn;
}

// Fonction de déconnexion de la base de données
function disconnectDB($conn) {
    $conn->close();
}

// Fonction pour récupérer les utilisateurs
function getUtilisateurs() {
    $conn = connectDB();
    $utilisateurs = array();

    $sql = "SELECT nom, password FROM utilisateurs";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $utilisateurs[] = $row;
        }
    }

    disconnectDB($conn);
    return $utilisateurs;
}

// Fonction pour récupérer les livres
function getLivres() {
    $conn = connectDB();
    $livres = array();

    $sql = "SELECT Reference, Categorie, Produit, Photo, Description, Prix, Stock FROM livres";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $livres[] = $row;
        }
    }

    disconnectDB($conn);
    return $livres;
}