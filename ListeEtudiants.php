<?php
try
{
	$bdd = new PDO ('mysql:host=localhost;dbname=gestion_edutiant;charset=utf8' ,'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' .$e->getMessage());
}
$req="SELECT * FROM etudiant";
$reponse=$bdd->query($req);
if($reponse->rowCount()>0)
{
	$outputs["etudiants"]=array();
	while($row=$reponse -> fetch(PDO::FETCH_ASSOC))
	{
		$etudiant=array();
		$etudiant["cin"]=$row["cin"];
		$etudiant["nom"]=$row["nom"];
		$etudiant["prenom"]=$row["prenom"];
		$etudiant["adresse"]=$row["adresse"];
		$etudiant["email"]=$row["email"];
		$etudiant["Classe"]=$row["Classe"];
		array_push($outputs["etudiants"],$etudiant);
	}
	$outputs["success"]=1;
	echo json_encode($outputs);
}
else
{
	$outputs["success"]=0;
	$outputs["message"]="Pas d'etudiants";
	echo json_encode($outputs);
}	
?>