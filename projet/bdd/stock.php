<?php

require_once('bdd.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $quantites = $_POST;
    $conn = connectDB();

    $stmt = $conn->prepare("UPDATE livres SET Stock = Stock - ? WHERE Reference = ?");

    // Parcourir les données de quantité
    foreach ($quantites as $reference => $quantiteArray) {

        foreach ($quantiteArray as $quantite) {

            $quantite = intval($quantite);

            if ($quantite > 0) {

                $stmt->bind_param("is", $quantite, $reference);
                $stmt->execute();
            }
        }
    }

    disconnectDB($conn);
    
;
}

