<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Article extends MY_Controller {
  function __construct(){
    parent::__construct();
  }

  function admin_create($id = NULL){
  	$lang = $this->lang->lang();
    $_post = $this->input->post();



    $_post['body'] = preg_replace("/<p[^>]*><\\/p[^>]*>/", '', $_post['body']);

    if(!empty($_post["submit"]) OR $this->input->post("ajax")==TRUE){

      if( isset($_post["id"]) ){
        // ==================================================================
        //
        // Update on submit
        //
        // ------------------------------------------------------------------
        $postData = $this->articleModel->add($_post);
	    }else{
        // ==================================================================
        //
        // Add new record
        //
        // ------------------------------------------------------------------
        if(empty($_post["title"])){
        	$_post["title"] = "untitle";
        }
        if(!empty($_post["submit"])){
          $_post["display"] = 1;
        }
        $postData = $this->articleModel->add($_post);
	    }
			if($postData){
	      if($this->input->post("ajax")==TRUE){
	        $data['id'] = $postData;
	        $data['status'] = $this->_fetch('ajax_save_success',$data,TRUE,TRUE);
	        echo json_encode($data);
	        die;
	      }else{
	        redirect(base_url("admin/article"));
	      }
	    }else{
	      echo "submit failed";
	    }
  	}else{
  		if(!empty($id)){
        $where["where"]["id"] = $id;
        $where["where"]["lang"] = $this->lang->lang();

  			$postData = $this->articleModel->get($where);
        if(empty($postData)){
          $postData[0]["id"] = $id;
        }
        unset($where);
        $this->_assign("post", $postData);
  		}
  		$this->load->model("tagtype_model","tagTypeModel");
  		$this->load->model("type_model","typeModel");
  		$where["where_in"]["name"][] = "main_menu";
  		$type = $this->typeModel->get($where);
      $whereTagType["where_in"]["type_id"] = $type[0]["id"];
      $whereTagType["where_not_in"]["parent_id"] = 0;
      $whereTagType["group"] = "tag_id";
  		$whereTagType["order"] = "index DESC";
  		$result = $this->tagTypeModel->getTagTypeList($whereTagType);
      unset($whereTagType["where_not_in"]);
      $whereTagType["where_in"]["parent_id"] = 0;
      $resultProvince = $this->tagTypeModel->getTagTypeList($whereTagType);
      $this->_assign("tag", $result);
  		$this->_assign("tagProvince", $resultProvince);
  		$this->_fetch("admin_create");
  	}
  }

  function admin_index(){
  	$result = array();

    $config['per_page'] = 15;

    $config['prev_link'] = '<img class="blogg-button-image" alt="โพสต์ใหม่" src="/themes/'.$this->config->item("theme_name").'/images/left_arrow.png">';
    $config['prev_tag_open'] = '<button class="blogg-button blogg-collapse-right" title="โพสต์ใหม่" disabled="" tabindex="0">';
    $config['prev_tag_close'] = '</button>';

    $config['next_link'] = '<img class="blogg-button-image" alt="โพสต์เก่า" src="/themes/'.$this->config->item("theme_name").'/images/right_arrow.png">';
    $config['next_tag_open'] = '<button class="blogg-button blogg-button-page blogg-collapse-left" title="โพสต์เก่า"  tabindex="0">';
    $config['next_tag_close'] = '</button>';

    $config['num_tag_open'] = '<button class="blogg-button blogg-button-page blogg-collapse-right blogg-collapse-left" title="โพสต์เก่า"  tabindex="0">';
    $config['num_tag_close'] = '</button>';

    $config['cur_tag_open'] = '<button class="blogg-button blogg-collapse-right blogg-collapse-left" title="โพสต์เก่า" disabled="true" tabindex="0">';
    $config['cur_tag_close'] = '</button>';

    //get all the URI segments for pagination and sorting
    $segment_array = $this->uri->segment_array();
    $segment_count = $this->uri->total_segments();

    $where["where"]["lang"] = $this->lang->lang();

    $this->load->library('pagination');
    $config['base_url'] = site_url(join("/",$segment_array));
    $config['total_rows'] = $this->articleModel->count_rows($where);

    $result['total_rows'] = $config['total_rows'];

    //getting the records and limit setting
    if (ctype_digit($segment_array[$segment_count])) {
      $this->db->limit($config['per_page'],$segment_array[$segment_count]);
      $result['start_offset'] = $segment_array[$segment_count]+1;
      $result['end_offset'] = $segment_array[$segment_count]+$config['per_page'];
      if(($result['end_offset'])>$config['total_rows']){
        $result['end_offset'] = $result['total_rows'];
      }

      array_pop($segment_array);
    } else {
      $this->db->limit($config['per_page']);
      $result['start_offset'] = 1;

    }


    $config['base_url'] = site_url(join("/",$segment_array));
    $config['uri_segment'] = count($segment_array)+1;
    
    $result["article"] = $this->articleModel->get($where);

    if((count($result['article'])+1)>$result['start_offset']){
      $result['end_offset'] = count($result['article']);
    }

    //initialize pagination
    $this->pagination->initialize($config);
    //load the view



    $this->_fetch("admin_list",$result);
  }

  function admin_setdisplay(){
    //Get argument from post page
    $args = $this->input->post();
    var_dump($args);
    $this->articleModel->add($args);
    print_r($args); exit();
  }

  function admin_delete($id=NULL){
    //implement code here
    if(is_numeric($id)){
      $this->articleModel->delete($id);
      redirect(base_url("admin/article"));
    }
  }

  function ajax_delete(){
    //implement code here
    $_post = $this->input->post();
    foreach($_post AS $id=>$value){
      if(!$this->articleModel->delete($id)){
        return "FALSE";
      }
    }
    return "TRUE";
  }

}