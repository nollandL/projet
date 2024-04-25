<?php
    // Start session if it's not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
     }

    // get the data
    include_once './bdd/bdd.php';

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



    $differentsCat = [];

    // We get the data we need for this page (the names of the different categories)
    foreach($data as $prod)
    {
        if(!in_array($prod['Categorie'], $differentsCat))
        {
            array_push($differentsCat, $prod['Categorie']);
        }
    }
?>


<!--header de la page-->
<header> 
    
    <div id="header_head">
        <img src="./img/Logo.jpg" id="logo" alt="Logp" width="10%" height="10%"> <!--adapter la taille de l'image avec width et height-->
        <h1>Société BookIn</h1>
    </div>

    <br>

    <div id = "nav">
        <a href="index.php">Accueil</a>
        <?php
            foreach($differentsCat as $catName)
                echo '<a href="./php/Produits.php?cat='.$catName.'">'.$catName.'</a>';
            echo '<a href="./php/Panier.php">Panier</a>';
            echo '<a href="./php/Contact.php">Contact</a>';
    
            if(isset($_SESSION["connecte"]) && $_SESSION["connecte"] == true)
            {
                echo '<a href="./php/Deconnexion.php">Deconnexion</a>';
            }
            else{
                echo '<a href="./php/Connexion.php">Connexion</a>';
            }
        ?>
    </div>

</header>




<!--milieu-->
<div id="main">
    

    <div id="left">
        <div id="page">
            <h2> Sté BookIn</h2>
            <p>Accueil</p>
        </div>

        <div id="produits">
            <h3>Nos produits</h3>
            <?php
            foreach($differentsCat as $catName)
                echo '<a href="./php/Produits.php?cat='.$catName.'">'.$catName.'</a>';?>
            <a href="./php/Contact.php">Contact</a>
            
        </div>

    </div>

    <!--partie principale-->
    <div id="right">
