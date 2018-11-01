<?php 

/* 

	The myfunctions file contains all functions that are not directly related to an object.

	We will find here mainly the functions of data display.

*/



/* 

	This function displays all children in alphabetical order of first names.

*/

function displayChildren($db)
{
	$cpt = 0;

	echo 

	"<table class='table table-hover'>
		<thead>
			<tr>
				<th scope='col'>#</th>
				<th scope='col'>Prénom</th>
				<th scope='col'>Nom</th>
				<th scope='col'>Fiche enfant</th>
			</tr>
		</thead>
		<tbody>";


   	$responses = $db->query('SELECT `children_firstname`, `children_lastname` FROM children ORDER BY `children_firstname` ASC');

   	while($datas=$responses->fetch())
	{

		$cpt++;

		echo 

		"<tr>
			<th scope='row'>" . $cpt . "</th>
			<td>" . $datas['children_firstname'] . "</td>
			<td>" . $datas['children_lastname'] . "</td>
			<td> <a href='index.php'>Infos ></a></td>
		</tr>";

	}

	echo 

		"</tbody>
	</table>";

}
 

?>