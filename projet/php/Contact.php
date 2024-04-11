<?php
    // on charge les fichiers nécessaires à l'utilisation de php mailer
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    // Start session
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Contact</title>
    <link rel="stylesheet" type="text/css" href="../css/contact.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
    
    <script>
        //commentaire ligne js
    </script>
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
        <a href="index.html">Accueil</a>
        <a href="#">Bulbes</a>
        <a href="Produits.html">Rosiers</a>
        <a href="#">Plantes à massifs</a>
        <a href="Contact.html" id="current_nav">Contact</a>
        <a href="#">Connexion</a>
        <a href="#">Panier</a>
    </div>

</header>



<!--formulaire du jeune-->
<div id="main">
    

    <div id="left">
        <div id="page">
            <h2> Sté Lafleur</h2>
            <a href="index.html">Accueil</a>
            <br>
            <br>
        </div>

        <div id="produits">
            <h3>Nos produits</h3>
            <a href="#">Bulbes</a>
            <a href="Produits.html">Rosiers</a>
            <a href="#">Plantes à massif</a>
            <a href="Contact.html">Contact</a>
            
        </div>

    </div>
        
    
    
    <!--formulaire textuelle au milieu-->
    <div id="right">
        <br>

        <h2>Demande de contact</h2>

        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <label for="date_contact">Date du contact </label>
                    </td>
                    <td>
                        <input type="date" id="date_contact" name="date_contact" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">Nom </label>
                    </td>
                    <td>
                        <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom </label>
                    </td>
                    <td>
                        <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" placeholder="monmail@monsite.org" required><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="sexe">Genre</label>
                    </td>
                    <td>
                        <input type="radio" id="femme" name="sexe" value="femme" checked/>
                        <label for="femme">Femme</label>
                        
                        <input type="radio" id="homme" name="sexe" value="homme"/>
                        <label for="homme">Homme</label>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="date">Date de naissance :</label>
                    </td>
                    <td>
                        <input type="date" id="date_naissance" name="date_naissance" required><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="fonction">Fonction</label>
                    </td>
                    <td>
                        <select name="fonction" id="fonction">
                            <option value="Enseignant">Enseignant</option>
                            <option value="Etudiant">Etudiant</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="sujet">Sujet :</label>
                    </td>
                    <td>
                        <input type="text" id="sujet" name="sujet" placeholder="Entrez le sujet de votre mail"><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contenu">Contenu :</label>
                    </td>
                    <td>
                        <textarea  id="contenu" name="contenu" cols="100" rows="5" placeholder="Tapez ici votre mail"></textarea><br><br>
                    </td>
                </tr>
            </table>

            <?php
                // on verifie si la personne a essayé de se connecter et à échoué
                if(isset($_SESSION['erreur_envoi']) && $_SESSION['erreur_envoi'] == true){
                    echo "<p style=\"color:red\"> Le mail n'a pas était envoyé <p>";
                    $_SESSION['erreur_envoi'] = false; // juste pour éviter que le message réapparaisse à chaque fois
                }
            ?>

            <input type="submit" name="submit" id="submit" value="Envoyer">
        
            
        </form>
        
        <br>
        <br>
    </div>
</div>

<?php
    if (isset($_POST['submit']))
    {
        // Instanciation de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Instanciation de PHPMailer
            $mail = new PHPMailer(true);

            // Paramètres du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'projet.cytech@gmail.com';
            $mail->Password = 'ssudddrfmazlkfto';
            $mail->SMTPSecure = 'tls';
        
            // Paramètres de l'e-mail
            $mail->setFrom('projet.cytech@gmail.com', $_POST["nom"]." ".$_POST["prenom"]);       
            $mail->addAddress("rayan9510s@gmail.com", "Webmaster"); // changer l'adresse du webmaster si besoin
            $mail->Subject = "Contact : ".$_POST["sujet"];
            $mail->Body = "Il semblerait que ".$_POST["nom"]." ".$_POST["prenom"]." [". $_POST["fonction"] ."] (". $_POST["date_naissance"] .") souhaite vous contacter.\n"
                    ."Voici son message du ". $_POST["date_contact"] .":\n\n"
                    .$_POST["contenu"]."\n\nVous pouvez lui répondre à cette adresse :".$_POST["email"]." !";

            $mail->CharSet = 'UTF-8';
            
            // Désactiver la vérification du certificat SSL
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            $mail->send();  

            $message = 'Votre email a bien était envoyé !';
            $link = "..";

            $_SESSION["erreur_envoi"] = false;
        } 
        catch (Exception $e) {
            $message = "Impossible de valider la demande de contact. Veuillez réessayer plus tard.";
            $_SESSION["erreur_envoi"] = true;
            $link = "Contact.php";
        }           


        // envoie une alerte à l'utilisateur pour savoir si la demande a bien était réalisé
        echo "<script>window.alert(\"".$message."\");</script>";

        // redirige l'utilisateur au bon endroit
        echo "<script> window.location.replace(\"".$link."\");</script>";
    }
?>

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