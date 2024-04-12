<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
</head>
<body>

<!--header de la page-->
<header> 
    
    <div id="header_head">
        <img src="img/Rose.jpg" alt="Rose" width="10%" height="10%"> <!--adapter la taille de l'image avec width et height-->
        <h1>Société Lafleur</h1>
    </div>

    <br>

    <div id = "nav">
        <a href="index.html" id="current_nav">Accueil</a>
        <a href="#">Bulbes</a>
        <a href="php/Produits.php?cat=Rosiers">Rosiers</a>
        <a href="#">Plantes à massifs</a>
        <a href="Contact.html">Contact</a>
        <a href="#">Connexion</a>
        <a href="#">Panier</a>
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
        <form action = "verificationConnexion.php" method = "post">
            <table>
                <tr>
                    <td>
                        <label for = "username">Identifiant </label>
                    </td>
                    <td>
                        <input type = "text" name = "username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for = "password">Mot de passe </label>
                    </td>
                    <td>
                        <input type = "password" name = "password" required> 
                    </td>
                </tr>
            </table>
            <br><br>
            <input name="submit" type="submit" value="Connexion" id="submit"/>


            <?php 
                // on verifie si la personne a essayé de se connecter et à échoué
                if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == false){
                    echo "<p style=\"color:red\"> Le nom d'utilisateur ou le mot de est incorrect <p>";
                    $_SESSION['connecte'] = true; // juste pour éviter que le message réapparaisse à chaque fois
                }
            ?>
            <br><br><br><br><br>
        </form>
    
<?php require_once('templateBas.php')?>
