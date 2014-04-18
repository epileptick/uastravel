<?php
class CustomTour_model extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->_prefix = "cus";
    $this->_column = array(
                     'id'								=> 'cus_id',
                     'package_name'			=> 'cus_package_name',
                     'tour_id'          => 'cus_tour_id',
                     'code'					    => 'cus_code',
                     'days'							=> 'cus_days',
                     'lang'             => 'cus_lang',
                     'url'              => 'cus_url',
                     'view'             => 'cus_view',
                     'cr_date'          => 'cus_cr_date',
                   	 'cr_uid'           => 'cus_cr_uid',
                     'lu_date'          => 'cus_lu_date',
                     'lu_uid'           => 'cus_lu_uid'
    );
		$this->_join_column = array(
						         'cus_id'           => 'cusj_cus_id',
						         'day'							=> 'cusj_day',
						         'tour_id'					=> 'cusj_tour_id'
		);
	}
	/*
	function get($options = ""){
		$this->db->join("ci_customtour_list","ci_customtour_list.cusj_cus_id = ci_customtour.cus_id");
		$result = parent::get($options);

		return $result;
	}
	*/
}
?>