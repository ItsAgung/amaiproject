<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ManajemenAkun extends CI_Controller {

	public function index()
	{
		$this->load->view('404_content');
	}

	public function auditor($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('username');
		$id_user	 = $this->session->userdata('id_user');
        if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
        $data['user']  			  = $this->Auth_model->get_users_by_un($ceks);

        if ($data['user']->row()->level != 's_admin' ) {
			$this->load->view('404_content');
		} else {
		
		$data['level_users']  = $this->Auth_model->get_level_auditor();
		$data['auditor_user']  = $this->Auth_model->get_auditor_byid($id);

		if ($aksi == 't') {
			$p = "pengguna_tambah";

			$data['title'] = "P2M Polsri AMAI | Tambah Akun Auditor";
		} elseif ($aksi == 'd') {
			$p = "pengguna_detail";

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Detail Akun Auditor";
		} elseif ($aksi == 'e') {
			$p = "pengguna_edit";

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Edit Akun Auditor";
		} elseif ($aksi == 'h') {

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Hapus Akun Auditor";

			if ($ceks == $data['query']->username) {
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Gagal!</strong> Maaf, Anda tidak bisa menghapus Nama Pengguna "' . $ceks . '" ini.
					</div>'
				);
			} else {
				$this->Auth_model->delete_user_by_id($id);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Pengguna berhasil dihapus.
					</div>'
				);
			}
			redirect('manajemenakun/auditor');
		} else {
			$p = "pengguna";

			$data['title'] = "P2M Polsri AMAI | Manajemen Akun Auditor";
		}
		
		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view("akun/auditor/$p", $data);
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
			}
		}

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('d-m-Y H:i:s');

			if (isset($_POST['btnsimpan'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$jurusan   	 			= htmlentities(strip_tags($this->input->post('jurusan')));
				$prodi					= htmlentities(strip_tags($this->input->post('prodi')));
				$password	 		  	= htmlentities(strip_tags($this->input->post('password')));
				$password2	 			= htmlentities(strip_tags($this->input->post('password2')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$cek_user = $this->db->get_where("tb_user", "username = '$username'")->num_rows();
				if ($cek_user != 0) {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Nama Pengguna "' . $username . '" Sudah ada.
						</div>'
					);
				} else {
					if ($password != $password2) {
						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Gagal!</strong> Katasandi tidak cocok.
							</div>'
						);
					} else {
						$data = array(
							'username'	 	 	=> $username,
							'password'	 	 	=> md5($password),
							'nama_lengkap'	 	=> $username,
							'jurusan' 			=> $jurusan,
							'prodi' 			=> $prodi,
							'email' 			=> '-',
							'telp' 				 => '-',
							'status' 			=> 'aktif',
							'level'			 	=> $level,
							'tgl_daftar' 	 	=> $tgl
						);
						$this->Auth_model->save_user($data);

						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> Pengguna berhasil ditambahkan.
							</div>'
						);
					}
				}

				redirect('manajemenakun/auditor');
			}

			if (isset($_POST['btnupdate'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$jurusan   	 			= htmlentities(strip_tags($this->input->post('jurusan')));
				$prodi					= htmlentities(strip_tags($this->input->post('prodi')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$data = array(
							'username'	 	 	=> $username,
							'jurusan' 			=> $jurusan,
							'prodi' 			=> $prodi,
							'level'			 	=> $level,
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
				redirect('manajemenakun/auditor');
			}
	}

	public function auditee($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('username');
		$id_user	 = $this->session->userdata('id_user');
        if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
        $data['user']  			  = $this->Auth_model->get_users_by_un($ceks);

        if ($data['user']->row()->level != 's_admin') {
            $this->load->view('404_content');
        } else {
		
		$data['level_users']  = $this->Auth_model->get_level_auditee();
		$data['auditee_user']  = $this->Auth_model->get_auditee_byid($id);

		if ($aksi == 't') {
			$p = "pengguna_tambah";

			$data['title'] = "P2M Polsri AMAI | Tambah Akun Auditee";
		} elseif ($aksi == 'd') {
			$p = "pengguna_detail";

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Detail Akun Auditee";
		} elseif ($aksi == 'e') {
			$p = "pengguna_edit";

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Edit Akun Auditee";
		} elseif ($aksi == 'h') {

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Hapus Akun Auditee";

			if ($ceks == $data['query']->username) {
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Gagal!</strong> Maaf, Anda tidak bisa menghapus Nama Pengguna "' . $ceks . '" ini.
					</div>'
				);
			} else {
				$this->Auth_model->delete_user_by_id($id);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Pengguna berhasil dihapus.
					</div>'
				);
			}
			redirect('manajemenakun/auditee');
		} else {
			$p = "pengguna";

			$data['title'] = "P2M Polsri AMAI | Manajemen Akun Auditee";
		}
		
		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view("akun/auditee/$p", $data);
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
			}
		}

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('d-m-Y H:i:s');

			if (isset($_POST['btnsimpan'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$jurusan   	 			= htmlentities(strip_tags($this->input->post('jurusan')));
				$prodi					= htmlentities(strip_tags($this->input->post('prodi')));
				$password	 		  	= htmlentities(strip_tags($this->input->post('password')));
				$password2	 			= htmlentities(strip_tags($this->input->post('password2')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$cek_user = $this->db->get_where("tb_user", "username = '$username'")->num_rows();
				if ($cek_user != 0) {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Nama Pengguna "' . $username . '" Sudah ada.
						</div>'
					);
				} else {
					if ($password != $password2) {
						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Gagal!</strong> Katasandi tidak cocok.
							</div>'
						);
					} else {
						$data = array(
							'username'	 	 	=> $username,
							'password'	 	 	=> md5($password),
							'nama_lengkap'	 	=> $username,
							'jurusan' 			=> $jurusan,
							'prodi' 			=> $prodi,
							'email' 			=> '-',
							'telp' 				 => '-',
							'status' 			=> 'aktif',
							'level'			 	=> $level,
							'tgl_daftar' 	 	=> $tgl
						);
						$this->Auth_model->save_user($data);

						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> Pengguna berhasil ditambahkan.
							</div>'
						);
					}
				}

				redirect('manajemenakun/auditee');
			}

			if (isset($_POST['btnupdate'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$jurusan   	 			= htmlentities(strip_tags($this->input->post('jurusan')));
				$prodi					= htmlentities(strip_tags($this->input->post('prodi')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$data = array(
							'username'	 	 	=> $username,
							'jurusan' 			=> $jurusan,
							'prodi' 			=> $prodi,
							'level'			 	=> $level,
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
				redirect('manajemenakun/auditee');
			}
	}

	public function pimpinan($aksi = '', $id = '')
	{
		$ceks 	 = $this->session->userdata('username');
		$id_user	 = $this->session->userdata('id_user');
        if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
        $data['user']  			  = $this->Auth_model->get_users_by_un($ceks);

        if ($data['user']->row()->level != 's_admin') {
            $this->load->view('404_content');
        } else {
		
		$data['level_users']  = $this->Auth_model->get_level_pimpinan();
		$data['pimpinan_user']  = $this->Auth_model->get_pimpinan_byid($id);

		if ($aksi == 't') {
			$p = "pengguna_tambah";

			$data['title'] = "P2M Polsri AMAI | Tambah Akun Pimpinan";
		} elseif ($aksi == 'd') {
			$p = "pengguna_detail";

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Detail Akun Pimpinan";
		} elseif ($aksi == 'e') {
			$p = "pengguna_edit";

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Edit Akun Pimpinan";
		} elseif ($aksi == 'h') {

			$data['query'] = $this->db->get_where("tb_user", "id_user = '$id'")->row();
			$data['title'] = "P2M Polsri AMAI | Hapus Akun Pimpinan";

			if ($ceks == $data['query']->username) {
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Gagal!</strong> Maaf, Anda tidak bisa menghapus Nama Pengguna "' . $ceks . '" ini.
					</div>'
				);
			} else {
				$this->Auth_model->delete_user_by_id($id);
				$this->session->set_flashdata(
					'msg',
					'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Pengguna berhasil dihapus.
					</div>'
				);
			}
			redirect('manajemenakun/pimpinan');
		} else {
			$p = "pengguna";

			$data['title'] = "P2M Polsri AMAI | Manajemen Akun Pimpinan";
		}
		
		$this->load->view('_partials/header', $data);
		$this->load->view('_partials/navbar');
		$this->load->view("akun/pimpinan/$p", $data);
		$this->load->view('_partials/sidebar');
		$this->load->view('_partials/footer');
			}
		}

			date_default_timezone_set('Asia/Jakarta');
			$tgl = date('d-m-Y H:i:s');

			if (isset($_POST['btnsimpan'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$password	 		  	= htmlentities(strip_tags($this->input->post('password')));
				$password2	 			= htmlentities(strip_tags($this->input->post('password2')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$cek_user = $this->db->get_where("tb_user", "username = '$username'")->num_rows();
				if ($cek_user != 0) {
					$this->session->set_flashdata(
						'msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								</button>
								<strong>Gagal!</strong> Nama Pengguna "' . $username . '" Sudah ada.
						</div>'
					);
				} else {
					if ($password != $password2) {
						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-warning alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Gagal!</strong> Katasandi tidak cocok.
							</div>'
						);
					} else {
						$data = array(
							'username'	 	 	=> $username,
							'password'	 	 	=> md5($password),
							'nama_lengkap'	 	=> $username,
							'jurusan' 			=> '-',
							'prodi' 			=> '-',
							'email' 			=> '-',
							'telp' 				 => '-',
							'status' 			=> 'aktif',
							'level'			 	=> $level,
							'tgl_daftar' 	 	=> $tgl
						);
						$this->Auth_model->save_user($data);

						$this->session->set_flashdata(
							'msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									</button>
									<strong>Sukses!</strong> Pengguna berhasil ditambahkan.
							</div>'
						);
					}
				}

				redirect('manajemenakun/pimpinan');
			}

			if (isset($_POST['btnupdate'])) {
				$username   	 		= htmlentities(strip_tags($this->input->post('username')));
				$level	 				= htmlentities(strip_tags($this->input->post('level')));

				$data = array(
							'username'	 	 	=> $username,
							'level'			 	=> $level,
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
				redirect('manajemenakun/pimpinan');
			}
	}
}
