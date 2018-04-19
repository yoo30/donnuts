<?php

class Annonce {

	function prepareData($request)
	{
		$request['categorie'] = htmlspecialchars($request['categorie']);
		$request['titre'] = htmlspecialchars($request['titre']);
		$request['contenu'] = htmlspecialchars($request['contenu']);
		$request['region'] = htmlspecialchars($request['region']);
		$request['ville'] = htmlspecialchars($request['ville']);
		$request['photo'] = '';

		return $request;
	}

	/**
	 * commentaire
	 *
	 * @param Array $request tableau contenant lesvaleurs des POSTS 
	 *
	 * @return Integer Id de l'annonce
	 */
	function createNewAnnonce($request) 
	{
		global $bdd;

		$membre_id = $_SESSION['membre_id'];
		$request = $this->prepareData($request);

		if (!empty($request['categorie']) 
			&& !empty($request['titre']) 
			&& !empty($request['contenu']) 
			&& !empty($request['region']) 
			&& !empty($request['ville'])) 
		{
			$insertAnnonce = $bdd->prepare('INSERT INTO annonces(membre_id, categorie, titre, date_post_message, contenu, region, ville, photo) VALUES(?, ?, ?, NOW(), ?, ?, ?, ?)');
	       	$insertAnnonce->execute(array(
	       		$membre_id, 
	       		$request['categorie'], 
	       		$request['titre'], 
	       		$request['contenu'], 
	       		$request['region'], 
	       		$request['ville'], 
	       		$request['photo']));
	       	$last_annonce_id = $bdd->lastInsertId();

			return $last_annonce_id;
		} else{
			$_SESSION['erreur'] = 'Tous les champs doivent être complétés !';
		}

		return false;
	}

	function updateAnnonce($request) 
	{
		global $bdd;

		$membre_id = $_SESSION['membre_id'];
		$request = $this->prepareData($request);

		$resAnnonce = $bdd->prepare('SELECT membre_id, categorie, titre, contenu, region, ville, photo FROM annonces WHERE id = ? AND membre_id = ?');

		$resAnnonce->execute(array($request['annonce_id'], $_SESSION['membre_id']));
		//var_dump( $resAnnonce->fetch());
		$reqAnnonce = $resAnnonce->fetch();

		$updateAnnonces = $bdd->prepare('UPDATE annonces 
			SET categorie = :categorie, titre = :titre, date_post_message = now(), contenu = :contenu, region = :region, ville = :ville  
			WHERE membre_id = :membre_id AND id=:annonce_id');

		$updateAnnonces->execute(array('categorie'=>$request['categorie'],
									'titre'=>$request['titre'],
									'contenu'=>$request['contenu'],
									'region'=>$request['region'],
									'ville'=>$request['ville'],
									'membre_id'=>$membre_id,
									'annonce_id'=>$request['annonce_id']
								));
		$last_annonce_id = $request['annonce_id'];

		return $last_annonce_id;
	}

	function uploadFile($files, $last_annonce_id) 
	{
		global $bdd;

		$tailleMax = 2097152;
		$extansionValides = array('jpg','jpeg', 'gif', 'png');

		if ($files['photo']['size'] <= $tailleMax){
			$extensionUpload = strtolower(substr(strrchr($files['photo']['name'], '.'), 1));

	   		if (in_array($extensionUpload, $extansionValides)) 
	   		{
		        $chemin = "photos/" .$last_annonce_id.'.'.$extensionUpload;
		        $resultat = move_uploaded_file($files['photo']['tmp_name'], $chemin);
	            if ($resultat){
	                $updatePhoto = $bdd->prepare('UPDATE annonces SET photo = :photo WHERE id = :id');
	                $updatePhoto->execute(array(
	                  'photo' => $last_annonce_id.'.'.$extensionUpload,
	                  'id' => $last_annonce_id,
	                ));		               	
				} else{
	  				$_SESSION['erreur'] = 'Erreur durant l\'importation de votre photo .';
				}
			} else {
		          $_SESSION['erreur'] = 'Votre image doit être de format jpg, jpeg, gif ou png';
		    }
	 	} else {
	   		$_SESSION['erreur'] = 'Votre photo ne doit pas dépasser 2 Mo';
	  	}
	}

	function listeAnnonces($membre_id)
	{
		global $bdd;

		$afficheAnnonces = $bdd->prepare("SELECT annonces.id AS annonce_id, annonces.photo, annonces.titre, DATE_FORMAT(annonces.date_post_message,'%d/%m/%Y %Hh%imin%ss')AS date_post_message, annonces.contenu,annonces.membre_id, membres.id, membres.user_name, membres.email 
			  FROM annonces
			    INNER JOIN membres ON annonces.membre_id = membres.id
			  WHERE 
			  membres.id = ? ORDER BY date_post_message DESC
			  ");

		$afficheAnnonces->execute(array($membre_id));
		$afficheAnnonces = $afficheAnnonces->fetchAll();

		return $afficheAnnonces;
	}

	function viewAnnonce($annonce_id)
	{
		global $bdd;

		$afficheAnnonces = $bdd->prepare('SELECT annonces.id AS annonce_id, annonces.photo, annonces.titre, annonces.date_post_message, annonces.contenu, annonces.categorie,annonces.region, annonces.membre_id, membres.id, membres.user_name, membres.email 
		  FROM annonces
		    INNER JOIN membres ON annonces.membre_id = membres.id
		  WHERE 
		    annonces.id = ? 
		  ORDER BY date_post_message DESC
		  ');

		$afficheAnnonces->execute(array($annonce_id));
		$afAnnonces = $afficheAnnonces->fetch();

		return $afAnnonces;	
	}

	function listeReponses($annonce_id)
	{
		global $bdd;

		$reponses = $bdd->prepare('SELECT contact.id_annonces, contact.reponse, contact.user_name, contact.email
		  FROM contact
		   
		  WHERE 
		    contact.id_annonces = ? 
		  ORDER BY id DESC
		  ');

		$reponses->execute(array($annonce_id));
		$reponses = $reponses->fetchAll();

		return $reponses;
	}

	function totalReponse($annonce_id)
	{
		global $bdd;

		$reponses = $bdd->prepare('SELECT COUNT(*) AS total
		  FROM contact
		   
		  WHERE 
		    contact.id_annonces = ? 
		  ORDER BY id DESC
		  ');

		$reponses->execute(array($annonce_id));
		$reponses = $reponses->fetchAll();

		return $reponses[0]['total'];	
	}
}
?>