<?php
    // Start session
    session_start();

    // get the data
    require_once('varSession.inc.php');
    $dataPanier = [];

    // We get the data we need for this page (the category we need)
    foreach($data as $prod)
    {
        if(isset($_SESSION[$prod['Reference']]) and $_SESSION[$prod['Reference']] > 0)
        {
            array_push($dataPanier, $prod);
        }
    }

    // if the category doesn't exist we go back to home page
    if(empty($dataPanier))
    {
        header("Location: index.php");
        exit();
    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<title><?=$dataPanier[0]['Categorie']?></title>
    <link rel="stylesheet" type="text/css" href="../css/rosiers.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8"></meta>
    <script type="text/javascript" src="../js/produits?>.js"></script>
    
</head>
<body>

<?php require_once('templateHaut.php');?>
        <br>

        <h2>Rosiers</h2>

        <br>
        <form action="ajoutPanier_Panier.php" method="post">
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
                    for($i = 0; $i < count($dataPanier); $i++){
                ?>
                    <tr>
                        <td width="15%">
                            <!-- Trigger the Modal -->
                            <img class="myImg" src=<?="../img/".$dataPanier[$i]['Photo']?> alt=<?=$dataPanier[$i]['Produit']?> onclick="imgZoom(<?=$i?>)"> <!--adapter la taille de l'image avec width et height-->

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
                            <?=$dataPanier[$i]['Reference']?>
                        </td>
                        <td>
                            <?=$dataPanier[$i]['Description']?>
                        </td>
                        <td>
                            <?=$dataPanier[$i]['Prix']?>€
                        </td>
                        <td class="stock">
                            <?=$_SESSION[$dataPanier[$i]['Reference']]?>
                        </td>
                        <td>
                            <input type="button" value="-" id=<?=($i+1)?> onclick="remove(this.id)"<?php
                            if(!isset($_SESSION[$dataPanier[$i]['Reference']]) || $_SESSION[$dataPanier[$i]['Reference']] <= 0)
                                echo "disabled";
                            ?>>
                            <input type="number" class="commande" name="<?=$dataPanier[$i]['Reference']?>[]" value="<?php
                                if(isset($_SESSION[$dataPanier[$i]['Reference']]))
                                    echo $_SESSION[$dataPanier[$i]['Reference']];
                                else
                                    echo 0;
                            ?>" readonly>
                            <input type="button" value="+" id=<?=($i+1)*10?> onclick="add(this.id)"<?php
                            if(isset($_SESSION[$dataPanier[$i]['Reference']]) && $_SESSION[$dataPanier[$i]['Reference']] >= $dataPanier[$i]['Stock'])
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

