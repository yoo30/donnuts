<?php 
session_start();
$_SESSION = array();   //vide tous les champs session
session_destroy();
header('Location:index.php?page=annonces/miniatures');
