<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LikeQr extends CI_Controller {

  private function loadMyMessage() {
    $messages= array();
    $message = array();
    $message["title"]="Ehy!!!";
    $message["caption"]="Ciao mondo!";
    $message["url"]="http://www.google.com";
    $message["description"]="Ciao! Bel posto, bella gente!!!";
    //$message["picture"] = "https://fbcdn-sphotos-a.akamaihd.net/hphotos-ak-snc6/199574_10150139682934734_114427359733_6492612_624261_n.jpg";
    $messages["hart"] = $message;
    return $messages;
  }
  
  
  function __construct() {
    parent::__construct();
    $this->config->load('facebook');
    $this->load->helper('html');
    $this->load->helper('url');
    
    $fb_config = array();
    $fb_config['appId'] = $this->config->item("ilts_fb_app_id");
    $fb_config['secret'] = $this->config->item("ilts_fb_secret");
    $fb_config['cookie'] = $this->config->item("ilts_fb_cookie");;
    $this->load->library('facebook', $fb_config);
    $user = $this->facebook->getUser();
    $this->user_is_logged= false;
    if ($user) {
      $this->user_is_logged= true;
      $this->user_log_url = $this->facebook->getLogoutUrl();
    } else {
      $params = array();
      $params["scope"] = "publish_stream, publish_checkins";
      $this->user_log_url = $this->facebook->getLoginUrl($params);
      //redirect($this->user_log_url, 'refresh');
    }
    
    //$this->load->model('Profile_model',"profile");
  }

	/**
	 * 
	 */
	public function index()
	{
    $this->load->helper('html');
    $this->load->helper('url');
    $data = array();
    $data["messages"] = $this->loadMyMessage();
    $this->load->view('tpl/header');
		$this->load->view('likeqr/listofshare', $data);
    $this->load->view('tpl/footer');
	}
  
  public function show($key) {
    $data = array();
    $ms = $this->loadMyMessage();
    if (key_exists($key, $ms)) {
      $data["message"] = $ms[$key];
      $data["user_is_logged"] = $this->user_is_logged;
      $data["user_log_url"] = $this->user_log_url;
      $data["url_to_share"] = site_url("likeqr/share/$key");
      $this->load->view('tpl/header');
      $this->load->view('likeqr/show', $data);
      $this->load->view('tpl/footer');
    } else {
      show_404();
    }
  }
  public function share($key) {
    //echo $what;
    $wannaPostOnFacebook = true;
    $wannaCheckinOnFacebook = false;
    $data = array();
    
    $ms = $this->loadMyMessage();
    if (key_exists($key, $ms)) {
      $m = $ms[$key];
      $data["what"] = $key;
      $data["url_to_share"] = site_url("likeqr/show/$key");
      $data["user_is_logged"] = $this->user_is_logged;
      $data["user_log_url"] = $this->user_log_url;
      $data["message"] = $m;
      if ($this->user_is_logged) {
        if ($wannaPostOnFacebook) {
          $result = $this->facebook->api(
            '/me/feed/',
            'post',
            array(
                //'message' => $m["title"],
                'message' => "Sono qui con @[{689333867}:1:{flevaaaa}]",
                'caption' => $m["caption"],
                //'picture' => $m["picture"],
                'link' => $m["url"],
                //'description' => $m["description"]
                'description' => "..."

                )
          );
        }
        if ($wannaCheckinOnFacebook) {
          $result = $this->facebook->api(
            '/me/checkins/',
            'post',
            array(
                'message' => 'Bellissimo questo posto!',
                'place'=> '159680277395899',
                'coordinates' => array(
                    'latitude' => 45.5644056,
                    'longitude' => 12.4280571
                )
            )
          );
        }
        $this->load->view('tpl/header');
        $this->load->view('likeqr/share', $data);
        $this->load->view('tpl/footer');
      } else {
        $this->load->view('tpl/header');
        $this->load->view('likeqr/login', $data);
        $this->load->view('tpl/footer');
      }
    } else {
      show_404();
    }
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */