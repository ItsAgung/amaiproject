<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    var $tb_users				 	= 'tb_user';
	var $tb_namastandar	 			= 'tb_namastandar';


	// GET USERS
	public function get_users()
	{
		$this->db->from($this->tb_users);
		$query = $this->db->get();
		return $query;
	}

	public function get_users_daftar()
	{
		$this->db->from($this->tb_users);
		$this->db->where('status', 'terdaftar');
		$query = $this->db->get();
		return $query;
	}

	public function get_level_users()
	{
		$this->db->from($this->tb_users);
		$query = $this->db->get();
		return $query;
	}

	// GET BY AKUN AUDITOR 
	public function get_level_auditor()
	{
		$this->db->from($this->tb_users);
		$this->db->where('level', 'auditor');
		$query = $this->db->get();
		return $query;
	}

	public function get_auditor_byid($id)
	{
		$this->db->from($this->tb_users);
		$this->db->where('id_user', $id );
		$query = $this->db->get();
		return $query;
	}

	// GET BY AKUN AUDITEE
	public function get_level_auditee()
	{
		$this->db->from($this->tb_users);
		$this->db->where('level', 'auditee');
		$query = $this->db->get();
		return $query;
	}

	public function get_auditee_byid($id)
	{
		$this->db->from($this->tb_users);
		$this->db->where('id_user', $id );
		$query = $this->db->get();
		return $query;
	}

	// GET BY AKUN AUDITOR 
	public function get_level_pimpinan()
	{
		$this->db->from($this->tb_users);
		$this->db->where('level', 'pimpinan');
		$query = $this->db->get();
		return $query;
	}

	public function get_pimpinan_byid($id)
	{
		$this->db->from($this->tb_users);
		$this->db->where('id_user', $id );
		$query = $this->db->get();
		return $query;
	}

	public function get_users_by_un($id)
	{
		$this->db->from($this->tb_users);
		$this->db->where('username', $id);
		$query = $this->db->get();
		return $query;
	}

	public function get_level_users_by_id($id)
	{
		$this->db->from($this->tb_users);
		$this->db->where('tb_user.level', 'user');
		$this->db->where('tb_user.id_user', $id);
		$query = $this->db->get();

		return $query->row();
	}

	// TAMBAH USERS
	public function save_user($data)
	{
		$this->db->insert($this->tb_users, $data);
		return $this->db->insert_id();
	}

	public function update_user($where, $data)
	{
		$this->db->update($this->tb_users, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_user_by_id($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete($this->tb_users);
	}

	// TAMBAH DATA MASTER
	public function get_datamaster_by_un($id)
	{
		$this->db->from($this->tbl_datamaster);
		$this->db->where('id_user', $id);
		$query = $this->db->get();
		return $query;
	}

	public function save_datamaster($data)
	{
		$this->db->insert($this->tbl_datamaster, $data);
		return $this->db->insert_id();
	}

	public function update_standar($where, $data)
	{
		$this->db->update($this->tb_namastandar, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_datamaster_by_id($id)
	{
		$this->db->where('id_datamaster', $id);
		$this->db->delete($this->tbl_datamaster);
	}

}