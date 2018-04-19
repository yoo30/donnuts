<?php
$getId = $_GET['annonce_id']; 	// id de l'annonce passée en GET 
	if(!empty($getId)){
	
    $annonce = $Annonce->viewAnnonce($getId);

    if ($annonce){?>

    <div class="box">
        <article class="media">
                  <div class="media-left">
                      <figure class="image is-64x64">
                        <img src="require_structure/annonces/photos/<?php echo $annonce['photo']; ?>" width="100" class="photo">
                      </figure>
                  </div>
                  <div class="media-content">
                        <div class="content">
                              <p>
                                  <strong><?php echo $annonce['titre']; ?></strong> <small>Postée le : <?php echo $annonce['date_post_message']; ?></small>
                                  <br>
                                  <?php echo $annonce['contenu']; ?>
                              </p>
                              <p class="title">Vos messages lié à l'annonce :</p>
                              <?php 
                              $reponses = $Annonce->listeReponses($annonce['annonce_id']);
                              //echo $Annonce->totalReponse($annonce['annonce_id']);
                              foreach ($reponses as $reponse) {
                              	?>
                              	<div id="reponses_annonces">
    	                                 
    	                                  <strong>Message :</strong>
    	                                  
    	                                  				<?php echo $reponse['reponse'];?>

    	                                  <strong>Message posté par : </strong><?php echo $reponse['user_name'];?> <br/>
    	                                   <strong>Son Email : </strong><?php  echo $reponse['email'];?><br/>
    	                                  				
                            	 </div>
                            	<?php
                              	}?>
                        </div>

                  </div>
        </article>
    </div>

    <?php 
    }
}
?>