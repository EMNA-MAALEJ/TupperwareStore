<?php
class ProduitsManager{
    public $db;
    public function __construct($db){
        $this->setDb($db);
    }
    public function setDb($db)
    {
        $this->db = $db;
    }
    public function addProduit(produits $produits){
        $query=$this->db->prepare('INSERT INTO produits (code,image,nom,description,forme,motif,prix,color,categorie_id) 
        VALUES (:code,:image,:nom,:description,:forme,:motif,:prix,:color,:categorie_id)');
           $query->bindValue(':code', $produits->getCode());
           $query->bindValue(':image', $produits->getImage());
           $query->bindValue(':nom', $produits->getNom());
           $query->bindValue(':description', $produits->getDescription());
           $query->bindValue(':forme', $produits->getForme());
           $query->bindValue(':motif', $produits->getMotif());
           $query->bindValue(':prix', $produits->getPrix());
           $query->bindValue(':color',$produits->getColor());
           $query->bindValue(':categorie_id', $produits->getCategorieId());
           
           if ($query->execute()) {
               echo "Insertion réussie";
           } else {
               echo "Echec insertion";
           }
       }
       public function getProduitsNormaux() {
        $produits = array();
        $q = $this->db->query("SELECT * FROM produits WHERE categorie_id = 1");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $produits[] = new Produits($donnees["code"], $donnees["image"], $donnees["nom"], $donnees["description"], 
            $donnees["forme"], $donnees["motif"], $donnees["prix"], $donnees["color"], $donnees["categorie_id"]);
        }
        return $produits;
    }
    public function getProduitsBebe() {
        $produits = array();
        $q = $this->db->query("SELECT * FROM produits WHERE categorie_id = 2");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $produits[] = new Produits($donnees["code"], $donnees["image"], $donnees["nom"], $donnees["description"], 
            $donnees["forme"], $donnees["motif"], $donnees["prix"], $donnees["color"], $donnees["categorie_id"]);
        }
        return $produits;
    }
    public function getProduitsOffreSpeciale() {
        $produits = array();
        $q = $this->db->query("SELECT * FROM produits WHERE categorie_id = 3");
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC)) {
            $produits[] = new Produits($donnees["code"], $donnees["image"], $donnees["nom"], $donnees["description"], 
            $donnees["forme"], $donnees["motif"], $donnees["prix"], $donnees["color"], $donnees["categorie_id"]);
        }
        return $produits;
    }
    public function getProduit($code) {
        $q = $this->db->query("SELECT * FROM produits WHERE code LIKE '$code'");
        if ($q->rowCount() > 0) {
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            return new Produits($donnees["code"],$donnees["image"], $donnees["nom"], $donnees["description"], 
            $donnees["forme"], $donnees["motif"], $donnees["prix"], $donnees["color"], $donnees["categorie_id"]);
        }
        return null;
    }
    }
?>