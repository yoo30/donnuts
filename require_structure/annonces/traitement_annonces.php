<?php

require '../../bootstrap.php';

$_SESSION['erreur'] = '';

if (empty($_POST['annonce_id']))
{
	$last_annonce_id = $Annonce->createNewAnnonce($_POST);
}


//---------------------------------ré-edition annonces postées-----------------------------//

if(!empty($_POST['annonce_id']))
{
	$last_annonce_id = $Annonce->updateAnnonce($_POST);
}

if (isset($_FILES['photo']))
{
	$Annonce->uploadFile($_FILES, $last_annonce_id);
}

header('Location:index.php?page=annonces/formulaire_annonces');	
