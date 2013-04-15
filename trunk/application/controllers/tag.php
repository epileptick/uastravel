<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller {
  function __construct(){
    parent::__construct();
  }


  function _index($where=""){

    $tagData = $this->tagModel->get();
    foreach ($tagData as $tagKey => $tagValue) {
      $getTagWhere["where"]["tag_id"] = $tagValue["tag_id"];
      $getTagData = $this->tagModel->get($getTagWhere);
      foreach ($getTagData as $getTagDataKey => $getTagDataValue) {
        $result["tag"][$getTagDataValue["tag_id"]] = $getTagDataValue;
        unset($result["tag"][$getTagDataValue["tag_id"]]["url"]);
        unset($result["tag"][$getTagDataValue["tag_id"]]["name"]);
        unset($result["tag"][$getTagDataValue["tag_id"]]["lang"]);

        foreach ($this->config->item("language_list") as $langKey => $langValue) {
          $result["tag"][$getTagDataValue["tag_id"]][$langKey] = $this->_searchTagInArray($getTagDataValue["tag_id"],$langKey,$getTagData);
        }
      }

    }

    return $result;
  }




  function admin_index(){

    $this->load->model("type_model", "typeModel");
    $this->load->model("tagtype_model", "tagTypeModel");
    $result["typeData"] = array_reverse($this->typeModel->get());

    $result["tagTypeData"] = $this->tagTypeModel->get();
    $result['tagData'] = $this->_index();
    $this->_fetch("admin_index",$result);
  }

  function admin_list(){
    $result = array();

    $config['per_page'] = 50;

    $config['prev_link'] = '<img class="blogg-button-image" alt="โพสต์ใหม่" src="/themes/Travel/images/left_arrow.png">';
    $config['prev_tag_open'] = '<button class="blogg-button blogg-collapse-right" title="โพสต์ใหม่" disabled="" tabindex="0">';
    $config['prev_tag_close'] = '</button>';

    $config['next_link'] = '<img class="blogg-button-image" alt="โพสต์เก่า" src="/themes/Travel/images/right_arrow.png">';
    $config['next_tag_open'] = '<button class="blogg-button blogg-button-page blogg-collapse-left" title="โพสต์เก่า"  tabindex="0">';
    $config['next_tag_close'] = '</button>';

    $config['num_tag_open'] = '<button class="blogg-button blogg-button-page blogg-collapse-right blogg-collapse-left" title="โพสต์เก่า"  tabindex="0">';
    $config['num_tag_close'] = '</button>';

    $config['cur_tag_open'] = '<button class="blogg-button blogg-collapse-right blogg-collapse-left" title="โพสต์เก่า" disabled="true" tabindex="0">';
    $config['cur_tag_close'] = '</button>';

    //get all the URI segments for pagination and sorting
    $segment_array=$this->uri->segment_array();
    $segment_count=$this->uri->total_segments();

    $keyword = $this->input->post();

    if($keyword){
      $where = array(
                      'limit'=>'',
                      'returnObj'=>'',
                      'order'=>'CONVERT( tagt_name USING tis620 ) ASC',
                      'where'=>array('tag_name LIKE'=>'%'.$keyword["search"].'%')
                    );
    }else{
      $tag = $this->uri->segment(2);
      $where = array(
                    'limit'=>'',
                    'returnObj'=>'',
                    'order'=>'CONVERT( tagt_name USING tis620 ) ASC',
                    'where'=>''
                  );
    }

    $this->load->library('pagination');
    $config['base_url'] = site_url(join("/",$segment_array));
    $config['total_rows'] = $this->tagModel->count_rows($where);

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
      $result['end_offset'] = $config['per_page'];
    }

    $config['base_url'] = site_url(join("/",$segment_array));
    $config['uri_segment'] = count($segment_array)+1;

    $result = array_merge($result,$this->_index($where));



    //initialize pagination
    $this->pagination->initialize($config);

    $this->_fetch("admin_list",$result);
  }


  function admin_create($id=false){
    //implement code here
    $args = $this->input->post();
    $validate = $this->validate($args);

    if($id){
      $args["id"] = $id;
      $data["tag"] = $this->tagModel->getRecord($args);

      //print_r($data); exit;
      if($data["tag"]>0){
        $this->_fetch('admin_update', $data);
      }else{
        $this->_fetch('admin_create');
      }

    }else{
      if($validate == FALSE){
        $this->_fetch('admin_create');
      }else{
        $this->tagModel->add($args);
        //$data["tag"] = $this->tagModel->getRecord();
        //$data["message"] = "Create successful !!!";
        //Redirect
        redirect(base_url("admin/tag/list"));
      }
    }
  }


  function admin_ajaxcreate($id=false){
    //implement code here

    $args = $this->input->post();
    $validate = $this->validate($args);

    if($id){
      $args["id"] = $id;
      $data["tag"] = $this->tagModel->getRecord($args);

      //print_r($data); exit;
      if($data["tag"]>0){
        $this->_fetch('admin_update', $data);
      }else{
        $this->_fetch('admin_create');
      }
    }
  }

  function admin_update(){

    $args = $this->input->post();

    $validate = $this->validate($args);

    //print_r($args); exit;

    if($args["id"]) {
        $this->tagModel->updateRecord($args);

        $data["tag"] = $this->tagModel->getRecord();
        $data["message"] = "Update successful !!!";
        //Redirect
        redirect(base_url("admin/tag"));
    } else {
        $this->tagModel->addRecord($args);
        //Redirect
        redirect(base_url("admin/tag"));
    }
  }

  function admin_delete($id=false){
    //implement code here
    if($id) {
        $args["id"] = $id;
        $this->tagModel->deleteRecord($args);

        $data["tag"] = $this->tagModel->getRecord();
        $data["message"] = "Delete successful !!!";
        //Redirect
        redirect(base_url("admin/tag"));
    }
  }

  function admin_updatelang(){
    $post = $this->input->post();
    foreach ($post["tagData"] as $tagKey => $tagValue) {
      foreach ($this->config->item("language_list") as $langListKey => $langListValue) {
        $input["where"]["tag_id"] = $tagKey;
        $input["where"]["lang"] = $langListKey;
        $input["set"]["name"] = $tagValue[$langListKey];
        if(!empty($input["set"]["name"])){
          if(!$result = $this->tagModel->updateLang($input)){
            show_error('Error: '.$input["set"]["name"]);
          }
        }
      }
    }
    redirect($_SERVER["HTTP_REFERER"]);
  }


  function admin_child($type_id = NULL, $tag_id = NULL){
    $post = $this->input->post();
    //load model
    $this->load->model("tagtype_model", "tagTypeModel");
    $this->load->model("type_model", "typeModel");
    if(empty($post)){

      //$result["selfData"] = $this->tagModel->get($tag_id);
      $whereTagType["where"]["type_id"] = $type_id;
      $whereTagType["where"]["tag_id"] = $tag_id;
      $whereTagType["group"] = "tag_id";
      $result["selfData"] = $this->tagTypeModel->getTagTypeList($whereTagType);
      unset($whereTagType);

      $result["selfTypeData"] = $this->typeModel->get($type_id);
      $whereTagType["where"]["type_id"] = $type_id;
      $whereTagType["where"]["parent_id"] = $tag_id;
      $whereTagType["group"] = "tag_id";
      $whereTagType["order"] = "index ASC";
      $result["tagTypeData"] = $this->tagTypeModel->getTagTypeList($whereTagType);

      foreach ($result["tagTypeData"] as $key => $value) {
        $arrayIndex[$key] = $value["index"];
        $arrayToSort[$key] = $value;
      }
      unset($result["tagTypeData"]);
      asort($arrayIndex);
      foreach ($arrayIndex as $key => $value) {
        $result["tagTypeData"][$key] = $arrayToSort[$key];
        $result["tagTypeData"][$key]["index"] = $value;
      }

      $result["type_id"] = $type_id;
      $result["tag_id"] = $tag_id;

      $result["tagData"] = $this->tagModel->getTagList();
      if($result["selfData"][0]["parent_id"] == 0){
        $result["backLink"] = base_url("/admin/type/create/".$result["selfData"][0]["type_id"]);
      }else{
        $result["backLink"] = base_url("/admin/tag/child/".$result["selfData"][0]["type_id"]."/".$result["selfData"][0]["parent_id"]);
      }


      $this->_fetch("admin_child",$result);
    }else{
      //var_dump($post);exit;
      if(!empty($post["tag"]["id"])){
        $whereTagType["where"]["type_id"] = $type_id;
        $whereTagType["where"]["parent_id"] = $tag_id;
        $whereTagType["group"] = "tag_id";
        $tagTypeData = $this->tagTypeModel->get($whereTagType);

        foreach($tagTypeData AS $tagTypeDataKey=>$tagTypeDataValue){
          if(($resultSearch = array_search($tagTypeDataValue["tag_id"],$post["tag"]["id"])) === FALSE){
            $deleteTagType[] = $tagTypeDataValue["id"];
            $this->tagTypeModel->delete($tagTypeDataValue["id"]);
            if(isset($post["order"][$tagTypeDataValue["tag_id"]])){
              unset($post["order"][$tagTypeDataValue["tag_id"]]);
            }
          }else{
            unset($post["tag"]["id"][$resultSearch]);
          }
        }

        foreach($post["tag"]["id"] AS $addTagKey => $addTagValue){
          $tagToAdd["tag_id"] = $addTagValue;
          $tagToAdd["type_id"] = $type_id;
          $tagToAdd["parent_id"] = $tag_id;
          $this->tagTypeModel->add($tagToAdd);
        }
        foreach ($post["order"] as $orderKey => $orderValue) {
          $tagToAdd["where"]["tag_id"] = $orderKey;
          $tagToAdd["where"]["type_id"] = $type_id;
          $tagToAdd["where"]["parent_id"] = $tag_id;
          $tagToAdd["set"]["index"] = $orderValue;
          $this->tagTypeModel->add($tagToAdd);
        }
        unset($post["tag"]);
      }else if(!empty($type_id) AND !empty($tag_id)){
        $whereTagType["where"]["type_id"] = $type_id;
        $whereTagType["where"]["parent_id"] = $tag_id;
        $this->tagTypeModel->delete($whereTagType);
      }
      redirect(base_url("/admin/tag/child/".$type_id."/".$tag_id));
    }

  }

  function _search($render = "user_list"){
    //Get argument from post page
    $keyword = $this->input->post();

    if($keyword){
      $args["tag_name"] = $keyword["search"];
      $data["tag"] = $this->tagModel->searchRecord($args);
      $this->_fetch($render, $data);
    }else{
      return;
    }
  }


  function search($keyword=false){
    //implement code here

    $args["tag_name"] = $keyword;

    if($keyword){
      $data["tag"] = $this->tagModel->searchRecord($args);
      $this->_fetch('user_list', $data);
    }else{
      return;
    }
  }


  function jsonsearch($keyword=false){
    //implement code here

    $args["tag_name"] = $keyword;
    # JSON-encode the response
    $data["tag"] = json_encode($this->tagModel->searchRecord($args));
    $this->_fetch('user_json', $data, false, true);
  }


  function jssearch($keyword=false){

    //print_r($keyword);
    $tag["tag_name"] = $keyword;
    $data["tag"] = $this->tagModel->searchRecord($tag);
    $this->_fetch('user_jsarray', $data, false, true);
  }

  function validate(){

    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');

    //Validate information
    $this->form_validation->set_rules('name', 'tag name', 'required');

    return $this->form_validation->run();

  }

  function _searchTagInArray($tagId = NULL,$lang = NULL,$tagArray = NULL){
    foreach ($tagArray as $key => $value) {
      if($value["tag_id"] == $tagId AND $value["lang"] == $lang){
        return $tagArray[$key];
      }
    }
    return NULL;
  }

}

?>