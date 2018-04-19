<form method="post" action="">
  <label>Recherche : </label><input type="search" name="search" placeholder="Votre recherche..." />
  <input type="submit" value="Valider" />
</form>                                       <!-- formulaire de recherche -->


<?php

if(isset($_POST['search']) AND !empty($_POST['search']))
{
      $search = htmlspecialchars($_POST['search']);   //protection de la donnée saisi
      require ('require_structure/connexion_BDD.php');  // connexion base de donnée

      $annonce = $bdd->query("SELECT * FROM annonces INNER JOIN membres ON annonces.membre_id = membres.id WHERE MATCH(categorie, titre, contenu,
       region, ville) AGAINST ('". $search ."')"); //  ORDER BY MATCH(categorie, titre, contenu, region, ville) AGAINST ('gateau') DESC
           // requete pour rechercher parmis la table annonces


      while($a = $annonce->fetch()){ ?>                 <!-- boucle d'affichage résultats -->

      <div class="box">
                <article class="media">
                          <div class="media-left">
                              <figure class="image is-64x64">
                                <img src="require_structure/annonces/photos/<?php echo $a['photo']; ?>" width="100" class="photo">
                              </figure>
                          </div>
                          <div class="media-content">
                                <div class="content">
                                      <p>
                                          <strong><?php echo $a['titre']; ?></strong> <small>Postée le : <?php echo $a['date_post_message']; ?></small>
                                          <br>
                                          <?php echo $a['contenu']; 
                                               
                                                  ?>

                                      </p>
                                      <p>
                                        <strong>Postée par : </strong><?php echo $a['user_name'];?> <br/>
                                        <strong>Contacter : </strong><?php  echo $a['email'];?><br/>
                                      </p>
                                </div>

                          </div>
                </article>
      </div>
      <?php
      }
}
?>

