<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GrafikStandar extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$username = $this->session->userdata('username');
		$data['user']  			  = $this->Auth_model->get_users_by_un($username);

		if ($data['user']->row()->level == 's_admin' or $data['user']->row()->level == 'pimpinan') {
			$this->load->view('404_content');
		}
		
		$data['title'] = "P2M Polsri AMAI | Grafik Standar";

		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view('dashboard/vw_grafikstandar');
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
	}
}
