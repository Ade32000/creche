<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Gestion crèche</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>


	<?php 

		ini_set('display_errors', 1);

		/* 

			loading classes and functions ! 

		*/

		require_once "Class/Children.class.php";
		require_once "Class/Activities.class.php";
		require_once "Class/History.class.php";
		require_once "Class/ConnectDB.class.php";
		require_once "myfunctions.php";


		/*

			Instantiations...

		*/

		$DBase = new ConnectDB('localhost','newcreche','xxx','xxx');
		$db = $DBase->connexion();
		
		$Helder = new Children ("Helder", "Morais", "1973-04-27", "Rue du paradis 32000 Auch", "Mme Morais 0612345678", "RAS");


		$Helder->addChild($Helder, $db);
		//$Helder->cancelChild(1);

		displayChildren($db);


 ?>


 	<script src="node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>
