<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buktifisik extends CI_Controller {

	public function index()
	{
        $username = $this->session->userdata('username');
		$data['user']  			  = $this->Auth_model->get_users_by_un($username);

		if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'pimpinan') {
			$this->load->view('404_content');
		}
		$data['title'] = "P2M Polsri AMAI | Dashboard";

		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view('dashboard/vw_buktifisik', $data);
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
	}
}
