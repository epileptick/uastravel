<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captcha_model extends MY_Model {

  function createRecord(){
    $this->load->helper('captcha');
    $vals = array(
        'img_path'   => './resource/captcha_images/',
        'img_url'    => base_url("/resource/captcha_images\/")
        );
    $cap = create_captcha($vals);
    $data = array(
        'captcha_time'  => $cap['time'],
        'ip_address'    => $this->input->ip_address(),
        'word'   => $cap['word']
        );
    $query = $this->db->insert_string('captcha', $data);
    $this->db->query($query);

    return $cap['image'];
  }

  function checkRecord($captcha){

    if($captcha){

      $expiration = time()-7200; // Two hour limit
      $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 

      // Then see if a captcha exists: 
      $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
      $binds = array(strtolower($captcha), $this->input->ip_address(), $expiration);
      $query = $this->db->query($sql, $binds);
      $row = $query->row(); 

      return $row->count;
    }else{
      return 0;
    }   
  }
}
?>