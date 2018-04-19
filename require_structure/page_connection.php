<div align="center">
	<h2>Connexion</h2>
	<form method="post" action="require_structure/traitement_connection.php">
		<table>
			<tr>
				<td><label for="mail">Votre adresse mail :</label></td>
				<td><input type="text" name="mailConnect" id="mail" placeholder="Votre mail :" /></td>
			</tr>
			<tr>
				<td><label for="pass">Votre mot de passe :</label></td>
				<td><input type="password" name="passConnect" id="pass" placeholder="Votre mot de passe" /></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Se connecter" name="pageConnection" /></td>
			</tr>
		</table>
	</form>
	<?php 
	if(isset($_SESSION['erreur'])){ echo $_SESSION['erreur'];} 
	?>
</div>