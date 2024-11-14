<style>
.commande{
    width: 30%;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-around;
}
</style>
<?php
session_start();
$bienvenue="Bienvenue";
?>
<html>
<head>
<title>Page de la session user</title>
</head>
<body>
<?php
if (isset($_SESSION['username']) && isset($_SESSION['password'])) :?>
<h3><?= $bienvenue .$_SESSION['nom']." dans votre espace personnel"?></h3><h5>Votre login est: <?= $_SESSION['username']?></h5>
<div class="commande">
<a href="mes_commandes.php"style="background-color: green; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin: 10px;">Voir Mes commandes</a><br/>
<a href="Quitter.php"style="background-color: green; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin: 10px;margin-left:20px;">Quitter</a>
</div>
<?php else :
echo 'Les variables de sessions ne sont pas déclarées.';
endif;?>
</body>
</html>