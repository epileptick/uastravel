<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Type extends MY_Controller {
  function __construct(){
    parent::__construct();
  }


  function _index($where=""){

  }


  function admin_delete($id=NULL){
    //implement code here
    if(!empty($id) && is_numeric($id)){

      $this->load->model("tagtype_model", "tagTypeModel");

      $childTagResult = $this->tagTypeModel->get(array("where"=>array("type_id"=>$id)));
      if($childTagResult){
        redirect(base_url("admin/tag/?error=01"));
      }
      $childTypeResult = $this->typeModel->get(array("where"=>array("parent_id"=>$id)));
      if($childTypeResult){
        redirect(base_url("admin/tag/?error=02"));
      }
      $deleteResult = $this->typeModel->delete($id);
      redirect(base_url("admin/tag"));
    }
  }

  function admin_create($id=NULL){
    if(!empty($id)){
      //load model
      $this->load->model("tagtype_model", "tagTypeModel");
      $this->load->model("tag_model", "tagModel");

      $result["typeData"] = $this->typeModel->get($id);
      $result["allTypeData"] = $this->typeModel->get();
      $whereTagType["where"]["type_id"] = $id;
      $whereTagType["where"]["parent_id"] = 0;
      $whereTagType["group"] = "tag_id";
      $result["tagTypeData"] = $this->tagTypeModel->getTagTypeList($whereTagType);
      $result["tagData"] = $this->tagModel->getTagList();


      $this->_fetch("admin_create",$result);
    }else{
      $post = $this->input->post();
//var_dump($post);exit;
      if(empty($post)){
        redirect(base_url("admin/tag/"));
      }
      if(empty($post["url"])){
        $post["url"] = Util::url_title(trim($post["name"]));
      }
      if(!empty($post["name"])){
        $this->load->model("tagtype_model", "tagTypeModel");
        if(!empty($post["tag"]["id"])){
          $whereTagType["where"]["type_id"] = $post["id"];
          $whereTagType["where"]["parent_id"] = 0;
          $whereTagType["group"] = "tag_id";
          $tagTypeData = $this->tagTypeModel->get($whereTagType);
          var_dump($this->db->last_query());
//var_dump($post["tag"]);
//var_dump($tagTypeData);
          if(!empty($tagTypeData)){
            foreach($tagTypeData AS $tagTypeDataKey=>$tagTypeDataValue){
              if(($resultSearch = array_search($tagTypeDataValue["tag_id"],$post["tag"]["id"])) === FALSE){
                $deleteTagType[] = $tagTypeDataValue["id"];
                $this->tagTypeModel->delete($tagTypeDataValue["id"]);
              }
              if($resultSearch !== FALSE){
                unset($post["tag"]["id"][$resultSearch]);
              }
            }
          }

          foreach($post["tag"]["id"] AS $addTagKey => $addTagValue){
            $tagToAdd["tag_id"] = $addTagValue;
            $tagToAdd["type_id"] = $post["id"];
            $this->tagTypeModel->add($tagToAdd);
          }
          unset($post["tag"]);

        }else if(!empty($post["id"])){
          $whereTagType["where"]["type_id"] = $post["id"];
          $whereTagType["where"]["parent_id"] = 0;
          $this->tagTypeModel->delete($whereTagType);
        }
      }
      $post["id"] = $this->typeModel->add($post);
      if(!empty($post["id"])){
        redirect(base_url("admin/type/create/".$post["id"]));
      }else{
        redirect(base_url("admin/tag/"));
      }
    }
  }

}

?>