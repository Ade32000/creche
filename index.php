<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Gestion crèche</title>
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
	<script type="text/javascript" src="app.js"></script>

</head>
<body>

	<form method="GET" action="index.php">
 		<nav class="nav nav-pills nav-fill">
		  <input type="submit" name="home" class="nav-item nav-link active" value="Accueil">
		  <input type="hidden" name="children" class="nav-item nav-link disabled" value="Enfants">
		  <input type="submit" name="activities" class="nav-item nav-link" value="Activités">
		  <input type="submit" name="admin" lass="nav-item nav-link" value="Espace Admin">
		</nav>
	</form>

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


		$DBase = new ConnectDB('localhost','newcreche','annie','12345678');
		$db = $DBase->connexion();


		/*
		 Affichage du formulaire ajout enfant au clic du bouton ajouter 
		 */
		
		if(isset($_GET['add']))
		{

			displayAddFormChild();

		}

		/*
		 Affichage du formulaire ajout activité au clic du bouton ajouter 
		 */
		
		if(isset($_GET['addAct']))
		{

			displayAddFormActivity();
			
		}


		/* 
		Création objet enfant puis envoi dans la bdd
		*/

		if(isset($_POST['envoyer']))
		{
			
			$firstname = $_POST['form_firstname'];
			$lastname = $_POST['form_lastname'];
			$birthday = $_POST['form_birthday'];
			$address = $_POST['form_address'];
			$parents_contact = $_POST['form_parents'];
			$remarks = $_POST['form_remarks'];

			$new = new Children ($firstname, $lastname, $birthday, $address, $parents_contact, $remarks);
			$new->addChild($new, $db);
			

		}

		/* 
		Création objet activité puis envoi dans la bdd
		*/

		if(isset($_POST['send']))
		{
			
			$name = $_POST['form_name'];
			$type = $_POST['form_type'];
			$max = $_POST['form_max'];

			$newAct = new Activities ($name, $type, $max);
			$newAct->addActivity($newAct, $db);
			

		}
		/* 
		Retour page admin
		*/

		elseif (isset($_POST['annuler'])) 
		{

			displayAdmin($db);	

		}
		
		/*
		Affichage fiche enfant au clic boutons
		*/

		if(isset($_POST['infosChild']))
		{
			//var_dump($_POST['infosChild']);
			$id = intval($_POST['infosChild']);

			displayChildForm($id, $db);
		}

		//$Helder->cancelChild(11,$db);
		
	
		/*
		Affichages spécifiques selon boutons cliqués dans navbar
		*/

		if(isset($_GET['home']))
		{	
		 	displayChildren($db); 
		}

		if(isset($_GET['activities']))
		{
			displayActivities($db); 
		}

		if(isset($_GET['admin']))
		{	
			displayAdmin($db); 
		}

	 ?>

 	<script src="node_modules/jquery/dist/jquery.min.js"></script>
</body>
</html>


