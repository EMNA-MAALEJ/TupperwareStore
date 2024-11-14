<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Nos Produits</title>
    <style>
#searchForm {
    display: flex;
    align-items: center;
}
#searchInput {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
    width: 200px;
    height: auto;
     margin-top: 10px;
}
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
.produit {
    flex: 1 1 calc(30% - 20px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    overflow: hidden;
}

.produit img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    margin-bottom: 10px;
}
    </style>
</head>
<body>
<header>
            <div class="header-left">
              <img src="Tupperware.png" alt="photo header">
           </div>
          <nav>
                <ul>
              <li><a href="accueil.html">Accueil</a></li>
                   <li><a href="A propos.html">À propos</a></li>
                   <li class="dropdown">
                    <a href="produits.php">Catalogue</a>
                    <ul class="dropdown-content">
                    <li><a href="produitsNormaux.php">Produits normaux</a></li>
                     <li><a href="produitsBébé.php">Produits pour bébé</a></li>
                     <li><a href="offreSpeciale.php">des offres spéciales</a></li>
                    </ul>
                </li>
                  <li><a href="contact.html">Contact</a></li>
                  <li class="right-align">
                  <form id="searchForm" action="RechercherPoduit.php" method="post">
                    <input id="searchInput"type="text" name="code" placeholder="Rechercher...">
                </form>
                </li>
                <li class="right-align"><a href="#panier"><i class="fas fa-shopping-cart"></i> Panier</a></li>
                <li class="right-align"><a href="login.html"><i class="fas fa-user"></i> login</a></li>
                  </ul>
                   </nav>
                   <h1 style="color: #414242">Vivez en couleur avec Tupperware</h1>
                 </header>
<?php 
   include 'index.php';
   include 'produitsmanager.php';
   $db = new PDO('mysql:host=localhost;dbname=bdproduits', 'root', '');
   $manager = new ProduitsManager($db);
   $produits = $manager->getProduitsBebe();
   echo '<div class="produits">';
   echo '<h2>Produits Bébé</h2>';
   echo '<div class="produits-container">';
   foreach ($produits as $produit) {
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
   }

   echo '</div>';
   echo '</div>';
    ?>
         <footer>
        <div class="footer-content">
            <ul>
                <li><a href="accueil.html">Accueil</a></li>
                <li><a href="A propos.html">À propos</a></li>
                <li><a href="produits.php">Catalogue</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <p>© 2024 Dart Industries Inc. All rights reserved.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/TupperwareBrandsCorp?locale=fr_FR" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/tupperwarebrandsph/" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://www.linkedin.com/company/tupperware-brands-argentina-s-a-/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>
    <script src="java.js"></script>
</body>
</html