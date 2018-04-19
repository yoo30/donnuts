<?php 
session_start();

if(!empty($_SESSION['role']) AND $_SESSION['role'] == 1)
{
		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
			  	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);					// affichage erreur PDO
			}
			catch (Exception $e)
			{
				die('Erreur :' . $e->getMessage());
			}

				if(isset($_GET['confirme']) && !empty($_GET['confirme']))
					{
						$confirme = (int) $_GET['confirme'];

						$req = $bdd->prepare('UPDATE membres SET confirme = 1 WHERE id = ?');
						$req->execute(array($confirme));
					}

						if(isset($_GET['supprime']) && !empty($_GET['supprime']))
						{
							$supprime = (int) $_GET['supprime'];

							$req = $bdd->prepare('DELETE FROM membres  WHERE id = ?');
							$req->execute(array($supprime));
						}
			
				$reqUser = $bdd->query('SELECT * FROM membres ORDER BY id DESC LIMIT 0,10 ');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Administration</title>
</head>
<body>
		<ul>
			<?php  while($membres = $reqUser->fetch()) { ?>

				<li><?php echo $membres['id']; ?> : <?php echo $membres['user_name']; ?> : Email : <?php echo $membres['email']; ?><?php if($membres['confirme'] == 0) { ?> <a href="administration.php?confirme=<?php echo $membres['id'] ?>">Valider </a><?php }?> - <a href="administration.php?supprime=<?php echo $membres['id'] ?>">Supprimer</a></li>

		<?php	} ?>

				<li><a href="../index.php?page=profil">Retour à mon profil </a></li>
		</ul>



</body>
</html>

<?php 
}else
{
	exit();
}

?>


 