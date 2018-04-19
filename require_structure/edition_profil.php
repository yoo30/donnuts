<?php

if (isset($_SESSION['membre_id']))
{
    $reqUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $reqUser->execute(array($_SESSION['membre_id']));
    $user = $reqUser->fetch();
?>
<div class="profil_container">
    <div align="center" class="tile is-vertical is-8">
        <div class="tile">
            <div class="tile is-parent is-vertical">
                 <article class="tile is-child notification is-primary">

                <p class="title">Edition de mon profil</p>

            <form method="post" action="require_structure/traitement_edition_profil.php" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" pour upload image avatar -->
              <p class="subtitle">
                <table>
                    <tr>
                        <td><label for="newUserName">Votre nom :</label></td>
                        <td><input type="text" name="newUserName" placeholder="votre nom" value="<?php echo $user['user_name']; ?>" id="newUserName" /></td>
                    </tr>
                    <tr>
                        <td><label for="email">Votre Email :</label></td>
                        <td><input type="text" name="newEmail" placeholder="Email" value="<?php echo $user['email']; ?>" id="email" /></td>
                    </tr>
                    <tr>
                        <td><label for="newPass">Votre nouveau mot de passe :</label></td>
                        <td><input type="password" name="newPass" placeholder="Mot de passe" id="newPass" /></td>
                    </tr>
                    <tr>
                        <td><label for="newRePass">Confirmer le mot de passe :</label></td>
                        <td><input type="password" name="newRePass" id="newRePass" /></td>
                    </tr>
                    <tr>
                        <td><label for="avatar">Avatar :</label></td>
                        <td><input type="file"  name="avatar" id="avatar" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input name="edition_profil" type="submit" type="button" class="button is-link is-rounded" value="Mettre à jour mon profil" /></td>
                    </tr>
                    
                      <tr>  
                    <td></td><td><a class="button is-link is-rounded" href="index.php?page=profil">Retour à mon profil </a></td>
                    </tr>
                </table>
              </p>
            </form>
            <?php if(isset($message)) {echo $message;} ?>
              </article>
            </div>
        </div>
    </div>
</div>
<?php
      }else{
    header('Location: require_structure/page_connection.php');
    }

?>