<?php
class Produits{
    private string $code;
    private string $image;
    private string $description;
    private string $color;
    private string $nom;
    private string $categorie_id;
    private string $forme;
    private string $motif;
    private float $prix;
    public const REMISE=0.30;   
    public function __construct($code,$image,$nom,$description,$forme,$motif,$prix,$color,$categorie_id)
    {   
        $this->code=$code;
        $this->image=$image;
        $this->nom=$nom;
        $this->description=$description;
        $this->forme=$forme;
        $this->motif=$motif;
        $this->prix=$prix;
        $this->color=$color;
        $this->categorie_id=$categorie_id;
    }
    public function getCode():string{
        return $this->code;
    }
    public function getImage():string{
        return $this->image;
    }
    public function getDescription():string{
        return $this->description;
    }
    public function getForme():string{
        return $this->forme;
    }
    public function getMotif():string{
        return $this->motif;
    }
    public function getColor():string{
        return $this->color;
    }
    public function getNom():string{
        return $this->nom;
    }
    public function getPrix():float{
        return $this->prix;
    }
    public function getCategorieId():string{
        return $this->categorie_id;
    }
    public function setCode(string $code){
        $this->code=$code;
    }
    public function setImage(string $image){
        $this->image=$image;
    }
    public function setDescription(string $description){
        $this->description = $description;
    }
    public function setForme(string $forme){
        $this->forme = $forme;
    }
    public function setMotif(string $motif){
        $this->motif = $motif;
    }
    public function setColor(string $color){
        $this->color = $color;
    }
    public function setNom(string $nom){
        $this->nom = $nom;
    }
    public function setPrix(float $prix){
        $this->prix = $prix;
    }
    public function setCategorieId(string $categorie_id){
        $this->categorie_id = $categorie_id;
    }
}
?>