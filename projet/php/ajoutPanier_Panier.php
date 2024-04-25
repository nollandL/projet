<?php
    // start the session
    session_start();

    // get the data
    require_once('varSession.inc.php');
    $dataPanier = [];

   // We get the data we need for this page (the category we need)
   foreach($data as $prod)
   {
       if(isset($_POST[$prod['Reference']])) // we verify if the variable exist
       {

            $commandeMax = $_POST[$prod['Reference']][0];
            foreach($_POST[$prod['Reference']] as $commande) // if there is the same product multiple times on produits.php we search for the most biggest commande
            {
                if($commandeMax < $commande) 
                    $commandeMax = $commande;
            }
            $dataPanier[$prod['Reference']] = $commandeMax;
       }
   }

   foreach($dataPanier as $reference=>$quantity) // we create the sessions variables
   {
        $_SESSION[$reference] = $quantity;
   }

    header("Location: Panier.php");
    exit();
   
?>

