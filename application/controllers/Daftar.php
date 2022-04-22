<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {
   
   function __construct()
   {
      parent::__construct();
      $this->load->model('Mcrud');
      $this->load->model('Mdaftar');
   }

	public function index()
	{
      $data['title'] = 'Daftar Akun Pengguna';
      $data['kota'] = $this->Mcrud->get_data_kota()->result();
		$this->template->load('frontend/layout_frontend', 'frontend/form_daftar', $data);
	}

   public function daftar_akun(){       
		$username = $this->input->post('username');
      $member = $this->Mdaftar->cek_member($username);
      
      if ($member) {
         $this->session->set_flashdata('error', '<b>Username</b> ini sudah terdaftar!');
         redirect('daftar-akun-pengguna');
      } else {
         $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'namaKonsumen' => htmlspecialchars($this->input->post('namaKonsumen', true)),
            'alamat' => $this->input->post('alamat', true),
            'idKota' => $this->input->post('idKota', true),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'tlpn' => $this->input->post('tlpn', true),
            'statusAktif' => 'Y'
         ];
         
         $this->Mdaftar->insert_akun('tbl_member', $data);
         $this->session->set_flashdata('success', '<b>Berhasil</b>. Akun Anda telah terdaftar');
         redirect('daftar-akun-pengguna');
      }
	}
}
