<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	public function index()
	{
		$ceks 	 = $this->session->userdata('is_login');
		
		if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
		$username = $this->session->userdata('username');
		$data['user']  			  = $this->Auth_model->get_users_by_un($username);
	
		$data['title'] = "P2M Polsri AMAI | Dashboard";
		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view('dashboard/vw_dashboard', $data);
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
		}
	}
}
