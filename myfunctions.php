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

	echo 

	"<table>
		<thead>
			<tr>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Infos</th>
			</tr>
		</thead>
		<tbody>";


   	$responses = $db->query('SELECT `children_firstname`, `children_lastname` FROM children ORDER BY `children_firstname` ASC');

   	while($datas=$responses->fetch())
	{

		echo 

		"<tr>
			<td>" . $datas['children_firstname'] . "</td>
			<td>" . $datas['children_lastname'] . "</td>
			<td> Infos ></td>
		</tr>";

	}

	echo 

		"</tbody>
	</table>";

}
 

?>