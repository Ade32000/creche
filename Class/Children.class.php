<?php 


/**
 * 
 */

class Children 
{

	public $id;
	public $firstname;
	public $lastname;
	public $birthday;
	public $address;
	public $parents_contact;
	public $remarks;

	
	function __construct($firstname, $lastname, $birthday, $address, $parents_contact, $remarks)
	{

		$this->firstname = $firstname;
		$this->lastname = $lastname;
		$this->birthday = $birthday;
		$this->address = $address;
		$this->parents_contact = $parents_contact;
		$this->remarks = $remarks;

	}


	/* 

		The function addChild inserts a new child file in the database.

	*/

	public function addchild($child, $db)
	{

		
        $newChild = $db->prepare('INSERT INTO children(children_firstname,children_lastname,children_birthday,children_adress,children_parents_contact,children_remarks)

        VALUES (:children_firstname,:children_lastname,:children_birthday,:children_adress,:children_parents_contact,:children_remarks)');


        $newChild->execute(array(

        ':children_firstname' => $child->firstname,

        ':children_lastname' => $child->lastname,

        ':children_birthday' => $child->birthday,

        ':children_adress' => $child->address,

        ':children_parents_contact' => $child->parents_contact,

        ':children_remarks' => $child->remarks

        ));

        return $newChild;

	}


	/* 

		The function cancelChild deletes a child file in the database.

	*/

	public function cancelChild($childId,$db)
    {
    
        
        $delChild = $db->query('DELETE FROM children WHERE children_id='.$childId);
    	//$delChild->bindValue(':num', $_GET['numContact'], PDO::PARAM_INT);

         return $delChild;

    }


    /* 

		The function updateChild updates a child file in the database.

	*/

	public function updateChild($child,$db)
	{
		

		$upChild = $db->query("UPDATE children SET children_firstname='$child->firstname',children_lastname='$child->lastname',children_birthday,='$child->birthday',children_adress='$child->address',children_parents_contact='$child->parents_contact',children_remarks='$child->remarks'");


		return $upChild;

	}

	
	

}




 ?>