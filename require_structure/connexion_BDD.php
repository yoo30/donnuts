<?php

try
	{
	
	if(isset($_ENV['MYSQL_HOST'])){
		$hostname = $_ENV['MYSQL_HOST'];
		$username = 'yoann';
		$password = 'password';
	}else{
		$hostname = 'localhost';
		$username = 'root';
		$password = '';
	}
		$bdd = new PDO('mysql:host='.$hostname.';dbname=projet;charset=utf8', $username, $password);
	  	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // affichage erreur PDO
	}
	catch (Exception $e)
	{
		die('Erreur :' . $e->getMessage());
	}

