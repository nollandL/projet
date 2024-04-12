<?php
    // Start session
    session_start();    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Accueil</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
</head>
<body>

<!--header de la page-->
<header> 
    
    <div id="header_head">
        <img src="img/Rose_Rouge.jpg" alt="Rose" width="10%" height="10%"> <!--adapter la taille de l'image avec width et height-->
        <h1>Société Lafleur</h1>
    </div>

    <br>

    <div id = "nav">
        <a href="index.html" id="current_nav">Accueil</a>
        <a href="php/Produits.php?cat=Bulbes">Bulbes</a>
        <a href="php/Produits.php?cat=Rosiers">Rosiers</a>
        <a href="php/Produits.php?cat=PLantesMassifs">Plantes à massifs</a>
        <a href="php/Contact.php">Contact</a>
        <?php
            if(isset($_SESSION["connecte"]) && $_SESSION["connecte"] == true)
            {
                echo '<a href="php/Deconnexion.php">Deconnexion</a>';
            }
            else{
                echo '<a href="php/Connexion.php">Connexion</a>';
            }
        ?>
    </div>

</header>




<!--milieu-->
<div id="main">
    

    <div id="left">
        <div id="page">
            <h2> Sté Lafleur</h2>
            <p>Accueil</p>
        </div>

        <div id="produits">
            <h3>Nos produits</h3>
            <a href="#">Bulbes</a>
            <a href="Produits.html">Rosiers</a>
            <a href="#">Plantes à massif</a>
            <a href="Contact.html">Contact</a>
            
        </div>

    </div>

    <!--partie principale-->
    <div id="right">
        <h2>"Dites-le avec Lafleur"</h2>
        <img src="img/Rose_rouge.jpg" alt="Rose" width="40%" height="70%"> <!--adapter la taille de l'image avec width et height-->
    

        <p>
            Appelez notre service commercial au 03.22.84.65.74 pour recevoir un bon de commande 
        </p>
    </div>
</div>



<footer>
    <div>
        <p>Copyright Société Lafleur</p>

        <p>Webmaster CY Tech</p>
    </div>
</footer>
<!--
    commentaire html
-->

</body>
</html>