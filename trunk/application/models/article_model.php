<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Article_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "art";
    $this->_column = array(
                     'id'               => $this->_prefix.'_id',
                     'display'          => $this->_prefix.'_display',
                     'type'             => $this->_prefix.'_type', //1 = location, 2 = tour
                     'tag_id'           => $this->_prefix.'_tag_id',
                     'province_id'           => $this->_prefix.'_province_id',
                     'cr_date'          => $this->_prefix.'_cr_date',
                     'cr_uid'           => $this->_prefix.'_cr_uid',
                     'lu_date'          => $this->_prefix.'_lu_date',
                     'lu_uid'           => $this->_prefix.'_lu_uid'
    );

    $this->_join_column = array(
                     'art_id'           => $this->_prefix.'t_art_id',
                     'lang'             => $this->_prefix.'t_lang',
                     'title'            => $this->_prefix.'t_title',
                     'body'             => $this->_prefix.'t_body',
                     'url'              => $this->_prefix.'t_url'
    );
  }

  function get($options=""){
    if(is_numeric($options)){
      $where = array("where"=>array("art_id"=>$options,"lang"=>$this->lang->lang()));
      if($this->count_rows($where)){
        $this->db->where($this->_join_column["lang"],$this->lang->lang());
      }
    }
    $this->db->join("ci_article_translate","ci_article_translate.artt_art_id = ci_article.art_id");
    $mainTable = parent::get($options);

    return $mainTable;
  }

  function post_add($options = NULL){
    $this->load->model("article_translate_model","articleTranslateModel");
    if(!empty($options["id"])){
      $options["art_id"] = $options["id"];
      unset($options["id"]);
    }
    $result = $this->articleTranslateModel->add($options);
    return $result;
  }

}
?>