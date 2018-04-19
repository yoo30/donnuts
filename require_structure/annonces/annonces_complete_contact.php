<?php 
$getId = $_GET['id']; // id de l'annonce passée en GET 

$annonce = $Annonce->viewAnnonce($getId);

if ($annonce){ ?>

<div class="box">
  <article class="media">
      <div class="media-left">
        <figure class="image is-64x64">
          <img src="require_structure/annonces/photos/<?php echo $annonce['photo']; ?>" width="100" class="photo">
        </figure>
      </div>
<div class="media-content">
      <div class="content">
            <p><strong><?php echo $annonce['titre']; ?></strong> <small>Postée le : <?php echo $annonce['date_post_message']; ?></small>
                <?php echo $annonce['contenu']; ?>
            </p>
            <p>
              <strong>Postée par : </strong><?php echo $annonce['user_name'];?> <br/>
              <strong>Contacter : </strong><?php  echo $annonce['email'];?><br/>    
      </div>
 </div>
  </article>
</div>

<?php 
//$_SESSION['id_annonce'] = $annonce['annonce_id'];

} else {
  header('Location: index.php?page=annonces/miniatures');
}

?>
<section class="hero is-link">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Envoyer un message à <?php echo $annonce['user_name'];?> :
      </h1>
     
    </div>
  </div>
</section>

<div class="field">
<form method="post" action="require_structure/annonces/traitement_reponse_post.php">
    <label class="label">Votre nom</label>
      <div class="control has-icons-left has-icons-right">
          <input class="input is-success" type="text" placeholder="Text input" value="<?php if(isset($_SESSION['user_name'])){ echo $_SESSION['user_name']; }?>" name="user_name">
          <input type="hidden" name="id_annonces" value="<?php echo $getId ?>">
          <span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fas fa-check"></i>
          </span>
      </div>
</div>

<div class="field">
    <label class="label">Email</label>
      <div class="control has-icons-left has-icons-right">
            <input class="input is-success" type="email" placeholder="Email input" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; }?>" name="email">
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-exclamation-triangle"></i>
            </span>
      </div>
</div>
<div class="field">
  <label class="label">Message</label>
    <div class="control">
       <textarea class="textarea" placeholder="Textarea" name="message"></textarea>
    </div>
</div>
<div class="field">
  <div class="control">
     <label class="checkbox">
     <input type="checkbox" name="CGU">
     J'accepte  <a href="index.php?page=CGU">les conditions</a>
    </label>
  </div>
</div>
<div class="field is-grouped">
          <div class="control">
            <button class="button is-link" name="envoi_reponse" type="submit"><input type="submit" name="envoi_reponse" value="Envoyer"></button></input>
          </div>
</div>
</form>
