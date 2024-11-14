<?php
session_start ();
$etudiants=[ "mobe"=>array("username"=>"mohamed.benmohamed@gmail.com",
"password"=>"moESCS","nom"=>"Mohamed Benmohamed"),"albe"=>array("username"=>"ali.benali@gmail.com","password"=>"alESCS","nom"=>"Ali Benali"),
"emma"=>array("username"=>"emnamaalej92@gmail.com","password"=>"emESCS","nom"=>"Emna Maalej")
];
if (isset($_POST['username']) && isset($_POST['password'])) {
$valide=false;
foreach ($etudiants as $index => $value){
if ($value["username"] == $_POST['username'] && $value["password"]==$_POST['password'])
{$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['indice']=$index;
$_SESSION['nom']=$value['nom'];
$valide=true;
break;
}
}
if($valide)
header("location:page_user.php");
else
header("location:accueil.html");
}
else
echo "Les variables du formulaire ne sont pas déclarées.";?>