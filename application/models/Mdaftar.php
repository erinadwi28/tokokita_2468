<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdaftar extends CI_Model {

	public function cek_member($username)
	{
		return $this->db->get_where('tbl_member', ['username' => $username])->row_array();
	}

   public function insert_akun($tabel, $data)
	{
		$this->db->insert($tabel, $data);
	}
}
