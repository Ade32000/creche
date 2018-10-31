<?php 

/**
 * 
 */
class History
{
	public $ch_start_date;
	public $ch_end_date;
	public $ch_room;
	public $ch_bed;

	function __construct($ch_start_date, $ch_end_date, $ch_room, $ch_bed)
	{
		$this->ch_start_date = $ch_start_date;
		$this->ch_end_date = $ch_end_date;
		$this->ch_room = $ch_room;
		$this->ch_bed = $ch_bed;
	}
}


 ?>