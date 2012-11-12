<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TagTour_model extends MY_Model {
  function __construct(){
    parent::__construct();
    $this->_prefix = "tat";
    $this->_column = array(
                     'id'                => 'tat_id',
                     'tag_id'            => 'tat_tag_id',
                     'tour_id'           => 'tat_tour_id'
    );
  }
 
  function mapField($result){
    
    foreach ($result as $key => $value) {
      $data = new stdClass();
      foreach ($value as $keyField => $valueFiled) {
        $keyExplode = explode("_", $keyField, 2);
        $newkey = $keyExplode[1];

        $data->$newkey = $valueFiled; 
      }
      $newResult[] = $data;      
    }

    return $newResult;
  }

  function countRecord($args = false){

    $count = 0;
    if(!empty($args["tag_id"]) && !empty($args["join"])  && !empty($args["in"]) ){
      $this->db->select('COUNT(tat_tour_id) AS count_tour');
      $this->db->from('ci_tagtour');
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');         
      $this->db->where_in('tat_tag_id', $args["tag_id"]); 
      $query = $this->db->get();
      $count = $query->result(); 
      return $count[0]->count_tour;
    }else{  
      $count = $this->db->count_all('ci_tagtour');
      return $count;
    }


  }

  function getRecord($args=false){
    //print_r($args); exit;

    if(isset($args["tag_id"]) && isset($args["tour_id"]) ){
      //Get category by name

      $data["tat_tag_id"] = $args["tag_id"];
      $data["tat_tour_id"] = $args["tour_id"];

      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }

    }else if(!empty($args["tag_id"]) && !empty($args["join"]) && !empty($args["in"])){

      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');         

      if(isset($args["limit"])>-1 && isset($args["offset"]) > -1){
        $this->db->limit($args["limit"], $args["offset"]);
      }

      $this->db->where_in('tat_tag_id', $args["tag_id"]);  

      $this->db->order_by('CONVERT( ci_tour.tou_name USING tis620 ) ASC');  

      $query = $this->db->get('ci_tagtour');   
      //$names = array('Frank', 'Todd', 'James');
      //$this->db->where_in('username', $names);

      return $query->result();

    }else if(!empty($args["tag_id"]) && !empty($args["join"])){
      //Get category by name
      //print_r($args); exit;
      $data["tat_tag_id"] = $args["tag_id"];
      $this->db->join('ci_tag', 'ci_tag.tag_id = ci_tagtour.tat_tag_id');
      $this->db->join('ci_tour', 'ci_tour.tou_id = ci_tagtour.tat_tour_id');         
      $query = $this->db->get_where('ci_tagtour', $data);   

      return $query->result();

    }else if(!empty($args["tag_id"])){
      //Get category by name
      //print_r($args); exit;
      $data["tat_tag_id"] = $args["tag_id"];      
      $query = $this->db->get_where('ci_tagtour', $data);   

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());

        return $newResult;
      }else{
        return false;
      }
    }else if(!empty($args["tour_id"])){
      //Get category by name
      $data["tat_tour_id"] = $args["tour_id"];
      //print_r($args);
      $query = $this->db->get_where('ci_tagtour', $data);
      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else if(!empty($args["id"])){
      //Get category by id      
      $query = $this->db->get_where('ci_tagtour', array('agt_id' => $args["id"]), 1, 0);

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }else {
      //Get list page
      $query = $this->db->get("ci_tagtour");

      if($query->num_rows > 0){
        $newResult = $this->mapField($query->result());
        return $newResult;
      }else{
        return false;
      }
    }    

  }


  function addRecord($data=false){

    if($data){
      //Set data
      foreach($data AS $columnName=>$columnValue){
        if(array_key_exists($columnName, $this->_column)){
          $this->db->set($this->_column[$columnName], $columnValue); 
        }
      }
      $this->db->insert($this->_table);

      return $this->db->insert_id();
    }
    
    return ;
  }
  


 
  function addMultipleRecord($args=false){

   //print_r($args); exit;
   //Check duplicate tag data
    if($args){
      //$tagNew = array();
      $count = 0;
      $tag = false;
      foreach ($args as $key => $value) {
          $tagInsertID = $this->addRecord($value);  
          //$tag[$count]->id = $tagInsertID;
          //$tag[$count]->name = $tagInput["name"];
         $count++;
      }
      return ;
    }else{
      return ;
    }
  }   

  function updateRecord($args=false){
    //Get tagtour by tour_id



    //Get tag by tagname

    if($args["tags"]=="[]"){
      return ;
    } 

    //print_r($args["tags"]); exit;
    $tags = str_replace('[', '', $args["tags"]);  
    $tags = str_replace(']', '', $tags);      
    $tags = str_replace('"', '', $tags);  
    $tags = explode(",",  $tags);
    $tags = array_unique($tags);
    $this->load->model("tag_model", "tagModel");
    $tagInput = array();
    $count = 0;





    $tagtour["tour_id"] = $args["id"];
    $query = $this->getRecord($tagtour);


    foreach ($tags as $key => $value) {
      $tag["name"] = $value;
      $tagQuery = $this->tagModel->getRecord($tag);

      if(empty($tagQuery)){
        $tag["url"] = Util::url_title($value);
        $input[$count]->id = $this->tagModel->addRecord($tag);
        $input[$count]->name = $tag["name"];
      }else{
        $input[$count] = $tagQuery[0];   
      }
      $count++;
    }


    //print_r($input);
    //print_r($query); exit;

    $update = false;
    $updateCount = 0;
    $updateArray = array();
    $updateData =  array();

    $deleteCount = 0;
    $deleteArray = array();

    $insert = false;
    $insertCount = 0;
    $insertArray = array();

    if(!empty($query)){
      //Loop check update && delete
      foreach ($query as $keyQuery => $valueQuery) {
          //echo "Query : ".$valueQuery->tag_id;
          //echo "<br><br>";

          foreach ($input as $keyInput => $valueInput) {
              //echo "Input : ".$valueInput->id;
              //echo "<br><br>";            
              if($valueQuery->tag_id == $valueInput->id){
                  $update = true;
                  $updateData = $valueInput;
              }
          }

          if($update){
              //Update
              $updateArray[$updateCount] = $updateData;
              $updateCount++;  
              $update = false;  
          }else{
              //Delete
              $deleteArray[$deleteCount] = $valueQuery;
              $deleteCount++; 
          }     
      }

      //Loop check insert
      foreach ($input as $keyInput => $valueInput) {
          //echo "Query : ".$valueInput->id;
          //echo "<br><br>";
          foreach ($query as $keyQuery => $valueQuery) {
              //echo "Input : ".$valueQuery->tag_id;
              //echo "<br><br>";            
              if($valueInput->id == $valueQuery->tag_id){
                  $insert = true;
                  //$insertData = $valueInput;
              }
          }

          //Insert
          if($insert){
              //$updateArray[$updateCount] = $insertData;
              //$updateCount++;  
              $insert = false;  
          }else{
              $insertArray[$insertCount] = $valueInput;
              $insertTag[$insertCount]["tag_id"] = $valueInput->id;
              $insertTag[$insertCount]["tour_id"] = $args["id"];
              $insertCount++; 
          }     
      }
      //return $updateArray;


    //End check empty $query
    }else{ 

      foreach ($input as $keyInput => $valueInput) {
        $insertArray[$insertCount] = $valueInput;
        $insertTag[$insertCount]["tag_id"] = $valueInput->id;
        $insertTag[$insertCount]["tour_id"] = $args["id"];
        $insertCount++; 
      }

    }

 

    if(!empty($insertTag)){
  
      $this->addMultipleRecord($insertTag);
    }

    if(!empty($deleteArray)){
      /*echo "<br><br>";
      echo "Delete : ";
      echo "<br><br>";
      print_r($deleteArray);
      echo "<br><br>";
*/
      foreach ($deleteArray as $key => $value) {
        # code...
        $deleteTag["id"] = $value->id;
        $this->deleteRecord($deleteTag);
      }

    }
    //exit;
    /*
      echo "Update : ";
      echo "<br><br>";
      print_r($updateArray);
      echo "<br><br>";
    */
    //exit;
        
    return ;
  }

  function deleteRecord($args=false){
    if(isset($args["id"])){
      $this->db->where("tat_id", $args["id"]);
      $this->db->delete("ci_tagtour");
    }else if(isset($args["tour_id"])){
      $this->db->where("tat_tour_id", $args["tour_id"]);
      $this->db->delete("ci_tagtour");
    }
  }
}
?>