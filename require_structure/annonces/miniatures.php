<section class="hero is-link">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Les derniéres annonces postées :
      </h1>
     
    </div>
  </div>
</section>

<?php 
$afficheAnnonces = $bdd->query("SELECT annonces.photo, annonces.id AS annonce_id, annonces.titre, DATE_FORMAT(annonces.date_post_message,'%d/%m/%Y %Hh%imin%ss')AS date_post_message , annonces.contenu, membres.user_name, membres.email 
  FROM annonces
    LEFT JOIN membres ON annonces.membre_id = membres.id ORDER BY date_post_message DESC LIMIT 0, 10");?>

<div class="conteneur_miniature">
    
<?php
while($afAnnonces = $afficheAnnonces->fetch())
{
?>
    <a href="index?page=annonces/annonces_complete_contact&id=<?php echo $afAnnonces['annonce_id']?>"">      
      <div class="tile is-parent">
        <article class="tile is-child notification is-info">
          <p class="title"><?php echo $afAnnonces['titre']; ?></p>
          <p class="subtitle"></p>
          <figure class="image is-1by1">
            <?php if(!empty($afAnnonces['photo'])){ ?>
            <img src="require_structure/annonces/photos/<?php echo $afAnnonces['photo']; ?>">
          <?php }else{ ?>
            <img src="require_structure/annonces/photos/image_defaut1.svg" />
        <?php } ?>
          </figure>
          <p><small>Postée le : <?php echo $afAnnonces['date_post_message']; ?></small></p>
          <p><?php  echo mb_strimwidth($afAnnonces['contenu'], 0, 30, "...");?></p>
        </article>
      </div>
    </a>

<?php }?>
</div>

