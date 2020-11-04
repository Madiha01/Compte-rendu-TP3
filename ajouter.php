<?php
$cin=$_REQUEST['cin'];
$nom=$_REQUEST['nom'];
$prenom=$_REQUEST['prenom'];
$email=$_REQUEST['email'];
$adresse=$_REQUEST['adresse'];
$pwd=$_REQUEST['pwd'];
$Classe=$_REQUEST['Classe'];
try
{
	$bdd = new PDO ('mysql:host=localhost;dbname=gestion_edutiant;charset=utf8' ,'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
$req="insert into etudiant values 
($cin,'$nom','$prenom','$email','$adresse','$pwd','$Classe')";
$reponse=$bdd->exec($req) or die("error");
if ($reponse) echo "OK";
else echo "not OK";
?>