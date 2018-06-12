<?php require 'bootstrap.php';?>
<!DOCTYPE html>
<html>

  <head>
      <title>Don nuts</title>
      <meta charset="utf-8" />
      <link rel="stylesheet" type="text/CSS" href="CSS/style_forum.css" />
      <link rel="stylesheet" type="text/CSS" href="CSS/mon_style.css" />

      <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>


  </head>
<body>
  <header>
    <?php include 'include/header.php';?>
  </header>


   <nav class="breadcrumb is-centered navbar is-primary" aria-label="breadcrumbs">
      <?php  include 'include/nav.php'; ?>   
  </nav>
  <main>
      <?php if(isset($_GET['page']))
        {
              $main = 'require_structure/' . $_GET['page'] . ".php";

        }else{
              $main = "require_structure/annonces/miniatures.php";   
              }
          include($main); ?>
  </main>


  <aside>
  </aside>

  <footer class="footer">
    <?php include 'include/footer.php';?>
  </footer>
</body>

</html>
