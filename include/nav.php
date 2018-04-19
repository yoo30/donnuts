<ul><?php if(isset($_GET['page']))
{?>
  <li class="<?php echo ($_GET['page'] == "annonces/miniatures" ? 'is-active' : '')  ?>">
<?php }else{?>
  <li>
<?php } ?>
    <a href="index.php?page=annonces/miniatures" class="button is-link is-rounded"><span class="icon is-small"><i class="fa fa-home"></i></span><span>Accueil</span></a>
  </li>
<?php if(isset($_GET['page']))
{?>
  
  <li class="<?php echo ($_GET['page'] == "CGU" ? 'is-active' : '') ?>">
<?php }else{?>
  <li>
<?php } ?>
    <a href="index.php?page=CGU" class="button is-link is-rounded"><span class="icon is-small"><i class="fa fa-info"></i></span><span>Documentation</span></a>
  </li>
<?php if(isset($_GET['page']))
{?>
  
  <li class="<?php echo ($_GET['page'] == "new_search" ? 'is-active' : '') ?>">
<?php }else{?>
  <li>
<?php } ?>
    <a href="index.php?page=new_search" class="button is-link is-rounded"><span class="icon is-small"><i class="fa fa-book"></i></span><span>Rechercher une annonce</span></a>
  </li>
      
      
  <?php if(isset($_SESSION['membre_id'])){ 
            if(isset($_GET['page']))
          {?>
            
            <li class="<?php echo ($_GET['page'] == "annonces/formulaire_annonces" ? 'is-active' : '') ?>">
          <?php }else{?>
            <li>
          <?php } ?>
              <a href="index.php?page=annonces/formulaire_annonces" class="button is-link is-rounded"><span class="icon is-small"><i class="fas fa-edit"></i></span><span>Déposer une annonce</span></a>
            </li>
          <?php if(isset($_GET['page']))
          {?>
            
            <li class="<?php echo ($_GET['page'] == "profil" ? 'is-active' : '') ?>">
          <?php }else{?>
            <li>
          <?php } ?>
              <a href="index.php?page=profil" class="button is-link is-rounded"><span class="icon is-small"><i class="fas fa-id-badge"></i></span><span>Profil</span></a>
            </li>
            <li>
              <a class="button is-link is-rounded" href="deconnexion.php">Se deconnecter</a>
            </li>

  <?php } else { 
                   if(isset($_GET['page'])){?>

          <li class="<?php echo ($_GET['page'] == "inscription" ? 'is-active' : '') ?>">
        <?php }else{?>
          <li>
        <?php } ?>
            <a href="index.php?page=inscription" class="button is-link is-rounded"><span class="icon is-small"><i class="fas fa-user"></i></span><span>Inscription</span></a>
          </li>
        <?php if(isset($_GET['page']))
        {?>
          <li class="<?php echo ($_GET['page'] == "annonces/formulaire_annonces" ? 'is-active' : '') ?>">
        <?php }else{?>
          <li>
        <?php } ?>
            <a href="index.php?page=annonces/formulaire_annonces" class="button is-link is-rounded"><span class="icon is-small"><i class="fas fa-edit"></i></span><span>Déposer une annonce</span></a>
          </li>
         <?php if(isset($_GET['page']))
        {?>
          <li class="<?php echo ($_GET['page'] == "page_connection" ? 'is-active' : '') ?>">
        <?php }else{?>
          <li>
        <?php } ?>
            <a href="index.php?page=page_connection" class="button is-link is-rounded"><span class="icon is-small"><i class="fas fa-check-circle"></i></span><span>Se connecter</span></a>
          </li>
  <?php } ?>
      
</ul>