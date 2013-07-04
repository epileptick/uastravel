<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends MY_Controller {
  function __construct(){
    parent::__construct();
  }

  function _index($where=""){
    $locationData["location"] = $this->locationModel->get($where);
    return $locationData;
  }

  function admin_index(){
    $result = array();

    $config['per_page'] = 15;

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
    $segment_array = $this->uri->segment_array();
    $segment_count = $this->uri->total_segments();

    $keyword = $this->input->post();

    if($keyword){
      $where = array(
                      'limit'=>'',
                      'returnObj'=>'',
                      'order'=>'CONVERT( loct_title USING tis620 ) ASC',
                      'where'=>array('loc_title LIKE'=>'%'.$keyword["search"].'%')
                    );
    }else{
      $tag = $this->uri->segment(2);
      $where = array(
                    'limit'=>'',
                    'returnObj'=>'',
                    'order'=>'CONVERT( loct_title USING tis620 ) ASC',
                    'where'=>''
                  );
    }

    $this->load->library('pagination');
    $config['base_url'] = site_url(join("/",$segment_array));
    $config['total_rows'] = $this->locationModel->count_rows($where);

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

    $result = array_merge($result,$this->_index($where));
    if((count($result['location'])+1)>$result['start_offset']){
      $result['end_offset'] = count($result['location']);
    }

    //initialize pagination
    $this->pagination->initialize($config);
    //load the view



    $this->_fetch("admin_list",$result);

  }

  function user_index(){

    if($this->uri->segment(1) == $this->lang->line("url_lang_location")){
      $index = 1;
      //echo $index;
    }else if($this->uri->segment(2) == $this->lang->line("url_lang_location")){
      $index = 2;
      //echo $index;
    }


    if(is_numeric($this->uri->segment($index+2))){
      ////////////////////////////
      // tage/page
      // algorithm : http://www/tour/2/3
      // algorithm : http://www/tour/tag/page
      // sample : http://uastravel.com/tour/halfday/10
      ////////////////////////////
      $page = $this->uri->segment($index+2);//3;
      $tag = $this->uri->segment($index+1);//2
      //echo "tag/".$page;

      $this->user_listbytag($tag, $page);


    }else if(is_numeric($this->uri->segment($index+1))){
      ////////////////////////////
      // location/page
      // algorithm : http://www/location/2
      // algorithm : http://www/location/page
      // sample : http://uastravel.com/location/10
      ////////////////////////////
      $page = $this->uri->segment($index+1); //2
      $tag = 0;

      //echo "tour/".$page;
      $this->user_list($page);

    }else if($this->uri->segment($index+1)){
      ////////////////////////////
      // tag
      // algorithm : http://www/tour/2
      // algorithm : http://www/tour/tag
      // sample : http://uastravel.com/tour/halfday
      ////////////////////////////
      $page = 0;
      $tag = $this->uri->segment($index+1); //2
      //$call = "tag";

      $this->user_listbytag($tag, $page);

    }else{

      ////////////////////////////
      // tour
      // algorithm : http://www/tour
      // algorithm : http://www/tour
      // sample : http://uastravel.com/tour
      ////////////////////////////
      $page = 0;
      $tag = 0;
      //echo "tour";
      $this->user_list($page);
    }

  }


  function _location_menu($select=false){
      $type["where"]["type_id"] = 2;
      $this->load->model("tagtype_model", "tagtypeModel");
      $tagtypeQuery = $this->tagtypeModel->getTagTypeList($type);

      $this->load->model("tag_model", "tagModel");
      $this->load->model("taglocation_model", "tagLocationModel");

      $count = 0;
      foreach ($tagtypeQuery as $key => $value) {
        
		    $menu[$count] = new stdClass();
        $menu[$count]->tag_id = $value["tag_id"];
        $menu[$count]->name = $value["name"];
        $menu[$count]->url = $value["url"];

        //Select all
        if($select){
          $menu[$count]->select_all = 0;
        }else{
          $menu[$count]->select_all = 1;
        }
        //Select element
        if($select && $select == $value["name"]){
          $menu[$count]->select = 1;
        }else{
          $menu[$count]->select = 0;
        }

        $count++;
      }
      
      return $menu;
      //print_r($menu);  exit;
  }


  function _shuffle_assoc($list) {
    if (!is_array($list)) return $list;

    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key) {
      $random[] = $list[$key];
    }
    return $random;
  }

  function _location_list($tags){

    $count = 0;
    $this->load->model("taglocation_model", "taglocationModel");
    $location = $this->taglocationModel->getRecord($tags);

    if(!empty($location)){
      return $this->_shuffle_assoc($location);
    }else{
      return ;
    }

  }



  function user_list($page=0){
    $per_page = 20;
    $data["menu"]= $this->_location_menu();

    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $this->load->model("article_model","articleModel");
    $where["where"]["tag_id"] = 0;
    $where["where"]["type"] = 1;
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    $this->_assign("article",$articleResult[0]);
    unset($where);

    //Filter all
    $query["tag_id"] = $query["menu"];
    $query["join"] = true;
    $query["in"] = true;

    $this->load->model("taglocation_model", "taglocationModel");
    $location = $this->taglocationModel->getRecordFirstpage($query);

    if(!empty($location)){
      $data["location"] =  $location;
    }else{
      $data["location"] = false;
    }

    $data["caconical"] = base_url($this->lang->line("url_lang_location"));

    if(!empty($data)){
        $this->_fetch('user_list', $data, false, true);
    }

  }

  function user_listbytag($tag=false, $page=0){

    $data["menu"] = $this->_location_menu($tag);

    foreach ($data["menu"] as $key => $valueTag) {
      $query["menu"][] = $valueTag->tag_id;
    }

    $argTag["url"] = $tag;
    $tagQuery = $this->tagModel->get($argTag);

    $this->load->model("article_model","articleModel");
    $where["where"]["tag_id"] = $tagQuery[0]["id"];
    $where["where"]["type"] = 1;
    $where["limit"] = 1 ;
    $articleResult = $this->articleModel->get($where);
    $this->_assign("article",$articleResult[0]);
    unset($where);
    if(!empty($articleResult)){
      $this->_assign("article",$articleResult[0]);
    }else{
      $where["where"]["tag_id"] = 0;
      $where["where"]["type"] = 1;
      $where["limit"] = 1 ;
      $articleResult = $this->articleModel->get($where);
      $this->_assign("article",$articleResult[0]);
      unset($where);
    }


    if(!empty($articleResult[0]["id"])){
      $this->load->model("images_model","imagesModel");
      $where["where"]["parent_id"] = $articleResult[0]["id"];
      $where["where"]["table_id"] = 3;
      $imagesResult = $this->imagesModel->get($where);
      $this->_assign("images",$imagesResult);
    }

    //print_r($tagQuery); exit;
    if(!empty($tagQuery)){
      $query["tag_id"] = $tagQuery[0]["id"];
      $query["join"] = true;

      //Tour
      $this->load->model("taglocation_model", "taglocationModel");
      $location = $this->taglocationModel->getRecordFirstpage($query);

      if(!empty($location)){
        //$data["location"] =  $this->_shuffle_assoc($location);
        $data["location"] =  $location;
      }else{
        $data["location"] = false;
      }
    }else{
      $data["location"] = false;
    }

    $data["caconical"] = base_url($this->lang->line("url_lang_location")."/".$tag);

    if(!empty($query["offset"])){
      if($query["offset"]>0){
        if(empty($data["location"])){
          show_404();
        }
        $this->_fetch('user_listnextpage', $data, false, true);
      }else{
        //print_r($data);
        $this->_fetch('user_list', $data, false, true);
      }

    }else{
        //print_r($data);
        $this->_fetch('user_list', $data, false, true);
    }

  }

  function user_search(){

    $keyword = $this->input->post();

    if($keyword){

      $data["menu"]= $this->_location_menu();


      foreach ($data["menu"] as $key => $valueTag) {
        $query["menu"][] = $valueTag->tag_id;
      }
      $data["main_menu"]= Menu::main_menu();

      $query["title"] = $keyword["search"];
      $query["user_search"] = true;

      $data["location"] = $this->locationModel->searchRecord($query);
      $data["search"] = $keyword["search"];


      $this->_fetch('user_list', $data, false, true);
    }else{
      return;
    }
  }


  function admin_setdisplay(){
    //Get argument from post page
    $args = $this->input->post();
    $this->locationModel->updateDisplayRecord($args);
    print_r($args); exit();
  }

  function admin_create($id=NULL){
    $lang = $this->lang->lang();
    $_post = $this->input->post();


    $this->load->model("tag_model","tagModel");


    $_post['body'] = preg_replace("/<p[^>]*><\\/p[^>]*>/", '', $_post['body']);

    if($this->input->post("submit") != NULL OR $this->input->post("ajax")==TRUE){

      if( isset($_post["id"]) ){
        // ==================================================================
        //
        // Update on submit
        //
        // ------------------------------------------------------------------
        $this->load->model("taglocation_model", "taglocationModel");

        $postData = $this->locationModel->add($_post);

        // ==================================================================
        //
        // Update (TagLocation) relationship data table
        //
        // ------------------------------------------------------------------

        if(!empty($_post["tags"])){

          if($_post["tags"] == "[]"){
            $location["location_id"] = $_post["id"];
            $this->taglocationModel->deleteRecord($location);
          }else{
            $this->taglocationModel->updateRecord($_post);
          }
        }

      }else{

        $postData = $this->locationModel->add($_post);

        if(!empty($_post["tags"])){
          ////////////////////////////////////////////
          //Add (TagTour) relationship data table
          ////////////////////////////////////////////
          $this->load->model("tag_model", "tagModel");
          $this->load->model("taglocation_model", "tagLocationModel");
          $count = 0;
          $tagTour = false;
          $tagArray = $this->tagModel->cleanTagAndAddTag($_post["tags"]);
          foreach ($tagArray as $key => $value) {
            $tagLocation[$count]["tag_id"] = $value->id;
            $tagLocation[$count]["location_id"] = $postData;
            $count++;
          }
          $this->tagLocationModel->addMultipleRecord($tagLocation);
        }
      }

      if($this->input->post("ajax")!=TRUE){

        //Upload and update Images
        $this->load->library('upload');
        $dir = Hash::make("location_images")->hash(md5($postData));

        if(!file_exists($dir)){
          mkdir($dir, 0755,true);
        }


        if(!empty($_FILES['first_image']["name"])){
          if(file_exists($dir."/".md5($postData)."_first.jpg")){
            Util::rrmdir($dir."/".md5($postData)."_first.jpg");

          }
          $config[0]['upload_path'] = $dir;
          $config[0]['allowed_types'] = 'gif|jpg|png';
          $config[0]['file_name'] = md5($postData)."_first.jpg";
          $this->upload->initialize($config[0]);
          $this->upload->do_upload("first_image");
          $_firstImg = $this->upload->data();
          $imgData["first_image"] = base_url("/".$dir."/".$_firstImg["file_name"]);

        }

        if(!empty($_FILES['background_image']["name"])){
          if(file_exists($dir."/".md5($postData)."_background.jpg")){
            Util::rrmdir($dir."/".md5($postData)."_background.jpg");
          }
          $config[1]['upload_path'] = $dir;
          $config[1]['allowed_types'] = 'gif|jpg|png';
          $config[1]['file_name'] = md5($postData)."_background.jpg";
          $this->upload->initialize($config[1]);
          $this->upload->do_upload("background_image");
          $_backgroundImg = $this->upload->data();
          $imgData["background_image"] = base_url("/".$dir."/".$_backgroundImg["file_name"]);
        }

        if(!empty($_FILES['banner_image']["name"])){
          if(file_exists($dir."/".md5($postData)."_banner.jpg")){
            Util::rrmdir($dir."/".md5($postData)."_banner.jpg");
          }
          $config[2]['upload_path'] = $dir;
          $config[2]['allowed_types'] = 'gif|jpg|png';
          $config[2]['file_name'] = md5($postData)."_banner.jpg";
          $this->upload->initialize($config[2]);
          $this->upload->do_upload("banner_image");
          $_bannerImg = $this->upload->data();
          $imgData["banner_image"] = base_url("/".$dir."/".$_bannerImg["file_name"]);
        }
        $imgData["id"] = $postData;
        $this->locationModel->updateRecord($imgData);
      }


      if($postData){
        if($this->input->post("ajax")==TRUE){
          $data['id'] = $postData;
          $data['status'] = $this->_fetch('ajax_save_success',$data,TRUE,TRUE);
          echo json_encode($data);
          die;
        }else{
          $data['post_data']['id'] = $postData;
          $this->_fetch('admin_add_success',$data);
        }
      }else{
        echo "submit failed";
      }
    }else{
      if($id==NULL){
        $data['post'][0] = array(
                            'id' => 0,
                            'latitude' => "7.951172174578056",
                            'longitude' => "98.34449018537998",
                            'title' => "",
                            'body' => "",
                            'suggestion' => "",
                            'route' => ""
                            );
      }else{
        $postData = $this->locationModel->get($id);

        if(!$postData){
          redirect(base_url("admin/location/create"));
          die;
        }

        //Query (TagTour) relationship data table by tour_id
        $this->load->model("taglocation_model", "taglocationModel");
        $tagLocation["location_id"] = $id;
        $data["tagLocation"] = $this->taglocationModel->getRecord($tagLocation);

        //print_r($data["tagTour"]); exit;
        if(!empty($data["tagLocation"]) && $data["tagLocation"]){
          //$this->load->model("tag_model", "tagModel");
          foreach ($data["tagLocation"] as $key => $value) {
            //echo $value->tag_id; echo "<br>";
            $tagLocation["id"] = $value->tag_id;
            $tagLocation["lang"] = $this->lang->lang();
            $tag_result = $this->tagModel->get($tagLocation);
            $data["tag_query"][] = $tag_result[0];
          }
        }

        $data['post'] = $postData;
      }

      $field = "tag_id, tag_name";
      $data["tag"] = $this->tagModel->get(false, $field);

      //var_dump($data);exit;

      $this->_fetch('admin_add_form',$data);
    }
  }

  function user_view($tag= FALSE, $id=FALSE){

    if($id){
      $this->load->model("tag_model", "tagModel");
      $this->load->model("images_model", "imagesModel");
      $this->load->model("taglocation_model", "tagLocationModel");
      $this->load->model("type_model", "typeModel");
      $this->load->model("tagtype_model", "tagTypeModel");

      $locationData["location"] = $this->locationModel->get($id);
      if(empty($locationData["location"])){
        show_404();
      }
      if(count($locationData["location"]) < 1){
        show_404();
      }else{
        $locationData["images"] = $this->imagesModel->get(array('where'=>array('parent_id'=>$id,'table_id'=>1)));
        $locationData["location"] = $locationData["location"][0];
      }

      //Related Tour in Location
      $query["tag_url"] = $tag;
      $query["mainper_page"] = 3;
      $query["per_page"] = 5;
      $query["offset"] = 0;
      $locationData["related"] = $this->locationModel->getRecordRelated($query);


      //Prepare for three column
      if(preg_match("#<blockquote>(.*)</blockquote>#smiU", $locationData["location"]['body'],$matches)){
        $locationData["location"]['body'] = str_replace($matches[0], '', $locationData["location"]['body']);
        $locationData["location"]['subtitle'] = strip_tags($matches[1]);
      }
      $locationData["location"]['body'] =  explode("<hr />",preg_replace("/<p[^>]*>[\s|&nbsp;]*<\/p>/", '', $locationData["location"]['body']));

      //Tag
      $location["where"]["location_id"] = $id;
      $locationData["tag"] = $this->tagLocationModel->getTagLocationList($location);

      $typeProvinceId = $this->typeModel->get(array("where"=>array("name"=>"province")));
      $tagProvinceList = $this->tagTypeModel->getTagTypeList(array("where"=>array("type_id"=>$typeProvinceId[0]["id"],"parent_id"=>0),"order"=>"index ASC"));

      $this->_assign("allProvince",$tagProvinceList);

      foreach ($locationData["tag"] as $tagKey => $tagValue) {
        foreach ($tagProvinceList as $pKey => $pValue) {
          if($tagValue["tag_id"] == $pValue["tag_id"]){
            $tagProvinceID = $tagValue;
            break;
          }
        }
        if(!empty($tagProvinceID)){
          break;
        }
      }

      if(!empty($tagProvinceID)){

        $this->_assign("currentProvince",$tagProvinceID);

        $relatedSearch["tag_id"] = $tagProvinceID["tag_id"];
        //Related Location
        $locationRelated = $this->tagLocationModel->getRecordByTag($relatedSearch);

        if(!empty($locationRelated)){
          //$data["location"] =  $this->_shuffle_assoc($location);
          $this->_assign("locationRelated",$locationRelated);
        }else{
          $this->_assign("locationRelated",false);
        }
      }else{
        $this->_assign("locationRelated",false);
      }

      $locationData["caconical"] = base_url($this->lang->line("url_lang_location")."/".trim($locationData["location"]["url"])."-".trim($locationData["location"]["loc_id"]));

      if(!empty($locationData)){
        if($this->input->get("ajax")){
          $ajaxReturn["imagesRedered"] = $this->_fetch("ajax_images", $locationData, TRUE, TRUE);

          $ajaxReturn["bodyRedered"] = $this->_fetch("ajax_body", $locationData, TRUE, TRUE);
          $ajaxReturn["data"] = $locationData;

          echo json_encode($ajaxReturn);exit;
        }else{
          $this->_fetch("user_view", $locationData, FALSE, TRUE);
        }
      }else{
        show_404();
      }


    }
  }

  function admin_delete($id=NULL){
    //implement code here
    if(is_numeric($id)){
      $this->locationModel->delete($id);
      redirect(base_url("admin/location"));
    }
  }

  function ajax_delete(){
    //implement code here
    $_post = $this->input->post();
    foreach($_post AS $id=>$value){
      if(!$this->locationModel->delete($id)){
        return "FALSE";
      }
    }
    return "TRUE";
  }

  function _search($render="user_list"){
    //Get argument from post page
    $keyword = $this->input->post();

    if($keyword){
      $where = array(
                      'limit'=>'',
                      'returnObj'=>'',
                      'order'=>'CONVERT( loct_title USING tis620 ) ASC',
                      'where'=>array('loc_title LIKE'=>'%'.$keyword["search"].'%')
                    );
        if(empty($tag)){
          //$where['where'] = array('');
        }
        $result = $this->_index($where);

        $this->_fetch($render,$result);
    }else{
      return;
    }
  }

}

?>