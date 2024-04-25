<?php

include_once '../bdd/bdd.php';





$dataSession = getUtilisateurs();

$dataSession2 = array();
foreach ($dataSession as $user) {
    if (isset($user['nom']) && isset($user['password'])) {
        $dataSession2[$user['nom']] = $user['password'];
    }
}

$dataSession = $dataSession2;

$data = getLivres();

// Vérifier si la conversion a réussi
if ($data === null) {
    // La conversion a échoué, gérer l'erreur ici
    echo "Erreur lors du décodage JSON";
}

?>
