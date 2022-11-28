<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditStandar extends CI_Controller
{


	public function index()
	{
		$ceks 	 = $this->session->userdata('username');
		if (!isset($ceks)) {
			redirect('autentikasi/login');
		} else {
			$username = $this->session->userdata('username');
			$data['user']  			  = $this->Auth_model->get_users_by_un($username);

			if ($data['user']->row()->level != 's_admin' ) {
				$this->load->view('404_content');
			} else {
				$data['namastandar'] 		  = $this->db->get("tb_namastandar");
				$data['title'] = "P2M Polsri AMAI | Edit Standar";

				$this->load->view('_partials/header', $data);
				$this->load->view('_partials/navbar');
				$this->load->view('dashboard/vw_editstandar', $data);
				$this->load->view('_partials/sidebar');
				$this->load->view('_partials/footer');
			}
		}
	}

	public function proses()
	{

		$jumlah = number_format($this->db->query("SELECT * FROM tb_namastandar ")->num_rows());
		if (isset($_POST['btnupdate'])) {

			for ($i = 1; $i <= $jumlah; $i++) {

				$data = array(
					'nama_standar' => htmlentities(strip_tags($this->input->post('standar' . $i)))
				);

				$this->Auth_model->update_standar(array('id_standar' => $i), $data);
			}
			$this->session->set_flashdata(
				'msg',
				'
					<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							</button>
							<strong>Sukses!</strong> Nama Standar Berhasil diupdate.
					</div>'
			);
			redirect('editstandar');
		}
	}
}
