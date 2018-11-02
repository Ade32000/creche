<?php 

/* 

	The myfunctions file contains all functions that are not directly related to an object.

	We will find here mainly the functions of data display.

*/



/* 

	This function displays all children in alphabetical order of first names.

*/

function displayChildren($db, $request)
{

	if($request == 'list')
	{


		echo 

		"<h3>Liste des enfants</h3>

		
		<table class='table table-hover'>
			<thead>
				<tr>
					<th scope='col'>#</th>
					<th scope='col'>Prénom</th>
					<th scope='col'>Nom</th>
					<th scope='col'>Fiche enfant</th>
				</tr>
			</thead>
			<tbody>";


	   	$responses = $db->query('SELECT `children_id`,`children_firstname`, `children_lastname` FROM children ORDER BY `children_firstname` ASC');

	   	while($datas=$responses->fetch())
		{

			echo 

			"
			<tr>
				<th scope='row'>" . $datas['children_id'] . "</th>
				<td>" . $datas['children_firstname'] . "</td>
				<td>" . $datas['children_lastname'] . "</td>
				<td><form method='POST'><input type='submit' name='infosChild' value='Infos >'></form></td>
			</tr>";
			

		}

		echo 

			"</tbody>
		</table>
		";

	}
	else
	{
		$array_resp = [];

		$responses = $db->query('SELECT `children_id`,`children_firstname`, `children_lastname` FROM children ORDER BY `children_firstname` ASC');

	   	while($datas=$responses->fetch())
		{
			var_dump('hey');
			// echo 

			// "<form method='POST' action='index.php'><input type='hidden' name='findId' value=" . $datas['children_id'] . "></form>";
			$theId = $datas['children_id'];
			array_push($array_resp, array($datas['children_firstname']=>$theId));
		}
			return $array_resp;
	}

}


function displayActivities($db)
{

	echo 

	"<h3>Liste des activités</h3>

	<table class='table table-hover'>
		<thead>
			<tr>
				<th scope='col'>#</th>
				<th scope='col'>Nom de l'activité</th>
				<th scope='col'>Type d'activité</th>
				<th scope='col'>Nombre maximum d'enfants</th>
				<th scope='col'>Fiche activité</th>
			</tr>
		</thead>
		<tbody>";


   	$responses = $db->query('SELECT `activity_id`,`activity_name`, `activity_type`, `activity_number_max_child` FROM activity ORDER BY `activity_name` ASC');

   	while($datas=$responses->fetch())
	{

		echo 

		"<tr>
			<th scope='row'>" . $datas['activity_id'] . "</th>
			<td>" . $datas['activity_name'] . "</td>
			<td>" . $datas['activity_type'] . "</td>
			<td>" . $datas['activity_number_max_child'] . "</td>
			<td><form method='GET'><input type='submit' name='infosAct' value='Infos >'>>/form></td>
		</tr>";

	}

	echo 

		"</tbody>
	</table>";

}


/* 

	CRUD

*/

function displayAdmin($db)
{

	echo 

	"<div id='adminPage'>
	<h3>Mettre à jour la  base de données</h3>
	<span><h4>Liste des enfants</h4></span><span><form method='GET'><input type='submit' name='add' value='Ajouter un enfant'></form></span>

	<table class='table table-hover'>
		<thead>
			<tr>
				<th scope='col'>#</th>
				<th scope='col'>Prénom</th>
				<th scope='col'>Nom</th>
				<th scope='col'>Fiche enfant</th>
				<th scope='col'>Modifier</th>
				<th scope='col'>Supprimer</th>
			</tr>
		</thead>
		<tbody>";


   	$responses = $db->query('SELECT `children_id`,`children_firstname`, `children_lastname` FROM children ORDER BY `children_firstname` ASC');

   	while($datas=$responses->fetch())
	{

	

		echo 

		"<tr>
			<th scope='row'>" . $datas['children_id'] . "</th>
			<td>" . $datas['children_firstname'] . "</td>
			<td>" . $datas['children_lastname'] . "</td>
			<td><input type='submit' name='read' value='Lire >'></td>
			<td><input type='submit' name='update' value='Modifier >'></td>
			<td><input type='submit' name='delete' value='Supprimer >'></td>
		</tr>";

	}

	echo 

		"</tbody>
	</table>
	</div>";
			/* <a href='supprimer.php?numContact=<?= . $datas['children_id'] . ?>'>Supprimer</a> */

}


function displayAddFormChild()
{

	echo 

	"<form method='POST' action='index.php'>
		<h5>Ajouter un nouvel enfant</h5>

		<label for='form_firstname'>Prénom : </label>
		<input type='text' name='form_firstname' placeholder='ex : John'>

		<label for='form_lastname'>Nom : </label>
		<input type='text' name='form_lastname' placeholder='ex : Doe'>

		<label for='form_birthday'>Date de naissance : </label>
		<input type='date' name='form_birthday'>

		<label for='form_address'>Adresse : </label>
		<input type='text' name='form_address' placeholder='ex : Avenue du code'>

		<label for='form_parents'>Contacts parents : </label>
		<textarea type='text' name='form_parents' placeholder='ex : Mme Doe 0612345678'></textarea>

		<label for='form_remarks'>Remarques éventuelles : </label>
		<textarea type='text' name='form_remarks' placeholder='ex : En garde alternée, asthmatique'></textarea>

		<input type='submit' name='annuler' value='Annuler'>
		<input type='submit' name='envoyer' value='Envoyer'>
	</form>";
}
 

// function displayChildForm($id, $db)
// {
// 	var_dump($id);
// 	echo 

// 	"<h3>Fiche enfant</h3>";

// 	$responses = $db->query('SELECT `children_id`,`children_firstname`,`children_lastname`,`children_birthday`,`children_adress`,`children_parents_contact`,`children_remarks` FROM `children` WHERE `children_id` = ' . $id . '');

//    	while($datas=$responses->fetch())
// 	{

// 		echo 

// 		"<input type='text' name='ref' value=" . $datas['children_id'] . ">
// 		<p>Prénom : " . $datas['children_firstname'] . "</p>
// 		<p>Nom : " . $datas['children_laststname'] . "</p>
// 		<p>Date de naissance : " . $datas['children_birthday'] . "</p>
// 		<p>Adresse : " . $datas['children_adress'] . "</p>
// 		<p>Contacts parents : " . $datas['children_parents_contact'] . "</p>
// 		<p>Remarques éventuelles : " . $datas['children_remarks'] . "</p>
// 		";

// 	}

// 	$responses = $db->prepare('DELETE FROM children WHERE children_id=:num LIMIT 1');
// }

?>