<?php
    // Start session if it's not already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
     }

    // get the data
    require_once('varSession.inc.php');
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
        <img src="../img/Logo.jpg" alt="Logp" width="10%" height="10%"> <!--adapter la taille de l'image avec width et height-->
        <h1>Société BookIn</h1>
    </div>

    <br>

    <div id = "nav">
        <a href="index.php">Accueil</a>
        <?php
            foreach($differentsCat as $catName)
                echo '<a href="Produits.php?cat='.$catName.'">'.$catName.'</a>';

            echo '<a href="Contact.php">Contact</a>';
    
            if(isset($_SESSION["connecte"]) && $_SESSION["connecte"] == true)
            {
                echo '<a href="Deconnexion.php">Deconnexion</a>';
            }
            else{
                echo '<a href="Connexion.php">Connexion</a>';
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
                echo '<a href="Produits.php?cat='.$catName.'">'.$catName.'</a>';?>
            <a href="Contact.php">Contact</a>
            
        </div>

    </div>

    <!--partie principale-->
    <div id="right">
