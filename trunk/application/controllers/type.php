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
      $result["tagTypeData"] = $this->tagTypeModel->get(array("where"=>array("type_id"=>$id)));
      $result["tagData"] = $this->tagModel->get();
      
      
      $this->_fetch("admin_create",$result);
    }else{
      $post = $this->input->post();
      
      if(empty($post["url"])){
        $string = $post["name"];
        $string = preg_replace("`\[.*\]`U","",$string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
        $string = str_replace('%', '-percent', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
        $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
        $string = strtolower(trim($string, '-'));
        $post["url"] = trim($string);
      }
      if(!empty($post["name"])){
        if($post["tag"]){
          $this->load->model("tagtype_model", "tagTypeModel");
          $tagTypeData = $this->tagTypeModel->get(array("where"=>array("type_id"=>$post["id"])));
          
          foreach($tagTypeData AS $tagTypeDataKey=>$tagTypeDataValue){
            if(($resultSearch = array_search($tagTypeDataValue["tag_id"],$post["tag"]["id"])) === FALSE){
              $deleteTagType[] = $tagTypeDataValue["id"];
              $this->tagTypeModel->delete($tagTypeDataValue["id"]);
            }
            unset($post["tag"]["id"]["$resultSearch"]);
          }
          //var_dump($deleteTagType);
          foreach($post["tag"]["id"] AS $addTagKey => $addTagValue){
            $tagToAdd["tag_id"] = $addTagValue;
            $tagToAdd["type_id"] = $post["id"];
            $this->tagTypeModel->add($tagToAdd);
          }
          unset($post["tag"]);
          $this->typeModel->add($post);
        }else{
          $this->typeModel->add($post);
        }
      }
      redirect(base_url("admin/type/create/".$post["id"]));
    }
  }
  
}

?>