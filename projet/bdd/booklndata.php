<?php
// Fonction pour échapper les caractères spéciaux dans les valeurs
function escapeValue($value) {
    return str_replace("'", "''", $value);
}


$backupFile = '../sql/booklndata.sql';


$fileHandler = fopen($backupFile, 'w');


if ($fileHandler === false) {
    die("Erreur : Impossible d'ouvrir le fichier de sauvegarde.");
}

// Lire et save le fichier varProduits.json
$varProduitsJson = file_get_contents('../php/varProduits.json');
$varProduitsData = json_decode($varProduitsJson, true);

if ($varProduitsData !== null) {

    foreach ($varProduitsData as $produit) {
        $categorie = escapeValue($produit['Categorie']);
        $nomProduit = escapeValue($produit['Produit']);
        $photo = escapeValue($produit['Photo']);
        $reference = escapeValue($produit['Reference']);
        $description = escapeValue($produit['Description']);
        $prix = $produit['Prix'];
        $stock = $produit['Stock'];
        $sql = "INSERT INTO livres (Reference, Categorie, Produit, Photo, Description, Prix, Stock) VALUES ('$reference', '$categorie', '$nomProduit', '$photo', '$description', $prix, $stock);";
        fwrite($fileHandler, $sql . "\n");
    }
}

// Lire et save le fichier session.xml
$sessionXml = simplexml_load_file('../php/session.xml');

if ($sessionXml !== false) {

    foreach ($sessionXml->children() as $user) {
        $nom = $user->getName();
        $password = escapeValue((string)$user);
        $sql = "INSERT INTO utilisateurs (nom, password) VALUES ('$nom', '$password');";
        fwrite($fileHandler, $sql . "\n");
    }
}


fclose($fileHandler);

echo "Les requêtes INSERT ont été sauvegardées dans le fichier : $backupFile";
?>
