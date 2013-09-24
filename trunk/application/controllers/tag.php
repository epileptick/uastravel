<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends MY_Controller {
  function __construct(){
    parent::__construct();
  }


  function _index($where=""){
    $this->load->model("tagtour_model","tagtourModel");
    $this->load->model("taglocation_model","taglocationModel");
    $this->load->model("taghotel_model","taghotelModel");

    $tagData = $this->tagModel->get(array("order"=>'CONVERT( tagt_name USING tis620 ) ASC',"where"=>array("lang"=>"th")));
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
      $result["tag"][$getTagDataValue["tag_id"]]["tour_used_list"] = $this->tagtourModel->get(array("where"=>array("tag_id"=>$getTagDataValue["tag_id"]),"group"=>"tour_id"));
      $result["tag"][$getTagDataValue["tag_id"]]["location_used_list"] = $this->taglocationModel->get(array("where"=>array("tag_id"=>$getTagDataValue["tag_id"]),"group"=>"location_id"));
      $result["tag"][$getTagDataValue["tag_id"]]["hotel_used_list"] = $this->taghotelModel->get(array("where"=>array("tag_id"=>$getTagDataValue["tag_id"]),"group"=>"hotel_id"));
      $result["tag"][$getTagDataValue["tag_id"]]["used"] = 0;

      if(!empty($result["tag"][$getTagDataValue["tag_id"]]["tour_used_list"])){
        $result["tag"][$getTagDataValue["tag_id"]]["used"] += count($result["tag"][$getTagDataValue["tag_id"]]["tour_used_list"]);
        $result["tag"][$getTagDataValue["tag_id"]]["tour_used"] = count($result["tag"][$getTagDataValue["tag_id"]]["tour_used_list"]);
      }else{
        $result["tag"][$getTagDataValue["tag_id"]]["tour_used"] = 0;
      }
      if(!empty($result["tag"][$getTagDataValue["tag_id"]]["location_used_list"])){
        $result["tag"][$getTagDataValue["tag_id"]]["used"] += count($result["tag"][$getTagDataValue["tag_id"]]["location_used_list"]);
        $result["tag"][$getTagDataValue["tag_id"]]["location_used"] = count($result["tag"][$getTagDataValue["tag_id"]]["location_used_list"]);
      }else{
        $result["tag"][$getTagDataValue["tag_id"]]["location_used"] = 0;
      }
      if(!empty($result["tag"][$getTagDataValue["tag_id"]]["hotel_used_list"])){
        $result["tag"][$getTagDataValue["tag_id"]]["used"] += count($result["tag"][$getTagDataValue["tag_id"]]["hotel_used_list"]);
        $result["tag"][$getTagDataValue["tag_id"]]["hotel_used"] = count($result["tag"][$getTagDataValue["tag_id"]]["hotel_used_list"]);
      }else{
        $result["tag"][$getTagDataValue["tag_id"]]["hotel_used"] = 0;
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
    $result = array()
;
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
                    'where'=>array("lang"=>"th")

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

      if(!empty($result["tagTypeData"])){
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

            $deleteTagType["where"]["tag_id"] = $tagTypeDataValue["tag_id"];
            $deleteTagType["where"]["type_id"] = $tagTypeDataValue["type_id"];
            $deleteTagType["where"]["parent_id"] = $tagTypeDataValue["parent_id"];
            $this->tagTypeModel->delete($deleteTagType);

            if(isset($post["order"][$tagTypeDataValue["tag_id"]])){
              unset($post["order"][$tagTypeDataValue["tag_id"]]);
            }
          }else{
            unset($post["tag"]["id"][$resultSearch]);
          }
        }


        if(count($post["tag"]["id"]) > 0){
          foreach($post["tag"]["id"] AS $addTagKey => $addTagValue){
            $tagToAdd["tag_id"] = $addTagValue;
            $tagToAdd["type_id"] = $type_id;
            $tagToAdd["parent_id"] = $tag_id;
            $this->tagTypeModel->add($tagToAdd);
          }
        }
        foreach ($post["order"] as $orderKey => $orderValue) {
          $tagOrderToUpdate["where"]["tag_id"] = $orderKey;
          $tagOrderToUpdate["where"]["type_id"] = $type_id;
          $tagOrderToUpdate["where"]["parent_id"] = $tag_id;
          $tagOrderToUpdate["set"]["index"] = $orderValue;
          $this->tagTypeModel->add($tagOrderToUpdate);
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

    $args["tag_name"] = trim($keyword);
    # JSON-encode the response
    $data["tag"] = $this->tagModel->searchRecord($args);
    foreach ($data["tag"] as $key => $value) {
      $result["tag"][] = $value["name"];
    }
    $this->_fetch('user_json', $result, false, true);
  }


  function jssearch($keyword=false){

    //print_r($keyword);
    $tag["tag_name"] = trim($keyword);
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

  function admin_move(){
    $post = $this->input->post();

    $this->load->model("tagtour_model","tagtourModel");
    $this->load->model("taglocation_model","taglocationModel");
    $this->load->model("taghotel_model","taghotelModel");

    $tour_used_list = $this->tagtourModel->get(array("where"=>array("tag_id"=>$post["tag_id"]),"group"=>"tour_id"));
    $location_used_list = $this->taglocationModel->get(array("where"=>array("tag_id"=>$post["tag_id"]),"group"=>"location_id"));
    $hotel_used_list = $this->taghotelModel->get(array("where"=>array("tag_id"=>$post["tag_id"]),"group"=>"hotel_id"));

    if(!empty($tour_used_list)){
      foreach($tour_used_list AS $tkey=>$tvalue){
        $moveResult = null;
        $moveResult = $this->tagtourModel->get(
                                              array(
                                                    "where" => array(
                                                                      "tag_id" => $post["moveto"],
                                                                      "tour_id" => $tvalue["tour_id"]
                                                                    ),
                                                    "group"=>"tour_id"
                                                    ));
        if(!$moveResult){
          $this->tagtourModel->add(
                                    array(
                                          "where" => array(
                                                            "tag_id" => $tvalue["tag_id"]
                                                          ),
                                          "set"   => array(
                                                            "tag_id"=>$post["moveto"]
                                                          )
                                          )
                                  );
        }else{
          $this->tagtourModel->delete(array("where"=>array("tag_id"=>$tvalue["tag_id"],"tour_id"=>$tvalue["tour_id"])));
        }
      }
    }
    if(!empty($location_used_list)){
      foreach($location_used_list AS $lkey=>$lvalue){
        $moveResult = null;
        $moveResult = $this->taglocationModel->get(
                                              array(
                                                    "where" => array(
                                                                      "tag_id" => $post["moveto"],
                                                                      "location_id" => $lvalue["location_id"]
                                                                    ),
                                                    "group"=>"location_id"
                                                    ));
        if(!$moveResult){
          $this->taglocationModel->add(
                                    array(
                                          "where" => array(
                                                            "tag_id" => $lvalue["tag_id"]
                                                          ),
                                          "set"   => array(
                                                            "tag_id"=>$post["moveto"]
                                                          )
                                          )
                                  );
        }else{
          $this->taglocationModel->delete(array("where"=>array("tag_id"=>$lvalue["tag_id"],"location_id"=>$lvalue["location_id"])));
        }
      }
    }
    if(!empty($hotel_used_list)){
      foreach($hotel_used_list AS $hkey=>$hvalue){
        $moveResult = null;
        $moveResult = $this->taghotelModel->get(
                                              array(
                                                    "where" => array(
                                                                      "tag_id" => $post["moveto"],
                                                                      "hotel_id" => $hvalue["hotel_id"]
                                                                    ),
                                                    "group"=>"hotel_id"
                                                    ));
        if(!$moveResult){
          $this->taghotelModel->add(
                                    array(
                                          "where" => array(
                                                            "tag_id" => $hvalue["tag_id"]
                                                          ),
                                          "set"   => array(
                                                            "tag_id"=>$post["moveto"]
                                                          )
                                          )
                                  );
        }else{
          $this->taghotelModel->delete(array("where"=>array("tag_id"=>$hvalue["tag_id"],"hotel_id"=>$hvalue["hotel_id"])));
        }
      }
    }
  }

  function admin_ajaxdelete(){
    $id = $this->input->post("tag_id");
    //implement code here
    if($id) {
      $this->load->model("tagtour_model","tagtourModel");
      $this->load->model("taglocation_model","taglocationModel");
      $this->load->model("taghotel_model","taghotelModel");

      $tour_used_list = $this->tagtourModel->get(array("where"=>array("tag_id"=>$id),"group"=>"tour_id"));
      $location_used_list = $this->taglocationModel->get(array("where"=>array("tag_id"=>$id),"group"=>"location_id"));
      $hotel_used_list = $this->taghotelModel->get(array("where"=>array("tag_id"=>$id),"group"=>"hotel_id"));

      if(empty($tour_used_list) AND empty($location_used_list) AND empty($hotel_used_list)){
        $deleteResult = $this->tagModel->delete($id);
        if($deleteResult){
          $this->load->model("tag_translate_model","tagtranslateModel");
          $tagdelete = $this->tagtranslateModel->delete(array("where"=>array("tag_id"=>$id)));
          if($tagdelete){
            $return['message'] = "Successful.";
            $return['code'] = "1";
          }else{
            $return['message'] = "Can't delete tag translate.";
            $return['code'] = "0";
          }
        }else{
          $return['message'] = "Can't delete tag.";
          $return['code'] = "0";
        }
      }else{
        $return['message'] = "There are some articles in this tag. Tag can't remove.";
        $return['code'] = "0";
      }
    }else{
      $return['message'] = "tag_id does not assigned.";
      $return['code'] = "0";
    }
    echo json_encode($return);
    die;
  }
}

?>