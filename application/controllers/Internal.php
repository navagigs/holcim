<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'LOG', TRUE);
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE){       
            redirect('internal/','refresh');
        } else {     
		$this->load->view('admin/login');               
        } 
	}

	public function ceklogin()
	{
		$admin_username		= $this->input->post('admin_username');
		$admin_password		= $this->input->post('admin_password');
		$do					= $this->input->post('login');
		
		$where_login['admin_username']	= $admin_username;
		$where_login['admin_password']	= do_hash($admin_password, 'md5');
		
		if ($do && $this->LOG->cek_login($where_login) === TRUE){
			redirect("admin/dashboard");
		} else {
			$this->session->set_flashdata('warning','username dan password tidak cocok!');
            redirect("internal");
		}
	}

	public function keluar()
	{
		$this->LOG->remov_session();
        session_destroy();
		redirect("internal");
	}
}
