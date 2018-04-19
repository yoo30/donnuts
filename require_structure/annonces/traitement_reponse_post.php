<?php
session_start();                          //demarrage session 
require('../connexion_BDD.php');             // connexion base de donnée

if(!empty($_SESSION['user_name'] AND $_SESSION['email']))
{
		if(isset($_POST['envoi_reponse']))
		{
			$user_name = htmlspecialchars($_POST['user_name']);
			$email = htmlspecialchars($_POST['email']);
			$message = htmlspecialchars($_POST['message']);
			$id_annonces = htmlspecialchars($_POST['id_annonces']);


			if(!empty($_POST['user_name'] AND $_POST['email'] AND $_POST['message']))
			{
				$req = $bdd->prepare('INSERT INTO contact(user_name, email, reponse, id_annonces) VALUES (?, ?, ?, ?)');
				$req->execute(array($user_name, $email, $message, $id_annonces));
				header('Location: ../../index.php?page=annonces/miniatures');	
			}else{
					echo "Tous les champs doivent être remplis !";
				 }
		}else{

			 }
}else{
		echo "Vous devez vous inscrire pour pouvoir contacter ce membres";
	 }
?>