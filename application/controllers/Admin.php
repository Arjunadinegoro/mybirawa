<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
	function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('user_agent');
            $this->load->library('session');
            $this->load->model('m_api');
            $this->load->library('pagination');
			//$this->check_isvalidated();
            //
    }
public function index()
	{	
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
		//$this->load->view('admin/v_dashboard');
		$this->load->view('admin/footer');
    }

    public function user()
	{
	
        $data['user'] = $this->m_api->listuser();
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_user',$data);
        $this->load->view('admin/footer');
        
    }
    public function tespagination($num = '')
	{
        $config = array();
        $config["base_url"] = base_url() . "tespagination";
        $config["total_rows"] = $this->m_api->getAllUser()->num_rows();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link p-3">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link p-3">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link p-3">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link p-3">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link p-3">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link p-3">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['user'] = $this->m_api->getDataPaginationTesPagination($config["per_page"], $page)->result();
        $data['users'] = $this->m_api->select_data('user');
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_tespagination',$data);
        $this->load->view('admin/footer');
        
    }
    public function city()
	{
	if(isset($_GET['page'])){
        $data['page'] = $_GET['page'];
    }else{
        $data['page'] = '';
    }
    $data['city'] = $this->m_api->city();
   $this->load->view('admin/header_admin');
   $this->load->view('admin/menu_admin');
   $this->load->view('admin/v_city',$data);
   $this->load->view('admin/footer');
    }
    
    public function gedung()
	{
	if(isset($_GET['page'])){
        $data['page'] = $_GET['page'];
    }else{
        $data['page'] = '';
    }
    $data['gedung'] = $this->m_api->gedung();
    $this->load->view('admin/header_admin');
    $this->load->view('admin/menu_admin');
    $this->load->view('admin/v_gedung',$data);
    $this->load->view('admin/footer');
    }

    public function fmbm()
	{
	if(isset($_GET['page'])){
        $data['page'] = $_GET['page'];
    }else{
        $data['page'] = '';
    }
    $data['fmbm'] = $this->m_api->fmbm();
    $this->load->view('admin/header_admin');
    $this->load->view('admin/menu_admin');
    $this->load->view('admin/v_fmbm',$data);
    $this->load->view('admin/footer');
    }
    public function page2()
	{
	
        $data['city'] = $this->m_api->page2();
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_city',$data);
        $this->load->view('admin/footer');
        
    }
    public function page3()
	{
	
        $data['city'] = $this->m_api->page3();
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_city',$data);
        $this->load->view('admin/footer');
        
    }
    public function page4()
	{
	
        $data['city'] = $this->m_api->page4();
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_city',$data);
        $this->load->view('admin/footer');
        
    }
    public function page5()
	{
	
        $data['city'] = $this->m_api->page5();
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_city',$data);
        $this->load->view('admin/footer');
        
    }

    public function sub_bidang()
	{
	
        //$data['user'] = $this->m_api->listuser();
        $this->load->view('admin/header_admin');
		$this->load->view('admin/menu_admin');
        $this->load->view('admin/v_sub_bidang');
        $this->load->view('admin/footer');
        
    }

    public function insert()
    {
        $data = $this->m_api->adduser();
        //var_dump($data);die;
		redirect('admin/user');
	
    }

    public function delete($username)
    {
		// $id = $this->input->post('id');
		$data = [
			'username' => $username
		];
		
		// var_dump($id); die;
		
		$this->m_api->delete_data('username',$data);
        // $this->m_user->deleteUser($id);
        // $this->session->set_flashdata('flash', 'Dihapus');
        redirect('admin/user');
	}
    public function data_user()
        {
            if ($this->agent->is_browser()){
                $agent = $this->agent->browser().' '.$this->agent->version();
            }elseif ($this->agent->is_mobile()){
                $agent = $this->agent->mobile();
            }else{
                $agent = 'Data user gagal di dapatkan';
            }
            echo "Di akses dari :<br/>";
                    echo "Browser = ". $agent . "<br/>";
                    echo "Sistem Operasi = " . $this->agent->platform() ."<br/>"; // Platform info (Windows, Linux, Mac, etc.)
                    //ip hanya muncul pada hosting
                    echo "IP = " . $this->input->ip_address();
        }
    public function admintes()
    {
        $this->load->view('admin/admintes');
    }
}