<link rel="stylesheet" href="styles.css">
<style>
    .produit a {
    display: inline-block;
    background-color: #4AC1B9;
    color: white;
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 4px;
    transition: background-color 0.3s;
    font-size: 20px;
}

.produit a:hover {
    background-color: #3D9B91;
}
.commande{
    width: 80%;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-around;
}
</style>
<?php
include 'index.php';
include 'produitsmanager.php';
session_start();

$db = new PDO('mysql:host=localhost;dbname=bdproduits', 'root', '');
$manager = new ProduitsManager($db);

$codes = array('pd50', 'pd36', 'pd10'); 

$produits = array();
foreach ($codes as $code) {
    $produits[] = $manager->getProduit($code);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vos commandes</title>
</head>
<body>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['password'])) :
    ?>
    <h2>Liste des commandes de Mr/Mme <?= $_SESSION["nom"]; ?></h2>
    <?php
    echo '<div class="produits">';
    echo '<div class="produits-container">';
    foreach ($produits as $produit) {
        echo '<fieldset class="produit">';
        echo '<img src="' . $produit->getImage() . '" alt="' . $produit->getNom() . '">';
        echo '<h3>' . $produit->getNom() . '</h3>';
        echo '<p>Description:' . $produit->getDescription() . '</p>';
        echo '<p>Code: ' . $produit->getCode() . '</p>';
        echo '<p>Forme: ' . $produit->getForme() . '</p>';
        echo '<p>Motif: ' . $produit->getMotif() . '</p>';
        echo '<p>Prix: ' . $produit->getPrix() . ' D</p>';
        echo '<p>Couleur: ' . $produit->getColor() . '</p>';
        echo '<a href="ajouterPanier.php?id=' . $produit->getNom() . '">Recommander</a>';
        echo '</fieldset>';
    }

    echo '</div>';
    echo '</div>';
    ?>
    <div class="commande">
 <a href="page_user.php"style="background-color: green; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin: 10px;">Ma page d’accueil</a><br/>
    <a href="Quitter.php"style="background-color: green; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin: 10px; margin-left: 400px;">Déconnexion</a>
    </div>
<?php else :
    echo 'Les variables de sessions ne sont pas déclarées.';
endif; ?>
</body>
</html>