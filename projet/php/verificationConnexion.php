<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion...</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
</head>



<p>Connexion...</p>

<?php
    session_start();
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['username'] = $_POST['username'];

    $_SESSION['connecte'] = false;

    // on ouvre le fichier des comptes
    require_once('varSession.inc.php');



    $conditions = (isset($dataSession[$_SESSION['username']]) && strcmp($dataSession[$_SESSION['username']], $_SESSION['password']) == 0);
    if($conditions) // si l'identifiant et le mot de passe correspondent
    {
        $_SESSION['connecte'] = true;
        $_SESSION["id"] = $dataSession[$_SESSION['username']];
        
        $home = "index.php";       
    }
    else
    {
        $home="connexion.php";
    }
    echo "alert($conditions);";
    echo "<script> window.location.replace('".$home."'); </script>";
?>

<!--
    commentaire 
-->

</body>
</html>
