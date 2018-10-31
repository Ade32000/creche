<?php 


/**
 * 
 */
class Children 
{

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
}




 ?>