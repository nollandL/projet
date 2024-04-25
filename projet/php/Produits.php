<?php
    // Start session
    session_start();

    // get the data
    require_once('varSession.inc.php');
    $dataCat = [];

    // We get the data we need for this page (the category we need)
    foreach($data as $prod)
    {
        if($prod['Categorie'] == $_GET['cat'])
        {
            array_push($dataCat, $prod);
        }
    }

    // if the category doesn't exist we go back to home page
    if(empty($dataCat))
    {
        header("Location: ../index.php");
        exit();
    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?=$dataCat[0]['Categorie']?></title>
    <link rel="stylesheet" type="text/css" href="../css/produit.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
    <script type="text/javascript" src="../js/produits.js"></script>
    <link rel="icon" type="image/png" href="../img/Logo.jpg">
    
</head>
<body>

<?php require_once('templateHaut.php');?>
        <br>
        <br>
        <h2><?=$dataCat[0]['Categorie']?></h2>
        <br><br>
        <br>
        <form action="ajoutPanier.php" method="post">
            <table>
                <tr>
                    <th scope="col">Photo</th>
                    <th scope="col">Référence</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col" class="stock">Stock</th>
                    <th scope="col">Commande</th>
                </tr>
                <?php
                    for($i = 0; $i < count($dataCat); $i++){
                            
                ?>
                    <tr 
                    <?php
                        if(!($dataCat[$i]['Stock'] > 0 )){
                            echo "style='display:none'";
                        }
                    ?>>
                        <td width="15%">
                            <!-- Trigger the Modal -->
                            <img class="myImg" src=<?="../img/".$dataCat[$i]['Photo']?> alt=<?=$dataCat[$i]['Produit']?> onclick="imgZoom(<?=$i?>)"> <!--adapter la taille de l'image avec width et height-->

                            <!-- The Modal -->
                            <div id="<?="myModal".$i?>" class="modal">

                            <!-- The Close Button -->
                            <span class="close" onclick="hideImg(<?=$i?>)">&times;</span>

                            <!-- Modal Content (The Image) -->
                            <img class="modal-content" id="<?="img0".$i?>">

                            <!-- Modal Caption (Image Text) -->
                            <div class="caption" id="<?="caption".$i?>"></div>
                        </div>
                        </td>
                        <td>
                            <?=$dataCat[$i]['Reference']?>
                        </td>
                        <td>
                            <?=$dataCat[$i]['Description']?>
                        </td>
                        <td>
                            <?=$dataCat[$i]['Prix']?>€
                        </td>
                        <td class="stock">
                            <?=$dataCat[$i]['Stock']?>
                        </td>
                        <td>
                            <input type="button" value="-" id=<?=($i+1)?> onclick="remove(this.id)"<?php
                            if(!isset($_SESSION[$dataCat[$i]['Reference']]) || $_SESSION[$dataCat[$i]['Reference']] <= 0)
                                echo "disabled";
                            ?>>
                            <input type="number" class="commande" name="<?=$dataCat[$i]['Reference']?>[]" value="<?php
                                if(isset($_SESSION[$dataCat[$i]['Reference']]))
                                    echo $_SESSION[$dataCat[$i]['Reference']];
                                else
                                    echo 0;
                            ?>" readonly>
                            <input type="button" value="+" id=<?=($i+1)*10?> onclick="add(this.id)"<?php
                            if(isset($_SESSION[$dataCat[$i]['Reference']]) && $_SESSION[$dataCat[$i]['Reference']] >= $dataCat[$i]['Stock'])
                                echo "disabled";
                            ?>>
                            <br><br>
                            <input type="submit" class="panier" value="Ajouter au panier">
                        </td>
                    </tr>
                <?php
                    }
                ?>

            </table>
        </form>
        <br>
        <br>
        
        <button onclick="toggleStock()" id="stockButton">Afficher stock</button><br><br>
<?php require_once('templateBas.php');?>

