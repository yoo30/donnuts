<section class="hero is-dark is-success">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Les derniéres annonces postées :
      </h1>
     
    </div>
  </div>
</section>
<?php 
$afficheAnnonces = $bdd->query('SELECT annonces.photo, annonces.titre, annonces.date_post_message, annonces.contenu, membres.user_name, membres.email 
  FROM annonces
    LEFT JOIN membres ON annonces.membre_id = membres.id ORDER BY date_post_message DESC LIMIT 0, 5');
while($afAnnonces = $afficheAnnonces->fetch())
{

?>

<div class="box">
          <article class="media">
                    <div class="media-left">
                        <figure class="image is-64x64">
                          <img src="require_structure/annonces/photos/<?php echo $afAnnonces['photo']; ?>" width="100" class="photo">
                        </figure>
                    </div>
                    <div class="media-content">
                          <div class="content">
                                <p>
                                    <strong><?php echo $afAnnonces['titre']; ?></strong> <small>Postée le : <?php echo $afAnnonces['date_post_message']; ?></small>
                                    <br>
                                    <?php echo $afAnnonces['contenu']; 
                                         
                                            ?>

                                </p>
                                <p>
                                  <strong>Postée par : </strong><?php echo $afAnnonces['user_name'];?> <br/>
                                  <strong>Contacter : </strong><?php  echo $afAnnonces['email'];?>
                                </p>
                          </div>

                    </div>
          </article>
</div>

<?php }?>

