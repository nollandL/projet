<?php

/*
$dataSession = array(
    'john_doe' => '123',
    'a' => 'a'
);


// Define a 2D array to store categories and products data
$data = array(
    array('Categorie' => 'Rosiers', 'Produit' => 'Rose Rouge', 'Photo' => 'Rose_rouge.jpg', 'Reference' => 'r01', 'Description' => '1 pied spécial "grandes fleurs"', 'Prix' => 20, 'Stock' => 10),
    array('Categorie' => 'Rosiers', 'Produit' => 'Rose Rouge', 'Photo' => 'Rose_rouge.jpg', 'Reference' => 'r01', 'Description' => '1 pied spécial "grandes fleurs"', 'Prix' => 20, 'Stock' => 10),
    array('Categorie' => 'Rosiers', 'Produit' => 'Rose Rose', 'Photo' => 'Rose_rose.jpg', 'Reference' => 'r02', 'Description' => '1 pied spécial "grandes fleurs"', 'Prix' => 20, 'Stock' => 15),
    array('Categorie' => 'Rosiers', 'Produit' => 'Rose Rose', 'Photo' => 'Rose_rose.jpg', 'Reference' => 'r02', 'Description' => '1 pied spécial "grandes fleurs"', 'Prix' => 20, 'Stock' => 15),
    array('Categorie' => 'Rosiers', 'Produit' => 'Rose Rose', 'Photo' => 'Rose_rose.jpg', 'Reference' => 'r02', 'Description' => '1 pied spécial "grandes fleurs"', 'Prix' => 20, 'Stock' => 15)
);


$jsonData = json_encode($data);

// Affichage du résultat JSON à copier dans le fichier json
echo $jsonData;
*/
// Charger le fichier XML
$xml = simplexml_load_file('session.xml');

// Convertir l'objet SimpleXMLElement en tableau associatif
$dataSession = json_decode(json_encode($xml), true);





// Chemin vers votre fichier JSON
$file_path = 'varProduits.json';

// Lire le contenu du fichier JSON
$json_data = file_get_contents($file_path);

// Décoder la chaîne JSON en tableau PHP
$data = json_decode($json_data, true);

// Vérifier si la conversion a réussi
if ($data === null) {
    // La conversion a échoué, gérer l'erreur ici
    echo "Erreur lors du décodage JSON";
}




?>
