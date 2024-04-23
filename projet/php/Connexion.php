<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="../css/connexion.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
    <link rel="icon" type="image/png" href="../img/Logo.jpg">
</head>
<body>

<?php require_once('templateHaut.php');?>
        <br>

        <h2>Connexion</h2>

        <br>
        <form action = "verificationConnexion.php" method = "post">
            <table>
                <tr>
                    <td>
                        <label for = "username">Identifiant : </label>
                    </td>
                    <td>
                        <input type = "text" name = "username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for = "password">Mot de passe : </label>
                    </td>
                    <td>
                        <input type = "password" name = "password" required> 
                    </td>
                </tr>
            </table>
            <br><br>
            <input name="submit" type="submit" value="Connexion" id="submit"/> <br>

            <?php 
                // on verifie si la personne a essayé de se connecter et à échoué
                if(isset($_SESSION['connecte']) && $_SESSION['connecte'] == false){
                    echo "<p style=\"color:red\"> Le nom d'utilisateur ou le mot de est incorrect <p>";
                    unset($_SESSION['connecte']); // juste pour éviter que le message réapparaisse à chaque fois
                }
            ?>
            <br><br><br><br><br>
        </form>
    
<?php require_once('templateBas.php')?>
