<?php 
 
if(isset($_GET['annonce_id'])){
	$getId = $_GET['annonce_id'];
/*$resAnnonce = $bdd->prepare('SELECT membre_id, categorie, titre, contenu, region, ville, photo FROM annonces WHERE id = ? AND membre_id = ?');

$resAnnonce->execute(array($_GET['annonce_id'], $_SESSION['membre_id']));
$reqAnnonce = $resAnnonce->fetch();*/

$annonce = $Annonce->viewAnnonce($getId);
}

$selectCategory = $bdd->query('SELECT value FROM categories'); 
$selectRegion = $bdd->query('SELECT value FROM region');
?>

<?php  //var_dump($_SESSION); ?>
<fieldset>
	<div id="formulaire" align="center">
	<legend>Votre annonce</legend>
		<form method="post" action="require_structure/annonces/traitement_annonces.php" enctype="multipart/form-data">

			<?php
				if (!empty($_GET['annonce_id'])){
				?>
				<input type="hidden" name="annonce_id" value="<?php echo $_GET['annonce_id']?>">
				<?php
				}
			?>
			<label for="categorie">Categorie *</label><br />
	<select name="categorie" id="categorie">
<?php	
while($category = $selectCategory->fetch())
{
?>
				<option value="<?php echo $category['value']; ?>" 
			<?php 
			//echo $category['value'];
			if(isset($annonce) && $category['value'] == $annonce['categorie']){
			echo "selected";} ?> >
			<?php  echo $category['value']; ?></option>
		
<?php
		}
//}
?>
	</select><br />
<label for="titre">Titre de l'annonce*</label><br />
			<input class="input is-success" type="text" name="titre" placeholder="Titre" id="titre" value="<?php if(isset($annonce['titre'])){echo $annonce['titre'];} ?>" /><br />
<label for="contenu">Texte de l'annonce *</label><br />
			<textarea name="contenu" placeholder="Votre annonce" id="contenu" rows="10" cols="100"  ><?php if(isset($annonce['contenu'])){echo $annonce['contenu'];} ?></textarea><br />

<label for="photo">Photo(s)</label>
            <input type="file" name="photo" id="photo" /><br /><br />
    		<img src="require_structure/annonces/photos/photo_default.png" width = 100 /> 
</fieldset>
</div>
<fieldset>
	<div id="formulaire2" align="center">
	<legend>Localisation</legend>

	<label for="region">Region *</label>
			<select name="region" id="region">
<?php	
while($region = $selectRegion->fetch())
{
?>
<option value="<?php echo $region['value']; ?>"
			<?php 
			//echo $category['value'];
			if(isset($annonce) && $region['value'] == $annonce['region']){
			echo "selected";} ?> >
	<?php echo $region['value']; ?></option>
		
<?php
}
?>
			</select><br />
	<label for="ville">Ville *</label><br />
					<input class="input is-success" type="text" name="ville" placeholder="Votre ville" id="ville" value="<?php if(isset($annonce['ville'])){echo $annonce['ville'];} ?>"/><br />
					<input type="submit" name="envoi_annonce" value="Envoyer" />
					

		</form>
		
</fieldset>
</div>
<p>Les champs avec une * sont obligatoires .</p>
 <?php if(isset($_SESSION['erreur']))
 { echo $_SESSION['erreur'];} 
//}

 ?>





