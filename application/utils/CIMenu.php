<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu {
	function main_menu(){
    $main_menu = "main_menu";

    $this->load->model("tagtype_model", "tagTypeModel");
    $this->load->model("type_model", "typeModel");

    $typeWhere["where"]["name"] = $main_menu;
    $typeResult = $this->typeModel->get($typeWhere);

    $tagTypeWhere["where"]["type_id"] = $typeResult[0]["id"];
    $tagTypeWhere["order"] = "index ASC";
    $tagTypeResult = $this->tagTypeModel->getTagTypeList($tagTypeWhere);


    foreach ($tagTypeResult as $key => $value) {
      $arrayIndex[$key] = $value["index"];
      $arrayToSort[$key] = $value;
    }
    unset($tagTypeResult);
    asort($arrayIndex);
    foreach ($arrayIndex as $key => $value) {
      $tagTypeResult[$key] = $arrayToSort[$key];
      $tagTypeResult[$key]["index"] = $value;
    }
    return Menu::sort_main_menu($tagTypeResult);
  }

  function sort_main_menu($menuArray = NULL,$parent_id = 0){
    if($menuArray == NULL) {
      return FALSE;
    }
    $i = 0;
    foreach($menuArray AS $menuKey=>$menuValue){
      if($menuValue["parent_id"] == $parent_id){
        $result[$i] = $menuValue;
        unset($menuArray[$menuKey]);
      }
      $i++;
    }
    foreach ($result as $resultKey => $resultValue) {
      $finalResult[$resultValue["tag_id"]] = $resultValue;
      $finalResult[$resultValue["tag_id"]]["full_url"] = $resultValue["url"];
      foreach ($menuArray as $menuKey => $menuValue) {
        if($resultValue["tag_id"] == $menuValue["parent_id"]){
          $menuValue["full_url"] = $resultValue["url"]."/".$menuValue["url"];
          $finalResult[$resultValue["tag_id"]]["child"][$menuValue["tag_id"]] = $menuValue;
        }
      }
    }

    return $finalResult;
  }
}



?>
