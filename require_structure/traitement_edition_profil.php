<?php 
require '../bootstrap.php';

if (isset($_SESSION['membre_id']) && isset($_POST['edition_profil']))
{
    $reqUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $reqUser->execute(array($_SESSION['id']));
    $user = $reqUser->fetch();

//----------------edition nouveau pseudo--------------------------------------------//
if(isset($_POST['newUserName']) AND !empty($_POST['newUserName']) AND $_POST['newUserName'] != $user['user_name']){
          $newUserName = htmlspecialchars($_POST['newUserName']);   
          $insertNewName = $bdd->prepare('UPDATE membres SET user_name = ? WHERE id = ?'); 
          
          $insertNewName->execute(array($newUserName, $_SESSION['id']));
          header('Location: ../index.php?page=profil'); 
        }


//--------edition nouveau Email--------------------------------------------------//
if(isset($_POST['newEmail']) AND !empty($_POST['newEmail']) AND $_POST['newEmail'] != $user['email']){
    $newEmail = htmlspecialchars($_POST['newEmail']);   
    $insertMail = $bdd->prepare('UPDATE membres SET email = ? WHERE id = ?');
    $insertMail->execute(array($newEmail, $_SESSION['id']));
    header('Location: ../index.php?page=profil'); 
}


//-----edition nouveau Mot de passe--------------------------------------------//
if(isset($_POST['newPass']) AND !empty($_POST['newPass']) AND $_POST['newPass'] != $user['pass'] AND isset($_POST['newRePass']) AND !empty($_POST['newRePass'])){
        $newPass = password_hash($_POST['newPass'], PASSWORD_DEFAULT);
        $newRePass = $_POST['newRePass'];
           if(password_verify($_POST['newRePass'], $newPass))
           {
                $insertNewPass = $bdd->prepare('UPDATE membres SET pass = ? WHERE id = ?');
                $insertNewPass->execute(array($newPass, $_SESSION['id']));
                header('Location: ../index.php?page=profil');
           }else{
               $message = 'Les mots de passe ne correspondent pas ';
           }
}
 //---edition nouvel avatar-----------------------//         
if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])){
$tailleMax = 2097152;
$extansionValides = array('jpg','jpeg', 'gif', 'png');
    if($_FILES['avatar']['size'] <= $tailleMax){
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
      if(in_array($extensionUpload, $extansionValides)){
              $chemin = "membre/avatar/" .$_SESSION['id'].'.'.$extensionUpload;
              $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'],$chemin);
              if($resultat){
                      $updateAvatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id');
                      $updateAvatar->execute(array(
                        'avatar' => $_SESSION['membre_id'].'.'.$extensionUpload,
                        'id' => $_SESSION['membre_id']
                      ));
                      header('Location: ../index.php?page=profil');
                  }else{
                        $message = 'Erreur durant l\'importation de votre avatar .';
                       }
          }else{
                $message = 'Votre image doit être de format jpg, jpeg, gif ou png';
               }
    }else{
    $message = 'Votre avatar ne doit pas dépasser 2 Mo';
    }
}

}else{
    header('Location: require_structure/page_connection.php');
    }

?>