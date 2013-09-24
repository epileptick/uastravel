<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow_widget extends MY_Widget {
	function __construct(){
		parent::__construct();
	}

	function run(){
		$this->_assign("slideshow",Menu::main_menu());
		return $this->_fetch("slideshow");
	}
}