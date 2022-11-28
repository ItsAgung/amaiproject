<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentikasi extends CI_Controller {

	public function index()
	{
		$ceks = $this->session->userdata('is_login');
		if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
			redirect('dashboard');
		}
	}

    public function login()
	{
		$ceks = $this->session->userdata('is_login');
		if (isset($ceks)) {
			$this->load->view('404_content');
		} else {
			$this->load->view('auth/login_view');


			if (isset($_POST['btnlogin'])) {
				$username = htmlentities(strip_tags($_POST['username']));
				$pass	   = htmlentities(strip_tags(md5($_POST['password'])));

				$query  = $this->Auth_model->get_users_by_un($username);
				$jumlah = $query->num_rows();

				if ($jumlah == 0) {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp;</span>
							</button>
							<strong>Username "' . $username . '"</strong> belum terdaftar.
						</div>'
					);
					redirect('autentikasi/login');
				} else {
					$row = $query->row();
					$cekpass = $row->password;
					if ($cekpass <> $pass) {
						$this->session->set_flashdata(
							'msg',
							'<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp;</span>
								</button>
								<strong>Username atau Password Salah!</strong>.
							</div>'
						);
						redirect('autentikasi/login');
					} else {

						$this->session->set_userdata('nama', "$row->nama_lengkap");
						$this->session->set_userdata('username', "$row->username");
						$this->session->set_userdata('id_user', "$row->id_user");
                        $this->session->set_userdata('is_login',TRUE);

						date_default_timezone_set('Asia/Jakarta');
						$tgl = date('d-m-Y H:i:s');
						$data = array(
							'terakhir_login'		=> $tgl,
						);
						$this->Auth_model->update_user(array('username' => $username), $data);
						redirect('dashboard');
					}
				}
			}
		}
	}

	public function logout()
	{
		if ($this->session->has_userdata('id_user') and $this->session->has_userdata('is_login')) {
			$this->session->sess_destroy();
			redirect('');
		}
		redirect('');
	}
}
