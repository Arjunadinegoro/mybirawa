<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api_login extends REST_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_api_login');

  }

  public function index_get()
  {
    $return = array
    (
        'code' => "F",
        'message' => "method & parameter definition not found"
    );
   
    $this->response($return);
  }

  public function index_post()
  {
    $return = array
    (
        'code' => "F",
        'message' => "method & parameter definition not found"
    );
    //header('Content-type:application/json');
    //echo json_encode($return);
    $this->response($return);
  }

  /**
   * Submit login, GET
   *
   * @param string  $username username user
   * @param string  $password password user
   * @return  json  $message Code dan Message (T/F)
   */
  public function auth_get($admin = null, $admin2=null)
  {

    //untuk mencegah direktori traversal dan masalah keamanan lainnya
    // $imei       =   $this->security->sanitize_filename($parto); //imei
    $username      =   $this->security->sanitize_filename($admin); //user
    $password   =   $this->security->sanitize_filename($admin2); // pwd
    // $version    =   $this->security->sanitize_filename($version); // version

   // $imei       = $this->_anti_sql_injection($imei);
    $username       = $this->_anti_sql_injection($username);
    $password   = $this->_anti_sql_injection($password);

    $hasil = $this->m_api_login->get_login($user,$password);
    $this->response($hasil);

  }

  public function auth_post() {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
  
    $username   = $this->_anti_sql_injection($username);
    $password   = $this->_anti_sql_injection($password);


    $hasil = $this->m_api_login->get_login($username,$password);
   
    $this->response($hasil);

  }

  /**
   * Anti sql injection (strip_tags, addslashes, htmlspecialchars, stripslashes)
   *
   * @param string $string String yang akan difilter
   * @return  string $filter String hasil filter
   */
  public function _anti_sql_injection($string)
  {
    $string = strip_tags(trim(addslashes(htmlspecialchars(stripslashes($string)))));
    return $string;
  }

}

