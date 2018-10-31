<?php 


/**
 * 
 */
class Activities 
{

	public $name;
	public $type;
	public $nbr_max_child;
	
	function __construct($name, $type, $nbr_max_child)
	{
		$this->name = $name;
		$this->type = $type;
		$this->nbr_max_child = $nbr_max_child;
	}
}
 ?>