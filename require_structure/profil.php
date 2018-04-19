<?php 
if (isset($_SESSION['membre_id']) AND $_SESSION['membre_id'] > 0 )
{
    $getId = $_SESSION['membre_id'];    
    $reqUser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $reqUser->execute(array($getId));
    $userInfo = $reqUser->fetch();   
?>
<div class="profil_container">
  <div align="center" class="tile is-vertical is-8">
    <div class="tile ">
      <div  class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary">

                <p class="title">Profil de <?php echo $userInfo['user_name'] ?></p>
                        <?php 
                            if(!empty($userInfo['avatar']))
                        { ?>
                                <img src="membre/avatar/<?php echo $userInfo['avatar']; ?>" width = 150>
                 <?php  } else{ ?>
                                <img src="membre/avatar/default.png" width = 150 />
                        <?php } ?>
                        <p class="subtitle">Votre nom : <?php echo $userInfo['user_name']; ?> <br /> 
                                Votre Mail : <?php echo $userInfo['email']; ?><br /></p>          
                  <?php 
                  if(isset($_SESSION['membre_id']) AND $userInfo['id'] == $_SESSION['membre_id'] AND $userInfo['role'] == 2)
                          { ?>
                                <a class="button is-link is-rounded" href="index.php?page=edition_profil">Editer mon profil</a>
                                <a class="button is-link is-rounded" href="deconnexion.php">Se deconnecter</a>

                    <?php }
                            elseif(isset($_SESSION['membre_id']) AND $userInfo['id'] == $_SESSION['membre_id'] AND $userInfo['role'] == 1)
                                        {   ?>
                                                <a class="button is-link is-rounded" href="index.php?page=edition_profil">Editer mon profil</a>
                                                <a class="button is-link is-rounded" href="deconnexion.php">Se deconnecter</a>
                                                <a class="button is-link is-rounded" href="admin/administration.php">Administration</a>


                                 <?php  } ?>
        </article>                              
      </div>
    </div>
  </div>
</div>
<?php
} ?>
   <!---traitement annonces personelles -->
<section class="hero is-link">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Vos annonces postées :
      </h1>
     
    </div>
  </div>
</section>
<?php      
$annonces = $Annonce->listeAnnonces($_SESSION['membre_id']);
?>

    
<?php
foreach ($annonces as $annonce) {

?>
<div class="conteneur_miniature">
    <a href="index?page=annonces/annonces_complete_contact&id=<?php echo $annonce['annonce_id']?>"">      
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title"><?php echo $annonce['titre']; ?></p>
          <p class="subtitle"></p>
          <figure class="image is-1by1">
            <?php if(!empty($annonce['photo'])){ ?>
            <img src="require_structure/annonces/photos/<?php echo $annonce['photo']; ?>">
          <?php }else{ ?>
            <img src="require_structure/annonces/photos/image_defaut1.svg" />
        <?php } ?>
          </figure>

          <p><small>Postée le : <?php echo $annonce['date_post_message']; ?></small></p>
          <p><?php  echo mb_strimwidth($annonce['contenu'], 0, 30, "...");?></p>
        </article>
      </div>
    </a>
<a class="button is-link is-rounded" href="index.php?page=annonces/formulaire_annonces&annonce_id=<?php  echo $annonce['annonce_id']?>" name="update" value="<?php $annonce['annonce_id'];?>">Modifier</a>
                      
<a class="button is-link is-rounded" href="require_structure/annonces/delete_posts.php?id=<?php echo $annonce['annonce_id']?>" name="delete" value="<?php $annonce['annonce_id'];?>">Supprimer</a>

<a class="button is-link is-rounded" href="index.php?page=annonces/reponse&annonce_id=<?php  echo $annonce['annonce_id']?>" name="detail" value="<?php $annonce['annonce_id'];?>">Reponse
(<?php echo $Annonce->totalReponse($annonce['annonce_id'])?>)
</a>
<?php }?>
</div>           