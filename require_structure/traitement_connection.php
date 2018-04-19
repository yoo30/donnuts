<?php
require '../bootstrap.php';
$_SESSION['erreur'] = "";

if (isset($_POST['pageConnection'])) {
	$mailConnect = htmlspecialchars($_POST['mailConnect']);
	$passConnect = htmlspecialchars($_POST['passConnect']);
	if(!empty($mailConnect) AND !empty($passConnect)) {
		$reqUser = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
		$reqUser->execute(array($mailConnect));
			
			$userExist = $reqUser->rowCount();
			if ($userExist == 1) {
				$userInfo = $reqUser->fetch();
					
				if(password_verify($_POST['passConnect'], $userInfo['pass'])){
					
					$_SESSION['membre_id'] = $userInfo['id'];
					$_SESSION['user_name'] = $userInfo['user_name'];
					$_SESSION['email'] = $userInfo['email'];
					$_SESSION['role'] = $userInfo['role'];

					header('Location: ../index.php?page=annonces/miniatures');
					
				} else {
					$_SESSION['erreur'] = " Adresse mail ou mot de passe incorrects !";
					header('Location: ../index.php?page=page_connection');
				}
			} else {
				$_SESSION['erreur'] = " Adresse mail ou mot de passe incorrects  !";
				header('Location: ../index.php?page=page_connection');
			}
	} else {
		$_SESSION['erreur'] = 'Tous les champs doivent être complétés !!';
		header('Location: ../index.php?page=page_connection');
	}
}
