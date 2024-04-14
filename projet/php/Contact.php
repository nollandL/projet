<?php
    // on charge les fichiers nécessaires à l'utilisation de php mailer
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    require 'PHPMailer/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;


    // Start session
    session_start();

    // Validation des données côté serveur
$errors = array();

// Fonction de validation pour vérifier les caractères spéciaux
function hasSpecialChars($input) {
    return preg_match('/[^\w\s]/', $input);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["nom"])) {
        $errors["nom"] = "Le nom est requis";
    } elseif (hasSpecialChars($_POST["nom"]) || preg_match('/[\d]/', $_POST["nom"])) {
        $errors["nom"] = "Le nom ne doit pas contenir de chiffres, ponctuation et de charactere spéciaux";
    }
    
    // Vérification du prénom
    if (empty($_POST["prenom"])) {
        $errors["prenom"] = "Le prénom est requis";
    } elseif (hasSpecialChars($_POST["prenom"]) || preg_match('/[\d]/', $_POST["prenom"])) {
        $errors["prenom"] = "Le prénom ne doit pas contenir de chiffres,ponctuation et de charactere spéciaux";
    }
    
    // Vérification du sujet
    if (empty($_POST["sujet"])) {
        $errors["sujet"] = "Le sujet est requis";
    } elseif (hasSpecialChars($_POST["sujet"])) {
        $errors["sujet"] = "Le sujet ne doit pas contenir de charactere spéciaux";
    }
    
    // Ajoutez d'autres vérifications au besoin...
    

}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="../css/contact.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
	<script type="text/javascript" src="../js/Contact.js"></script>
	<link rel="icon" type="image/png" href="../img/Logo.jpg">
</head>
<body>

<?php require_once('templateHaut.php');?>
        <br>

        <h2>Demande de contact</h2>

        <br>
        
        
        
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return validateForm()">
        <table>
            <tr>
                    <td>
                        <label for="date_contact">Date du contact </label>
                    </td>
                    <td>
                        <input type="date" id="date_contact" name="date_contact" required value="<?php echo isset($_POST['date_contact']) ? $_POST['date_contact'] : ''; ?>">
                    </td>
            </tr>
            <tr>
            <td>
                <label for="nom">Nom </label>
                </td>
                    <td>
                <input type="text" id="nom" name="nom" placeholder="Entrez votre nom" value="<?php echo isset($_POST['nom']) ? $_POST['nom'] : ''; ?>" required><br>
                <span class="error"><?php echo isset($errors["nom"]) ? $errors["nom"] : ''; ?></span>
                </td>
            </tr>
            <tr>
             <td>
                <label for="prenom">Prenom </label>
            </td>
                <td>
                    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom" value="<?php echo isset($_POST['prenom']) ? $_POST['prenom'] : ''; ?>" required><br>
                 <span class="error"><?php echo isset($errors["prenom"]) ? $errors["prenom"] : ''; ?></span>
            </td>
            </tr>

            <tr>
                    <td>
                        <label for="email">Email </label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" placeholder="monmail@monsite.org" required value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>"><br>
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
                        <input type="date" id="date_naissance" name="date_naissance" required value="<?php echo isset($_POST['date_naissance']) ? $_POST['date_naissance'] : ''; ?>"><br>
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
                    <input type="text" id="sujet" name="sujet" placeholder="Entrez le sujet de votre mail" value="<?php echo isset($_POST['sujet']) ? $_POST['sujet'] : ''; ?>"><br>
                    <span class="error"><?php echo isset($errors["sujet"]) ? $errors["sujet"] : ''; ?></span>
                </td>
            </tr>
            <tr>
                    <td>
                        <label for="contenu">Contenu :</label>
                    </td>
                    <td>
                        <textarea  id="contenu" name="contenu" cols="100" rows="5"  placeholder="Tapez ici votre mail"><?php echo isset($_POST['contenue']) ? $_POST['contenue'] : ''; ?></textarea><br><br>
                    </td>
                </tr>
         
        </table>

       

        <input type="submit" name="submit" id="submit" value="Envoyer" onsubmit="return validateForm();">
    </form>

        
        
            <?php 
                // on verifie si la personne a essayé de se connecter et à échoué
                if(isset($_SESSION['erreur_envoi']) && $_SESSION['erreur_envoi'] == true){
                    echo "<p style=\"color:red\"> Le mail n'a pas était envoyé <p>";
                    $_SESSION['erreur_envoi'] = false; // juste pour éviter que le message réapparaisse à chaque fois
                }
            ?>

         
        <br>
        <br>
        <?php

    


    // Ajoutez des vérifications supplémentaires pour chaque champ...
    
    // Si aucune erreur n'est trouvée, envoyez l'e-mail
    if (empty($errors)) {
        
    
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
            $mail->addAddress("bairoukiys@cy-tech.fr", "Webmaster"); // changer l'adresse du webmaster si besoin
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
}
        // Construction de l'e-mail et envoi avec PHPMailer
        // ...
    


?>

<?php require_once('templateBas.php');?>
