<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])){
        echo "Veuillez remplir tous les champs du formulaire.";
    } else {
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
echo "Voici les données : <br> Le nom de l'expéditeur est <b>$name</b> <br>";echo"son email est <b>$email</b> <br>";
echo " le message de <b>$name</b> est <b>$message</b>";
    }
}
?>