<?php
class CustomTour_List_model extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->_prefix = "cusj";
	    $this->_column = array(
				         'cus_id'           => 'cusj_cus_id',
				         'day'				=> 'cusj_day',
				         'tour_id'			=> 'cusj_tour_id',
	    );
	}

}
?>