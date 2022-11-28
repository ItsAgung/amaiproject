<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function index()
	{
		$ceks 	 = $this->session->userdata('is_login');
		if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
		$username = $this->session->userdata('username');
		$data['user']  			  = $this->Auth_model->get_users_by_un($username);


		$data['title'] = "P2M Polsri AMAI | Profil Pengguna";
		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view('dashboard/vw_profil', $data);
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
		}
	}

	public function prosesupdate($id = ''){
	
		if (isset($_POST['btnupdate'])) {
			$nama	 				= htmlentities(strip_tags($this->input->post('nama')));
			$email  	 			= htmlentities(strip_tags($this->input->post('email')));
			$telp					= htmlentities(strip_tags($this->input->post('telp')));

			$data = array(
						'nama_lengkap'		=> $nama,
						'email'				=> $email,
						'telp'				=> $telp
			);
			$this->Auth_model->update_user(array('id_user' => $id), $data);

			$this->session->set_flashdata(
				'msg',
				'
				<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						</button>
						<strong>Sukses!</strong> Pengguna berhasil diupdate.
				</div>'
			);
			redirect('profil');
		}
	}
}
