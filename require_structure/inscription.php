<div align="center">
        <form method="post" action="require_structure/traitement_inscription.php">
                <table>
                    <tr>
                        <td><label for="user_name">Votre nom :</label></td>
                        <td><input type="text" name="user_name" id="user_name" placeholder="Votre nom" value="<?php if(isset($user_name)){echo $user_name; } ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="pass">Mot de passe :</label></td>
                        <td><input type="password" name="pass" id="pass" /></td>
                    </tr>
                    <tr>
                        <td><label for="re_pass">Retaper votre mot de passe :</label></td>
                        <td><input type="password" name="re_pass" id="re_pass" /></td>
                    </tr>
                    <tr>
                        <td><label for="email">Adresse email :</label></td>
                        <td><input type="email" name="email" id="email" placeholder="Votre mail" value="<?php if(isset($email)){echo $email; } ?>" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center"><input type="submit" value="Inscription" name="pageInscription" /></td>
                    </tr>
                </table>
        </form>
    <?php 
    if(isset($_SESSION['erreur'])){ echo $_SESSION['erreur'];}  // si erreur => affichage de l'erreur via SESSION
    ?>
</div>