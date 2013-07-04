<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Translate extends MY_Controller {
  function __construct(){
    parent::__construct();
  }

  function index(){
  	$this->load->model("location_model","locationModel");
  	error_reporting(0);
  	$result = $this->locationModel->get();
  	echo "<style>p {
  		margin-top:5px;
  		margin-bottom:5px;
  	}</style>";

  	foreach ($result as $key => $value) {
  		if(empty($value['body'])){
  			continue;
  		}

  		if(preg_match("#<blockquote>(.*)</blockquote>#smiU", $value['body'],$matches)){
        $value['body'] = str_replace($matches[0], '', $value['body']);
        $value['subtitle'] = strip_tags($matches[1]);
      }
      if(preg_match_all("#style=\"(.*);\"#smiU", $value['body'],$matchesStyle)){

      	foreach ($matchesStyle[0] as $valueStyle) {
      		$value['body'] = str_replace($valueStyle, '', $value['body']);
	      }
	    }
  		$value['subtitle'] = strip_tags($value['subtitle']);
  		$value["body"] = str_replace("<p>&nbsp;</p>", "", strip_tags($value["body"],"<p><strong>"));
  		$value["body"] = str_replace("<p></p>", "", $value["body"]);

  		echo "Title: ".$value["title"]."   (Keyword: &nbsp;)<BR />";
  		echo "Leadin: ".$value['subtitle']."<BR />";
  		echo "Body: ".trim($value["body"])."<BR />";
  		echo "<p>=================================================================</p>";
  	}

  }

  function tag(){
    $this->load->model("tag_translate_model","tagTranslateModel");
    error_reporting(0);
    $where["order"] = "CONVERT( tagt_name USING tis620 ) ASC";
    $where["group"] = "tag_id";
    $result = $this->tagTranslateModel->get($where);
    echo "<meta charset=\"utf-8\"";
    foreach ($result as $key => $value) {
      echo $value["tag_id"].": ".$value["name"]."<BR />";
    }

  }
}