<?php 


/**
 * 
 */
class Activities 
{

	public $activity_name;
	public $activity_type;
	public $activity_number_max_child;
	
	function __construct($activity_name, $activity_type, $activity_number_max_child)
	{
		$this->activity_name = $activity_name;
		$this->activity_type = $activity_type;
		$this->activity_number_max_child = $activity_number_max_child;
	}


	public function addActivity($activity, $db)
	{
		$newActivity = $db->prepare('INSERT INTO activity(activity_name,activity_type,activity_number_max_child)

        VALUES (:activity_name,:activity_type,:activity_number_max_child)');


        $newActivity->execute(array(

        ':activity_name' => $activity->activity_name,

        ':activity_type' => $activity->activity_type,

        ':activity_number_max_child' => $activity->activity_number_max_child

        ));

        return $newActivity;

	}
}
 ?>