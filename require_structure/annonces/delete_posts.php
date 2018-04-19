<?php 
require('../connexion_BDD.php');


if(isset($_GET['id'])){
	$get = $_GET['id'];

	
	$delete = $bdd->prepare('DELETE FROM annonces  WHERE id = ?');
	$delete->execute(array($get));

	//echo "L'annonce n° " . $_GET['id'] . "a bien été supprimer";
	header('Location: ../../index.php?page=profil');


}



?>