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
</style>
<?php
include 'index.php';
include 'ProduitsManager.php';
    $i = $_POST['code'];
    $db = new PDO('mysql:host=localhost;dbname=bdproduits', 'root', '');
    $manager = new ProduitsManager($db);
    echo '<h2>Produit trouvé :</h2>';
    $produit = $manager->getProduit($i);
    if($produit) {
        echo '<fieldset class="produit">';
        echo '<img src="' . $produit->getImage() . '" alt="' . $produit->getNom() . '">';
        echo '<h3>' . $produit->getNom() . '</h3>';
        echo '<p>Description:' . $produit->getDescription() . '</p>';
        echo '<p>code: ' . $produit->getCode() . '</p>';
        echo '<p>Forme: ' . $produit->getForme() . '</p>';
        echo '<p>Motif: ' . $produit->getMotif() . '</p>';
        echo '<p>Prix: ' . $produit->getPrix() . ' D</p>';
        echo '<p>Couleur: ' . $produit->getColor() . '</p>';
        echo '<a href="ajouterPanier.php?id=' . $produit->getNom() . '">Ajouter au panier</a>';
        echo '</fieldset>';
    } else {
        echo 'Aucun produit trouvé';
    }
?>  