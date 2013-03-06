<?php
class Facebook_model extends CI_Model {
	
  private $_redirect = "";
  private $_isError = FALSE;
  private $_errorString = "";
  
	public function __construct()
	{
		parent::__construct();
		
		$config = array(
						'appId'  => '276267482439916',
						'secret' => '4f76a8a05afb8d4e81992947e33f2f48',
						'fileUpload' => true, // Indicates if the CURL based @ syntax for file uploads is enabled.
						);
		$this->load->library('Facebook', $config);
	}
  public function getFacebookUser(){
    if($this->_isError){
      return array("Error"=>$this->_isError,"Reason"=>$this->_errorString);
    }
		$user = $this->facebook->getUser();

		// We may or may not have this data based on whether the user is logged in.
		//
		// If we have a $user id here, it means we know the user is logged into
		// Facebook, but we don't know if the access token is valid. An access
		// token is invalid if the user logged out of Facebook.
		$profile = null;
		if($user) {
			try {
			    // Proceed knowing you have a logged in user who's authenticated.
				$profile = $this->facebook->api('/me?fields=id,name,link,email');
        //var_dump($profile);exit;
        
        $this->session->set_userdata("login_status",TRUE);
			} catch (FacebookApiException $e) {
				error_log($e);
			    $user = null;
			}
		}else{
      $this->session->set_userdata("login_status",FALSE);
    }
		$fb_data = array(
						'me' => $profile,
						'uid' => $user,
						'loginUrl' => $this->facebook->getLoginUrl(
							array(
								'scope' => 'email,user_birthday,publish_stream', // app permissions
								'redirect_uri' => $this->_redirect // URL where you want to redirect your users after a successful login
							)
						),
						'logoutUrl' => $this->facebook->getLogoutUrl(),
					);
		$this->session->set_userdata('fb_data', $fb_data);
  }
  
  public function setRedirect($url = ""){
    if($url == "" && $this->_redirect == ""){
      $this->_isError = TRUE;
      $this->_errorString = "Redirect is not set.";
    }
    if($this->_isError){
      return array("Error"=>$this->_isError,"Reason"=>$this->_errorString);
    }
    if($url == ""){
      return array("Error"=>TRUE,"Reason"=>"Redirect url is not specify. so, redirect url is not set.");
    }
    
    $this->_redirect = $url;
    return TRUE;
  }
  
  
}
