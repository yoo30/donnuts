<?php 
require '../bootstrap.php';

if(isset($_POST['pageInscription'])){
            //protection des données reçues via htmlspecialchars
            $user_name = htmlspecialchars($_POST['user_name']);       
            $email = htmlspecialchars($_POST['email']);
            $pass = password_hash($_POST['pass'],PASSWORD_DEFAULT);
            $re_pass = htmlspecialchars($_POST['re_pass']);
            
    if(!empty($_POST['user_name']) AND !empty($_POST['pass']) AND !empty($_POST['re_pass']) AND !empty($_POST['email'])){    // si les données existe alors ....

            $requser_name = $bdd->prepare('SELECT * FROM membres WHERE user_name = ?');
            $requser_name->execute(array($user_name));
            $user_nameExist = $requser_name->rowCount();
            
            $reqEmail = $bdd->prepare('SELECT * FROM membres WHERE email = ?');
            $reqEmail->execute(array($email));
            $emailExist = $reqEmail->rowCount();
                if($emailExist == 0)            // si email n'est pas deja present alors....
                {

                        if($user_namelength <= 255)   //si le nom ne dépasse pas 255 caractéres alors...
                        {
                            
                               if(password_verify($_POST['re_pass'], $pass))  // si les 2 mots de passe correspondent alors ....
                               {
                                    $insertmbr = $bdd->prepare('INSERT INTO membres(user_name, pass, email, avatar) VALUES(?, ?, ?, ?)');
                                    $insertmbr->execute(array($user_name, $pass, $email, "default.png"));
                                    $_SESSION['erreur'] = 'ok' ;
                                      if($_SESSION['erreur'] === 'ok')
                                      {
                                            $reqUser = $bdd->prepare('SELECT * FROM membres WHERE user_name = ?');
                                            $reqUser->execute(array($user_name));
                                            $userInfo = $reqUser->fetch();
                                            
                                            $_SESSION['membre_id'] = $userInfo['id'];
                                            $_SESSION['user_name'] = $userInfo['user_name'];
                                            $_SESSION['email'] = $userInfo['email'];
                                            $_SESSION['role'] = $userInfo['role'];
                                            $_SESSION['erreur'] = "";
                                            header('Location: ../index.php?page=accueil');
                                       }     
                               }else{
                                       $_SESSION['erreur'] = 'Les mots de passe doivent être identiques .';
                                       header('Location: ../index.php?page=inscription');
                                    }
                        }else{
                                $_SESSION['erreur'] = 'Votre nom ne doit pas dépasser 255 caractéres .';
                                header('Location: ../index.php?page=inscription');
                             }

            }else{
                    $_SESSION['erreur'] = 'Email déjà existant !';
                    header('Location: ../index.php?page=inscription');
                 }    
        
    }else{
            $_SESSION['erreur'] ='Tous les champs doivent être complétés !';
            header('Location: ../index.php?page=inscription');
         }
   
}