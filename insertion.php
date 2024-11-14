<?php
include 'index.php';
include 'produitsmanager.php';
$db = new PDO('mysql:host=localhost;dbname=bdproduits', 'root', '');
$manager = new ProduitsManager($db);
if (isset($_POST['code']) && isset($_POST['image']) && isset($_POST['nom']) && isset($_POST['description']) &&isset($_POST['forme'])&&isset($_POST['motif'])&&isset($_POST['prix'])&&isset($_POST['color'])&&isset($_POST['categorie_id'])) {
    if (empty($_POST['code']) ||empty($_POST['image'])|| empty($_POST['nom']) || empty($_POST['description'])|| empty($_POST['forme'])|| empty($_POST['motif'])|| empty($_POST['prix'])|| empty($_POST['color'])|| empty($_POST['categorie_id'])){
        echo "Veuillez remplir tous les champs du formulaire.";
    }else{
$code = $_POST['code'];
$image=$_POST['image'];
$nom = $_POST['nom'];
$description = $_POST['description'];
$forme = $_POST['forme'];
$motif = $_POST['motif'];
$prix = floatval($_POST['prix']);
$color = $_POST['color'];
$categorie_id = $_POST['categorie_id'];
$produitexistant=$manager->getProduit($code);
if($produitexistant!== null){
    echo "le produit avec le code $code existe déjà.";
} else{
$produit = new Produits($code,$image, $nom, $description, $forme, $motif, $prix, $color, $categorie_id);
$manager->addProduit($produit);
echo "Produit ajouté avec succès.";
    }}}
?>
