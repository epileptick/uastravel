<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_widget extends MY_Widget {
	function __construct(){
		parent::__construct();
	}

	function run(){
		$this->_assign("main_menu",Menu::main_menu());
		return $this->_fetch("menu");
	}
}